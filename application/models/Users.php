<?php
include_once 'base/Users.php';

class Users extends Base_Users {
    /**
     * Instance of Users
     * @var object
     */
    protected static $_instance;

    /**
     * Create or return in9stance of Users class
     * @return void
     */
    public static function instance() {
        if ( ! isset(Users::$_instance)) {
            Users::$_instance = new Pages();
        }
        return Users::$_instance;
    }


    /**
     * Find user by username
     *
     * @param string $sUsername
     * @return mixed False if not exist or Doctrine_Record object
     */


    public static function findByUsername($sUsername) {
        $q = Doctrine_Query::create()->from('Users u')->where('1=1');
        $q->select('u.*')
                ->where('u.username = ?', trim($sUsername))
                ->andWhere('u.active = ?', 1);
        return $q->execute()->getFirst();
    }

    /**
     *
     * @param <type> $sToken
     * @return <type>
     */
    public static function findByToken($sToken) {
        $q = Doctrine_Query::create()
                ->from('Users u')
                ->where('1=1')
                ->select('u.*')
                ->where('u.token = ?', trim($sToken));
        return $q->execute()->getFirst();
    }

   public static function findBy($sBy, $sValue) {
       $oUser = Doctrine_Core::getTable('Users');
       $aCols = $oUser->getColumns();
       if(array_key_exists(strtolower($sBy), $aCols)) {
           $method = 'findBy'.ucfirst($sBy);
           return $oUser->$method($sValue);
       } else {
           return null;
       }

   }

}      