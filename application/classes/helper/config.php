<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Helper_Config{
    protected $_cfg;
    	public static function instance($_name = 'Config')
	{
		static $_instances;

		if ( ! isset($_instances[$_name]))
		{
			$_instances[$_name] = new Helper_Config($_name);
		}

		return $_instances[$_name];
	}

        public function from ($sCfgName, $sGroupName = null) {
            if (!Kohana::config($sCfgName)) {
                
            }
        }
}
