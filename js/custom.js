document.addEventListener('DOMContentLoaded', function () {
    var playButton = document.getElementById('playButtonLink');
    var videoContainer = document.getElementById('introVideo');
    var slideshow = document.getElementById('carousel-item');
    var video = document.getElementById('introVideovideo');

    if (playButton) {
        playButton.addEventListener('click', function (event) {
            event.preventDefault();
            
            // Hide slideshow
            document.querySelector('.carousel-item.active').classList.remove('active');

            // Show video
            videoContainer.style.display = 'inline';

            video.play();
        });
    }



});



