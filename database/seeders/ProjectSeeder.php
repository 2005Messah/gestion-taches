<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    

public function run() {
    Project::create(['name'=>'Projet Démo','description'=>'Projet pour démo','created_by'=>User::first()->id]);
}
}
