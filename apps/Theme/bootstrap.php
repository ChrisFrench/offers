<?php 
$f3 = \Base::instance();
$global_app_name = $f3->get('APP_NAME');

switch ($global_app_name) 
{
    case "site":
        $f3->set('UI_OVERRIDES', $f3->get('PATH_ROOT') . "apps/Theme/Views" );

          // append this app's UI folder to the path
        $ui = $f3->get('UI');
        $ui .= ";" . $f3->get('PATH_ROOT') . "apps/Theme/Views/";
        $f3->set('UI', $ui);
        
        // append this app's template folder to the path
        $templates = $f3->get('TEMPLATES');
        $templates .= ";" . $f3->get('PATH_ROOT') . "apps/Theme/Templates/";
        $f3->set('TEMPLATES', $templates);
        
         // register the less css file
       // \Minify\Factory::registerLessCssSource( $f3->get('PATH_ROOT') . "apps/Theme/Less/global.less.css" );
    

        // add the media assets to be minified        
        $files = array(
            'theme/js/jquery-1.8.3.min.js',
            'theme/js/jquery.mobile-1.2.0.min.js',
            'theme/js/jquery.mobile.alphascroll.js',
            'theme/js/simple-app.js'

        );
        
        foreach ($files as $file) 
        {
            \Minify\Factory::js($file);
        }
        
        $files = array(
            'theme/css/jquery.mobile-1.2.0.min.css',
            'theme/css/jquery.mobile.alphascroll.css',
            'theme/css/isis.css',
            'theme/css/idangerous.swiper.css',
            'theme/css/idangerous.swiper.scrollbar.css',
            'theme/css/simple-app.css',
            'theme/css/list.css'
        );

        foreach ($files as $file)
        {
            \Minify\Factory::css($file);
        }
        
        \Minify\Factory::registerPath($f3->get('PATH_ROOT') . "public/theme/");
        \Minify\Factory::registerPath($f3->get('PATH_ROOT') . "public/theme/images/");       
       
        
        
        break;

        $f3->set('ONERROR',
            function($f3) {
               
               if($f3->get('ERROR.code') == '404')  {
                $redirect = (new \Redirect\Factory($PARAMS[0]))->redirect();

               }
               
            }
        );


}
?>
