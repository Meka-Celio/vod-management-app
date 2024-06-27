@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<div class="row">
    <form action="{{ route('movies.update', $movie->id) }}" method="post" class="col-md-8 form">
        @csrf
        @method('PUT')
        <!-- Names -->
        <input type="hidden" name="id" value="{{ $movie->id }}">
        <div class="row">
            <div class="form-group col-md-6">Movie name code
                <input type="text" name="name" id="name" placeholder="Movie name" required class="form-control" value="{{ $movie->name }}">
            </div>
            <div class="form-group col-md-6">Display Name
                <input type="text" name="display_name" id="display_name" placeholder="Display name" required class="form-control" value="{{ $movie->display_name }}">
            </div>
        </div>
        <div class=" form-group">Synopsis
            <textarea name="synopsis" id="synopsis" class="form-control" placeholder="synopsis" required value="{{ $movie->synopsis }}"></textarea>
        </div>

        <div class=" form-group">Directed_by
            <input type="text" name="directed_by" id="directed_by" placeholder="directed_by" required class="form-control" value="{{ $movie->directed_by }}">
        </div>
        <!-- PG, release and rutime -->
        <div class=" row">
            <div class="form-group col-md-4">Release Date
                <input type="date" name="release_date" id="release_date" class="form-control" required value="{{ $movie->release_date }}">
            </div>
            <div class=" form-group col-md-4">Runtime
                <input type="number" name="runtime" id="runtime" required class="form-control" value="{{ $movie->runtime }}">
            </div>
            <div class=" form-group col-md-4">PG
                <input type="number" name="rating" id="rating" class="form-control" min="1" required value="{{ $movie->rating }}">
            </div>
        </div>
        <!-- Prices -->
        <div class=" row">
            <div class="form-group col-md-6">Selling Price
                <input type="number" name="selling_price" id="selling_price" required class="form-control" min="1" value="{{ $movie->selling_price }}">
            </div>
            <input type="hidden" name="rental_price" id="rental_price" min="1" value="10">
        </div>
        <div class="form-group">
            <button class="btn btn-success">Ajouter</button>
        </div>
    </form>

    <div class="col-md-4">
        <form action="{{ route('movies.upload', $movie->id) }}" method="post" class="form col-md-12" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $movie->id }}">
            <input type="hidden" name="element" value="cover">
            <div class="form-group">Cover
                <input type="file" name="file" id="file" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Modifier cover</button>
            </div>
        </form>
        <form action="{{ route('movies.upload', $movie->id) }}" method="post" class="form col-md-12" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $movie->id }}">
            <input type="hidden" name="element" value="banner">
            <div class="form-group">Banner
                <input type="file" name="file" id="file" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Modifier banner</button>
            </div>
        </form>
    </div>
</div>


@endsection