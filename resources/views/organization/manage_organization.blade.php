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
   @if(Session::get("success"))
   <div class="alert alert-success" role="alert">{{Session::get("success")}}</div>
@php Session::forget('success') @endphp
   @endif
<div clas="col-12"><a href="{{url('add-organization')}}" class="btn btn-md btn-danger mr-2 mt-2" " style="float: right;margin-bottom: 20px;">Add Organization</a></div>
<div class="card-body">
      <div class="table-responsive">
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Organization Name</th>
                  <th scope="col">Contact Person</th>
                  <th scope="col">Role </th>
                  <th scope="col">Email </th>
                  <th scope="col">Mobile </th> 
                  <th scope="col">Status </th> 
                  <th scope="col">Action </th>
               </tr>
            </thead>
            <tbody>
               @if(isset($organization_data[0]))
               @foreach($organization_data as $organization)
               @php $status=($organization->status ==1)? "Active":"In Active";@endphp
               <tr>
                  <th scope="row">1</th>
                  <td>{{$organization->organization_name ?? ''}}</td>
                  <td>{{$organization->contact_name ?? ''}}</td>
                  <td>{{$organization->role ?? ''}}</td>
                  <td>{{$organization->email ?? ''}}</td>
                  <td>{{$organization->mobile ?? ''}}</td>
                  <td>{{$status}}</td>
                  <td><a href="{{url('edit-organization')}}/{{$organization->organization_id}}">Edit</a></td>
               </tr>
               @endforeach
               @else
               <tr>
                  <th colspan="8">No Organization found</th> 
               </tr>
              @endif
            </tbody>
         </table>
      </div>
   </div>
</div> 
<!-- End -->
@endsection