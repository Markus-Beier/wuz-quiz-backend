$(function() {
	$('span[name = \'remove-question\']').on('click', function (e) {
		var table = 'question';
		$.ajax({
		  url: '/functions/live-table-remove.php?id='+this.id+'&table='+table,
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
		var table = 'answer_choice';
		$.ajax({
		  url: '/functions/live-table-remove.php?id='+this.id+'&table='+table,
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
})