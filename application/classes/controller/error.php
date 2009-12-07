<?php
class Controller_Error extends Base_Frontend {

    function action_404(){
        $this->request->response = $this->view->fetch('errors/404.tpl');
    }

    function action_500(){
        $this->request->response = $this->view->fetch('errors/500.tpl');
    }
}