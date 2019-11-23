<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::truncate();

        $d = new \App\User;
        $d->name = "Romadhan";
        $d->email = "romadhanedy@gmail.com";
        $d->password = \Hash::make("123321");
        $d->level = "Admin Utama";

        $d->save();
    }
}
