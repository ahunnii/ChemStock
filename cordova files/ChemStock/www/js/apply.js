function kill(toDie){
	toDie.outerHTML = ''; 
	delete toDie; 
}

function insertNewJob(){
	var wpr = document.createElement("div");
	wpr.classList.add('row');
	var col1 = document.createElement("div");
	col1.classList.add('col-md-1');
	col1.classList.add('mb-3');
	var invis = document.createElement("label");
	invis.style = "visibility: hidden;";
	invis.innerHTML = "Removal";
	var butt = document.createElement("button");
	butt.style = "font-weight: 700;";
	butt.classList.add('form-control');
	butt.innerHTML = "X";
	butt.onclick=function(){kill(this.parentNode.parentNode)};
	
	col1.appendChild(invis);
	col1.appendChild(butt);
	
	var col2 = document.createElement("div");
	col2.classList.add('col-md-2');
	col2.classList.add('mb-3');
	var lab1 = document.createElement("label");
	lab1.innerHTML = "Employer";
	var inp1 = document.createElement("input");
	inp1.type = "text";
	inp1.classList.add('form-control');
	inp1.required = true;
	
	col2.appendChild(lab1);
	col2.appendChild(inp1);
	
	var col3 = document.createElement("div");
	col3.classList.add('col-md-5');
	col3.classList.add('mb-3');
	var lab2 = document.createElement("label");
	lab2.innerHTML = "Duties and Responsibilities";
	var inp2 = document.createElement("input");
	inp2.type = "text";
	inp2.classList.add('form-control');
	inp2.required = true;
	
	col3.appendChild(lab2);
	col3.appendChild(inp2);
	
	var col4 = document.createElement("div");
	col4.classList.add('col-md-2');
	col4.classList.add('mb-3');
	var lab3 = document.createElement("label");
	lab3.innerHTML = "Start Date";
	var inp3 = document.createElement("input");
	inp3.type = "date";
	inp3.classList.add('form-control');
	inp3.required = true;
	
	col4.appendChild(lab3);
	col4.appendChild(inp3);
	
	var col5 = document.createElement("div");
	col5.classList.add('col-md-2');
	col5.classList.add('mb-3');
	var lab4 = document.createElement("label");
	lab4.innerHTML = "End Date";
	var inp4 = document.createElement("input");
	inp4.type = "date";
	inp4.classList.add('form-control');
	inp4.required = true;
	
	col5.appendChild(lab4);
	col5.appendChild(inp4);
	
	wpr.appendChild(col1);
	wpr.appendChild(col2);
	wpr.appendChild(col3);
	wpr.appendChild(col4);
	wpr.appendChild(col5);
	
	document.getElementById("jobList").appendChild(wpr);
}

function insertNewClass(){
	var wpr = document.createElement("div");
	wpr.classList.add('row');
	var col1 = document.createElement("div");
	col1.classList.add('col-md-1');
	col1.classList.add('mb-3');
	var invis = document.createElement("label");
	invis.style = "visibility: hidden;";
	invis.innerHTML = "Removal";
	var butt = document.createElement("button");
	butt.style = "font-weight: 700;";
	butt.classList.add('form-control');
	butt.innerHTML = "X";
	butt.onclick=function(){kill(this.parentNode.parentNode)};
	
	col1.appendChild(invis);
	col1.appendChild(butt);
	
	var col2 = document.createElement("div");
	col2.classList.add('col-md-2');
	col2.classList.add('mb-3');
	var lab1 = document.createElement("label");
	lab1.innerHTML = "Course Title";
	var inp1 = document.createElement("input");
	inp1.type = "text";
	inp1.classList.add('form-control');
	inp1.required = true;
	
	col2.appendChild(lab1);
	col2.appendChild(inp1);
	
	var col3 = document.createElement("div");
	col3.classList.add('col-md-2');
	col3.classList.add('mb-3');
	var lab2 = document.createElement("label");
	lab2.innerHTML = "Final Grade";
	var inp2 = document.createElement("input");
	inp2.type = "text";
	inp2.classList.add('form-control');
	inp2.required = true;
	
	col3.appendChild(lab2);
	col3.appendChild(inp2);
	
	var col4 = document.createElement("div");
	col4.classList.add('col-md-2');
	col4.classList.add('mb-3');
	var lab3 = document.createElement("label");
	lab3.innerHTML = "Semester";
	var inp3 = document.createElement("select");
	inp3.classList.add('form-control');
	inp3.required = true;
	
	var opt1 = document.createElement("option");
	opt1.text = "";
	opt1.selected = true;
	opt1.hidden = true;
	opt1.disabled = true;
	opt1.value = "";
	
	var opt2 = document.createElement("option");
	opt2.text = "Fall";
	opt2.value = "0";
	
	var opt3 = document.createElement("option");
	opt3.text = "Winter";
	opt3.value = "1";
	
	var opt4 = document.createElement("option");
	opt4.text = "Spring";
	opt4.value = "2";
	
	var opt5 = document.createElement("option");
	opt5.text = "Summer";
	opt5.value = "3";
	
	inp3.add(opt1, 0);
	inp3.add(opt2, 1);
	inp3.add(opt3, 2);
	inp3.add(opt4, 3);
	inp3.add(opt5, 4);
	
	col4.appendChild(lab3);
	col4.appendChild(inp3);
	
	var col5 = document.createElement("div");
	col5.classList.add('col-md-2');
	col5.classList.add('mb-3');
	var lab4 = document.createElement("label");
	lab4.innerHTML = "Year";
	var inp4 = document.createElement("input");
	inp4.pattern = "[0-9]{4}";
	inp4.classList.add('form-control');
	inp4.required = true;
	inp4.oninvalid  = function(){this.setCustomValidity('Must be a valid year. Ex: 2017')};
	
	col5.appendChild(lab4);
	col5.appendChild(inp4);
	
	var col6 = document.createElement("div");
	col6.classList.add('col-md-3');
	col6.classList.add('mb-3');
	var lab5 = document.createElement("label");
	lab5.innerHTML = "Instructor";
	var inp5 = document.createElement("input");
	inp5.type = "text";
	inp5.classList.add('form-control');
	inp5.required = true;
	
	col6.appendChild(lab5);
	col6.appendChild(inp5);
	
	wpr.appendChild(col1);
	wpr.appendChild(col2);
	wpr.appendChild(col3);
	wpr.appendChild(col4);
	wpr.appendChild(col5);
	wpr.appendChild(col6);
	
	document.getElementById("classList").appendChild(wpr);
}
				
