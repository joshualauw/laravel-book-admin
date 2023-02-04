@extends('layouts.base')

@section('header')
    @include('layouts.header')
@endsection

@section('title')
  BUKULA | Pengambilan Barang
@endsection

@section('content')
<div id="page-content-wrapper">
  <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
      <span class="hamb-top"></span>
  <span class="hamb-middle"></span>
  <span class="hamb-bottom"></span>
      </button>
        <div class="container">
          <!-- MAIN -->
          <h2 class="text-darkpurple mb-3">Form Pengajuan Pengambilan</h2>

          <form action="{{ route('pengambilan') }}/add/insert" method="POST">
            @csrf     
            <div class="form-group">
              <label for="date_now">Tanggal Pengajuan</label>
              <input type="text" class="form-control" id="date_now" name="date_now" value="{{ $dateNow }}" readonly placeholder="tanggal pengajuan"> 
            </div>
           
            <div class="form-group">
              <label for="time_now">Waktu Pengajuan</label>
              <input type="text" class="form-control" id="time_now" name="time_now" value="{{ $timeNow }}" readonly placeholder="waktu pengajuan"> 
            </div>
           
            <div class="form-group">
              <label for="pemohon">Pemohon</label>
              <input type="hidden" name="nik" value="{{ $user->nik }}">
              <input type="text" class="form-control" id="pemohon" name="pemohon" value="{{ $user->nama }}" readonly placeholder="Pemohon"> 
            </div>
            <table class="table text-center bg-white rounded-3 mt-5">
              <thead>
                <tr>
                  <th scope="col" class="index-col">#</th>
                  <th scope="col">Checkbox</th>
                  <th scope="col">Nama</th>
                  <th scope="col">stok</th>
                  <th scope="col">Jumlah</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($list??[] as $key => $l)
                  <tr id="pengambilan-row-{{ $loop->index }}">
                      <th scope="row" class="index-col">{{ ++$key }}</th> 
                      <td><input type="checkbox" name="kode_pengambilan[]" value="{{ $l->kode }}"></td>
                      <td>{{ $l->nama }}</td>
                      <td>{{ $l->stok }}</td>
                      <td><input type="number" name="jumlah_pengambilan[]" disabled></td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-end mt-4">
              <button type="submit" class="btn btn-secondary" id="submit_pengambilan" style="width: 20%">Sumbit</button>
            </div>
        </form>

        </div>
    </div>
  </div>
@endsection

@section('javascript')
    <script>

      $("#submit_pengambilan").on("click", function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        swal({
          title: "Yakin Submit?",
          text: "Setelah submit perubahan tidak bisa dikembalikan",
          buttons: {
            cancel: true,
            confirm: true,
          },
        }).then(function(confirmed){
          if (confirmed){
            form.submit();
          }
        });
      }) 
      

      $(document).ready(function(){

        var interval = setInterval(() => {
          let today = new Date();
          let hours = today.getHours() < 10 ? "0"+today.getHours() : today.getHours();
          let minutes = today.getMinutes() < 10 ? "0"+today.getMinutes() : today.getMinutes();
          let seconds = today.getSeconds() < 10 ? "0"+today.getSeconds() : today.getSeconds();
          $("#time_now").val(hours + ":" + minutes + ":" + seconds);
        }, 1000);

        $("input[type=checkbox]").on("change", function(){
          var idx = $(this).parent().parent().attr("id");
          var number = $("#"+idx+" input[type=number]");
           
          if (number.prop("disabled")){
            number.prop("disabled", false);
          }else{
            number.prop("disabled", true);
          }
        })
      });
    </script>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection