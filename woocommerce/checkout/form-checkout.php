<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout mb-10"
    action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

    <?php if ( $checkout->get_checkout_fields() ) : ?>


    <div class="container mx-auto grid sm:grid-cols-3">
        <div class="sm:col-span-2 sm:pr-16">
            <h1 class="text-4xl text-brown mb-7">Checkout</h1>
            <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
            <div class="text-xl font-semibold tracking-widest mb-5">Contact Information</div>
            <div class="grid xs:grid-cols-2 gap-3 mb-8">
                <div>
                    <?php woocommerce_form_field( 'billing_first_name', array(
					'placeholder' => 'First Name',
					'required'    => true,
					'label'       => '',
					'type'        => 'text'
				)); ?>
                </div>
                <div>
                    <?php woocommerce_form_field( 'billing_last_name', array(
					'placeholder' => 'Last Name',
					'required'    => true,
					'label'       => '',
					'type'        => 'text'
				)); ?>
                </div>
                <div>
                    <?php woocommerce_form_field( 'billing_phone', array(
					'placeholder' => 'Phone number',
					'required'    => true,
					'label'       => '',
					'type'        => 'text'
				)); ?>
                </div>
                <div>
                    <?php woocommerce_form_field( 'billing_email', array(
					'placeholder' => 'E-mail',
					'required'    => true,
					'label'       => '',
					'type'        => 'text'
				)); ?>
                </div>
            </div>
            <div class="text-xl font-semibold tracking-widest mb-5">Delivery Method</div>
            <div class="grid xs:grid-cols-4 gap-3 mb-8">
                <div class="xs:col-span-4">
                    <div class="the-delivery">
                        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

                        <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

                        <?php wc_cart_totals_shipping_html(); ?>

                        <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

                        <?php endif; ?>
                    </div>
                </div>


                <div class="xs:col-span-2">
                    <?php woocommerce_form_field( 'billing_country', array( 'type' => 'country' ) ); ?>
                </div>
                <div class="xs:col-span-2">
                    <?php woocommerce_form_field( 'billing_address_1', array(
					'placeholder' => 'Address',
					'required'    => true,
					'label'       => '',
					'type'        => 'text'
				)); ?>
                </div>
                <div class="xs:col-span-2">
                    <?php woocommerce_form_field( 'billing_city', array(
					'placeholder' => 'City',
					'required'    => true,
					'label'       => '',
					'type'        => 'text'
				)); ?>
                </div>
                <div>
                    <?php woocommerce_form_field( 'billing_postcode', array(
					'placeholder' => 'ZIP code',
					'required'    => true,
					'label'       => '',
					'type'        => 'text'
				)); ?>
                </div>
                <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
            </div>

            <div class="text-xl font-semibold tracking-widest mb-5">Payment Method</div>
            <div>
                <?php custom_checkout_payment() ?>
            </div>
        </div>
        <div
            class="sm:pl-16 py-5 relative before:hidden sm:before:block before:absolute before:w-0.5 before:bg-accent/30 before:h-full before:top-0 before:left-0">
            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
            <div id="order_review" class="woocommerce-checkout-review-order">
                <div>
                    <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                </div>
                <div>
                    <?php custom_checkout_place_order() ?>
                </div>
            </div>
            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
        </div>
    </div>
    <?php endif; ?>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>