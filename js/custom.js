jQuery( document ).ready( function( $ ){

  // Mantem o menu sempre aberto
  $('.keep-open').on({
    "shown.bs.dropdown": function() {
      this.closable = false;
    },
    "hide.bs.dropdown":  function() { 
      if (!this.closable) {
        this.closable = false;
      }
      return this.closable; 
    },
  });

  $('.keep-open a.haschild').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });

  // Seta focus no campo input ao executar a função 'show.bs.collapse'
  $('#collapse_search_xs').on('show.bs.collapse', function() {
    setTimeout(function() { $('input[name="search_block_form"]').focus() }, 500);
  });

  // Esconde o form de pesquisa se perder o foco do campo
  $('input[name="search_block_form"]').blur(function(){
    $('#collapse_search_xs').collapse('hide');
  });

  $('.footer .region').children().each(function (i, e){
    if ( (i+1)%2 === 0 ) {
      $('#'+e.id).after('<div class="clearfix visible-xs-block"></div>');
    }
    if ( (i+1)%3 === 0 ) {
      $('#'+e.id).after('<div class="clearfix visible-sm-block"></div>');
    }
    if ( (i+1)%4 === 0 ) {
      $('#'+e.id).after('<div class="clearfix visible-md-block visible-lg-block"></div>');
    }
  });

  $('.alto-contraste').click(function(){
    $('body').toggleClass("contraste");

    // Create a cookie for contraste
    if ( $('body').hasClass('contraste') ) {
      Cookies.set('theme_contraste', 'true');
    } else { // Delete cookie
      Cookies.remove('theme_contraste');
    }
  });

  // Add class to body if cookie exist
  if ( Cookies.get('theme_contraste') ) {
    $('body').addClass('contraste');
  }

});