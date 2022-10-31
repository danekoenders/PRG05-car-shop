@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Cars page</h1>

            <table>
            @foreach ($cars as $car)
                <tr>
                    <td>{{$car['brand']}}</td>
                    <td>{{$car['model']}}</td>
                    <td>{{$car['engine']}}</td>
                    <td>{{$car['transmission']}}</td>
                    <td>{{$car['options']}}</td>
                    <td>{{$car['price']}}</td>
                    <td>
                        <a href="{{ route('cars.show', $car->id)}}" class="btn btn-secondary">View</a>
                    </td>
                </tr>
            @endforeach
            </table>

            <a href="{{route('home')}}">Terug naar home page</a>
            <a href="{{route('admin')}}">Admin page</a>
        </div>
    </div>
@endsection
