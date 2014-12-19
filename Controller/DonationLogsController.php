<?php

class DonationLogsController extends AppController {

    public $name = 'DonationLogs';

    function admin_add($donationId = '') {
        if (!empty($donationId)) {
            if (!empty($this->data)) {
                $dataToSave = $this->data;
                $dataToSave['DonationLog']['Donation_id'] = $donationId;
                $this->DonationLog->create();
                if ($this->DonationLog->save($dataToSave)) {
                    $this->DonationLog->Donation->id = $donationId;
                    $this->DonationLog->Donation->save(array('Donation' => array(
                            'status' => $dataToSave['DonationLog']['status'],
                    )));
                    $this->Session->setFlash(__('The data has been saved', true));
                } else {
                    $this->Session->setFlash(__('Something was wrong during saving, please try again', true));
                }
            }
            $this->redirect(array('controller' => 'donations', 'action' => 'view', $donationId));
        } else {
            $this->redirect(array('controller' => 'donations', 'action' => 'index'));
        }
    }

}
