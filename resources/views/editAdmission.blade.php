@extends('layout.app')
@section('content')

<div class="container">
    <div class="card text-center p-5 mt-5 mb-3"><h2>Admission Form</h2></div>
    <form class="row g-3" method="POST" enctype="multipart/form-data" action="{{route('admission.update', $addmission->id)}}">
        @csrf
        @method('PUT')
        <div class="col-md-6">
        <label for="fullname" class="form-label">Full Name</label>
        <input type="text" class="form-control" name="full_name" id="fullname" value="{{$addmission->full_name}}">
        </div>
        <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="{{$addmission->email}}">
        </div>
        <div class="col-12">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" class="form-control" name="address_1" id="inputAddress" placeholder="1234 Main St" value="{{$addmission->address_1}}">
        </div>
        <div class="col-12">
        <label for="inputAddress2" class="form-label">Address 2</label>
        <input type="text" class="form-control" name="address_2" id="inputAddress2" placeholder="Apartment, studio, or floor" value="{{$addmission->address_2}}">
        </div>
        <div class="col-md-6">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" class="form-control" name="city" id="inputCity" value="{{$addmission->city}}">
        </div>
        <div class="col-md-4">
        <label for="inputState" class="form-label">State</label>
        <select id="inputState" name="state" class="form-select">
            <option>{{$addmission->state}}</option>
            <option>sindh</option>
            <option>Panjab</option>
            <option>Balochistan</option>
            <option>kheyber pukhton khawn</option>
        </select>
        </div>
        <div class="col-md-2">
        <label for="inputZip"  class="form-label">Zip</label>
        <input type="text" name="zip" class="form-control" id="inputZip" value="{{$addmission->zip}}">
        </div>
        <div class="col-12">
            <input class="form-control"  type="file" id="profile_image" name="profile_image">
        </div>
        <div class="col-12">
        <button type="submit" class="btn btn-primary w-100">Update Form</button>
        </div>
    </form>
</div>
@endsection
