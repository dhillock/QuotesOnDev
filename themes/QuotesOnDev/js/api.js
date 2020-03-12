(function($) {
  $(function() {
    console.log(red_vars);
    //this is your event listener, make sure this class exists somehwere on your page
    $('.randomQuote').on('click', function(e) {
      $.ajax({
        method: 'get',
        url:
          red_vars.rest_url +
          'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=10'
      }).done(function(data) {
        console.log(data);
      });
    });
  });
})(jQuery);
