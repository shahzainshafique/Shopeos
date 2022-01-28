
@extends('layouts.front')
@section('title')
    Checkout
@endsection
@section('content')

<div class="container mt-5">
        
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                    <div class="card-body">
                    <h6>Basic Detail</h6>
                   <hr>
                    <div class="row checkout-form">
                <div class="col-md-6">
                    <label for="">First Name</label>
                  <input type="text" class="form-control" placeholder="Enter first Name">
                  </div>

                  <div class="col-md-6">
                    <label for="">Last Name</label>
                  <input type="text" class="form-control" placeholder="Enter LastName">
                  </div>

                  <div class="col-md-6">
                    <label for="">First Name</label>
                  <input type="text" class="form-control" placeholder="Enter first Name">
                  </div>

                  <div class="col-md-6">
                    <label for="">Email</label>
                  <input type="text" class="form-control" placeholder="Enter Email">
                  </div>
                    
                  <div class="col-md-6">
                    <label for="">Phone Number</label>
                  <input type="text" class="form-control" placeholder="Enter Phone Number">
                  </div>

                  <div class="col-md-6">
                    <label for="">Address 1</label>
                  <input type="text" class="form-control" placeholder="Enter Address 1">
                  </div>

                  <div class="col-md-6">
                    <label for="">Address 2</label>
                  <input type="text" class="form-control" placeholder="Address 2">
                  </div>

                  <div class="col-md-6">
                    <label for="">City</label>
                  <input type="text" class="form-control" placeholder="Enter City">
                  </div>

                  <div class="col-md-6">
                    <label for="">Country</label>
                  <input type="text" class="form-control" placeholder="Enter Country">
                  </div>
                  
                  <div class="col-md-6">
                    <label for="">State</label>
                  <input type="text" class="form-control" placeholder="State">
                  </div>
                  


</div>   

</div>
</div>
</div>
                     
                   <div class="col-md-5">
                    <div class="card">
                    <div class="card-body">
                    Order Details
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>

</tr>

</thead>
                        <tbody>
                            
                  @foreach($cartitems as $items)
                  <tr>
                      <td>{{$items->products->name}}  </td>
                      <td>{{$items->prod_qtv}}  </td>
                      <td>{{$items->products->selling_price}}  </td>
                   </tr>
                    @endforeach

</tr>
</tbody>
</table>
                <hr>
                <button class="btn btn-primary float-end">Place Order</button>

                   
 </div>
</div>
</div>
</div>
</div>
@endsection
