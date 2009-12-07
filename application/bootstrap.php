<?php defined('SYSPATH') or die('No direct script access.');

//-- Environment setup --------------------------------------------------------

/**
 * Set the default time zone.
 *
 * @see  http://docs.kohanaphp.com/about.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('Europe/Kiev');

/**
 * Set the default locale.
 *
 * @see  http://docs.kohanaphp.com/about.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');


function auto_load($class) {
        if(strstr($class, '_')) {
            // Transform the class name into a path
            $file = str_replace('_', '/', strtolower($class));
            $dir = 'classes';
        } else {
            $file = $class;
            $dir = 'models';
        }
        if ($path = Kohana::find_file($dir, $file))
        {
                // Load the class file
                require $path;

                // Class has been found
                return TRUE;
        }

        // Class is not in the filesystem
        return FALSE;
}

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://docs.kohanaphp.com/about.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));
spl_autoload_register('auto_load');






/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

//-- Configuration and initialization -----------------------------------------

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 */
Kohana::init(array('base_url' => '/', 'index_file'=>''));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Kohana_Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Kohana_Config_File);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
	// 'auth'       => MODPATH.'auth',       // Basic authentication
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	// 'database'   => MODPATH.'database',   // Database access
	// 'image'      => MODPATH.'image',      // Image manipulation
	// 'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	// 'pagination' => MODPATH.'pagination', // Paging of results
	// 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
        'doctrine'=>MODPATH.'doctrine',
        'smarty'  => MODPATH.'smarty',
	));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
Route::set('admin', 'admin(/<controller>(/<action>(/<id>)))')
        ->defaults(array(
                'directory' => 'admin',
                'controller' => 'index',
                'action' => 'index',
        ));

Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' => 'index',
		'action'     => 'index',
	));


class MyException {
    public static $status;
    public static function exception_handler(Exception $e) {
        // Start an output buffer
        ob_start();

        if ($e instanceof ReflectionException) {
            // Reflection will throw exceptions for missing classes or actions
            $error = MyException::$status = 404;
            header("HTTP/1.0 $error Not Found" , TRUE, $error);

        }
        else {
            // All other exceptions are PHP/server errors
            $error = MyException::$status = 500;
            header("HTTP/1.0 $error" , TRUE, $error);
        }

        Kohana::$log->add(Kohana::ERROR, Kohana::exception_text($e));
        $message = "";
        if(!IN_PRODUCTION) {
            $message = $e->getMessage();//Kohana::exception_text($e);
        }

        include Kohana::find_file('templates', 'errors/'.$error, 'php');
        echo ob_get_clean();
        exit;
    }
}

set_exception_handler(array('MyException', 'exception_handler'));
/**
 * Execute the main request. A source of the URI can be passed, eg: $_SERVER['PATH_INFO'].
 * If no source is specified, the URI will be automatically detected.
 */
echo Request::instance()
	->execute()
	->send_headers()
	->response;
