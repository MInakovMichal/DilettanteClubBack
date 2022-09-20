<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');

            $table->timestamps();
        });

        $this->insertLanguage('English', 'EN');
        $this->insertLanguage('Polish', 'PL');
        $this->insertLanguage('Ukraine', 'UA');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }

    /**
     * @param string $name
     * @param string $code
     */
    private function insertLanguage(string $name, string $code){
        DB::table('languages')->insert(
            array(
                'name' => $name,
                'code' => $code
            )
        );
    }
}
