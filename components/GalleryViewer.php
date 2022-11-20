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
        return [
            'galleryItemPage' => [
                'title' => 'Gallery Item Page',
                'description' => 'Page to show selected virtual gallery item.',
                'type' => 'dropdown',
                'default' => 'photo-sphere-viewer/detail'
            ],];
    }

    public function getGalleryItemPageOptions()
    {
        return \Cms\Classes\Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function onRun()
    {
        $this->dataViewer['theGallery'] = PhotoSphereGallery::with(['header_image', 'items'])
            ->shown()->orderBy('created_at', 'desc')->get();
        $this->dataViewer['galleryItemPage'] = $this->property('galleryItemPage');
    }
}
