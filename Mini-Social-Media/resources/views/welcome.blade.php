@extends('layouts.index')

@section('title')
Welcome
@endsection

@section('content')
    @if(count($errors) > 0)
    <div class="row">
        <div class="col-md-6">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>  
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
        <h3>Sign Up</h3>
            <form method="post" action="{{ route('signup') }}">
               <div class="form-group"> 
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email">
               </div>
               <div class="form-group"> 
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name">
               </div>
               <div class="form-group"> 
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
               </div> 
               <button type="submit" class="btn btn-success">Submit</button>
               <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

        <div class="col-md-6">
            <h3>Sign In</h3>
            <form method="post" action="{{ route('signin') }}">
            <div class="form-group"> 
                <label for="email">E-mail</label>
                <input type="text" class="form-control" name="email">
               </div>
               <div class="form-group"> 
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
               </div> 
               <button type="submit" class="btn btn-primary">Submit</button>
               <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>    
    </div>
@endsection