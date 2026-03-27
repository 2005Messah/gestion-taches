<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Task;
use App\Models\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   

public function run() {
    Comment::create(['content'=>'Premier commentaire','task_id'=>Task::first()->id,'user_id'=>User::first()->id]);
}
}
