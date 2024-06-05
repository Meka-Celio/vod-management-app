<h1>Une opération</h1>

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
        <tr>
            <td>
                {{ $operation->id }}
            </td>
            <td>
                {{ $operation->name }}
            </td>
            <td>
                {{ $operation->created_at }}
            </td>
            <td>
                {{ $operation->updated_at }}
            </td>
        </tr>
        <tr>
            <td><a href="{{ route('operations.index') }}">Les opérations</a></td>
        </tr>
    </tbody>
</table>