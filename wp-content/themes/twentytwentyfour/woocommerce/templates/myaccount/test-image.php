<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Generator</title>
</head>
<body>
    <div class="container">
        <div class="user-action">
            <label for="word">Enter a word:</label>
            <input type="text" name="prompt" id="prompt" required />
            <button type="button" class="generate_image">Generate Image</button>
        </div>

        <div class="img-container"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const button = document.querySelector('.generate_image');
            const imgContainer = document.querySelector('.img-container');

            button.addEventListener('click', function () {
                const input = document.querySelector('#prompt').value;
                if (input.trim() !== '') {
                    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'action=my_image_generator&prompt=' + encodeURIComponent(input),
                    })
                    .then(response => response.json())
                    .then(data => {
                        imgContainer.innerHTML = '';
                        data.forEach(e => {
                            var img = document.createElement('img');
                            img.src = 'data:image/jpeg;base64,' + e.b64_json;
                            imgContainer.appendChild(img);
                        });
                    })
                    .catch(error => console.error('Error:', error));
                }
            });
        });
    </script>
</body>
</html>
<?php
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
