@extends('layout.mainlayout')
@section('content-wrapper')
@php
$user_data=Session::get("logged_user"); 
$role_id=$user_data['role_id']; 
@endphp
<!-- Breadcrumb Area -->
<div class="breadcrumb-area">
   <h1>Manage @if($role_id == 1) Associate @else Staff @endif </h1>
   <ol class="breadcrumb">
      <li class="item">
         <a href="/">
         <i class='bx bx-home-alt'></i>
         </a>
      </li>
      <li class="item">@if($role_id == 1) Associate @else Staff @endif</li>
   </ol>
</div>
 
<div class="card mb-30">
   @if(Session::get("success"))
   <div class="alert alert-success" role="alert">{{Session::get("success")}}</div>
@php Session::forget('success') @endphp
   @endif
<div clas="col-12"><a href="{{url('add-user')}}" class="btn btn-md btn-danger mr-2 mt-2" " style="float: right;margin-bottom: 20px;">Add 
@if($role_id == 1) Associate @else Staff @endif</a></div>
<div class="card-body">
      <div class="table-responsive">
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>  
                  <th scope="col">Email </th>
                  <th scope="col">Mobile </th> 
                  @if($role_id == 1)
                  <th scope="col">Calender Link</th> 
                  @else
                  <th scope="col">Role </th>
                  @endif
                  <th scope="col">Status </th> 
                  <!-- <th scope="col">Action </th> -->
               </tr>
            </thead>
            <tbody>
               @if(isset($staff_data[0]))
               @foreach($staff_data as $user)
               @php $status=($user->status ==1)? "Active":"In Active";@endphp
               <tr>
                  <th scope="row">1</th>
                  <td>{{$user->first_name." ".$user->last_name ?? ''}}</td> 
                  <td>{{$user->email ?? ''}}</td>
                  <td>{{$user->mobile ?? ''}}</td>
                  @if($role_id == 1)
                  <td scope="col">Calender Link</td> 
                  @else
                  <td>{{$user->organization_role ?? ''}}</td> 
                  @endif
                  <td>{{$status}}</td>
                  <!-- <td><a href="{{url('edit-user')}}/{{$user->staff_id}}">Edit</a></td> -->
               </tr>
               @endforeach
               @else
               <tr>
                  <th colspan="8">
                  @if($role_id == 1)
                  No Associate found
                  @else
                  No Staff found
                  @endif
               </th> 
               </tr>
              @endif
            </tbody>
         </table>
      </div>
   </div>
</div> 
<!-- End -->
@endsection