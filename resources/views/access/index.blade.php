@extends('layouts.base')

@section('header')
    @include('layouts.header')
@endsection

@section('title')
  BUKULA | Access Page
@endsection

@section('content')
<div id="page-content-wrapper">
    <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
        <span class="hamb-top"></span>
    <span class="hamb-middle"></span>
    <span class="hamb-bottom"></span>
        </button>
        <div class="container">
            <h2>Halaman Access</h2>

            <form action="{{ route('access') }}/grant" id="form" method="POST">
                <div class="row">
                    <div class="my-4 col-md-3">
                        <select name="type" name="type" id="type" class="form-select">
                            <option value="barang" selected>Barang</option>
                            <option value="kategori">Kategori</option>
                            <option value="pegawai">Pegawai</option>
                            <option value="gudang">Gudang</option>
                            <option value="departemen">Departemen</option>
                            <option value="jabatan">Jabatan</option>
                        </select>
                    </div>
                    <div class="my-4 col-md-3">
                        <select name="filterBy" id="filterBy" class="form-select">
                            <option value="pegawai" selected>Pegawai</option>
                            <option value="jabatan">Jabatan</option>
                        </select>
                    </div>
                </div>

                @csrf
                <table class="table text-center bg-white rounded-3">
                    <thead>
                    <tr>
                        <th scope="col" class="index-col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Create</th>
                        <th scope="col">Read</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="list">
                        <!-- Rendered -->
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-5">
                    <button type="submit" class="btn btn-secondary" style="width: 20%">Grant</button>
                </div>
            </form>
        </div>
  </div>
</div>
@endsection

@section('javascript')
    <script>
        function filterBy(){
            var filter = $("#filterBy").val();
            var type = $("#type").val();
            $.ajax({
                url: "http://127.0.0.1:8000/access/filterBy",
                data: {
                    filterBy: filter,
                    type: type
                },
                success: function (res) {
                    $("#list").html("");
                    $("#list").append(res);
                },
            });
        }
        $(document).ready(function(){
            filterBy();
            $("#filterBy").on("change", function(){
                filterBy();
            })
            $("#type").on("change", function(){
                filterBy();
            })
          
        });
    </script>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection