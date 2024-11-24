<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='category';
    
   
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function parent()
{
    return $this->belongsTo(Category::class, 'parent_id');
}

public function sortedAfter()
{
    return $this->belongsTo(Category::class, 'sort_order');
}
//
public function hasSubMenu()
{
    return $this->subCategories()->exists();
}
public function subCategories()
{
    return $this->hasMany(Category::class, 'parent_id');
}
}
