@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center">
    <div class="col-md-4  shadow p-5 mt-5 bg-body rounded">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-outline mb-4">
                <label >Email</label>
            <input type="email" name="email" class="text form-control">
            </div>
            <div class="form-outline mb-4">
                <label >Password</label>
            <input type="password" name="password" class="text form-control">
            </div>
            <button class="btn btn-primary btn -sm mt-4">Login</button>
        </form>
    </div>
</div>
@endsection
