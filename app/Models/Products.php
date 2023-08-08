<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  use HasFactory;

  protected $fillable = [
    'brands_id',
    'name',
    'description',
  ];

  public function productDetail()
  {
    return $this->hasOne(ProductDetail::class);
  }

  public function brand()
  {
    return $this->belongsTo(Brand::class);
  }

  public function category()
  {
    return $this->belongsToMany(Categories::class, 'categories_products', 'product_id', 'category_id');
  }
}
