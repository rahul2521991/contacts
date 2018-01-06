@extends('layouts.app')
@section('content')
<div class="container">
<br>
<div class="display-contact">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="col-sm-12 col-lg-12 text-center">
    <h1>Contacts</h1>
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
            @foreach($mycontacts as $k => $v)
            <tr>
                <td>{{$v->name}}</td>
                <td>{{$v->email}}</td>
                @if($v->status == 2)
                <td><button class="viewcontact btn btn-primary" data-id="{{$v->id}}">View Contact</button></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>    
</div>
</div>
<div class="display-profile hide">
<div class="col-sm-12 col-lg-12 text-center">
    <h1>Profile</h1>
</div>
    <div class="col-lg-12">
        <div class="col-lg-4"><strong>Name</strong>
            <div class="col-lg-12 profile-name" style="padding: 0px">
                
            </div>
        </div>
        <div class="col-lg-4"><strong>Email</strong>
            <div class="col-lg-12 profile-email" style="padding: 0px">
            </div>
        </div>
    </div>
<div class="col-lg-12" style="margin-top: 50px">
<div class="col-lg-6"><strong>Mutual Friends</strong>
<ul style="padding-left: 15px" class="mutualfrnd">
</ul>
</div>
</div>
<div class="col-lg-12 text-center" style="margin-top: 50px">
<button class="btn btn-danger back-contact">Back</button>
</div>    
</div>

</div>
@endsection
