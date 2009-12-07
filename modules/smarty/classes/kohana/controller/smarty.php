<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Abstract controller class for automatic templating with smarty.
 *
 * @package    Controller
 * @author     Kohana Team
 * @copyright  (c) 2008-2009 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
abstract class Kohana_Controller_Smarty extends Controller {

	/**
	 * @var  string  page template
	 */
	public $template = null;

	/**
	 * @var  object Smarty object
	 */
	public $view = null;

	/**
	 * @var  str Header and footer content
	 */
	 protected $pre_loaded_content = '';

	/**
	 * @var  boolean  auto render template
	 **/
	public $auto_render = TRUE;

	/**
	 * Loads the smarty object.
	 *
	 * @return  void
	 */
	public function before()
	{
		switch(Kohana::config('smarty')->get('version'))
		{
			default:
			case '3':
				$this->view = new Smarty3();
			break;
			case '2.6':
			case '2':
				$this->view = new Smarty2();
			break;
		}

		//setup smarty
		$kohana_config = Kohana::config('smarty');

		$this->view->template_dir = array($kohana_config->get('template_dir'));
		$this->view->compile_dir = $kohana_config->get('compile_dir');
		$this->view->plugins_dir = array_merge($this->view->plugins_dir, $kohana_config->get('plugin_dir'));
		$this->view->cache_dir = $kohana_config->get('cache_dir');
		$this->view->config_dir = $kohana_config->get('config_dir');
		$this->view->caching = $kohana_config->get('cache');
		$this->view->force_compile = $kohana_config->get('force_compile');
		$this->view->debugging = $kohana_config->get('debug');
		$this->view->error_reporting = $kohana_config->get('error_reporting');
		$this->view->php_handling =  $kohana_config->get('php_handling');
		$this->view->security = $kohana_config->get('security');

		//handle the request response
		$this->request->response = '';
		$templates = $kohana_config->get('include_before');
		$templates_amount = count($templates);

		if($templates_amount > 0)
		{
			//add the file to the response
			for($i=0;$i<$templates_amount;$i++)
				$this->pre_loaded_content .= $this->view->fetch($templates[$i]);
		}
	}

	/**
	 * Assigns the template as the request response if auto_render is true.
	 *
	 * @return  void
	 */
	public function after()
	{
		if ($this->auto_render === TRUE)
		{
			// Assign the template as the request response and render it
			if($this->template != null)
				$this->request->response .= $this->view->fetch($this->template);
		}

		//add the preloaded content to the response
		$this->request->response = $this->pre_loaded_content . $this->request->response;

		//Add the footer files if necesairy
		$templates = Kohana::config('smarty')->get('include_after');
		$templates_amount = count($templates);

		if($templates_amount > 0)
		{
			//add the file to the response
			for($i=0;$i<$templates_amount;$i++)
				$this->request->response .= $this->view->fetch($templates[$i]);
		}
	}

        /**
         * Short way to do assignt to Smarty view
         * 
         * @param string $sKey
         * @param mixed $mData
         * @return void
         */
        public function assign($sKey, $mData){
            return $this->view->assign($sKey, $mData);
        }

} // End Kohana_Controller_Smarty