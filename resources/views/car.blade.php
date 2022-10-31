@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Cars page</h1>

            <a href="{{route('cars.create')}}" class="btn btn-primary">Create</a>

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
                    <td>
                        <a href="{{ route('cars.edit', $car->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('cars.destroy', $car->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>

            <a href="{{route('home')}}">Terug naar home page</a>
        </div>
    </div>
@endsection
