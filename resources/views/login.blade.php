@extends('layout.authlayout')
@section('content-wrapper')
<!-- Start Login Area -->
<div class="login-area">
   <div class="d-table">
      <div class="d-table-cell">
         <div class="login-form">
            <div class="logo">
               <a href="/">
               <img src="{{ asset('assets/img/logo.png') }}" alt="image" style="width:40%">
               </a>
            </div>
            <h2>Welcome</h2>

            @if(\Session::has('error'))
                <span style="color:red">{!! \Session::get('error') !!}</span>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            @endif
            <form action="{{url('authenticateUser')}}" method="post" id="login_form">
               @csrf
               <div class="form-group">
                  <input type="text" class="form-control" name="email" placeholder="Email" required autocomplete="off">
                  <span class="label-title">
                  <i class='bx bx-user'></i>
                  </span>
               </div>
               <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password" required  autocomplete="off">
                  <span class="label-title">
                  <i class='bx bx-lock'></i>
                  </span>
               </div>
               <button type="submit" class="login-btn">Login</button> 
               <a href="/register" class="register-btn">Register</a>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- End Login Area -->
@endsection