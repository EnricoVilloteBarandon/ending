<?php

use Illuminate\Database\Seeder;
use App\Users;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->delete();
        Users::create(array(
            'firstname' => 'Enrico',
            'lastname' => 'Barandon',
            'email' => 'enricobarandon@gmail.com',
            'contact' => '09261316513',
            'password' => Hash::make('password'),
            'usertype' => 1,
            'agent' => 1
        ));
    }
}
