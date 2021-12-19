<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://rafael.business
 * @since      1.0.0
 *
 * @package    Wp_Medical_Report_System
 * @subpackage Wp_Medical_Report_System/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Medical_Report_System
 * @subpackage Wp_Medical_Report_System/admin
 * @author     Rafael Business <contato@rafael.business>
 */
class Wp_Medical_Report_System_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Medical_Report_System_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Medical_Report_System_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-medical-report-system-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Medical_Report_System_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Medical_Report_System_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-medical-report-system-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * [register_medical_reports description]
	 * @return [type] [description]
	 */
	public function register_medical_reports() {

		$labels = array(
			'name'                  => _x( 'Medical Reports', 'Post Type General Name', 'wp-medical-report-system' ),
			'singular_name'         => _x( 'Medical Report', 'Post Type Singular Name', 'wp-medical-report-system' ),
			'menu_name'             => __( 'Medical Reports', 'wp-medical-report-system' ),
			'name_admin_bar'        => __( 'Medical Report', 'wp-medical-report-system' ),
			'archives'              => __( 'Medical Report Archives', 'wp-medical-report-system' ),
			'attributes'            => __( 'Medical Report Attributes', 'wp-medical-report-system' ),
			'parent_item_colon'     => __( 'Parent Medical Report:', 'wp-medical-report-system' ),
			'all_items'             => __( 'All Medical Reports', 'wp-medical-report-system' ),
			'add_new_item'          => __( 'Add New Medical Report', 'wp-medical-report-system' ),
			'add_new'               => __( 'Add New', 'wp-medical-report-system' ),
			'new_item'              => __( 'New Medical Report', 'wp-medical-report-system' ),
			'edit_item'             => __( 'Edit Medical Report', 'wp-medical-report-system' ),
			'update_item'           => __( 'Update Medical Report', 'wp-medical-report-system' ),
			'view_item'             => __( 'View Medical Report', 'wp-medical-report-system' ),
			'view_items'            => __( 'View Medical Reports', 'wp-medical-report-system' ),
			'search_items'          => __( 'Search Medical Report', 'wp-medical-report-system' ),
			'not_found'             => __( 'Not found', 'wp-medical-report-system' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wp-medical-report-system' ),
			'featured_image'        => __( 'Featured Image', 'wp-medical-report-system' ),
			'set_featured_image'    => __( 'Set featured image', 'wp-medical-report-system' ),
			'remove_featured_image' => __( 'Remove featured image', 'wp-medical-report-system' ),
			'use_featured_image'    => __( 'Use as featured image', 'wp-medical-report-system' ),
			'insert_into_item'      => __( 'Insert into Medical Report', 'wp-medical-report-system' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Medical Report', 'wp-medical-report-system' ),
			'items_list'            => __( 'Medical Reports list', 'wp-medical-report-system' ),
			'items_list_navigation' => __( 'Medical Reports list navigation', 'wp-medical-report-system' ),
			'filter_items_list'     => __( 'Filter Medical Reports list', 'wp-medical-report-system' ),
		);

		$rewrite = array(
			'slug'                  => 'exame',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);

		$capabilities = array(
			'edit_post'             => 'edit_exame',
			'read_post'             => 'read_exame',
			'delete_post'           => 'delete_exame',
			'edit_posts'            => 'edit_exames',
			'edit_others_posts'     => 'edit_others_exames',
			'publish_posts'         => 'publish_exames',
			'read_private_posts'    => 'read_private_exames',
		);

		$args = array(
			'label'                 => __( 'Medical Report', 'wp-medical-report-system' ),
			'description'           => __( 'Medical Report System', 'wp-medical-report-system' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'custom-fields' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-paperclip',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => 'exames',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'query_var'             => 'exame',
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
			'rest_base'             => 'exames',
			'rest_controller_class' => 'WP_REST_Exames_Controller',
		);

		register_post_type( 'medical_report', $args );

	}

	/**
	 * [register_tax_types description]
	 * @return [type] [description]
	 */
	public function register_tax_types() {

		$labels = array(
			'name'                       => _x( 'Types', 'Taxonomy General Name', 'wp-medical-report-system' ),
			'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'wp-medical-report-system' ),
			'menu_name'                  => __( 'Type', 'wp-medical-report-system' ),
			'all_items'                  => __( 'All Types', 'wp-medical-report-system' ),
			'parent_item'                => __( 'Parent Type', 'wp-medical-report-system' ),
			'parent_item_colon'          => __( 'Parent Type:', 'wp-medical-report-system' ),
			'new_item_name'              => __( 'New Type Name', 'wp-medical-report-system' ),
			'add_new_item'               => __( 'Add New Type', 'wp-medical-report-system' ),
			'edit_item'                  => __( 'Edit Type', 'wp-medical-report-system' ),
			'update_item'                => __( 'Update Type', 'wp-medical-report-system' ),
			'view_item'                  => __( 'View Type', 'wp-medical-report-system' ),
			'separate_items_with_commas' => __( 'Separate types with commas', 'wp-medical-report-system' ),
			'add_or_remove_items'        => __( 'Add or remove types', 'wp-medical-report-system' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'wp-medical-report-system' ),
			'popular_items'              => __( 'Popular Types', 'wp-medical-report-system' ),
			'search_items'               => __( 'Search Types', 'wp-medical-report-system' ),
			'not_found'                  => __( 'Not Found', 'wp-medical-report-system' ),
			'no_terms'                   => __( 'No types', 'wp-medical-report-system' ),
			'items_list'                 => __( 'Types list', 'wp-medical-report-system' ),
			'items_list_navigation'      => __( 'Types list navigation', 'wp-medical-report-system' ),
		);

		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
		);
		
		register_taxonomy( 'type', array( 'medical_report' ), $args );

	}

	//Cria uma nova sessão no perfil do usuário
	public function user_info_adicional( $user ) { ?>
	
		<h3>Informações Adicionais</h3>
		<table class="form-table">
			<tr>
				<th><label for="imagem">URL da Imagem</label></th>
				<td>
					<input type="text" name="imagem" id="imagem" value="<?php echo esc_attr( get_the_author_meta( 'imagem', $user->ID ) ); ?>" class="regular-text" /><br />
					<span class="description">URL da imagem que sairá no PDF. Será a Logo para Clientes, e a assinatura para Laudistas.</span>
				</td>
			</tr>
			<tr>
				<th><label for="empregador">Empregador</label></th>
				<td>
					<input type="text" name="empregador" id="empregador" value="<?php echo esc_attr( get_the_author_meta( 'empregador', $user->ID ) ); ?>" class="regular-text" /><br />
					<span class="description">Email do cliente que adicionou o técnico.</span>
				</td>
			</tr>
			<tr>
				<th><label for="bloqueio">Bloqueio</label></th>
				<td>
					<input type="text" name="bloqueio" id="bloqueio" value="<?php echo esc_attr( get_the_author_meta( 'bloqueio', $user->ID ) ); ?>" class="regular-text" /><br />
					<span class="description">Status do cliente.</span>
				</td>
			</tr>
		</table>
	<?php }

	//Salva os Campos Adicionais
	function save_user_info_adicional( $user_id ) {

		if ( !current_user_can( 'edit_user', $user_id ) )
			return false;

		update_usermeta( $user_id, 'imagem', $_POST['imagem'] );
		update_usermeta( $user_id, 'empregador', $_POST['empregador'] );
		update_usermeta( $user_id, 'bloqueio', $_POST['bloqueio'] );
	}

}
