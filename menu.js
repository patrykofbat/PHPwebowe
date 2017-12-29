var interval = null;
// sending ajax request to server for data for chatbox
function loadDoc(){
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "chatData.txt", true);
  xhttp.setRequestHeader("Cache-Control", "no-cache");
  xhttp.send();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
      document.getElementById('chat').innerHTML = this.responseText.replace(/(\r\n|\n|\r)/gm, "<br>");
    }
  }
}

function triggerInterval() {
  interval = setInterval(function(){ // update chatbox
    loadDoc();
  },1000);
}

function stopInterval(){
  console.log("stop!");
  clearInterval(interval);
}



function postByAjax(data){
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "chat.php", true);
  xhttp.send(data);
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      loadDoc();
    }
  }
}

// when document is mounted
document.onreadystatechange = function(){
  if(document.readyState == "complete"){
    document.getElementById('check').addEventListener("change", function(){
      console.log(this.checked);
      if(this.checked){ // active
        triggerInterval();
      }
      else{ //inactive
        stopInterval();
        document.getElementById('chat').innerHTML = "";

      }
    });

      document.getElementById('Btn').addEventListener("click", function(event){
        event.preventDefault();
        var nick = document.getElementById('userName').value;
        var data = document.getElementById('fieldText').value;
        var formData = new FormData();
        formData.append('data', data);
        formData.append('userName', nick);
        postByAjax(formData);
    });
  }
}
