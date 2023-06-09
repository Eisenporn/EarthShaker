const shareLink = document.querySelectorAll('.share-link');
const shareButton = document.querySelectorAll('.share');

console.log(shareButton);

for (let i = 0; i < shareLink.length; i++) {
    shareLink[i].addEventListener('click', function(event){
        event.preventDefault();
        var linkToCopy = this.getAttribute('href');
        copyToClipboard(linkToCopy);
    });
}

function copyToClipboard(text){
    var tempInput = document.createElement('input');
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
}

var shareButtons = document.getElementsByClassName('share');
  for (var i = 0; i < shareButtons.length; i++) {
    shareButtons[i].addEventListener('click', function(event) {
      event.preventDefault();

      var button = this;
      button.innerText = 'Сохранено!';
      button.disabled = true;
    });
  }

