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

  var filter_options = {};
  $('.filter-item').change(function(){

    var total = 0;
    $('.booking-item').hide();
    var value = $(this).val();
    var option_name = $(this).attr("data-filter");
    if(!value){
      delete filter_options[option_name];
    }
    else {
      filter_options[option_name] = value;
    }

    $(".booking-item").each(function(){
      var booking_item = $(this);

      for(var option_name in filter_options){
        var option_value = filter_options[option_name];
        if(!booking_item.find("td["+option_name+"='"+option_value+"']").length){
          return;
        }
      }

      booking_item.show();
      total += parseInt(booking_item.find("td[data-total]").attr("data-total"))

    })

    $(".total-sum").html(total);



  })


});