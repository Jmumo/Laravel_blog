@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

    <div class="card">
         <div class="card-header text-center">
          <h3 class="text-capitalize">Edit Blog Settings</h3>
         </div>
         <div class="card-body">
              <form action="{{ route('settings.update')}}" method="post">
               @csrf
                 <div class="form-group">
                      <label for="name">Site Name</label>
                      <input type="text" name="site_name" value="{{$settings->site_name}}" class="form-control">
                 </div>

                 <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" name="contact_email" class="form-control" value="{{$settings->contact_email}}">
               </div>

               <div class="form-group">
                <label for="name">Address</label>
                <input type="text" name="address" value="{{$settings->address}}" class="form-control">
              </div>

              <div class="form-group">
                <label for="name">Contact</label>
                <input type="text" name="contact_number" value="{{$settings->contact_number}}" class="form-control">
           </div>

               <div class="form-group">
                    <div class="text-center">
                         <button class="btn btn-success btn-block" type="submit">submit</button>
                    </div>
               </div>
               </form>
         </div>
    </div>

@endsection 