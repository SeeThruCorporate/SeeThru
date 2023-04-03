<?php
/**
 * prolancer functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package prolancer
 */


if ( ! function_exists( 'prolancer_setup' ) ) :

	function prolancer_setup() {

		load_theme_textdomain( 'prolancer', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'prolancer' ),
			'top-menu' => esc_html__( 'Top Menu', 'prolancer' )
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'custom-background', apply_filters( 'prolancer_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		add_image_size( 'prolancer-1280x720', 1280,720,true );
		add_image_size( 'prolancer-1280x650', 1280,650, array( 'center', 'top' ));
		add_image_size( 'prolancer-750x430', 750,430, array( 'center', 'top' ));
		add_image_size( 'prolancer-600x399', 600,399,true );
		add_image_size( 'prolancer-400-400', 400,400,true );
		add_image_size( 'prolancer-200-200', 200,200,true );
		add_image_size( 'prolancer-360-260', 360,260,true );
		add_image_size( 'prolancer-115x115', 115,115,true );
		add_image_size( 'prolancer-100x80', 100,80,true );
		add_image_size( 'prolancer-80x80', 80,80,true );
		add_image_size( 'prolancer-32x32', 32,32,true );
		add_image_size( 'prolancer-300x150', 300,150,true );

	}

endif;
add_action( 'after_setup_theme', 'prolancer_setup' );

function prolancer_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'prolancer_content_width', 640 );
}
add_action( 'after_setup_theme', 'prolancer_content_width', 0 );

function prolancer_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'prolancer' ),
		'id'            => 'sidebar_widgets',
		'description'   => esc_html__( 'Add widgets here.', 'prolancer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Project archive sidebar', 'prolancer' ),
		'id'            => 'project_archive_widgets',
		'description'   => esc_html__( 'Add widgets here.', 'prolancer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Service archive sidebar', 'prolancer' ),
		'id'            => 'service_archive_widgets',
		'description'   => esc_html__( 'Add widgets here.', 'prolancer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Buyer archive sidebar', 'prolancer' ),
		'id'            => 'buyer_archive_widgets',
		'description'   => esc_html__( 'Add widgets here.', 'prolancer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Buyer Sidebar', 'prolancer' ),
		'id'            => 'buyer_widgets',
		'description'   => esc_html__( 'Add widgets here.', 'prolancer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Seller archive sidebar', 'prolancer' ),
		'id'            => 'seller_archive_widgets',
		'description'   => esc_html__( 'Add widgets here.', 'prolancer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Seller Sidebar', 'prolancer' ),
		'id'            => 'seller_widgets',
		'description'   => esc_html__( 'Add widgets here.', 'prolancer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'prolancer_widgets_init' );


// Register Fonts
function prolancer_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * translators: If there are characters in your language that are not supported
	 * by Rubik, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Rubik font: on or off', 'prolancer' ) ) {
		$fonts[] = 'Rubik:300,400,500,700,900';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg(
			array(
				'family'  => urlencode( implode( '|', $fonts ) ),
				'subset'  => urlencode( $subsets ),
				'display' => urlencode( 'fallback' ),
			),
			'https://fonts.googleapis.com/css'
		);
	}

	return $fonts_url;
}

// Scripts
function prolancer_scripts() {

  global $prolancer_opt;

	// CSS
	wp_enqueue_style('prolancer-fonts', prolancer_fonts_url());
	wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.min.css');
	wp_enqueue_style('prolancer-default', get_template_directory_uri() . '/assets/css/default.css');
	wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.min.css');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('prolancer-style', get_stylesheet_uri() );

	// JS
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );
	
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );
  	wp_enqueue_script( 'prolancer-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), wp_get_theme()->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'prolancer-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

	wp_localize_script( 'prolancer-main', 'prolancerAjaxUrlObj', array( 
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'logo' => !empty(wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' )) ? wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' )[0] : '',
		'alt_logo' => !empty($prolancer_opt['alt_logo']) ? $prolancer_opt['alt_logo']['url'] : ''
	));

	//'prolancer-style' is main style of the theme
  wp_add_inline_style( 'prolancer-style', prolancer_inline_style());
}

add_action( 'wp_enqueue_scripts', 'prolancer_scripts' );

