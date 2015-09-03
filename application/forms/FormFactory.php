<?php

/**
 * This is a assembly machine, it reponsible for assembling your form<br>
 * <b>Assembly process:</b><br>
 * 
 * 
 * 
 * 
 * @author Tran Van Hoang <phatradang@gmail.com>
 */
class Application_Form_FormFactory extends Zend_Form {

    /**
     * @var string
     */
    private $__formPattern;

    /**
     * You can search with the key word like "__name"
     * @var array This is the list of supported elements type 
     */
    private $__supportedType = [
        'action',
        'submit',//input type = submit
        'name', //input type= text
        'dateOfBirth', //input type= date
        'gender', //input type= radio
        'phoneNumber', //input type = text
        'number',//input type = text
        'email', //inpyt type = text
        'facebook', //inpyt type = text
        'password', //inpyt type = password
        'information', //textarea
        'note' //like information type but it can be empty
    ];

    /**
     * @param string $pattern The name of form
     */
    public function __construct($formPattern) {
        $this->__setFormPattern($formPattern);
        $this->init($this->__assemblyMachine());
        $this->loadDefaultDecorators();
    }

    /**
     * set form pattern
     * @param string $pattern
     */
    private function __setFormPattern($formPattern) {
        $this->__formPattern = $formPattern;
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
               die($key." không được hỗ trợ");
            }

            $method = "__" . $key;
            $this->$method($value);
        }
    }

    /**
     * @return array
     */
    private function __getFormPattern() {
        $pattern = new $this->__formPattern();

        if (!$pattern instanceof Application_Form_FormInterface) {
            die('This pattern must be an instance of Application_Form_FormInterface');
        }

        return $pattern->getFormPattern();
    }

    /**
     * call zend form
     * @param Zend_Form $callAssemblyMachine
     */
    public function init($callAssemblyMachine = null) {
        $callAssemblyMachine;
    }

//////////////////////////-- Above is main program --///////////////////////////

    /**
     * @param array $param
     */
    private function __action($param) {
        $action = $param[0];
        $method = $param[1];
        $id = $param[2];

        $this->setAction($action)->setMethod($method);
    }

    /**
     * @param array $param
     */
    private function __submit($param) {
        $id = $param[0];

        $this->addElement('submit', $id);
    }

    /**
     * @param array $param
     */
    private function __name($param) {
        $alias = $param[0];
        $realName = $param[1];

        $this->addElement('text', $alias, [
            'label' => ucfirst($realName) . ":",
            'required' => true,
            'class' => 'hello',
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
                ]
            ]
        ]);
    }


    /**
     * @param array $param
     */
    private function __email($param) {
        $alias = $param[0];
        $realName = $param[1];

        $this->addElement('text', $alias, [
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
                    'EmailAddress', true, [
                        "messages" => [
                            'emailAddressInvalidFormat' => "$realName nhập sai"
                        ]
                    ]
                ]
            ]
        ]);
    }

    /**
     * @param array $param
     */
    private function __id($param) {
        $alias = $param[0];
        $this->addElement('hidden', $alias);
    }

    /**
     * @param array $param
     */
    private final function __phoneNumber($param) {
        $alias = $param[0];
        $realName = $param[1];

        $this->addElement('text', $alias, [
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
        ]);
    }

    /**
     * @param array $param
     */
    private final function __information($param) {
        $alias = $param[0];
        $realName = $param[1];

        $this->addElement('textarea', $alias, [
            'label' => ucfirst($realName) . ":",
            'required' => true,
            'validators' => [
                [
                    'NotEmpty', true, [
                        "messages" => [
                            'isEmpty' => "Bạn cần nhập $realName"
                        ]
                    ]
                ]
            ]
        ]);
    }

    /**
     * @param string $realName
     */
    private function __gender($realName) {
        
    }

    /**
     * @param string $realName
     */
    private function __birthday($realName) {
        
    }
    
    /**
     * @param array $param
     */
    private  final function __anyThing($param) {
        $alias = $param[0];
        $realName = $param[1];

        $this->addElement('text', $alias, [
            'label' => ucfirst($realName) . ":",
            'required' => true
        ]);
    }

    /**
     * @param array $param
     */
    private function __number($param) {
        $alias = $param[0];
        $realName = $param[1];

        $this->addElement('text', $alias, [
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
        ]);
    }

}
