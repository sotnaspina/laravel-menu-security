<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuSecurityTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tables = config('menu-security.tables');

        Schema::create($tables['sectors'], function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique()->index();
            $table->char('enable', 1)->default('Y');
            $table->timestamps();
        });

        Schema::create($tables['menus'], function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id', 10);
            $table->string('name', 50)->unique()->index();
            $table->string('icon', 20)->nullable();
            $table->string('color', 20)->nullable();
            $table->string('route', 100)->nullable()->index();
            $table->char('enable', 1)->default('Y');
            $table->integer('ordination', 2);
            $table->timestamps();
        });

        Schema::create($tables['actions'], function (Blueprint $table) {
            $table->increments('id');
            $table->string('as', 50);
            $table->string('name', 50);
            $table->char('enable', 1)->default('Y');
            $table->timestamps();
        });

        Schema::create($tables['menus_has_sectors'], function (Blueprint $table) use ($tables) {
            $table->unsignedInteger('menu_id');
            $table->unsignedInteger('sector_id');

            $table->foreign('menu_id')->references('id')->on($tables['menus'])->onDelete('cascade');

            $table->foreign('sector_id')->references('id')->on($tables['sectors'])->onDelete('cascade');

            $table->primary(['menu_id', 'sector_id']);

            app('cache')->forget('sotnaspina.menu-security.cache');
        });

        Schema::create($tables['menus_has_actions'], function (Blueprint $table) use ($tables) {
            $table->unsignedInteger('menu_id');
            $table->unsignedInteger('action_id');

            $table->foreign('menu_id')->references('id')->on($tables['menus'])->onDelete('cascade');

            $table->foreign('action_id')->references('id')->on($tables['actions'])->onDelete('cascade');

            $table->primary(['menu_id', 'action_id']);

            app('cache')->forget('sotnaspina.menu-security.cache');
        });

        Schema::create($tables['users_has_sectors'], function (Blueprint $table) use ($tables) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('sector_id');

            $table->foreign('user_id')->references('id')->on($tables['users'])->onDelete('cascade');

            $table->foreign('sector_id')->references('id')->on($tables['sectors'])->onDelete('cascade');

            $table->primary(['user_id', 'sector_id']);

            app('cache')->forget('sotnaspina.menu-security.cache');
        });

        Schema::create($tables['actions_blocked'], function (Blueprint $table) use ($tables) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('menu_id');
            $table->unsignedInteger('action_id');

            $table->foreign('user_id')->references('id')->on($tables['users'])->onDelete('cascade');

            $table->foreign('menu_id')->references('id')->on($tables['menus'])->onDelete('cascade');

            $table->foreign('action_id')->references('id')->on($tables['actions'])->onDelete('cascade');

            $table->primary(['user_id', 'menu_id', 'action_id']);

            app('cache')->forget('sotnaspina.menu-security.cache');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables = config('menu-security.tables');

        Schema::dropIfExists($tables['actions_blocked']);
        Schema::dropIfExists($tables['users_has_sectors']);
        Schema::dropIfExists($tables['menus_has_actions']);
        Schema::dropIfExists($tables['menus_has_sectors']);
        Schema::dropIfExists($tables['actions']);
        Schema::dropIfExists($tables['menus']);
        Schema::dropIfExists($tables['sectors']);
    }
}