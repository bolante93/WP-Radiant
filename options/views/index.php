<?php

$plugins =  new \classes\Plugin();
//echo '<pre>'; var_dump($options['advanced']); die;
?>


<div class="container">
   <div class="section-padding">
       <div class="imco-archive-menu space-bottom">
           <img width="100" src="https://imco.space/assets/img/branding-full.svg">
       </div>
       <div class="border-bottom space-bottom"></div>

       <form method="post" action="<?php echo esc_html( admin_url( 'admin.php' ) ); ?>">
           <div class="option-container">
               <div class="field-wrapper">
                   <h3> Fonts </h3>
                   <div class="fields">
                       <div class="field w-100">
                           <span> <strong>Primary Google Font URL:</strong> </span>
                           <input style="width: 100%" type="text" class="" id="" value="<?php echo $options['fonts']['google_font_primary'] ?>" name="option[fonts][google_font_primary]">
                           <p class="field-description">
                               Google fonts will be preloaded before other scripts.
                           </p>
                       </div>
                   </div>
                   <div class="fields">
                       <div class="field w-100">
                           <span> <strong>Secondary Google Font URL:</strong> </span>
                           <input style="width: 100%" type="text" class="" id="" value="<?php echo $options['fonts']['google_font_secondary'] ?>" name="option[fonts][google_font_secondary]">
                           <p class="field-description">
                               Google fonts will be preloaded before other scripts.
                           </p>
                       </div>
                   </div>
                   <div class="border-bottom space-bottom"></div>
                   <h3> Debugging </h3>
                   <div class="fields">
                       <div class="field">
                           <span> <strong>Version:</strong> </span>
                           <input type="text" class="" id="" value="<?php echo $options['version'] ?>" name="option[version]">
                           <p class="field-description"> Input custom version string for scripts enqueued with the theme. </p>
                       </div>
                   </div>
                   <div class="fields">
                       <div class="field ">
                           <span> <strong>Debug</strong> </span>
                           <input type="checkbox" class="" id="" value="<?php echo $options['debug'] ?>" name="option[debug]" <?php checked($options['debug'], is_null($options['debug'])) ?> >
                           <p class="field-description"> Checking debug will generate a random query string for script versions </p>
                       </div>
                   </div>
               </div>
               <div class="theme-details">
                   <div class="details-item">
                       <h3> Advanced </h3>
                       <div class="fields">
                           <div class="field">
                               <span> <strong>Disable Gutenberg Editor</strong> </span>
                               <input type="checkbox" class="" id="" value="<?php echo $options['advanced']['disable_gb_editor'] ?>" name="option[advanced][disable_gb_editor]" <?php checked($options['advanced']['disable_gb_editor'], is_null($options['advanced']['disable_gb_editor'])) ?> >
                               <p class="field-description space-bottom">
                                   Checking this box will disable gutenberg editor and use classic editor.
                               </p>
                               <div>
                                   <span> <strong>Allow SVG Upload through media uploader</strong> </span>
                                   <input type="checkbox" class="" id="" value="<?php echo $options['advanced']['allow_svg_upload'] ?>" name="option[advanced][allow_svg_upload]" <?php checked($options['advanced']['allow_svg_upload'], is_null($options['advanced']['allow_svg_upload'])) ?> >
                                   <p class="field-description"> Checking this box will enabled uploading of
                                       <code>.svg</code> files through media uploader.
                                   </p>
                               </div>
                           </div>
                           <div class="field ">

                           </div>
                       </div>

                   </div>
               </div>
           </div>
           <input type="hidden" name="action" value="save_theme_options" />
           <?php wp_nonce_field( '_save_theme_options' ); ?>
           <div class="admin container">
           <?php submit_button(); ?>
       </form>
   </div>
</div>