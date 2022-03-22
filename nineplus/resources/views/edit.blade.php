@extends('layout.app')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
<form action=""  method="POST" enctype="multipart/form-data">
@csrf
    name : <input type="text" name="name" value="{{$data[0]->name}}">
    email:<input type="text" name="email" value="{{$data[0]->email}}" readonly>
    phone:<input type="text" name="phone" value="{{$data[0]->phone}}">
    address:<input type="text" name="address" value="{{$data[0]->address}}">
    <input type="submit" name="submit" id="" value="update">
</form>
<button><a href="{{url('qluser')}}">home</a></button>  
    
@endsection