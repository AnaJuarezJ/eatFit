// Función para mostrar la vista previa del video
document.addEventListener("DOMContentLoaded", function() {
    const videoUrl = "<?php echo isset($_SESSION['video_url']) ? $_SESSION['video_url'] : '' ?>";
    const videoPreview = document.querySelector("#video-preview");

    if (videoUrl !== "") {
        if (videoUrl.includes("youtube.com")) {
            const videoId = videoUrl.split("?v=")[1];
            videoPreview.innerHTML = `<iframe width="560" height="315" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>`;
        } else if (videoUrl.includes("vimeo.com")) {
            const videoId = videoUrl.split("/").pop();
            videoPreview.innerHTML = `<iframe src="https://player.vimeo.com/video/${videoId}" width="560" height="315" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>`;
        }
    } else {
        videoPreview.innerHTML = "<p>URL del video no válida</p>";
    }
});
