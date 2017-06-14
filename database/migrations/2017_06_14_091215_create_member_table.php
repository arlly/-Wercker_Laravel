<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $this->down();
        
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('zip');
            $table->integer('pref');
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('tel1')->nullable();
            $table->string('tel2')->nullable();
            $table->string('tel3')->nullable();
            $table->string('fax1')->nullable();
            $table->string('fax2')->nullable();
            $table->string('fax3')->nullable();
            $table->string('company')->nullable();
            $table->string('division')->nullable();
            $table->string('post')->nullable();
            $table->string('email'); // ユニークではない
            $table->string('password', 60)->nullable(); // 現時点では使う予定なし
            $table->rememberToken()->nullable(); // 現時点では使う予定なし
            $table->integer('is_active')->default(0);
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
        //
        Schema::dropIfExists('members');
    }
}
