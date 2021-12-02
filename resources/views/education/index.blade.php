@extends('templates.main')

@section('content')

    <h1>Education Summary</h1>

    @foreach($education as $e)

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{$e->degree}}  {{$e->school_name}}  ({{$e->graduation_start_date}} - {{$e->graduation_end_date}}) </h4>

            <a href="{{route('education.edit', $e)}}"  id="" class="btn btn-sm btn-primary" role="button">Edit</a>


            <form action="{{route('education.destroy', $e)}}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')

                <input value="Delete"  type="submit" class="btn btn-sm btn-danger">

            </form>

        </div>
    </div>

    @endforeach

    <a href="{{route('education.create')}}" class="btn btn-primary mt-3 " role="button">Add another Education</a>
    <a href="{{route('experience.index')}}" class="btn btn-primary mt-3 nl-auto" style="float: right" role="button">Continue, Step 3(Experience)</a>

@endsection
