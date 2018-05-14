<?php

namespace SotnasPina\MenuSecurity\Models\Pivot;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserSector extends Pivot
{

  protected $table = 'users_has_sectors';
  protected $fillable = [
      'user_id',
      'sector_id',
  ];

}
