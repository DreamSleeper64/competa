<?php
session_start();

if(isset($_POST['submit'])) {
	$string = "/^[a-zA-Z0-9_ ]*$/";
	$float = "/\d{1,20}[,.]\d{1,2}$/";
	$boolean = "/\d{1,1}/";
	$int = "/^\d{1,20}$/";
	$message = [];

	$title = $_POST['title'];
	$description = $_POST['description'];
	$test = $_POST['gender'];

	$price = $_POST['price'];

	$price = str_replace(",", ".", $price);

	if(!is_string($price) && $price == 0) {
		$message[3] = "A price cannot be 0 and must contain numbers";
	}

	if (preg_match($string, $title)) {
		$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRIPPED);
	}
	else {
		$message[0] = "Please only use letters, numbers or spaces";
	}
	if (preg_match($string, $description)) {
		$description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
	}
	else {
		$message[1] = "Please only use letters, numbers or spaces";
	}

	if (!preg_match($float, $price) && (!preg_match($int, $price))) {
		$message[2] = "Please only use numbers and do not use more than 2 numbers after the seperator";
	}
	else {
		$price = floatval($price);
	}
	$happy = intval(filter_input(INPUT_POST, "happy", FILTER_SANITIZE_STRING));

	if(isset($_POST['discount']) && $_POST['discount'] == "on") {
		$discount = 1;
	}
	else {
		$discount = 0;
	}

	$gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_STRIPPED);

	if(count($message) > 0) {
		$message[5] = "Some values are not entered correctfully, please try again";
	}
	else {
		save($_GET['view'], $title, $description, $price, $happy, $discount, $gender);
	}
}

function save($entity, $title, $description, $price, $happy, $discount, $gender) {

	$db = new Database();
	$product = (object)[];
	$_SESSION['test'] = true;
	$product->title = $title;
	$product->description = $description;
	$product->price = $price;
	$product->price = floatval($product->price);
	$product->happy = $happy;
	$product->discount = $discount;
	$product->gender = $gender;

	if($db->insert($entity, $product)){
		header("Location: ?view=request");
	}
	else{
		echo "nay";
	};
}

?>
<div class="test"></div>
<div class="request">
	<h1>Voer product in</h1>
	<p><?php if(isset($message[5]) ? print($message[5]) : "") ?></p>
	<form class="request-form" id="request-form" action="?view=request&action=save" method="post">
		<p><?php if(isset($message[0]) ? print($message[0]) : "") ?></p>
		<div class="request-form__block">
			<label class="request-form__label" for="product-title">PRODUCT TITLE</label>
			<input required name="title" class="request-form__input" id="product-title" type="text" />
		</div>
		<p><?php if(isset($message[1]) ? print($message[1]) : "") ?></p>
		<div class="request-form__block">
			<label class="request-form__label" for="product-descr">PRODUCT DESCRIPTION</label>
			<textarea required="required" name="description" form="request-form" rows="4" cols="40" class="request-form__input" id="product-descr"></textarea>
		</div>
		<p><?php if(isset($message[3]) ? print($message[3]) : "") ?></p>
		<div class="request-form__block">
			<label class="request-form__label" for="product-price">PRODUCT PRICE</label>
			<input required name="price" class="request-form__input" id="product-price" type="text" />
		</div>
		<div class="request-form__block">
			<label class="request-form__label" for="product-happy">Happy Product?</label>
			Happy<input required value="1" name="happy" class="request-form__radio" id="product-happy" type="radio" />
			Sad<input required value="0" name="happy" class="request-form__radio" id="product-happy" type="radio" />
		</div>
		<div class="request-form__block">
			<label class="request-form__label" for="product-discount">Discount</label>
			<input name="discount" class="request-form__checkbox" id="product-discount" type="checkbox" />
		</div>
		<div class="request-form__block">
			<label class="request-form__label" for="gender">Gender</label>
			<select required name="gender" class="request-form__input" id="gender">
				<option value="" hidden></option>
				<option value="MAN">MAN</option>
				<option value="WOMAN">VROUW</option>
				<option value="NEUTRAL">NEUTRAAL</option>
				<option value="BENDER">BENDER</option>
				<option value="HELICOPTER">ATTACKHELICOPTER</option>
			</select>
		</div>
		<div class="request-form__block">
			<button name="submit" type="submit" class="request-form__button">Submit</button>
		</div>
	</form>
</div>

