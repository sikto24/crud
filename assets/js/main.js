document.addEventListener('DOMContentLoaded', function () {
  console.log('Hello');
  var links = document.querySelectorAll('.delete');
  for (i = 0; i < links.lenth; i++) {
    links[i].addEventListener('click', function (e) {
      if (!confirm('Are You Sure?')) {
        e.preventDefault();
      }
    });
  }
});
