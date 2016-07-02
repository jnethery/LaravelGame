<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Item;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    function getInventory($id) {
        $itemsSQL = Item::all();
        $item = array();
        $items = array();
        foreach ($itemsSQL as $item) {
            $item = array(
                'name' => $item->name,
                'description' => $item->description,
                'img' => $item->img,
            );
        }
        for ($i = 0; $i < 20; $i++) {
            $items []= $item;
        }
        return view('user.inventory', ['items' => $items]);
    }
}
