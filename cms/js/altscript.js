function togglePopUp(id) {
    var popup = document.getElementById(id);
    if (popup.style.display === "block") {
      popup.style.display = "none"; // hide the pop-up
    } else {
      popup.style.display = "block"; // show the pop-up
    }
  }
  

  function hideContainer() {
    var container = document.querySelector('.hidethis');
    container.style.display = 'none';
    }