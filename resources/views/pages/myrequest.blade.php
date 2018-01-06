@extends('layouts.app')
@section('content')
<div class="container">
<br>
<div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="col-sm-12 col-lg-12 text-center">
    <h1>Request</h1>
</div>
<br>
<div>
    <table id="table_id" class="table table-condensed table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($myrequest as $k => $v)
            <tr>
                <td>{{$v->name}}</td>
                <td>{{$v->email}}</td>
                <td><button class="acceptrequest btn btn-primary" data-id="{{$v->user_id}}">Accept Request</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>    
</div>
</div>
</div>
@endsection
