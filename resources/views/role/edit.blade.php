@extends('app')
@section('content')
    <form action="{{ route('role.update', $role->id) }}" method="post" class="form form-control">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" required value="{{ $role->name }}">
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="is_active" id="radioDefault1" {{ $role->is_active == 1 ? 'checked' : '' }} value="1">
            <label class="form-check-label" for="radioDefault1">
                Active
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="is_active" id="radioDefault2" {{ $role->is_active == 0 ? 'checked' : '' }} value="0">
            <label class="form-check-label" for="radioDefault2">
                In-Active
            </label>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection