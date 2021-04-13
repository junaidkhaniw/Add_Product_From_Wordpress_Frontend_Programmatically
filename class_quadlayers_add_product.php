<?phP

class Image_uploader_class{

    public function __construct(){

        add_shortcode( 'img_uploader', array($this, 'img_uploader_callback') );
        add_action('wp_enqueue_scripts', array($this, 'load_assets') );

    }

    public function load_assets() {
        wp_enqueue_style('bootstrap', plugins_url( 'assets/css/bootstrap.min.css', __FILE__ ), false, '1.0.0' );
        wp_enqueue_style('style', plugins_url( 'assets/css/style.css', __FILE__ ), false, '1.0.0' );
        wp_enqueue_script('script', plugins_url( '/assets/js/script.js', __FILE__ ), array('jquery'), '1.0.0', 100);
    }
    
    public function img_uploader_callback() {

        

        if (isset($_POST['submit'])) {
        
            $pname = $_POST['product_name'];
            $psku = $_POST['product_sku'];
            $pprice = $_POST['product_price'];

            $pweight = $_POST['product_weight'];
            $pstock = $_POST['product_stock'];

            $pregular_price = $_POST['product_regular_price'];
            $psale_price = $_POST['product_sale_price'];

            $plength = $_POST['product_length'];
            $pwidth = $_POST['product_width'];
            $pheight = $_POST['product_height'];

            require plugin_dir_path( __FILE__ ) . 'f.php';
            $pimg = image_uploader_callback();
            
    
            $product=array( 
    
                'post_title'    => $pname,
                'post_status'   => 'publish',
                'post_type'     => 'product',
            );
    
            $post_id = wp_insert_post( $product );
            wp_set_object_terms( $post_id, 'simple', 'product_type' );

            add_post_meta( $post_id, '_thumbnail_id', $pimg[0] );

            unset($pimg[0]);
    
            add_post_meta( $post_id, '_price', $pprice );
            add_post_meta( $post_id, '_product_image_gallery', implode(',',$pimg) );
            add_post_meta( $post_id, '_sku', $psku );
            add_post_meta( $post_id, '_stock', $pstock );
            add_post_meta( $post_id, '_weight', $pweight );
            add_post_meta( $post_id, '_regular_price', $pregular_price );
            add_post_meta( $post_id, '_sale_price', $psale_price );
            add_post_meta( $post_id, '_length', $plength );
            add_post_meta( $post_id, '_width', $pwidth );
            add_post_meta( $post_id, '_height', $pheight );

        }
        
        
    

        ?>

            <!-- <form action="" method="post" enctype="multipart/form-data">

                <input type="text" name="product_name" placeholder="Product Name" /></br>
                <input type="text" name="product_sku" placeholder="Product SKU" /></br>
                <input type="text" name="product_price" placeholder="Product Price" /></br>

                <input type="text" name="product_weight" placeholder="Product Weight" /></br>
                <input type="text" name="product_stock" placeholder="Product Stock" /></br>

                <input type="text" name="product_regular_price" placeholder="Product Regular Price" /></br>
                <input type="text" name="product_sale_price" placeholder="Product Sale Price" /></br>

                <input type="text" name="product_length" placeholder="Product Length" /></br>
                <input type="text" name="product_width" placeholder="Product Width" /></br>
                <input type="text" name="product_height" placeholder="Product Height" /></br>

                <input type="file" name="upload_attachment" class="files" size="50" multiple="multiple" />
                <input type="file" name="upload_attachment[]" class="files" size="50" multiple="multiple" />
                <?php //wp_nonce_field( 'upload_attachment', 'my_image_upload_nonce' ); ?>
                    
                <input type="submit" name="submit" value="Submit" />
                
            </form> -->

            <form class="row g-3" action="" method="post" enctype="multipart/form-data">

                <div class="col-md-6">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="product_name">
                </div>
                <div class="col-md-3">
                    <label for="product_sku" class="form-label">Product SKU</label>
                    <input type="text" name="product_sku" class="form-control" id="product_sku">
                </div>
                <div class="col-md-3">
                    <label for="product_price" class="form-label">Product Price</label>
                    <input type="text" name="product_price" class="form-control" id="product_price">
                </div>

                <div class="col-md-3">
                    <label for="product_weight" class="form-label">Product Weight</label>
                    <input type="text" name="product_weight" class="form-control" id="product_weight">
                </div>
                <div class="col-md-3">
                    <label for="product_stock" class="form-label">Product Stock</label>
                    <input type="text" name="product_stock" class="form-control" id="product_stock">
                </div>
                <div class="col-md-3">
                    <label for="product_regular_price" class="form-label">Product Regular Price</label>
                    <input type="text" name="product_regular_price" class="form-control" id="product_regular_price">
                </div>
                <div class="col-md-3">
                    <label for="product_sale_price" class="form-label">Product Sale Price</label>
                    <input type="text" name="product_sale_price" class="form-control" id="product_sale_price">
                </div>

                <div class="col-md-4">
                    <label for="product_length" class="form-label">Product Length</label>
                    <input type="text" name="product_length" class="form-control" id="product_length">
                </div>
                <div class="col-md-4">
                    <label for="product_width" class="form-label">Product Width</label>
                    <input type="text" name="product_width" class="form-control" id="product_width">
                </div>
                <div class="col-md-4">
                    <label for="product_height" class="form-label">Product Height</label>
                    <input type="text" name="product_height" class="form-control" id="product_height">
                </div>

                <!-- <div class="col-md-6">
                    <label for="product_feature_image" class="form-label">Product Feature Image</label>
                    <input type="file" name="upload_attachment" class="form-control" id="product_feature_image" size="50">
                    <?php wp_nonce_field( 'upload_attachment', 'my_image_upload_nonce' ); ?>
                </div> -->
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

// <div class="col-md-4">
//     <label for="inputState" class="form-label">State</label>
//     <select id="inputState" class="form-select">
//     <option selected>Choose...</option>
//     <option>...</option>
//     </select>
// </div>