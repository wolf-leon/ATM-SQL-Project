function onSubmit() {
  if (document.getElementById("password").value == "1234") {
    window.location.href = "denomination.php";
  } else {
    alert("Access Denied, Please try again");
  }
}
