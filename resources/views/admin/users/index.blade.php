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
                <h4 class="text-white">All Users</h4>
</div>
              <div class="card-body">

              <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                            <td>{{$item->id}}</td>
                                <td>{{$item->name.' '.$item->lname}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->role_as=='0'?'User':'Admin'}}</td>

                              
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