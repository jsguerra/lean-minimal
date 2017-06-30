<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
    
    <link rel="profile" href="http://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="nav-bar">
            <div class="wrapper">
                <div class="site-branding">
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                </div>
                <nav class="navigation-main" role="navigation">
                    <div class="nav-mobile">
                        <a id="nav-toggle" href="javascript:void(0);"><span></span></a>
                    </div>
                    <?php
                        wp_nav_menu(array(
                            'menu_class' => 'nav-list',
                            'depth' => 1
                        ));
                    ?>
                </nav>
            </div>
        </div>
        <?php if(is_singular()):
            // Don't display title
        else: ?>
        <div class="title-block" role="banner">
            <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
            <p class="site-description"><?php echo get_bloginfo( 'description', 'display' ); ?></p>
        </div>
        <?php endif; ?>
    </header>
    
    <main class="content-area" role="main">
        <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
        
                    get_template_part( 'template-parts/content', get_post_format() );
        
                endwhile;
        
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'leanMinimal' ),
                    'next_text'          => __( 'Next page', 'leanMinimal' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'leanMinimal' ) . ' </span>',
                ) );
        
            else :
        
                get_template_part( 'template-parts/content', 'none' );
        
            endif;
        ?>
    </main>
    
    <footer class="site-footer" role="contentinfo">
        <div class="footer-links"><a href="#">Cookies</a> <a href="#">Sitemap</a></div>
        <div class="site-info">&copy; <?php echo date('Y'); ?> Copyright all rights reserved.</div>
    </footer>

    <?php wp_footer(); ?>
</body>

</html>