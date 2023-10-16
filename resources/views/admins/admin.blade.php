@extends('layouts.layout')

@section('content')
    <div class="container">
        <form class="my-5" action="{{route('services.store')}}" method="post">
            <div class="form-group">
                <label for="name" class="form-label">Название услуги: </label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <button type="submit" class="btn btn-primary my-3">Добавить услугу</button>
        </form>
    </div>

@endsection