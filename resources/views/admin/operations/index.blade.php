@extends('admin/layouts/template')

@section('content')

<h1>Toutes les opérations</h1>

<p><a href="{{ route('operations.create') }}">Ajouter une opération</a></p>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nom de l'opération</th>
            <th>Créé le</th>
            <th>Date de modification</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($operations as $ope)
        <tr>

            <td>
                {{ $ope->id }}
            </td>
            <td>
                {{ $ope->operation_name }}
            </td>
            <td>
                {{ $ope->created_at }}
            </td>
            <td>
                {{ $ope->updated_at }}
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

@endsection