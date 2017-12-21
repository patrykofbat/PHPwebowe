
// sending ajax request to server for data for chatbox
function loadDoc(){
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "chatData.txt", true);
  xhttp.send();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
      document.getElementById('chat').innerHTML = this.responseText.replace(/(\r\n|\n|\r)/gm, "<br>");
    }
  }
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
  loadDoc();

  setInterval(function(){ // update chatbox per 2,5 sek
    loadDoc();
  },1000);

  if(document.readyState == "complete"){
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
