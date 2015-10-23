	<?php /* Template Name: Register */ get_header(); ?>
	<?php get_template_part('helpers/map', 'include'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<form name="registerform" id="registerform" action="<?php echo get_site_url(); ?>/wp-login.php?action=register" method="post" novalidate="novalidate">
					<div class="row">
						<div class="col-md-12">
							<label>Account Type</label>
							<select id="accountType">
								<option value="contractor">Contractor</option>
								<option value="laborer">Laborer</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="user_login">Username</label>
							<input type="text" name="user_login" id="user_login" class="input" value="" size="20">
						</div>
						<div class="col-md-6">
							<label for="user_email">E-mail</label>
							<input type="email" name="user_email" id="user_email" class="input" value="" size="25">
						</div>
					</div>
					<div id="isLaborer" class="row">
						<div class="col-md-6">
							<label for="user_login">First Name</label>
							<input type="text" name="user_login" id="user_login" class="input" value="" size="20">
						</div>
						<div class="col-md-6">
							<label for="user_email">Last Name</label>
							<input type="email" name="user_email" id="user_email" class="input" value="" size="25">
						</div>
					</div>
					<input type="hidden" name="_acfnonce" value="86162b827b">
					<input type="hidden" name="_acfchanged" value="0">
					<div id="isContractor" class="row">	
						<div class="col-md-6">
							<label for="acf-field_560da6181c357">Business Name</label>
							<input type="text" id="acf-field_560da6181c357" class="" name="acf[field_560da6181c357]" value="" placeholder="">		
						</div>
						<div class="col-md-6">
							<label for="acf-field_560da6181c357">License Number</label>
							<input type="text" id="acf-field_560da6181c357" class="" name="acf[field_560da6181c357]" value="" placeholder="">
						</div>
					</div>
					<label for="acf-field_560da699502cf">Address</label>
					<input type="text" id="acf-field_560da699502cf" class="" name="acf[field_560da699502cf]" value="" placeholder="">		
					<div class="row">
						<div class="col-md-4">
							<label for="acf-field_560da81013400">City</label>
							<input type="text" id="acf-field_560da81013400" class="" name="acf[field_560da81013400]" value="" placeholder="">		
						</div>
						<div class="col-md-4">
							<label for="acf-field_560da820effa4">Postal Code</label>
							<input type="number" id="acf-field_560da820effa4" class="" min="" max="99999" step="any" name="acf[field_560da820effa4]" value="" placeholder="">		
						</div>
						<div class="col-md-4">
							<label for="acf-field_560da6a9502d0">State</label>
							<select id="acf-field_560da6a9502d0" class="" name="acf[field_560da6a9502d0]" data-ui="0" data-ajax="0" data-multiple="0" data-placeholder="Select" data-allow_null="0">
								<option value="CA">CA</option>
								<option value="AK">AK</option>
								<option value="AZ">AZ</option>
							</select>	
						</div>
					</div>	
					<label for="acf-field_560da83b90152">Phone Number</label>
					<input type="text" id="acf-field_560da83b90152" class="" name="acf[field_560da83b90152]" value="" placeholder="">
					<input type="hidden" name="redirect_to" value="">
					<p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Register"><span class="acf-spinner"></span></p>
				</form>
			</div>
			<div class="col-md-4">
				<h2>Free to sign up, and look for <span>paying work!</span></h2>
			</div>
		</div>
	</div>
	<?php get_footer(); ?>