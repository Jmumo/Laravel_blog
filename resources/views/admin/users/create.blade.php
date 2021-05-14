@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

    <div class="card">
         <div class="card-header text-center">
          <h3 class="text-capitalize">create a new user</h3>
         </div>
         <div class="card-body">
              <form action="{{ route('user.store')}}" method="post">
               @csrf
                 <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control">
                 </div>

                 <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" name="email" class="form-control">
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