// Define a function to handle clicks on article links
function handleArticleClick(event) {
  // Prevent the link from navigating to a new page
  event.preventDefault();
  
  // Get the URL of the article from the link's href attribute
  var articleUrl = event.target.getAttribute("href");

  // Send an AJAX request to the server to log the article click
  $.ajax({
    url: "/log-click.php",
    type: "POST",
    data: { url: articleUrl },
    success: function() {
      // If the request was successful, navigate to the article URL
      window.location = articleUrl;
    },
    error: function() {
      // If there was an error with the request, log the error to the console
      console.log("Error logging article click.");
    }
  });
}

// Get a reference to the article list element
var articleList = document.getElementById("article-list");

// Add a click event listener to each article link
var articleLinks = articleList.getElementsByTagName("a");
for (var i = 0; i < articleLinks.length; i++) {
  articleLinks[i].addEventListener("click", handleArticleClick);
}
