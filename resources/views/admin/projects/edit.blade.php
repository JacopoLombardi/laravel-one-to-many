
@extends('layouts.admin')


@section('content')


    <div class="container">
        <div class="text-center my-5">
            <h1>Modifica il Progetto {{ $project->title }}</h1>
        </div>


        {{-- messaggi in caso di errori nella compilazione degli input --}}
        @if ($errors->any())
        <div class="alert alert-danger text-center w-50 pb-0" role="alert">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- progetto già esistente --}}
        @if (session('error'))
            <div class="alert alert-danger text-center w-50 mb-5" role="alert">
                {{ session('error') }}
            </div>
        @endif
        {{-- /////////////////// --}}


        <div>
            <h5>Aggiungi un Progetto:</h5>

            <form class="my-3" action="{{ route('admin.projects.update', $project) }}" method="POST">
                @csrf
                @method('PUT')
                <input
                  class="form-control w-50 @error ('title') is-invalid @enderror" placeholder="Titolo"
                  type="text"
                  name="title"
                  value="{{ old('title', $project->title) }}"
                >

                @error('title')
                    <h6 class="text-danger">{{ $message }}</h6>
                @enderror

                <textarea
                  class="form-control w-50 my-4"
                  placeholder="Descrizione"
                  name="description"
                  cols="30"
                  rows="5"
                  name="description">{{ $project->description }}
                </textarea>

                <button class="btn btn-success" type="submit">modifica</button>
            </form>
        </div>
    </div>

@endsection
