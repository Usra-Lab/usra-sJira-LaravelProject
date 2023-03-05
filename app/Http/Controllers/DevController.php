<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
 
use Auth;
use Illuminate\Http\Request;

class DevController extends Controller
{
    public function index(){
        $user=User::where('id',Auth::user()->id)->first();
        return view('DevViews.projects',compact('user'));
    }

/*============================================================== Tasks Show ==============================================================*/

    public function show($id){
        $user=User::where('id',Auth::user()->id)->first();
        $project=Project::find($id);
        $tasks=$project->tasks;
        return view('DevViews.project',compact('project','user','tasks'));
    }
}
