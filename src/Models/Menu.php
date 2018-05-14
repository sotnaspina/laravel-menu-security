<?php

namespace SotnasPina\MenuSecurity\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Menu extends Eloquent
{

  protected $table = 'menus';
  protected $fillable = [
      'parent_id',
      'name',
      'icon',
      'color',
      'route',
      'enable',
      'ordination',
  ];

  public function sectors()
  {
    return $this->belongsToMany(Sector::class)->using(SotnasPina\MenuSecurity\Models\Pivot\MenuSector::class);
  }

  public function actions()
  {
    return $this->belongsToMany(Action::class)->using(SotnasPina\MenuSecurity\Models\Pivot\MenuAction::class);
  }

}