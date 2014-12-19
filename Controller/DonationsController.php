<?php

class DonationsController extends AppController {

    public $name = 'Donations';
    public $paginate = array();
    public $helpers = array();

    public function beforeFilter() {
        parent::beforeFilter();
        if (isset($this->Auth)) {
            $this->Auth->allow(array('index', 'go'));
        }
    }

    function index() {
        if (!empty($this->request->data)) {
            $donationId = '';
            $this->request->data['Donation']['status'] = '1';
            $this->request->data['Donator']['address_contact'] = "{$this->request->data['Donator']['county_contact']}{$this->request->data['Donator']['town_contact']}{$this->request->data['Donator']['address_contact']}";
            $this->request->data['Donator']['address_registered'] = "{$this->request->data['Donator']['county_registered']}{$this->request->data['Donator']['town_registered']}{$this->request->data['Donator']['address_registered']}";
            $this->Donation->set($this->request->data);
            $this->Donation->validates();
            if ($this->request->data['Donation']['type'] == '1') {
                $this->Donation->Donator->set($this->request->data);
                $this->Donation->Donator->validates();
                if ($this->request->data['Donation']['amount'] > 100000) {
                    $this->Donation->validationErrors['amount'] = '個人捐贈不得超過 100000 元';
                }
                if (empty($this->Donation->validationErrors) && empty($this->Donation->Donator->validationErrors)) {
                    $this->Donation->Donator->create();
                    if ($this->Donation->Donator->save($this->request->data)) {
                        $this->request->data['Donation']['Donator_id'] = $this->Donation->Donator->getInsertID();
                        $this->Donation->create();
                        if ($this->Donation->save($this->request->data)) {
                            $donationId = $this->Donation->getInsertID();
                        }
                    }
                }
            } else {
                $this->request->data['Donation']['Donator_id'] = 0;
                if ($this->request->data['Donation']['amount'] > 10000) {
                    $this->Donation->validationErrors['amount'] = '匿名捐贈不得超過 10000 元';
                }
                if (empty($this->Donation->validationErrors)) {
                    $this->Donation->create();
                    if ($this->Donation->save($this->request->data)) {
                        $donationId = $this->Donation->getInsertID();
                    }
                }
            }
            if (!empty($donationId)) {
                $this->redirect(array('action' => 'go', $donationId));
            }
        }
    }

    function go($donationId = '') {
        if (!empty($donationId)) {
            $donation = $this->Donation->find('first', array(
                'conditions' => array('id' => $donationId),
            ));
            if (!empty($donation)) {
                $this->set('donation', $donation);
            } else {
                $this->Session->setFlash(__('Please do following links in the page', true));
                $this->redirect(array('action' => 'index', $donationId));
            }
        }
    }

    function admin_index($foreignModel = null, $foreignId = '', $op = null) {
        $foreignKeys = array();

        $foreignKeys = array(
            'Donator' => 'Donator_id',
        );


        $scope = array();
        if (array_key_exists($foreignModel, $foreignKeys) && !empty($foreignId)) {
            $scope['Donation.' . $foreignKeys[$foreignModel]] = $foreignId;
        } else {
            $foreignModel = '';
        }
        $this->set('scope', $scope);
        $this->paginate['Donation']['limit'] = 20;
        $this->paginate['Donation']['order'] = array(
            'Donation.created' => 'DESC',
        );
        $this->paginate['Donation']['contain'] = array(
            'Donator' => array(
                'fields' => array('id', 'name')
            )
        );
        $items = $this->paginate($this->Donation, $scope);

        $this->set('items', $items);
        $this->set('foreignId', $foreignId);
        $this->set('foreignModel', $foreignModel);
    }

    function admin_view($id = null) {
        if (!$id || !$this->data = $this->Donation->find('first', array(
            'conditions' => array('Donation.id' => $id),
            'contain' => array('Donator'),
                ))) {
            $this->Session->setFlash(__('Please do following links in the page', true));
            $this->redirect(array('action' => 'index'));
        }
        $items = $this->paginate($this->Donation->DonationLog, array(
            'Donation_id' => $id,
        ));
        $this->set('items', $items);
        $this->set('url', array($id));
    }

    function admin_add($foreignModel = null, $foreignId = '') {
        $foreignKeys = array(
            'Donator' => 'Donator_id',
        );
        if (array_key_exists($foreignModel, $foreignKeys) && !empty($foreignId)) {
            if (!empty($this->data)) {
                $this->data['Donation'][$foreignKeys[$foreignModel]] = $foreignId;
            }
        } else {
            $foreignModel = '';
        }
        if (!empty($this->data)) {
            $this->Donation->create();
            if ($this->Donation->save($this->data)) {
                $this->Session->setFlash(__('The data has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Something was wrong during saving, please try again', true));
            }
        }
        $this->set('foreignId', $foreignId);
        $this->set('foreignModel', $foreignModel);

        $belongsToModels = array(
            'listDonator' => array(
                'label' => 'Donators',
                'modelName' => 'Donator',
                'foreignKey' => 'Donator_id',
            ),
        );

        foreach ($belongsToModels AS $key => $model) {
            if ($foreignModel == $model['modelName']) {
                unset($belongsToModels[$key]);
                continue;
            }
            $this->set($key, $this->Donation->$model['modelName']->find('list'));
        }
        $this->set('belongsToModels', $belongsToModels);
    }

    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Please do following links in the page', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Donation->save($this->data)) {
                $this->Session->setFlash(__('The data has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Something was wrong during saving, please try again', true));
            }
        }
        $this->set('id', $id);
        $this->data = $this->Donation->read(null, $id);

        $belongsToModels = array(
            'listDonator' => array(
                'label' => 'Donators',
                'modelName' => 'Donator',
                'foreignKey' => 'Donator_id',
            ),
        );

        foreach ($belongsToModels AS $key => $model) {
            $this->set($key, $this->Donation->$model['modelName']->find('list'));
        }
        $this->set('belongsToModels', $belongsToModels);
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Please do following links in the page', true));
        } else if ($this->Donation->delete($id)) {
            $this->Session->setFlash(__('The data has been deleted', true));
        }
        $this->redirect(array('action' => 'index'));
    }

}
