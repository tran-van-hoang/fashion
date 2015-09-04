<?php

/**
 * This is a assembly machine, it reponsible for assembling your form<br>
 * <b>Assembly process:</b><br>
 * @author Tran Van Hoang <phatradang@gmail.com>
 */
class Application_Form_FormFactory extends Zend_Form {

    /**
     * @var string
     */
    private $__formPattern;

    /**
     * @var array This is the list of supported elements type.
     * You can search it in this file with the key word looking like "__name" 
     */
    private $__supportedType = [
        'formAtt', //attribute -- action, method,...
        'id', //input type = hidden
        'name', //input type= text
        'phone', //input type = text
        'number', //input type = text
        'email', //inpyt type = text
        'password', //input type = password
        'comfirmPassword', //input type = password
        'information', //textarea
        'note', //textarea -- this type similar to information type but it can be empty
        'submit', //input type = submit
    ];

    /**
     * @param string $pattern The name of form
     */
    public function __construct($formPattern) {
        $this->__setFormPattern($formPattern);
        $this->init($this->__assemblyMachine());
        $this->loadDefaultDecorators();
//        $this->setOptions($options);
    }

    /**
     * set form pattern
     * @param string $pattern
     */
    private function __setFormPattern($formPattern) {
        $this->__formPattern = $formPattern;
    }

    /**
     * call zend form
     * @param Zend_Form $callAssemblyMachine
     */
    public function init($callAssemblyMachine = null) {
        $callAssemblyMachine;
    }

    /**
     * assembly form
     */
    private function __assemblyMachine() {
        //get pattern from system
        $pattern = $this->__getFormPattern();

        //assembling form base on pattern,
        foreach ($pattern as $key => $value) {
            //make sure that this type is supported
            if (!in_array($key, $this->__supportedType)) {
                die($key . " không được hỗ trợ");
            }

            $method = "__" . $key;
            $this->$method($value);
        }
    }

    /**
     * @return array
     */
    private function __getFormPattern() {
        $patternObject = new $this->__formPattern();

        //check if pattern is instance of Application_Form_FormInterface
        if (!$patternObject instanceof Application_Form_FormInterface) {
            $message = "This pattern must be an instance of
            Application_Form_FormInterface";
            die($message);
        }

        //check if pattern is in valid type
        $pattern = $patternObject->getFormPattern();
        if (!is_array($pattern)) {
            die('Form pattern must be an array');
        }

        //return valid type pattern
        return $pattern;
    }

//////////////////////////-- Above is main program --///////////////////////////

    /**
     * @param array $param
     */
    private function __formAtt($param) {
        $action = $param['action'];
        $method = $param['method'];
        $id = isset($param['id'])?$param['id']:null;
        $enctype = isset($param['enctype'])?$param['enctype']:null;
        
        $this->setAttribs([
                    'action'=>$action,
                    'method'=>$method,
                    'id'=> $id,
                    'enctype'=>$enctype
                ]);
    }

    /**
     * @param array $param
     */
    private function __id($param) {
        $this->addElement(new Zend_Form_Element_Hidden($param['alias']));
    }

    /**
     * @param array $param
     */
    private function __name($param) {
        $alias = $param['alias'];
        $attributes = $this->__getAttributes($param['attributes']);
        $realName = $param['realName'];
        
        $this->addElement(new Zend_Form_Element_Text($alias, [
            $attributes,
            'validators' => [
                [
                    'NotEmpty', true, [
                        "messages" => [
                            'isEmpty' => "Bạn cần nhập $realName"
                        ]
                    ]
                ],
                [
                    'Alpha', true, [
                        'allowWhiteSpace' => true,
                        'messages' => [
                            'notAlpha' => "Bạn cần nhập chính xác $realName"
                        ]
                    ]
                ],
                [
                    'StringLength', true, [
                        'min' => 8,
                        'max' => 80,
                        'messages' => [
                            'stringLengthTooShort' => ucfirst($realName)
                            . " phải chứa ít nhất 8 kí tự",
                            'stringLengthTooLong' =>
                            "Bạn vui lòng để $realName dưới 80 kí tự"
                        ]
                    ]
                ]
            ]
        ]));
    }

    /**
     * @param array $param
     */
    private function __email($param) {
        $alias = $param['alias'];
        $realName = $param['name'];

        $this->addElement(new Zend_Form_Element_Text($alias, [
            'label' => ucfirst($realName) . ":",
            'required' => true,
            'validators' => [
                [
                    'NotEmpty', true, [
                        "messages" => [
                            'isEmpty' => "Bạn cần nhập $realName"
                        ]
                    ]
                ],
                [
                    'StringLength', true, [
                        'min' => 20,
                        'max' => 120,
                        'messages' => [
                            'stringLengthTooShort' => ucfirst($realName)
                            . " phải chứa ít nhất 20 kí tự",
                            'stringLengthTooLong' => ucfirst($realName)
                            . " phải dưới 120 kí tự"
                        ]
                    ]
                ],
                [
                    'EmailAddress', true, [
                        "messages" => [
                            'emailAddressInvalidFormat' => "$realName nhập sai"
                        ]
                    ]
                ]
            ]
        ]));
    }

