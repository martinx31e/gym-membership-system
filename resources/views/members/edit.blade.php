@extends('layouts.app')
@section('content')
<body>
  <h1>Edit member</h1>
  <div class="row">
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Personal Details</h4>
      <form method="post" action="{{ route('members.update', $member->id) }}" >
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="firstName">First name</label>
          <input type="text" class="form-control" name="firstName" placeholder="" value="{{ $member->firstName }}" >
        </div>
        <div class="col-md-6 mb-3">
          <label for="lastName">Last name</label>
          <input type="text" class="form-control" name="lastName" placeholder="" value="{{ $member->lastName }}" >
        </div>
      </div>
               
      <div class="row">
      <div class="col-md-6 mb-3">
          <label for="telephoneNumber">Telephone Number<span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" name="telephoneNumber" value="{{ $member->telephoneNumber }}">
          <div class="invalid-feedback">
            Please enter address
          </div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="dateOfBirth">Date of Birth<span class="text-muted">(Optional)</span></label>
            <input type="date" class="form-control" name="dateOfBirth" value="{{ $member->dateOfBirth }}">
          </div>
        </div>

      <div class="mb-3">
        <label for="emailAddress">Email</label>
        <input type="email" class="form-control" name="emailAddress" value="{{ $member->emailAddress }}" >
      </div>

      <div class="mb-3">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" value="{{ $member->address }}" >
        
      </div>

      <div class="row">
          <div class="col-md-6 mb-3">
              <label for="addressTown">Town / City</label>
              <input type="text" class="form-control" name="addressTown" value="{{ $member->addressTown }}" >
              
            </div>
            <div class="col-md-6 mb-3">
              <label for="addressPostcode">Post Code</label>
              <input type="text" class="form-control" name="addressPostcode" value="{{ $member->addressPostcode }}">
            </div>
      </div>

      <h4 class="mb-3">Membership details</h4>
        <p>Subscription type: {{ $member->subscriptionType }}</p>
        <p>Date joined: {{ $member->created_at->todatestring() }}</p>
    
      <h4 class="mb-3">Change subscription</h4>
      <select name="subscriptionType" class='form-control'>
        <option value="monthly">Monthly</option>
        <option value="annual">Annual</option>
    </select>
          <br>
          
          <hr class="mb-4">
      <button class="btn btn-success btn-lg btn-block" type="submit">Save</button>
      <br>
      
    </form>
    <form action="{{ route('members.destroy',$member->id) }}" method="POST">
        @csrf
        @method('DELETE')
  <button class="btn btn-danger btn-lg btn-block" type="submit">Delete member</button>
  </div>
</div>
</body>


@endsection

