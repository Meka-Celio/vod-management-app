@extends('admin/layouts/layout')

@section('content')

<form action="{{ route('operations.store') }}" method="post">
    @csrf
    <p>
        <input type="text" name="name" id="name" placeholder="Nom de l'opération" require>
    </p>
    <p>
        <button>Ajouter</button>
    </p>
</form>

@endsection