<?php
if (!isset($url)) {
    $url = array();
}

if (!empty($foreignId) && !empty($foreignModel)) {
    $url = array($foreignModel, $foreignId);
}
?>
<div id="DonationsAdminIndex">
    <h2><?php echo __('Donations', true); ?></h2>
    <div class="btn-group">
        <?php echo $this->Html->link(__('Add', true), array_merge($url, array('action' => 'add')), array('class' => 'btn dialogControl')); ?>
    </div>
    <div><?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?></div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="DonationsAdminIndexTable">
        <thead>
            <tr>
                <?php if (empty($scope['Donation.Donator_id'])): ?>
                    <th><?php echo $this->Paginator->sort('Donation.Donator_id', 'Donators', array('url' => $url)); ?></th>
                <?php endif; ?>

                <th><?php echo $this->Paginator->sort('Donation.amount', 'Amount', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Donation.payment_method', 'Payment Method', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Donation.status', 'Status', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Donation.created', 'Created', array('url' => $url)); ?></th>
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
                    <?php if (empty($scope['Donation.Donator_id'])): ?>
                        <td><?php
                            if (empty($item['Donator']['id'])) {
                                echo '匿名';
                            } else {
                                echo $this->Html->link($item['Donator']['name'], array(
                                    'controller' => 'donators',
                                    'action' => 'view',
                                    $item['Donator']['id']
                                ));
                            }
                            ?></td>
                    <?php endif; ?>

                    <td><?php echo $item['Donation']['amount']; ?></td>
                    <td><?php echo $item['Donation']['payment_method']; ?></td>
                    <td><?php echo $item['Donation']['status']; ?></td>
                    <td><?php echo $item['Donation']['created']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Donation']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $item['Donation']['id']), array('class' => 'dialogControl')); ?>
                    </td>
                </tr>
            <?php } // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="DonationsAdminIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function() {
            $('#DonationsAdminIndexTable th a, #DonationsAdminIndex div.paging a').click(function() {
                $('#DonationsAdminIndex').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>