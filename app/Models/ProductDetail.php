<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
  use HasFactory;

  protected $fillable = [
    'products_id',
    'detail'
  ];

  public function product()
  {
    return $this->belongsTo(Products::class);
  }
}
