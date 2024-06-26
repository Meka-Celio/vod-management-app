@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<p><a href="{{ route('operations.create') }}" class="btn btn-success">Ajouter une opération</a></p>

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

<!-- Operations table -->
<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="text-warning">Les opérations</h6>
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table-database">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Noms Opérations</th>
                        <th>Date création</th>
                        <th>Modifié le</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($operations as $ope)
                    <tr>

                        <td>
                            {{ $ope->id }}
                        </td>
                        <td>
                            {{ $ope->name }}
                        </td>
                        <td>
                            {{ $ope->created_at }}
                        </td>
                        <td>
                            {{ $ope->updated_at }}
                        </td>
                        <td>
                            <a href="{{ route('operations.show', $ope->id) }}" class="btn btn-info">Détail</a>
                        </td>
                        <td>
                            <a href="{{ route('operations.edit', $ope->id) }}" class="btn btn-warning">Modifier</a>
                        </td>
                        <td>
                            <form action="{{ route('operations.destroy', $ope->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="delete_item btn btn-danger" data-id="{{ $ope->id }}">Supprimer</button>
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
<!-- / operations tables -->


@endsection