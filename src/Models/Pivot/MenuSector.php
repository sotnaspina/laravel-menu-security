<?php

namespace SotnasPina\MenuSecurity\Models\Pivot;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MenuSector extends Pivot
{

  protected $table = 'menus_has_sectors';
  protected $fillable = [
      'menu_id',
      'sector_id',
  ];

}