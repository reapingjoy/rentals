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

  $('select[name=filter_brand]').change(function(){

    if(!$(this).val()){
      return false;
    }
    var brand_id = $(this).val();
    $.ajax({
      type: "POST",
      url: "/rentals/bookings/models-by-brand",
      data: {brand_id: brand_id}
      }).done(function(msg) {
          console.log(msg);
          var models = JSON.parse(msg);
          $('select[name=filter_model]').html(models.map( model => `<option value="${model.id}">${model.model_name}</option>` ));
      });
  
  })


  $('select[name=filter_model]').change(function(){

    if(!$(this).val()){
      return false;
    }
    var model_id = $(this).val();
    $.ajax({
      type: "POST",
      url: "/rentals/bookings/years-by-model",
      data: {model_id: model_id}
      }).done(function(msg) {
          console.log(msg);
          var years = JSON.parse(msg);
          $('select[name=filter_year]').html(years.map( year => `<option value="${year.manufacture_year}">${year.manufacture_year}</option>` ));
      });
  
  })


  $('select[name=car_brand]').change(function(){

    if(!$(this).val()){
      return false;
    }
    var brand_id = $(this).val();
    $.ajax({
      type: "POST",
      url: "/rentals/cars/models-by-brand",
      data: {brand_id: brand_id}
      }).done(function(msg) {
          console.log(msg);
          var models = JSON.parse(msg);
          $('select[name=car_model]').html(models.map( model => `<option value="${model.id}">${model.model_name}</option>` ));
      });
  
  })


});