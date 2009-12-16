<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Base_Frontend {

    public function action_index() {
        $o = Helper_Request::instance();
    }

} // End Index

//2. Loose
//Данный способ позволяет использовать разные шаблоны для каждого действия вашего контроллера.
//
//Пример:
//
//<?php defined('SYSPATH') or die('No direct script access.');
//
//class Controller_Welcome extends Controller_Smarty
//{
//
//        public $auto_render = FALSE;
//
//        public function action_index()
//        {
//                $this->view->assign('intro', 'Hello world!');
//                $this->request->response = $this->view->fetch('welcome.tpl');
//        }
//}
//