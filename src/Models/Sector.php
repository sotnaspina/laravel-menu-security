<?php

namespace SotnasPina\MenuSecurity\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Sector extends Eloquent
{

  protected $table = 'sectors';
  protected $fillable = [
      'name',
      'enable',
  ];

  public function menus()
  {
    return $this->belongsToMany(Menu::class)->using(SotnasPina\MenuSecurity\Models\Pivot\MenuSector::class);
  }

  public function users()
  {
    $user = config('menu-security.user_model');
    return $this->belongsToMany($user)->using(SotnasPina\MenuSecurity\Models\Pivot\UserSector::class);
  }

}
