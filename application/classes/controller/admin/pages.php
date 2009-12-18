<?php
class Controller_Admin_Pages extends Base_Backend{
    public function action_index() {
       
        $oPages = Doctrine_Core::getTable('Pages');
        $this->assign('aPages', $oPages->findAll());
    }

    public function action_create(){
        
        if(!empty($_POST)) {
            $oPage = new Pages();
            $oPage->fromArray($_POST);
            $oPage->save();
            $this->redirect('/admin/pages');
        }
    }
}