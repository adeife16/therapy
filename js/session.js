
// get session details from backend
function getSession(){
  $.ajax({
    url: 'api/v1/session.php?getSession=get',
    type: 'GET',
    cache: false,
  })
  .done(function(response) {
    // if response status is success, create session variables
    let res = JSON.parse(response);
    // console.log(data);
    if(res.status == 200){
      var session_details = res.data;
      setSession(session_details);
    }
    else if(res.status == 401){
      
    }
    });
  }

    // Hide or display login and signup, profile and logout link depending on session availability
    function setSession(session_details){
      if(session_details === null){
        // window.location.replace ('logout.php');
      }
      else{
        sessionStorage.clear();
        for(var index in session_details) {
          sessionStorage.setItem(index, session_details[index]);
        }
      }
      var sessionId = sessionStorage.getItem("user_id");
      var sessionName = sessionStorage.getItem("name");
      // var sessionPicture = sessionStorage.getItem("picture");
      var sessionRole = sessionStorage.getItem("role");
      if(sessionId == "" || sessionId === null){

        // window.location.replace ('logout.php');

      }
      else{
        // $("#session-div").html(`
        //     <div class="dropdown show">
        //       <a class=" color-black dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        //         Welcome, `+sessionName+`
        //       </a>

        //       <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        //         <a class="dropdown-item" href="profile.php">Profile</a>
        //         <a class="dropdown-item" href="logout.php">Logout</a>
        //       </div>
        //     </div>
        //   `);
        // $("#session-name").html(sessionName);
      }
    }
function setLogoutTimer() {
var myTimeout;
if (window.sessionStorage) {

    myTimeout = sessionStorage.timeoutVar;
    if (myTimeout) {
        clearTimeout(myTimeout);
    }

}

myTimeout = setTimeout(function () { logoutNow(); }, 18000000);  //adjust the time.
if (window.sessionStorage) {
    sessionStorage.timeoutVar = myTimeout;
}
}

function logoutNow() {
if (window.sessionStorage) {
    sessionStorage.timeoutVar = null;
}
//MAKE AN AJAX CALL HERE THAT WILL CALL YOUR FUNCTION IN
// CONTROLLER AND RETURN A URL TO ANOTHER PAGE
      sessionStorage.clear();

window.location.replace('logout.php')
}



$(document).ready(function() {
    getSession();
    // setLogoutTimer();
});