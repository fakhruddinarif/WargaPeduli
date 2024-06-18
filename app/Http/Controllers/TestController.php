<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $file = $request->all();
        Storage::disk('s3')->put('testing', $file['file'], 's3');
        return response()->json(['message' => 'Success']);
    }
}
