@extends('app')
@section('content')
    <div class="table-responsive">
        <div align="right" class="mb-3">
            {{-- <a href="{{ route('create') }}" class="btn btn-primary">Tambah Peserta</a> --}}
            <a href="{{ url('create') }}" class="btn btn-primary">Tambah Peserta</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Usia</th>
                    {{-- <th>Email</th>
                    <th>Address</th> --}}
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesertas as $index => $value)
                    <tr>
                        <td>{{ $index += 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->age }}</td>
                        {{-- <td>{{ $value->email }}</td>
                        <td>{{ $value->address }}</td> --}}
                        <td>
                            <a href="{{ route('edit.peserta', $value->id) }}" class="btn btn-success btn-sm">Edit</a> |
                            <form action="{{ route('delete.peserta', $value->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection