/*
Requires a page with CSRF token meta tag
  <meta name="csrf-token" content="{{ csrf_token() }}">

Specify HTTP request method using data-method attribute
  <a href="posts/2" data-method="delete">

Specify confirmation message using data-confirm attribute
  <a href="posts/2" data-method="delete" data-confirm="Are you sure?">
*/

(function() {

    var fixLinkMethods = {
      initialize: function() {
        $('a[data-method]').on('click', this.handleMethod);
      },
  
      handleMethod: function(e) {
        var link = $(this);
        var httpMethod = link.data('method').toUpperCase();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
  
        // If the data-method attribute is not PUT or DELETE,
        // then we don't know what to do. Just ignore.
        if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
          return;
        }
  
        // Allow user to optionally provide data-confirm="Are you sure?"
        if ( link.data('confirm') ) {
          if ( ! confirm(link.data('confirm')) ) {
            return false;
          }
        }
  
        fixLinkMethods.createForm(link, csrfToken).submit();
  
        e.preventDefault();
      },
    
      createForm: function(link, csrfToken) {
        var form = 
        $('<form>', {
          'method': 'POST',
          'action': link.attr('href')
        });
  
        var tokenInput = 
        $('<input>', {
          'type': 'hidden',
          'name': '_token',
          'value': csrfToken
        });
  
        var methodInput =
        $('<input>', {
          'name': '_method',
          'type': 'hidden',
          'value': link.data('method')
        });
  
        return form.append(tokenInput, methodInput)
                   .appendTo('body');
      }
    };
  
    $(function(){
        fixLinkMethods.initialize();
    });
  
  })();
  