@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<form action="{{ route('movies.store') }}" method="post" class="col-md-6 form">
    @csrf
    <!-- Names -->
    <div class="row">
        <div class="form-group col-md-6">Movie name code
            <input type="text" name="name" id="name" placeholder="Movie name" class="form-control" required>
        </div>
        <div class="form-group col-md-6">Display Name
            <input type="text" name="display_name" id="display_name" placeholder="Display name" required class="form-control">
        </div>
    </div>
    <div class="form-group">Synopsis
        <textarea name="synopsis" id="synopsis" class="form-control" placeholder="synopsis" required></textarea>
    </div>

    <div class="form-group">Directed_by
        <input type="text" name="directed_by" id="directed_by" placeholder="directed_by" required class="form-control">
    </div>
    <!-- PG, release and rutime -->
    <div class="row">
        <div class="form-group col-md-4">Release Date
            <input type="date" name="release_date" id="release_date" class="form-control" required>
        </div>
        <div class="form-group col-md-4">Runtime
            <input type="number" name="runtime" id="runtime" required class="form-control">
        </div>
        <div class="form-group col-md-4">PG
            <input type="number" name="rating" id="rating" class="form-control" min="1" required>
        </div>
    </div>
    <!-- Prices -->
    <div class="row">
        <div class="form-group col-md-12">Selling Price
            <input type="number" name="selling_price" id="selling_price" required class="form-control" min="1">
            <input type="hidden" name="rental_price" id="rental_price" required class="form-control" min="1" value="10">
        </div>
    </div>
    <!-- cover & banner -->
    <!-- <div class="row">
        <div class="form-group col-md-6">Cover
            <input type="file" name="cover" id="cover" class="form-control">
        </div>
        <div class="form-group col-md-6">Banner
            <input type="file" name="banner" id="banner" class="form-control">
        </div>
    </div> -->
    <div class="form-group">
        <button class="btn btn-success">Ajouter</button>
    </div>
</form>

@endsection