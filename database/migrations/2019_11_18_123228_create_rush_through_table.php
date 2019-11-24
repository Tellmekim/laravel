<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRushThroughTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rush_through', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uniacid')->nullable()->comment('公众号ID');
            $table->string('rusn_title')->nullable()->comment('闯关名称');
            $table->text('img_url',65535)->nullable()->comment('闯关链接');
            $table->tinyInteger('is_yes')->nullable()->comment('0错,1对');
            $table->integer('score')->nullable()->comment('分数');
            $table->integer('grade_id')->nullable()->comment('年级ID');
            $table->integer('star')->nullable()->comment('星球ID');
            $table->integer('speech_id')->nullable()->comment('词类ID');
            $table->integer('clearance_time')->nullable()->comment('闯关时间');
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
        Schema::dropIfExists('rush_through');
    }
}
