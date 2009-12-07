<?php
class Controller_Admin_Pages extends Base_Backend{
    public function action_index() {
       
        $oPages = Doctrine_Core::getTable('Pages');
        $this->assign('aPages', $oPages->findAll());
    }
}