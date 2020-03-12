<!-- Get the header -->
<?php get_header(); ?>

<div class="archive-page">

    <h1>Archives</h1>

    <!-- Get the quote authors -->
    <h2>Quote Authors</h2>

    <?php
        $quotequery = array( 
            'orderby' => 'title',
            'order' => 'ASC',
            'numberposts' => -1
        );
        $quotes = get_posts( $quotequery ); 
    ?>

    <?php foreach ( $quotes as $post ) : setup_postdata( $post ); ?>

        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

    <?php endforeach;?>

    <!-- Get the categories -->
    <h2>Categories</h2>

    <?php 

        $args = array(
            'orderby' => 'title',
            'order' => 'ASC',
            'numberposts' => -1
        ); 
        
        $cats = get_categories($args);

        foreach ($cats as $cat) { $cat_id = $cat->term_id; $cat_name = $cat->name; 
            
            echo '<a href="' . get_category_link( $cat_id ) . '">'.$cat->name.'</a>';  
        } 

      ?>

    <!-- Get the tags -->
    <h2>Tags</h2>

    <?php 
        $args = array(
            'order' => 'ASC', 
        ); 
        $tags = get_tags($args);
        foreach ($tags as $tag) {           
            $tag_id= $tag->term_id;
            $tag_name= $tag->name; 
    
             echo '<a href="' . get_tag_link( $tag_id ) . '">'.$tag->name.'</a>';      
      } 

    ?>

</div>
<!-- Get the footer -->
<?php get_footer();?>
