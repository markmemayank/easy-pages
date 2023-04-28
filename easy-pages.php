<?php
/**
 * Plugin Name: Easy Pages
 * Description: A plugin that creates basic pages with one click.
 * Version: 1.0
 * Author: [Your Name]
 * Author URI: [Your Website URL]
 * Text Domain: easy-pages
 * Domain Path: /languages
 */

// Add plugin menu item to the sidebar
function easy_pages_add_menu() {
	add_menu_page( 'Easy Pages', 'Easy Pages', 'manage_options', 'easy-pages', 'easy_pages_settings_page', 'dashicons-admin-page', 100 );
}
add_action( 'admin_menu', 'easy_pages_add_menu' );

// Plugin settings page
function easy_pages_settings_page() {
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<p><?php _e( 'Click the button below to create basic pages.', 'easy-pages' ); ?></p>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="create_easy_pages">
			<?php wp_nonce_field( 'create_easy_pages_nonce', 'create_easy_pages_nonce' ); ?>
			<button type="submit" class="button button-primary"><?php _e( 'Create Pages', 'easy-pages' ); ?></button>
		</form>
	</div>
	<?php
}

// Create pages on activation
function easy_pages_create_pages() {
	// Check if pages already exist
	$home = get_page_by_title( 'Home' );
	$about = get_page_by_title( 'About Us' );
	$services = get_page_by_title( 'Services' );
	$contact = get_page_by_title( 'Contact Us' );
	$privacy = get_page_by_title( 'Privacy Policy' );
	$terms = get_page_by_title( 'Terms & Conditions' );
	$blogs = get_page_by_title( 'Blogs' );
	$careers = get_page_by_title( 'Careers' );

	// Create pages if they don't exist
	if ( empty( $home ) ) {
		wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_title'   => 'Home',
				'post_content' => 'Dummy Content',
				'post_status'  => 'publish',
			)
		);
	}
	if ( empty( $about ) ) {
		wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_title'   => 'About Us',
				'post_content' => 'Dummy Content',
				'post_status'  => 'publish',
			)
		);
	}
	if ( empty( $services ) ) {
		wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_title'   => 'Services',
				'post_content' => 'Dummy Content',
				'post_status'  => 'publish',
			)
		);
	}
	if ( empty( $contact ) ) {
		wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_title'   => 'Contact Us',
				'post_content' => 'Dummy Content',
				'post_status'  => 'publish',
			)
		);
	}
	if ( empty( $privacy ) ) {
		wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_title'   => 'Privacy Policy',
				'post_content' => 'Dummy Content',
				'post_status'  =>'publish',
			)
		);
	}
	if ( empty( $terms ) ) {
	wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_title'   => 'Terms & Conditions',
			'post_content' => 'Dummy Content',
			'post_status'  => 'publish',
		)
	);
}
if ( empty( $blogs ) ) {
	wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_title'   => 'Blogs',
			'post_content' => 'Dummy Content',
			'post_status'  => 'publish',
		)
	);
}
if ( empty( $careers ) ) {
	wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_title'   => 'Careers',
			'post_content' => 'Dummy Content',
			'post_status'  => 'publish',
		)
	);
}
}
register_activation_hook( FILE, 'easy_pages_create_pages' );




