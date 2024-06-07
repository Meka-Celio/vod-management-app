@extends('dashboard/layouts/layout')

@section('content')

<h1>Toutes les opérations</h1>

<p><a href="{{ route('operations.create') }}">Ajouter une opération</a></p>

@if ($state === 'ok')
<p>Succès : {{ $msg }}</p>
@elseif ($state === 'ko')
<p>Erreur : {{ $msg }}</p>
@else
@endif

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nom de l'opération</th>
            <th>Créé le</th>
            <th>Date de modification</th>
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
                <a href="{{ route('operations.show', $ope->id) }}">Détail</a>
            </td>
            <td>
                <a href="{{ route('operations.edit', $ope->id) }}">Modifier</a>
            </td>
            <td>
                <form action="{{ route('operations.destroy', $ope->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="delete_item" data-id="{{ $ope->id }}">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
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
@endsection