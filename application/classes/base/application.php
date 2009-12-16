<?php 
/**
 * Base controller
 */
class Base_Application extends Controller_Smarty {
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
        $oRequest = Request::instance();
        /**
         * Template automatisation
         */
        $sDirectory = strlen($oRequest->directory)?$oRequest->directory.'/':'public/';
        $sTplPath = $sDirectory.$oRequest->controller.'/'.$oRequest->action.'.tpl';
        $this->template = $sTplPath;


        /**
         * Assign instance of Application class to get handy calls to objects
         */
        $oApplication = new Application();
        $this->assign('Application', $oApplication);

        /**
         * Page data
         */
        $oPage = new Pages();
        $this->assign('page', $oPage->findByPath($oRequest->action, $oRequest->controller, null));

        /**
         * Top navigation
         */
        $this->assign('aTopNavigation', $oPage->loadAll());

        /**
         * User data
         */
        $oUser = (object) null;
        $oUser->{'username'} = 'Guest';
        if(A1::instance()->logged_in()) {
            $oUser = A1::instance()->get_user();
        }
        $this->assign('oUser', $oUser);

//        /**
//         * Auth check
//         */
//        $aAuthA1Config = Kohana::config('a1');
//        if(!A1::instance()->logged_in()
//                && '/'.$oRequest->controller.'/'.$oRequest->action !== $aAuthA1Config['login_page']
//                && $this->bRequiredAuth) {
//            $this->redirect($aAuthA1Config['login_page']);
//        }
        
    }

    /**
     * Executes after any controller's action
     */
    public function after(){
        parent::after();
    }

    public function redirect($url = '/', $code = 302){
        Request::instance()->redirect($url, $code);
    }

}