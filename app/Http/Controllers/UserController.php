<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Welcome to the user dashboard!',
            'user' => 'John Doe'
        ]);
    }

    public function show($id)
    {
        // Contoh data dummy
        $user = [
            'id' => $id,
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ];

        return response()->json([
            'message' => 'User details',
            'data' => $user
        ]);
    }
}
