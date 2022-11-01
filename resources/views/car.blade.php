@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Cars page</h1>

            <form method="get" action="{{url('/filter')}}">
                <select name="brand">
                    <option value="Ferrari">Ferrari</option>
                    <option value="Porsche">Porsche</option>
                    <option value="BMW">BMW</option>
                    <option value="Ford">Ford</option>
                </select>

                <button type="submit" class="btn btn-secondary">Filter</button>
            </form>

            <form method="get" action="{{url('/search')}}">
                <input type="text" name="text" placeholder="Search..">
            </form>

            <a href="{{route('cars.index')}}">Clear Filters</a>

            <table>
                <tr class="p-4 bg-primary">
                    <th class="text-white">Brand</th>
                    <th class="text-white">Model</th>
                    <th class="text-white">Engine</th>
                    <th class="text-white">Transmission</th>
                    <th class="text-white">Options</th>
                    <th class="text-white">Price</th>
                    <th class="text-white">View</th>
                </tr>
            @foreach ($cars as $car)
                @if($car['status'] === 1)
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
                @endif
            @endforeach
            </table>

            <a href="{{route('home')}}" class="w-25 mt-3 btn btn-primary">Home</a>
            <a href="{{route('admin')}}" class="w-25 mt-3 btn btn-primary">Admin</a>
        </div>
    </div>
@endsection
