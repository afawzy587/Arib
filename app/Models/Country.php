<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use tiagomichaelsousa\LaravelFilters\Traits\Filterable;

class Country extends Model implements TranslatableContract
{
  use HasFactory, Translatable,Filterable,SoftDeletes;
  protected $fillable = ['code', 'phone_code', 'active','currency'];
  public $translatedAttributes = ['name'];


  public function cities():HasMany
  {
    $this->hasMany(City::class);
  }
}
