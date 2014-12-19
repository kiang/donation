<div id="DonatorsView">
    <h3><?php echo __('View Donators', true); ?></h3><hr />
    <div class="col-md-12">

        <div class="col-md-2">Name</div>
        <div class="col-md-9"><?php
            if ($this->data['Donator']['name']) {

                echo $this->data['Donator']['name'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">Taiwan ID</div>
        <div class="col-md-9"><?php
            if ($this->data['Donator']['twid']) {

                echo $this->data['Donator']['twid'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">Phone</div>
        <div class="col-md-9"><?php
            if ($this->data['Donator']['phone']) {

                echo $this->data['Donator']['phone'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">Mobile Phone</div>
        <div class="col-md-9"><?php
            if ($this->data['Donator']['phone_mobile']) {

                echo $this->data['Donator']['phone_mobile'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">Email</div>
        <div class="col-md-9"><?php
            if ($this->data['Donator']['email']) {

                echo $this->data['Donator']['email'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">Contact Address</div>
        <div class="col-md-9"><?php
            if ($this->data['Donator']['address_contact']) {

                echo $this->data['Donator']['address_contact'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">Registered Address</div>
        <div class="col-md-9"><?php
            if ($this->data['Donator']['address_registered']) {

                echo $this->data['Donator']['address_registered'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">Contact Postcode</div>
        <div class="col-md-9"><?php
            if ($this->data['Donator']['postcode_contact']) {

                echo $this->data['Donator']['postcode_contact'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">Registered Postcode</div>
        <div class="col-md-9"><?php
            if ($this->data['Donator']['postcode_registered']) {

                echo $this->data['Donator']['postcode_registered'];
            }
?>&nbsp;
        </div>
    </div>
    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('Donators List', true), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('View Related Donations', true), array('controller' => 'donations', 'action' => 'index', 'Donator', $this->data['Donator']['id']), array('class' => 'DonatorsViewControl')); ?></li>
        </ul>
    </div>
    <div id="DonatorsViewPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function() {
            $('a.DonatorsViewControl').click(function() {
                $('#DonatorsViewPanel').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>