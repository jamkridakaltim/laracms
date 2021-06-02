<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Post */
        Schema::create('posts', function($table){
            $table->increments('id');
            $table->integer('category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('tags')->nullable();
            $table->text('content');
            $table->string('type')->default('post');
            $table->integer('type_id')->nullable();
            $table->integer('read')->default(0);
            $table->smallInteger('status')->default(1);
            $table->dateTime('published_at')->nullable();
            $table->integer('user_id');
            $table->timestamps();
        });

        /* Post Category */
        Schema::create('post_categories', function($table){
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->smallInteger('status')->default(1);
            $table->timestamps();
        });

        /* Files */
        Schema::create('files', function($table){
            $table->increments('id');
            $table->string('name');
            $table->string('type', 50);
            $table->string('path');
            $table->string('disk', 10)->default('local');
            $table->string('fileable_type')->nullable();
            $table->integer('fileable_id')->nullable();
            $table->string('field')->nullable();
            $table->text('meta');

            $table->timestamps();
        });


        /* Menus */
        Schema::create('menus', function($table){
            $table->increments('id');
            $table->string('name', 100);
            $table->string('slug');
            $table->string('link')->nullable();
            $table->string('icon', 30)->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('position')->nullable();
            $table->tinyInteger('order')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('lock')->default(0);
            $table->timestamps();
        });

        /* Setting */
        Schema::create('settings', function($table){
            $table->string('key')->primaryKey();
            $table->text('value');
        });

        /* Gallery */
        Schema::create('galleries', function($table){
            $table->increments('id');
            $table->string('type', 50)->default('image');
            $table->string('caption');
            $table->string('slug');
            $table->string('link')->nullable();
            $table->string('tags')->nullable();
            $table->text('description')->nullable();
            $table->integer('read')->default(0);
            $table->tinyInteger('featured')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

        /* Pollings */
        Schema::create('pollings', function($table){
            $table->increments('id');
            $table->enum('type', ['question', 'answer'])->default('question');
            $table->tinyInteger('parent')->default(0)->unsigned();
            $table->string('content')->nullable();
            $table->double('score')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

        /* Agenda */
        Schema::create('agendas', function($table){
            $table->increments('id');
            $table->date('date');
            $table->time('time');
            $table->string('caption');
            $table->text('description')->nullable();
            $table->string('location');
            $table->timestamps();
        });

        /* Link */
        Schema::create('links', function($table){
            $table->increments('id');
            $table->string('category')->default('internal');
            $table->string('name');
            $table->string('link');
            $table->string('icon', 30)->nullable();
            $table->tinyInteger('order')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('lock')->default(0);
        });

        /* Contacts */
        Schema::create('contacts', function($table){
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('website')->nullable();
            $table->text('message');

            $table->timestamps();
        });

        /* Visitor */
        Schema::create('visitors', function($table){
            $table->string('ip', 32)->primaryKey();
            $table->string('country')->nullable();
            $table->integer('total')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_categories');
        Schema::dropIfExists('files');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('settings');
        // Schema::dropIfExists('sliders');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('pollings');
        Schema::dropIfExists('agendas');
        Schema::dropIfExists('links');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('visitors');
        // Schema::dropIfExists('produk');
        // Schema::dropIfExists('toko');

    }
}
