@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<form action="{{ route('users.store') }}" method="post" class="col-md-4 form">
    @csrf
    <div class="form-group">Username
        <input type="text" name="name" id="name" placeholder="Username" require class="form-control">
    </div>
    <div class="form-group">Type Utilisateur
        <select name="usertype_id" id="" class="form-control">
            @foreach($usertypes as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">Email
        <input type="email" name="email" id="" required class="form-control" placeholder="Email">
    </div>
    <div class="form-group">Mot de passe
        <input type="password" name="password" id="" required class="form-control" placeholder="mot de passe">
    </div>
    <div class="form-group">
        <button class="btn btn-success">Ajouter</button>
    </div>
</form>

@endsection