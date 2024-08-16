<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use tiagomichaelsousa\LaravelFilters\Traits\Filterable;

class City extends Model
{
  use HasFactory, Translatable,Filterable,HasRoles,SoftDeletes;
  protected $fillable = ['country_id', 'name','active'];
  public $translatedAttributes = ['name'];

  public function county():BelongsTo
  {
    return $this->belongsTo(Country::class);
  }
}
