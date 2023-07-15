<?php

class Load {
    public function view($viewName, $data = []) {
        extract($data);
        include 'views/' . $viewName . '.php';
    }
}
