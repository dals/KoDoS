<?php
class Controller_Error extends Base_Frontend {

    public $auto_render = FALSE;
    function action_index(){
        
    }
    function action_403(){
        $this->request->headers['HTTP/1.1'] = '403';
        $this->request->response = $this->view->fetch('errors/403.tpl');
    }

    function action_404(){
        //$this->request->headers['HTTP/1.1'] = '404';
        $this->request->response = $this->view->fetch('errors/404.tpl');
    }

    function action_500(){
        $this->request->headers['HTTP/1.1'] = '500';
        $this->request->response = $this->view->fetch('errors/500.tpl');
    }
}