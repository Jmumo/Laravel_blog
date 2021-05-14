@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

    <div class="card">
         <div class="card-header text-center">
          <h3 class="text-capitalize">edit your profile</h3>
         </div>
         <div class="card-body">
              <form action="{{ route('user.update')}}" method="post" enctype="multipart/form-data">
               @csrf
                 <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" value="{{$user->name}}" class="form-control">
                 </div>

                 <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" name="email" value="{{$user->email}}" class="form-control">
               </div>

               <div class="form-group">
                <label for="name">Password</label>
                <input type="password" name="password" value="{{$user->password}}" class="form-control">
               </div>

               <div class="form-group">
                <label for="name">update avatar</label>
                <input type="file" name="avatar" class="form-control">
               </div>

               <div class="form-group">
                <label for="name">Youtube profile</label>
                <input type="text" name="youtube" value="{{$user->profile->youtube}}" class="form-control">
               </div>

               <div class="form-group">
                <label for="name">Facebook Profile</label>
                <input type="text" name="facebook" value="{{$user->profile->facebook}}" class="form-control">
               </div>

               <div class="form-group">
                <label for="name">About You</label>
               <textarea name="about" id="about" cols="6" rows="6" class="form-control">{{$user->profile->about}}</textarea>
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