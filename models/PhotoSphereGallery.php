<?php namespace Yfktn\PhotoSphereViewerOc\Models;

use Model;
use October\Rain\Database\Traits\Sluggable;

/**
 * Model
 */
class PhotoSphereGallery extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use Sluggable;

    protected $slugs = [
        'slug' => 'title',
    ];
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'yfktn_photospherevieweroc_gallery';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => 'required'
    ];

    public $attachOne = [
        'header' => [ 'System\Models\File' ]
    ];

    public $belongsToMany = [
        'items' => [
            PhotoSphereViewer::class,
            'table' => 'yfktn_photospherevieweroc_gallery_item',
            'key' => 'gallery_id',
            'otherKey' => 'item_id'
        ]
    ];
}
