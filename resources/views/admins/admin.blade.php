@extends('layouts.layout')

@section('content')
    <div class="container">
        {{ html()->form('POST', 'add_service')->class('my-5')->acceptsFiles()->open() }}
        <div class="form-group">
            {{ html()->text('name')->class('form-control my-3')->placeholder('Название услуги') }}
        </div>
        <div class="form-group">
        {{ html()->text('price')->type('number')->class('form-control my-3')->placeholder('Цена услуги') }}
        </div>
        <div class="form-group">
            {{ html()->file('image')->class('form-control my-3')->acceptImage()}}
        </div>
        <div class="form-group">
            {{ html()->textarea('description')->class('form-control my-3')->placeholder('Описание услуги')}}     
        </div>
        {{ html()->input()->class('btn btn-primary my-3')->type('submit')->value('Добавить услугу') }}
        {{ html()->form()->close() }}
    </div>

@endsection