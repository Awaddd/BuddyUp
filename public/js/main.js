hideThis = function (id) {
  document.getElementById(id).style.display = 'none';
}

showThis = function (id) {
  document.getElementById(id).style.display = 'block';
}

let nextBtn = document.getElementById('nextBtn');
nextBtn.addEventListener('click', function () {
  hideThis('loginDetails');
  hideThis('nextBtn');

  showThis('personalDetails');
  showThis('backBtn');
  showThis('submitBtn');

  document.getElementById('content').style.height = "380px";
});

let backBtn = document.getElementById('backBtn');
backBtn.addEventListener('click', function () {
  hideThis('personalDetails');
  hideThis('backBtn');
  hideThis('submitBtn');

  showThis('loginDetails');
  showThis('nextBtn');

  document.getElementById('content').style.height = "320px";
});
