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
               Tag name
           </th>
            <th>
                Edit
            </th>
            <th>
                Delete
            </th>
       </thead>

       <tbody>
           @foreach ($tags as $tag)
            <tr>
               <td>
                   {{ $tag->tag }}
                </td> 
                <td>
                    <a href="{{ route('tag.edit',['id'=>$tag->id])}}">
                   <button class="btn btn-sm btn-warning">Edit</button> 
                    </a>
                </td>
                <td>
                    <a href="{{ route('tag.delete',['id'=>$tag->id])}}">
                    <button class="btn btn-sm btn-danger">Delete</button> 
                    </a>
                </td>   
            </tr>     

           @endforeach

       </tbody>
   </table>

@endsection 