// Denqueue scripts and styles.
function prolancer_dequeue_script() {
    wp_dequeue_style( 'elementor-animations' );
    wp_deregister_style( 'elementor-animations' );
}
add_action( 'wp_enqueue_scripts', 'prolancer_dequeue_script', 20 );

// Includes files
require get_template_directory() . '/inc/inline-script.php';
require get_template_directory() . '/inc/redux-framework.php';
require get_template_directory() . '/inc/ajax-actions.php';

if (empty(get_option( 'licence_activated' ))) {
	require get_template_directory() . '/inc/activate-license.php';
}

require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/breadcrumb.php';
require get_template_directory() . '/inc/customizer.php';

// TGM required plugins
function prolancer_register_required_plugins() {

	$plugins = array(

		array(
			'name'        => esc_html__('Redux Framework', 'prolancer'),
			'slug'        => 'redux-framework',
			'required' 	  => true,
		),

		array(
			'name'        =>  esc_html__('Elementor', 'prolancer'),
			'slug'        => 'elementor',
			'required'    => true,
		),

		array(
			'name'        => esc_html__('WooCommerce', 'prolancer'),
			'slug'        => 'woocommerce',
			'required' 	  => true,
		),

		array(
			'name'        => esc_html__('CMB2', 'prolancer'),
			'slug'        => 'cmb2',
			'required' 	  => true,
		),

		array(
			'name'        =>  esc_html__('Classic Widgets', 'prolancer'),
			'slug'        => 'classic-widgets',
			'required'    => true,
		),
		
		array(
			'name'        => esc_html__('ProLancer Element (licence required)', 'prolancer'),
			'slug'        => 'prolancer-element',
			'source'      => 'https://themebing.com/wp-json/download/purchase_code='.get_option( 'licence_activated' ).'/name=prolancer-element',
			'required' 	  => true,
		),

		array(
			'name'        => esc_html__('Contact Form 7', 'prolancer'),
			'slug'        => 'contact-form-7',
			'required' 	  => true,
		),

		array(
			'name'        => esc_html__('Mailchimp', 'prolancer'),
			'slug'        => 'mailchimp-for-wp',
			'required' 	  => true,
		),

		array(
			'name'        => esc_html__('One Click Demo Import', 'prolancer'),
			'slug'        => 'one-click-demo-import',
			'required' 	  => true,
		),

		array(
			'name'        => esc_html__('Envato Market', 'prolancer'),
			'slug'        => 'envato-market',
			'source'      => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
			'required' 	  => false,
		)
	);

	$config = array(
		'id'           => 'prolancer',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '', 
		'is_automatic' => false,
		'message'      => '',  
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'prolancer_register_required_plugins' );

// One click demo import
function prolancer_import_files() {
	return array(
		array(
			'import_file_name'             => esc_html__( 'Default', 'prolancer' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/default/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/default/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/default/customizer.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/default/redux.json',
					'option_name' => 'prolancer_opt',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri(). '/inc/demo/default/demo.jpg',
			'import_notice'                => esc_html__( 'After you import this demo, you will have to set up the menu URLs separately.', 'prolancer' ),
			'preview_url'                  => 'https://themebing.com/wp/prolancer/',
		)
	);
}

if (!empty(get_option( 'licence_activated' ))) {
	add_filter( 'pt-ocdi/import_files', 'prolancer_import_files' );
}

// Plugin update
if (function_exists('is_plugin_active')) {
	if (is_plugin_active('prolancer-element/prolancer-element.php')) {
		if ( is_admin() ) {
			if (get_plugin_data(WP_PLUGIN_DIR . '/prolancer-element/prolancer-element.php')['Version'] < '1.3.7' ) {
				deactivate_plugins(array('prolancer-element/prolancer-element.php'));
				delete_plugins(array('prolancer-element/prolancer-element.php'));
			}
		}
	}
}

// Default Home and Blog Setup
function prolancer_after_import_setup() {
    // Assign menus to their locations.
    set_theme_mod( 'nav_menu_locations', array(
            'primary' => get_term_by( 'name', 'Primary', 'nav_menu' )->term_id,
            'top-menu' => get_term_by( 'name', 'Top Menu', 'nav_menu' )->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'prolancer_after_import_setup' );

// Related Posts
function prolancer_related_posts(){

    global $prolancer_opt;

    if (!empty($prolancer_opt['related_posts']) && $prolancer_opt['related_posts']!='') {
         $posts_per_page = !empty( $prolancer_opt['posts_per_page'] ) ? $prolancer_opt['posts_per_page'] : '';
         $related_posts_columns = !empty( $prolancer_opt['related_posts_columns'] ) ? $prolancer_opt['related_posts_columns'] : '';
         $related_post_title = !empty( $prolancer_opt['related_post_title'] ) ? $prolancer_opt['related_post_title'] : '';
        
        global $post;

        $related = get_posts( array( 
            'category__in' => wp_get_post_categories($post->ID),
            'posts_per_page' => $posts_per_page,
            'post_type' => 'post', 
            'post__not_in' => array($post->ID) 
        ) ); ?>

      <?php if ($related): ?>
        <div class="related-posts">
          <h4><?php echo esc_html( $related_post_title ) ?></h4>
          <div class="row">
              <?php
                  if( $related ) foreach( $related as $post ) { 
                  setup_postdata($post); ?>
                  <div class="col-md-12 col-xl-<?php echo esc_attr( $related_posts_columns ) ?>">
                      <div class="single-related-post">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <a href="<?php the_permalink(); ?>"> 
                              <?php the_post_thumbnail('prolancer-600x399');  ?> 
                          </a>
                      <?php endif; ?>

                          <div class="related-post-title">
                              <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 50, '...'); ?></a>
                              <span><?php the_time('F j, Y') ?></span>
                          </div>

                      </div>
                  </div>
              <?php } wp_reset_postdata(); ?> 
          </div>
      </div><!-- .related-posts --> 

      <?php endif ?>
    <?php } 
}


// Comment List
function prolancer_comment_list($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'article' == $args['style'] ) {
		$tag = 'article';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'comment';
	}
?>

<<?php echo esc_html( $tag ) ?> <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
	<div class="row">
		<?php
		$avatar = get_avatar( $comment, 90 );
		if ($avatar): ?>
			<div class="col-md-2 col-xl-1">
		        <?php echo get_avatar( $comment, 90 ); ?>
		    </div>
		<?php endif ?>	    
	    <div class="<?php if( $avatar =='' ){ echo 'col-md-12'; } else { echo'col-md-10 col-xl-11'; } ?>">
	        <div class="commenter">
	            <?php echo get_comment_author_link(); ?>
	            <span><?php comment_date('jS F Y , ').comment_time() ?></span>
	        </div>
	        <?php comment_text() ?>
	        <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>	        
	        <?php if ($comment->comment_approved == '0') : ?>
			<p class="comment-meta-item"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'prolancer' ) ?></p>
			<?php endif; ?>
			<?php edit_comment_link('<p class="comment-meta-item">Edit this comment</p>','',''); ?>
	    </div>
	</div>
<?php }


//Comment Field to Bottom
function prolancer_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'prolancer_comment_field_to_bottom' );

