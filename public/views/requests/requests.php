<?php
$db = new Database();
$rows = $db->get("request", "*");
?>
<div class="tablething">
	<h1>All Products</h1>
	<table class="table">
		<tr>
			<th>Title</th>
			<th>Description</th>
			<th>Price</th>
			<th>Feeling</th>
			<th>Discount</th>
			<th>Gender</th>
		</tr>
		<?php foreach($rows as $item): ?>
		<tr>
			<td><?= $item['title'] ?></td>
			<td><?= $item['description'] ?></td>
			<td>&euro; <?= $item['price'] ?></td>
			<td><?= $item['happy'] == 1 ? "Sad" : "Happy"; ?></td>
			<td><?= $item['discount'] == 1 ? "On" : "Off" ?></td>
			<td><?= $item['gender'] ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>


