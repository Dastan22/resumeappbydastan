<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'UserDetail App by Dastan') }}</title>


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- JS -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <style>
            .active{
                font-weight: bolder;
            }
        </style>
        </head>
    <body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">{{config('app.name', 'UserDetail App by Dastan')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        @can('logged-in')
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Preview
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe src="{{route('resume.index')}}"  width="100%" height="900"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="{{route('resume.index')}}" name="" id="" class="btn btn-primary" role="button">Download</a>
                        </div>
                    </div>
                </div>
            </div>
            @endcan

                <div class="form-inline my-2 my-lg-0">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ route('user.profile') }}" >Profile</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                    @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
        </div>
    </nav>

@can('logged-in')
    <nav class="navbar sub-nav navbar-expand-lg ">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('resume.create')}}"> My Resume</a>
                    </li>
                   @can('is-admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.users.index')}}">Users</a>
                    </li>
                    @endcan

                </ul>

            </div>
        </div>
    </nav>


        <main class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item {{ (request()->is('user/resume')) ? 'active' : '' }}"><a href="{{route('resume.store')}}">Heading</a></li>
                    <li class="breadcrumb-item {{ (request()->is('education')) ? 'active' : '' }}"><a href="{{route('education.index')}}">Education</a></li>
                    <li class="breadcrumb-item {{ (request()->is('experience')) ? 'active' : '' }}"><a href="{{route('experience.index')}}">Experience</a></li>
                    <li class="breadcrumb-item {{ (request()->is('skill')) ? 'active' : '' }}"><a href="{{route('skill.index')}}">Skills</a></li>
                </ol>
            </nav>
            @endcan
            @include('templates.alerts')
            @yield('content')

        </main>

    </body>
</html>
