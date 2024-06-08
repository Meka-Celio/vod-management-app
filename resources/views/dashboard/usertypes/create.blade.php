@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<form action="{{ route('usertypes.store') }}" method="post" class="col-md-4">
    @csrf
    <div class="form-group">
        <input type="text" name="name" id="name" placeholder="Type utilisateur" require class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-success">Ajouter</button>
    </div>
</form>

@endsection