<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\{LoginRequest, RegistrarRequest};
use App\Http\Requests\Perfil\PerfilUpdateRequest;
use App\Http\Resources\Perfil\PerfilResource;
use App\Models\{Persona, User};
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registrar(RegistrarRequest $request)
    {
        $data                     = $request->validated();
        $data['fecha_nacimiento'] = date('Y-m-d', strtotime($data['fecha_nacimiento']));

        $persona = Persona::create($data);
        $user    = User::create([
            'name'       => $persona->nombre . ' ' . $persona->apellido,
            'email'      => $persona->email,
            'password'   => Hash::make($request->password),
            'persona_id' => $persona->id,
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'is_admin'     => $user->role === 'admin',
            'access_token' => $token,
        ], Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $user        = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'message' => 'Credenciales incorrectas.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'is_admin'     => $user->role === 'admin',
            'access_token' => $token,
        ], Response::HTTP_OK);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Sesión cerrada.',
        ], Response::HTTP_OK);
    }

    public function perfil()
    {
        $persona = auth()->user()->persona;

        return PerfilResource::make($persona);
    }

    public function updatePerfil(PerfilUpdateRequest $request)
    {
        $data                     = $request->validated();
        $data['fecha_nacimiento'] = date('Y-m-d', strtotime($data['fecha_nacimiento']));

        $user    = auth()->user();
        $persona = $user->persona;
        $persona->update($data);
        $user->update([
            'name'  => $persona->nombre . ' ' . $persona->apellido,
            'email' => $persona->email,
        ]);

        return PerfilResource::make($persona);
    }
}
