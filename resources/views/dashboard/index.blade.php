@extends('layouts.base')

@section('header')
    @include('layouts.header')
@endsection

@section('title')
    BUKULA | Dashboard
@endsection

@section('content')
    <div id="page-content-wrapper">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <h1 class="mb-4 text-darkpurple">Dashboard</h1>
                <div class="row justify-content-between ">
                    <div class="col-md-5 bg-white rounded-3">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="col-md-3 bg-white rounded-3">
                        <canvas id="myChart2"></canvas>
                    </div>
                    <div class="col-md-3 bg-white rounded-3">
                        <canvas id="myChart3"></canvas>
                    </div>
                </div>
            </div>
        </div>
      </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
