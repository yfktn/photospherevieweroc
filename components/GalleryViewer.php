<?php namespace Yfktn\PhotoSphereViewerOc\Components;

use Cms\Classes\ComponentBase;
use Yfktn\PhotoSphereViewerOc\Models\PhotoSphereGallery;

/**
 * GalleryViewer Component
 */
class GalleryViewer extends ComponentBase
{
    public $dataViewer = [];

    public function componentDetails()
    {
        return [
            'name' => 'GalleryViewer Component',
            'description' => 'Load Gallery Photo Sphere'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    protected function loadAssets()
    {
        $this->addCss('/plugins/yfktn/photospherevieweroc/assets/photo-sphere-viewer.min.css');
        $this->addJs('/plugins/yfktn/photospherevieweroc/assets/three.min.js');
        $this->addJs('/plugins/yfktn/photospherevieweroc/assets/browser.min.js');
        $this->addJs('/plugins/yfktn/photospherevieweroc/assets/photo-sphere-viewer.min.js');
    }

    public function onRun()
    {
        $this->loadAssets();
        $this->dataViewer['theGallery'] = PhotoSphereGallery::with(['header_image', 'items'])
            ->shown()->orderBy('created_at', 'desc')->get();
    }
}
