@extends('templates.main')

@section('content')
    <h1>Skill Detail</h1>

    <form method="POST" action="{{route('skill.store')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Skill Name</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name">
            @error('name')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating:</label>
            <input name="rating" type="text" class="form-control @error('rating') is-invalid @enderror" id="rating" aria-describedby="rating">
            @error('rating')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Skill Detail</button>
    </form>
@endsection
