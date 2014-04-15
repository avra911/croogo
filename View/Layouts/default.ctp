<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><?php echo $title_for_layout; ?> &raquo; <?php echo Configure::read('Site.title'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    echo $this->Meta->meta(isset($metaForLayout) ? $metaForLayout : array());
    echo $this->Html->meta('icon');
    echo $this->Layout->feed();

    echo $this->Html->css(
        array(
            '/theme/Rca/css/reset',
            '/theme/Rca/css/main',
            '/theme/Rca/css/buttons',
            '/theme/Rca/css/shortcodes',
            '/theme/Rca/css/custom',
            '/theme/Rca/bootstrap/css/bootstrap.min',
            '/theme/Rca/bootstrap/css/bootstrap-theme.min',
        ));
    echo $this->Html->css(
        array(
            '/theme/Rca/css/ui/jquery.ui.all',
            '/theme/Rca/js/fancybox/jquery.fancybox-1.3.4',
            '/theme/Rca/css/blue_theme',
            '/theme/Rca/css/responsive',
        ),
        null,
        array('media' => 'screen')
    );
    echo $this->Blocks->get('css');
    if(!empty($css)) {
        echo $this->Html->css($css);
    }
    ?>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:r,b,i,r,b,b,b,r,r,b">
    <!--[if IE 7]>
    <link rel="stylesheet" href="http://themes.muffingroup.com/doover/wp-content/themes/doover/css/ie7.css" />
    <![endif]-->
</head>

<body class="home page page-id-10 page-template page-template-template-home-php">

<header id="Header">
    <div class="header_overlay">
        <div class="Wrapper">

            <div class="top">

                <div>
                    <h1>
                        <?php
                        echo $this->Html->link(
                            Configure::read('Site.title'),
                            '/',
                            array('id' => 'logo')
                        );
                        ?>
                    </h1>

                    <section class="subpage_header">
                        <h2>
                            <?php if($this->request->here == '/') :?>
                                <a href="<?php echo $this->Html->url(array(
                                    "plugin" => "rca",
                                    "controller" => "rca",
                                    "action" => "calculator",
                                )); ?>">
                                    <?php echo Configure::read('Site.tagline'); ?>
                                </a>
                            <?php else : ?>
                                <?php echo $title_for_layout; ?>
                            <?php endif; ?>
                        </h2>
                    </section>
                </div>

                <div class="top_options">

                    <?php
                    echo $this->Menus->menu(
                        'social',
                        array(
                            'tagAttributes' => array(
                                'class' => 'top_links',
                            )
                        )
                    );
                    ?>

                    <div class="call_us">
                        <span>(0763) </span>  209 080<br />
                        <span>(0728) </span>  959 664<br />
                        <span>(0757) </span>  222 722
                    </div>

                </div>

                <nav id="navigation" class="menu-main-menu-container">
                    <?php
                        echo $this->Menus->menu(
                            'main',
                            array(
                                'dropdown' => true,
                                'class' => 'menu-main-menu'
                            )
                        );;
                    ?>
                </nav>
                <?php echo $this->element('responsive_navigation', array(), array('plugin' => 'Rca')); ?>
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
</header>

<div id="Content">
    <div class="Wrapper">
        <div class="content">
            <!--nocache--><?php echo $this->Layout->sessionFlash(); ?><!--/nocache-->
            <?php echo $content_for_layout ?>
        </div>
    </div>
</div>

<?php
echo $this->Layout->js();
echo $this->Html->script(array(
    '/theme/Rca/js/jquery/jquery-1.7.1.min',
    '/theme/Rca/js/cycle/jquery.easing.1.3',
    '/theme/Rca/js/jquery/jquery.easing.compatibility',

    '/theme/Rca/js/jquery/ui/jquery.ui.core',
    '/theme/Rca/js/jquery/ui/jquery.ui.widget',
    '/theme/Rca/js/jquery/ui/jquery.ui.tabs',
    '/theme/Rca/js/jquery/ui/jquery.ui.accordion',

    '/theme/Rca/js/fancybox/jquery.mousewheel-3.0.4.pack',
    '/theme/Rca/js/fancybox/jquery.fancybox-1.3.4.pack',

    '/theme/Rca/js/muffingroup_menu',
    '/theme/Rca/js/custom',
    '/theme/Rca/bootstrap/js/bootstrap.min',
));
echo $this->Blocks->get('script');
if(!empty($js)) {
    echo $this->Html->script($js);
}
?>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</body>
</html>