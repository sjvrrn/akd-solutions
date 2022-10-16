@extends('layout.mainlayout')
@section('content-wrapper')
<!-- Breadcrumb Area -->
<div class="breadcrumb-area">
   <h1>Manage Organizations</h1>
   <ol class="breadcrumb">
      <li class="item">
         <a href="/">
         <i class='bx bx-home-alt'></i>
         </a>
      </li>
      <li class="item">Organizations</li>
   </ol>
</div>
 
<div class="card mb-30"> 
<div class="card-body"> <div class="col-md-6"> 
<form action="add-organization" method="post" id="organization_form">@csrf
    <div class="form-group">
        <label>Organization Name</label>
        <input type="text" class="form-control" placeholder="Organization Name" required name="organization_name">
    </div>
    <div class="form-group">
        <label>Contact Person</label>
        <input type="text" class="form-control" placeholder="Contact Name" required  name="contact_name">
    </div>
    <div class="form-group">
        <label>Role in Organization:</label>
        <input type="text" class="form-control" placeholder="Role in Organization" required  name="role">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" placeholder="Email" required  name="email">
    </div>
    <div class="form-group">
        <label>Mobile</label>
        <input type="text" class="form-control" placeholder="Mobile" required name="mobile">
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-md btn-danger mr-2 mt-2">Add Organization</button>
    </div>
</form>
   </div></div>
</div> 
<!-- End -->
@endsection