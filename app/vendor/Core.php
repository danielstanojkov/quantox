<?php

namespace App\Vendor;

class Core
{
    protected $currentController = 'Home';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        // Controller
        if (isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
       
        require_once '../app/controllers/' . $this->currentController . '.php';
        $newController = "App\Controllers\\" . $this->currentController;
        // Set Controller
        $this->currentController = new $newController;
     
        // Method
        if (isset($url[1]) && method_exists($this->currentController, $url[1])) {
            $this->currentMethod = $url[1];
            unset($url[1]);
        }

        // Parameters
        $this->params = $url ? array_values($url) : [];

        // Calling the controller's method with the parameters
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); //Removes Extra fowardslash in URL.
            $url = filter_var($url, FILTER_SANITIZE_URL); //Removes URL unallowed characters.
            $url = explode('/', $url);  // Url format ['controller', 'method', 'param'];
            return $url;
        }
    }
}
