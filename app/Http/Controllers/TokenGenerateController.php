<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenGenerateController extends Controller
{
    public function index() {

        return [
            'encode' => base64_encode('Anggi Perdana Sudrajad'),
            'decode' => base64_decode('QW5nZ2kgUGVyZGFuYSBTdWRyYWphZA')
        ];
    }
}
