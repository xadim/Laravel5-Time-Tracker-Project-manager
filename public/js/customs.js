
function deleteUser(id) {
    if (confirm('Are you sure you want to delete this user?')) {
        $.ajax({
            type: "DELETE",
            url: 'users/' + id, //resource
            complete: function(jqXHR) {
                if(jqXHR.readyState === 4) {
                //if something was deleted, we redirect the user to the users page, and automatically the user that he deleted will disappear
                    window.location = 'users';
                }
            }
        });
    }
}


function deleteClient(id) {
    if (confirm('Are you sure you want to delete this client?')) {
        $.ajax({
            type: "DELETE",
            url: 'clients/' + id, //resource
            complete: function(jqXHR) {
                if(jqXHR.readyState === 4) {
                //if something was deleted, we redirect the user to the users page, and automatically the user that he deleted will disappear
                    window.location = 'clients';
                }
            }
        });
    }
}

function deletePhase(id) {
    if (confirm('Are you sure you want to delete this phase?')) {
        $.ajax({
            type: "DELETE",
            url: 'phases/' + id, //resource
            complete: function(jqXHR) {
                if(jqXHR.readyState === 4) {
                //if something was deleted, we redirect the user to the users page, and automatically the user that he deleted will disappear
                    window.location = 'phases';
                }
            }
        });
    }
}

function ConfirmDelete()
{
	var x = confirm("Are you sure you want to delete this project?");
	if (x)
	return true;
	else
	return false;
}

function deleteProject(id) {
    if (confirm('Are you sure you want to delete this phase?')) {
        $.ajax({
            type: "DELETE",
            url: 'projects/' + id, //resource
            complete: function(jqXHR) {
                if(jqXHR.readyState === 4) {
                    window.location = 'projects';
                }
            }
        });
    }
}

function UpdateStatus(id, slug, statusName, currentStatus) {

    var res = id.split(", ");

    var ids = res[0];
    var slugs = res[1];
    var statusNames = res[2];
    var currentStats = res[3];


    $.ajax({
        type: "get",
        url: 'singleTask/'+ id,
        dataType    : 'json', // what type of data do we expect back from the server
        encode          : true,

        complete: function(jqXHR) {
                if(jqXHR.readyState === 4) {
                //if something was deleted, we redirect the user to the users page, and automatically the user that he deleted will disappear
                   // window.location = slugs;
                    $("#timing").load(location.href);
                }
            }
        })
        
}


function UpdateTiming(id, slug, statusName, currentStatus) {

    var res = id.split(", ");

    var ids = res[0];
    var slugs = res[1];
    var statusNames = res[2];
    var currentStats = res[3];


    $.ajax({
        type: "get",
        url: 'phases/addTiming/'+ id,
        dataType    : 'json',
        encode          : true,

        complete: function(jqXHR) {
                if(jqXHR.readyState === 4) {
                    $('#timing').load(document.URL +  ' #timing');
                }
            }
        })
        
}

//http://c3drive.com:8000/projects/singleTask/62,%20test,%20status_des,%20start



function getval(input) {

    var arr = [input.id, input.value];
    //alert(arr);
        $.ajax({
            type: "GET",
            url: 'phases/updateTaskTitle/' + arr,
            complete: function(jqXHR) {
                if(jqXHR.readyState === 4) {
                    $('#timing').load(document.URL +  ' #timing');
                    $( ".log" ).text( "Task Title modified to " +  input.value);
                }
            }
        });
    
}



function getstatus(sel) {

    var arr = [sel.id, sel.value];
    //alert(arr);
     $.ajax({
            type: "GET",
            url: 'projects/updateProjectStatus/' + arr,
            complete: function(jqXHR) {
                if(jqXHR.readyState === 4) {
                    var status = 'updated';
                    console.log(status);
                    $('#timing').load(document.URL +  ' #timing');
                    $( ".log" ).text( "Project Status modified to " +  sel.value);
                }
            }
        });
}

















