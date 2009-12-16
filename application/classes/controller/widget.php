<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Special class to serve widgets
 */
class Controller_Widget extends Controller_Smarty {

    protected $_config;

    public function load_config($conf_name,$conf_entry='default')
    {
        $this->_config = Kohana::config($conf_name.'.'.$conf_entry);
    }

} 