@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Create page</h1>

            <form action="{{route('cars.store')}}" method="post">
                @csrf {{ csrf_field() }}
                <label for="brand">Brand</label>
                <input type="text" name="brand">

                <label for="model">Model</label>
                <input type="text" name="model">

                <label for="engine">Engine</label>
                <input type="text" name="engine">

                <label for="transmission">Transmission</label>
                <input type="text" name="transmission">

                <label for="options">Options</label>
                <input type="text" name="options">

                <label for="body">Price</label>
                <input type="number" name="price">

                <button>Create</button>
            </form>
        </div>
    </div>
@endsection

