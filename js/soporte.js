document.addEventListener('DOMContentLoaded', function () {
    const expandableSections = document.querySelectorAll('.expandable');
  
    expandableSections.forEach(function (section) {
      section.addEventListener('click', function () {
        this.classList.toggle('expanded');
      });
    });
  });
  