// script


window.addEventListener('DOMContentLoaded', () => {
    attachEvent();
    lazyLoadingImages();
})

const attachEvent = function () {
    let videos = document.getElementsByClassName('play-btn');
    for (let i = 0; i < videos.length; i++) {
      videos[i].onclick = handlePlay;
      document.getElementById(videos[i].dataset.video).onended = endVideo;
    }
}

const endVideo = (event) => {
  let video = event.target;
  video.classList.remove('playing');
  video.pause();
}

const handlePlay = (event) => {
  event.preventDefault();
    let video = document.getElementById(event.currentTarget.dataset.video);
    if (video.classList.contains('playing')) {
        video.classList.remove('playing');
        video.pause();
    } else {
        stopActiveVideo();
        video.play();
        video.classList.add('playing');
    }
}

const stopActiveVideo = () => {
    let video = document.getElementsByClassName('playing')
    if (video.length !== 0) {
        video[0].pause();
        video[0].classList.remove('playing');
    };
}

// Lazy Load

const lazyLoadingImages = function () {
  var lazyloadImages;    

  if ("IntersectionObserver" in window) {
    lazyloadImages = document.querySelectorAll(".lazy");
    var imageObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var element = entry.target;
          if (element.tagName == 'VIDEO') {
            element.poster = element.dataset.poster;
          } else {
            element.src = element.dataset.src;
          }
          element.classList.remove("lazy");
          imageObserver.unobserve(element);
        }
      });
    });

    lazyloadImages.forEach(function(image) {
      imageObserver.observe(image);
    });
  } else {  
    var lazyloadThrottleTimeout;
    lazyloadImages = document.querySelectorAll(".lazy");
    
    function lazyload () {
      if(lazyloadThrottleTimeout) {
        clearTimeout(lazyloadThrottleTimeout);
      }    

      lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
          if (img.offsetTop < (window.innerHeight + scrollTop)) {
              if (img.tagName == 'VIDEO') {
                img.poster = img.dataset.poster;
              } else {
                img.src = img.dataset.src;
              }
              img.classList.remove('lazy');
            }
        });
        if(lazyloadImages.length == 0) { 
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
        }
      }, 20);
    }

    document.addEventListener("scroll", lazyload);
    window.addEventListener("resize", lazyload);
    window.addEventListener("orientationChange", lazyload);
  }
}

