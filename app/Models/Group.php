<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public function User() {
        return $this->hasMany(User::class);
    }

    // Groups Select Data
    public static function arrayForSelect() {
        $arr = [];
        $groups = Group::all();
        foreach ($groups as $group) {
            $arr[$group->id] = $group->title;
        }
        return $arr;
    }

}
