<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            [
                'name' => 'Mme Marwa',
                'email' => 'ProjectManager@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 0,
                'image'=>'https://images.pexels.com/photos/3756679/pexels-photo-3756679.jpeg'
            ],

            [
                'name' => 'Mr Ahmed',
                'email' => 'ProductOwner@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 1,
                'image'=>'https://images.pexels.com/photos/39866/entrepreneur-startup-start-up-man-39866.jpeg'

            ],

            [
                'name' => 'Mr Amine',
                'email' => 'ScrumMaster@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 2,
                'image'=>'https://images.pexels.com/photos/925786/pexels-photo-925786.jpeg'

            ],

            [
                'name' => 'Mme Alae',
                'email' => 'Developers@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 3,
                'image'=>'https://images.pexels.com/photos/1181290/pexels-photo-1181290.jpeg'

            ],
        ];
        foreach($users as $user)
        {
            User::create($user);
        }
    }
}
