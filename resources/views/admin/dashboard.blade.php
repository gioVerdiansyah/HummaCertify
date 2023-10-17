@extends('layouts.nav-admin')

@section('content')

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    tambah peserta
  </button>
<form action="{{ route('certificate.store') }}" method="post">
    @csrf
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="category">Pilih Kategori</label>
                <select name="certificate_categori_id" class="form-control">
                    @foreach ( $category as $categorys)
                        <option value="{{ $categorys->id }}">{{ $categorys->name }}</option>
                    @endforeach
                </select>
       <label for="name">nama peserta</label>
       <input type="text" name="name" class="form-control">
       <label for="name">email peserta</label>
       <input type="email" name="email" class="form-control">
       <label for="name">Nisn</label>
      <input type="number" name="password" class="form-control">
        </div>
        <div class="modal-body">
            <label for="name">tanggal</label>
            <input type="date" name="tanggal" class="form-control">
            <label for="name">divisions</label>
            <input type="text" name="divisions" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>
@foreach ($users as $User )
<form action="{{ route('certificate.update', ['certificate'=>$User->id]) }}" method="post">
@csrf
@method('put')
<div class="modal fade" id="exampleModal--{{ $User->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="category">Pilih Kategori</label>
                <select name="certificate_categori_id" class="form-control">
                    @foreach ( $category as $categorys)
                        <option value="{{ $categorys->id }}">{{ $categorys->name }}</option>
                    @endforeach
                </select>
       <label for="name">nama peserta</label>
       <input type="text" name="name" class="form-control" value="{{ $User->name }}">
       <label for="name">email peserta</label>
       <input type="email" name="email" class="form-control" value="{{ $User->email }}">
       <label for="name">Nisn</label>
       <input type="number" name="password" class="form-control" value="{{ $User->password }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>
</form>
@endforeach
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">categori sertificate</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $User)
      <tr>
        <th scope="row">1</th>
        <td>{{ $User->name }}</td>
        <td>{{ $User->email }}</td>
            <td>
            @foreach ($User->certificates as $certificate)
            @if ($certificate->category === null)
            <p>tidak ada kategori</p>
            @else
            {{ $certificate->category->name }}
            @endif
           @endforeach
           {{-- {{$User->categori->name }} --}}
            </td>
        <td>
            <form action="{{ route('certificate.destroy', ['certificate'=>$User->id]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit"  class="btn btn-danger">hapus</button>
            </form>
        </td>
        <td>
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal--{{ $User->id }}" class="btn btn-warning">edit</button>
        </td>
    </tr>
    @endforeach
    </tbody>
  </table>
@endsection

