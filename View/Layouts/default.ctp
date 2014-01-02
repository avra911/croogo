<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <?php
    echo $this->Html->css(
        array(
        '/theme/Rca/css/frontend_style',
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

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $title_for_layout; ?> &raquo; <?php echo Configure::read('Site.title'); ?></title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:r,b,i,r,b,b,b,r,r,b">

    <?php
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
        '/theme/Rca/js/jquery/jquery.form',

        '/theme/Rca/js/muffingroup_menu',
        '/theme/Rca/js/custom.js',

    ));
    ?>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if IE 7]>
    <link rel="stylesheet" href="http://themes.muffingroup.com/doover/wp-content/themes/doover/css/ie7.css" />
    <![endif]-->

    <link rel="shortcut icon" href="http://themes.muffingroup.com/doover/wp-content/themes/doover/images/favicon.ico" type="image/x-icon" />

    <meta name="description" content="Doover Premium WordPress Theme - check the demo version and buy it now for only $50." />
    <meta name="keywords" content="doover wordpress theme, premium wordpress theme, doover, muffin group, muffingroup" />
    <meta name="robots" content="index, follow" />

    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-31305350-1']);
        _gaq.push(['_setDomainName', 'muffingroup.com']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
</head>

<body class="home page page-id-10 page-template page-template-template-home-php">

<header id="Header">
    <div class="header_overlay">
        <div class="Wrapper">

            <div class="top">

                <h1>
                    <?php
                        echo $this->Html->link(
                            Configure::read('Site.title'),
                            '/',
                            array('id' => 'logo')
                        );
                    ?>
                </h1>

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


            <section class="subpage_header">
                <h2>
                    <?php if($this->request->here == '/') :?>
                        <?php echo Configure::read('Site.tagline'); ?>
                    <?php else : ?>
                        <?php echo $title_for_layout; ?>
                    <?php endif; ?>
                </h2>
            </section>

        </div>
    </div>
</header>

<div id="Content" style="display: none">
    <div class="Wrapper">
        <?php
            echo $this->Layout->sessionFlash();
            echo $content_for_layout;
        ?>
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

<script>
    var getElementsByClassName=function(a,b,c){if(document.getElementsByClassName){getElementsByClassName=function(a,b,c){c=c||document;var d=c.getElementsByClassName(a),e=b?new RegExp("\\b"+b+"\\b","i"):null,f=[],g;for(var h=0,i=d.length;h<i;h+=1){g=d[h];if(!e||e.test(g.nodeName)){f.push(g)}}return f}}else if(document.evaluate){getElementsByClassName=function(a,b,c){b=b||"*";c=c||document;var d=a.split(" "),e="",f="http://www.w3.org/1999/xhtml",g=document.documentElement.namespaceURI===f?f:null,h=[],i,j;for(var k=0,l=d.length;k<l;k+=1){e+="[contains(concat(' ', @class, ' '), ' "+d[k]+" ')]"}try{i=document.evaluate(".//"+b+e,c,g,0,null)}catch(m){i=document.evaluate(".//"+b+e,c,null,0,null)}while(j=i.iterateNext()){h.push(j)}return h}}else{getElementsByClassName=function(a,b,c){b=b||"*";c=c||document;var d=a.split(" "),e=[],f=b==="*"&&c.all?c.all:c.getElementsByTagName(b),g,h=[],i;for(var j=0,k=d.length;j<k;j+=1){e.push(new RegExp("(^|\\s)"+d[j]+"(\\s|$)"))}for(var l=0,m=f.length;l<m;l+=1){g=f[l];i=false;for(var n=0,o=e.length;n<o;n+=1){i=e[n].test(g.className);if(!i){break}}if(i){h.push(g)}}return h}}return getElementsByClassName(a,b,c)},
        dropdowns = getElementsByClassName( 'dropdown-menu' );
    for ( i=0; i<dropdowns.length; i++ )
        dropdowns[i].onchange = function(){ if ( this.value != '' ) window.location.href = this.value; }
</script>

</body>
</html>