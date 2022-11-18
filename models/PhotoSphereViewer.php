<?php namespace Yfktn\PhotoSphereViewerOc\Models;

use Model;
use October\Rain\Database\Traits\Sluggable;

/**
 * Model
 */
class PhotoSphereViewer extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use Sluggable;

    protected $slugs = [
        'slug' => 'caption'
    ];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'yfktn_photospherevieweroc_';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'caption' => 'required'
    ];
    
    public $attachOne = [
        'panorama' => [ 'System\Models\File' ]
    ];

    public function scopeShown($query)
    {
        return $query->where('is_shown', 1);
    }
}
