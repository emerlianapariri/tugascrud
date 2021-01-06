@extends('layout/main')

@section('title', 'Daftar Mahasiswa')

@section('container')
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Daftar Mahasiswa</h1>

            <a href="/students/create" class="btn btn-primary my-3">Tambah Data Mahasiswa</a>

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $s)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $s->nama }}</td>
                        <td>{{ $s->jurusan }}</td>
                        <td>
                            <a href="/students/{{ $s->id }}" class="btn btn-info">Detail</a>

                            <form action="/students/{{ $s->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection