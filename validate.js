var data = new Date();
document.getElementById('data').innerHTML = data.getYear() + "-" + data.getMonth()+1 + "-" + data.getDate();
document.getElementById('time').value = data.getHours() + ":" + data.getMinutes();
