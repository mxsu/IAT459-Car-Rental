//For the card button on filter-cars.php
$(document).ready(function () {
  // Event delegation method
  $(document).on("click", ".card-button", function () {
    const carData = {
      manufacturer: $(this).data("manufacturer"),
      model: $(this).data("model"),
      bodyType: $(this).data("body-type"),
      price: $(this).data("price"),
      carCode: $(this).data("car-code"),
      seating: $(this).data("seating"),
    };
    console.log("Car Data:", carData); // For debugging
    $.ajax({
      type: "POST",
      url: "detail.php", // Path to PHP file that processes the session saving
      data: carData, // Send the car data in the POST request
      success: function (response) {
        console.log("Session saved:", response);
        window.location.href = "detail.php"; // Redirect to detail page
      },
      error: function () {
        alert("Failed to save car data to session. Please try again.");
      },
    });
  });
});

//index.php
//Search for locations in the index page textbox
$(document).ready(function () {
  const locations = [
    "Vancouver Main Street Science World",
    "Vancouver International Airport (YVR)",
  ]; // Your location list

  // Show suggestions when the input field is focused (without typing anything)
  $("#browse").on("focus", function () {
    const inputValue = $(this).val().toLowerCase(); // Get the value typed by the user (can be empty)
    const suggestions = $("#autocomplete-list");

    // Clear any previous suggestions
    suggestions.empty();

    // Display the suggestion list
    locations.forEach(function (location) {
      const suggestionItem = $("<div>").text(location).appendTo(suggestions);

      // When a suggestion is clicked, fill the input field and hide suggestions
      suggestionItem.on("click", function () {
        $("#browse").val($(this).text());
        suggestions.empty(); // Close the suggestion list
      });
    });
  });

  // Hide suggestions when clicked outside the input field or the suggestion box
  $(document).on("click", function (e) {
    if (!$(e.target).closest("#browse").length) {
      $("#autocomplete-list").empty(); // Close suggestions if clicked outside
    }
  });
});

$(document).ready(function() {
  function fetchCars(limit = 4) {
      let formData = $("#filter-form").serialize() + "&limit=" + limit;

      $.ajax({
          type: "POST",
          url: "filter-cars.php",
          data: formData,
          success: function(response) {
              $(".right-content").html(response);

              // Re-bind click after new content is loaded
              $(".pagination-btn").on("click", function() {
                  const page = $(this).data("page");
                  $("#page-number").val(page); // update hidden input
                  fetchCars(); // re-fetch with new page number
              });
          },
          error: function() {
              alert("Failed to retrieve cars. Please try again.");
          },
      });
  }

  // Fetch cars on page load
  fetchCars();

  // Fetch cars when filters are submitted
  $("#filter-form").submit(function(event) {
      event.preventDefault();
      $("#page-number").val(1); // reset to page 1
      fetchCars();
  });

  // Fetch cars when the search bar value changes (live search)
  $("#search-bar").on("input", function() {
      $("#page-number").val(1); // reset to page 1
      fetchCars(); // re-fetch with new search term
  });
});
