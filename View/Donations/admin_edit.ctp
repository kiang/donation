<div id="DonationsAdminEdit">
    <?php echo $this->Form->create('Donation', array('type' => 'file', 'class' => 'form-inline')); ?>
    <div class="Donations form">
        <fieldset>
            <legend><?php
                echo __('Edit Donations', true);
                ?></legend>
            <?php
            echo $this->Form->input('Donation.id');
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