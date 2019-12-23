function toastSuccess(message) {
  var x = document.getElementById("snackbar");
  x.style.backgroundColor = '#0047A0';
  
  var mes = document.getElementById('snackbar_message');
  mes.innerText = message;
  document.getElementById('snackbar_icon');
  var icon = document.getElementById('snackbar_icon');
  icon.className = 'fa fa-check';
  
  x.className = "show";

  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

function toastError(message) {
  var x = document.getElementById("snackbar");
  x.style.backgroundColor = '#CD2E3A';

  var mes = document.getElementById('snackbar_message');
  mes.innerText = message;
  document.getElementById('snackbar_icon');
  var icon = document.getElementById('snackbar_icon');
  icon.className = 'fa fa-close';

  x.className = "show";
  
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}