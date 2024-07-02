<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function login(): View
     {
        return view('users.login');
     }

     

    //  public function UserLogin(LoginRequest $request)
    // {
    //     /**la clase auth nos permite acceder a toda la informacion 
        //  * del modelo usaurio que se haya registrado; 
        // el metodo attempt nos permite tratar de loguear a un usuario
        // con los datos que especificamos */

    //     if(!Auth::attempt($request->only(['email', 'password']))){ //si no se logra logguear

    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Invalid email and/or password',
    //         ], 401);

    //     }

    //     $user = User::where('email', $request->email)->first(); //si logra logguearse se devuelve al sistema el email y una respuesta con el token
       
    //     return response()->json([
    //         'status'=> true,
    //         'message'=>'User logged in successfully',
    //         'token' => $user->createToken("API TOKEN")->plainTextToken,
    //     ], 200);

    // }


    public function index(): View
    {
        $users = User::all();

        return view('users.index', compact ('users'));
    }

    public function register():View
    {
        return view('users.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(CreateUserRequest $request): RedirectResponse
    {
        $user = User::create([          // se crea el user con lo que se le pasa por request
            'name' => $request->name,  
            'email'=> $request->email,
            'password'=> Hash::make($request->password), //usamos el hash para encriptar la password
        ]);

        Session::push('user', [
             'name'=> $request->name,
             'email'=> $request->email,
        ]);

        return redirect()->route('users.login', $user)->with('info', 'The user was created ok');

        // return response()->json([
        //     'status'=> true,
        //     'message' => 'User created successfully',
        //     'token'=> $user->createToken("API TOKEN")-> plainTextToken //el header de la petición nos debe entregar el token; se crea a través del metodo createToken de Sanctum
        // ], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $user = User::find($id);

        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $user = User::find($id);

        return view ('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditUserRequest $request, string $id): RedirectResponse
    {
        $user = User::find($id);

        $user-> update($request-> all()); // devuelve todos los campos de la request

        return redirect()->route('users.index', $user)->with('info', 'The user was updated ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $users = User::find($id);

        $users-> delete();

        return redirect()->route('users.index', $id)->with('info', 'The user was deleted ok');
    }
}
