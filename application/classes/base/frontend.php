<?php 
/**
 * Base controller
 */
class Base_Frontend extends Base_Application {
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
    }

    /**
     * Executes after any controller's action
     */
    public function after(){
        parent::after();
    }
}