<?php

/**
 * @author Tran Van Hoang <butdatac@gmail.com>
 * create form edit supplier
 */
class Administrator_Form_EditSupplier extends Zend_Form {

    public function init() {
        $this->setAction('/administrator/manage-supplier/edit')
                ->setMethod('post')
                ->setAttribs([
                    'id' => 'editSupplier'
        ]);

        $this->addElement('hidden', 'SuppId', [
            'label' => "Mã giảng viên"
        ]);

        $this->addElement('text', 'SuppName', [
            'label' => "Họ và tên:",
            'required' => true,
            'validators' => [
                [
                    'NotEmpty', true, [
                        "messages" => [
                            'isEmpty' => 'Bạn cần nhập tên của nhà cung cấp'
                        ]
                    ]
                ],
                [
                    'Alpha', true, [
                        'allowWhiteSpace' => true,
                        'messages' => [
                            'notAlpha' => 'Bạn cần nhập chính xác tên của nhà cung cấp'
                        ]
                    ]
                ]
            ]
        ]);

        $this->addElement('text', 'SuppAddress', [
            'label' => "Địa chỉ:",
            'required' => true,
            'validators' => [
                [
                    'NotEmpty', true, [
                        "messages" => [
                            'isEmpty' => 'Bạn cần nhập địa chỉ của nhà cung cấp'
                        ]
                    ]
                ]
            ]
        ]);

        $this->addElement('text', 'SuppFacebook', [
            'label' => "Facebook:"
        ]);

        $this->addElement('text', 'SuppPhone', [
            'label' => "Số điện thoại",
            'required' => true,
            'validators' => [
                [
                    'NotEmpty', true, [
                        "messages" => [
                            'isEmpty' => 'Bạn cần nhập số điện thoại của nhà cung cấp'
                        ]
                    ]
                ],
                [
                    'Digits', true, [
                        'messages' => [
                            'notDigits' => 'Bạn cần nhập chính xác số điện thoại của nhà cung cấp'
                        ]
                    ]
                ],
                [
                    'StringLength',true,[
                        'min'=>10,
                        'max'=>11,
                        'messages'=>[
                            'stringLengthTooShort'=>'Số điện thoại chỉ chứa ít hơn 10 số',
                            'stringLengthTooLong'=>'Số điện thoại chỉ chứa nhiều hơn 11 số'
                        ]
                    ]
                ]
            ]
        ]);

        $this->addElement('text', 'SuppEmail', [
            'label' => "Email nhà cung cấp:",
            'required' => true,
            'validators' => [
                [
                    'NotEmpty', true, [
                        "messages" => [
                            'isEmpty' => 'Bạn cần nhập email của nhà cung cấp'
                        ]
                    ]
                ],
                [
                    'EmailAddress', true, [
                        "messages" => [
                            'emailAddressInvalidFormat' => 'Bạn cần nhập chính xác email của nhà cung cấp'
                        ]
                    ]
                ]
            ]
        ]);

        $this->addElement('text', 'SuppFax', [
            'label' => "Số Fax",
            'validators' => [
                [
                    'Digits', true, [
                        "messages" => [
                            'notDigits' => 'Bạn cần nhập chính xác số fax của nhà cung cấp'
                        ]
                    ]
                ]
            ]
        ]);

        $this->addElement('submit', 'edit', [
        ]);

        $this->addElement('submit', 'editandclose', [
            'class' => 'btn btn-primary'
        ]);
    }

}
