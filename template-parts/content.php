
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

        <?php if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
            <span class="posted-on">Posted on <time class="entry-date published">June 24, 2017</time></span>
        </div>
        <?php endif; ?>

        <?php
            if ( is_single() || is_page() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
            endif;
        ?>
    </header>
    <?php if ( has_post_thumbnail() ) { ?>
    <div class="featured-image">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
    </div>
    <?php } ?>
    <div class="entry-content">
		<?php
        
            if( is_singular() ):
            
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'leanMinimal' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'leanMinimal' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'leanMinimal' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
        
            else:
        
            the_excerpt();
        
            echo '<a class="more-link" href="'. get_permalink($post->ID) . '">' . 'Read More' . '</a>';
        
            endif;
		?>
    </div>
    <?php if(is_single()): ?>
	<footer class="entry-footer">
		<?php
        
            $categories = get_the_category();
            $separator = ', ';
            $output = '';

            echo '<span class="cat-links">';
        
            if ( ! empty( $categories ) ) {
                foreach( $categories as $category ) {
                    $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                }
                echo 'Filed under: '.trim( $output, $separator );
            }
            echo '</span>';
        
            echo '<span class="tag-links">';
            the_tags( 'Tags: ',' , ' );
            echo '</span>';

			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'leanMinimal' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
    <?php endif; ?>
</article>

<?php
    if( is_single() ): ?>
        <section class="comments shadow-box">
            <?php
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            ?>
        </section>
<?php
    else:
        // No comments
    endif;
?>