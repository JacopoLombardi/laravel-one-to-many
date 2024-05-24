
@extends('layouts.admin')


@section('content')


    <div class="container">

        <div class="text-center my-5">
            <h1 class="mb-4">Projects</h1>
            <h2>{{ $project->title }}</h2>
        </div>

        <div>
            <div class="mb-5">
                <label>Titolo:</label>
                <p>{{ $project->title }}</p>
            </div>

            <div class="w-50 mb-5">
                <label>Descrizione:</label>
                <p>{{ $project->description }}</p>
            </div>
        </div>

        <div class="pt-5">
            <a class="btn btn-danger" href="{{ route('admin.projects.index') }}">Torna Indietro</a>
        </div>

@endsection




<style>

    label{
        font-size: 22px;
        font-weight: 600;
    }
    p{
        font-size: 18px;
    }

</style>
