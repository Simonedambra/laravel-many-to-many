@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="header-page  pb-2 mb-4">
            <div class=" d-flex justify-content-between align-items-center">
                <h1>{{ $project->title }}</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.Projects.index') }}" class="btn btn-primary" as="button">Torna
                        alla
                        lista</a>
                    <a href="{{ route('admin.Projects.edit', $project) }}" class="btn btn-primary" as="button">Modifica</a>
                </div>
            </div>
        </div>

        <p>


        </p>
        <hr>
        Category:@if ($project->type?->title)
            {{ $project->type->title }}
        @else
            non sono presenti type
        @endif

        <hr>
        @if ($project->img)
            <div>
                <img src="{{ asset('storage/' . $project->img) }}">
            </div>
        @endif






    </div>
@endsection
