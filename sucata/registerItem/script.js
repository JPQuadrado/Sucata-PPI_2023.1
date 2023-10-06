window.addEventListener('pageshow', function(event) {
  // Check if the page is being shown from the cache or if it's a fresh page load
  if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
    // Get all the input fields
    var inputFields = document.querySelectorAll('input');

    // Clear the values of each input field
    inputFields.forEach(function(input) {
      input.value = '';
    });
  }
});


