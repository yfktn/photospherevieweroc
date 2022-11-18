<?php namespace Yfktn\PhotoSphereViewerOc\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Yfktn\PhotoSphereViewerOc\Models\photosphereViewer as ModelsphotosphereViewer;
use Yfktn\PhotoSphereViewerOc\Widgets\photosphereViewer as WidgetsphotosphereViewer;

/**
 * Photo Spehere Viewer Backend Controller
 */
class PhotoSphereViewer extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

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

        BackendMenu::setContext('Yfktn.photosphereViewerOc', 'photospherevieweroc', 'psvitem');

        $photoSpehereViewerWidget = new WidgetsphotosphereViewer($this);
        $photoSpehereViewerWidget->alias = 'photoSpehereViewerWidget';
        $photoSpehereViewerWidget->bindToController();
    }

    public function update($recordId, $context = null)
    {
        $this->widget->photoSpehereViewerWidget
            ->setModelOwnerObject(
                ModelsphotosphereViewer::with('panorama')->findOrFail($recordId)
            );
        return $this->asExtension('FormController')->update($recordId, $context);
    }


}
