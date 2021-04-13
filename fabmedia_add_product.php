<?php

/**
* @link 
* @since 1.0.0
* @package Frontend Add Product to WooCommerce

* Plugin Name:  AddProductFromFrontendProgrammatically
* Plugin URI:   https://fabmedia.io
* Description:  Adding products programmatically to WooCommerce
* Name:         Store Vendor Total
* Version:      1.0.0
* Author:       Junaid Khan 
* Author URI:   https://fabmedia.io
* License:      GPL-2.0+
* License URI:  http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain:  fabmedia_plugin
*/


if(!defined('ABSPATH')){
    die('-1');
}

function AddProduct(){

    require plugin_dir_path( __FILE__ ) . 'class_fabmedia_add_product.php';
    $run = new AddProduct_class;

}

AddProduct();