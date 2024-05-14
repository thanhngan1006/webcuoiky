function myFunction() {
  var x = document.getElementById("password_hash");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
