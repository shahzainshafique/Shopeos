@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Add Product</h1>
</div>
<div class="card-body">
    <form action="{{url('insert-product')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <select class="form-select" name="cate_id" >
  <option value="">Select a category</option>
  @foreach($category as $item)
  <option value="{{$item->id}}">{{$item->name}}</option>
  @endforeach
</select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
</div>
            <div class="col-md-6 mb-3">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug">
</div>
<div class="col-md-12 mb-3">
             <label for="">Small Description</label>
               <textarea name="small_description"row="3" class="form-control"></textarea>
</div>         
             <div class="col-md-12 mb-3">
             <label for="">Description</label>
               <textarea name="description"row="3" class="form-control"></textarea>
</div>          
          
               <div class="col-md-6 mb-3">
                <label for="">Original Price</label>
                <input type="number" class="form-control" name="original_price">
</div>
               <div class="col-md-6 mb-3">
                <label for="">Selling Price</label>
                <input type="number" class="form-control" name="selling_price">
</div>
                <div class="col-md-6 mb-3">
                <label for="">Tax</label>
                <input type="number" class="form-control" name="tax">
</div>
                <div class="col-md-12 mb-3">
                <label for="">Quantitiy</label>
                <input type="number" class="form-control" name="qty">
</div>             
                <div class="col-md-12 mb-3">
                <label for="">Status</label>
               <input type="checkbox" class="form-control" name="status">
                
</div>
                <div class="col-md-12 mb-3">
                <label for="">Trending</label>
               <input type="checkbox"class="form-control" name="trending">
                
</div>
                <div class="col-md-12 mb-3">
                <label for="">Meta Tile</label>
               <input type="text" class="form-control" name="meta_title">
                
</div>
                <div class="col-md-12 mb-3">
                <label for="">Meta Keywords</label>
               <textarea rows="3" class="form-control" name="meta_keywords"></textarea>
                
</div>
<div class="col-md-12 mb-3">
                <label for="">Meta Description</label>
                <textarea rows="3" class="form-control" name="meta_description"></textarea>
                
</div>
                  <div class="col-md-6 ">  
                  <input type="file" class="form-control" name="image">
</div>
                  <div class="col-md-6 ">  
                  <button type="submit" class="btn btn-primary">Submit </button>
</div>

</div>
</form>
</div>
</div>


@endsection