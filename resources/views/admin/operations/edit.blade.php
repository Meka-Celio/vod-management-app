@extends('admin/layouts/layout')

@section('content')

<form action="{{ route('operations.update', $operation->id) }}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $operation->id }}">
    <p>
        <input type="text" name="name" id="name" value="{{ $operation->name }}" placeholder="Nom de l'opération" require>
    </p>
    <p>
        <button>Modifier</button>
    </p>
</form>

@endsection