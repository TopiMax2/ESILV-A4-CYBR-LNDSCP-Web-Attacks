// Script for the XSS Webpage

function displayGreeting() {
    var userInput = document.getElementById('userInput').value;
    var greetingContainer = document.getElementById('greeting');
    greetingContainer.innerHTML = '<p>Hello, ' + userInput + '! Welcome to our vulnerable website!</p>';
}
