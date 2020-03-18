(function($) {
  // Generate a random quote, on the home page. These classes must match those in front-page.php
  const ClassHomeQuote = $('.home-quote');
  const ClassAuthor = $('.author');
  const ClassSource = $('.source');
  const ClassSourceLink = $('.source-link');

  // The listener - wait for the quote-button to be clicked
  $('#quote-button').on('click', function(e) {
    $.ajax({
      method: 'GET',
      url:
        red_vars.rest_url +
        'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1'
    }).done(function(data) {
      //
      $(ClassHomeQuote).empty();
      $(ClassAuthor).empty();
      $(ClassSource).empty();
      $(ClassSourceLink).empty();

      $.each(data, function(index, value) {
        //
        // console.log(value, 'value');

        // Push the database values into variables
        let quote = value.content.rendered;
        let author = value.title.rendered;
        let source = value._qod_quote_source;
        let sourceURL = value._qod_quote_source_url;

        // HTML
        $(ClassHomeQuote).html(quote);

        // $('p')
        //   .contents()
        //   .unwrap()
        //   .wrap('<q/>');

        if (sourceURL || source) {
          $(ClassAuthor).append('&mdash;&nbsp;', author, ',&nbsp;');
        } else {
          $(ClassAuthor).append('&mdash;&nbsp;', author, '');
        }

        //
        // $(ClassSourceLink).prop('href', sourceURL);
        // $(ClassSourceLink).append(source, ' ');

        // If the quote has a source
        if (sourceURL) {
          $(ClassSource).append(
            `<a href="${sourceURL}"class="source-link" target="new"> <span class="source">${source}</span> </a>`
          );
        } else {
          $(ClassSource).append(`<span class="source">${source}</span>`);
        }
      }); // Closing foreach loop
    }); // Closing done function
    //empties were here
  }); // Closing event listener - waiting for the quote button to be clicked

  ///////////////////////////////////////////////////
  ////////////////// Submit a Quote ////////////////
  ///////////////////////////////////////////////////

  $('#submit').on('click', function(event) {
    //
    event.preventDefault(); // do not refresh the page

    const $AddAuthor = $('#form-author').val();
    const $AddQuote = $('#form-quote').val();
    const $AddSource = $('#form-source').val();
    const $AddUrl = $('#form-url').val();

    $.ajax({
      method: 'POST',
      url: red_vars.rest_url + 'wp/v2/posts',
      data: {
        content: $AddQuote,
        title: $AddAuthor,
        _qod_quote_source: $AddSource,
        _qod_quote_source_url: $AddUrl,
        status: 'pending'
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
      }
    })
      //
      .done(function(response) {
        if ($AddAuthor === '' || $AddQuote === '') {
          alert(
            'Please note that the Author and Quote are required - they cannot be blank'
          );
        } else {
          $('#form-author').val('');
          $('#form-quote').val('');
          $('#form-source').val('');
          $('#form-url').val('');

          alert('Congratulations, the quote has been submitted.');
        }
      })
      //
      .fail(function(err) {
        alert('Error: There was an error adding the quote');
      });
    //
  }); // Closing .event listener (generate quote)
  //
})(jQuery); // Closing document ready function
