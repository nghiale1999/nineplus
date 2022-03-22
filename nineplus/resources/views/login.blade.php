@extends('layout.app')

@section('content')


@if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

@php if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_pass']))
        {
            $login_email = $_COOKIE['login_email'];
            $login_pass  = $_COOKIE['login_pass'];
            
        }
        else{
            $login_email ='';
            $login_pass = '';
            
        }
@endphp
 <form  method="post" enctype="multipart/form-data">
    @csrf
    
    
    email: <input type="email" name="email" placeholder="email" value="{{$login_email}}" >
    <br>
    password: <input type="password" name="password" placeholder="password" value="{{$login_pass}}">
    <br>
    <input type="checkbox" name="remember" id="remember" >Remember Me
    <br>
    
    <ul class="alert text-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <br>
    <input type="submit" " value="login">

 </form>
    
@endsection