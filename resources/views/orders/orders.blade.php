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
            @if(session()->has('additional-service'))
                @php
                    $additionalServices = session('additional-service');
                @endphp
                @if(count($additionalServices) > 0)
                    <form method="post">
                        <h3>Выберите дополнительные услуги</h3>
                        <ul class="list-group">
                            @foreach($additionalServices as $additionalService)
                                <li class="list-group-item">
                                    <input class="form-check-input" type="checkbox" name="additional_services[]" value="{{$additionalService->price}}" id="{{$additionalService->id}}">
                                    {{$additionalService->name}} - Цена: {{$additionalService->price}}
                                </li>
                            @endforeach
                        </ul>
                    </form>
                @endif
            @endif
            <h3 class="mt-4">Общая сумма заказа: <span id="total-price"></span> рублей</h3>
            <button class="btn btn-primary mt-5">Оформить заказ</button>
        @else
            <p>Выберите услугу для заказа.</p>
        @endif
    </div>
    <script>
        function calculateTotalPrice() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            var total = parseFloat("{{$service->price}}");

            checkboxes.forEach(checkbox => {
                total += parseFloat(checkbox.value);
            })
            document.querySelector("#total-price").textContent = total;
        }

        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', calculateTotalPrice);
        })

        calculateTotalPrice();
    </script>

@endsection