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












