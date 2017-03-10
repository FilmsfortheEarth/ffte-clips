<?php namespace Ffte\Clips\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFfteClips extends Migration
{
    public function up()
    {
        Schema::create('ffte_clips_clips', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('url');
            $table->string('embedUrl')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ffte_clips_clips');
    }
}
