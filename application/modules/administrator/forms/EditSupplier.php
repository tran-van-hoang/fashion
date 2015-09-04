<?php

/**
 * @author Tran Van Hoang <phatradang@gmail.com>
 * create form edit supplier
 */
class Administrator_Form_EditSupplier implements Application_Form_FormInterface {

    /**
     * @return array
     */
    public function getFormPattern() {
        $pattern = [
            'formAtt' => [
                'action'=>'/administrator/manage-supplier/edit',
                'method'=>'post',
                'id'=>'editSupplier'
            ],
            'name' => [
                'alias'=>'SuppName',
                'realName'=>'họ và tên nhà cung cấp',
                'attributes'=>[
                    'label'=>'Họ và tên nhà cung cấp',
                    'required'=>true
                ]
            ],
            'submit' => [
                'name'=>'edit'
            ]
        ];

        return $pattern;
    }

}
