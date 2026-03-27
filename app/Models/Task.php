<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'project_id',
        'assigned_to'
    ];

    /**
     * Relation : une tâche appartient à un projet
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relation : une tâche est assignée à un utilisateur
     * (clé étrangère : assigned_to)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}