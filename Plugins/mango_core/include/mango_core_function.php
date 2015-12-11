<?php 
if( !function_exists( 'mango_loginform' ) ) {
    function mango_loginform() {
        $args = array(
            'echo' => true,
			  'form_id' => 'form-login',
            'label_username' => __( 'username', 'mango' ),
            'label_password' => __( 'password', 'mango' ),         
            'label_log_in' => __( 'Log Now', 'mango' ),
            'id_username' => 'user_login',
            'id_password' => 'user_pass',
            'id_submit' => 'wp-submit',
			 'value_username' => '',
            'redirect' => $_SERVER[ 'REQUEST_URI' ],
        );

		$form = '<form name="' . $args[ 'form_id' ] . '" id="' . $args[ 'form_id' ] . '" action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post" class="post_form m_b_no_space v_form shopping_cart">';

		$form .= '<div class="form-group">
         <label for="' . esc_attr( $args[ 'id_username' ] ) . '" class="input-desc">' . esc_html( $args[ 'label_username' ] ) . '</label>
		<input type="text" class="form-control" id="' . esc_attr( $args[ 'id_username' ] ) . '" name="log"  value="' . esc_attr( $args[ 'value_username' ] ) . '" placeholder="Enter email address" required>
        </div><!-- End .from-group -->';

		$form .= '<div class="form-group">
         <label for="'.esc_attr($args['id_password']).'" class="input-desc">'.esc_html( $args['label_password'] ).'</label>
         <input type="password" class="form-control" id="'.esc_attr( $args[ 'id_password' ] ).'" value=""  name="pwd" placeholder="Enter password" required>
        </div><!-- End .from-group -->';				
													
         $form .= '<div class="xss-margin"></div><!-- space -->
		 <div class="form-group xs-margin">
		 <input type="submit"  class="btn btn-custom2" id="'.esc_attr($args['id_submit']).'" value="'. esc_attr( $args[ 'label_log_in' ] ).'">
		 <input type="hidden" name="redirect_to" value="my-account" />
         </div><!-- End .from-group -->';						
           $form .= ' </form>';

        return $form;
    }	
}


	if( ! function_exists('mango_registration_form')){
	function mango_registration_form( $username='', $password='', $email='', $website='', $first_name='', $last_name='', $nickname='', $bio='' ) {

    echo '<div class="row">
		<form action="' . $_SERVER['REQUEST_URI'] . '" method="post" class="post_form v_form form-horizontal">
		<div class="col-md-6">
	    <label for="username" class="input-desc">'.__("Username",'mango').' <strong>*</strong></label>
	    <input type="text"  class="form-control" name="username" value="' . ( isset( $_POST['username'] ) ? $username : null ) . '">
		</div>

	<div class="col-md-6">
	   <label for="password" class="input-desc">'.__("Password",'mango').' <strong>*</strong></label>
	   <input type="password"  class="form-control" name="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
	</div>
	
	<div class="col-md-6">
	<label for="email" class="input-desc">'.__("Email",'mango').' <strong>*</strong></label>
	  <input type="text" class="form-control" name="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '">
	</div>
	<div class="col-md-6">
    <label for="website" class="input-desc">'.__("Website",'mango').'</label>
    <input type="text" class="form-control" name="website" value="' . ( isset( $_POST['website']) ? $website : null ) . '">
	</div>

	<div class="col-md-6">
    <label for="firstname" class="input-desc">'.__("First Name",'mango').'</label>
    <input type="text"  class="form-control" name="fname" value="' . ( isset( $_POST['fname']) ? $first_name : null ) . '">
	</div>

	<div class="col-md-6">
    <label for="website" class="input-desc">'.__("Last Name",'mango').'</label>
    <input type="text" class="form-control" name="lname" value="' . ( isset( $_POST['lname']) ? $last_name : null ) . '">
	</div>
	<div class="col-md-6">
	<label for="bio" class="input-desc">'.__("About / Bio",'mango').'</label>
    <textarea name="bio" class="form-control">' . ( isset( $_POST['bio']) ? $bio : null ) . '</textarea>
	</div>

   <div class="col-md-6">
   <label for="nickname" class="input-desc">'.__("Nickname",'mango').'</label>
   <input type="text" class="form-control" name="nickname" value="' . ( isset( $_POST['nickname']) ? $nickname : null ) . '">
	</div>
		
	<div class="col-md-12">
	<button type="submit" name="submit" class="btn btn-custom" value="'.__("Register",'mango').'">'.__("Register",'mango').'</button>
	</div>
	</form>
	</div>
    ';
	}
 }

