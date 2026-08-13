@extends('app')
@section('content')
    <div class="table-responsive">
        <div align="right" class="mb-3">
            {{-- <a href="{{ route('create') }}" class="btn btn-primary">Tambah Peserta</a> --}}
            <a href="{{ route('role.create') }}" class="btn btn-primary">Create</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $index => $value)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>
                                <a href="{{ route('role.edit', $value->id) }}" class="btn btn-success btn-sm">Edit</a> |
                                <form action="{{ route('role.destroy', $value->id) }}" method="POST" style="display:inline;">
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