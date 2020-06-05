//4-response finished 200-ok
function showTable(str) {
    if (str == "") {//value din buton
      document.getElementById("show-table").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("show-table").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","gettable.php?q="+str,true);
      xmlhttp.send();
    }
  }

  function add(str){//value din buton
      if(str=="")
      {
          document.getElementById("succes").innerHTML = "";
          return;
      }
      else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){ 
                document.getElementById("succes").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","add.php?q="+str, true);
        xmlhttp.send();
      }

  }