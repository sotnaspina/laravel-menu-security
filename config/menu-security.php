<?php

return [
  'user_model'  => 'App\Models\User',

  'tables'      => [
    'users'             => 'users',
    'sectors'           => 'sectors',
    'menus'             => 'menus',
    'actions'           => 'actions',
    'menus_has_sectors' => 'menus_has_sectors',
    'menus_has_actions' => 'menus_has_actions',
    'users_has_sectors' => 'users_has_sectors',
    'actions_blocked'   => 'actions_blocked',
  ],
];