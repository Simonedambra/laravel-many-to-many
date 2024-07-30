@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="header-page pb-2 mb-4">
            <div class=" d-flex justify-content-between align-items-center">
                <h1>Lista dei posts</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.Projects.create') }}" class="btn btn-primary" as="button">Crea nuovo</a>
                </div>

            </div>
        </div>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (!count($projects))
            <div class="alert alert-warning">
                Nessun record trovato
            </div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="col">#</th>
                        <th scope="col" class="col-7">title</th>
                        <th scope="col" class="col">types</th>
                        <th scope="col" class="col-2 text-right"></th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>
                                @if ($project->img)
                                    <a href="#" class="btn btn-sm btn-secondary me-3"><i
                                            class="fa-solid fa-image"></i></a>
                                @endif
                                {{ $project->title }}


                            <td>
                                @if ($project->type?->title)
                                    {{ $project->type->title }}
                                @else
                                    non sono presenti type
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="{{ route('admin.Projects.show', $project) }}" as="button"
                                        class="btn btn-info btn-sm"><i class="fa-solid fa-magnifying-glass"></i></a>
                                    <a href="{{ route('admin.Projects.edit', $project) }}" as="button"
                                        class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>

                                    <form action="{{ route('admin.Projects.destroy', $project) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger  btn-sm"><i class="fa-solid fa-bomb"></i></button>

                                    </form>
                                    {{-- <a href="{{ route('admin.posts.destroy', $post) }}" as="button" class="btn btn-danger"><i
                                        class="fa-solid fa-bomb"></i></a> --}}



                                </div>

                            </td>
                        </tr>
                    @endforeach




                </tbody>
            </table>
        @endif

    </div>
@endsection
