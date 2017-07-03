<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldToMemer extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('members', function ($table) {
            $table->renameColumn('address1', 'address');
            $table->renameColumn('tel1', 'tel');
            $table->renameColumn('fax1', 'fax');
        });
        
        Schema::table('members', function ($table) {
            $table->dropColumn('address2');
            $table->dropColumn('tel2');
            $table->dropColumn('tel3');
            $table->dropColumn('fax2');
            $table->dropColumn('fax3');
            
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
    }
}
