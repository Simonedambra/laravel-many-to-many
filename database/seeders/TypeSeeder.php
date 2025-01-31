<?php

namespace Database\Seeders;


use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Schema::disableForeignKeyConstraints();

        //svuoto tabella prima di popolarla
        Type::truncate();

        //array di partenza
        $Types = ['Frontend', 'Backend', 'AI', 'Data Analytics', 'Fullstack'];

        foreach ($Types as $type) {

            $new_type = new Type();

            $new_type->title = $type;
            $new_type->slug = Str::of($type)->slug();

            $new_type->save();
        }


        Schema::enableForeignKeyConstraints();
    }
}