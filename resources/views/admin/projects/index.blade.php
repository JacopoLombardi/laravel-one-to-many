
@extends('layouts.admin')


@section('content')


    <div class="container">

        <div class="text-center my-4">
            <h1>Projects</h1>
        </div>



        {{-- messaggio in caso di aggiunta corretta di un Project --}}
        @if (session('error'))
            <div class="alert alert-danger text-center w-50 mb-5" role="alert">
                {{ session('error') }}
            </div>
        @endif
        {{-- /////////////////// --}}


        <div class="container_table">
            <table class="table w-75">
                <thead>
                    <tr class="fs-5">
                        <th scope="col">Titolo</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->title }}</td>

                            <td>{{ $project->description }}</td>

                            <td>
                                <div class="d-flex">
                                    <a
                                      href="{{ route('admin.projects.show', $project) }}"
                                      class="btn btn-success me-2 h-50"
                                      ><i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a
                                      href="{{ route('admin.projects.edit', $project) }}"
                                      class="btn btn-warning me-2 h-50"
                                      ><i class="fa-solid fa-pencil"></i>
                                    </a>


                                    <form
                                      action="{{ route('admin.projects.destroy', $project) }}"
                                      method="POST"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>



@endsection

