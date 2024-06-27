@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<form action="{{ route('usertypes.update', $usertype->id) }}" method="post" class="col-md-4 form">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $usertype->id }}">
    <div class="form-group">
        <input type="text" name="name" id="name" value="{{ $usertype->name }}" placeholder="Type utilisateur" require class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-success">Modifier</button>
    </div>
</form>

@endsection