<?php

use Illuminate\Database\Seeder;

class PersentaseKeuntungan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PersentaseKeuntungan::truncate();

        $d = new \App\Models\PersentaseKeuntungan;
        $d->persentase_keuntungan = 10;

        $d->save();
    }
}
