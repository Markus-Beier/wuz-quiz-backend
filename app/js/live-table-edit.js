jQuery(document).ready(function() {
  $.fn.editable.defaults.mode = 'popup';
  $('.xedit-text').editable();
  $('.xedit-dropdown-active').editable({
	type: 'select',
	inputclass: 'xedit-dropdown',
	source: [
	  {value: 'NULL', text: "inactive"},
	  {value: 1, text: "active"}
	  ]
  });
  $(document).on('click','.editable-submit',function(){
	var key = $(this).closest('.editable-container').prev().attr('key');
	var x = $(this).closest('td').children('span').attr('id');
	// var y = $('.input-sm').val();
	var y = $('.xedit-dropdown').val();
	var z = $(this).closest('td').children('span');
	$.ajax({
	  url: '/functions/live-table-edit.php?id='+x+'&data='+y+'&key='+key,
	  type: 'GET',
	  success: function(s){
		if(s == 'status'){
		$(z).html(y);}
		if(s == 'error') {
		alert('Error Processing your Request!');}
	  },
	  error: function(e){
	  alert('Error Processing your Request!!');
	  }
	});
  });
});
