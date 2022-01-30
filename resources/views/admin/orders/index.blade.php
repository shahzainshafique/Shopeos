@extends('layouts.admin')

@section('title')
Orders
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header bg-primary">  
                <h4 class="text-white">Total Orders</h4>
</div>
              <div class="card-body">

              <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <tr>
                                <td>{{ date('d-m-Y', strtotime($item->Created_at)) }}</td>
                                <td>{{$item->tracking_no}}</td>
                                <td>Rs.{{$item->total_price}}</td>
                              
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>



</div>
</div>
</div>
</div>
</div>
@endsection