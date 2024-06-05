@extends('admin/layouts/template')

@section('content')

<form action="{{ route('operations.store') }}" method="post">
    @csrf
    <p>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <button>Ajouter</button>
    </p>
</form>

@endsection