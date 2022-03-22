@extends('layout.app')

@section('content')


@if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
 <form  method="post" enctype="multipart/form-data">
    @csrf
    
    name: <input type="text" name="name" placeholder="name">
    <br>
    email: <input type="email" name="email" placeholder="email">
    <br>
    password: <input type="password" name="password" placeholder="password">
    <br>
    password comfirm: <input type="password" name="passwordcf" placeholder="password comfirm">
    <br>
    <ul class="alert text-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <br>
    <input type="submit" " value="register">

 </form>
    
@endsection