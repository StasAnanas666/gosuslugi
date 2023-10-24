@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1 class="my-4">Личный кабинет</h1>

        <h2>Мои заказы</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Номер заказа</th>
                    <th>Дата заказа</th>
                    <th>Сумма</th>
                    <th>Статус</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->order_date}}</td>
                        <td>{{$order->total_price}} рублей</td>
                        <td>{{$order->status}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection