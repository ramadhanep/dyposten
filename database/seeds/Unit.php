<?php

use Illuminate\Database\Seeder;

class Unit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Unit::truncate();

        $d = new \App\Models\Unit;
        $d->unit = "Pack";

        $d->save();
    }
}
