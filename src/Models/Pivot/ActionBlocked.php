<?php

namespace SotnasPina\MenuSecurity\Models\Pivot;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ActionBlocked extends Pivot
{

  protected $table = 'actions_blocked';
  protected $fillable = [
      'user_id',
      'menu_id',
      'action_id',
  ];

}