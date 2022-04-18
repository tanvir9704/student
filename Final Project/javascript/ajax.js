
function getAllNurseDel() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("nurse").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../controller/getAllNurseDel.php?",true);
    xmlhttp.send();
    return;
}


function getAllDoctorDel() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("doctor").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../controller/getAllDoctorDel.php?",true);
    xmlhttp.send();
    getAllNurseDel();
    return;
}


function showResultEmp(str) {

    if (str.length==0) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("empShow").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","../controller/getAllEmployee.php?",true);
      xmlhttp.send();
      return;
    } else {

    document.getElementById("empShow").innerHTML=""; 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("empShow").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../controller/getEmployee.php?q="+str,true);
    xmlhttp.send();
  }
}


function deleteDoctor(str) {

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("doctor").innerHTML = this.responseText;
      getAllDoctorDel();
    }
  };
xmlhttp.open("GET","../controller/deleteDoctorDone.php?q="+str,true);
xmlhttp.send();

  
}

function deleteNurse(str) {

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("nurse").innerHTML = this.responseText;
      getAllNurseDel();
    }
  };
xmlhttp.open("GET","../controller/deleteNurseDone.php?q="+str,true);
xmlhttp.send();

  
}

function getAppointment() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("getAppointment").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../controller/getAppointment.php?",true);
    xmlhttp.send();
    return;
}



function showResult(str) {

    if (str.length==0) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("getAppointment").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","../controller/getAppointment.php?",true);
      xmlhttp.send();
      return;
    } else {

    document.getElementById("getAppointment").innerHTML=""; 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("getAppointment").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../controller/getSearch.php?q="+str,true);
    xmlhttp.send();
  }
}
