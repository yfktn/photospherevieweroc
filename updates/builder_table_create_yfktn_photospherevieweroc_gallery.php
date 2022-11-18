<?php namespace Yfktn\PhotoSphereViewerOc\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateYfktnPhotosphereviewerocGallery extends Migration
{
    public function up()
    {
        Schema::create('yfktn_photospherevieweroc_gallery', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title', 256);
            $table->text('description')->nullable();
            $table->string('slug', 256)->index();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->smallInteger('is_shown')->default(1)->index();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('yfktn_photospherevieweroc_gallery');
    }
}
