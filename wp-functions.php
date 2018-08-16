<?php

// Show Delivery Windows on Product Pages
function show_shipping_on_product_page() {
    $product = wc_get_product();

    $shipping_class = $product->get_shipping_class();

    switch ( $shipping_class ) {
        default:
			echo '<div class="woocommerce-info">Delivery: 1-2 Weeks</div>';
            break;
        
        case 'vendor-1':
            echo '<div class="woocommerce-info">Delivery: 4-5 Weeks</div>';
            break;

        case 'vendor-2':
            echo '<div class="woocommerce-info">Delivery: 3-5 Weeks</div>';
            break;

        case 'vendor-3': // Enter shipping class slug
            echo '<div class="woocommerce-info">Delivery: 5-10 Weeks</div>'; // Edit "Delivery: xxx"
            break;
    
    }
}
add_action( 'woocommerce_after_add_to_cart_button', 'show_shipping_on_product_page', 20 );

// Show Delivery Notice on Checkout Page

add_action( 'woocommerce_review_order_after_submit', 'message_below_checkout_button' );
 
function message_below_checkout_button() {
    echo '<p><small>When ordering multiple items, it\'s possible they will ship separately</small></p>';
}
?>
