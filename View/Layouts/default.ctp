<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title><?php echo $title_for_layout; ?> &raquo; <?php echo Configure::read('Site.title'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    echo $this->Meta->meta();
    echo $this->Layout->feed();
    ?>

    <?php
    echo $this->Html->css(
        array(
        '/theme/Rca/css/frontend_style',
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
    ?>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:r,b,i,r,b,b,b,r,r,b">

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
    echo $this->Blocks->get('css');
    echo $this->Blocks->get('script');
    ?>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
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
                                <a href="#"><?php echo Configure::read('Site.tagline'); ?></a>
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

        <?php if($this->request->here == '/') :?>
            <div class="row clearfix">
                <div class="col one_third">
                    <div class="homepage-box clearfix">
                        <h3>Ai mai facut RCA la noi?!</h3>
                        <img alt="Easy to customize" src="http://themes.muffingroup.com/doover/wp-content/themes/doover/images/samples/easy_to_customize.png">

                        <p>Multumim ca esti client RCA Asigurat. Daca ai mai facut polita RCA la noi, introdu seria de sasiu sau codul cotatiei si vei afla imediat tariful politei RCA Ieftin.</p>
                        <p><a target="" href="/doover/features" class="button button-small button-small-gray"><span>Read more</span></a>

                        </p></div>

                </div>

                <div class="col one_third">
                    <div class="homepage-box clearfix">
                        <h3>Anunta-ma gratuit!</h3>
                        <img alt="Documentation" src="http://themes.muffingroup.com/doover/wp-content/themes/doover/images/samples/documentation.png">

                        <p>Ne lasi doar adresa de email sau numarul de telefon si data la care expira polita ta RCA ! Te vom contacta cu cateva zile inainte ca polita ta sa expire!</p>
                        <p><a target="" href="/doover/features" class="button button-small button-small-gray"><span>Read more</span></a>

                        </p></div>

                </div>
                <div class="col one_third last">
                    <div class="homepage-box clearfix">
                        <h3>Te sunam noi!</h3>
                        <img alt="Browser compatible" src="http://themes.muffingroup.com/doover/wp-content/themes/doover/images/samples/browsers.png">
                        <p>Introduceti numarul de telefon in casuta de mai jos:</p>
                        <p>In maxim 30 de minute te contactam pentru a-ti calcula cel mai ieftin RCA.</p>
                        <p><a target="" href="/doover/features" class="button button-small button-small-gray"><span>Read more</span></a>

                        </p></div>

                </div>

            </div>

            <div class="row clearfix">
                <div class="Call-to-action">
                    <div class="inside clearfix">
                        <h4>Evita sa platesti amenda de 2000 lei!</h4>
                        <h5>
                            <strong>Noi te anuntam gratuit in momentul in care asigurarea ta expira.</strong><p></p>
                        </h5>
                        <a href="" class="call_to_action  call_to_action_contact"><span>Anunta-ma gratuit!</span></a>
                    </div>
                </div>

            </div>
        <?php endif; ?>
        <div class="content">
            <?php
                echo $this->Layout->sessionFlash();
                echo $content_for_layout;
            ?>
        </div>
        <!--<div class="sidebar">
            <aside class="widget widget_doover_menu" id="widget_doover_menu-2">
                <nav class="submenu">
                    <ul>
                        <li class="page_item page-item-771"><a href="http://themes.muffingroup.com/doover/pages/sidebars/left-sidebar">Left sidebar<em></em></a></li>
                        <li class="page_item page-item-773 current_page_item last-item"><a href="http://themes.muffingroup.com/doover/pages/sidebars/right-sidebar">Right sidebar<em></em></a></li>
                    </ul>
                </nav>
            </aside>
            <?php /*echo $this->Regions->blocks('right'); */?>
        </div>-->
    </div>
</div>

<!-- Footer -->
<footer id="Footer" style="display: none">
    <div class="Wrapper">



        <div class="row clearfix">

            <div class="widget-area col one_third">
                <aside id="nav_menu-2" class="widget widget_nav_menu"><h5 class="widget-title">Should to see</h5><div class="menu-footer-menu-container"><ul id="menu-footer-menu" class="menu"><li id="menu-item-965" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-965"><a href="http://themes.muffingroup.com/doover/features">Check the list of our great features</a></li>
                            <li id="menu-item-967" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-967"><a href="http://themes.muffingroup.com/doover/shortcodes/columns-2/full-width">Grid Based Layout</a></li>
                            <li id="menu-item-966" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-966"><a href="http://themes.muffingroup.com/doover/pages/homepage/photo-slider">Photo Slider</a></li>
                        </ul></div></aside>		</div>


            <div class="widget-area col one_third">
                <aside id="search-3" class="widget widget_search"><h5 class="widget-title">Search</h5><form role="search" method="get" id="searchform" class="searchform" action="http://themes.muffingroup.com/doover/">
                        <div>
                            <label class="screen-reader-text" for="s">Search for:</label>
                            <input type="text" value="" name="s" id="s" />
                            <input type="submit" id="searchsubmit" value="Search" />
                        </div>
                    </form></aside>		</div>


            <div class="widget-area col one_third last">
                <aside id="text-2" class="widget widget_text"><h5 class="widget-title">Donec eu tellus odio</h5>			<div class="textwidget"><p><b>Donec eu tellus odio. Vivamus adipiscing elit in nibh lacinia ac pretium augue tempus.</b></p>
                        <p>Quisque imperdiet eros ac turpis tempor adipiscing sodales mauris fermentum. Pellentesque scelerisque adipiscing tortor sit amet pretium.</p>
                    </div>
                </aside>		</div>


        </div>
        <div class="row clearfix">

            <div class="two_third col">

                <div class="copyrights">
                    <p class="author">&copy; 2013 <span>Doover Premium WordPress Theme</span>. All Rights Reserved. Powered by <a href="http://wordpress.org">WordPress</a>.</p>
                    <p>Created by <a href="http://muffingroup.com">Muffin group</a>.</p>
                </div>

            </div>

            <div class="one_third col last">
                <a class="back_to_top" href="#" title="Back to top">Back to top</a>
            </div>

        </div>

    </div>
</footer>

</body>
</html>