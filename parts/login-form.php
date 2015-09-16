<div class="login-form">
	<h3>Returning User?</h3>
	<?php wp_login_form(); ?>
</div>
<div class="registration-form">
	<h3>New User?</h3>
	<form name="registerform" id="registerform" action="<?php echo get_site_url(); ?>/wp-login.php?action=register" method="post" novalidate="novalidate">
		<p>
			<label>Username</label>
			<input type="text" name="user_login" id="user_login" class="input" value="" size="20">
		</p>
		<p>
			<label>Email Address</label>
			<input type="email" name="user_email" id="user_email" class="input" value="" size="25">
		</p>
		<p id="reg_passmail">Registration confirmation will be e-mailed to you.</p>
		<input type="hidden" name="redirect_to" value="">
		<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Register">
	</form>
</div>