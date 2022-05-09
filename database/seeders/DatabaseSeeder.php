<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\Faculty;
use App\Models\Major;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $adminpassword = '12345';

        Role::create([
            'name' => 'Admin'
        ]);

        Role::create([
            'name' => 'User'
        ]);

        // name email password role_id id_number gender year_start university faculty major
        User::create([
            'name' => 'adminanthony',
            'email' => 'admin@gmail.com',
            'password' => Hash::make($adminpassword),
            'role_id' => 1,
            'id_number' => '20417019',
            'gender' => 'Other',
            'year_start' => '2021',
            'university' => 'Ciputra University',
            'faculty' => 1,
            'major' => 1,
        ]);

        Category::create([
            'name' => 'Machine Learning',
            'description' => 'Machine learning is a branch of artificial intelligence (AI) and computer science which focuses on the use of data and algorithms to imitate the way that humans learn, gradually improving its accuracy.

            Machine learning is an important component of the growing field of data science. Through the use of statistical methods, algorithms are trained to make classifications or predictions, uncovering key insights within data mining projects. These insights subsequently drive decision making within applications and businesses, ideally impacting key growth metrics. As big data continues to expand and grow, the market demand for data scientists will increase, requiring them to assist in the identification of the most relevant business questions and subsequently the data to answer them.'
        ]); 

        Category::create([
            'name' => 'Game Development',
            'description' => 'Game Development is the art of creating games and describes the design, development and release of a game. It may involve concept generation, design, build, test and release. While you create a game, it is important to think about the game mechanics, rewards, player engagement and level design.

            A game developer could be a programmer, a sound designer, an artist, a designer or many other roles available in the industry.
            
            Game Development can be undertaken by a large Game Development Studio or by a single individual. It can be as small or large as you like. As long as it lets the player interact with content and is able to manipulate the game’s elements, you can call it a ‘game’.'
        ]);

        Category::create([
            'name' => 'Web Development',
            'description' => 'Web development is the building and maintenance of websites; it’s the work that happens behind the scenes to make a website look great, work fast and perform well with a seamless user experience.

            Web developers, or ‘devs’, do this by using a variety of coding languages. The languages they use depends on the types of tasks they are preforming and the platforms on which they are working.
            
            Web development skills are in high demand worldwide and well paid too – making development a great career option. It is one of the easiest accessible higher paid fields as you do not need a traditional university degree to become qualified.
            
            The field of web development is generally broken down into front-end (the user-facing side) and back-end (the server side). Let’s delve into the details.'
        ]);

        Faculty::create([
            'faculty_name' => 'Information Technology'
        ]);

        Major::create([
            'major_name' => 'IMT'
        ]);

        Major::create([
            'major_name' => 'ISB'
        ]);
        
        
    }
}
