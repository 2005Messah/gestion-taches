<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;       // ⚠ Import du modèle Comment
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        Comment::create([
            'content'   => $request->content,
            'task_id'   => $request->task_id,
            'user_id'   => Auth::id(),
        ]);

        return redirect()->back();
    }
}