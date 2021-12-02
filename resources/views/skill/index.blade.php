@extends('templates.main')

@section('content')

    <h1>Skill Summary</h1>

    @foreach( $skill as $e)

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$e->name}} {{$e->rating}}  </h4>


                <a href="{{route('skill.edit', $e)}}"  class="btn btn-sm btn-primary" role="button">Edit</a>


                <form action="{{route('skill.destroy', $e)}}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')

                    <input value="Delete"  type="submit" class="btn btn-sm btn-danger">

                </form>

            </div>
        </div>

    @endforeach

    <a href="{{route('skill.create')}}" class="btn btn-primary mt-3 " role="button">Add another Skill</a>
    <a type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" style="float: right" data-bs-target="#exampleModal">
        Preview
    </a>

@endsection
