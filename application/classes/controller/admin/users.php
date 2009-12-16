<?php
class Controller_Admin_Users extends Base_Backend{
    /**
     * action_index
     */
    function action_index() {
        
    }

    function action_create(){
        $post = $_POST;
        if(!empty($post)) {
            $oUser = new Users();
            $oUser->username = 'dalss';
            $oUser->password = A1::instance()->hash_password('123aaz');
            $oUser->save();
        } else {
            $this->action_index();
        }
    }

    function action_login(){
        $a1 = A1::instance();
        // Login works!
//        $u = $a1->login('dalss', '123aaz');
        
        // Logout works!
//        $u = $a1->logout();

        $u = $a1->get_user();
        echo '<pre>';
        print_r($u);
        echo '</pre>';
        die();
    }
}