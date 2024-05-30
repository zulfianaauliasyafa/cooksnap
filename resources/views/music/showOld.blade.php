@extends('layoutadmin.template')
  
@section('content')

<div class="container mt-5">
    <h1>View Resep</h1>

    <div class="form-group">
        <label>Nama Musik:</label>
        <p>{{ $resep->nama_musik }}</p>
    </div>
    <div class="form-group">
        <label>Level:</label>
        <p>{{ $resep->level }}</p>
    </div>
    <div class="form-group">
        <label>Image:</label>
        @if ($resep->image)
            <img src="{{ asset($resep->image) }}" alt="{{ $resep->nama_musik }}" width="150">
        @endif
    </div>
    <div class="form-group">
        <label>Lirik:</label>
        <p>{{ $resep->lirik }}</p>
    </div>
    <div class="form-group">
        <label>Link:</label>
        <p>{{ $resep->link }}</p>
    </div>
    <a href="{{ route('reseps.index') }}" class="btn btn-primary">Back to List</a>
</div>

@endsection