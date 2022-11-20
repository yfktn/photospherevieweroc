<?php namespace Yfktn\PhotoSphereViewerOc\Components;

use Cms\Classes\ComponentBase;
use Yfktn\PhotoSphereViewerOc\Models\PhotoSphereGallery;

/**
 * GalleryItemViewer Component
 */
class GalleryItemViewer extends ComponentBase
{
    public $galleryItemViewer = [];

    public function componentDetails()
    {
        return [
            'name' => 'GalleryItemViewer Component',
            'description' => 'Load gallery detail'
        ];
    }

    protected function loadAssets()
    {
        $this->addCss('/plugins/yfktn/photospherevieweroc/assets/photo-sphere-viewer.min.css');
        $this->addCss('/plugins/yfktn/photospherevieweroc/assets/plugins/gallery.min.css');
        $this->addJs('/plugins/yfktn/photospherevieweroc/assets/three.min.js');
        $this->addJs('/plugins/yfktn/photospherevieweroc/assets/browser.min.js');
        $this->addJs('/plugins/yfktn/photospherevieweroc/assets/photo-sphere-viewer.min.js');
        $this->addJs('/plugins/yfktn/photospherevieweroc/assets/plugins/gallery.min.js');
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'title'       => 'Slug',
                'description' => 'Parameter slug',
                'default'     => '{{ :slug }}',
                'type'        => 'string',
            ],
        ];
    }

    public function onRun()
    {
        $this->loadAssets();
        $this->galleryItemViewer['slug'] = $this->property('slug');
        $this->galleryItemViewer['gallery'] = PhotoSphereGallery::with(['header_image', 'items'])
            ->shown()
            ->where('slug', $this->galleryItemViewer['slug'])
            ->first();
        if($this->galleryItemViewer['gallery']->items()->count() > 0) {
            $first = $this->galleryItemViewer['gallery']->items()->first();
            $this->galleryItemViewer['firstPanorama'] = [
                $first->panorama->path,
                $first->caption,
                $first->id,
            ];
        } else {
            $this->galleryItemViewer['firstPanorama'] = [
                '/plugins/yfktn/photospherevieweroc/assets/init.jpg',
                'No items found',
                0,
            ];
        }
    }
}
