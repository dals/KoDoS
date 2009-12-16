<?php defined('SYSPATH') or die('No direct script access.'); 

class Controller_Widget_Cdate extends Controller_Widget {

    public $template = 'widgets/cdate.tpl';

    public $config_name = 'widget/cdate';

    public function action_show ($entry = 'default') {
        $this->load_config($this->config_name,$entry);

        if ( ! in_array(Request::instance()->controller, $this->_config['allowed_pages'])) {
            $this->auto_render = FALSE;
            return NULL;
        }

        $fields = explode('-',strval($this->_config['format']));

        $d = getdate();
        $date = "";
        foreach ($fields as $field) {
            switch ($field) {
                case "min":
                    $date .= 'Minutes: '.$d['minutes'].'<br />';
                    break;

                case "hour":
                    $date .= 'Hours: '.$d['hours'].'<br />';
                    break;

                case "day":
                    $date .= 'Day: '.$d['month'].' '.$d['mday'].'<br />';
                    break;

                case "year":
                    $date .= 'Year: '.$d['year'].'<br />';
                    break;
            }
        }

//        $this->template->page = Request::instance()->action;
//        $this->template->date = $date;
        $this->view->assign('date', $date);
        //$this->request->response = $this->view->fetch($this->template);
    }
} 
