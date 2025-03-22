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
