@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<p><a href="{{ route('usertypes.create') }}" class="btn btn-success">Ajouter un usertype</a></p>

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

<!-- usertypes table -->
<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="text-warning">Les usertypes</h6>
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table-database">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom du usertype</th>
                        <th>Créé le</th>
                        <th>Date de modification</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usertypes as $ustype)
                    <tr>
                        <td>
                            {{ $ustype->id }}
                        </td>
                        <td>
                            {{ $ustype->name }}
                        </td>
                        <td>
                            {{ $ustype->created_at }}
                        </td>
                        <td>
                            {{ $ustype->updated_at }}
                        </td>
                        <td>
                            <a href="{{ route('usertypes.edit', $ustype->id) }}" class="btn btn-warning">Modifier</a>
                        </td>
                        <td>
                            <form action="{{ route('usertypes.destroy', $ustype->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="delete_item btn btn-danger" data-id="{{ $ustype->id }}">Supprimer</button>
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
<!-- / usertypes tables -->
@endsection