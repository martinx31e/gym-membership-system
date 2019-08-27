@extends('layouts.app')

@section('content')
<a href="/members" class="btn btn-primary">Go back</a>
<h1>{{$member->firstName}}</h1>
<p>TESTING</p>
<hr>
<p class="text-center">
<a href="/members/{{$member->id}}/edit" class="btn btn-primary">Edit</a>
</p>
<form action="{{ route('members.destroy',$member->id) }}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>


@endsection