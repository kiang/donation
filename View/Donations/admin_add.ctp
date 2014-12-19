<div id="DonationsAdminAdd">
        <?php
    $url = array();
    if (!empty($foreignId) && !empty($foreignModel)) {
        $url = array('action' => 'add', $foreignModel, $foreignId);
    } else {
        $url = array('action' => 'add');
        $foreignModel = '';
    }
    echo $this->Form->create('Donation', array('type' => 'file', 'url' => $url, 'class' => 'form-inline'));
    ?>
    <div class="Donations form">
        <fieldset>
            <legend><?php
                echo __('Add Donations', true);
                ?></legend>
            <?php
            foreach ($belongsToModels AS $key => $model) {
                echo $this->Form->input('Donation.' . $model['foreignKey'], array(
                    'type' => 'select',
                    'label' => $model['label'],
                    'options' => $$key,
                    'empty' => '匿名',
                    'div' => 'control-group',
                    'class' => 'controls',
                ));
            }
            echo $this->Form->input('Donation.amount', array(
                'label' => 'Amount',
                'div' => 'control-group',
                'class' => 'controls',
            ));
            echo $this->Form->input('Donation.payment_method', array(
                'label' => 'Payment Method',
                'div' => 'control-group',
                'class' => 'controls',
            ));
            echo $this->Form->input('Donation.status', array(
                'label' => 'Status',
                'div' => 'control-group',
                'class' => 'controls',
            ));
            echo $this->Form->input('Donation.created', array(
                'label' => 'Created',
                'value' => date('Y-m-d H:i:s'),
                'div' => 'control-group',
                'class' => 'controls',
            ));
            ?>
        </fieldset>
    </div>
        <?php
    echo $this->Form->end(__('Submit', true));
    ?>
</div>