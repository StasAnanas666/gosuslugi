@extends('layouts.layout')

@section('content')
    <a href="{{route('home')}}" class="nav-link">Назад к списку услуг</a>
    

    <div class="container">
        <h1 class="mb-3">Оформление заказа</h1>
        @if(session()->has('selected-service'))
            @php
                $service = session('selected-service');
            @endphp
            <div class="service-details d-flex justify-content-between align-items-center border border-3 rounded-3 p-2">
                @if($service->image)
                    <img class="w-25" src="{{asset('storage/'.$service->image)}}" alt="{{$service->name}}">
                @endif
                <div class="service-desc ms-4 w-75">
                    <h2>{{$service->name}}</h2>
                    <p>Описание: {{$service->description}}</p>
                    <p>Цена: {{$service->price}}</p>
                </div>
            </div>
        @else
            <p>Выберите услугу для заказа.</p>
        @endif
    </div>

@endsection