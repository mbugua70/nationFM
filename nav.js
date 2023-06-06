const form = document.getElementById("form_el");

form.addEventListener(
  "submit",
  function (e) {
    e.preventDefault();
    window.open("file:///C:/xampp/htdocs/www-stasoft/index.html");
  },
  false
);
