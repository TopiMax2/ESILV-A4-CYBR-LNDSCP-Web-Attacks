// xss-script.js

function postComment() {
    var commentInput = document.getElementById('comment').value;
    var commentsContainer = document.getElementById('comments');

    // Display the comment without proper sanitization (vulnerable to XSS)
    commentsContainer.innerHTML += '<p>' + commentInput + '</p>';
}