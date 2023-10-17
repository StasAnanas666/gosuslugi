@extends('layouts.layout')

@section('content')
    <div class="container">
        {{ html()->form('POST', 'add_service')->class('my-5')->open() }}
        <div class="form-group">
            {{ html()->text('name')->class('form-control')->placeholder('Название услуги') }}
            {{ html()->input()->class('btn btn-primary my-3')->type('submit')->value('Добавить услугу') }}
        </div>
        {{ html()->form()->close() }}
    </div>

@endsection