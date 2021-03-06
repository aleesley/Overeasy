<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<?php //if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

        <a class="cart-icon-link" href="<?php echo WC()->cart->get_cart_url(); ?>">
            <i class="icon-shopping-cart"></i>
            <span class="shop-items-number"><?php echo sprintf(_n('%d', WC()->cart->cart_contents_count, 'woocommerce'), WC()->cart->cart_contents_count);?></span>
        </a>
        <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
        <ul class="sub-menu">
            <li><span class="shop-menu-item__price"><?php echo WC()->cart->get_cart_total(); ?></span></li>
            <li><a href="<?php echo WC()->cart->get_cart_url(); ?>"><?php _e('View cart', 'rosa_txtd' ) ?></a></li>
            <li><a href="<?php echo WC()->cart->get_checkout_url()?>"><?php _e('Checkout', 'rosa_txtd' ) ?></a></li>
        </ul>

<?php //endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>