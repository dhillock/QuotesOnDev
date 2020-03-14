(function($) {
  // Generate a random quote, on the home page. These classes must match those in front-page.php
  const homeQuote = $('.home-quote');
  const authorQuote = $('.author');
  const homeSource = $('.source');
  const sourceLink = $('.source-link');

  // The listener - wait for the quote-button to be clicked
  $('#quote-button').on('click', function(e) {
    $.ajax({
      method: 'GET',
      url:
        red_vars.rest_url +
        'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1'
    }).done(function(data) {
      $.each(data, function(index, value) {
        //
        // console.log(value, 'value');

        // Push the database values into variables
        let quote = value.content.rendered;
        let author = value.title.rendered;
        let source = value._qod_quote_source;
        let sourceURL = value._qod_quote_source_url;

        // HTML
        $(homeQuote).html(quote);
        $(authorQuote).append('— ', author, '');
        //
        // $(sourceLink).prop('href', sourceURL);
        // $(sourceLink).append(source, ' ');

        // If the quote has a source
        if (sourceURL) {
          $(homeSource).append(
            `<a href="${sourceURL}"class="source-link" target="new"><span class="source">${source}</span></a>`
          );
        } else {
          $(homeSource).append(`<span class="source">${source}</span>`);
        }
      }); // Closing for each loop
    }); // Closing done function
    $(homeQuote).empty();
    $(authorQuote).empty();
    $(homeSource).empty();
  }); // Closing event listener (generate quote)

  ///////////////////////////////////////////////////
  ////////////////// Submit a Quote ////////////////
  ///////////////////////////////////////////////////

  $('#submit').on('click', function(event) {
    event.preventDefault(); // do not refresh the page

    const $authorToAdd = $('#author-form').val();
    const $quoteToAdd = $('#quote-form').val();
    const $sourceToAdd = $('#source-form').val();
    const $sourceUrlToAdd = $('#url-form').val();

    $.ajax({
      method: 'POST',
      url: red_vars.rest_url + 'wp/v2/posts',
      data: {
        content: $quoteToAdd,
        title: $authorToAdd,
        _qod_quote_source: $sourceToAdd,
        _qod_quote_source_url: $sourceUrlToAdd
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
      }
    })
      .done(function(response) {
        if ($authorToAdd === '' || $quoteToAdd === '') {
          alert(
            'Please check if the name of the author and the quote were filled correctly'
          );
        } else {
          alert('Congratulations, the quote has been submitted.');
          $('#author-form').val('');
          $('#quote-form').val('');
          $('#source-form').val('');
          $('#url-form').val('');
        }
      })
      .fail(function(err) {
        alert('Error: There was an error adding the quote');
      });
  }); // Closing .event listener (generate quote)
})(jQuery); // Closing document ready function
