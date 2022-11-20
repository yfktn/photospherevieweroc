<?php namespace Yfktn\PhotoSphereViewerOc;

use Backend;
use System\Classes\PluginBase;

/**
 * photosphereViewerOc Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'PhotoSphereViewerOc',
            'description' => 'Photo Sphere Viewer OctoberCMS Plugin',
            'author'      => 'Yfktn',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Yfktn\PhotoSphereViewerOc\Components\GalleryViewer' => 'galleryViewer',
            'Yfktn\PhotoSphereViewerOc\Components\GalleryItemViewer' => 'galleryItemViewer',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'yfktn.photospherevieweroc.editor' => [
                'tab' => 'PhotoSphereViewerOc',
                'label' => 'Photo Sphere Editor'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'photospherevieweroc' => [
                'label'       => 'PhotoSphereViewer',
                'url'         => Backend::url('yfktn/photospherevieweroc/photospheregallery'),
                'icon'        => 'icon-laptop',
                'permissions' => ['yfktn.photospherevieweroc.*'],
                'order'       => 500,

                'sideMenu' => [
                    'psvgallery' => [
                        'label' => 'Gallery',
                        'icon' => 'icon-list-ul',
                        'url' => Backend::url('yfktn/photospherevieweroc/photospheregallery'),
                        'permissions' => ['yfktn.photospherevieweroc.editor'],
                    ],
                    'psvitem' => [
                        'label' => 'Item',
                        'icon' => 'icon-map',
                        'url' => Backend::url('yfktn/photospherevieweroc/photosphereviewer'),
                        'permissions' => ['yfktn.photospherevieweroc.editor'],
                    ],
                ]
            ],
        ];
    }
}
