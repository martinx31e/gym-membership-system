@extends('layouts.app')
<!------ Include the above in your HEAD tag ---------->

@section('content')
<h1>Add new member</h1>
<body>
  <div class="row">
   <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Personal Details</h4>
      <form method="post" action="{{ route('members.store') }}">
        @csrf
         <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" name="firstName" placeholder="" value="" >

            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" name="lastName" placeholder="" value="" >
            </div>
          </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="telephone">Telephone Number<span class="text-muted"> (Optional)</span></label>
                <input type="text" class="form-control" name="telephoneNumber">
              </div>

              <div class="col-md-6 mb-3">
                  <label for="dateOfBirth">Date of Birth<span class="text-muted">(Optional)</span></label>
                  <input type="date" class="form-control" name="dateOfBirth">
                </div>
              </div>
    
            <div class="mb-3">
              <label for="emailAddress">Email</label>
              <input type="email" class="form-control" name="emailAddress" >
            </div>
    
            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" >
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="addressTown">Town / City</label>
                    <input type="text" class="form-control" name="addressTown" > 
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="addressPostcode">Post Code</label>
                    <input type="text" class="form-control" name="addressPostcode" >
                  </div>
            </div>
           <h4 class="mb-3">Subscription type</h4>

              <select name="subscriptionType" class='form-control'>
                  <option value="monthly">Monthly</option>
                  <option value="annual">Annual</option>
              </select>
            
            <hr class="mb-4">
            <button class="btn btn-success btn-lg btn-block" type="submit">Create member</button>
          </form>
        </div>
      </div>
</body>
@endsection