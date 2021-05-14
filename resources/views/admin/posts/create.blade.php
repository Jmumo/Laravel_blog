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

    <div class="card">
         <div class="card-header text-center">
              <h3 class="text-capitalize">create a new post</h3>
         </div>
         <div class="card-body">
              <form action="{{ route('post.store')}}" method="post" enctype="multipart/form-data">
               @csrf
                 <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control">
                 </div>

                 <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control">
               </div>

               <div class="form-group">
                    <label for="category">Select a Category</label>
                    <select name="category_id" id="category" class="form-control">
                      @foreach ($categories as $category)

                      <option value="{{$category->id}}">{{$category->name}}</option>
                          
                      @endforeach

                    </select>
               </div>

              

               <div class="form-group">
                   <label for="tags"> select tags</label>
                    @foreach ($tags as $tag)
                    <div class="checkbox">
                         <label for=""><input type="checkbox" name="tags[]" value="{{$tag->id}}"> {{$tag->tag}} </label>
                    </div>    
                    @endforeach
                    
               </div>

               <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
               </div>
               <div class="form-group">
                    <div class="text-center">
                         <button class="btn btn-success" type="submit">submit</button>
                    </div>
               </div>
               </form>
         </div>
    </div>

@endsection 

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
    
@endsection