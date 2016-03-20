jQuery(document).ready(function() {
  $.fn.editable.defaults.mode = 'popup';
  $('.xedit-text').editable();
  $('.xedit-dropdown-active').editable({
	type: 'select',
	inputclass: 'xedit-dropdown',
	source: [
	  {value: 'NULL', text: "inactive (0)"},
	  {value: 1, text: "active (1)"}
	  ]
  });
  $('.xedit-dropdown-correct').editable({
	type: 'select',
	inputclass: 'xedit-dropdown',
	source: [
	  {value: 'NULL', text: "not correct (0)"},
	  {value: 1, text: "correct (1)"}
	  ]
  });
  $('.xedit-dropdown-subscribed').editable({
	type: 'select',
	inputclass: 'xedit-dropdown',
	source: [
	  {value: 'NULL', text: "not subscribed (0)"},
	  {value: 1, text: "subscribed (1)"}
	  ]
  });
  $('.xedit-dropdown-type').editable({
	type: 'select',
	inputclass: 'xedit-dropdown',
	source: [
	  {value: 'NULL', text: "SingleChoice (0)"},
	  {value: 1, text: "MultipleChoice (1)"}
	  ]
  });
  $(document).on('click','.editable-submit',function(){
	var table = $(this).closest('.editable-container').prev().attr('table');
	var key = $(this).closest('.editable-container').prev().attr('key');
	var x = $(this).closest('td').children('span').attr('id');
	if ($('.xedit-dropdown').val()){
	  var y = $('.xedit-dropdown').val();
	} else{
		var y = $('.input-sm').val();
	}
	var z = $(this).closest('td').children('span');
	$.ajax({
	  url: '/functions/live-table-edit.php?id='+x+'&data='+y+'&table='+table+'&key='+key,
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
