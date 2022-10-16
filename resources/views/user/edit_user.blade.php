@extends('layout.mainlayout')
@section('content-wrapper')
@php 
if(isset($organization[0])){
    $organization=(array)$organization[0];
}  
@endphp
<!-- Breadcrumb Area -->
<div class="breadcrumb-area">
   <h1>Update Organizations</h1>
   <ol class="breadcrumb">
      <li class="item">
         <a href="/">
         <i class='bx bx-home-alt'></i>
         </a>
      </li>
      <li class="item">Update Organizations</li>
   </ol>
</div>
 
<div class="card mb-30"> 
<div class="card-body"> <div class="col-md-6"> 
<form action="{{url('update-organization')}}" method="post">@csrf
<input type="hidden" class="form-control"  required name="organization_id" value="{{$organization['organization_id'] ?? ''}}">
    <div class="form-group">
        <label>Organization Name</label>
        <input type="text" class="form-control" placeholder="Organization Name" required name="organization_name" value="{{$organization['organization_name'] ?? ''}}">
    </div>
    <div class="form-group">
        <label>Contact Person</label>
        <input type="text" class="form-control" placeholder="Contact Name" required  name="contact_name"  value="{{$organization['contact_name'] ?? ''}}">
    </div>
    <div class="form-group">
        <label>Role in Organization:</label>
        <input type="text" class="form-control" placeholder="Role in Organization" required  name="role"  value="{{$organization['role'] ?? ''}}">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" placeholder="Email" required  name="email"  value="{{$organization['email'] ?? ''}}">
    </div>
    <div class="form-group">
        <label>Mobile</label>
        <input type="text" class="form-control" placeholder="Mobile" required name="mobile"  value="{{$organization['mobile'] ?? ''}}">
    </div>
    <div class="form-group">
        <label>Status</label>
        <Select  class="form-control" name="status">
            <option value="1" @php ($organization['status'] == 1) ? 'seleted' : '' @endphp>Active</option>
            <option value="0"  @php ($organization['status'] == 0) ? 'seleted' : '' @endphp>In Active</option>
        </select>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-md btn-danger mr-2 mt-2">Add Organization</button>
    </div>
</form>
   </div></div>
</div> 
<!-- End -->
@endsection