<?php

namespace App\Models;

use App\Enums\UserTypesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use tiagomichaelsousa\LaravelFilters\Traits\Filterable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class User extends Authenticatable
{
    use HasFactory,Filterable,HasApiTokens;
    protected $fillable = [
        'id',
        'type',
        'name',
        'email',
        'email_verified',
        'phone',
        'country_id',
        'role_id',
        'password',
        'created_at',
        'update_at',
    ];

    private static $whiteListFilter =['*'];

   public function country():BelongsTo
   {
      return $this->belongsTo(Country::class);
   }
    public function scopePhone($query,$phone)
    {
        return $query->where('phone',$phone);
    }

  public function scopeUser($query)
  {
    return $query->where('type',UserTypesEnum::User);
  }

  public function scopeAdmin($query)
  {
    return $query->where('type',UserTypesEnum::Admin);
  }

  public function scopeType($query, $type)
  {
    return $query->where('type', $type);
  }

  public function addresses():HasMany
  {
    return $this->hasMany(Address::class,'user_address');
  }


}
