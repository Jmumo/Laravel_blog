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
               Category name
           </th>
            <th>
                Edit
            </th>
            <th>
                Delete
            </th>
       </thead>

       <tbody>
           @foreach ($categories as $category)
            <tr>
               <td>
                   {{ $category->name }}
                </td> 
                <td>
                    <a href="{{ route('category.edit',['id'=>$category->id])}}">
                   <button class="btn btn-sm btn-warning">Edit</button> 
                    </a>
                </td>
                <td>
                    <a href="{{ route('category.delete',['id'=>$category->id])}}">
                    <button class="btn btn-sm btn-danger">Delete</button> 
                    </a>
                </td>   
            </tr>     

           @endforeach

       </tbody>
   </table>

@endsection 