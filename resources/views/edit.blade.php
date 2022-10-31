@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Edit page</h1>

            <form action="{{ route('cars.update', $car->id) }}" method="post">
                @method('PUT')
                @csrf {{ csrf_field() }}

                <label for="brand">Brand</label>
                <input type="text" name="brand" value="{{ $car->brand }}">

                <label for="model">Model</label>
                <input type="text" name="model" value="{{ $car->model }}">

                <label for="engine">Engine</label>
                <input type="text" name="engine" value="{{ $car->engine }}">

                <label for="transmission">Transmission</label>
                <input type="text" name="transmission" value="{{ $car->transmission }}">

                <label for="options">Options</label>
                <input type="text" name="options" value="{{ $car->options }}">

                <label for="body">Price</label>
                <input type="number" name="price" value="{{ $car->price }}">

                <button type="submit" class="btn btn-primary">Update Car</button>
            </form>
        </div>
    </div>
@endsection
