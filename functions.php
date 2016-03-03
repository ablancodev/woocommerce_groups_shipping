add_filter( 'woocommerce_package_rates', 'eggemplo_woocommerce_package_rates', 10, 2 );
function eggemplo_woocommerce_package_rates( $rates, $package ) {

	// you can get this value from Groups->Groups table
	$group_id = 2;

	// get user first group
	$user_id = get_current_user_id();

	$exists = Groups_User_Group::read( $user_id, $group_id );
	if ( $exists ) {
			$free_shipping          = $rates['free_shipping'];
			$rates                  = array();
			$rates['free_shipping'] = $free_shipping;
	}
	return $rates;
}
