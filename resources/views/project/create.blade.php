@extends('layouts.app')

@section('content')
    <div class="container mb-4">

        <div class="header-page  pb-2 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Crea un nuovo post</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.Projects.index') }}" class="btn btn-primary" as="button">Torna alla lista</a>
                </div>
            </div>

        </div>
        @include('shared.errors')
        <form action="{{ route('admin.Projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="project-title" class="form-label">Titolo del post</label>
                <input type="text" class="form-control" id="post-title" name="title" value="{{ old('title') }}">
            </div>


            <div class="mb-3">
                <label for="project-type_id" class="form-label">type del post - {{ old('type_id') }}</label>
                <select class="form-select" aria-label="Default select example" name="type_id">
                    <option value="">Seleziona type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id') == $type->id) selected @endif>
                            {{ $type->title }}</option>
                    @endforeach

                </select>
            </div>


            @foreach ($technologies as $tech)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="technologies[]" value="{{ $tech->id }}"
                        id="tech-{{ $tech->id }}"{{ in_array($tech->id, old('technologies', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tech-{{ $tech->id }}">{{ $tech->name }}</label>
                </div>
            @endforeach




            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input class="form-control" type="file" id="img" name="img" value="{{ old('img') }}">

            </div>
            <button class="btn btn-primary">Crea nuovo post</button>
        </form>



    </div>
@endsection
