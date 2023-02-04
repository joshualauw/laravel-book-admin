@extends('layouts.base')

@section('header')
    @include('layouts.header')
@endsection

@section('title')
  BUKULA | Detail Pengambilan
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
           <h5>Tanggal retur: {{ $item->created_at}}</h5>
           <a href="{{ route('pengambilan') }}/{{ $item->pengambilan_id }}/detail">
             <button class="btn btn-secondary">Detail Pengambilan</button>
           </a>
        </div>
        
        <h4>Status Persetujuan</h4>
        <table class="table text-center bg-white rounded-3 mb-5">
          <thead>
            <tr>
              <th scope="col" class="index-col">#</th>
              <th scope="col">Persetujuan</th>
              <th scope="col">Nama Kepala</th>
              <th scope="col">Status</th>
              <th scope="col">Tanggal perlakuan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
                <tr>
                  <td class="index-col">1</td>
                  <td>Kepala Departemen</td>
                  <td>{{ $item->pengambilan->penyetuju->nama }}</td>
                  <td style="color: {{ $item->statusColor("noticed_status") }}">{{ $item->noticed_status }}</td>
                  <td>{{ $item->noticed_at??"-" }}</td>
                  @if ($user->jabatan_id == 1 && $item->noticed_status == "menunggu")
                    <td class="d-flex justify-content-center gap-1">
                      <form action="{{ route('retur') }}/{{ $item->id }}/notice" method="POST">
                        @csrf
                        <button type="submit" name="action" value="terima" class="btn btn-success"><i class="fas fa-check"></i></button>
                        <button type="submit" name="action" value="tolak" class="btn btn-danger"><i class="fas fa-times"></i></button>
                      </form>
                    </td>
                  @endif
                </tr>
              <tr>
                <td class="index-col">2</td>
                <td>Kepala Gudang</td>
                <td>{{ $kepalaGudang->nama }}</td>
                <td style="color: {{ $item->statusColor("accepted_status") }}">{{ $item->accepted_status }}</td>
                <td>{{ $item->accepted_at??"-" }}</td>
                @if ($user->jabatan_id == 1 && $user->departemen_id == 1 && $item->accepted_status == "menunggu")
                  <td class="d-flex justify-content-center gap-1">
                      <form action="{{ route('retur') }}/{{ $item->id }}/accept" method="POST">
                        @csrf
                        <button type="submit" name="action" value="terima" class="btn btn-success"><i class="fas fa-check"></i></button>
                        <button type="submit" name="action" value="tolak" class="btn btn-danger"><i class="fas fa-times"></i></button>
                      </form>
                  </td>
                @endif
              </tr>
          </tbody>
        </table>
    </div>
  </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection