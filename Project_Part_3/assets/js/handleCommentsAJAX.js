function handleCommentSubmission(courtId) {
  // use jquery to get the comment and rating of the court
  let rating = $("#courtRating").find(":selected").text();
  let comment = $("#comment").val();
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
    success: function (data) {
      console.log(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
}
