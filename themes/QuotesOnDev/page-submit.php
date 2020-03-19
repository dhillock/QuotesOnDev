<?php get_header(); ?>

<?php if ( is_user_logged_in() ) { ?>

    <div class="submit-a-quote">

        <form class = 'form-quote'>

            <h1> Submit a Quote </h1>

            <label for="author">Author of Quote</label>
            <input type="text" id="form-author" name="firstname">

            <label for="quote">Quote</label>
            <input type="text" id="form-quote">

            <label for="source-txt">Where did you find this quote (e.g. book name)?</label>
            <input type="text" id="form-source">

            <label for="source-url">Provide the URL of the quote source, if available.</label>
            <input type="text" id="form-url">


            <input type="submit" id="submit" value="Submit Quote" />

        </form>

    </div>  

<?php } else { ?>

    <div class="submit-a-quote">

        <h1> Submit a Quote </h1>

        <h2>Sorry, you must be logged in to submit a quote!</h2>

        <!-- David, find the correct path to load the login screen -->
        <a href = "../../../wp-login.php" > Click here to login.> </a>

    </div> 

<?php } ?>

<div class = 'hidden-message' >
    <h1> Fee free to submit another quote. 🙂 </h1>
</div>

<?php get_footer(); ?>
