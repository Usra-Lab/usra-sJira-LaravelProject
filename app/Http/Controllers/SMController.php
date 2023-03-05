<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Sprint;
 
use Auth;
use Illuminate\Http\Request;

class SMController extends Controller
{
    public function index(){
        $user=User::where('id',Auth::user()->id)->first();
        return view('SMViews.projects',compact('user'));
    }

/*============================================================== Tasks affectation ==============================================================*/

    public function show($id){
        $project=Project::find($id);
        $sprints=Sprint::all();
        return view('SMViews.project',compact('sprints','project'));
    }
    public function addSprints(Request $request){

        $project = Project::find($request->id);
        $project->sprints()->attach($request->SId);
        $sprints=Sprint::all();
        
        return view('SMViews.Project',compact('project','sprints'));
        
    } 
}
