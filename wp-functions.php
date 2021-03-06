<?php

// Show Delivery Windows on Product Pages
add_action( 'woocommerce_after_add_to_cart_button', 'show_shipping_cart', 2 );
function show_shipping_cart() {

    $product_classes = wp_get_post_terms( get_the_ID(), 'product_shipping_class' );

    if ( $product_classes && ! is_wp_error ( $product_classes ) ){
        $single_class = array_shift( $product_classes ); ?>

        <p class="shipping_class_desc"><?php echo 'Delivery: '.$single_class->description; ?></p><?php
        }
}

// Show Delivery Windows on Product Pages (ALT)
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
