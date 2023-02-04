@extends('layouts.base')

@section('header')
    @include('layouts.header')
@endsection

@section('title')
BUKULA | Barang
@endsection

@section('content')
       <div id="page-content-wrapper">
        <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row justify-content-between mb-4">
                    <h2 class="col-lg-4 text-darkpurple">
                        <i class="fab fa-dropbox"></i> List Barang

                        @if ($user->access[0]->create || $user->jabatan->access[0]->create)
                            <a href="{{ route('barang') }}/add">
                                <button class="btn btn-secondary text-white"><i class="fas fa-plus"></i></button>
                            </a>
                        @endif
                    </h2>
                    {{-- <h2 class="col-lg-4 mt-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search here..">
                            <button class="btn btn-secondary text-white">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </h2> --}}
                </div>
                <table class="table text-center bg-white rounded-3">
                    <thead>
                      <tr>
                        <th scope="col" class="index-col">#</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">stok</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ($list??[] as $key => $l)
                        <tr>
                            <th scope="row" class="index-col">{{ ++$key }}</th> 
                            <td>{{ $l->kode }}</td>
                            <td>{{ $l->nama }}</td>
                            <td>{{ $l->stok }}</td>
                            <td>{{ $l->jenis_satuan }}</td>
                            <td>{{ $l->kategori->nama }}</td>
                            <td>{{ $l->harga }}</td>
                            <td class="d-flex justify-content-center gap-1">
                                @if ($user->access[0]->update || $user->jabatan->access[0]->update)
                                    <a href="{{ route('barang') }}/{{ $l->kode }}/edit">
                                        <button class="btn btn-success">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </a>
                                @endif
                                @if ($user->access[0]->delete || $user->jabatan->access[0]->delete)
                                    <form action="{{ route('barang') }}/{{ $l->kode }}/destroy" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
      </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
