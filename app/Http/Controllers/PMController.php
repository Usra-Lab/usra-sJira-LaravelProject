<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;


use Illuminate\Http\Request;

class PMController extends Controller
{

/*==============================================================CRUD Operations==============================================================*/
   

    public function index()
    {
        $projects=Project::paginate(6);
        $users=User::all();
        return view('PMViews.Projects',compact('projects','users'));
    }

    public function store(Request $request)
    {
        $project =new Project;
        $project->estimate=$request->input('estimate');
        $project->date=$request->input('date');
        $project->description=$request->input('description');

        $project->save();
    }


    public function update(Request $request,$id)
    {
        $projects =Project::find($id);
        $projects->estimate=$request->input('estimate');
        $projects->date=$request->input('date');
        $projects->description=$request->input('description');

        $projects->update();
        return $projects;
    }

    public function delete($id){

        $project =Project::find($id);
        $project->delete();

    }

/*============================================================== Roles affectation ==============================================================*/


    public function show($id){
        $users=User::all();
        $project=Project::find($id);
        return view('PMViews.project',compact('users','project'));
    }
    
    public function addRoles(Request $request){

        $project = Project::find($request->id);
        $project->roles()->attach($request->RId);
        $users=User::all();
        
        return view('PMViews.Project',compact('project','users'));
        
    } 

/*============================================================== showSociety Team ==============================================================*/

    public function showTeam(){

        $users=User::paginate(4);
        return view('PMViews.Team',compact('users'));
    }


}
