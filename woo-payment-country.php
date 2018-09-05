/**
 * @snippet       WooCommerce Disable Payment Gateway for a Specific Country
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=164
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.3.1
 */
 
function payment_gateway_disable_country( $available_gateways ) {
	global $woocommerce;
	if ( is_admin() ) return;
	if ( isset( $available_gateways['mollie_wc_gateway_ideal'] ) && $woocommerce->customer->get_billing_country() == 'BE' ) {
		unset( $available_gateways['mollie_wc_gateway_ideal'] );
	} elseif ( $woocommerce->customer->get_billing_country() == 'NL' ) {
		unset( $available_gateways['mollie_wc_gateway_belfius'] );
        unset( $available_gateways['mollie_wc_gateway_bancontact'] );
		unset( $available_gateways['mollie_wc_gateway_kbc'] );
	}
	return $available_gateways;
}
 
add_filter( 'woocommerce_available_payment_gateways', 'payment_gateway_disable_country' );
