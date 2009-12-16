<?php
include_once 'base/Pages.php';

class Pages extends Base_Pages {
    /**
     * Instance of Pages
     * @var object
     */
    protected static $_instance;

    /**
     * Keep Doctrine_Query instance linked to Table
     * to get handy access to SELECT procedures writing
     *
     * @var Doctrine_Query instance
     */
    protected $_q;

    /**
     * Create or return in9stance of Pages class
     * @return void
     */
    public static function instance() {
        if ( ! isset(Pages::$_instance)) {
            Pages::$_instance = new Pages();
        }
        return Pages::$_instance;
    }

    /**
     * Find and return row from DB if exist as Page object
     *
     * @param string $sAction
     * @param string $sController
     * @param string $sDirectory
     * @return mixed
     */
    public function findByPath($sAction = null, $sController = null, $sDirectory = null) {
        $q = Doctrine_Query::create()->from('Pages p')->where('1=1');
        if (!is_null($sAction)) {
            $q->andWhere('action=?', trim($sAction));
        }

        if (!is_null($sController)) {
            $q->andWhere('controller=?', trim($sAction));
        }
        if (!is_null($sDirectory)) {
            $q->andWhere('directory=?', trim($sAction));
        }

        return $q->execute()->getFirst();
    }

    /**
     * Load all rows from Pages table
     * 
     * @return mixed
     */
    public function loadAll() {
        return $this->getTable()->findAll();
    }

    
}