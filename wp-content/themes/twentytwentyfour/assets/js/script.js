document.addEventListener('DOMContentLoaded', function () {
	const button = document.querySelector('.generate_image');
	const imgContainer = document.querySelector('.img-container');

	button.addEventListener('click', function () {
		const input = document.querySelector('#prompt').value;
		if (input.trim() !== '') {
			fetch(myAjax.ajaxurl, {  // Using myAjax.ajaxurl here
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
