
<!-- This is the template that is executed for the search prompt -->

<form class = 'search-form' 
      role type="search" 
      type = 'text'
      name="s" 
      action="<?php echo home_url('/')?>"> 

    <fieldset class = 'clear-fix'>

        <label class="search-field">
        
            <input class="search-input" 
                   placeholder="SEARCH ..." 
                   type="search" name="s" 
                   value="<?php echo esc_attr(get_search_query()); ?>" >

        <a href="#" class="search-toggle">
            <i class="fas fa-search"></i>
        </a>

    </fieldset>

</form>
