<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Schema::disableForeignKeyConstraints();

        //svuoto tabella prima di popolarla
        Technology::truncate();

        //array di partenza
        $Technologies = ['Python','Java','JavaScript','C++','C#','C','TypeScript','PHP','Perl','Ruby'];

        foreach ($Technologies as $tech) {

            $new_tech = new Technology();

            $new_tech->name = $tech;
            

            $new_tech->save();
        }


        Schema::enableForeignKeyConstraints();
    }
}

