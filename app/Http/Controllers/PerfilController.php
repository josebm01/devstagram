<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PerfilController extends Controller implements HasMiddleware
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
        ];
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {

        //! Modificando el request
        $request->request->add(['username' => Str::slug( $request->username )]);  // slug - convierte a url, los espacios los pone con guiones medios

        //* excluyendo valores con not-in
        $request->validate([
            'username' => [ 'required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:15', 'not-in:twitter,editar-perfil' ],
            'password' => 'confirmed',
        ]);



        // guardar imagen si la hay
        if ( $request->imagen ) {


            $folderPath = public_path('perfiles');

            // Verificar si la carpeta existe
            if (!is_dir($folderPath)) {
                // Si la carpeta no existe, crearla
                mkdir($folderPath, 0700, true);
            }
            
            $imagen = $request->file('imagen');
            // nombre único de la imagen
            $nombreImagen = Str::uuid().".".$imagen->extension();

            // procesa la imagen
            $imagenServidor = Image::make($imagen);
            // definiendo tamaño
            $imagenServidor->fit(1000,1000);

            // guardando archivo en la carpeta
            $imagePath = public_path('perfiles').'/'.$nombreImagen;
            $imagenServidor->save($imagePath);
        }



        // guardar los cambios
        $usuario = User::find( auth()->user()->id );
        $usuario->username = $request->username;
        // manteniendo la imagen actual si no se guarda
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        if ( $request->password ){
            $usuario->password = $this->checkPassword( $request->password, auth()->user()->password );
        }
        $usuario->save();
        

      


        // redireccionar
        return redirect()->route('posts.index', $usuario->username);
    }


    public function checkPassword($passwordFromRequest, $hashedPassword)
    {

        // Comparar las contraseñas
        if ( !Hash::check($passwordFromRequest, $hashedPassword) ) {
            return $passwordFromRequest;
        } 

        return auth()->user()->password;
    }

}
