<?php
/**
 * Description of application
 *
 * @author Dmitry Seredinov <dmitry.seredinov at gmail.com>
 */
class Application {
    public function __construct() {

    }

    function widget($sWidgetNameAndParams){        
        $sWidget = (!stristr($sWidgetNameAndParams, 'widget_'))?'widget_'.trim($sWidgetNameAndParams):trim($sWidgetNameAndParams);
        return Request::factory($sWidget)->execute();
    }

    function __get($sName) {
        return new $sName();
    }
}