@extends('templates.main')

@section('content')

    <h1>Resume Summary</h1>

    @foreach( $detail as $e)

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$e->fullname}} {{$e->email}} {{$e->phone}}  </h4>


                <a href="{{route('resume.edit', $e)}}"  class="btn btn-sm btn-primary" role="button">Edit</a>


                <form action="{{route('resume.destroy', $e)}}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')

                    <input value="Delete"  type="submit" class="btn btn-sm btn-danger">

                </form>

            </div>
        </div>

    @endforeach

    <a href="{{route('resume.create')}}" class="btn btn-primary mt-3  " role="button">Create another Details for resume</a>
    <a href="{{route('education.index')}}" class="btn btn-primary mt-3 nl-auto" style="float: right" role="button">Continue, Step 2(Education) </a>

@endsection
