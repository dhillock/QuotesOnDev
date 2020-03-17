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

    <div class = 'company-info'>
      <p> Brought to you by </p>
      <a href="https://redacademy.com/vancouver/">RED Academy</a> 
    </div>


    </nav>

  </footer>

</body>

</html>

