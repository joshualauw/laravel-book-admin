@extends('layouts.base')

@section('header')
    @include('layouts.header')
@endsection

@section('title')
BUKULA | Departemen
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
                        <i class="fas fa-balance-scale"></i> List Departemen
                        @if ($user->access[4]->create || $user->jabatan->access[4]->create)
                            <a href="{{ route('departemen') }}/add">
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
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ($list??[] as $key => $l)
                        <tr>
                            <th scope="row" class="index-col">{{ ++$key }}</th> 
                            <td>{{ $l->id }}</td>
                            <td>{{ $l->nama }}</td>
                            <td class="d-flex justify-content-center gap-1">           
                                <a href="{{ route('departemen') }}/{{ $l->id }}/detail">
                                <button class="btn btn-primary">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                                </a>
                                @if ($user->access[4]->update || $user->jabatan->access[4]->update)
                                    <a href="{{ route('departemen') }}/{{ $l->id }}/edit">
                                        <button class="btn btn-success">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </a>     
                                @endif
                                @if ($user->access[4]->delete || $user->jabatan->access[4]->delete)
                                    <form action="{{ route('departemen') }}/{{ $l->id }}/destroy" method="POST">
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
