@extends('layouts.app')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

   <table class="table table-hover">
    
       <thead>
           <th>
               Image
           </th>
           <th>
                Title
          </th>
            <th>
                permissions
            </th>
            <th>
                Delete
            </th>
       </thead>

       <tbody>
           @foreach ($users as $user)
            <tr>
               <td>
                   
                   <img src="{{ asset('/storage/images/'.$user->profile->avatar)}}" alt="" width="70px" height="30px" style="border-radius: 50%"> 
                   
                  
                </td> 
                <td>

                    {{$user->name}}
                    
                </td>
                <td>
                    {{-- <a href="{{ route('user.edit',['id'=>$user->id])}}">
                    <button class="btn btn-sm btn-info">Edit</button> 
                    </a> --}}
{{-- 
                    permissions --}}

                    @if ($user->admin)
                    <a href="{{ route('user.user',['id'=>$user->id])}}" class="btn btn-sm btn-success">Remove permissions</a>
                    @else
                        {{-- User --}}

                        <a href="{{ route('user.admin',['id'=>$user->id])}}" class="btn btn-sm btn-success">make admin</a>
                    @endif
                </td> 
                <td>
                    @if ($user->admin)
                        
                    @endif
                    <a href="{{ route('user.delete',['id'=>$user->id])}}">
                    <button class="btn btn-sm btn-danger">Delete</button> 
                    </a>
                </td>
                
            </tr>     

           @endforeach

       </tbody>
   </table>

@endsection 