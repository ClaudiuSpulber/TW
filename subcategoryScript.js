function favorite (product, user) {
	if(product=="")
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
	xmlhttp.open("GET","ajaxFavorite.php?user="+user+"&product=" + product, true);
	xmlhttp.send();
}

function list(product, user){
	if(product=="")
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
	xmlhttp.open("GET","ajaxList.php?user="+user+"&product=" + product, true);
	xmlhttp.send();
}
