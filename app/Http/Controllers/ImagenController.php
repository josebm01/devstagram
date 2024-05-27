<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{   
    public function store(Request $request)
    {

        $folderPath = public_path('uploads');

        // $input = $request->all();
        $imagen = $request->file('file');

        // nombre único de la imagen
        $nombreImagen = Str::uuid().".".$imagen->extension();

        // procesa la imagen
        $imagenServidor = Image::make($imagen);
        // definiendo tamaño
        $imagenServidor->fit(1000,1000);


        // Verificar si la carpeta existe
        if (!is_dir($folderPath)) {
            // Si la carpeta no existe, crearla
            mkdir($folderPath, 0700, true);
        } 


        // guardando archivo en la carpeta
        $imagePath = public_path('uploads').'/'.$nombreImagen;
        $imagenServidor->save($imagePath);

        return response()->json([
            'img' => $nombreImagen
        ]);
    }
}
