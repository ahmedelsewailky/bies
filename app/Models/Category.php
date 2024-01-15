<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name', 'slug', 'parent_id', 'icon'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function($category) {
            return $category->slug = str()->slug($category->name);
        });
    }

    /**
     * Get the parent name of sub category.
     *
     * @param int $parentId
     * @return void
     */
    public function getParentName($parentId)
    {
        if (!is_null($parentId)) {
            return self::find($parentId)->first()->name;
        }
        return;
    }
}
