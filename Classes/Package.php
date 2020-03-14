<?php
namespace SorenMalling\EmitViewResolved;

use Neos\Flow\Core\Bootstrap;
use Neos\Flow\Mvc\Controller\ActionController;
use Neos\Flow\Mvc\View\ViewInterface;
use Neos\Flow\Package\Package as BasePackage;


/**
 * The Flow Package
 */
class Package extends BasePackage
{

    /**
     * Invokes custom PHP code directly after the package manager has been initialized.
     *
     * @param Bootstrap $bootstrap The current bootstrap
     * @return void
     */
    public function boot(Bootstrap $bootstrap)
    {

        $dispatcher = $bootstrap->getSignalSlotDispatcher();

        $dispatcher->connect(ActionController::class, 'viewResolved', function (ViewInterface $view) {
            $view->assign('settingPassedFromSignal', 'sun is shining');
        });

    }
}
