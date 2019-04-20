// Detele image from gallery
function _$(el) {
	return document.getElementById(el);
}

function delete_img_row(el_id) {
	var conf_delete = confirm('Do you really want to delete this image?');
	if (conf_delete == true) {
		// get the clicked element id
		var id = el_id;

		if (id != '') {
			_$('status').innerHTML = "Please wait ... ";

			var httpReq = new XMLHttpRequest();
			httpReq.open("POST", "delete_img.php", true);
			httpReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			httpReq.onreadystatechange = function() {
				if (httpReq.readyState == 4 && httpReq.status == 200) {
					_$('imgTb').innerHTML = httpReq.responseText;
					_$('status').innerHTML = '<div class="alert alert-success" role="alert">Image was successfully deleted</div>';
				}
			};
			httpReq.send('id='+id);
		}
	} else {
		_$('status').innerHTML = '<div class="alert alert-danger" role="alert">Image deletion was cancelled.</div>';
	}
}

// Hide image from public view
function hide_img(el_id) {
	var conf_hide = confirm("Are you sure?");
	if (conf_hide == true) {
		var id = el_id;


		if (id != '') {
			_$('status').innerHTML = "Please want ...";

			var httpReq = new XMLHttpRequest();
			httpReq.open("POST", "hide_img.php", true);
			httpReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			httpReq.onreadystatechange = function() {
				if (httpReq.readyState == 4 && httpReq.status == 200) {
					_$('imgTb').innerHTML = httpReq.responseText;
					_$('status').innerHTML = '<div class="alert alert-success" role="alert">Image is hiding successfully.</div>';
				}
			};
			httpReq.send('id='+id);
		}
	}
	else {
	_$('status').innerHTML = '<div class="alert alert-danger" role="alert">Image hide failed.</div>';
	}
} 

// Delete panel from panel
function delete_panel_row(el_id) {
	var conf_delete = confirm('Do you really want to delete this image?');
	if (conf_delete == true) {
		var id = el_id;

		if (id != '') {
			_$('status').innerHTML = "Please want ...";

			var httpReq = new XMLHttpRequest();
			httpReq.open("POST", "delete_panel.php", true);
			httpReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			httpReq.onreadystatechange = function() {
				if (httpReq.readyState == 4 && httpReq.status == 200) {
					_$('panel_div').innerHTML = httpReq.responseText;
					_$('status').innerHTML = '<div class="alert alert-success" role="alert">Panel was successfully deleted</div>';
				}
			};
			httpReq.send('id='+id);
		}
	}
	else {
	_$('status').innerHTML = '<div class="alert alert-danger" role="alert">Panel deletion was cancelled.</div>';
	}
} 

// Show hide panel row

function show_hide_panel_row(el_id) {
	var conf_delete = confirm('Are you sure?');
	if (conf_delete == true) {
		var id = el_id;

		if (id != '') {
			_$('status').innerHTML = "Please want ...";

			var httpReq = new XMLHttpRequest();
			httpReq.open("POST", "show_hide_panel.php", true);
			httpReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			httpReq.onreadystatechange = function() {
				if (httpReq.readyState == 4 && httpReq.status == 200) {
					$res = httpReq.responseText;
					
					_$('panel_div').innerHTML = httpReq.responseText;
					_$('status').innerHTML = '<div class="alert alert-success" role="alert">Operation successful.</div>';
				}
			};
			httpReq.send('id='+id);
		}
	}
	else {
	_$('status').innerHTML = '<div class="alert alert-danger" role="alert">Panel showing/ hiding was cancelled.</div>';
	}
} 


// function tips_edit() {
// 	_$('tip').innerHTML = 'Before edit, please copy all panel content and past them into the edit box.';
// 	return;
// }

// function tip_out() {
// 	_$('tip').innerHTML = '';
// 	return;
// }

// function copyToClipboard(myDiv1) {

//   // Create a "hidden" input
//   var aux = document.createElement("input");

//   // Assign it the value of the specified element
//   aux.setAttribute("value", document.getElementById(elementId).innerHTML);

//   // Append it to the body
//   document.body.appendChild(aux);

//   // Highlight its content
//   aux.select();

//   // Copy the highlighted text
//   document.execCommand("copy");

//   // Remove it from the body
//   document.body.removeChild(aux);

// }