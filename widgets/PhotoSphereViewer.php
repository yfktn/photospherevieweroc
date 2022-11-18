<?php namespace Yfktn\PhotoSphereViewerOc\Widgets;

use Backend\Classes\WidgetBase;

class PhotoSphereViewer extends WidgetBase
{
    protected $defaultAlias = 'photo_sphere_viewer_widget';
    protected $modelOwnerObject;

    public function setModelOwnerObject($modelObject)
    {
        $this->modelOwnerObject = $modelObject;
    }

    public function render()
    {
        return $this->makePartial('default', [
            'panoramaImage' => $this->getPanoramaImage(),
            'caption' => $this->getCaption(),
            'description' => $this->getDescription(),
            'embedded_map' => $this->getEmbeddedMap(),
        ]);
    }

    protected function loadAssets()
    {
        $this->addCss('/plugins/yfktn/photospherevieweroc/assets/photo-sphere-viewer.min.css');
        $this->addJs('/plugins/yfktn/photospherevieweroc/assets/three.min.js');
        $this->addJs('/plugins/yfktn/photospherevieweroc/assets/browser.min.js');
        $this->addJs('/plugins/yfktn/photospherevieweroc/assets/photo-sphere-viewer.min.js');
    }

    protected function getPanoramaImage()
    {
        if($this->modelOwnerObject == null) {
            return '/plugins/yfktn/photospherevieweroc/assets/init.jpg';
        }
        return $this->modelOwnerObject->panorama->getPath();
    }

    protected function getCaption()
    {
        return $this->modelOwnerObject == null? 
            '':
            $this->modelOwnerObject->caption;
    }

    protected function getDescription()
    {
        return $this->modelOwnerObject == null? 
            '<p></p>':
            $this->modelOwnerObject->description;
    }

    protected function getEmbeddedMap()
    {
        return $this->modelOwnerObject == null? 
            '<p></p>':
            $this->modelOwnerObject->embedded_map;
    }

    public function onRefreshModelOwner()
    {
        
    }
}