<?php

function get_total_jobcount() {
	$count_posts = wp_count_posts('jobs');
	$published_posts = $count_posts->publish;

	return $published_posts;
}

function get_job_start() {
	$date = get_field('job_start_date');
	return $date;
}

function get_job_end() {
	$date = get_field('job_end_date');
	return $date;
}

function get_job_price() {
	$rate = '$'.get_field('hourly_rate').' / hr';
	return $rate;
}

function get_job_specializations() {
	$specializations = array();

	$specializations['Drywall'] = get_field('drywall');
	$specializations['Framing'] = get_field('framing');
	$specializations['Plumbing'] = get_field('plumbing');
	$specializations['Tile'] = get_field('tile');
	$specializations['Flooring'] = get_field('flooring');
	$specializations['Cabinetry'] = get_field('cabinetry');
	$specializations['Electrical'] = get_field('electrical');
	$specializations['Carpentry'] = get_field('carpentry');
	$specializations['Roofing'] = get_field('roofing');
	$specializations['Siding'] = get_field('siding');
	$specializations['Stucco'] = get_field('stucco');
	$specializations['Masonry'] = get_field('masonry');
	$specializations['Iron_Work'] = get_field('iron_work');
	$specializations['Landscaping'] = get_field('landscaping');
	$specializations['Drafting'] = get_field('drafting');
	$specializations['Architecture'] = get_field('architecture');
	$specializations['Concrete'] = get_field('concrete');
	$specializations['Insulation'] = get_field('insulation');
	$specializations['Excavation'] = get_field('excavation');
	$specializations['Windows_&_Doors'] = get_field('windows_&_doors');
	$specializations['Pools'] = get_field('pools');
	$specializations['Lighting'] = get_field('lighting');
	$specializations['Scaffolding'] = get_field('scaffolding');
	$specializations['Demolition'] = get_field('demolition');
	$specializations['General_Maintinence'] = get_field('general_maintinence');

	//Extend this Method with the new specializations

	return $specializations;
}

function check_specializations() {
	$jobSpecializations = get_job_specializations();
	$profileSpecializations = get_profile_specializations();

	$trueJobSpecializations = array();

	foreach($jobSpecializations as $jobKey => $job) {
		if ($job == 1) {
			$trueJobSpecializations[$jobKey] = $job;
		}
	}

	$trueProfileSpecializations = array();

	foreach($profileSpecializations as $profileKey => $profileSpecialization) {
		if ($profileSpecialization == 1) {
			$trueProfileSpecializations[$profileKey] = $profileSpecialization;
		}
	}

	if (count(array_diff_assoc($trueJobSpecializations, $trueProfileSpecializations)) === 0) {
		return true;
	}
	else {
		return false;
	}

}

?>