@extends('templates.main')

@section('content')
   <div class="container" style="text-align: center; margin-top: 150px">
    <h1>Only 2% of resumes make it past the first round. Be in the top 2%</h1>
     <p>Use professional field-tested resume templates that follow the exact ‘resume rules’ employers look for. Easy to use and done within minutes - try now for free!</p>
    <a href="{{route('resume.create')}}" class="btn btn-primary mt-3  " role="button">Create My Resume</a>
   </div>
@endsection
