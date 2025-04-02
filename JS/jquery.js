$(document).ready(function () {
  // Event delegation method
  $(document).on("click", ".card-button", function () {
    const bodyType = $(this).data("body-type");
    console.log("Body Type:", bodyType); // For debugging

    if (bodyType) {
      window.location.href = `detail.php?body_type=${bodyType}`;
    }
  });
});

//Search for locations in the browse textbox
$(document).ready(function () {
  const locations = [
    "Main Street Science World",
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
