<?php

namespace SotnasPina\MenuSecurity\Models\Scope;

use Illuminate\Database\Eloquent\ScopeInterface;
use Illuminate\Database\Eloquent\Builder;

class UserLoggedInScope implements ScopeInterface {

  public function userId(Builder $builder) {
    $auth = auth()->guard(config('auth.defaults.guard'))->user();

    $builder->where('user_id', $auth->id);
  }

}