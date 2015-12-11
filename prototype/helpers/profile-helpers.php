<?php

function get_user_role() {
	global $current_user;

	$user_roles = $current_user->roles;
	$user_role = array_shift($user_roles);

	return $user_role;
}

function get_profile_image() {
	$userID = 'user_'.get_current_user_id();
	$image = get_field('profile_image', $userID );
	return $image;
}

function get_profile_description() {
	$userID = 'user_'.get_current_user_id();
	$description = get_field('description', $userID );
	return $description;
}

function get_profile_specialization($specialization) {
	$userID = 'user_'.get_current_user_id();
	$specialization = get_field($specialization, $userID);
	return $specialization;
}

function get_profile_specializations() {

	$specializations = array();
	$specializations['Drywall'] = get_profile_specialization('drywall');
	$specializations['Framing'] = get_profile_specialization('framing');
	$specializations['Plumbing'] = get_profile_specialization('plumbing');
	$specializations['Tile'] = get_profile_specialization('tile');
	$specializations['Flooring'] = get_profile_specialization('flooring');
	$specializations['Cabinetry'] = get_profile_specialization('cabinetry');
	$specializations['Electrical'] = get_profile_specialization('electrical');
	$specializations['Carpentry'] = get_profile_specialization('carpentry');
	$specializations['Roofing'] = get_profile_specialization('roofing');
	$specializations['Siding'] = get_profile_specialization('siding');
	$specializations['Stucco'] = get_profile_specialization('stucco');
	$specializations['Masonry'] = get_profile_specialization('masonry');
	$specializations['Iron_Work'] = get_profile_specialization('iron_work');
	$specializations['Landscaping'] = get_profile_specialization('landscaping');
	$specializations['Drafting'] = get_profile_specialization('drafting');
	$specializations['Architecture'] = get_profile_specialization('architecture');
	$specializations['Concrete'] = get_profile_specialization('concrete');
	$specializations['Insulation'] = get_profile_specialization('insulation');
	$specializations['Excavation'] = get_profile_specialization('excavation');
	$specializations['Windows_&_Doors'] = get_profile_specialization('windows_&_doors');
	$specializations['Pools'] = get_profile_specialization('pools');
	$specializations['Lighting'] = get_profile_specialization('lighting');
	$specializations['Scaffolding'] = get_profile_specialization('scaffolding');
	$specializations['Demolition'] = get_profile_specialization('demolition');
	$specializations['General_Maintinence'] = get_profile_specialization('general_maintinence');

	return $specializations;
}

?>