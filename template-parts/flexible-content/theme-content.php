<?php
/**
 * Theme flexible content
 * 
 */

 ?>

<?php if( get_row_layout() == 'text_content' ) :  ?>

    <div>text content</div>

<?php elseif( get_row_layout() == 'video_section' ) :  ?>

    <div>video section</div>

<?php 
endif;
