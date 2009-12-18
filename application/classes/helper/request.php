<?php
class Helper_Request{
    	public static function instance($_name = 'Request')
	{
		static $_instances;

		if ( ! isset($_instances[$_name]))
		{
			$_instances[$_name] = new Helper_Request($_name);
		}

		return $_instances[$_name];
	}

	/**
	 * Loads Session and configuration options.
	 *
	 * @return  void
	 */
	public function __construct($_name = 'Request'){
            return $this;
        }

        /**
         * Return value from POST or GET superglobals
         * 
         * @param string $sKey
         * @param mixed $mDefault
         * @param string $sContainer
         * @return mixed
         */
        public static function get($sKey = null, $mDefault = null, $sContainer = 'post'){
            $aSource = array();
            switch ($sContainer) {
                case 'get':
                    $aSource = $_GET;
                    break;
                case 'post':
                    $aSource = $_POST;
                default:
                    break;
            }

                        
            if(empty($aSource)) {
                return false;
            }

            if(is_null($sKey)) {
                return $aSource;
            }
            if(!is_null($sKey) && isset($aSource[$sKey])) {
                if(!is_array($aSource[$sKey])) {
                    return Security::xss_clean($aSource[$sKey]);
                } else {
                    $aInternal = array();
                    foreach ($aSource[$sKey] as $key => $mValue) {
                        $aInternal[$key] = Security::xss_clean($mValue);
                    }
                    return $aInternal;
                }
            }
        }
}