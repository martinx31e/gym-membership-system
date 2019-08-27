@extends('layouts.app')
@section('content')
<h1>Gym Membership List</h1>
<br>
<a href="/members/create"><button type="button" class="btn btn-success">Add new member</button></a>
<a href="/reports"><button type="button" class="btn btn-secondary">Reports</button></a>
<br>
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
{{$members->links()}}
@endsection