if( ! function_exists('mango_registration_validation')){
	function mango_registration_validation($username, $password, $email){
	 if(isset($_POST['submit']) && $_POST['submit']){
	  global $reg_errors;
	  $reg_errors = new WP_Error;

	if ( empty( $username ) || empty( $password ) || empty( $email ) ) {
	  $reg_errors->add('field', __('Required form field is missing (Username, Password or Email)','mango'));
	}

	if ( 4 > strlen( $username ) ) {
	  $reg_errors->add( 'username_length', __('Username too short. At least 4 characters is required','mango') );
	}

	if ( username_exists( $username ) )
	 $reg_errors->add('user_name', __('Sorry, that username already exists!','mango'));
		if ( ! validate_username( $username ) ) {
			$reg_errors->add( 'username_invalid', __('Sorry, the username you entered is not valid','mango') );
		}

		if ( 5 > strlen( $password ) ) {
			$reg_errors->add( 'password', __('Password length must be greater than 5','mango') );
			}

		if ( !is_email( $email ) ) {
			$reg_errors->add( 'email_invalid', __('Email is not valid' ,'mango'));
		}

		if ( email_exists( $email ) ) {
			$reg_errors->add( 'email', __('Email Already in use','mango') );
		}

		if ( ! empty( $website ) ) {
			if ( ! filter_var( $website, FILTER_VALIDATE_URL ) ) {
			$reg_errors->add( 'website', __('Website is not a valid URL','mango') );
			}
		}

		if ( is_wp_error( $reg_errors ) ) {
			foreach ( $reg_errors->get_error_messages() as $error ) {
				echo '<div class="alert v_alert_box alert-error alert-dismissable">';
				echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&#10006;</button>';
				echo '<strong>'.__("ERROR",'mango').'</strong>: ';
				echo $error . '<br/>';
				echo '</div>';    
				}
			echo '<br />';
			}
		}
	}
}

if( ! function_exists('mango_complete_registration')){
function mango_complete_registration() {
    global $reg_errors, $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
        'user_login'    =>   $username,
        'user_email'    =>   $email,
        'user_pass'     =>   $password,
        'user_url'      =>   $website,
        'first_name'    =>   $first_name,
        'last_name'     =>   $last_name,
        'nickname'      =>   $nickname,
        'description'   =>   $bio,
        );
        $user = wp_insert_user( $userdata );
        echo '<div class="alert v_alert_box alert-success alert-dismissable">';
			echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&#10006;</button>';
			echo __('Registration complete.','mango').' '.__("Go to",'mango').' <a href="' . get_site_url() . '/wp-login.php">'.__("login page",'mango').'</a>.';
		echo '</div><br />'; 
		$_POST = '';
		}
	}
}

if( ! function_exists('mango_registration_function')){
function mango_registration_function() {
    if ( isset($_POST['submit'] ) ) {
     mango_registration_validation(
       $_POST['username'],
       $_POST['password'],
       $_POST['email'],
       $_POST['website'],
       $_POST['fname'],
       $_POST['lname'],
       $_POST['nickname'],
       $_POST['bio']
       );
        // sanitize user form input
       global $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio;
       $username   =   sanitize_user( $_POST['username'] );
       $password   =   esc_attr( $_POST['password'] );
       $email      =   sanitize_email( $_POST['email'] );
       $website    =   esc_url( $_POST['website'] );
       $first_name =   sanitize_text_field( $_POST['fname'] );
       $last_name  =   sanitize_text_field( $_POST['lname'] );
       $nickname   =   sanitize_text_field( $_POST['nickname'] );
       $bio        =   esc_textarea( $_POST['bio'] );

       mango_complete_registration(
        $username,
        $password,
        $email,
        $website,
        $first_name,
        $last_name,
        $nickname,
        $bio
        );
    }

    mango_registration_form(
      isset($_POST['username']) ? $username : '',
      isset($_POST['password']) ? $password : '',
      isset($_POST['email']) ? $email : '',
      isset($_POST['website']) ? $website : '',
      isset($_POST['first_name']) ? $first_name : '',
      isset($_POST['last_name']) ? $last_name : '',
      isset($_POST['nickname']) ? $nickname : '',
      isset($_POST['bio']) ? $bio : ''
      );
	}
 }

// Register a new shortcode: [mango_user_registeration_form]
add_shortcode( 'mango_user_registeration_form', 'mango_user_registeration_form' );
function mango_user_registeration_form() {
    ob_start();
    mango_registration_function();
    return ob_get_clean();
}

function mango_woocomerce_bestsellers() {
    global $wpdb;
    $prefix = $wpdb->prefix;
    $p = $prefix . 'posts';
    $pm = $prefix . 'postmeta';
    $results = $wpdb->get_results( "
			SELECT DISTINCT p.ID, pm.meta_value FROM " . $p . " p, " . $pm . " pm
			WHERE pm.meta_key = 'total_sales'
			AND p.post_status = 'publish'
			AND p.post_type = 'product'
			AND p.ID = pm.post_id
			AND pm.meta_value != 0
			ORDER BY meta_value DESC
		" );
    $ids = array();
    foreach( $results as $key ) {
        $ids[ ] = $key->ID;
    }
    return $ids;
}
?>