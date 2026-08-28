@extends('app')
@section('content')
    <form action="{{ route('menu.store') }}" method="post" class="form form-control">
        @csrf
        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="Name" required>
        </div>

        <div class="mb-3">
            <label for="Parent" class="form-label">Parent Id</label>
            <input type="number" min="1" class="form-control" name="parent_id" id="Parent">
        </div>

        <div class="mb-3">
            <label for="Order" class="form-label">Sort Order</label>
            <input type="number" min="1" class="form-control" name="sort_order" id="Order" required>
        </div>

        <div class="mb-3">
            <label for="Url" class="form-label">URL</label>
            <input type="text" class="form-control" name="url" id="Url">
        </div>

        <div class="mb-3">
            <label for="Icon" class="form-label">Icon</label>
            <input type="text" class="form-control" name="icon" id="Icon">
        </div>

        <label class="form-label">Status</label>
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
