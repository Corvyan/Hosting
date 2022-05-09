@extends('layouts.app')

@section('page-content')
    <section class="py-20 min-h-screen flex items-center">
        <div class="max-w-screen-lg mx-auto">
            <form class="w-full max-w-lg" method="POST" enctype="multipart/form-data" action="{{ route('competitions.update', $competition->id) }}">
                @csrf
                @method('PUT')
                
                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Name
                    </label>
                  </div>
                  <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                    focus:outline-none focus:bg-white focus:border-purple-500" id="name" name="name" type="text" placeholder="Competition Name" value="{{ $competition->name }}"
                    @error('name') is-invalid @enderror required">

                    @error('name')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                  </div>
                </div>


                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="category">
                          Category
                      </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="inline-block relative w-64">
                            <select name="category" class="block appearance-none text-gray-700 w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                              <option>Machine Learning</option>
                              <option>Game Development</option>
                              <option>Web Development</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                            
                          </div>
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="date">
                          Date
                      </label>
                  </div>
                  <div class="md:w-2/3">
                      {{-- DATEPICKER START --}}
                      <!-- component -->
                      <div class="">
                        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
                        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

                          <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                              <div class="container mx-auto">
                                  <div class="mb-5">
                                      <label for="datepicker" class="font-bold mb-1 text-gray-700 block">Select Date</label>
                                      <div class="relative">
                                          <input type="hidden" name="date" x-ref="date" :value="datepickerValue" />
                                          {{-- THIS IS THE VALUE I GUESS --}}
                                          <input type="text" x-on:click="initDate(datepickerValue), showDatepicker = !showDatepicker" x-model="datepickerValue"
                                              x-on:keydown.escape="showDatepicker = false"
                                              class="w-full pl-4 pr-10 py-3 leading-none rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                              placeholder="Select date" @error('date') is-invalid @enderror required/>

                                              @error('date')
                                                <div class="invalid-feedback text-red-600">
                                                    {{ $message }}
                                                </div>
                                              @enderror

                                          <div class="absolute top-0 right-0 px-3 py-2">
                                              <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                              </svg>
                                          </div>

                                          <div class="absolute top-0 left-0 p-4 mt-12 bg-white rounded-lg shadow" style="width: 17rem"
                                              x-show.transition="showDatepicker" @click.away="showDatepicker = false">
                                              <div class="flex items-center justify-between mb-2">
                                                  <div>
                                                      <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                                      <span x-text="year" class="ml-1 text-lg font-normal text-gray-600"></span>
                                                  </div>
                                                  <div>
                                                      <button type="button"
                                                          class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer focus:outline-none focus:shadow-outline hover:bg-gray-100"
                                                          @click="if (month == 0) {
                                                                          year--;
                                                                          month = 12;
                                                                      } month--; getNoOfDays()">
                                                          <svg class="inline-flex w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                              stroke="currentColor">
                                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                  d="M15 19l-7-7 7-7" />
                                                          </svg>
                                                      </button>
                                                      <button type="button"
                                                          class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer focus:outline-none focus:shadow-outline hover:bg-gray-100"
                                                          @click="if (month == 11) {
                                                                          month = 0; 
                                                                          year++;
                                                                      } else {
                                                                          month++; 
                                                                      } getNoOfDays()">
                                                          <svg class="inline-flex w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                              stroke="currentColor">
                                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                  d="M9 5l7 7-7 7" />
                                                          </svg>
                                                      </button>
                                                  </div>
                                              </div>

                                              <div class="flex flex-wrap mb-3 -mx-1">
                                                  <template x-for="(day, index) in DAYS" :key="index">
                                                      <div style="width: 14.26%" class="px-0.5">
                                                          <div x-text="day" class="text-xs font-medium text-center text-gray-800"></div>
                                                      </div>
                                                  </template>
                                              </div>

                                              <div class="flex flex-wrap -mx-1">
                                                  <template x-for="blankday in blankdays">
                                                      <div style="width: 14.28%" class="p-1 text-sm text-center border border-transparent"></div>
                                                  </template>
                                                  <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                                      <div style="width: 14.28%" class="px-1 mb-1">
                                                          <div @click="getDateValue(date)" x-text="date"
                                                              class="text-sm leading-none leading-loose text-center transition duration-100 ease-in-out rounded-full cursor-pointer"
                                                              :class="{
                                                  'bg-indigo-200': isToday(date) == true, 
                                                  'text-gray-600 hover:bg-indigo-200': isToday(date) == false && isSelectedDate(date) == false,
                                                  'bg-indigo-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true 
                                              }"></div>
                                                      </div>
                                                  </template>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <script>
                              const MONTH_NAMES = [
                                  "January",
                                  "February",
                                  "March",
                                  "April",
                                  "May",
                                  "June",
                                  "July",
                                  "August",
                                  "September",
                                  "October",
                                  "November",
                                  "December",
                              ];
                              const MONTH_SHORT_NAMES = [
                                  "Jan",
                                  "Feb",
                                  "Mar",
                                  "Apr",
                                  "May",
                                  "Jun",
                                  "Jul",
                                  "Aug",
                                  "Sep",
                                  "Oct",
                                  "Nov",
                                  "Dec",
                              ];
                              const DAYS = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

                              function app() {
                                  return {
                                      showDatepicker: false,
                                      datepickerValue: "",
                                      selectedDate: "",
                                      dateFormat: "YYYY-MM-DD",
                                      month: "",
                                      year: "",
                                      no_of_days: [],
                                      blankdays: [],
                                      initDate(newDate) {
                                          let today;
                                          if (newDate) {
                                              this.selectedDate = newDate;
                                              console.log(newDate)
                                          }
                                          if (this.selectedDate) {
                                              today = new Date(this.selectedDate.replace(/-/g, "/"));
                                          } else {
                                              today = new Date();
                                          }
                                          this.month = today.getMonth();
                                          this.year = today.getFullYear();
                                          this.datepickerValue = this.formatDateForDisplay(
                                              today
                                          );
                                      },
                                      formatDateForDisplay(date) {
                                          let formattedDay = DAYS[date.getDay()];
                                          let formattedDate = ("0" + date.getDate()).slice(
                                              -2
                                          ); // appends 0 (zero) in single digit date
                                          let formattedMonth = MONTH_NAMES[date.getMonth()];
                                          let formattedMonthShortName =
                                              MONTH_SHORT_NAMES[date.getMonth()];
                                          let formattedMonthInNumber = (
                                              "0" +
                                              (parseInt(date.getMonth()) + 1)
                                          ).slice(-2);
                                          let formattedYear = date.getFullYear();
                                          if (this.dateFormat === "DD-MM-YYYY") {
                                              return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`; // 02-04-2021
                                          }
                                          if (this.dateFormat === "YYYY-MM-DD") {
                                              return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`; // 2021-04-02
                                          }
                                          if (this.dateFormat === "D d M, Y") {
                                              return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`; // Tue 02 Mar 2021
                                          }
                                          return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}`;
                                      },
                                      isSelectedDate(date) {
                                          const d = new Date(this.year, this.month, date);
                                          return this.datepickerValue ===
                                              this.formatDateForDisplay(d) ?
                                              true :
                                              false;
                                      },
                                      isToday(date) {
                                          const today = new Date();
                                          const d = new Date(this.year, this.month, date);
                                          return today.toDateString() === d.toDateString() ?
                                              true :
                                              false;
                                      },
                                      getDateValue(date) {
                                          let selectedDate = new Date(
                                              this.year,
                                              this.month,
                                              date
                                          );
                                          this.datepickerValue = this.formatDateForDisplay(
                                              selectedDate
                                          );
                                          // this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + formattedMonthInNumber).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
                                          this.isSelectedDate(date);
                                          this.showDatepicker = false;
                                      },
                                      getNoOfDays() {
                                          let daysInMonth = new Date(
                                              this.year,
                                              this.month + 1,
                                              0
                                          ).getDate();
                                          // find where to start calendar day of week
                                          let dayOfWeek = new Date(
                                              this.year,
                                              this.month
                                          ).getDay();
                                          let blankdaysArray = [];
                                          for (var i = 1; i <= dayOfWeek; i++) {
                                              blankdaysArray.push(i);
                                          }
                                          let daysArray = [];
                                          for (var i = 1; i <= daysInMonth; i++) {
                                              daysArray.push(i);
                                          }
                                          this.blankdays = blankdaysArray;
                                          this.no_of_days = daysArray;
                                      },
                                  };
                              }

                          </script>
                      </div>
                      {{-- DATEPICKER END --}}

                      @error('date')
                      <div class="invalid-feedback text-red-600">
                          {{ $message }}
                      </div>
                      @enderror

                  </div>
                </div>

                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="description">
                          Description
                      </label>
                    </div>
                    <div class="md:w-2/3">
                      <textarea class="form-control bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                      focus:outline-none focus:bg-white focus:border-purple-500" cols="100" rows="7" id="description" name="description" placeholder="Your Description""
                      @error('description') is-invalid @enderror required">{{ $competition->description }}</textarea>
  
                      @error('description')
                      <div class="invalid-feedback text-red-600">
                          {{ $message }}
                      </div>
                      @enderror
  
                    </div>
                  </div>

                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="poster">
                          Poster
                      </label>
                    </div>
                    <div class="md:w-2/3">
                      <input type="file" class="mt-4" name="poster">

                      @error('poster')
                      <div class="invalid-feedback text-red-600">
                          {{ $message }}
                      </div>
                      @enderror
  
                    </div>
                  </div>


                <div class="md:flex md:items-center">
                  <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                      <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Publish
                      </button>
                    </div>
                </div>
            </form>
            
        </div>
    </section>
@endsection