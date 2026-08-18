@extends('app')
@section('content')
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" class="form form-control">
        @csrf
        <div class="mb-3">
            <label for="Category_id" class="form-label">Category</label>
            <select name="category_id" id="Category_id" class="form-control" required>
                <option value="">-- Select One --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" class="form-control">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="Name">
        </div>

        <div class="mb-3">
            <label for="Price" class="form-label">Price</label>
            <input type="number" min="1" class="form-control" name="price" id="Price">
        </div>

        <div class="mb-3">
            <label for="Photo" class="form-label">Photo</label>
            <input type="file" class="form-control" name="photo" id="Photo">
        </div>

        <div class="mb-3">
            <label for="Description" class="form-label">Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control" id="Description"></textarea>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection