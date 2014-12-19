<div id="DonatorsAdminEdit">
    <?php echo $this->Form->create('Donator', array('type' => 'file', 'class' => 'form-inline')); ?>
    <div class="Donators form">
        <fieldset>
            <legend><?php
                echo __('Edit Donators', true);
                ?></legend>
            <?php
            echo $this->Form->input('Donator.id');
            echo $this->Form->input('Donator.name', array(
                'label' => 'Name',
                'div' => 'control-group',
                'class' => 'controls',
            ));
            echo $this->Form->input('Donator.twid', array(
                'label' => 'Taiwan ID',
                'div' => 'control-group',
                'class' => 'controls',
            ));
            echo $this->Form->input('Donator.phone', array(
                'label' => 'Phone',
                'div' => 'control-group',
                'class' => 'controls',
            ));
            echo $this->Form->input('Donator.phone_mobile', array(
                'label' => 'Mobile Phone',
                'div' => 'control-group',
                'class' => 'controls',
            ));
            echo $this->Form->input('Donator.email', array(
                'label' => 'Email',
                'div' => 'control-group',
                'class' => 'controls',
            ));
            echo $this->Form->input('Donator.address_contact', array(
                'label' => 'Contact Address',
                'div' => 'control-group',
                'class' => 'controls',
            ));
            echo $this->Form->input('Donator.address_registered', array(
                'label' => 'Registered Address',
                'div' => 'control-group',
                'class' => 'controls',
            ));
            echo $this->Form->input('Donator.postcode_contact', array(
                'label' => 'Contact Postcode',
                'div' => 'control-group',
                'class' => 'controls',
            ));
            echo $this->Form->input('Donator.postcode_registered', array(
                'label' => 'Registered Postcode',
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