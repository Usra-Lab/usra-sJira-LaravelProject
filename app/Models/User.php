<?php

namespace App\Models;
use App\Models\Project;
use App\Models\Task;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function role(): Attribute
    {

        // 0 =ProjectManager; 1 = ProductOwner; 2 = ScrumMaster;3 = Developpers

        return new Attribute(
            get: fn($value) => ["ProjectManager","ProductOwner","ScrumMaster","Developpers"][$value],
        );
    }

   
}
