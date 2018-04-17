// var postForm = document.getElementById('postForm');
//
// postForm.addEventListener('submit', postName);
document.getElementById('loadInterests').addEventListener('click', loadUsers);
// document.getElementById('name').addEventListener('input', loadUsers);
var functionCalled = false;

function loadUsers(){
  var functionCalled = true;
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'http://localhost:1234/fypmvc/interests/displayinterests', true);
  xhr.onload = function(){
    if (this.status == 200) {
      var interests = JSON.parse(this.responseText);
      var output = "";
        for(var i in interests){
          output += '<ul>' +
          '<li>ID: ' +interests[i].Interest_ID+'</li>' +
          '<li>Name: ' +interests[i].Description+'</li>' +
          '</ul>';
        }
      document.getElementById('interests').innerHTML = output;
    }
  }
  xhr.send();
}

function postName(e){
  e.preventDefault();

  var name = document.getElementById('name').value;
  var params = "name="+name;

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'process.php', true)
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

  xhr.onload = function(){
    console.log(this.responseText);
    if (this.responseText) {
      let timerId = setTimeout(() =>
        loadUsers(), 0000);
        postForm.reset();
    } else {
      console.log("LOAD USERS FIRST");
    }
  }

  xhr.send(params);
}
