// JavaScript source code
//Populates modals for application
function populate_modal(id_name) {
    //Basic Information
    $('#app_status').html($apps[id_name].applicationStatus);
    $('#app_name').html($apps[id_name].firstName + " " + (($apps[id_name].middleInitial == null) ? "" : $apps[id_name].middleInitial) + " " + $apps[id_name].lastName);
    $('#app_email').html("<b>Email:</b> " + $apps[id_name].email);
    $('#app_homephone').html("<b>Home Phone:</b> " + $apps[id_name].homePhone);
    $('#app_cellphone').html("<b>Cell Phone:</b> " + $apps[id_name].cellPhone);
    $('#app_studentid').html("<b>Student Id:</b> E" + $apps[id_name].studentID);
    $('#app_timestamp').html("Submitted: " + $apps[id_name].timestmp);
    $('#app_localaddress').html("<b>Local Address: </b></br>" + $apps[id_name].localAddress + "</br>" + $apps[id_name].localCity + "," + $apps[id_name].localState + " " + $apps[id_name].localZip);
    $('#app_homeaddress').html("<b>Home Address: </b></br>" +
        (($apps[id_name].homeAddress == null) ? "Same As Local" : ($apps[id_name].homeAddress + "</br>" + $apps[id_name].homeCity + "," + $apps[id_name].homeState + " " + $apps[id_name].homeZip)));
    $('#app_birth').html("<b>Date of Birth: </b> " + $apps[id_name].dateOfBirth);
    $('#app_standing').html("<b>Class Standing:</b> " + $apps[id_name].classStanding);
    $('#app_cgpa').html("<b>College GPA:</b> " + $apps[id_name].collegeGPA);
    $('#app_graduationDate').html("<b>Graduation Date:</b> " + $apps[id_name].graduationDate);
    $('#app_hgpa').html("<b>High School GPA:</b> " + $apps[id_name].highschoolGPA);
    $('#app_major').html("<b>Major:</b> " + $apps[id_name].major);
    $('#app_minor').html("<b>Minor:</b> " + (($apps[id_name].minor == null) ? "Does Not Have One" : $apps[id_name].minor));
    $('#app_workhours').html("<b>Preferred Weekly Hours:</b> " + $apps[id_name].preferredWeeklyHours);
    $('#app_referral').html("<b>Referral:</b> " + $apps[id_name].referral);
    $('#app_wsa').html("<b>Work Study Approved?:</b> " + $apps[id_name].workStudyApproved);
    $('#app_wasAmt').html("<b>Work Study Amount:</b> " + $apps[id_name].workStudyHours);
    return "#" + id_name;
}


//Populates modals for experiments
function populate_modal_exp(id_lab) {

    $('#lab_collap').html("");
    $('#lab_name').html("<h5>" + groupedData[id_lab][0].labName + "</h5>");

    $.each(groupedData[id_lab], function (key, value) {
        $('#lab_collap').append(
            "<li>" +
            " <div class='collapsible-header'><i class='material-icons'>filter_drama</i><span>" + value.experimentName + "</span ></div >" +
            "<div class='collapsible-body'></div></li>"
        );
    });
}

function populate_contacts(data) {
    $('#contact_collection').append(
        " <li class='collection-item avatar'>" +
        "<i class='material-icons circle green'>face</i>" +
        "<span class='title'>" + data.name + "</span>" +
        "<p>" + "<a href ='tel: " + data.phoneNumber + "'>" + data.phoneNumber + "</a> </p></li>");
}

function custom_filter(id_name) {

    $('#labarea').append(
        "<div class='divider'></div></br><div class='row valign-wrapper'><div class='col s2'><span class='black-text'><b>" + id_name[0].labName + "</b></span></div>" +


        " <div class='col s2'>" +

        " <a href='#lab_view' class='waves-effect waves-light btn green secondary-content modal-trigger' id=" + id_name[0].labID + " onclick='populate_modal_exp(this.id);' >View Lab</a>" +
        "</div> </div> "

    );

    $('#side_lab_links').append(
        " <li><a href='#lab_view' class=' modal-trigger' id=" + id_name[0].labID + " onclick='populate_modal_exp(this.id);' >CHEM " + id_name[0].labID + '</a ></li >'

    );

}

function toggle_view(id_array, current) {
    $.each(id_array, function (index, value) {
        if (value == current)
            $(value).removeClass("hide");
        else
            $(value).addClass("hide");
    });
};


