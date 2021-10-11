<?php 
class App{
    protected $controller = 'auth'; //DEFAULT Controller
    protected $method = 'index'; //Method
    protected $params = [];

    public function __construct(){
        $url = $this->parseURL();
        // var_dump($url);
        if (file_exists('./app/controllers/'. $url[0] . '.php')) {
            
            $this->controller = $url[0];
            unset($url[0]);
            // var_dump($url);
        }
        require_once './app/controllers/'. $this->controller. '.php';

        $this->controller = new $this->controller;

        //method
        if (isset($url[1])) {
            if ( method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //Parameters
        if (!empty ($url)) {
           $this->params = array_values($url);
            // var_dump($url);
        }

        //jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL(){
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
    
}
?>