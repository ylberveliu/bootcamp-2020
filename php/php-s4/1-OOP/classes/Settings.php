<?php 

class Settings {
    private $data;

    public function __set($property, $value) {
        $this->data[$property] = $value;
    }

    public function __get($property) {
        if(!isset($this->data[$property]))
            return false;

        return $this->data[$property];
    }
}

// echo "<pre>";
// Reflection::export(new ReflectionClass('Settings'));

