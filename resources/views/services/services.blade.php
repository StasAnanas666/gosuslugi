@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Услуги</h1> 
    <div class="cards my-5 m-auto d-flex align-items-center justify-content-between">
        @foreach($services as $service)
            <div class="card p-3 text-center mx-auto" style="width: 18rem;height:450px">
                <div class="card-img mx-auto" style="width:200px;height:200px;">
                    <img src="{{asset('storage/'.$service->image)}}" class="h-100" alt="{{$service->name}}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$service->name}}</h5>
                    <p class="card-text overflow-auto" style="height:80px">{{$service->description}}</p>
                    <p class="card-text">{{$service->price}} ₽</p>
                    <a href="#" class="btn btn-primary">Заказать</a>
                </div>
            </div>
        @endforeach
    </div>      
</div>
    

    
@endsection