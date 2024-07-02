@extends('layouts.index')


@section('title', 'login')

@section('body')
    <section class="form-login">
        <h1>Welcome</h1>

            <form method="POST" action="{{route('users.login')}}"> <!-- Antes de llegar a esta ruta pasa por el middleware -->
            
                @csrf <!-- CSRF protection -->

                <div class="form-group" style="padding-left:7px">
                    <label for="email">Email</label>
                    <input class="form-control" style="width: 50%" type="email" id="email" name="email" placeholder="Enter your email"> <!-- En el middleware se usa el name para comparar con el request -->
                
                </div>

                <div class="form-group" style="padding-left:7px">
                    <label for="password">Password</label>
                    <input class="form-control" style="width: 50%"  type="password" id="password" name="password" placeholder="Enter your password">
                </div>

                <div class="form-group" style="padding-left:7px">
                    <button class="btn btn-primary mt-2" type="submit">Login</button>
                    <p><a href="#">Did you forget your password?</a></p>
                </div>
            </form>
        </div>
    </div>
    
@endsection