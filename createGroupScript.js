function createGroup (user, name) {
	if(name=="")
	{
		document.getElementById("succes").innerHTML = "";
		return;
	}

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200){ 
			document.getElementById("succes").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","ajaxCreateGroup.php?user="+user+"&name=" + name, true);
	xmlhttp.send();
}