function iFrameOn() {
	richTextField.document.designMode = 'on';
}

function iBold() {
	richTextField.document.execCommand('bold', false, null);
}

function iUnderline() {
	richTextField.document.execCommand('underline', false, null);
	
}

function iItalic() {
	richTextField.document.execCommand('italic', false, null);

}

function iFontSize() {
	var size = prompt('Enter a size 1 - 7', '');
	richTextField.document.execCommand('FontSize', false, size);
}

function iForeColor() {
	var color = prompt('Define a basic color or apply a hexadecimal color code for advance solors:', '');
	richTextField.document.execCommand('ForeColor', false, color);
}

function iHorizontalRule() {
	richTextField.document.execCommand('inserthorizontalrule', false, null);	
}

function iOrderedList() {
	richTextField.document.execCommand('InsertOrderedList', false, 'newOL');	
}

function iUnorderedList() {
	richTextField.document.execCommand('InsertUnorderedList', false, 'newUL');	
}

function iLink() {
	var linkURL = prompt("Enter the url for this link:", "http://");
	richTextField.document.execCommand('CreateLink', false, linkURL);	
}

function iUnLink() {
	richTextField.document.execCommand('Unlink', false, null);		
}

function iImage() {
	var imgSrc = prompt('Enter image location', '');
	if (imgSrc != null) {
		richTextField.document.execCommand('insertimage', false, imgSrc);
	}
}

function submit_form() {
	var theForm = document.getElementById('myform');
	theForm.elements['myTextArea'].value = window.frames['richTextField'].document.body.innerHTML;

	var ph = document.getElementById('panel_heading').value;
	var pb = document.getElementById('myTextArea').value;

	if(pb.trim() == '' && ph.trim() == '') {

		document.getElementById('errForm').style.display = 'block';
		document.getElementById('errForm').innerHTML = 'Please fill out all form data';
		return;


	  	// var x = document.createElement('div').className = alert alert-danger;
	  	// var y = document.getElementsByClassName('msg');
	  	// var p = document.createElement('p');
	  	// var yp = y.appendChild(p).innerHTML = 'Please fill all fields';
	  	// var xy = y.appendChild(x);
	  	// xy.innerHTML = 'Please fill all fields';
		//document.getElementById('error_js').innerHTML = 
		//document.getElementsByClassName('alert-danger').innerHTML = 'Please fill all fields';
		return;
	}

	theForm.submit();
}



function slAlert() {
	var e = document.getElementById("sld");
	var sv = e.options[e.selectedIndex].value;
	if(sv.trim() == 0) {
	 alert("This post not gonna be show for public");
	}
}


