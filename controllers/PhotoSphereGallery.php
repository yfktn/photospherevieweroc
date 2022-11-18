<?php namespace Yfktn\PhotoSphereViewerOc\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Photo Sphere Gallery Backend Controller
 */
class PhotoSphereGallery extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\RelationController::class,
        \Backend\Behaviors\ListController::class
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';
    
    public $relationConfig = 'config_relation.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Yfktn.PhotoSphereViewerOc', 'photospherevieweroc', 'psvgallery');
    }
}
