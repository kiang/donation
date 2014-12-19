<div class="container">
    <?php echo $this->Form->create('Donation', array('target' => '_blank')); ?>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>線上捐款</h3></div>
            <div class="panel-body" style="height: 200px;">
                <div class="col-md-6">
                    <?php
                    echo $this->Form->input('Donation.type', array(
                        'type' => 'radio',
                        'options' => array(
                            '1' => '個人',
                            '2' => '匿名',
                        ),
                        'value' => isset($this->data['Donation']['type']) ? $this->data['Donation']['type'] : '1',
                        'legend' => '捐款身份',
                        'div' => 'form-group',
                        'class' => 'donationType',
                        'style' => 'margin: 0px 20px;',
                    ));
                    echo $this->Form->hidden('Donation.payment_method');
                    ?>
                    <div class="clearfix"></div>
                    <?php
                    echo $this->Form->input('Donation.amount', array(
                        'label' => '捐款金額',
                        'type' => 'number',
                        'value' => empty($this->data['Donation']['amount']) ? '2000' : $this->data['Donation']['amount'],
                        'div' => 'form-group col-md-12',
                        'class' => 'form-control',
                    ));
                    ?>
                </div>
                <div class="col-md-6"><br /><br />（個人具名捐款可抵扣綜合所得稅）
                    <br /><br />「個人」包括下列情形：
                    <ol>
                        <li>獨資或數人合夥方式經營之事務所、醫院、診所、補習班。</li>
                        <li>非醫療社團法人之醫院。</li>
                    </ol></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>實體帳戶捐款</h3></div>
            <div class="panel-body" style="height: 200px;">
                <p>除了在本網站上填寫捐款資料、由網路捐款之外，您也可以直接至銀行轉帳匯款入政治獻金專戶，並來電提供捐款人資料，由人工對帳確認</p>
                xx銀行(銀行代碼：xxx)
                xx分行(分行代碼：xxxx)
                <br />帳號： xxxxx
                <br />戶名： xxx年xxxxx擬參選人xxx政治獻金專戶
                <div class="pull-right">捐款專線： xxx</div>
            </div>
        </div>
    </div>
    <div class="col-md-12 blockDonatorForm">
        <h3>捐款人基本資料</h3>
        <?php
        echo $this->Form->input('Donator.name', array(
            'label' => '姓名',
            'div' => 'form-group col-md-6',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Donator.twid', array(
            'label' => '身份證字號',
            'div' => 'form-group col-md-6',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Donator.phone', array(
            'label' => '室內電話',
            'div' => 'form-group col-md-3',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Donator.phone_mobile', array(
            'label' => '手機號碼',
            'div' => 'form-group col-md-3',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Donator.email', array(
            'label' => '電子信箱',
            'div' => 'form-group col-md-6',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Donator.postcode_contact', array(
            'label' => '郵遞區號',
            'div' => 'form-group col-md-1',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Donator.county_contact', array(
            'type' => 'select',
            'label' => '縣市',
            'div' => 'form-group col-md-2',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Donator.town_contact', array(
            'type' => 'select',
            'label' => '鄉鎮市區',
            'div' => 'form-group col-md-2',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Donator.address_contact', array(
            'label' => '通訊地址(寄送收據)',
            'div' => 'form-group col-md-7',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Donator.postcode_registered', array(
            'label' => '郵遞區號',
            'div' => 'form-group col-md-1',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Donator.county_registered', array(
            'type' => 'select',
            'label' => '縣市',
            'div' => 'form-group col-md-2',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Donator.town_registered', array(
            'type' => 'select',
            'label' => '鄉鎮市區',
            'div' => 'form-group col-md-2',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Donator.address_registered', array(
            'label' => '戶籍地址',
            'div' => 'form-group col-md-7',
            'class' => 'form-control',
        ));
        ?>
    </div>
    <div class="col-md-12">
        <h3>捐款方式</h3>
        <div class="col-md-9">
            <a href="#" class="btn btn-primary btnPay" data-id="Credit">線上刷卡</a>
            <a href="#" class="btn btn-primary btnPay" data-id="WebATM">線上 ATM 轉帳</a>
            <a href="#" class="btn btn-primary btnPay" data-id="CVS">超商代碼</a>
            <a href="#" class="btn btn-primary btnPay" data-id="BARCODE">超商條碼</a>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
    <div class="col-md-12">
        <h3>注意事項</h3>
        <p>
        <ol>
            <li>捐贈者須具有中華民國國籍並具有選舉權 (年滿20歲且未被褫奪公權)。</li>
            <li>任何人不得以本人以外之名義捐贈。</li>
            <li>捐贈者不得為同一種選舉 (103年臺南市議員) 之擬參選人。</li>
            <li>擬以匿名方式捐贈，其總額不得超過新台幣1萬元。</li>
            <li>個人對同一擬參選人捐贈總額不得超過新台幣10萬元。</li>
            <li>個人對不同擬參選人每年度(103年)捐贈總額不得超過新台幣20萬元，抵稅額上限為新台幣20萬元。</li>
            <li>在下列機關團體，擔任本國團體或法人之董事長職務，或占本國團體或法人之董事、監察人、執行業務或代表公司之股東等各項職務總名額超過三分之一以上者，或占股份有限公司之股權百分之三十以上或無限公司、兩合公司、有限公司之股東及一般法人、團體之社員人數超過三分之一以上者，均不得捐贈。</li>
            <ol>
                <li>外國人民、法人、團體或其他機構，或主要成員為外國人民、法人、團體或其他機構之法人、團體或其他機構。</li>
                <li>大陸地區人民、法人、團體或其他機構，或主要成員為大陸地區人民、法人、團體或其他機構之法人、團體或其他機構。</li>
                <li>香港、澳門居民、法人、團體或其他機構，或主要成員為香港、澳門居民、法人、團體或其他機構之法人、團體或其他機構。</li>
            </ol>
        </ol>
        </p>
    </div>
