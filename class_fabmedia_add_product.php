<?phP

class AddProduct_class{

    public function __construct(){

        add_shortcode( 'img_uploader', array($this, 'addProduct_callback') );
        add_action( 'wp_enqueue_scripts', array($this, 'load_assets') );

    }

    public function load_assets() {
        wp_enqueue_style('bootstrap', plugins_url( 'assets/css/bootstrap.min.css', __FILE__ ), false, '1.0.0' );
        wp_enqueue_style('fontawesome', plugins_url( 'assets/css/fontawesome.min.css', __FILE__ ), false, '1.0.0' );
        wp_enqueue_style('style', plugins_url( 'assets/css/style.css', __FILE__ ), false, '1.0.0' );
        wp_enqueue_script('fontawesome', plugins_url( '/assets/js/fontawesome.min.js', __FILE__ ), array('jquery'), '1.0.0', 100);
        wp_enqueue_script('script', plugins_url( '/assets/js/script.js', __FILE__ ), array('jquery'), '1.0.0', 100);
    }
    
    public function addProduct_callback() {

        // $nameErr = $skuErr = $priceErr = '';
   
        if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['submit'])) {
        
            $pname          = $_POST['product_name'];
            $psku           = $_POST['product_sku'];
            $pprice         = $_POST['product_price'];
            $pweight        = $_POST['product_weight'];
            $pstock         = $_POST['product_stock'];
            $pregular_price = $_POST['product_regular_price'];
            $psale_price    = $_POST['product_sale_price'];
            $plength        = $_POST['product_length']; 
            $pwidth         = $_POST['product_width'];
            $pheight        = $_POST['product_height'];

            // if ($_POST) {
            //     require_once( plugin_dir_path( __FILE__ ) . 'validation.php' );
            // }
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
            else{
    
                $product=array( 
        
                    'post_title'    => $pname,
                    'post_status'   => 'publish',
                    'post_type'     => 'product',
                );
        
                $post_id = wp_insert_post( $product );
                wp_set_object_terms( $post_id, 'simple', 'product_type' );

                require plugin_dir_path( __FILE__ ) . 'images_upload_function.php';
                $pimg = images_uploader_callback($post_id);

                require plugin_dir_path( __FILE__ ) . 'feature_image_function.php';
                $feature_img = Generate_Featured_Image($post_id);

                add_post_meta( $post_id, '_thumbnail_id', $feature_img );
                add_post_meta( $post_id, '_price', $pprice );
                add_post_meta( $post_id, '_product_image_gallery', implode(',', $pimg) );
                add_post_meta( $post_id, '_sku', $psku );
                add_post_meta( $post_id, '_stock', $pstock );
                add_post_meta( $post_id, '_weight', $pweight );
                add_post_meta( $post_id, '_regular_price', $pregular_price );
                add_post_meta( $post_id, '_sale_price', $psale_price );
                add_post_meta( $post_id, '_length', $plength );
                add_post_meta( $post_id, '_width', $pwidth );
                add_post_meta( $post_id, '_height', $pheight );
            }

            

        }
        // $redirect_url = get_permalink();
        //     wp_redirect( $redirect_url );
        //         exit;
        // echo get_permalink();
        // echo plugin_dir_url();
        ?>
            <form id="form" class="row g-3 form" action="<?php echo get_permalink(); ?>" method="post" enctype="multipart/form-data">

                <div class="col-md-6">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input id="name" type="text" name="product_name" class="form-control" id="product_name">
                    <span class="error"> <?php// echo $nameErr; ?></span>
                </div>
                <div class="col-md-3">
                    <label for="product_sku" class="form-label">Product SKU</label>
                    <input id="sku" type="text" name="product_sku" class="form-control" id="product_sku">
                    <span class="error"> <?php// echo $skuErr; ?></span>
                </div>
                <div class="col-md-3">
                    <label for="product_price" class="form-label">Product Price</label>
                    <input id="price" type="text" name="product_price" class="form-control" id="product_price">
                    <span class="error"> <?php// echo $priceErr; ?></span>
                </div>

                <div class="col-md-3">
                    <label for="product_weight" class="form-label">Product Weight</label>
                    <input id="weight" type="text" name="product_weight" class="form-control" id="product_weight">
                    <span class="error"> <?php// echo $weightErr; ?></span>
                </div>
                <div class="col-md-3">
                    <label for="product_stock" class="form-label">Product Stock</label>
                    <input type="text" name="product_stock" class="form-control" id="product_stock">
                    <span class="error"> <?php// echo $stockErr; ?></span>
                </div>
                <div class="col-md-3">
                    <label for="product_regular_price" class="form-label">Product Regular Price</label>
                    <input type="text" name="product_regular_price" class="form-control" id="product_regular_price">
                    <span class="error"> <?php// echo $regularPriceErr; ?></span>
                </div>
                <div class="col-md-3">
                    <label for="product_sale_price" class="form-label">Product Sale Price</label>
                    <input type="text" name="product_sale_price" class="form-control" id="product_sale_price">
                    <span class="error"> <?php// echo $salePriceErr; ?></span>
                </div>

                <div class="col-md-4">
                    <label for="product_length" class="form-label">Product Length</label>
                    <input type="text" name="product_length" class="form-control" id="product_length">
                    <span class="error"> <?php// echo $lengthErr; ?></span>
                </div>
                <div class="col-md-4">
                    <label for="product_width" class="form-label">Product Width</label>
                    <input type="text" name="product_width" class="form-control" id="product_width">
                    <span class="error"> <?php// echo $widthErr; ?></span>
                </div>
                <div class="col-md-4">
                    <label for="product_height" class="form-label">Product Height</label>
                    <input type="text" name="product_height" class="form-control" id="product_height">
                    <span class="error"> <?php// echo $heightErr; ?></span>
                </div>

                <div class="col-md-6">
                    <label for="product_feature_image" class="form-label">Product Feature Image</label>
                    <input type="file" name="upload_file" class="form-control" id="product_feature_image" size="50">
                    <?php wp_nonce_field( 'upload_file', 'my_feature_image_upload_nonce' ); ?>
                </div>
                <div class="col-md-6">
                    <label for="product_gallary" class="form-label">Product Gallary</label>
                    <input type="file" name="upload_attachment[]" class="form-control" id="product_gallary" size="50" multiple="multiple">
                    <?php wp_nonce_field( 'upload_attachment', 'my_image_upload_nonce' ); ?>
                </div>

                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        <?php

    }

    

}
