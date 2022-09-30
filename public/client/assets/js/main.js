var tabLinks = document.querySelectorAll(".tablinks");
var tabContent = document.querySelectorAll(".tabcontent");

tabLinks.forEach(function (el) {
  el.addEventListener("click", openTabs);
});

function openTabs(el) {
  var btn = el.currentTarget; // lắng nghe sự kiện và hiển thị các element
  var electronic = btn.dataset.electronic; // lấy giá trị trong data-electronic

  tabContent.forEach(function (el) {
    el.classList.remove("active");
  });

  tabLinks.forEach(function (el) {
    el.classList.remove("active");
  });

  document.querySelector("#" + electronic).classList.add("active");

  btn.classList.add("active");
}

function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
      x.type = "text";
  } else {
      x.type = "password";
  }
}
function showPassword1() {
  var y=document.getElementById("password_confirmation");
  if (y.type === "password") {
      y.type = "text";
  } else {
      y.type = "password";
  }
}

