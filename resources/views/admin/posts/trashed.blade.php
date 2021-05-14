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
               Restore
            </th>
            <th>
                Delete completely
            </th>
       </thead>

       <tbody>
           @foreach ($posts as $post)
            <tr>
               <td>
                   <img src="{{$post->featured}}" alt="" width="70px" height="30px">
                </td> 
                <td>

                    {{$post->title}}
                    
                </td>
                <td>
                    <a href="{{ route('post.restore',['id'=>$post->id])}}">
                    <button class="btn btn-sm btn-info">Restore</button> 
                    </a>
                </td> 
                <td>
                    <a href="{{ route('post.kill',['id'=>$post->id])}}">
                    <button class="btn btn-sm btn-danger">Delete</button> 
                    </a>
                </td>
                
            </tr>     

           @endforeach

       </tbody>
   </table>

@endsection 