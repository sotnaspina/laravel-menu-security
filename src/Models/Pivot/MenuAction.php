<?php

namespace SotnasPina\MenuSecurity\Models\Pivot;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MenuAction extends Pivot
{

  protected $table = 'menus_has_actions';
  protected $fillable = [
      'menu_id',
      'action_id',
  ];

}