
@extends('layouts.admin')


@section('content')


    <div class="container">
        <div class="text-center my-5">
            <h1>Inserisci un nuovo Progetto</h1>
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

            <form class="my-3" action="{{ route('admin.projects.store') }}" method="POST">
                @csrf
                <input
                  class="form-control w-50 @error ('title') is-invalid @enderror" placeholder="Titolo"
                  type="text"
                  name="title"
                  value="{{ old('title') }}"
                >
                @error('title')
                    <h6 class="text-danger">{{ $message }}</h6>
                @enderror


                <select class="form-select w-50 mt-3" name="type_id">
                    <option value="">Selected Type</option>
                    @foreach ($types as $type)
                        <option
                          value="{{ $type->id }}"
                          @if (old('type_id') == $type->id) selected @endif
                        >
                          {{ $type->name }}
                        </option>
                    @endforeach
                </select>


                <textarea class="form-control w-50 my-4" placeholder="Descrizione" name="description" cols="30" rows="5" name="description"></textarea>

                <button class="btn btn-success" type="submit">aggiungi</button>
            </form>
        </div>
    </div>

@endsection
