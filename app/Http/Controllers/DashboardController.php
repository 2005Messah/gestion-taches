<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::with('tasks')->get();

        $tasks = Task::with(['project', 'user'])->get();

        return view('dashboard', compact('projects', 'tasks'));
    }
}