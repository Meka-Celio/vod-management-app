@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<form action="{{ route('operations.update', $operation->id) }}" method="post" class="col-md-4 form">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $operation->id }}">
    <div class="form-group">
        <input type="text" name="name" id="name" value="{{ $operation->name }}" placeholder="Nom de l'opération" require class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-warning">Modifier</button>
    </div>
</form>

@endsection