@extends('layouts.base')

@section('title') BUKULA | Login @endsection

@section('content')
    <div class="container mt-5">
        <h1 class='mb-3 text-center text-purple'>BUKU<span class="text-lavender">LA</span></h1>
        <div class="row justify-content-center" style="height: 450px">
            <div class="col-md-3 bg-purple border rounded-start d-flex align-items-center justify-content-center">
                <h1 class="text-white">
                  <i class="fas fa-book fa-2x"></i>
                </h1>
            </div>
            <div class="col-md-6 border bg-white rounded-end">
              <h3 class="mt-5 text-center">Login</h3>
              <form action="{{ route('login') }}/in" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username"> 
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div> 

                  <div class="d-flex justify-content-center mt-4">                   
                      <button type="submit" class="btn btn-secondary mx-2" style="width: 50%">
                        <i class="fas fa-sign-in-alt"></i> Login
                      </button>                         
                  </div>
                </form>
                   
            </div>  
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

