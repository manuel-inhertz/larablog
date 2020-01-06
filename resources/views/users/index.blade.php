@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       @include('layouts/sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white  d-flex justify-content-between align-items-baseline">
                    <span>Users</span>
                    <a href="{{route('post.create')}}" class="btn btn-sm btn-primary">Add User</a>
                </div>

                <ul class="list-group">


                   
                    
                </ul>

                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                     
                       @foreach ($users as $user)
                       <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->getRole()}}</td>
                            <td class="text-right"><a href="http://" class="btn btn-sm btn-success">Edit</a>
                                <a href="http://" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                  </table> 
                
            </div>
        </div>
    </div>
</div>
@endsection