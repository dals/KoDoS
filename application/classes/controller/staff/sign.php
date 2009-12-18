<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Staff_Sign extends Base_Frontend {

    public $bRequiredAuth = true;

    public function action_index() {
        if(!A1::instance()->logged_in()) {
           $this->redirect('/sign/in');
        } else {
           $this->redirect('/index');
        }
    }

    public function action_in() {
        $aPost = $_POST;
        if(!empty ($aPost)) {
            $a1 = A1::instance();
            /**
             * @todo make XSS-check
             */
            if(!ctype_alnum($aPost['username'])||!ctype_alnum($aPost['password'])) {
                return false;
            }
            
            if($a1->login($aPost['username'], $aPost['password'])) {
                $this->redirect('/index');
            }
        }
    }

    public function action_out(){
        if(A1::instance()->logged_in()) {
            A1::instance()->logout();
        }
       $this->redirect('/sign');

    }
} // End Index