<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store( User $user )
    {
        // attach - para relación de muchos a muchos cuando se relaciona con la misma tabla
        $user->followers()->attach( auth()->user()->id );
        return back();
    }


    public function destroy( User $user )
    {
        // detach - quitando registro
        $user->followers()->detach( auth()->user()->id );
        return back();
    }
}
