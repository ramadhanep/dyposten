<?php

use Illuminate\Database\Seeder;

class Currency extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Currency::truncate();

        $d = new \App\Models\Currency;
        $d->currency = "IDR";

        $d->save();
    }
}
