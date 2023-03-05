<?php

namespace App\Models;

use App\Models\Project;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
    public function roles()
    {
        return $this->belongsToMany(User::class);
    }
}
