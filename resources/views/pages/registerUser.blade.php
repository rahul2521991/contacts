@extends('layouts.app')
@section('content')
    <div class="container">
    <br>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="col-lg-12 text-center">
        <h1>Registered Users</h1>
    </div>
    <br>
    <div >
    <table id="table_id" class="table table-condensed table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
            @foreach($registeredUser as $k => $v)
                <tr>
                    <td>{{$v->name}}</td>
                    <td>{{$v->email}}</td>
                    @if(isset($v->status) && $v->status == 1)
                    <td><strong>Request Sent</strong></td>
                    @elseif(isset($v->status) && $v->status == 2)
                    <td><strong>Request Accepted</strong></td>
                    @else
                    <td><button class="addcontact btn btn-primary" data-id="{{$v->id}}">Add Contact</button></td>
                    @endif
                </tr>
            @endforeach
    </tbody>
</table>    
</div>
</div>
@endsection
