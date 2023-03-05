@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-3">Team Society</h1>
	<div class="row mt-5 ">
	@foreach($users as $user )
		<div class="col-md-3 mb-md-2 mb-2">
			<div class="card d-flex flex-column align-items-center justify-content-center">
			
				<div class="inner-content d-flex flex-column align-items-center justify-content-center">
						<div class="img-container rounded-circle">
							<img src="{{$user->image}}"
								alt="" class="rounded-circle">
						</div>
						<div class="h3">{{$user->name}}</div>
						<p class="designation text-muted text-uppercase">{{$user->role}}</p>
				</div>
			</div>
		</div>    
	@endforeach
	</div><br>
    {{$users->links()}}

	<style>
        * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            .container .card::before {
                content: "";
                position: absolute;
                top: -50px;
                height: 0;
                width: 150%;
                background-color: #1369ce;
                z-index: -1;
                border-bottom-left-radius: 50%;
                border-bottom-right-radius: 50%;
                transition: all 0.5s ease-in-out;
            }

            .container .card {
                width: 280px;
                height: 320px;
                overflow: hidden;
                z-index: 3;
                transition: all 0.5s ease-in-out;
                border: none;
                box-shadow: 5px 5px 10px #1f1f1fa8,
                            -5px -5px 10px #1f1f1fa8;
            }

            .container .card:hover::before {
                height: 150px;
            }

            .container .card .img-container {
                width: 100px;
                height: 100px;
                margin-bottom: 30px;
                transition: all 0.5s ease-in-out;
            }

            .container .card:hover .img-container {
                border: 10px solid #1369ce;
            }

            .container .card .img-container img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transform: scale(1);
                transition: all 0.5s ease-in-out;
            }

            .container .card:hover .img-container img {
                box-shadow: 0 0 0 14px #f7f5ec;
                transform: scale(0.8);
            }

            .container .card .h3 {
                margin-bottom: 5px !important;
                font-weight: 600;
                pointer-events: none;
            }

            .container .card .designation {
                font-size: 0.85rem;
                letter-spacing: 2px;
                pointer-events: none;
            }
	</style>

@endsection