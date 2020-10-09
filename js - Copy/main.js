jQuery(document).ready(function($){
	if( $('.floating-labels').length > 0 ) floatLabels();

	function floatLabels() {
		var inputFields = $('.floating-labels .cd-label').next();
		inputFields.each(function(){
			var singleInput = $(this);
			//check if user is filling one of the form fields 
			checkVal(singleInput);
			singleInput.on('change keyup', function(){
				checkVal(singleInput);	
			});
		});
	}

	function checkVal(inputField) {
		( inputField.val() == '' ) ? inputField.prev('.cd-label').removeClass('float') : inputField.prev('.cd-label').addClass('float');
	}
})
jQuery(document).ready(function($){
	if( $('.floating-label-other').length > 0 ) floatLabelOthers();

	function floatLabelOthers() {
		var inputOthers = $('.floating-label-other .cd-label-other').next();
		inputOthers.each(function(){
			var singleInput2 = $(this);
			//check if user is filling one of the form fields 
			checkVal2(singleInput2);
			singleInput2.on('change keyup', function(){
				checkVal2(singleInput2);	
			});
		});
	}

	function checkVal2(inputOther) {
		( inputOther.val() == '' ) ? inputOther.prev('.cd-label-other').removeClass('float2') : inputOther.prev('.cd-label-other').addClass('float2');
	}
});