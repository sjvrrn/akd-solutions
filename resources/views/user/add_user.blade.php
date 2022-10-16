@extends('layout.mainlayout')
@section('content-wrapper')
@php
$user_data=Session::get("logged_user"); 
$role_id=$user_data['role_id'];
@endphp
<!-- Breadcrumb Area -->
<div class="breadcrumb-area">
   <h1>Manage @if($role_id == 1) Associate @else Staff @endif</h1>
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
<div class="card-body"> <div class="col-md-6"> 
<form action="add-user" method="post" id="organization_form">@csrf
    @if($role_id == 1)
    <input type="hidden" name="user_type" value="associate"/>
    <input type="hidden" name="created_by" value="{{$user_data['user_id'] ?? ''}}"/>
    <input type="hidden" name="role_id" value="3"/>
    @else
    <input type="hidden" name="user_type" value="staff"/>
    <input type="hidden" name="created_by" value="{{$user_data['user_id'] ?? ''}}"/>
    <input type="hidden" name="role_id" value="4"/>
    @endif
    <div class="form-group">
        <label>Organization Name</label>
        <input type="text" class="form-control" placeholder="Organization Name" required name="org_name">
    </div>
    <div class="form-group">
        <label>Contact Person</label>
        <input type="text" class="form-control" placeholder="Contact person" required  name="contact_person">
    </div>
    <div class="form-group">
        <label>Role In Organization</label>
        <input type="text" class="form-control" placeholder="Role In Organization" required  name="role_name">
    </div>
    @if($role_id == 1)
    <div class="form-group">
        <label>Calender Link:</label>
        <input type="text" class="form-control" placeholder="Calender Link" required  name="calender_link">
    </div>
    @else
    <div class="form-group">
        <label>Role in Organization:</label>
        <input type="text" class="form-control" placeholder="Role in Organization" required  name="role">
    </div> 
    @endif
    <div class="form-group">
        <label>Mobile</label>
        <input type="text" class="form-control" placeholder="Mobile" required name="mobile">
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-md btn-danger mr-2 mt-2">Add @if($role_id == 1) Associate @else Staff @endif</button>
    </div>
</form>
   </div></div>
</div> 
<!-- End -->
@endsection