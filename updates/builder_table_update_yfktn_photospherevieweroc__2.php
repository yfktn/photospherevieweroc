<?php namespace Yfktn\PhotoSphereViewerOc\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateYfktnPhotospherevieweroc2 extends Migration
{
    public function up()
    {
        Schema::table('yfktn_photospherevieweroc_', function($table)
        {
            $table->text('embedded_map')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('yfktn_photospherevieweroc_', function($table)
        {
            $table->dropColumn('embedded_map');
        });
    }
}
