const shareButton = document.querySelector('#share');
const thisUrl = window.location.href;
const thisTitle = document.title;

shareButton.addEventListener('click', event => {
  if (navigator.share) {
    navigator.share({
      title: thisTitle,
      url: thisUrl
    })
    .then(() => {
      // alert('Thanks for sharing!')
    })
    .catch(console.error);
  } else {
    window.open(`https://example.com/share?url=${encodeURIComponent(thisUrl)}`);
  }
});