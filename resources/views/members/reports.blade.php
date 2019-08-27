@extends('layouts.app')
@section('content')

<h1>Membership report</h2>
<br>
<h3>{{$count}} members joined in {{$month_name}}</h3>
<br>
<form action="{{action('MembersController@reports')}}" method="post" class="form-inline">
    @csrf
    @method('GET')
        <select name="month" class='form-control'>
            <option value="0">This year</option>
            <option value="1">January</option>
            <option value="2">February</option>s
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
        <button class="btn btn-success ml-2" type="submit">Go</button>
</form>
<br>
<table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    @if(count($members) > 0)
        @foreach($members as $member)
            <tr>
                <th scope="row">{{$member->id}}</th>
                <td>{{$member->firstName}}</td>
                <td>{{$member->lastName}}</td>
                <td>{{$member->emailAddress}}</td>
                <td><a href="/members/{{$member->id}}/edit" class="btn btn-primary btn-sm">Edit</a></td>
            </tr>
        @endforeach
              
    @endif
    </tbody>
</table>
@endsection