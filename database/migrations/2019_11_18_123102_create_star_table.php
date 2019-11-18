<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('star', function (Blueprint $table) {
            $table->increments('id');
            $table->string('star_title')->nullable()->comment('星球名称');
            $table->integer('rusn_id')->nullable()->comment('闯关ID');
            $table->integer('created_at')->default(0)->comment('创建时间');
            $table->integer('updated_at')->default(0)->comment('修改时间');
            $table->integer('deleted_at')->default(0)->comment('删除时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('star');
    }
}
