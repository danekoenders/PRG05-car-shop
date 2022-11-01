@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Your profile</h1>

            <form action="{{ route('user.update', $user->id) }}" method="post">
                @method('PUT')
                @csrf {{ csrf_field() }}

                <label for="name">Name</label>
                <input type="text" name="name" value="{{ $user->name }}" required>

                <span>{{ $user->email }}</span>

                <button type="submit" class="btn btn-primary">Update profile</button>
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

            <a href="{{route('cars.index')}}">Terug naar de Cars page</a>
        </div>
    </div>
@endsection
