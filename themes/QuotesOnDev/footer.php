<?php wp_footer();?> 

  <footer class = 'site-footer'>


  <nav class = 'the-menu'>
        <!-- <?php wp_nav_menu(array('theme_location' => 'primary'));?> -->

        <?php wp_nav_menu(	array(
						 	‘theme_location’ => ‘primary’,
							 ‘menu_id’ => ‘primary-menu’,
							 ‘menu_class’ => ‘footer-navigation’
						 	));
        ?>
            
  </nav>

  <div class = 'company-info'>
    <p> Brought to you by </p>
    <a href="https://redacademy.com/vancouver/">RED Academy</a> 
<!-- </div>

   <?php echo '0 dhID: ' . get_the_ID(); ?>
   
   <?php echo '1 dhsource: ' . trim( get_post_meta( get_the_ID(), '_qod_quote_source', true ) ); ?>

    <?php echo '2 dhurl: ' . trim( get_post_meta( get_the_ID(), '_qod_quote_source_url', true ) ); ?> 
  -->



  </footer>

</body>

</html>

