@extends('layouts.base')

@section('header')
    @include('layouts.header')
@endsection

@section('title')
  BUKULA | {{ $item->nama }}
@endsection

@section('content')
<div id="page-content-wrapper">
  <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
      <span class="hamb-top"></span>
      <span class="hamb-middle"></span>
      <span class="hamb-bottom"></span>
    </button>

    <div class="container">
        <div class="mb-5 fw-bold">
            <input type="hidden" id="detail_departemen_id" name="detail_departemen_id" value="{{ $item->id }}">
            <h4>Nama Departemen: {{ $item->nama }}</h4>
        </div>
        
        <div class="row justify-content-start align-items-center">
          <div class="col-md-3">
              Filter by Jabatan:<select class="mb-4 form-select" id="filter_jabatan">
              <option value="all">all</option>
              @foreach ($options as $option)
                  <option value="{{ $option->id }}">{{ $option->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3 mb-4">
              Search: <input type="text" id="search_jabatan" class="form-control">
          </div>
        </div>
   
        
        <table class="table text-center bg-white rounded-3">
          <thead>
            <tr>
              <th scope="col" class="index-col">#</th>
              <th scope="col">NIK</th>
              <th scope="col">Username</th>
              <th scope="col">Nama</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Tanggal Lahir</th>
            </tr>
          </thead>
          <tbody id="departemen_pegawai">
            <!-- rendered -->
          </tbody>
        </table>
    </div>

  </div>
@endsection

@section('javascript')
    <script>
 
      function filterJabatan(){
          var jid = $("#filter_jabatan").val();
          var keyword = $("#search_jabatan").val();
          var did = $("#detail_departemen_id").attr("value");
          $.ajax({
              url: "http://127.0.0.1:8000/departemen/filterByJabatan",
              data: {
                  departemen_id: did,
                  jabatan_id: jid,
                  keyword: keyword
              },
              success: function (res) {
                  $("#departemen_pegawai").html("");
                  $("#departemen_pegawai").append(res);
              },
          });
      }
      filterJabatan();
      $("#filter_jabatan").on("change", function () {
        filterJabatan();
      });

      $("#search_jabatan").on("input", function () {
        filterJabatan();
      });

    </script>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection