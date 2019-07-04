$(document).ready(function(){

  $("#show_cars").change(function(){

    if(!$(this).val()){
      return false;
    }
    var request = $.ajax({
      type: "POST",
      url: "/rentals/cars/features",
      data: {car_id: $(this).val()}
  }).done(function(msg) {
      var features = JSON.parse(msg);
      $("#car_features").html(features.map( feature => `<li>${feature.feature_name}</li>` ));
  });

  request.fail(function(msg) {
      alert('error');
  });


  });

  $('input[type=date]').change(function(){
    var booked_from = $('input[name=booked_from]').val();
    var booked_to = $('input[name=booked_to]').val();

    if(booked_from && booked_to && (new Date(booked_from) <= new Date(booked_to)))
    {
      $.ajax({
        type: "POST",
        url: "/rentals/bookings/check-total",
        data: {booked_from: booked_from, booked_to: booked_to}
        }).done(function(msg) {
            $("#booking_total").html('Total: '+ msg +' euro');
            $("#total").val(msg);
        });
    }
  
  })


});