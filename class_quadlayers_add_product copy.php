<?php

class QuadLayers_class{

    public function __construct(){

        add_shortcode( 'form_uploader', array($this, 'form_uploader_callback') );

    }
    
    function form_uploader_callback() {
        

        ?>
        <form action="/" method="post" enctype="multipart/form-data">

        
            <input type="file" name="product_image" class="form-control" /> 
            
            <input type="submit" name="submit" value="Submit" />
        </form>
        <?php
    }

}