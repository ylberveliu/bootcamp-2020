<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function set($key, $value) {
        session()->put($key, $value);

        if(!session()->has($key))
            return "Something want wrong!";
        
        return "Session '" .$key. "' was set successfully.";
    }

    public function get($key) {
        if(!session()->has($key))
            return "Session '".$key."' doesn't exist!";

        return view('session', [
            'key' => $key
        ]);
    }

    public function delete($key) {
        if(!session()->has($key))
            return "Session '".$key."' doesn't exist!";
        
        session()->forget($key);
        return "Session '".$key."' was deleted successfully";
    }
}
