@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Create Car</h1>

            <form action="{{route('cars.store')}}" method="post">
                @csrf {{ csrf_field() }}
                <label for="brand">Brand</label>
                <select name="brand" required>
                    <option value="Ferrari">Ferrari</option>
                    <option value="Porsche">Porsche</option>
                    <option value="BMW">BMW</option>
                    <option value="Ford">Ford</option>
                </select>

                <label for="model">Model</label>
                <input type="text" name="model">

                <label for="engine">Engine</label>
                <input type="text" name="engine">

                <label for="transmission">Transmission</label>
                <input type="text" name="transmission">

                <label for="options">Options</label>
                <input type="text" name="options">

                <label for="body">Price</label>
                <input type="number" name="price" required>

                <button>Create</button>
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

            <a href="{{route('admin')}}">Terug naar de Admin page</a>
        </div>
    </div>
@endsection

