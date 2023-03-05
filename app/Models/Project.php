<?php

namespace App\Models;
use App\Models\User;
use App\Models\Task;
use App\Models\Sprint;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable=[
        'estimate',
        'date',
        'description',
    ];
    
    public $timestamps = false;

    public function roles()
    {
        return $this->belongsToMany(User::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function sprints()
    {
        return $this->belongsToMany(Sprint::class);
    }

}
