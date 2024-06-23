<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;



class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {      
          try
          {           

            $user = User::where('email', $request->email)->first();   //trae el primer email que coincida con el request

            if(!$user){ 

            return response()->json(['Message' => 'Invalid credentials'], 401);

            } //si no hay un else se sigue ejecutando el código

            if($user && $request->password !== $user->password){

              return response()->json(['Message' => 'Invalid credentials'], 401);

            }

            return $next($request);  //autoriza la solicitud y pasa al siguiente middleware; debe ir dentro del try


          }catch(\Exception $ex){

            return response()->json(['Error' =>$ex], 500);           

          }          
    
    }

}

