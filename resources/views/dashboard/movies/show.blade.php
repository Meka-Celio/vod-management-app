@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<p>
    <a href="{{ route('movies.index') }}" class="text-warning">Movies</a> > Film : {{ $movie->name }}
</p>
<!-- /content -->
<div class="col-md-12 movie pos-rel">
    <div class="banner-movie pos-ab">
        <img src="{{ asset($movie->banner) }}" alt="" class="">
    </div>
    <div class="movie-detail card col-md-10  shadow mb-4 bg-vod-dark-mode pos-rel" style="margin:0 auto;">
        <div class="card-header">
            <h3 class="text-warning">{{ $movie->display_name }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 movie-info">
                    <h6 class="text-warning">Synopsis</h6>
                    <p>
                        {{ $movie->synopsis }}
                    </p>
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="text-warning">Directed By</h6>
                            <p>{{ $movie->directed_by }}</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-warning">Durée</h6>
                            <p>{{ $movie->runtime }} min</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-warning">Sortie le</h6>
                            <p>{{ $movie->release_date }}</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-warning">Limite age</h6>
                            <p>PG-{{ $movie->rating }}</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-warning">Prix</h6>
                            <p>{{ $movie->selling_price }} DH</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-warning">Location</h6>
                            <p>{{ $movie->rental_price }} DH</p>
                        </div>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Modifier le film</a>
                    </div>
                </div>
                <div class="col-md-4 movie-cover">
                    <img src="{{ asset($movie->cover) }}" alt="" width="100%">
                </div>
            </div>
        </div>
    </div>

</div>

@endsection