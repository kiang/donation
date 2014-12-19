<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-TW">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            xxx年xxxxx擬參選人xxx政治獻金捐款::
            <?php echo $title_for_layout; ?>
        </title><?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('jquery-ui');
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('default');
        echo $this->Html->script('jquery');
        echo $this->Html->script('jquery-ui');
        echo $this->Html->script('jquery.twzipcode');
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('olc');
        echo $scripts_for_layout;
        ?>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php echo $this->Html->link('xxx年xxxxx擬參選人xxx政治獻金捐款', '/', array('class' => 'navbar-brand')); ?>
                </div>
                <nav class="collapse navbar-collapse" role="navigation">
                    <ul class="nav navbar-nav">
                        <?php if ($this->Session->read('Auth.User.id')): ?>
                            <li><?php echo $this->Html->link('Donators', '/admin/donators'); ?></li>
                            <li><?php echo $this->Html->link('Donations', '/admin/donations'); ?></li>
                            <li><?php echo $this->Html->link('Members', '/admin/members'); ?></li>
                            <li><?php echo $this->Html->link('Groups', '/admin/groups'); ?></li>
                            <li><?php echo $this->Html->link('Logout', '/members/logout'); ?></li>
                        <?php endif; ?>
                        <?php
                        if (!empty($actions_for_layout)) {
                            foreach ($actions_for_layout as $title => $url) {
                                echo '<li>' . $this->Html->link($title, $url) . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </nav>
        <div id="content">
            <?php echo $this->Session->flash(); ?>
            <div id="viewContent"><?php echo $content_for_layout; ?></div>
        </div>
        <div id="footer" class="container">
            --<br />
            <?php echo $this->Html->link('江明宗 . 政 . 路過', 'http://k.olc.tw/', array('target' => '_blank')); ?>
            <?php if (!$this->Session->read('Auth.User.id')): ?>
                / <?php echo $this->Html->link('Login', '/members/login'); ?>
            <?php endif; ?>
        </div>
        <?php
        echo $this->element('sql_dump');
        ?>
        <script type="text/javascript">
            //<![CDATA[
            $(function() {
                $('a.dialogControl').click(function() {
                    dialogFull(this);
                    return false;
                });
            });
            //]]>
        </script>
    </body>
</html>