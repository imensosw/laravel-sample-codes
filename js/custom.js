// right bar code
$(window).on("scroll", function () {
   if ($(this).scrollTop() > 80) {
      $('.pos_fix').addClass("p_t0");
   } else {
      $('.pos_fix').removeClass("p_t0");
   }
});

// tool tip code
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

$(document).ready(function(){
    $(".chosen-select").chosen()
});
