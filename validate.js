var data = new Date();
document.getElementById('data').innerHTML = data.getYear() + "-" + data.getMonth()+1 + "-" + data.getDate();
document.getElementById('time').value = data.getHours() + ":" + data.getMinutes();

document.getElementById('data').addEventListener("change", function(event){
  event.preventDefault();
  console.log("event.target");

});

document.getElementById('time').addEventListener("change", function(event){
  event.preventDefault();
  console.log("sss");

});
