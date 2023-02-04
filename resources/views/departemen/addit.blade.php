@extends('layouts.base')

@section('header')
    @include('layouts.header')
@endsection

@section('title')
  BUKULA | {{ $action . " " . $title }}
@endsection

@section('content')
       <div id="page-content-wrapper">
        <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5 bg-white rounded-3 position-relative">
                        <form action="
                          @if ($edit==null)
                            {{ route('departemen') }}/add/insert
                          @else
                            {{ route('departemen') }}/{{ $edit->id }}/edit/update
                          @endif  
                        " method="POST">
                          @csrf
                            <h3 class="text-darkpurple mt-3">{{ $action . " " . $title }}</h3>
                            <hr>
                            
                            @if ($edit != null)     
                              <div class="form-group">
                                <label for="id">ID</label>
                                <input type="text" class="form-control" id="id" name="id" value="{{ old("id")??$edit->id??"" }}" readonly placeholder="ID"> 
                                @error('id')
                                <div class="validation-error">
                                  {{ $message }}
                                </div>
                                @enderror
                              </div>
                            @endif
                                
                            <div class="form-group">
                              <label for="nama">Nama</label>
                              <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama')??$edit->nama??"" }}" placeholder="Nama"> 
                              @error('nama')
                              <div class="validation-error">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>
                            
                              <div class="form-group text-center my-4">
                                <button type="submit" class="btn btn-secondary" style="width: 50%">{{ $action }}</button>
                              </div> 
                            </div>
                          </form>
                    </div>
                </div>
            </div>
      </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
