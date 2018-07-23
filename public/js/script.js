var flashElement = document.querySelector('.flash-message-alert');

if (flashElement)
    setTimeout(function() {
        flashElement.remove();
    }, 3000);