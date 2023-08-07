<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'description',
  ];

  public function productDetail()
  {
    return $this->hasOne(ProductDetail::class);
  }

  public function category()
  {
    return $this->belongsToMany(Categories::class, 'categories_products', 'product_id', 'category_id');
  }
}
