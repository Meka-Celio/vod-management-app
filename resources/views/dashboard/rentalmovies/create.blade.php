@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<form action="{{ route('rentalmovies.store') }}" method="post" class="col-md-8 form">
    @csrf
    <input type="hidden" name="account_id" value="{{ $account->id }}">
    <input type="hidden" name="operation_id" value="2">
    <div class="form-group">Choisir un film
        <div class="table">
            <table class="table-database">
                <thead>
                    <tr>
                        <th>/</th>
                        <th>Affiche</th>
                        <th>Film</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                    <tr>
                        <td>
                            <input type="radio" name="movie_id" id="movie_id" value="{{ $movie->id }}">
                        </td>
                        <td>
                            <img src="{{ asset($movie->cover) }}" alt="" width="60px">
                        </td>
                        <td>
                            {{ $movie->display_name }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="form-group">Date début location
        <input type="date" name="start_rental" id="" class="form-control">
    </div>
    <p>Durée de location : 3 jours</p>
    <div class="form-group">
        <button class="btn btn-success">Ajouter</button>
    </div>
</form>

@endsection