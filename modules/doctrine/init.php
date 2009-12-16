<?php defined('SYSPATH') or die('No direct script access.');
/* Doctrine integration */
require Kohana::find_file('vendors', 'doctrine/Doctrine');

/* Set autoloader for Doctrine */
spl_autoload_register(array('Doctrine', 'autoload'));

/* Read config data for connection */
$db = Kohana::config('database');//->doctrine;

try {
    //check if
    if(sizeof($db) == 0) {
        throw new Kohana_Exception('DB doctrine config not found!');
    }
}
catch (Kohana_Exception $e) {
    //display custom message
    echo $e->getMessage();
    exit (0);
}

try {
    if(!isset($db->doctrine)) {
        throw new Kohana_Exception('DB "doctrine" section not found!');
    }
    $db = $db->doctrine;
} catch (Kohana_Exception $exc) {
    echo $exc->getMessage();
    die;
}


$aConnection = $db['connection'];
/* Call Manager instance */
$manager = Doctrine_Manager::getInstance();

/**
 * Create connections
 */
$manager->connection('mysql://'.$aConnection['username'].':'.$aConnection['password'].'@'.$aConnection['hostname'].'/'.$aConnection['database'], 'default');
// @dals to use socket:
// dsn: 'mysql:host=localhost;dbname=jobeet;unix_socket=/var/mysql/mysql.sock'

/**
 * @see www.doctrine-project.org/documentation/manual/1_1/en/configuration
 */
$manager->setAttribute(Doctrine::ATTR_MODEL_LOADING, Doctrine::MODEL_LOADING_CONSERVATIVE);
$manager->setAttribute(Doctrine::ATTR_VALIDATE, Doctrine::VALIDATE_ALL);
//$manager->setAttribute(Doctrine::ATTR_DEFAULT_IDENTIFIER_OPTIONS, array('name' => '%s_id', 'type' => 'int', 'length' => 11));
$manager->setAttribute(Doctrine::ATTR_DEFAULT_IDENTIFIER_OPTIONS, array('name' => 'id', 'type' => 'int', 'length' => 11));
$manager->setAttribute(Doctrine::ATTR_PORTABILITY, Doctrine::PORTABILITY_ALL);
$manager->setAttribute(Doctrine::ATTR_QUOTE_IDENTIFIER, true);
$manager->setAttribute(Doctrine::ATTR_EXPORT, Doctrine::EXPORT_ALL);
if(!is_null($db['table_prefix']) && strlen($db['table_prefix'])) {
    $manager->setAttribute(Doctrine::ATTR_TBLNAME_FORMAT, $db['prefix'].'_%s');
}
$manager->setAttribute(Doctrine::ATTR_AUTOLOAD_TABLE_CLASSES, true);

/**
 * Tell Doctrine that our models are placed in APPPATH.'models'
 */
Doctrine::loadModels(APPPATH.'models');

