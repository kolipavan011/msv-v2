// script


window.addEventListener('DOMContentLoaded', () => {
    let videos = document.getElementsByClassName('play-btn');
    for (let i = 0; i < videos.length; i++) {
        videos[i].onclick = handlePlay;
    }
})

const handlePlay = (event) => {
    event.preventDefault();
    let video = document.getElementById(event.target.dataset.video);
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