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

function sendEmail(name, email, message) {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'https://api.sendinblue.com/v3/smtp/email');
  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.setRequestHeader('api-key', process.env.MY_SENDINBLUE_KEY);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      console.log(xhr.response);
    }
  };
  var body = {
    "sender": {
      "name": name,
      "email": email
    },
    "to": [
      {
        "email": "gnrrobotics@gmail.com",
        "name": "GnR Robotics"
      }
    ],
    "htmlContent": message,
    "subject": "Message from " + name,
    "replyTo": {
      "email": email,
      "name": name
    }
  };
  xhr.send(JSON.stringify(body));
}

var submitButton = document.querySelector('input[type="submit"]');
submitButton.addEventListener('click', function(event) {
  event.preventDefault();
  var nameInput = document.getElementById('name');
  var emailInput = document.getElementById('email');
  var messageInput = document.getElementById('message');
  var name = nameInput.value;
  var email = emailInput.value;
  var message = messageInput.value;
  sendEmail(name, email, message);
});

const form = document.querySelector('#contact-form');
form.addEventListener('submit', (e) => {
  e.preventDefault();
  // You can replace the URL below with the URL of your thank-you page
  window.location.href = 'thank-you.html';
});
