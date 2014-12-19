<?php

class DonationLog extends AppModel {

    var $name = 'DonationLog';
    var $validate = array(
        'is_donator_notified' => array(
            'booleanFormat' => array(
                'rule' => 'boolean',
                'message' => 'Wrong format',
                'allowEmpty' => true,
            ),
        ),
    );
    var $actsAs = array(
    );
    var $belongsTo = array(
        'Donation' => array(
            'foreignKey' => 'Donation_id',
            'className' => 'Donation',
        ),
    );

    function afterSave($created, $options = array()) {
        
    }

}
