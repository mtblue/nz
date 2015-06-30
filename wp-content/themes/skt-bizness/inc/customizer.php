<?php
/**
 * SKT Bizness Theme Customizer
 *
 * @package SKT Bizness
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skt_bizness_customize_register( $wp_customize ) {
	
class WP_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}

//Add a class for titles
    class SktBizness_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_section('header_image');
	
	$wp_customize->add_section(
        'logo_sec',
        array(
            'title' => __('Logo (PRO Version)', 'skt-bizness'),
            'priority' => 1,
            'description' => __('<strong>Logo and favicon Settings available in <a href="'.SKT_PRO_THEME_URL.'" target="_blank">PRO Version</a>.</strong>','skt-bizness'),
        )
    );  
    $wp_customize->add_setting('sktbizness_options[font-info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new SktBizness_Info( $wp_customize, 'logo_section', array(
        'section' => 'logo_sec',
        'settings' => 'sktbizness_options[font-info]',
        'priority' => null
        ) )
    );
	
	$wp_customize->add_setting('biz_color_scheme', array(
		'default' => '#599c01',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','skt-bizness'),
			'description'	=> '<strong>More color options in <a href="'.SKT_PRO_THEME_URL.'" target="_blank">PRO version</a></strong>',
			'section' => 'colors',
			'settings' => 'biz_color_scheme'
		))
	);
	
	$wp_customize->add_section('social_section',array(
		'title'	=> __('Social Links','skt-bizness'),
		'description'	=> 'Add your social links here. <br><strong>More social links in <a href="'.SKT_PRO_THEME_URL.'" target="_blank">PRO version</a>.</strong>',
		'priority'		=> null
	));
	
	$wp_customize->add_setting('fb_link',array(
		'default'	=> '#facebook',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('fb_link',array(
		'label'	=> __('Facebook Link','skt-bizness'),
		'section'	=> 'social_section',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('twitt_link',array(
		'default'	=> '#twitter',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('twitt_link',array(
		'label'	=> __('Twitter Link','skt-bizness'),
		'section'	=> 'social_section',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('in_link',array(
		'default'	=> '#linkedin',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('in_link',array(
		'label'	=> __('Linkedin Link','skt-bizness'),
		'section'	=> 'social_section',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('gplus_link',array(
		'default'	=> '#gplus',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('gplus_link',array(
		'label'	=> __('Gplus Link','skt-bizness'),
		'section'	=> 'social_section',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('flickr_link',array(
		'default'	=> '#flickr',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('flickr_link',array(
		'label'	=> __('Flickr Link','skt-bizness'),
		'section'	=> 'social_section',
		'type'		=> 'text'
	));
	
	$wp_customize->add_section('header_contact', array(
		'title'	=> __('Header Contact','skt-bizness'),
		'description' => __('Add your contact details here','skt-bizness'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('mail_textbox',array(
		'default'	=> 'site@example.com',
		'sanitize_callback'	=> 'sanitize_email',
	));
	
	$wp_customize->add_control('mail_textbox',array(
		'label'	=> __('Email','skt-bizness'),
		'section'	=> 'header_contact',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('phone_textbox',array(
		'default'	=> '+91 123 456 789',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('phone_textbox',array(
		'label'	=> __('Phone Number','skt-bizness'),
		'section'	=> 'header_contact',
		'type'		=> 'text'
	));
	
	$wp_customize->add_section('slider_section',array(
		'title'	=> __('Slider Settings','skt-bizness'),
		'description'	=> __('Add slider images here. <br><strong>More slider settings available in <a href="'.SKT_PRO_THEME_URL.'" target="_blank">PRO version</a>.</strong>','skt-bizness'),
		'priority'		=> null
	));
	
	// Slide Image 1
	$wp_customize->add_setting('slide_image1',array(
		'default'	=> get_template_directory_uri().'/images/slides/slide_01.jpg',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'slide_image1',
        array(
            'label' => __('Slide Image 1 (1400x457)','skt-bizness'),
            'section' => 'slider_section',
            'settings' => 'slide_image1'
        )
    )
);

	$wp_customize->add_setting('slide_title1',array(
		'default'	=> 'Responsive Design',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('slide_title1',array(
		'label'	=> __('Slide Title 1','skt-bizness'),
		'section'	=> 'slider_section',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('slide_desc1',array(
		'default'	=> 'This is description for slider one.',
		'sanitize_callback'	=> 'wp_htmledit_pre',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Textarea_Control(
			$wp_customize,
			'slide_desc1',
			array(
				'label' => __('Slide Description 1','skt-bizness'),
				'section' => 'slider_section',
				'setting'	=> 'slide_desc1'
			)
		)
	);
	
	$wp_customize->add_setting('slide_link1',array(
		'default'	=> '#link1',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('slide_link1',array(
		'label'	=> __('Slide Link 1','skt-bizness'),
		'section'	=> 'slider_section',
		'type'		=> 'text'
	));
	
	// Slide Image 2
	$wp_customize->add_setting('slide_image2',array(
		'default'	=> get_template_directory_uri().'/images/slides/slide_02.jpg',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'slide_image2',
        array(
            'label' => __('Slide Image 2 (1400x457)','skt-bizness'),
            'section' => 'slider_section',
            'settings' => 'slide_image2'
        )
    )
);

	$wp_customize->add_setting('slide_title2',array(
		'default'	=> 'Flexible Design',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('slide_title2',array(
		'label'	=> __('Slide Title 2','skt-bizness'),
		'section'	=> 'slider_section',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('slide_desc2',array(
		'default'	=> 'This is description for slide two',
		'sanitize_callback'	=> 'wp_htmledit_pre',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Textarea_Control(
			$wp_customize,
			'slide_desc2',
			array(
				'label' => __('Slide Description 2','skt-bizness'),
				'section' => 'slider_section',
				'setting'	=> 'slide_desc2'
			)
		)
	);
	
	$wp_customize->add_setting('slide_link2',array(
		'default'	=> '#link2',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('slide_link2',array(
		'label'	=> __('Slide Link 2','skt-bizness'),
		'section'	=> 'slider_section',
		'type'		=> 'text'
	));
	
	// Slide Image 3
	$wp_customize->add_setting('slide_image3',array(
		'default'	=> get_template_directory_uri().'/images/slides/slide_03.jpg',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'slide_image3',
        array(
            'label' => __('Slide Image 3 (1400x457)','skt-bizness'),
            'section' => 'slider_section',
            'settings' => 'slide_image3'
        )
    )
);

	$wp_customize->add_setting('slide_title3',array(
		'default'	=> 'Awesome Features',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('slide_title3',array(
		'label'	=> __('Slide Title 3','skt-bizness'),
		'section'	=> 'slider_section',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('slide_desc3',array(
		'default'	=> 'This is description for slide three',
		'sanitize_callback'	=> 'wp_htmledit_pre',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Textarea_Control(
			$wp_customize,
			'slide_desc3',
			array(
				'label' => __('Slide Description 3','skt-bizness'),
				'section' => 'slider_section',
				'setting'	=> 'slide_desc3'
			)
		)
	);
	
	$wp_customize->add_setting('slide_link3',array(
		'default'	=> '#link3',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('slide_link3',array(
		'label'	=> __('Slide Link 3','skt-bizness'),
		'section'	=> 'slider_section',
		'type'		=> 'text'
	));
	
	// Page settings 
	$wp_customize->add_section('page_boxes',array(
		'title'	=> __('Homepage Boxes','skt-bizness'),
		'description'	=> __('Select Pages from the dropdown','skt-bizness'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting(
    'page-setting1',
		array(
			'sanitize_callback' => 'skt_bizness_sanitize_integer',
		)
	);
 
	$wp_customize->add_control(
		'page-setting1',
		array(
			'type' => 'dropdown-pages',
			'label' => __('Choose a page for box one:','skt-bizness'),
			'section' => 'page_boxes',
		)
	);
	
	$wp_customize->add_setting(
    'page-setting2',
		array(
			'sanitize_callback' => 'skt_bizness_sanitize_integer',
		)
	);
	
	$wp_customize->add_control(
		'page-setting2',
		array(
			'type' => 'dropdown-pages',
			'label' => __('Choose a page for box Two:','skt-bizness'),
			'section' => 'page_boxes',
		)
	);
	
	$wp_customize->add_setting(
    'page-setting3',
		array(
			'sanitize_callback' => 'skt_bizness_sanitize_integer',
		)
	);
	
	$wp_customize->add_control(
		'page-setting3',
		array(
			'type' => 'dropdown-pages',
			'label' => __('Choose a page for box Three:','skt-bizness'),
			'section' => 'page_boxes',
		)
	);
	
	$wp_customize->add_setting(
    'page-setting4',
		array(
			'sanitize_callback' => 'skt_bizness_sanitize_integer',
		)
	);
	
	$wp_customize->add_control(
		'page-setting4',
		array(
			'type' => 'dropdown-pages',
			'label' => __('Choose a page for box Four:','skt-bizness'),
			'section' => 'page_boxes',
		)
	);
	
	$wp_customize->add_setting(
    'page-setting5',
		array(
			'sanitize_callback' => 'skt_bizness_sanitize_integer',
		)
	);
	
	$wp_customize->add_control(
		'page-setting5',
		array(
			'type' => 'dropdown-pages',
			'label' => __('Choose a page for box Five:','skt-bizness'),
			'section' => 'page_boxes',
		)
	);
	
	$wp_customize->add_section('footer_section',array(
		'title'	=> __('Footer Text','skt-bizness'),
		'description'	=> __('Add some text for footer like copyright etc.','skt-bizness'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('footer_copy',array(
		'default'	=> __('Bizness 2015 | All Rights Reserved.','skt-bizness'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('footer_copy',array(
		'label'	=> __('Copyright Text','skt-bizness'),
		'section'	=> 'footer_section',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('sktbizness_options[credit-info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new SktBizness_Info( $wp_customize, 'cred_section', array(
        'section' => 'footer_section',
		'label'	=> __('To remove credit link upgrade to pro','skt-bizness'),
        'settings' => 'sktbizness_options[credit-info]',
        ) )
    );
	
	$wp_customize->add_section(
        'theme_layout_sec',
        array(
            'title' => __('Layout Settings (PRO Version)', 'skt-bizness'),
            'priority' => null,
            'description' => __('<strong>Layout Settings available in  <a href="'.SKT_PRO_THEME_URL.'" target="_blank">PRO Version</a>.</strong>','skt-bizness'),
        )
    );  
    $wp_customize->add_setting('sktbizness_options[layout-info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new SktBizness_Info( $wp_customize, 'layout_section', array(
        'section' => 'theme_layout_sec',
        'settings' => 'sktbizness_options[layout-info]',
        'priority' => null
        ) )
    );
	
	$wp_customize->add_section(
        'theme_font_sec',
        array(
            'title' => __('Fonts Settings (PRO Version)', 'skt-bizness'),
            'priority' => null,
            'description' => __('<strong>Font Settings available in <a href="'.SKT_PRO_THEME_URL.'" target="_blank">PRO Version</a>.</strong>','skt-bizness'),
        )
    );  
    $wp_customize->add_setting('sktbizness_options[font-info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new SktBizness_Info( $wp_customize, 'font_section', array(
        'section' => 'theme_font_sec',
        'settings' => 'sktbizness_options[font-info]',
        'priority' => null
        ) )
    );
	
    $wp_customize->add_section(
        'theme_doc_sec',
        array(
            'title' => __('Documentation &amp; Support', 'skt-bizness'),
            'priority' => null,
            'description' => __('For documentation and support check this link : <a href="'.SKT_THEME_DOC.'" target="_blank">SKT Bizness Documentation</a>','skt-bizness'),
        )
    );  
    $wp_customize->add_setting('sktbizness_options[info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new SktBizness_Info( $wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'sktbizness_options[info]',
        'priority' => 10
        ) )
    );
	
	
}
add_action( 'customize_register', 'skt_bizness_customize_register' );

//Integer
function skt_bizness_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_bizness_customize_preview_js() {
	wp_enqueue_script( 'skt_bizness_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_bizness_customize_preview_js' );

function skt_bizness_css(){
		?>
        <style>
				#logo h1 a, 
				.social_icons h5,
				.social_icons a,
				a, 
				.tm_client strong,
				#footer a,
				#footer ul li:hover a, 
				#footer ul li.current_page_item a,
				h6,
				h5,
				.postmeta a:hover,
				h1,
				.sidebar-area ul li a:hover{
					color:<?php echo get_theme_mod('biz_color_scheme'); ?>;
				}
				.header_menu, 
				.theme-default .nivo-controlNav a.active, 
				.slide_more a, 
				.readmore, .wpcf7 form input[type='submit'], 
				p.sub input[type='submit'],
				.cf_button, 
				#commentform input#submit, 
				.mobile_nav a, 
				.pagination ul li span.current, 
				.pagination ul li:hover a, 
				.pagination ul li span.current, 
				.pagination ul li:hover a{
					background-color:<?php echo get_theme_mod('biz_color_scheme'); ?>;
				}
		</style>
	<?php }
add_action('wp_head','skt_bizness_css');

function skt_bizness_custom_customize_enqueue() {
	wp_enqueue_script( 'skt-bizness-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'skt_bizness_custom_customize_enqueue' );