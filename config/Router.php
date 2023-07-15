<?php

class Router {
    private $routes = [];

    public function addRoute($method, $path, $callback) {
        $this->routes[$method][$path] = $callback;
    }

    public function run() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), strlen(BASE_URI));

        $callback = $this->routes[$method][$path] ?? null;

        if ($callback && is_callable($callback)) {
            call_user_func($callback);
        } else {
            echo "404 - Page not found";
        }
    }
}
