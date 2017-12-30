var timestamp = null;
var flag = false;
var timeout = null;
// sending ajax request to server for data for chatbox
function loadDoc(timestamp){
  var queryString = {'timestamp' : timestamp};

  var xhttp = new XMLHttpRequest();

  xhttp.open("GET", "longPollServer.php", true);
  xhttp.setRequestHeader("Cache-Control", "no-cache");
  xhttp.send(queryString);
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      var obj = JSON.parse(this.response);
      document.getElementById('chat').innerHTML = obj.data_from_file.replace(/(\r\n|\n|\r)/gm, "<br>");
      timestamp = obj.timestamp;
    }
  }
}



function recursionSetTimeout(){
    timeout = setTimeout(function() {
    console.log("rekursja leci elo!");
    loadDoc(timestamp);
    recursionSetTimeout();
  },5000);
}


function postByAjax(data){
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "chat.php", true);
  xhttp.send(data);
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      loadDoc(timestamp);
    }
  }
}

// when document is mounted
document.onreadystatechange = function(){
  if(document.readyState == "complete"){
    document.getElementById('check').addEventListener("change", function(){
      if(this.checked){ // active
        flag = true;
        loadDoc(timestamp);
        recursionSetTimeout();
      }
      else{ //inactive
        clearTimeout(timeout);
        document.getElementById('chat').innerHTML = "";
        flag = false;

      }
    });

      document.getElementById('Btn').addEventListener("click", function(event){
        event.preventDefault();
        var nick = document.getElementById('userName').value;
        var data = document.getElementById('fieldText').value;
        var formData = new FormData();
        formData.append('data', data);
        formData.append('userName', nick);
        if(flag == true)
          postByAjax(formData);
    });
  }
}
