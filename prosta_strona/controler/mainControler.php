<?php
class mainControler
{
    public function __construct($request, $path = 'controler/')
    {
        global $route;
        $name = $request;
        if (($name == '') || ($name == '/')) {
            $name = 'home';
            $request = 'home';
        } else if (!in_array($name, $route)) {
            $name = 'notFound';
            $request = 'notFound';
        }
        $name = ltrim($name, '/');
        $request = ltrim($request, '/');
        $name = $name . 'Controler';
        $path = $path . $name . '.php';

        try {
            if (is_file($path)) {
                require $path;
                $obj = new $name($request);
            } else {
                throw new Exception('Can not open controler ' . $name . ' in: ' . $path);
            }
        } catch (Exception $e) {
            echo $e->getMessage() . '<br />
                File: ' . $e->getFile() . '<br />
                Code line: ' . $e->getLine() . '<br />
                Trace: ' . $e->getTraceAsString();
            exit;
        }
        return $obj;
    }
}
