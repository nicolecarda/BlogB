<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function login(){
        return view('users.login');
     }

     public function UserLogin(LoginRequest $request)
    {
        /**la clase auth nos permite acceder a toda la informacion 
         * del modelo usaurio que se haya registrado; 
        el metodo attempt nos permite tratar de loguear a un usuario
        con los datos que especificamos */

        if(!Auth::attempt($request->only(['email', 'password']))){ //si no se logra logguear

            return response()->json([
                'status' => false,
                'message' => 'Invalid email and/or password',
            ], 401);

        }

        $user = User::where('email', $request->email)->first(); //si logra logguearse se devuelve al sistema el email y una respuesta con el token
       
        return response()->json([
            'status'=> true,
            'message'=>'User logged in successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken,
        ], 200);

    }


    public function index()
    {
        $users = User::all();

        return view('users.index', compact ('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateUserRequest $request)
    {
        $user = User::create([          // se crea el user con lo que se le pasa por request
            'name' => $request->name,  
            'email'=> $request->email,
            'password'=> Hash::make($request->password), //usamos el hash para encriptar la password
        
        ]);

        return response()->json([
            'status'=> true,
            'message' => 'User created successfully',
            'token'=> $user->createToken("API TOKEN")-> plainTextToken //el header de la petición nos debe entregar el token; se crea a través del metodo createToken de Sanctum
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);

        return view('users.show', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
