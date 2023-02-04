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
                        {{-- <div class="form-back">
                            <a href="{{ route('barang') }}" style="color: black"><span>&times;</span></a>
                        </div> --}}
                        <form action="
                          @if ($edit==null)
                            {{ route('barang') }}/add/insert
                          @else
                            {{ route('barang') }}/{{ $edit->kode }}/edit/update
                          @endif  
                        " method="POST">

                            @csrf
                            <h3 class="text-darkpurple mt-3">{{ $action . " " . $title }}</h3>
                            <hr>

                             @if ($edit != null)     
                              <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control" id="kode" name="kode" value="{{ old("kode")??$edit->kode??"" }}" readonly placeholder="Kode"> 
                                @error('kode')
                                <div class="validation-error">
                                  {{ $message }}
                                </div>
                                @enderror
                              </div>
                            @endif

                            <div class="form-group">
                              <label for="nama">Nama</label>
                              <input type="text" class="form-control" id="nama" name="nama" value="{{ old("nama")??$edit->nama??"" }}" placeholder="Enter nama"> 
                              @error('nama')
                              <div class="validation-error">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>

                            <div class="form-group">
                              <label for="stok">Stok</label>
                              <input type="number" class="form-control" id="stok" name="stok" value="{{ old("stok")??$edit->stok??"" }}" placeholder="Enter Stok">
                              @error('stok')
                              <div class="validation-error">
                                {{ $message }}
                              </div>
                              @enderror
                            </div> 

                            <div class="form-group">
                                <label for="jenis-satuan">jenis satuan</label>
                                <input type="text" class="form-control" id="jenis-satuan" name="jenis_satuan" value="{{ old("jenis_satuan")??$edit->jenis_satuan??"" }}" placeholder="jenis satuan">
                                @error('jenis_satuan')
                                <div class="validation-error">
                                  {{ $message }}
                                </div>
                                @enderror
                            </div> 

                            <div class="form-group">
                              <label for="kategori">Kategori</label>
                              <select name="kategori" id="kategori" class="form-control">  
                                    @foreach ($list??[] as $l)
                                    @if ($edit==null)
                                      <option value="{{ old("kategori")??$l->id }}">{{ $l->nama }}</option>   
                                    @else
                                      @if ($l->id == $edit->kategori_id)
                                        <option value="{{ old("kategori")??$l->id }}" selected>{{ $l->nama }}</option>   
                                      @else
                                        <option value="{{ old("kategori")??$l->id }}">{{ $l->nama }}</option>   
                                      @endif
                                    @endif       
                                  @endforeach                                
                              </select>
                              @error('kategori')
                              <div class="validation-error">
                                {{ $message }}
                              </div>
                              @enderror
                            </div> 

                              <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" value="{{ old("harga")??$edit->harga??"" }}" placeholder="Enter harga">
                                @error('harga')
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
