$('#havepermit').on('click',function(){
    if($('#permit').css('display') === 'none'){
        $('#permit').removeClass('hide');
    }else{
        $('#permit').addClass('hide');
    }
});


$('#estadmin').on('click',function(){
    if($('#login').css('display') === 'none'){
        $('#login').removeClass('hide');
    }else{
        $('#login').addClass('hide');
    }
});

$( function() {
 
	$( window ).scroll( function () {
		$( "body > nav" ).css( {
			left: - $( this ).scrollLeft()
		} );
	} );
    
} );

$('.datepicker').pickadate({
    format: 'yyyy-mm-dd',
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
    
  });

$('#addtourn').on('click',function(){
    if($('#formtourn').css('display') === 'none'){
        $('#formtourn').removeClass('hide');
    }else{
        $('#formtourn').addClass('hide');
    }
});

$('#updateform').on('click',function(){
    if($('#updatetourn').css('display') === 'none'){
        $('#updatetourn').removeClass('hide');
    }else{
        $('#updatetourn').addClass('hide');
    }
});

$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });

//$(".MyModal").openModal();
//$(".MyModal").closeModal();
//$('#modal1').modal('open');
//$('#modal1').modal('close');      








