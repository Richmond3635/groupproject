//create a function to add a message to the chat window
function addMessage(message) {
  var messageDisplay = document.getElementById("messageDisplaySection");
  var newMessage = document.createElement("div");
  newMessage.innerHTML = message;
  messageDisplay.appendChild(newMessage);
  scrollToBottom();
}

// Call the addMessage function when the user submits a message
document.getElementById("send").addEventListener("click", function() {
  var message = document.getElementById("messages").value;
  if(message != ""){
    addMessage(message);
    document.getElementById("messages").value = "";
  }
});

//create a function to scroll to the bottom of the chat window
function scrollToBottom() {
  var chatWindow = document.getElementById("messageDisplaySection");
  chatWindow.scrollTop = chatWindow.scrollHeight;
}