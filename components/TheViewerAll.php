<?php namespace Yfktn\PhotoSphereViewerOc\Components;

use Cms\Classes\ComponentBase;
use Yfktn\PhotoSphereViewerOc\Models\PhotoSphereViewer;

/**
 * TheViewerAll Component
 */
class TheViewerAll extends ComponentBase
{
    public $dataViewer = [];

    public function componentDetails()
    {
        return [
            'name' => 'TheViewerAll Component',
            'description' => 'Load Photo Sphere'
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
        $panoramaObjects = PhotoSphereViewer::shown()->all();

    }
}
