<?php
if (!isset($url)) {
    $url = array();
}
?>
<div id="DonatorsAdminIndex">
    <h2><?php echo __('Donators', true); ?></h2>
    <div class="btn-group">
        <?php echo $this->Html->link(__('Add', true), array('action' => 'add'), array('class' => 'btn dialogControl')); ?>
    </div>
    <div><?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?></div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="DonatorsAdminIndexTable">
        <thead>
            <tr>

                <th><?php echo $this->Paginator->sort('Donator.name', 'Name', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Donator.twid', 'Taiwan ID', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Donator.phone', 'Phone', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Donator.phone_mobile', 'Mobile Phone', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Donator.email', 'Email', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Donator.address_contact', 'Contact Address', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Donator.address_registered', 'Registered Address', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Donator.postcode_contact', 'Contact Postcode', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Donator.postcode_registered', 'Registered Postcode', array('url' => $url)); ?></th>
                <th class="actions"><?php echo __('Action', true); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($items as $item) {
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>

                    <td><?php
                    echo $item['Donator']['name'];
                    ?></td>
                    <td><?php
                    echo $item['Donator']['twid'];
                    ?></td>
                    <td><?php
                    echo $item['Donator']['phone'];
                    ?></td>
                    <td><?php
                    echo $item['Donator']['phone_mobile'];
                    ?></td>
                    <td><?php
                    echo $item['Donator']['email'];
                    ?></td>
                    <td><?php
                    echo $item['Donator']['address_contact'];
                    ?></td>
                    <td><?php
                    echo $item['Donator']['address_registered'];
                    ?></td>
                    <td><?php
                    echo $item['Donator']['postcode_contact'];
                    ?></td>
                    <td><?php
                    echo $item['Donator']['postcode_registered'];
                    ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Donator']['id']), array('class' => 'dialogControl')); ?>
                        <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $item['Donator']['id']), array('class' => 'dialogControl')); ?>
                        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $item['Donator']['id']), null, __('Delete the item, sure?', true)); ?>
                    </td>
                </tr>
            <?php } // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="DonatorsAdminIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function() {
            $('#DonatorsAdminIndexTable th a, #DonatorsAdminIndex div.paging a').click(function() {
                $('#DonatorsAdminIndex').parent().load(this.href);
                return false;
            });
    });
    //]]>
    </script>
</div>