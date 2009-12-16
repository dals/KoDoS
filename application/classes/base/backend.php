<?php 
/**
 * Base controller
 */
class Base_Backend extends Base_Application {

//    
//        [directory] =>
//    [controller] => index
//    [action] => index

        public $template;

    /**
     * Is page required auth?
     * @var boolean Default: true
     */
//    public $bRequiredAuth = true;

    /**
     * Executes before any controller's action
     */
    public function before(){
        parent::before();

//       /**
//        * Template automatisation
//        */
//        $oRequest = Request::instance();
//        $sTplPath = $oRequest->directory.'/'.$oRequest->controller.'/'.$oRequest->action.'.tpl';
//        $this->template = $sTplPath;
    }

    /**
     * Executes after any controller's action
     */
    public function after(){
        parent::after();
    }
}