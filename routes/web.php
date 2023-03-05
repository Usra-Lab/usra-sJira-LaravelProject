<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PMController;
use App\Http\Controllers\POController;
use App\Http\Controllers\SMController;
use App\Http\Controllers\DevController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/*========================================================== ProjectManager Routes ====================================================================*/

Route::middleware(['auth','user-role:ProjectManager'])->group(function()
{
    Route::get("pm/home",[HomeController::class,'PMHome'])->name('home.PM');
    //CRUD Operations with Ajax
    Route::get("/pm/projects",[PMController::class,'index'])->name('projects.show');
    Route::post("project",[PMController::class,'store'])->name('projects.store');
    Route::put("project/update/{id}",[PMController::class,'update'])->name('projects.update');
    Route::delete("project/delete/{id}",[PMController::class,'delete'])->name('projects.delete');
    // RolesProjects Affectation
    Route::get('pm/project/{id}', [PMController::class,'show'])->name('project.show');
    Route::post('projects_users', [PMController::class,'addRoles'])->name('project_roles.add');
    // show  Society Team
    Route::get("society/team",[PMController::class,'showTeam'])->name('team.show');
});
/*========================================================== ProductOwner Routes ====================================================================*/

Route::middleware(['auth','user-role:ProductOwner'])->group(function()
{
    Route::get("/po/home",[HomeController::class,'POHome'])->name('home.PO');
    // AllProjects This ProductOwner is Member
    Route::get("po/projects",[POController::class,'index'])->name('projects.vue');
    // TasksProjects Affectation
    Route::get('po/project/{id}', [POController::class,'show'])->name('project.vue');
    Route::post('projects_tasks', [POController::class,'addTasks'])->name('project_tasks.add');
    
});
/*========================================================== ScrumMaster Route ====================================================================*/
Route::middleware(['auth','user-role:ScrumMaster'])->group(function()
{
    Route::get("sm/home",[HomeController::class,'SMHome'])->name('home.SM');//lanching page
     // AllProjects This ScrumMaster is Member
     Route::get("sm/projects",[SMController::class,'index'])->name('projects.data');
     // SprintProjects Affectation
     Route::get('sm/project/{id}', [SMController::class,'show'])->name('project.data');
     Route::post('projects_sprints', [SMController::class,'addSprints'])->name('project_sprints.add');
});

/*========================================================== Developpers Routes  ====================================================================*/
Route::middleware(['auth','user-role:Developpers'])->group(function()
{
    Route::get("dev/home",[HomeController::class,'DevHome'])->name('home.Dev');//lanching page
         // AllProjects This Developpers are Members
         Route::get("dev/projects",[DevController::class,'index'])->name('projects.sh');
         // Tasks must be done
         Route::get('dev/project/{id}', [DevController::class,'show'])->name('project.sh');
});