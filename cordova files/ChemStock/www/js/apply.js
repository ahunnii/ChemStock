function kill(toDie){
	toDie.outerHTML = ''; 
	delete toDie; 
}

function insertNewJob(){
	var markup = '<tr class="row">'+
			'<td class="col-md-1 mb-3">'+
			'	<label style="visibility: hidden;">Removal</label>'+
			'	<button class="form-control" type="button" onclick="kill(this.parentNode.parentNode);" style="font-weight: 700;">X</button>'+
			'</td>'+
			'<td class="col-md-2 mb-3">'+
			'	<label>Employer</label>'+
			'	<input type="text" class="form-control" required="">'+
			'</td>'+
			'<td class="col-md-5 mb-3">'+
			'	<label>Duties and Responsibilities</label>'+
			'	<input type="text" class="form-control" required="">'+
			'</td>'+
			'<td class="col-md-2 mb-3">'+
			'	<label>Start Date</label>'+
			'	<input type="date" class="form-control" required="">'+
			'</td>'+
			'<td class="col-md-2 mb-3">'+
			'	<label>End Date</label>'+
			'	<input type="date" class="form-control" required="">'+
			'</td>'+
			'</tr>';
	
	
	$('#work-history').append(markup);
}

function insertNewClass(){
	
	var markup = '<tr class="row">' +
		'<td class="col-md-1 mb-3"> ' +
		'	<label style="visibility: hidden;">Removal</label>' +
		'	<button class="form-control" type="button" onclick="kill(this.parentNode.parentNode);" style="font-weight: 700;">X</button>' +
		'	</td>' +
		'<td class="col-md-2 mb-3">' +
		'	<label>Course Title</label>' +
		'	<input type="text" class="form-control" required="">' +
		'</td>' +
		'<td class="col-md-2 mb-3">' +
		'	<label>Final Grade</label>' +
		'	<input type="text" class="form-control" required="">' +
		'</td>' +
		'<td class="col-md-2 mb-3">' +
		'	<label>Semester</label>' +
		'	<select class="form-control" required="">' +
		'		<option hidden="" disabled="" value="">' +
		'		</option>' +
		'		<option value="0">Fall</option>' +
		'		<option value="1">Winter</option>' +
		'		<option value="2">Spring</option>' +
		'		<option value="3">Summer</option>' +
		'	</select>' +
		'</td>' +
		'<td class="col-md-2 mb-3">' +
		'	<label>Year</label>' +
		'	<input pattern="[0-9]{4}" class="form-control" required="">' +
		'</td>' +
		'<td class="col-md-3 mb-3"><label>Instructor</label><input type="text" class="form-control" required="">' +
		'</td>' +
		'</tr>';
		
	$('#course-history').append(markup);
}
				
