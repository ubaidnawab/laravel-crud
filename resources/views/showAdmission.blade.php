@extends('layout.app')
@section('content')
<div class="container" style="margin-bottom: 200px;">
    <div class="card mb-5 mt-5 p-5" style=" display:flex; flex-flow: row; justify-content: space-between;">
        {{-- <a class="btn btn-danger" style="width: 20%;" href="{{route('admission.mymetnod')}}">Delete All Address</a> --}}
        <a class="btn btn-primary" style="width: 20%;" href="{{route('admission.create')}}">Create Address</a>
    </div>
    @if (count($admmission) > 0)
    <div class="row">
    @foreach ($admmission as $item)
    <div class="card  mb-5 p-5 col-lg-4">
        <div style="height:200px; width:100%;display:flex;justify-content:center;">
            <img src="storage/user_images/{{$item->profile_image}}" style="height:100%; padding-bottom: 20px;" alt="">
        </div>
        <h4>{{$item->full_name}}</h4>
        <p>{{$item->email}}</p>
        <p>{{$item->address_1}}</p>
        <p>{{$item->address_2}}</p>
        <p>{{$item->city}}</p>
        <p>{{$item->state}}</p>
        <p>{{$item->zip}}</p>
        <div style="display: flex; justify-content:space-between;">
            <a href="{{route('admission.edit', $item->id)}}" class="btn btn-primary" style="margin-right: 10px;">Edit</a>
            <form action=" {{route('admission.destroy', $item->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
    @endif
</div>
@endsection
