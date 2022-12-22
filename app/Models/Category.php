<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $connection = "mysql";

    protected $fillable = ['name', 'image'];

    protected $primaryKey = 'id';

    protected $keyType = 'int';


    protected $casts = [
        'created_at' => 'datetime',
        'name' => 'json',
    ];

    protected $dateFormat = 'Y-m-d h:m:s';

    public $incrementing = true;

    public $timestamps = true;

    public function products(){
        return $this->hasOne(Product::class, 'category_id', 'id');
    }
}
