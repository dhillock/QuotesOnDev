<?php get_header();


// console.log(get_the_author())



?>

<php $current_user_posts = get_posts( $args ); ?>

<div class="selected-author-page">

    <h1 class="selected-author-title">XXXAuthor: <?php $author = the_author(); echo $author[0]->author_name;?> </h1>
    <h1 class="selected-author-title">XXXAuthor: <?php $author = the_author(); echo $current_user_posts;?> </h1>

    <hr class = 'line-top'>

    <?php

// console.log(get_the_author())

        // $args = array( 
        //     'post_type' => 'post', 
        //     // 'author_name' => 'Ada Lovelace',
        //     'orderby' => 'title',
        //     'order' => 'ASC',
        //     'posts_per_page' => 3
        //     );
        // $quotes = get_posts( $args ); 

global $current_user;                     

$args = array(
  'author'        =>  $current_user->ID, 
  'orderby'       =>  'post_date',
  'order'         =>  'ASC',
  'posts_per_page' => -1 // no limit
);


$current_user_posts = get_posts( $args );
$total = count($current_user_posts);


    ?>

    <?php foreach ( $quotes as $post ) : setup_postdata( $post ); ?>

        <div class="author-quote">
            <?php the_content(); ?> 
        </div>

        <span class="author-author"> - <?php the_title(); ?></span>
        <?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?>

        <hr class = 'line-bottom'>

    <?php endforeach;?>

    <div class="selected-author-navigation">

        <?php the_posts_pagination(array (
            'prev_text' => __( 'Prev' ),
            'next_text' => __( 'Next' ),  
            'screen_reader_text' => __('  ')
        ));?>

    </div>

</div>

<?php get_footer();?>