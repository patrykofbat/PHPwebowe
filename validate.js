var data = new Date();
var counter = 0;
var dateControl = document.getElementById('date');
var timeControl = document.getElementById('time');

function parseDate(data){
  var mm = data.getMonth() +1;
  var dd = data.getDate();
  return data.getFullYear() + "-" +
  (mm>9 ? "" : "0") + mm + "-" +
  (dd>9 ? "" : "0") + dd;
}

function parseTime(data){
  var hh = data.getHours();
  var minutes = data.getMinutes();
  return (hh>9 ? "" : "0") + hh + ":" +
        (minutes>9 ? "" : "0") + minutes;
}

function handleSumbit(){
  counter++;
  var node = document.createElement("input");
  node.setAttribute("type", "file");
  node.setAttribute("value", "Dodaj zalacznik");
  node.setAttribute("name", String(counter));
  document.getElementById('zalaczniki').appendChild(node);

}

dateControl.value = parseDate(data);
timeControl.value = parseTime(data);


document.getElementById('form').addEventListener("submit",function(event){
  event.preventDefault();
  pattern = /\b\d{2}\b/;
  patternYear = /\b\d{4}\b/;
  var dataArray = document.getElementById('date').value.split("-");
  var timeArray = document.getElementById('time').value.split(":");
  console.log(timeArray[0]);
  console.log(pattern.test(timeArray[0]));
  if( !pattern.test(timeArray[0]) || !pattern.test(timeArray[1]) || parseInt(timeArray[0])>23 || parseInt(timeArray[1])>59 ){
    alert("Invalid format");
    dateControl.value = parseDate(data);
    timeControl.value = parseTime(data);
  }
  else if( !patternYear.test(dataArray[0]) || !pattern.test(dataArray[1]) ||
   !pattern.test(dataArray[2]) || parseInt(dataArray[0])< 0 ||
   parseInt(dataArray[1]) < 0 || parseInt(dataArray[1]) > 12 ){
    alert("Invalid format");
    dateControl.value = parseDate(data);
    timeControl.value = parseTime(data);
  }


  // var xhttp = new XMLHttpRequest();
  // xhttp.open("POST", "addwpis.php", false);
  console.log(dataArray);
  console.log(timeArray);
});
