@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

    <div class="card">
         <div class="card-header text-center">
          <h3 class="text-capitalize">create a new Tag</h3>
         </div>
         <div class="card-body">
              <form action="{{ route('tag.store')}}" method="post">
               @csrf
                 <div class="form-group">
                      <label for="name">Tag</label>
                      <input type="text" name="tag" class="form-control">
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