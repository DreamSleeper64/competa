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
			document.querySelector('.component-test').style.display = "none";
		}
		else {
			console.log("function nonapple");
			document.querySelector('.component-test').style.display = "block";
		}

	}
	testit(apple);
})();