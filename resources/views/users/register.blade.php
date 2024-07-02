@extends('layouts.index')


@section('title', 'register')

@section('body')
    <section class="form-login">
        <h1>Register</h1>

            <form method="POST" action="{{route('users.store')}}">
            
                @csrf <!-- CSRF protection -->

                <div class="form-group" style="padding-left:7px">
                    <label for="name">Name</label>
                    <input class="form-control" style="width: 50%" type="name" id="name" name="name" placeholder="Enter your name"> <!-- A través del name se accede luego en la request del controller -->
                
                </div>

                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group" style="padding-left:7px">
                    <label for="email">Email</label>
                    <input class="form-control" style="width: 50%" type="email" id="email" name="email" placeholder="Enter your email"> <!-- A través del name se accede luego en la request del controller -->
                
                </div>

                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group" style="padding-left:7px">
                    <label for="password">Password</label>
                    <input class="form-control" style="width: 50%"  type="password" id="password" name="password" placeholder="Enter your password">
                </div>

                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group" style="padding-left:7px">
                    <button class="btn btn-primary mt-2" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>