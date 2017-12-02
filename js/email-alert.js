  var makerKey = 'bx2QzrtMAF5P0kCraFDdz8';
  var eventName = 'send_email';

  function triggerEmailAlert(email, subject, content) {
    //var data = '?value1=' + email.replace(" ", "%20") + '&value2=' + subject.replace(" ", "%20") + '&value3=' + content.replace(" ", "%20");
	
    var urlBuilt = 'https://maker.ifttt.com/trigger/' + eventName + '/with/key/' + makerKey;
    $.ajax({
      url: urlBuilt,
	  type: "POST",
	  dataType: 'jsonp',
	  data: {
		  'value1': email,
		  'value2': subject,
		  'value3': content,
	  },
	  
    });
  }