</div>
<script>
    $(function() {
        $('input.donationType').click(function() {
            if ($('input.donationType:checked').val() === '1') {
                $('div.blockDonatorForm').show();
            } else {
                $('div.blockDonatorForm').hide();
            }
        });
        $('a.btnPay').click(function() {
            $('input#DonationPaymentMethod').val($(this).attr('data-id'));
            $('form#DonationIndexForm').submit();
            return false;
        });
        var countyOptions = '';
        for (i in twzipCodeData) {
            countyOptions += '<option>' + i + '</option>';
        }
        $('select#DonatorTownContact').change(function() {
            var countySelected = $('select#DonatorCountyContact').val();
            var townSelected = $(this).val();
            $('input#DonatorPostcodeContact').val(twzipCodeData[countySelected][townSelected]);
        });
        $('select#DonatorCountyContact')
                .html(countyOptions)
                .change(function() {
                    var townOptions = '';
                    var countySelected = $(this).val();
                    for (i in twzipCodeData[countySelected]) {
                        townOptions += '<option>' + i + '</option>';
                    }
                    $('select#DonatorTownContact').html(townOptions).trigger('change');
                })
                .trigger('change');
        $('select#DonatorTownRegistered').change(function() {
            var countySelected = $('select#DonatorCountyRegistered').val();
            var townSelected = $(this).val();
            $('input#DonatorPostcodeRegistered').val(twzipCodeData[countySelected][townSelected]);
        });
        $('select#DonatorCountyRegistered')
                .html(countyOptions)
                .change(function() {
                    var townOptions = '';
                    var countySelected = $(this).val();
                    for (i in twzipCodeData[countySelected]) {
                        townOptions += '<option>' + i + '</option>';
                    }
                    $('select#DonatorTownRegistered').html(townOptions).trigger('change');
                })
                .trigger('change');
    })
</script>