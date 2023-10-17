@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Услуги</h1> 
    <div class="cards my-5 m-auto d-flex align-items-center justify-content-between">
        @foreach($services as $service)
            <div class="card" style="width: 18rem;">
                <img src="{{asset('images/'.$service->image)}}" class="card-img-top" alt="{{$service->name}}">
                <div class="card-body">
                    <h5 class="card-title">{{$service->name}}</h5>
                    <p class="card-text">{{$service->description}}</p>
                    <p class="card-text">{{$service->price}} ₽</p>
                    <a href="#" class="btn btn-primary">Заказать</a>
                </div>
            </div>
        @endforeach
    </div>      
</div>
    

    
@endsection