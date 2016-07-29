(function ($) {

$(function() {
  $("#modal-1").on("change", function() {
    if ($(this).is(":checked")) {
      $("body").addClass("modal-open");
    } else {
      $("body").removeClass("modal-open");
    }
  });

  $(".modal-fade-screen, .modal-close").on("click", function() {
    $(".modal-state:checked").prop("checked", false).change();
  });

  $(".modal-inner").on("click", function(e) {
    e.stopPropagation();
  });
});








  // init Isotope
  var $grid = $('.grid').isotope({
    itemSelector: '.grid-item',
    percentPosition: true,
    masonry: {
      // use element for option
      columnWidth: '.grid-sizer',
      gutter: 35
    }
  });



// bind filter button click
$('.filters-button-group').on( 'click', 'button', function() {
  var filterValue = $( this ).attr('data-filter');
  // use filterFn if matches value
  $grid.isotope({ filter: filterValue });
});
// change is-checked class on buttons
$('.button-group').each( function( i, buttonGroup ) {
  var $buttonGroup = $( buttonGroup );
  $buttonGroup.on( 'click', 'button', function() {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $( this ).addClass('is-checked');
  });
});








$(window).on("scroll", function() {
    if($(window).scrollTop() > 50) {
        $(".site-header").addClass("site-header-active");
        $(".site-branding img").attr("src", "/wp-content/themes/resource-center/assets/img/proactive-logo.svg");
    } else {
       $(".site-header").removeClass("site-header-active");
       $(".site-branding img").attr("src", "/wp-content/themes/resource-center/assets/img/proactive-logo-white.svg");
    }
});





})( jQuery );
