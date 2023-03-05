@extends('layouts.app')
@section('content')
  <div class="p-5 text-center" > 
    <div class="mask">
      <div class="d-flex justify-content-center align-items-center">
        <div style="color:#888888;">
          <h1 class="mt-5 ">Manage Ur Project Perfectely</h1>
          <h5 class="m-5 text-justify p-5">
            Usra'sJira is a project  management app ,
            It is a direct SCRUM method implementation ,
            The best for manage simple and  complex projects ,
            Usra'sJira allows users to create project & manage it
            including roles & tasks && sprints affectation ,
            and monitoring project progress
          </h5>
          @if (Route::has('login'))
          <a class="btn btn-outline-secondary btn-lg m-2" href="{{ route('login') }}"
            role="button" rel="nofollow">Login</a>
          @endif
          @if (Route::has('register'))
          <a class="btn btn-outline-secondary btn-lg m-2" href="{{ route('register') }}"
             role="button">Register</a>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection