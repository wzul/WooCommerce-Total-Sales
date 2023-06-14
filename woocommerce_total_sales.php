<?php

/**
 * Plugin Name: WooCommerce Total Sales (WTD, MTD, YTD)
 * Description: Add total sales counter shortcode for WooCommerce.
 * Version: 1.0.0
 * Author: Wan Zulkarnain
 */

// add_shortcode('woocommerce_wtd_sales', 'woocommerce_wan_wtd_sales');
add_shortcode('woocommerce_mtd_sales', 'woocommerce_wan_mtd_sales');
add_shortcode('woocommerce_ytd_sales', 'woocommerce_wan_ytd_sales');
// add_shortcode('woocommerce_atd_sales', 'woocommerce_wan_atd_sales');

function woocommerce_wan_wtd_sales() {

  if ( !is_user_logged_in() ) {
    return wc_price( 0 );
  }

  $day = date('w');
  $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
  $week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));

  $user_id = get_current_user_id();

  $wtd_orders = wc_get_orders( 
    [
      'status' => array('wc-completed'),
      'date_completed' => $week_start . '...' . $week_end,
      'customer_id' => $user_id,
      'limit' => -1,
    ]
  );

  $wtd_total = 0;

  foreach( $wtd_orders as $order ) {
    $wtd_total+= round( $order->get_total() * 100);
  }

  return wc_price( $wtd_total / 100 );
}

function woocommerce_wan_mtd_sales() {

  if ( !is_user_logged_in() ) {
    return wc_price( 0 );
  }

  $user_id = get_current_user_id();

  $mtd_orders = wc_get_orders(
    [
      'status' => array('wc-completed'),
      'date_completed' => date('Y-m-01') . '...' . date('Y-m-t'),
      'customer_id' => $user_id,
      'limit' => -1,
    ] 
  );

  $mtd_total = 0;

  foreach( $mtd_orders as $order ) {
    $mtd_total+= round( $order->get_total() * 100);
  }

  return wc_price( $mtd_total / 100);
}

function woocommerce_wan_ytd_sales() {

  if ( !is_user_logged_in() ) {
    return wc_price( 0 );
  }

  $user_id = get_current_user_id();

  $ytd_orders = wc_get_orders(
    [
      'status' => array('wc-completed'),
      'date_completed' => date('Y-01-01') . '...' . date('Y-m-t'),
      'customer_id' => $user_id,
      'limit' => -1,
    ] 
  );

  $ytd_total = 0;

  foreach( $ytd_orders as $order ) {
    $ytd_total+= round( $order->get_total() * 100);
  }

  return wc_price( $ytd_total / 100);
}

function woocommerce_wan_atd_sales() {

  if ( !is_user_logged_in() ) {
    return wc_price( 0 );
  }

  $user_id = get_current_user_id();

  $atd_orders = wc_get_orders(
    [
      'status' => array('wc-completed'),
      'customer_id' => $user_id,
      'limit' => -1,
    ] 
  );

  $atd_total = 0;

  foreach( $atd_orders as $order ) {
    $atd_total+= round( $order->get_total() * 100);
  }

  return wc_price( $atd_total / 100);
}