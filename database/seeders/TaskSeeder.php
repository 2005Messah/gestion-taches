<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
public function run() {
    $project = Project::first();
    $users = User::all();

    Task::create(['title'=>'Tâche 1','description'=>'Description 1','status'=>'À faire','project_id'=>$project->id,'assigned_to'=>$users[0]->id]);
    Task::create(['title'=>'Tâche 2','description'=>'Description 2','status'=>'En cours','project_id'=>$project->id,'assigned_to'=>$users[1]->id]);
    Task::create(['title'=>'Tâche 3','description'=>'Description 3','status'=>'Terminé','project_id'=>$project->id,'assigned_to'=>$users[0]->id]);
}
}
