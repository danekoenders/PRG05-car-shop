@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Edit Car</h1>

            <form action="{{ route('cars.update', $car->id) }}" method="post">
                @method('PUT')
                @csrf {{ csrf_field() }}

                <label for="brand">Brand</label>
                <select name="brand" required>
                    <option value="{{ $car->brand }}">{{ $car->brand }}</option>
                    <option value="Ferrari">Ferrari</option>
                    <option value="Porsche">Porsche</option>
                    <option value="BMW">BMW</option>
                    <option value="Ford">Ford</option>
                </select>

                <label for="model">Model</label>
                <input type="text" name="model" value="{{ $car->model }}">

                <label for="engine">Engine</label>
                <input type="text" name="engine" value="{{ $car->engine }}">

                <label for="transmission">Transmission</label>
                <input type="text" name="transmission" value="{{ $car->transmission }}">

                <label for="options">Options</label>
                <input type="text" name="options" value="{{ $car->options }}">

                <label for="body">Price</label>
                <input type="number" name="price" value="{{ $car->price }}" required>

                <button type="submit" class="btn btn-primary">Update Car</button>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <a href="{{route('admin')}}" class="w-25 mt-3 btn btn-primary">Admin</a>
        </div>
    </div>
@endsection
