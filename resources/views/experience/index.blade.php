@extends('templates.main')

@section('content')

    <h1>Work Summary</h1>

    @foreach( $experience as $e)

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$e->job_title}} ({{$e->start_date}} - {{$e->end_date}}) </h4>

                <ul>
                    <li>{{$e->employer}}</li>
                    <li>{{$e->city}}</li>
                    <li>{{$e->state}}</li>
                </ul>

                <a href="{{route('experience.edit', $e)}}"  id="" class="btn btn-sm btn-primary" role="button">Edit</a>


                <form action="{{route('experience.destroy', $e)}}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')

                    <input value="Delete"  type="submit" class="btn btn-sm btn-danger">

                </form>

            </div>
        </div>

    @endforeach

    <a href="{{route('experience.create')}}" class="btn btn-primary mt-3" role="button">Add another Experience</a>
    <a href="{{route('skill.create')}}" class="btn btn-primary mt-3 nl-auto" style="float: right" role="button">Continue, Step 4(Skills)</a>

@endsection
