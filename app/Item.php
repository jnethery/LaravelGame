<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Item extends Model
{
    protected $table = 'items';
    
    public function getUserItems($id) {
        $items = DB::table($this->table)
                ->select('user_items.count', 'items.name', 'items.description', 'items.img')
                ->join('user_items', 'user_items.item_id', '=', 'items.id')
                ->where('user_items.user_id', '=', $id)
                ->where('user_items.count', '!=', 0)
                ->get();
        return $items;
    }
}
