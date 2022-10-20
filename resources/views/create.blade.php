@extends('layouts.app')

@section('content')
    <form action="{{route('cars.store')}}" method="post">
        @csrf {{ csrf_field() }}
        <label for="title">Brand</label>
        <input type="text" name="brand">
        <label for="title">Model</label>
        <input type="text" name="model">
        <label for="body">Price</label>
        <input type="number" name="price">
        <button>Send</button>
    </form>
@endsection

