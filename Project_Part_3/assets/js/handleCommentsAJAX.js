let comments;
function handleCommentSubmission(courtId) {
  // use jquery to get the comment and rating of the court
  let rating = $("#courtRating").find(":selected").text();
  let comment = $("#comment").val();
  let date = new Date().toISOString().slice(0, 10);

  // first AJAX call will update the comments table in database with newly added comment
  $.ajax({
    url: "/Project_Part_3/scripts/add_comment.php",
    method: "POST",
    data: JSON.stringify({
      courtId: courtId,
      rating: rating,
      comment: comment,
      date: date,
    }),

    // instead of setting headers on server side to trigger error function
    // our implementation does error handling in the success block depending on the response data
    // returned
    success: function (response) {
      let data = JSON.parse(response);

      // use JQuery to display error flash message on invidivudal_court.php
      if (data.response_status === "error") {
        let errorMessage = data.response_description;
        // make sure to disable success flash message
        if ($("#flash-success").css("display") == "block") {
          $("#flash-success").css("display", "none");
        }

        // case where error message wasn't already displayed
        if ($("#flash-error").css("display") == "none") {
          $("#flash-error").css("display", "block");
          $("#flash-error").html(errorMessage);
        }
        // case where error message was already displayed, but with different error
        else if ($("#flash-error").text() !== errorMessage) {
          $("#flash-error").html(errorMessage);
        }
        window.scrollTo(0, 0);
        return;
      }
      // if database update was successfull, we need to do a get request to our server to retrieve list of
      // all comments associated with a court using the courtId
      else if (data.response_status === "success") {
        // make sure to disable error flash message
        if ($("#flash-error").css("display") == "block") {
          $("#flash-error").css("display", "none");
        }

        let successMessage = data.response_description;
        // case where success message wasn't already displayed
        if ($("#flash-success").css("display") == "none") {
          $("#flash-success").css("display", "block");
          $("#flash-success").html(successMessage);
        }
        // case where success message was already displayed, but with different message
        else if ($("#flash-success").text() !== successMessage) {
          $("#flash-success").html(successMessage);
        }
        window.scrollTo(0, 0);

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
              window.scrollTo(0, 0);
              return;
            }

            // otherwise use jquery to render comments
            else {
              comments = data.data;
              let renderedComments = $("#commentContainer").children();
              let renderedCommentIds = [];

              for (let i = 0; i < renderedComments.length; i++) {
                let id = parseInt(renderedComments[i]["id"]);
                renderedCommentIds.push(id);
              }

              //loop through comments, append to comment container
              for (let i = 0; i < comments.length; i++) {
                if (!renderedCommentIds.includes(parseInt(comments[i].id))) {
                    rating="";
                    stars = 0;
                    for(k=0; k < comments[i].rating; k++){
                      rating += '<span class="bi bi-star-fill"></span>';
                      stars+= 1;
                    }
                    for(k=0; k < 5 - stars; k++){
                      rating+= '<span class="bi bi-star"></span>';
                    }

                  document.getElementById("commentContainer").innerHTML +=
                    "<div id=" +
                    comments[i].id +
                    'class="row" itemscope itemtype="https://schema.org/Review">' +
                    '<div class="col-md-12">' +
                    '<strong itemprop="author">' +
                    comments[i].username +
                    "</strong>" +
                    "</br>" +
                    "<span> Rating:" +
                    rating +
                    "</span>" +
                    '<meta itemprop="reviewRating" content="3">' +
                    '<span class="float-end" itemprop="datePublished">' +
                    comments[i].date +
                    "</span>" +
                    '<p itemprop="reviewBody">' +
                    comments[i].comment +
                    "</p>" +
                    "</div>" +
                    "</div>";
                }
              }
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
