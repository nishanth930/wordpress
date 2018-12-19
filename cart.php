<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */



defined( 'ABSPATH' ) || exit;


do_action( 'woocommerce_before_cart' ); ?>


<h1>nishanth</h1>
<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>
    
	<table style="width:150%" class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr>
			<th class="test">nishanth</th> 
				<th class="product-remove">&nbsp;</th>
				<th class="product-packagetype"><?php esc_html_e( 'Package Type', 'woocommerce' ); ?></th>
				<th  ><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
                <th class="product-length"><?php esc_html_e( 'Lenght', 'woocommerce' ); ?></th>
                <th class="product-width"><?php esc_html_e( 'Width', 'woocommerce' ); ?></th>
                <th class="product-height"><?php esc_html_e( 'Height', 'woocommerce' ); ?></th>
				<th class="product-tvw"><?php esc_html_e( 'Total Volumetirc Weigth', 'woocommerce' ); ?></th>
				<th class="product-subtotal"><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
				
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
					
<td><?php echo $cart_item['item_length']?> </td>
				
						<td class="product-remove">
							<?php
								// @codingStandardsIgnoreLine
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									__( 'Remove this item', 'woocommerce' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>
						</td>
                    
						<td  data-title="<?php esc_attr_e( 'Package Type', 'woocommerce' ); ?>">

						<select>
						<option value="select">Select a Package Type</option>
                        <option value="bags">Bags</option>
  						<option value="bales">Bales</option>
  						<option value="boxes">Boxes</option>
  						<option value="pallet">Pallets</option>	
						</select>
						</td>
						
						
						<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
						<?php
						if ( $_product->is_sold_individually() ) {
							$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
						} else {
							$product_quantity = woocommerce_quantity_input( array(
								'input_name'   => "cart[{$cart_item_key}][qty]",
								'input_value'  => $cart_item['quantity'],
								'max_value'    => $_product->get_max_purchase_quantity(),
								'min_value'    => '0',
								'product_name' => $_product->get_name(),
							), $_product, false );
						}

						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
						?>
						</td>
						<td>
						<input
							type="number"
							id="<?php echo esc_attr( uniqid( 'item_length_' )); ?>"
							class="input-text item_length text"
							min="<?php echo esc_attr( $min_value ); ?>"
							max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
							name="<?php echo esc_attr( 'item_length' ); ?>"
							value="<?php echo esc_attr($cart_item['item_length'] ); ?>"
							title="<?php echo esc_attr_x( 'item_length', 'Product quantity input tooltip', 'woocommerce' ); ?>"
							size="4"
							pattern="<?php echo esc_attr( $pattern ); ?>"
							inputmode="<?php echo esc_attr( 'numeric' ); ?>"
							/>
						
						</td>
						<td>
						<input name="item_width" type="text" class="w3-input w3-border" style="width:50%" value="<?php echo($n2); ?>">
						</td>
						<td>
						<input name="item_height" type="text" class="w3-input w3-border" style="width:50%" value="<?php echo($n3); ?>">
						</td>


                        <td>
						<input Name="T4" type="text" class="w3-input w3-border" style="width:50%" value="<?php echo($r); ?>">
						</td>


						<td  >
						
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						</td>
					</tr>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<tr>
				<td colspan="6" class="actions">

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon">
							<label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>

					<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</td>
				
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<div class="cart-collaterals">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>


