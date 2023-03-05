<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Task;

use Auth;
use Illuminate\Http\Request;

class POController extends Controller
{
    
    public function index(){
        $user=User::where('id',Auth::user()->id)->first();
        return view('POViews.projects',compact('user'));
    }

/*============================================================== Tasks affectation ==============================================================*/

    public function show($id){
        $project=Project::find($id);
        $tasks=Task::all();
        return view('POViews.project',compact('tasks','project'));
    }
    public function addTasks(Request $request){

        $project = Project::find($request->id);
        $project->tasks()->attach($request->TId);
        $tasks=Task::all();
        
        return view('POViews.Project',compact('project','tasks'));
        
    } 
}
