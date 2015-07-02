<?php

class UsersTableSeeder extends Seeder {
    public function run(){
        $user = new User;
        $user->first_name = "John";
        $user->last_name = "Doe";
        $user->email = "john@doe.com";
        $user->password = Hash::make("mypassword");
        $user->telephone = "5557771234";
        $user->admin = 1;
        $user->save();
    }
}