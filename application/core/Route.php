<?php

/**
 * Class Route
 * Manages application routing
 * @author Vicotr
 */
class Route
{

    static function start()
    {

        /**
         * default controller and action
         * array of request parameters
         */
        $controller_name = 'Home';
        $action_name = 'view';
        $params = array();


        /**
         *If not the root of the site parse url
         **
         */
        if ($_SERVER['REQUEST_URI'] != '/') {

            $url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

            /**
             * divide into parts
             */
            $uri_parts = explode('/', trim($url_path, ' /'));


            /**
             * first part - controller
             * second part (if exists) - action
             */
            $controller_name = ucfirst(array_shift($uri_parts));
            if (!empty($uri_parts)) {
                $action_name = array_shift($uri_parts);
            }
            /**
             * If the number of parts is not even, request is not correct - 404
             */
            if (count($uri_parts) % 2) {
                self::ErrorPage404();
            }
            /**
             * create array of parts from URL - parameters
             * write it into global array $_REQUEST
             */
            for ($i = 0; $i < count($uri_parts); $i++) {
                $params[$uri_parts[$i]] = $uri_parts[++$i];
            }
            $_REQUEST = array_merge($_REQUEST, $params);
        }

        /**
         * Naming controllers, models, actions
         * Definition of the files of their classes
         * include controller, model(if exists)
         * if controller or action is not exists - 404
         */
        $model_name = 'Model_' . $controller_name;
        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'action_' . $action_name;
        $model_file = $model_name . '.php';
        $model_path = "../application/models/" . $model_file;
        if (file_exists($model_path)) {
            include_once "../application/models/" . $model_file;
        }
        $controller_file = $controller_name . '.php';
        $controller_path = "../application/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            include_once "../application/controllers/" . $controller_file;
        } else {
            self::ErrorPage404();
        }
        $controller = new $controller_name;
        $action = $action_name;
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            self::ErrorPage404();
        }

    }

    /**
     * redirect to 404 error page
     */
    static function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location:' . $host . '404');
    }


}