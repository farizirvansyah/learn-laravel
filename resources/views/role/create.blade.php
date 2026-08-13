@extends('app')
@section('content')
    <form action="{{ route('role.store') }}" method="post" class="form form-control">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="is_active" id="radioDefault1" checked value="1">
            <label class="form-check-label" for="radioDefault1">
                Active
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="is_active" id="radioDefault2" value="0">
            <label class="form-check-label" for="radioDefault2">
                In-Active
            </label>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection