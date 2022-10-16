<style>
    .box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }

    .login-area{ height: auto !important }
    #organization_form .form-control {
      border: 1% !important;
    }
</style>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>

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
            @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            @endif
            <!-- toggle start -->
          <div>
              <label><input type="radio" name="colorRadio" value="Organization"> Organization</label>
              <label><input type="radio" name="colorRadio" value="Associate"> Staff</label>
              <label><input type="radio" name="colorRadio" value="Staff"> Associate</label>
          </div>
    <!-- Organization block -->
          <div class="Organization box">
            
               <form action="{{ url('add-organization')}}" method="post" id="organization_form">@csrf
    
                   <div class="form-group">
                       <input type="text" class="form-control" placeholder="Organization Name" required name="organization_name">
                   </div>
                   <div class="form-group">
                       <input type="text" class="form-control" placeholder="Contact person" required  name="contact_name">
                   </div>
                   <div class="form-group">
                       <input type="text" class="form-control" placeholder="Role In Organization" required  name="role">
                   </div>
                   
                   <div class="form-group">
                       <input type="text" class="form-control" placeholder="Email" required name="email">
                   </div>

                   <div class="form-group">
                       <input type="text" class="form-control" placeholder="Mobile" required name="mobile">
                   </div>
                   <input type="hidden"  name="status" value="1">
                   <div class="form-group">
                   <button type="submit" class="btn btn-md btn-danger mr-2 mt-2">Add Organization
                   </div>
              </form>
          </div>
          <!-- Staff block block -->
          <div class="Associate box">
               <form action="{{ url('/add-user')}}" method="post" id="organization_form">@csrf
                  
                   <div class="form-group">
                       <!-- <input type="text" class="form-control" placeholder="Organization Name" required name="organization_role"> -->
                       <select class="form-select col-md-12" name="organization_role">
                          <option>Select Organization</option>
                          @foreach($Organizations as $key=>$value)
                            <option value="{!! $value->organization_id !!}">{!! $value->organization_name !!}</option>
                          @endforeach
                          
                        </select>
                   </div>
                   <div class="form-group">
                       <input type="text" class="form-control" placeholder="Name" required  name="first_name">
                   </div>
                   <div class="form-group">
                       <input type="text" class="form-control" placeholder="Last Name" required  name="last_name">
                   </div>

                  <div class="form-group">
                       <input type="text" class="form-control" placeholder="Email" required name="email">
                   </div>

                   <div class="form-group">
                       <input type="text" class="form-control" placeholder="Mobile" required name="mobile">
                   </div>

                   <div class="form-group">
                      <label>Calender Link:</label>
                      <input type="text" class="form-control" placeholder="Calender Link" required  name="calender_link">
                  </div>
                  <input type="hidden"  name="role_id" value="3">
                  <input type="hidden"  name="role" value="3">
                   <input type="hidden"  name="user_type" value="staff">
                   <div class="form-group">
                   <button type="submit" class="btn btn-md btn-danger mr-2 mt-2">Add Staff
                   </div>
              </form>  
          </div>
    <!-- Staff block -->
          <div class="Staff box">   
              
          </div>
            <!-- end -->
         </div>
      </div>
   </div>
</div>
<!-- End Login Area -->
@endsection