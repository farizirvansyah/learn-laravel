@extends('app')
@section('content')
    <div class="table-responsive">
        <div align="right" class="mb-3">
            {{-- <a href="{{ route('create') }}" class="btn btn-primary">Tambah Peserta</a> --}}
            <a href="{{ route('menu.create') }}" class="btn btn-primary">Create</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Icon</th>
                    <th>Name</th>
                    <th>Parent Id</th>
                    <th>Sort Order</th>
                    <th>URL</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $index => $v)
                    <tr>
                        <td>{{ $index += 1 }}</td>
                        <td>{{ $v->icon }}</td>
                        <td>{{ $v->name }}</td>
                        <td>{{ $v->parent_id }}</td>
                        <td>{{ $v->sort_order }}</td>
                        <td>{{ $v->url }}</td>
                        <td>
                            <a href="{{ route('menu.edit', $v->id) }}" class="btn btn-success btn-sm">Edit</a> |
                            <form action="{{ route('menu.destroy', $v->id) }}" method="POST" style="display:inline;">
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
