<?php namespace Yfktn\PhotoSphereViewerOc\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateYfktnPhotospherevieweroc extends Migration
{
    public function up()
    {
        Schema::create('yfktn_photospherevieweroc_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('caption', 256)->nullable();
            $table->smallInteger('is_shown')->default(1)->index();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('slug', 256)->index();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('yfktn_photospherevieweroc_');
    }
}
