<?php

/**
 * @author Tran Van Hoang <butdatac@gmail.com>
 * design template for model which used to call get or set method.
 */
abstract class Application_Model_Template_ModelTemplate {

    /**
     * set many value for many variable
     * @param array $options key is method's name, value is method's value.
     */
    protected final function setOptions($options) {
        foreach ($options as $key => $value) {
            $this->__set($name, $value);
        }
    }

//    protected function getOption($option){
//        foreach ($options as $name) {
//            
//        }
//    }

    /**
     * set value for variable
     * @param string $name
     * @param mixed $value
     */
    private function __set($name, $value) {
        $method = $this->checkMethod($name, 'set');
        $this->$method($value);
    }

    /**
     * get value from variable
     * @param string $name
     * @return mixed
     */
    private function __get($name) {
        $method = $this->checkMethod($name, 'get');
        return $this->$method();
    }

    /**
     * check method is valid and exist
     * @param string $name
     * @param string $typeMethod Type method can be 'set' or 'get'
     * @return string
     * @throws Exception
     */
    private function checkMethod($name, $typeMethod) {
        $method = $typeMethod . ucfirst($name);
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid property');
        }

        return $method;
    }

}