elseif ($_POST['different'] == "episode") {
		$sql = mysqli_query($con, 'SELECT `judul`,`id`,`episode`,`link` FROM `episode` WHERE `judul` LIKE "%' . $_POST['search'] . '%"');
		foreach ($sql as $row) {
			?>
			<tr>
				<td class=""><?php echo $row['judul'] ?></td>
				<td class=""><?php echo $row['episode'] ?></td>
				<td>
					<a href="add<?php echo $current ?>.php?id=<?php echo $row['id'] . '&current=' . $current . '&pages=' . $pages .'&action=edit' ?>" name="edit" title='Update Record' data-toggle='tooltip'><span class='fas fa-edit'></span></a>
					<a href="#deletemodal" name="delete" data-id="<?php echo $row['id']; ?>" title='Delete Record' data-toggle='modal' class="delete"> <span class='fas fa-trash-alt'></span></a>
				</td>
			</tr>

			<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="delete">Delete Data</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" style="padding: 0;">
							<form method="post" action="">
								<input type="hidden" class="id" name="id" id="id" />
								<div class="card-body">
									<div class="form-group">
										<p for="Confirm">data yang telah dihapus tidak dapat di kembalikan</p>
									</div>
								</div>
								<div class="modal-footer">
									<button name="delete" type="submit" class="btn btn-danger">Delete</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	}