( function( $ ) {

	$('.job-location > span').click(function() {
		$('.job-location').toggleClass('active');
		$('.toogle-benefit').toggle();
	});


	//$('.toogle-benefit > p').html( $('.toogle-benefit > p').html().replace(/\r?\n/g, '<br />') );

	$( "#btnSubmit" ).click( function( e ) {
		e.preventDefault();
		var obj = $(this);
		var fileCvName='';
		var fileOtherName='';
		var form = $( ".cont-apply-form" );
		var formData = new FormData(form[0]);
		fileCvName = $('#file_cv').val().split('/').pop().split('\\').pop();
		fileOtherName = $('#file_other').val().split('/').pop().split('\\').pop();
		$.ajax( {
			context: this,
			beforeSend: function() {
				$(this).attr( "disabled", true );
				form.find(".error" ).removeClass( "error" );
			},
	        type: "POST",
	        contentType: false,
			processData: false,
			cache: false,
	        //data: form.serializeArray(),
	        data: formData,
	        url: ajax.url,
	        error: function( jqXHR, textStatus, errorThrown ) {},
	        success: function( resp, textStatus, jqXHR ) {
	        	//console.log( resp );
	        	var resp = JSON.parse( resp );
	        	if( resp.security ) {
	        		alert( resp.security );
	        	} else if( resp.errors ) {
	        		$.each( resp.errors, function( field, error ) {
						$( "#"+field ).addClass( "error" );
					} );
					$( "html, body" ).animate( { scrollTop: $( ".error" ).offset().top - 15 }, 400 );
	        	} else if( resp.success ) {
	        		$('#fileCvName').html(fileCvName);
	        		$('#fileOtherName').html(fileOtherName);
	        		var confirm = $( this ).attr( "data-target" );
	        		$( confirm ).modal( "show" );
	        		$.each( form.serializeArray(), function() {
	        			var name = this.name;
	        			var value = this.value;
	        			$( confirm ).find( 'div[for="'+name+'"]' ).html( value );
	        		} );
	        		$( 'button[data-target="#mySuccess"]' ).click( function( e ) {
	        			$( '<input type="hidden" name="save_data" value="true">' ).prependTo( form );
	        			obj.click();
	        		} );
	        	} else if( resp.save ) {
	        		console.log( 'ok' );
	        	}
	        },
	        complete: function() {
	        	$( this ).attr( "disabled", false );
	        }
	    } );
	});

} )( jQuery );
