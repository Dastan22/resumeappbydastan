@extends('templates.main')

@section('content')
    <h1>Tell us something about you!</h1>


    <div>
        @if(session()->has('errors'))

            @foreach($errors->all() as $e)

             <div class="alert alert-danger" role="alert">
            <p>{{$e}}</p>
             </div>
            @endforeach
        @endif
    </div>

    <form method="POST" action="{{route('resume.store')}}">
        @csrf
        <div class="mb-3">
            <label for="fullname" class="form-label">FullName(FIO)</label>
            <input name="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" aria-describedby="fullname">
            @error('fullname')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

            <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" aria-describedby="phone">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Local Address</label>
            <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address" aria-describedby="address">
            @error('address')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>


        <textarea name="summary" id="" cols="30" rows="4"></textarea>
        <br>



        <button type="submit" class="btn btn-primary">Create a new  Resume</button>
    </form>
@endsection
