<?php

class Donator extends AppModel {

    var $name = 'Donator';
    var $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '這個欄位必填',
            ),
        ),
        'twid' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '這個欄位必填',
            ),
        ),
        'phone_mobile' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '這個欄位必填',
            ),
        ),
        'email' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '這個欄位必填',
            ),
        ),
        'address_contact' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '這個欄位必填',
            ),
        ),
        'address_registered' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '這個欄位必填',
            ),
        ),
        'postcode_contact' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '這個欄位必填',
            ),
        ),
        'postcode_registered' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '這個欄位必填',
            ),
        ),
    );
    var $hasMany = array(
        'Donation' => array(
            'foreignKey' => 'Donator_id',
            'dependent' => false,
            'className' => 'Donation',
        ),
    );

}
