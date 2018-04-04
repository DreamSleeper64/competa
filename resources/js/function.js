(function () {

	let apple = "apple";
	if (apple === "pear") {
	}
	if (apple === "apple") {
	}

	function testit(apple) {
		if (apple === "apple") {
			setTimeout(function() {
				document.querySelector('.component-test').classList.remove('component--shown');
				document.querySelector('.component-test').classList.add('component--hidden');
			},1500);
		}
		else {
			setTimeout(function() {
				document.querySelector('.component-test').classList.remove('component--hidden');
				document.querySelector('.component-test').classList.add('component--shown');
			},1500);		}

	}
	testit(apple);
})();
