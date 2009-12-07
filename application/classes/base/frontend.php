<?php 
/**
 * Base controller
 */
class Base_Frontend extends Base_Application {
    /**
     * Is page required auth?
     * @var boolean Default: true
     */
    public $bRequiredAuth = true;

    /**
     * Executes before any controller's action
     */
    public function before(){
        parent::before();

        $oRequest = Request::instance();
        /**
         * Template automatisation
         */
        $sDirectory = strlen($oRequest->directory)?$oRequest->directory.'/':'public/';
        $sTplPath = $sDirectory.$oRequest->controller.'/'.$oRequest->action.'.tpl';
        $this->template = $sTplPath;


        /**
         * Page data
         */
        $oPage = new Pages();
        $this->assign('page', $oPage->findByPath(null, $oRequest->controller));

        /**
         * Top navigation
         */
        $this->assign('aTopNavigation', Pages::instance()->loadAll());
    }

    /**
     * Executes after any controller's action
     */
    public function after(){
        parent::after();
    }
}