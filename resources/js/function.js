(function () {

	let apple = "apple";
	let pear = "pear";

	if (apple === "pear") {
		console.log("whut? the pear isnt an apple");
	}
	if (apple === "apple") {
		console.log("Awyeah its an apple!")
	}

	function testit(apple) {
		if (apple === "apple") {
			console.log("function_apple");
			setTimeout(function() {
				document.querySelector('.component-test').classList.remove('component--shown');
				document.querySelector('.component-test').classList.add('component--hidden');
			},1500);
		}
		else {
			console.log("function nonapple");
			setTimeout(function() {
				document.querySelector('.component-test').classList.remove('component--hidden');
				document.querySelector('.component-test').classList.add('component--shown');
			},1500);		}

	}
	testit(apple);
})();
