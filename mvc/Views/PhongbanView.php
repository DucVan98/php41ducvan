<?php 
	//include MenuView.php
	include "Views/MenuView.php";
 ?>
<fieldset style="width: 400px; margin:20px auto">
	<legend>Danh sách phòng ban</legend>
	<div style="margin-bottom: 5px;"><a href="index.php?controller=PhongbanController&action=addPhongban">Thêm phòng ban</a></div>
	<table cellpadding="5" border="1" style="width: 100%; border-collapse: collapse">
		<tr>
			<th>Tên phòng ban</th><th style="width: 100px;"></th>
		</tr>
		<?php foreach($data as $rows): ?>
		<tr>
			<td><?php echo $rows->tenphongban; ?></td>
			<td style="text-align: center;">
				<a href="index.php?controller=PhongbanController&action=edit&maphongban=<?php echo $rows->maphongban; ?>">Edit</a>&nbsp;&nbsp;
				<a href="index.php?controller=PhongbanController&action=delete&maphongban=<?php echo $rows->maphongban; ?>">Delete</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</fieldset>