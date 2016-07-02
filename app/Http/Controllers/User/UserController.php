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
        $id = Helper::decode($id);
        $itemDB = new Item;
        $userItems = $itemDB->getUserItems($id);
        $item = array();
        $items = array();
        foreach ($userItems as $userItem) {
            $item = array(
                'name' => $userItem->name,
                'description' => $userItem->description,
                'img' => $userItem->img,
            );
            for ($i = 0; $i < $userItem->count; $i++) {
                $items []= $item;
            }
        }
        return view('user.inventory', ['items' => $items]);
    }
}