// Archive count on rightside
function prolancer_archive_count_on_rightside($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="float-end">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}

add_filter( 'get_archives_link', 'prolancer_archive_count_on_rightside' );

// hex color to rgb
function prolancer_hex2rgb($hex = '') {
  $hex = str_replace('#', '', $hex);
  if(strlen($hex) > 3) $color = str_split($hex, 2);
  else $color = str_split($hex);
  return implode(" ",[hexdec($color[0]), hexdec($color[1]), hexdec($color[2])]);
}


// Login logo
function prolancer_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
	        background-image: url(<?php echo wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0];?>);
			height:65px;
			width:260px;
			background-size: contain;
			background-repeat: no-repeat;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'prolancer_login_logo' );

// Custom login url
function prolancer_custom_login_url($url) {
    return esc_url( home_url( '/' ) );
}

add_filter( 'login_headerurl', 'prolancer_custom_login_url' );

// Currency symbol
function prolancer_get_currency_symbol($amount = null){
	if ( class_exists( 'WooCommerce' ) ) {				
		if ($amount > 0) {
			if( is_rtl() ){
	      return $amount.get_woocommerce_currency_symbol();
	    } else {
	    	return get_woocommerce_currency_symbol().$amount;
	    }
	  } else {
			if( is_rtl() ){
	      return '0'.get_woocommerce_currency_symbol();
	    } else {
	    	return get_woocommerce_currency_symbol().'0';
	    }
	  }
	} else {
		return 0;
	}
}