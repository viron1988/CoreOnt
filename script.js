// Define a function to handle clicks on article links
function handleArticleClick(event) {
  // Prevent the link from navigating to a new page
  event.preventDefault();
  
  // Get the URL of the article from the link's href attribute
  var articleUrl = event.target.getAttribute("href");
  
  // Set the current page URL to the article URL
  window.location = articleUrl;
}

// Get a reference to the article list element
var articleList = document.getElementById("article-list");

// Add a click event listener to each article link
var articleLinks = articleList.getElementsByTagName("a");
for (var i = 0; i < articleLinks.length; i++) {
  articleLinks[i].addEventListener("click", handleArticleClick);
}
