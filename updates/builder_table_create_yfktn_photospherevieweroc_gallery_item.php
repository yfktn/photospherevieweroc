<?php namespace Yfktn\PhotoSphereViewerOc\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateYfktnPhotosphereviewerocGalleryItem extends Migration
{
    public function up()
    {
        Schema::create('yfktn_photospherevieweroc_gallery_item', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('item_id')->unsigned()->index();
            $table->integer('gallery_id')->unsigned()->index();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('yfktn_photospherevieweroc_gallery_item');
    }
}
