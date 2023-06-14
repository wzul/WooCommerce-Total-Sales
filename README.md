# WooCommerce Total Sales Shortcode

This plugin will provide shortcode for total sales for Week To Date (WTD), Month To Date (MTD) and Year To Date (YTD).

## Installation

Upload this repository to your WordPress Dashboard --> Plugins --> Add New --> Upload

## Configuration

Place shortcode inside your page and it will display the total sales. Available shortcode is:

    - woocommerce_wtd_sales: for Week To Date sales amount
    - woocommerce_mtd_sales: for Month To Date sales amount
    - woocommerce_ytd_sales: for Year To Date sales amount
    - woocommerce_atd_sales: for All Time To Date sales amount

## Limits

To avoid significant performance issues, the plugin has configured to count only up to 200 orders (except 400 order for atd). However, it can be changed depending on your needs.