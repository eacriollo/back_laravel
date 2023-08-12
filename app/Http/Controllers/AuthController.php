<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function funLogin(Request $request) {
        // validar usuarios
        $credenciales = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        //verificar los datos de usuarios registrados en base de datos

        if(!Auth::attempt($credenciales)){
            return response()->json(["message" => "No registrado"]);
        }

        //generar un token de los usuarios registrados

        $usuario = Auth::user();
        $token = $usuario->createToken("token personal")->plainTextToken;

        //repusta de la generacion de token e ingreso 

        return response()->json([
            "access_token" => $token,
            "type_token" => "Bearar",
            "usuario" => $usuario
        ]);


    }

    public function funRegistro(Request $request) {
        // validar datos
        $request ->validate([

            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required",
            "c_password" => "required|same:password"
        ]);

        // gurdar los datos en la base de los usuarios

        $usuario = new User;
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        return response()->json(["mensaje" => "usuario registrado"], 201);



    }

    public function funPerfil() {
        // ingreso a perfil de usuario
        return Auth::user();

    }

    public function funSalir() {
        Auth::user()->tokens()->delete();

        return response()->json(["message" => "SAlio del perfil"]);
    }
}
