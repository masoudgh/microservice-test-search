<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;

class SubscribeController extends Controller
{
    public function subscribe()
    {
        Redis::subscribe(['create-item'], function ($message) {
            file_put_contents('book-' . time() . '.json', $message);
        });
    }
}
