<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(faker $faker): void
    {
        DB::table('Projects')->truncate();
        for($i=1;$i<=10;$i++){
        $project= new Project();
        

        $project->title=$faker->sentence(3);

        $project->img=$faker->imageUrl(640, 480, 'animals', true);;

        

        $project->slug=Str::of($project->title)->slug('-');

        $project->save();
        
        }
    }
}
