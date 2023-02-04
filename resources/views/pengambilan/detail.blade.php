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
           <h5>Tanggal pengajuan: {{ $item->created_at}}</h5>
           <h5>Nama pemohon: {{ $item->pemohon->nama }}</h5>
           <h5>Jabatan: {{ $item->pemohon->jabatan->nama }}</h5>
           <h5>Departemen: {{ $item->pemohon->departemen->nama }}</h5>
           <h5>Tanggal pembatalan: {{ $item->cancelled_at ?? "-" }}</h5>
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
                  <td>{{ $item->penyetuju->nama }}</td>
                  <td style="color: {{ $item->statusColor("noticed_status") }}">{{ $item->noticed_status }}</td>
                  <td>{{ $item->noticed_at??"-" }}</td>
                  @if ($user->jabatan_id == 1 && $item->status == "menunggu" && $item->noticed_status == "menunggu")
                    <td class="d-flex justify-content-center gap-1">
                      <form action="{{ route('pengambilan') }}/{{ $item->id }}/notice" method="POST">
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
                @if ($user->jabatan_id == 1 && $user->departemen_id == 1 && $item->status == "menunggu" && $item->accepted_status == "menunggu")
                  <td class="d-flex justify-content-center gap-1">
                      <form action="{{ route('pengambilan') }}/{{ $item->id }}/accept" method="POST">
                        @csrf
                        <button type="submit" name="action" value="terima" class="btn btn-success"><i class="fas fa-check"></i></button>
                        <button type="submit" name="action" value="tolak" class="btn btn-danger"><i class="fas fa-times"></i></button>
                      </form>
                  </td>
                @endif
              </tr>
          </tbody>
        </table>
        
        <h4>List barang yang diambil</h4>
        <table class="table text-center bg-white rounded-3">
          <thead>
            <tr>
              <th scope="col" class="index-col">#</th>
              <th scope="col">Kode</th>
              <th scope="col">Nama</th>
              <th scope="col">Jumlah</th>
            </tr>
          </thead>
          <tbody>
             @foreach ($list??[] as $l)
                 <tr>
                   <td class="index-col">{{ ++$loop->index }}</td>
                   <td>{{ $l->kode }}</td>
                   <td>{{ $l->barang->nama }}</td>
                   <td>{{ $l->jumlah }}</td>
                 </tr>
             @endforeach
          </tbody>
        </table>
    </div>
  </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection