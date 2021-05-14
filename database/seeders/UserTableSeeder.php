<?php

namespace Database\Seeders;

use App\Models\User;

use App\Models\Profile;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::create([
            'name'=>'morgan',
            'email'=>'morgan@gmail.son',
            'password'=> bcrypt('password'),
            'admin'=>1
        ]);

        Profile::create([
      'user_id'=>$user->id,
      'about'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima blanditiis
       ducimus quibusdam cupiditate corrupti quasi perspiciatis doloremque, voluptate pariatur ea, 
      adipisci itaque obcaecati tenetur consequuntur numquam deserunt repellendus qui est.',
      'facebook'=>'facebook.com',
      'youtube'=>'youtube.com',
      'avatar'=>'/storage/app/public/images/1613398403morgankathini.jpeg'
        ]);
    }
}
