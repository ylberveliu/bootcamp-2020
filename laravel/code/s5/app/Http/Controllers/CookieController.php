<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    protected $products = [
        ['title' => 'Coca Cola 1l', 'price' => '1.20 Eur'],
        ['title' => 'Pepsi', 'price' => '1.00 Eur'],
        ['title' => 'Kinder', 'price' => '1.80 Eur']
    ];

    public function set($key, $value, $expire) {
        Cookie::queue(Cookie::make($key, $value, $expire));

        Cookie::queue(Cookie::make('cart', \serialize($this->products)));

        return "Cookie '".$key."' was set successfully";
    }

    public function get($key) {
        if(!Cookie::has($key))
            return "Cookie '".$key."' doesn't exist";

        //return unserialize(Cookie::get('cart')); 

        return $key .": " . Cookie::get($key);
    }

    public function delete($key) {
        if(!Cookie::has($key))
        return "Cookie '".$key."' doesn't exist";

        Cookie::queue(Cookie::forget('email'));
        return "Cookie '".$key."' was deleted successfully";
    }
}
