add_action( 'woocommerce_before_order_notes', 'add_account_field');
function add_account_field( $checkout ) {
	$current_user = wp_get_current_user();
	
	$saved_account_id = $current_user->account_id;
	
	woocommerce_form_field(
		'account_id',
		array(
			
			'type' => 'text',
			'class' => array( 'form-row-wide' ),
			'label' => 'Label Here',
			'placeholder' => 'Placeholder Here',
			'required' => true,
			'default' => $save_account_id
		
		),
		$checkout->get_value( 'account_id' )
	);
}

add_action( 'woocommerce_checkout_process', 'validate_account_field' );
function validate_account_field() {
	if( ! $_POST['account_id']) {
		wc_add_notice( 'This Field is Required', 'error');
	}
}

add_action( 'woocommerce_checkout_update_order_meta', 'save_account_field');

function save_account_field( $order_id) {
	if( $_POST['account_id'] ) {
		update_post_meta( $order_id, '_account_id', esc_attr( $_POST['account_id'] ) );
	}
}

add_action( 'woocommerce_admin_order_data_after_billing_address', 'show_admin_account_field_order');

function show_admin_account_field_order( $order ) {
	$order_id = $order->get_id();

	if( get_post_meta( $order_id, '_account_id', true) ) {
		echo '<p><strong>Label Here: ' . get_post_meta( $order_id, '_account_id', true ) . '</strong></p>';
	}
}

add_action('woocommerce_email_after_order_table', 'show_admin_account_field_emails', 20, 4 );

function show_admin_account_field_emails( $order, $sent_to_admin, $plain_text, $email ) {
	$order_id = $order->get_id();
	if( get_post_meta( $order_id, '_account_id', true) ) {
		echo '<p><strong>Label Here: ' . get_post_meta( $order_id, '_account_id', true ) . '</strong></p>';

	}
}
