<?php

use Illuminate\Database\Seeder;

class KategoriProduk extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Kategori::truncate();

        $d = new \App\Models\Kategori;
        $d->kategori = "Makanan";

        $d->save();
    }
}
