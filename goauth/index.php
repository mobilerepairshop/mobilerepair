
<body>
  <!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

  <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-app.js"></script>

  <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
  <script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-analytics.js"></script>

  <!-- Add Firebase products that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-firestore.js"></script>
  
</body>

<a onclick="googleSignin()"><img src="../google.png"></a>

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyDyQhgM0Q5UUIt-MbIIDzPpbpLVudkmKK4",
    authDomain: "hopeful-summer-292810.firebaseapp.com",
    databaseURL: "https://hopeful-summer-292810.firebaseio.com",
    projectId: "hopeful-summer-292810",
    storageBucket: "hopeful-summer-292810.appspot.com",
    messagingSenderId: "411937557386",
    appId: "1:411937557386:web:838b8dd854ca6d9a165673"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  function googleSignin(){
    var provider = new firebase.auth.GoogleAuthProvider();

    firebase.auth().signInWithPopup(provider).then
    (
      function(result) 
      {
        console.log("Google linked")
        console.log(result)
      }
   )

  }

  firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    console.log("User Signed in")
    name = user.displayName;
    email = user.email;
    photoUrl = user.photoURL;

    console.log(name)

  } else {
    console.log("User not Signed in")
  }
});
</script>