    /**
     * generate password input
     * @param array $param
     */
    private function __password($param) {
        $alias = $param['alias'];
        $realName = $param['name'];

        $this->addElement(new Zend_Form_Element_Password($alias, [
            'label' => ucfirst($realName) . ":",
            'required' => true,
            'validators' => [
                [
                    'NotEmpty', true, [
                        "messages" => [
                            'isEmpty' => "Bạn cần nhập $realName"
                        ]
                    ]
                ],
                [
                    'StringLength', true, [
                        'min' => 8,
                        'max' => 50,
                        'messages' => [
                            'stringLengthTooShort' => ucfirst($realName)
                            . " chứa ít hơn 8 kí tự",
                            'stringLengthTooLong' => ucfirst($realName)
                            . " chứa hơn 50 số"
                        ]
                    ]
                ]
            ]
        ]));
    }

    /**
     * @param array $param
     */
    private function __comfirmPassword($param) {
        $alias = $param['alias'];
        $realName = $param['name'];

        $this->addElement(new Zend_Form_Element_Password($alias, [
            'label' => ucfirst($realName) . ":",
            'required' => true,
            'validators' => [
                [
                    'NotEmpty', true, [
                        "messages" => [
                            'isEmpty' => "Bạn cần nhập $realName"
                        ]
                    ]
                ],
                [
                    'StringLength', true, [
                        'min' => 8,
                        'max' => 50,
                        'messages' => [
                            'stringLengthTooShort' => ucfirst($realName)
                            . " chứa ít hơn 8 kí tự",
                            'stringLengthTooLong' => ucfirst($realName)
                            . " chứa nhiều hơn 50 số"
                        ]
                    ]
                ]
            ]
        ]));
    }

    /**
     * @param array $param
     */
    private function __phone($param) {
        $alias = $param['alias'];
        $realName = $param['name'];

        $this->addElement(new Zend_Form_Element_Text($alias, [
            'label' => ucfirst($realName) . ":",
            'required' => true,
            'validators' => [
                [
                    'NotEmpty', true, [
                        "messages" => [
                            'isEmpty' => "Bạn cần nhập $realName"
                        ]
                    ]
                ],
                [
                    'Digits', true, [
                        'messages' => [
                            'notDigits' => ucfirst($realName)
                            . " chứa ký tự không phải là số"
                        ]
                    ]
                ],
                [
                    'StringLength', true, [
                        'min' => 10,
                        'max' => 11,
                        'messages' => [
                            'stringLengthTooShort' => ucfirst($realName)
                            . " chứa ít hơn 10 số",
                            'stringLengthTooLong' => ucfirst($realName)
                            . " chứa nhiều hơn 11 số"
                        ]
                    ]
                ]
            ]
        ]));
    }

    /**
     * This type is used for address,...
     * @param array $param
     */
    private final function __information($param) {
        $alias = $param['alias'];
        $realName = $param['name'];

        $this->addElement(new Zend_Form_Element_Textarea($alias, [
            'label' => ucfirst($realName) . ":",
            'required' => true,
            'validators' => [
                [
                    'NotEmpty', true, [
                        "messages" => [
                            'isEmpty' => "Bạn cần nhập $realName"
                        ]
                    ]
                ],
                [
                    'StringLength', true, [
                        'max' => 500,
                        'messages' => [
                            'stringLengthTooLong' => ucfirst($realName)
                            . " phải dưới 500 kí tự"
                        ]
                    ]
                ]
            ]
        ]));
    }

    /**
     * 
     * @param array $param
     */
    private function __note($param) {
        $alias = $param['alias'];
        $realName = $param['name'];
        
        $this->addElement(new Zend_Form_Element_Textarea($alias, [
            'label' => ucfirst($realName) . ":",
            'required' => true,
            'validators' => [
                [
                    'StringLength', true, [
                        'max' => 500,
                        'messages' => [
                            'stringLengthTooLong' => ucfirst($realName)
                            . " phải dưới 500 kí tự"
                        ]
                    ]
                ]
            ]
        ]));
    }

    /**
     * @param array $param
     */
    private function __number($param) {
        $alias = $param['alias'];
        $realName = $param['name'];

        $this->addElement(new Zend_Form_Element_Text($alias, [
            'label' => ucfirst($realName) . ":",
            'required' => true,
            'validators' => [
                [
                    'Digits', true, [
                        'messages' => [
                            'notDigits' => ucfirst($realName)
                            . " chứa ký tự không phải là số"
                        ]
                    ]
                ]
            ]
        ]));
    }

    /**
     * @param array $param
     */
    private function __submit($param) {
        $this->addElement(new Zend_Form_Element_Submit($param['name']));
    }
    
    private function __getAttributes($arrayAttributes){
        
        var_dump($attributes);die;
        return $attributes;
    }

}
