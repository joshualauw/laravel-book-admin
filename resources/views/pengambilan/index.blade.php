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
        <div class="row justify-content-between align-items-center mb-4">
            <h2 class="col-lg-4 text-darkpurple">
                <i class="far fa-check-square"></i> List Pengambilan
                <a href="{{ route('pengambilan') }}/add">
                    <button class="btn btn-secondary text-white"><i class="fas fa-plus"></i></button>
                </a>
            </h2>
            <button class="btn btn-secondary text-white" {{ $user->jabatan_id == 1 ? "" : "hidden" }} id="toogle_kepGudang" style="width: 15%">See All</button>
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
                    <th scope="col">Tanggal pengajuan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody id="pengambilan_table"></tbody>
            </table>
      </div>
</div>
</div>
@endsection

@section('javascript')
    <script>
        var all = false;
        function toogleShowAll(){
            console.log(all);
            $.ajax({
                    url: "http://127.0.0.1:8000/pengambilan/showAll",
                    data: {
                        all: all
                    },
                    success: function (res) {
                        all = !all;
                        $("#pengambilan_table").html("");
                        $("#pengambilan_table").append(res);
                        all ? $("#toogle_kepGudang").html("See All") : $("#toogle_kepGudang").html("See Less");
                    },
                });
        }

        $(document).ready(function(){
            toogleShowAll();
            $("#toogle_kepGudang").on("click", function(){
                toogleShowAll();
            })
        });
    </script>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
