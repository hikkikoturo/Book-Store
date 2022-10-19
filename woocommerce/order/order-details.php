<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 30.0.0
 * Theme 	Book Junky
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $order = wc_get_order( $order_id ) ) {
	return;
}
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
?>

<section class="woocommerce-order-details">

	<h2 class="woocommerce-order-details__title"><?php esc_html_e( 'Order details', 'book-junky' ); ?></h2>

	<table class="woocommerce-table woocommerce-table--order-details order_details">

		<thead>
			<tr>
				<th class="woocommerce-table__product-name product-name"><?php esc_html_e( 'Product', 'book-junky' ); ?></th>
				<th class="woocommerce-table__product-table product-total"><?php esc_html_e( 'Total', 'book-junky' ); ?></th>
			</tr>
		</thead>

		<tbody>
			<?php
				foreach ( $order->get_items() as $item_id => $item ) {
					$product = apply_filters( 'woocommerce_order_item_product', $item->get_product(), $item );

					wc_get_template( 'order/order-details-item.php', array(
						'order'			     => $order,
						'item_id'		     => $item_id,
						'item'			     => $item,
						'show_purchase_note' => $show_purchase_note,
						'purchase_note'	     => $product ? $product->get_purchase_note() : '',
						'product'	         => $product,
					) );
				}
			?>
			<?php do_action( 'woocommerce_order_items_table', $order ); ?>
		</tbody>

		<tfoot>
			<?php
				foreach ( $order->get_order_item_totals() as $key => $total ) {
					?>
					<tr>
						<th scope="row"><?php echo ''.$total['label']; ?></th>
						<td><?php echo ''.$total['value']; ?></td>
					</tr>
					<?php
				}
			?>
		</tfoot>

	</table>

	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>

</section>
