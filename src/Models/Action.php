<?php

namespace SotnasPina\MenuSecurity\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use SotnasPina\MenuSecurity\Models\Traits\ActionBlockedTrait;

class Action extends Eloquent
{

  use ActionBlockedTrait;

  protected $table = 'actions';
  protected $fillable = [
      'as',
      'name',
      'enable',
  ];

}
