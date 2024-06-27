@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<p><a href="{{ route('movies.create') }}" class="btn btn-success">Ajouter un movie</a></p>

@if ($state === 'ok')
<div class="alert bg-vod-success">
    <p class="text-alert">Succès : {{ $msg }}</p>
</div>
@elseif ($state === 'ko')
<div class="alert bg-vod-danger">
    <p class="text-alert">Erreur : {{ $msg }}</p>
</div>
@else
@endif

<!-- movies table -->
<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="text-warning">Les movies</h6>
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table-database">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Affiche</th>
                        <th>Movie name code</th>
                        <th>Movie Name</th>
                        <th>Sortie le</th>
                        <th>Durée du film</th>
                        <th>Age recommandé</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                    <tr>
                        <td>
                            {{ $movie->id }}
                        </td>
                        <td>
                            <img src="{{ asset($movie->cover) }}" alt="{{ $movie->name }}" width="70px">
                        </td>
                        <td>
                            {{ $movie->name }}
                        </td>
                        <td>
                            {{ $movie->display_name }}
                        </td>
                        <td>
                            {{ $movie->release_date }}
                        </td>
                        <td>
                            {{ $movie->runtime }} min
                        </td>
                        <td>
                            PG-{{ $movie->rating }}
                        </td>
                        <td>
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info">voir</a>
                        </td>
                        <td>
                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Modifier</a>
                        </td>
                        <td>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="delete_item btn btn-danger" data-id="{{ $movie->id }}">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <!-- Script pour la suppression -->
                <script>
                    let delete_item_forms = document.querySelectorAll('form')
                    for (let i = 0; i < delete_item_forms.length; i++) {
                        delete_item_forms[i].addEventListener('submit', (event) => {
                            let confirm_delete = confirm("Voulez-vous supprimer cet élément ?")
                            if (!confirm_delete) {
                                event.preventDefault()
                            }
                        })
                    }
                </script>
            </table>
        </div>
    </div>
</div>
<!-- / movies tables -->
@endsection