@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Car page</h1>

            <a href="{{route('cars.create')}}">Create a car</a>

            @foreach ($cars as $car)
                <li>{{$car['model']}}</li>
                <li>{{$car['price']}}</li>
{{--                <a href="{{route('cars.destroy', ['id' => $car['id']])}}" >delete</a>--}}
{{--                <a href="{{route('cars.edit', ['id' => $car['id']])}}" >edit</a>--}}
            @endforeach

            <a href="{{route('home')}}">Terug naar home page</a>
        </div>
    </div>
@endsection
