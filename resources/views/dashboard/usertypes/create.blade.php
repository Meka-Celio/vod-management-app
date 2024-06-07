@extends('back/layouts/layout')

@section('content')

<form action="{{ route('usertypes.store') }}" method="post">
    @csrf
    <p>
        <input type="text" name="name" id="name" placeholder="Type d'utilisateur" require>
    </p>
    <p>
        <button>Ajouter</button>
    </p>
</form>

@endsection