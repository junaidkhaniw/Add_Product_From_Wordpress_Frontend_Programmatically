<?php

// if (empty($pname)) {
//     $nameErr = 'Name is required';
// }
// if (empty($psku)) {
//     $skuErr = 'SKU is required';
// }
// if (empty($pprice)) {
//     $priceErr = 'Price is required';
// }
// if (empty($pweight)) {
//     $weightErr = 'Weight is required';
// }
// if (empty($pstock)) {
//     $stockErr = 'Stock is required';
// }
// if (empty($pregular_price)) {
//     $regularPriceErr = 'Regular Price is required';
// }
// if (empty($psale_price)) {
//     $salePriceErr = 'Sale Price is required';
// }
// if (empty($plength)) {
//     $lengthErr = 'Length is required';
// }
// if (empty($pwidth)) {
//     $widthErr = 'Width is required';
// }
// if (empty($pheight)) {
//     $heightErr = 'Height is required';
// }

// echo 'no';


if (empty($_POST['product_name']) ||
    empty($_POST['product_sku']) ||
    empty($_POST['product_price']) ||
    empty($_POST['product_weight']) ||
    empty($_POST['product_stock']) ||
    empty($_POST['product_regular_price']) ||
    empty($_POST['product_sale_price']) ||
    empty($_POST['product_length']) ||
    empty($_POST['product_width']) ||
    empty($_POST['product_height'])
    ) 
    {
        echo 'Please fill all required fields!';
}


?>