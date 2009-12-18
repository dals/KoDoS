<?php
class Helper_Response {
    /**
     * Perform return of __CLASS__ instance
     * @staticvar object $_instances
     * @param string $_name
     * @return object
     */
    public static function instance($_name = 'Response') {
        static $_instances;

        if ( ! isset($_instances[$_name])) {
            $_instances[$_name] = new Helper_Response($_name);
        }

        return $_instances[$_name];
    }

    /**
     * Loads Session and configuration options.
     *
     * @return  void
     */
    public function __construct($_name = 'Response') {
        return $this;
    }

    /**
     * Set content-type of response
     *
     * @param string $sContentType
     * @return void
     */
    public function setContentType($sContentType) {
        header('Content-type: '.$sContentType.'; charset=utf-8');
        return $this;
    }

    /**
     * Perform HTTP response
     *
     * @param string $sResponse
     * @return void
     */
    public function response($sResponse) {
        echo $sResponse;
        return $this;
    }

    /**
     * Perform shortcut to redirect method
     *
     * @param string $sRedirectPlace
     * @return void
     */
    public static function redirect($sRedirectPlace) {
        $config = Kohana::config('application');

        switch ($sRedirectPlace == '/') {
            case true:
                $sRedirectPlace = implode('/', $config['routes']['default']);
                break;

            case false:
                break;
        }
        return  Request::instance()->redirect($sRedirectPlace);
    }
}