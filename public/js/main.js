(function () {

	if(document.querySelector("#scraper")){
		fetch("scraper.php")
			.then(function() {
			document.write(data);
		})
			.catch(function() {

			})
	}
	else{
		document.write("no");
	}

})();

(function () {
	console.log('a');
})();
(function () {

	let apple = "apple";
	if (apple === "pear") {
		console.log("v");
	}
	if (apple === "apple") {
		console.log("c")
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
