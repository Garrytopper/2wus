$(function(){

	$('#suivantFirst').on('click', function(){
		$('#firstForm').addClass('hidden');
		$('#secondForm').removeClass('hidden');
	});
    $('#retourSecond').on('click', function(){
        $('#secondForm').addClass('hidden');
        $('#firstForm').removeClass('hidden');
    })
});