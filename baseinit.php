<?php
define('ROOT_DIR',dirname(__FILE__));
define('ROOT_PATH',dirname(__FILE__));
define('LIB_PATH' , ROOT_PATH . '/library') ;
define('APPLICATION_PATH', ROOT_PATH . '/app');
define('MODULE_PATH' , ROOT_PATH . '/app/modules') ;

// define the path for configuration file
define('CONFIG_PATH' , ROOT_PATH . '/app/configs') ;
 
// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV',
              (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
                                         : 'staging'));

// Include path
set_include_path(LIB_PATH . PATH_SEPARATOR . get_include_path());

require_once('Pandamp/Core/Util.php');
$pUtil = new Pandamp_Core_Util();
define('ROOT_URL', $pUtil->getRootUrl(ROOT_DIR));

/** Zend_Application */
define('ZEND_APPLICATION_REGISTER', 'application');
//define('APPLICATION_CONFIG_FILENAME', 'zhol.ini');
define('APPLICATION_CONFIG_FILENAME', 'whol.ini');

// Zend_Application
require_once 'Pandamp/ZP.php';

$application = new Pandamp_ZP(
    APPLICATION_ENV,
        array(
            'configFile' => CONFIG_PATH . '/'.APPLICATION_CONFIG_FILENAME
        )
);

$registry = Zend_Registry::getInstance();
$registry->set(Pandamp_Keys::REGISTRY_APP_OBJECT, $application);

//$regconfig = new Zend_Config_Ini(CONFIG_PATH.'/zhol.ini', 'general'); 
$regconfig = new Zend_Config_Ini(CONFIG_PATH.'/whol.ini', 'general'); 
$registry->set('config', $regconfig); 

