@extends('layouts.index')


@section('title', 'register')

@section('body')
    <section class="form-login">
        <h1>Edition</h1>

            <form method="POST" action="{{route('users.update', $user->id))}}">
            
                @csrf <!-- CSRF protection -->

                @method('PUT') {{--se coloca así porque los formulario html sólo aceptan los metódos GET y PUT --}}

                <div class="form-group" style="padding-left:7px">
                    <label for="name">Name</label>
                    <input class="form-control" style="width: 50%" type="name" id="name" name="name" value= "{{$user->name}}"> <!-- A través del name se accede luego en la request del controller -->
                
                </div>

                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group" style="padding-left:7px">
                    <label for="email">Email</label>
                    <input class="form-control" style="width: 50%" type="email" id="email" name="email" value= "{{$user->email}}"> <!-- A través del name se accede luego en la request del controller -->
                
                </div>

                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group" style="padding-left:7px">
                    <label for="street">Street</label>
                    <input class="form-control" style="width: 50%" type="street" id="street" name="street" value= "{{$user->street}}"> <!-- A través del name se accede luego en la request del controller -->
                
                </div>

                @error('street')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group" style="padding-left:7px">
                    <label for="number">Number</label>
                    <input class="form-control" style="width: 50%" type="number" id="number" name="number" value= "{{$user->number}}"> <!-- A través del name se accede luego en la request del controller -->
                
                </div>

                @error('number')
                <span class="text-danger">{{$message}}</span>
                @enderror

                
                <div class="form-group" style="padding-left:7px">
                    <label for="district">District</label>
                    <input class="form-control" style="width: 50%" type="district" id="district" name="district" value= "{{$user->number}}"> <!-- A través del name se accede luego en la request del controller -->
                
                </div>

                @error('district')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group" style="padding-left:7px">
                    <label for="city">City</label>
                    <input class="form-control" style="width: 50%" type="city" id="city" name="city" value= "{{$user->city}}"> <!-- A través del name se accede luego en la request del controller -->
                
                </div>

                @error('city')
                <span class="text-danger">{{$message}}</span>
                @enderror

                
                <div class="form-group" style="padding-left:7px">
                    <button class="btn btn-primary mt-2" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>