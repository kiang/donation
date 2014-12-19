<div id="DonationsAdminView" class="container">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>捐款</h3></div>
            <div class="panel-body" style="height: 150px;">
                金額：<?php echo $this->data['Donation']['amount']; ?><br />
                付款方式：<?php echo $this->data['Donation']['payment_method']; ?><br />
                狀態：<?php echo $this->data['Donation']['status']; ?><br />
                建立時間：<?php echo $this->data['Donation']['created']; ?><br />
                更新時間：<?php echo $this->data['Donation']['modified']; ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>捐款人</h3></div>
            <div class="panel-body" style="height: 150px;">
                <?php
                if (empty($this->data['Donator']['id'])) {
                    echo '匿名';
                } else {
                    ?>
                    姓名：<?php echo $this->data['Donator']['name']; ?> / <?php echo $this->data['Donator']['twid']; ?><br />
                    電話：<?php echo $this->data['Donator']['phone']; ?><br />
                    手機：<?php echo $this->data['Donator']['phone_mobile']; ?><br />
                    信箱：<?php echo $this->data['Donator']['email']; ?><br />
                    聯絡：<?php echo $this->data['Donator']['postcode_contact']; ?><?php echo $this->data['Donator']['address_contact']; ?><br />
                    戶籍：<?php echo $this->data['Donator']['postcode_registered']; ?><?php echo $this->data['Donator']['address_registered']; ?><br />
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="paging"><?php echo $this->element('paginator'); ?></div>
        <table class="table table-bordered" id="DonationLogsAdminIndexTable">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('DonationLog.created', 'Created', array('url' => $url)); ?></th>
                    <th><?php echo $this->Paginator->sort('DonationLog.status', 'Status', array('url' => $url)); ?></th>
                    <th><?php echo $this->Paginator->sort('DonationLog.is_donator_notified', 'Donator Notified?', array('url' => $url)); ?></th>
                    <th><?php echo $this->Paginator->sort('DonationLog.note', 'Note', array('url' => $url)); ?></th>
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
                            echo $item['DonationLog']['created'];
                            ?></td>
                        <td><?php
                            echo $item['DonationLog']['status'];
                            ?></td>
                        <td><?php
                            echo empty($item['DonationLog']['is_donator_notified']) ? '否' : '是';
                            ?></td>
                        <td><?php
                            echo nl2br($item['DonationLog']['note']);
                            ?></td>
                    </tr>
                <?php } // End of foreach ($items as $item) {  ?>
            </tbody>
        </table>
        <div>
            <?php
            echo $this->Form->create('DonationLog', array('class' => 'form', 'url' => array('action' => 'add', $this->data['Donation']['id'])));
            echo $this->Form->input('DonationLog.status', array(
                'type' => 'select',
                'options' => array(
                    'new' => '新捐款',
                    'verified' => '資料確認',
                    'submitted' => '監察院登錄',
                    'canceled' => '取消捐款',
                    'returned' => '退回捐款',
                ),
                'value' => $this->data['Donation']['status'],
                'label' => '狀態',
                'div' => 'form-group col-md-6',
                'class' => 'form-control',
            ));
            echo $this->Form->input('DonationLog.is_donator_notified', array(
                'label' => '通知捐款人？',
                'div' => 'form-group col-md-6',
                'class' => false,
            ));
            echo $this->Form->input('DonationLog.note', array(
                'rows' => '5',
                'label' => '備註',
                'div' => 'form-group col-md-12',
                'class' => 'form-control',
            ));
            ?><div class="clearfix"></div><?php
            echo $this->Form->end(__('Submit', true));
            ?>
        </div>
    </div>
</div>