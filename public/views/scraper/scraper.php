<div class="slideshow">
	<div class="slideshow-container">
		<div class="slideshow-block">
			<div class="slideshow-block-button-field left"><div class="slider-button slider-button--left"></div></div><div class="slideshow-block-image hide"></div><div class="slideshow-block-button-field right"><div class="slider-button slider-button--right"></div></div>
		</div>
		<div class="slideshow-block-bolls">

		</div>
	</div>
</div>
<script type="text/javascript" language="JavaScript">

	let fetchit = () => {
		fetch('views/scraper/API.php')
			.then((response) => {
				// obtains the response and changes it into a json.
				return response.json();
			})
			.then((show) => {
				// then do something with the gained data (show), put first image and starts the slide.
				// and create the navigationbolls.
				let image = document.querySelector('.slideshow-block-image');

				image.style.backgroundImage = "url("+show[0]+")";
				image.classList.remove('hide');
				image.classList.add('show');

				makeBolls(show);
			});
	};

	let makeBolls = show => {
		let bolls = document.querySelector('.slideshow-block-bolls');
		let ball = [];
		for(let i = 0; i < show.length; i++) {
			ball = "<div class='slideshow-block-bolls__boll boll"+i+"'></div>";
			bolls.innerHTML += ball;
		}
		startSlide(show, -1);

	};

	let startSlide = (i, c) => {
		//defines the used variables
		let image = document.querySelector('.slideshow-block-image');
		let next = document.querySelector('.right');
		let prev = document.querySelector('.left');
		let n = c;
		let length = i.length;

		// if the counter is lower than the length of the images array, counter+1
		if (n < length - 1) {
			n++;
		}
		// if the counter is is not lower, counter resets
		else {
			n = 0;
		}

		// select the made bolls and put a clickevent on it so that the image background and the counter changes into the one a person clicked.
		for(let ni = 0; ni < length; ni++) {
			let bolls = document.querySelector('.boll'+ni);
			let others = document.querySelectorAll('.slideshow-block-bolls__boll')[ni];

			bolls.addEventListener('click', function(){
				n = ni;
				image.style.backgroundImage = "url("+i[n]+")";
			});
		}

		// click on next button
		next.addEventListener('click', () => {
			// if the counter is lower than the length of the images array, counter+1
			if (n < length - 1) {
				n++;
			} else {
			// if the counter is is not lower, counter resets
				n = 0;
			}
			// change the image after editing the counter
			image.style.backgroundImage = "url("+i[n]+")";
		});

		// next by pressing right button
		document.addEventListener('keydown', (e) => {
		// if rightbutton is pressed
			if(e.keyCode === 39) {
				// if the counter is lower than the length of the images array, counter+1
				if (n < length - 1) {
					n++;
				}
				// if the counter is is not lower, counter resets
				else {
					n = 0;
				}
				// change the image after editing the counter
				image.style.backgroundImage = "url("+i[n]+")";
			}
		});

		// click on previous button
		prev.addEventListener('click', () => {

			// if the counter is 0, change its value to the length of the image array.
			if (n === 0) {
				n = length -1;

			}
			// else, calculate the counter with minus 1
			else {
				n--;
			}
			// change the image after editing the counter
			image.style.backgroundImage = "url("+i[n]+")";
		});

		// previous by pressing left button
		document.addEventListener('keydown', (e) => {
			// if leftbutton is pressed
			if(e.keyCode === 37) {
				// if the counter is 0, change its value to the length of the image array.
				if (n <= 0) {
					n = length - 1;
				}
				// else, calculate the counter with minus 1
				else {
					n--;
				}
				// change the image after editing the counter
				image.style.backgroundImage = "url(" + i[n] + ")";
			}
		});

		image.classList.remove('show');
		image.classList.add('hide');

		// sets the image according to the counter
		setTimeout(() => {
			image.style.backgroundImage = "url("+i[n]+")";
		},1000);

		setTimeout(() => {
			image.classList.remove('hide');
			image.classList.add('show');
		},1000);

		// after 7.5 seconds, do it again.
		setTimeout(() => {
			startSlide(i, n);
		},7500);
	};

	fetchit();

</script>
