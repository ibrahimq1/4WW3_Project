let comments;
function handleCommentSubmission(courtId) {
  // use jquery to get the comment and rating of the court
  let rating = $("#courtRating").find(":selected").text();
  let comment = $("#comment").val();

  // first AJAX call will update the comments table in database with newly added comment
  $.ajax({
    url: "/Project_Part_3/scripts/add_comment.php",
    method: "POST",
    data: JSON.stringify({
      courtId: courtId,
      rating: rating,
      comment: comment,
    }),

    // instead of setting headers on server side to trigger error function
    // our implementation does error handling in the success block depending on the response data
    // returned
    success: function (response) {
      let data = JSON.parse(response);

      // use JQuery to display error flash message on invidivudal_court.php
      if (data.response_status === "error") {
        let errorMessage = data.response_description;

        // case where error message wasn't already displayed
        if ($("#flash-error").css("display") == "none") {
          $("#flash-error").css("display", "block");
          $("#flash-error").html(errorMessage);
        }
        // case where error message was already displayed, but with different error
        else if ($("#flash-error").text() !== errorMessage) {
          $("#flash-error").html(errorMessage);
        }
        return;
      }
      // if database update was successfull, we need to do a get request to our server to retrieve list of
      // all comments associated with a court using the courtId
      else if (data.response_status === "success") {
        // make sure to disable error flash message
        if ($("#flash-error").css("display") == "block") {
          $("#flash-error").css("display", "none");
        }
        $.ajax({
          url:
            "/Project_Part_3/scripts/retrieve_comments.php?courtId=" + courtId,
          method: "GET",
          data: JSON.stringify({
            courtId: courtId,
          }),
          datatype: "json",
          success: function (response) {
            let data = JSON.parse(response);

            // use JQuery to display error flash message on invidivudal_court.php
            if (data.response_status === "error") {
              let errorMessage1 = data.response_description;
              // case where error message wasn't already displayed
              if ($("#flash-error").css("display") == "none") {
                $("#flash-error").css("display", "block");
                $("#flash-error").html(errorMessage1);
              }
              // case where error message was already displayed, but with different error
              else if ($("#flash-error").text() !== errorMessage1) {
                $("#flash-error").html(errorMessage1);
              }
              return;
            }

            // otherwise use jquery to render comments
            else {
              let contentString;
              comments = data.data;
            }
          },
        });
      }
    },
    error: function (response) {
      console.log(response);
    },
  });
}
