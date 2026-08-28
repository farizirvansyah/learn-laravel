@extends('app')
@section('content')
    <form action="{{ route('menu.update', $menu->id) }}" method="post" class="form form-control">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="Name" required value="{{ $menu->name }}">
        </div>

        <div class="mb-3">
            <label for="Parent" class="form-label">Parent Id</label>
            <input type="number" min="1" class="form-control" name="parent_id" id="Parent"
                value="{{ $menu->parent_id }}">
        </div>

        <div class="mb-3">
            <label for="Order" class="form-label">Sort Order</label>
            <input type="number" min="1" class="form-control" name="sort_order" id="Order" required
                value="{{ $menu->sort_order }}">
        </div>

        <div class="mb-3">
            <label for="Url" class="form-label">URL</label>
            <input type="text" class="form-control" name="url" id="Url" value="{{ $menu->url }}">
        </div>

        <div class="mb-3">
            <label for="Icon" class="form-label">Icon</label>
            <input type="text" class="form-control" name="icon" id="Icon" value="{{ $menu->icon }}">
        </div>

        <label class="form-label">Status</label>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="is_active" id="radioDefault1"
                {{ $menu->is_active == 1 ? 'checked' : '' }} value="1">
            <label class="form-check-label" for="radioDefault1">
                Active
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="is_active" id="radioDefault2"
                {{ $menu->is_active == 0 ? 'checked' : '' }} value="0">
            <label class="form-check-label" for="radioDefault2">
                In-Active
            </label>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
