$(function() {

  function checkAvailability(){

}

$( "#datepicker" ).datepicker({
    dateFormat : 'yy-mm-dd',
    beforeShowDay: checkAvailability        
    }       
});

$( "#datepicker1" ).datepicker({
    dateFormat : 'yy-mm-dd',
    beforeShowDay: checkAvailability

    }       
});

  });