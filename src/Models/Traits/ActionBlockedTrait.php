<?php

namespace SotnasPina\MenuSecurity\Models\Traits;

use SotnasPina\MenuSecurity\Models\Scope\UserLoggedInScope;

trait ActionBlockedTrait
{

  /**
	 * Boot the scope.
	 * 
	 * @return void
	 */
	public static function bootPublishedTrait()
	{
		static::addGlobalScope(new UserLoggedInScope);
	}

  /**
   * 
   *
   * @param  integer  $ralation_id
   * @return boolean
   */
  public function isBlocked(...$ralation_id)
  {
    return false;
  }

}
