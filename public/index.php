<?php

$app = require('../vendor/bcosca/fatfree/lib/base.php');

$app->set('PATH_ROOT', __dir__ . '/../');
$app->set('AUTOLOAD',
        $app->get('PATH_ROOT') . 'lib/;' .
        $app->get('PATH_ROOT') . 'apps/;'
);
// common config
$app->config( $app->get('PATH_ROOT') . 'config/common.config.ini');

require $app->get('PATH_ROOT') . 'vendor/autoload.php';

$app->set('APP_NAME', 'site');
if (strpos(strtolower($app->get('URI')), $app->get('BASE') . '/admin') !== false) {
    $app->set('APP_NAME', 'admin');
}

$logger = new \Log( $app->get('application.logfile') );
\Registry::set('logger', $logger);

if ($app->get('DEBUG')) {
    ini_set('display_errors',1);
}


\Dsc\Apps::instance()->bootstrap(null);

\Dsc\System::instance()->preflight();


$app->run();

?>
