<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Add your CSS styles here */
        #slideshow {
            position: relative;
            max-width: 100%;
            height: auto;
            overflow: hidden;
        }
        #slideshow img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: auto;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        #slideshow img.active {
            opacity: 1;
        }
    </style>
</head>
<body>

<div id="slideshow"></div>

<script>
    $(document).ready(function() {
        const IMAGE_DATA = [
            "http://localhost/MIDTERMJSINSTAGRAM/logo/1.png",
            "http://localhost/MIDTERMJSINSTAGRAM/logo/2.png",
            "http://localhost/MIDTERMJSINSTAGRAM/logo/3.png",
            "http://localhost/MIDTERMJSINSTAGRAM/logo/4.png",
        ];
        let currentIndex = 0;

        function showSlides() {
            // Clear existing images
            $('#slideshow').empty();

            // Add images to slideshow
            for (let i = 0; i < IMAGE_DATA.length; i++) {
                let img = $('<img>').attr('src', IMAGE_DATA[i]);
                if (i === currentIndex) {
                    img.addClass('active');
                }
                $('#slideshow').append(img);
            }

            // Increment index for next slide
            currentIndex = (currentIndex + 1) % IMAGE_DATA.length;

            // Show next slide after 3 seconds
            setTimeout(showSlides, 3000);
        }

        showSlides(); // Start the slideshow
    });
</script>

</body>
</html>
