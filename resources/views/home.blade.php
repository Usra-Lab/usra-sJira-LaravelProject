@extends('layouts.app')

@section('content') 
<div class="p-5 text-center" > 
    <div class="mask">
      <div class="d-flex justify-content-center align-items-center">
        <div style="color:#888888;">
          <h1 class="mt-5 ">Hello {{Auth::user()->name}}</h1>
          <p>As {{Auth::user()->role}} yous can start your profession</p>
        </div>
      </div>
    </div>
  </div>

@endsection
