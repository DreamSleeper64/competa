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
