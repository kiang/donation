<?php

class Donation extends AppModel {

    var $name = 'Donation';
    var $validate = array(
        'amount' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '這個欄位必填',
            ),
        ),
        'amount' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '這個欄位必填',
            ),
        ),
    );
    var $belongsTo = array(
        'Donator' => array(
            'foreignKey' => 'Donator_id',
            'className' => 'Donator',
        ),
    );
    var $hasMany = array(
        'DonationLog' => array(
            'foreignKey' => 'Donation_id',
            'dependent' => false,
            'className' => 'DonationLog',
        ),
    );

}
