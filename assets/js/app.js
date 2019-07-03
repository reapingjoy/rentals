$(document).ready(function(){

  $("#show_cars").change(function(){

    var request = $.ajax({
      type: "POST",
      url: "/rentals/cars/features",
      data: {car_id: $(this).val()}
  }).done(function(msg) {
      var features = JSON.parse(msg);
      console.log(features)
      $("#car_features").html(features.map( feature => `<li>${feature.feature_name}</li>` ));
      
  });

  request.fail(function(msg) {
      alert('error');
  });


  });


});