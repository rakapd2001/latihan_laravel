<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function sayHello()
    {
        return response()->json(
            ['message' => 'Hello World'],
            200
        );
    }
}
