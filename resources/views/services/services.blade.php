@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Services</h1> 
    <div class="cards my-5 m-auto d-flex align-items-center justify-content-between">
        @foreach($services as $service)
            <div class="card" style="width: 18rem;">
                <img src="{{asset('images/work3.jpg')}}" class="card-img-top" alt="{{$service->name}}">
                <div class="card-body">
                    <h5 class="card-title">{{$service->name}}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
    </div>      
</div>
    

    
@endsection