@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="header-page  pb-2 mb-4">
            <div class=" d-flex justify-content-between align-items-center">
                <h1>Aggiorna post</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.Projects.index') }}" class="btn btn-primary" as="button">Torna alla lista</a>
                </div>
            </div>

        </div>

        @include('shared.errors')

        <form action="{{ route('admin.Projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="project-title" class="form-label">Titolo del post</label>
                <input type="text" class="form-control" id="project-title" name="title"
                    value="{{ old('title', $project->title) }}">
            </div>
            <div class="mb-3">

                <label for="project-type_id" class="form-label">type</label>
                <select class="form-select" aria-label="Default select example" name="type_id">
                    <option value="">Seleziona type</option>
                    @foreach ($types as $type)
                        <option value="{{ old('type_id', $type->id) }}" @if (old('type_id') == $type->id) selected @endif>
                            {{ $type->title }}</option>
                    @endforeach

                </select>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input class="form-control" type="file" id="img" name="img" value="{{ old('img') }}">


            </div>
            <button class="btn btn-primary">Aggiorna post</button>
        </form>


    </div>
@endsection
