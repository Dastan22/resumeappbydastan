@extends('templates.main')

@section('content')
    <h1>Edit Detail for Experience</h1>


    <div>
        @if(session()->has('errors'))

            @foreach($errors->all() as $e)

                <div class="alert alert-danger" role="alert">
                    <p>{{$e}}</p>
                </div>
            @endforeach
        @endif
    </div>

    <form method="POST" action="{{route('experience.update', $experience)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="job_title" class="form-label">Job Title</label>
            <input name="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" id="job_title" aria-describedby="job_title"
                   value="{{$experience->job_title}}">
            @error('job_title')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="employer" class="form-label">Employer</label>
            <input name="employer" value="{{$experience->employer}}" type="text" class="form-control @error('employer') is-invalid @enderror" id="employer" aria-describedby="employer">
            @error('employer')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">City:</label>
            <input name="city" type="text" value="{{$experience->city}}" class="form-control @error('city') is-invalid @enderror" id="city" aria-describedby="city">
            @error('city')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <input name="state" value="{{$experience->state}}" type="text" class="form-control @error('state') is-invalid @enderror" id="state" aria-describedby="state">
            @error('state')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input name="start_date"  value="{{$experience->start_date}}" type="date" class="form-control">
            @error('start_date')
            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input name="end_date" value="{{$experience->end_date}}" type="date" class="form-control">
            @error('end_date')
            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Work Detail</button>
    </form>
@endsection
