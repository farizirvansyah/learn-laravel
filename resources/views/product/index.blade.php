@extends('app')
@section('content')
    <div class="table-responsive">
        <div align="right" class="mb-3">
            {{-- <a href="{{ route('create') }}" class="btn btn-primary">Tambah Peserta</a> --}}
            <a href="{{ route('product.create') }}" class="btn btn-primary">Create</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category Name</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $value)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $value->category->name }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->price }}</td>
                            <td>{{ $value->photo }}</td>
                            <td>{{ $value->description }}</td>
                            <td>
                                <a href="{{ route('product.edit', $value->id) }}" class="btn btn-success btn-sm">Edit</a> |
                                <form action="{{ route('product.destroy', $value->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
        </table>
    </div>
@endsection