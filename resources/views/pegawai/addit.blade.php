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
                            <a href="{{ route('pegawai') }}" style="color: black"><span>&times;</span></a>
                        </div> --}}
                        <form action="
                          @if ($edit==null)
                            {{ route('pegawai') }}/add/insert
                          @else
                            {{ route('pegawai') }}/{{ $edit->nik }}/edit/update
                          @endif  
                        " method="POST">

                            @csrf
                            <h3 class="text-darkpurple mt-3">{{ $action . " " . $title }}</h3>
                            <hr>
                          
                            @if ($edit != null)     
                              <input type="hidden" id="idpeg" value="{{ $edit->nik }}">
                              <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="{{ old("nik")??$edit->nik??"" }}" readonly placeholder="nik"> 
                                @error('nik')
                                <div class="validation-error">
                                  {{ $message }}
                                </div>
                                @enderror
                              </div>
                            @endif

                            <div class="form-group">
                              <label for="username">Username</label>
                              <input type="text" class="form-control" id="username" name="username" value="{{ old('username')??$edit->username??"" }}" placeholder="Enter username"> 
                              @error('username')
                              <div class="validation-error">
                                {{ $message }}
                              </div>
                              @enderror  
                            </div>

                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" id="password" name="password" value="{{ old('password')??$edit->password??"" }}" placeholder="Password">         
                              @error('password')
                              <div class="validation-error">
                                {{ $message }}
                              </div>
                              @enderror  
                            </div> 

                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama')??$edit->nama??"" }}" placeholder="Nama Lengkap">
                                @error('nama')
                                <div class="validation-error">
                                  {{ $message }}
                                </div>
                                @enderror  
                            </div> 

                            <div class="form-group">
                              <label for="departemen_id">departemen</label>
                              <select name="departemen_id" id="departemen_id" class="form-control">  
                                    <option value="{{ null }}" selected>Choose..</option>
                                    @foreach ($listd??[] as $l)
                                    @if ($edit==null)
                                      <option value="{{ old('departemen_id')??$l->id }}">{{ $l->nama }}</option>   
                                    @else
                                      @if ($l->id == $edit->departemen_id)
                                        <option value="{{ $l->id }}" selected>{{ $l->nama }}</option>   
                                      @else
                                        <option value="{{ $l->id }}">{{ $l->nama }}</option>   
                                      @endif
                                    @endif       
                                  @endforeach                                
                              </select>
                              @error('departemen_id')
                              <div class="validation-error">
                                {{ $message }}
                              </div>
                              @enderror
                            </div> 

                            <div class="form-group">
                              <label for="jabatan_id">Jabatan</label>
                              <select name="jabatan_id" id="jabatan_id" class="form-control">  
                                <option value="{{ null }}" selected>Choose..</option>
                                @foreach ($list??[] as $l)
                                  @if ($edit==null)
                                    <option value="{{ old('jabatan_id')??$l->id }}">{{ $l->nama }}</option>   
                                  @else
                                    @if ($l->id == $edit->jabatan_id)
                                      <option value="{{ $l->id }}" selected>{{ $l->nama }}</option>   
                                    @else
                                      <option value="{{ $l->id }}">{{ $l->nama }}</option>   
                                    @endif
                                  @endif       
                                @endforeach            
                              </select>
                              @error('jabatan_id')
                              <div class="validation-error">
                                {{ $message }}
                              </div>
                              @enderror
                            </div> 

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat')??$edit->alamat??"" }}" placeholder="alamat">
                                        @error('alamat')
                                        <div class="validation-error">
                                          {{ $message }}
                                        </div>
                                        @enderror 
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="no-telp">No Telp</label>
                                        <input type="text" class="form-control" id="no-telp" name="no_telp" value="{{ old('no_telp')??$edit->no_telp??"" }}" placeholder="nomor telepon">
                                        @error('no_telp')
                                        <div class="validation-error">
                                          {{ $message }}
                                        </div>
                                        @enderror 
                                    </div> 
                                </div>
                            </div>

                              <div class="form-group">
                                <label for="tgl-lahir">tanggal lahir</label>
                                <input type="date" class="form-control" id="tgl-lahir" value="{{ old('tgl_lahir')??$edit->tgl_lahir??"" }}" name="tgl_lahir" >
                                @error('tgl_lahir')
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
