$(document).ready(function(){

  $("#show_cars").change(function(){

    var request = $.ajax({
      type: "POST",
      url: "/rentals/cars/features",
      data: {car_id: $(this).val()}
  }).done(function(msg) {
      // $("#all_offers").empty();
      // $("#all_offers").append(msg);
      console.log(msg)
      
      //alert(clicked_element.attr('class'));
      // clicked_element.attr('class', new_sorting_type);
      //$("#body").append('<div class="loading"></div>');
      //$("#body").removeClass('loading');
  });

  request.fail(function(msg) {
      alert('error');
  });


  });


});