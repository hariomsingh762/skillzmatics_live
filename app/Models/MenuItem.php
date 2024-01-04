<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public function submenus()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->with('submenus');
    }

    public function getAllSubmenusAttribute()
    {
        $submenus = collect([$this]);

        foreach ($this->submenus as $submenu) {
            $submenus = $submenus->merge($submenu->getAllSubmenusAttribute());
        }

        return $submenus;
    }
}



