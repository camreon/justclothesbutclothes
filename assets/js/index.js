$(document).ready(function(){

  $( document ).tooltip({
    position: {
      my: "center bottom-20",
      at: "center top",
      using: function( position, feedback ) {
        $( this ).css( position );
        $( "<div>" )
          .addClass( "arrow" )
          .addClass( feedback.vertical )
          .addClass( feedback.horizontal )
          .appendTo( this );
      }
    },
    close: function( event, ui ) {
      $(".ui-tooltip").hide();
    }
  });

  /* image height depends on window height */
	var window_height = $(window).height();
	var window_width = $(window).width();
	$('.images a img').css('max-height', window_height).show();

  /* disable continue link by default */
  function noLink(){
    $('.continue a').click(function(event) {
      event.preventDefault();
    });
  }

  noLink();

  function yesLink(){
    $('.continue a').click(function(event) {
      window.location = this.href;
    });
  }

  /* checkbox continue highlighting */
  $('input#check').change(function() {
    if(this.checked) {
      $('.continue').addClass('checked');
      yesLink();
    }
    else {
      $('.continue').removeClass('checked');
      noLink();
    }
  });

});
