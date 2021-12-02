@extends('templates.main')

@section('content')
    <h1>Edit Detail for Education</h1>


    <div>
        @if(session()->has('errors'))

            @foreach($errors->all() as $e)

                <div class="alert alert-danger" role="alert">
                    <p>{{$e}}</p>
                </div>
            @endforeach
        @endif
    </div>

    <form method="POST" action="{{route('education.update', $education)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="school_name" class="form-label">School Name</label>
            <input name="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" id="school_name" aria-describedby="school_name"
            value="{{$education->school_name}}">
            @error('school_name')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="school_location" class="form-label">School Location</label>
            <input name="school_location" value="{{$education->school_location}}" type="text" class="form-control @error('school_location') is-invalid @enderror" id="school_location" aria-describedby="school_location">
            @error('school_location')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="degree" class="form-label">Degree:</label>
            <input name="degree" type="text" value="{{$education->degree}}" class="form-control @error('degree') is-invalid @enderror" id="degree" aria-describedby="degree">
            @error('degree')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="field_of_study" class="form-label">Field of Study</label>
            <input name="field_of_study" value="{{$education->field_of_study}}" type="text" class="form-control @error('field_of_study') is-invalid @enderror" id="field_of_study" aria-describedby="field_of_study">
            @error('field_of_study')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="graduation_start_date" class="form-label">Graduation Start Date</label>
            <input name="graduation_start_date"  value="{{$education->graduation_start_date}}" type="date" class="form-control">
                        @error('graduation_start_date')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
        </div>

        <div class="mb-3">
            <label for="graduation_end_date" class="form-label">Graduation End Date</label>
            <input name="graduation_end_date" value="{{$education->graduation_end_date}}" type="date" class="form-control">
                        @error('graduation_end_date')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Education Detail</button>
    </form>
@endsection
