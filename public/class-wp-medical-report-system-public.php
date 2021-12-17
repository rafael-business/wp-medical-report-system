<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://rafael.business
 * @since      1.0.0
 *
 * @package    Wp_Medical_Report_System
 * @subpackage Wp_Medical_Report_System/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Medical_Report_System
 * @subpackage Wp_Medical_Report_System/public
 * @author     Rafael Business <contato@rafael.business>
 */
class Wp_Medical_Report_System_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-medical-report-system-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-medical-report-system-public.js', array( 'jquery' ), $this->version, false );

		wp_register_script( 'upfiles-ajax', esc_url( add_query_arg( array( 'upfiles_js' => 1 ), site_url() ) ) );
  		wp_enqueue_script( 'upfiles-ajax' );

	}

	public function actions_exame( $atts ) {

		$a = shortcode_atts( array(
			'id' => 0,
			'url_exame' => '',
		), $atts );

		$id = $a['id'];
		$url_exame = $a['url_exame'];

		?>
		<select class="action-exame" data-id="<?= $id ?>" data-url="<?= $url_exame ?>">
			<option></option>
			<option value="info"><?php _e( 'Abrir Informações', 'wp-medical-repost-system' ); ?></option>
			<option value="view"><?php _e( 'Visualizar Exame', 'wp-medical-repost-system' ); ?></option>
			<option value="hist"><?php _e( 'Histórico do Exame', 'wp-medical-repost-system' ); ?></option>
			<option value="edit"><?php _e( 'Editar', 'wp-medical-repost-system' ); ?></option>
			<option value="delete"><?php _e( 'Excluir', 'wp-medical-repost-system' ); ?></option>
		</select>
		<?php
	}

	public function add_medical_reports() {

		?>
		<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-1" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
		  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
		  <path d="M12 16v-8l-2 2" />
		  <circle cx="12" cy="12" r="9" />
		</svg>
		<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-2" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
		  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
		  <path d="M10 10a2 2 0 1 1 4 0c0 .591 -.417 1.318 -.816 1.858l-3.184 4.143l4 -.001" />
		  <circle cx="12" cy="12" r="9" />
		</svg>
		<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-3" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
		  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
		  <path d="M12 12a2 2 0 1 0 -2 -2" />
		  <path d="M10 14a2 2 0 1 0 2 -2" />
		  <circle cx="12" cy="12" r="9" />
		</svg>
		<form action="<?= get_permalink( get_page_by_path( 'add-exame' ) ) ?>" method="POST">
			<div class="form-group">
				<input type="text" id="search_type" placeholder="Buscar...">
				<div class="search_type">
					<?php
					$types = get_terms( array(
					    'taxonomy' => 'type',
					    'hide_empty' => false
					));

					foreach ( $types as $type ) {
					?>
					<dl>
						<dt>
							<label><input type="radio" name="type" value="<?= $type->term_id ?>" required><?= strtoupper($type->slug) . ' - ' . $type->name; ?></label>
						</dt>
						<dd>
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-infinity" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
							  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							  <path d="M9.828 9.172a4 4 0 1 0 0 5.656a10 10 0 0 0 2.172 -2.828a10 10 0 0 1 2.172 -2.828a4 4 0 1 1 0 5.656a10 10 0 0 1 -2.172 -2.828a10 10 0 0 0 -2.172 -2.828" />
							</svg>
						</dd>
					</dl>
					<?php
					}
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="publish_date"><?php _e( 'Exam Date', 'wp-medical-report-system' ); ?></label>
				<span class="required">*</span>
				<input type="datetime-local" id="publish_date" name="publish_date" required>
			</div>
			<div class="upload-form">
			    <div class ="form-group">
			        <label><?php _e( 'Files', 'wp-medical-report-system' ); ?></label><br />
			        <small>Somente se já foi realizado.</small>
			        <input type="file" name="files[]" accept="image/*,.pdf" class="files-data form-control" multiple /><br />
			        <small>Clique no botão abaixo para continuar.</small>
			    </div>
			    <div class="upload-response"></div>
			    <button class="button is-success is-fullwidth py-5 btn-upload">
					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
					  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
					  <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
					  <circle cx="12" cy="14" r="2" />
					  <polyline points="14 4 14 8 8 8 8 4" />
					</svg>
				</button>
			</div>
		</form>
		<?php
	}

	/**
	 * JS Vars
	 */
	public function js_vars() {

		if ( !isset( $_GET[ 'upfiles_js' ] ) ) return;

		$nonce = wp_create_nonce('upfiles_js_nonce');

		$variaveis_javascript = array(
			'upfiles_js_nonce' => $nonce, 
			'xhr_url'          => admin_url('admin-ajax.php')
		);

		$new_array = array();
		foreach( $variaveis_javascript as $var => $value ) $new_array[] = esc_js( $var ) . " : '" . esc_js( $value ) . "'";

		header("Content-type: application/x-javascript");
		printf('var %s = {%s};', 'upfiles_js', implode( ',', $new_array ) );
		exit;
	}

	/**
	 * [upload_files description]
	 * @return [type] [description]
	 */
	public function upload_files(){
   
	    $parent_post_id = isset( $_POST['post_id'] ) ? $_POST['post_id'] : 0;
	    $valid_formats = array("jpg", "png", "jpeg", "pdf");
	    $max_file_size = 1024 * 500;
	    $max_image_upload = 10;
	    $wp_upload_dir = wp_upload_dir();
	    $path = $wp_upload_dir['path'] . '/';
	    $count = 0;

	    if( $_SERVER['REQUEST_METHOD'] == "POST" ){
	       
	        if ( count( $_FILES['files']['name'] ) > $max_image_upload ) {

	            $upload_message[] = "Sorry you can only upload " . $max_image_upload . " images for each Ad";
	        } else {
	           
	            foreach ( $_FILES['files']['name'] as $f => $name ) {

	                $extension = pathinfo( $name, PATHINFO_EXTENSION );
	                $new_filename = $this->td_generate_random_code( 20 )  . '.' . $extension;

	                if ( $_FILES['files']['error'][$f] == 1 ) {

                        $upload_message[] = $name . __( ' is too large!', 'wp-medical-report-system' );
                        continue;
                    }
	               
	                if ( $_FILES['files']['error'][$f] == 4 ) {

	                    continue;
	                }
	               
	                if ( $_FILES['files']['error'][$f] == 0 ) {

	                    if ( $_FILES['files']['size'][$f] > $max_file_size ) {

	                        $upload_message[] = "$name is too large!";
	                        continue;
	                    } elseif( ! in_array( strtolower( $extension ), $valid_formats ) ){

	                        $upload_message[] = "$name is not a valid format";
	                        continue;
	                    } else{

	                        if( move_uploaded_file( $_FILES["files"]["tmp_name"][$f], $path.$new_filename ) ) {
	                           
	                            $count++;

	                            $f_name[$count] = pathinfo( $name )['filename'];

	                            $filename = $path.$new_filename;
	                            $filetype = wp_check_filetype( basename( $filename ), null );
	                            $wp_upload_dir = wp_upload_dir();
	                            $attachment = array(
	                                'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ),
	                                'post_mime_type' => $filetype['type'],
	                                'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
	                                'post_content'   => '',
	                                'post_status'    => 'inherit'
	                            );

	                            $attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
	                            $f_attach_id[$count] = $attach_id;

	                            require_once( ABSPATH . 'wp-admin/includes/image.php' );
	                           
	                            $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
	                            wp_update_attachment_metadata( $attach_id, $attach_data );
	                           
	                        }
	                    }
	                }
	            }
	        }
	    }
	    
	    if ( isset( $upload_message ) ) {

	    	?>
	        <div class="tags name-list">
	        	<?php
		        foreach ( $upload_message as $msg ) {    

		            printf( __('<span class="tag is-danger">%s</span>', 'wp-medical-report-system'), $msg );
		        }
		        ?>
			</div>
	        <?php
	    }
	   
	    if ( $count != 0 ) {

	        printf( __('<span class="tag is-success">%d files added successfully!</span>', 'wp-medical-report-system'), $count );
	        ?>
	        <div class="tags has-addons name-list">
	        	<?php
	        	for ( $i = 1;  $i <= $count;  $i++ ) { 
		        	
		        	printf( '<div><span class="tag is-success is-light">%s</span><a class="tag is-delete is-danger"></a></div>', $f_name[$i] );
		        	?>
		        	<input type="hidden" name="pacientes[<?= $i ?>][nome]" value="<?= $f_name[$i] ?>">
		        	<input type="hidden" name="pacientes[<?= $i ?>][arquivo]" value="<?= $f_attach_id[$i] ?>">
		        	<?php
		        }
	        	?>
			</div>
	        <?php
	    }
	   
	    exit();
	}

	// Random code generator used for file names.
	public function td_generate_random_code($length=10) {
	 
	   $string = '';
	   $characters = "23456789ABCDEFHJKLMNPRTVWXYZabcdefghijklmnopqrstuvwxyz";
	 
	   for ($p = 0; $p < $length; $p++) {
	       $string .= $characters[mt_rand(0, strlen($characters)-1)];
	   }
	 
	   return $string;
	 
	}

}
