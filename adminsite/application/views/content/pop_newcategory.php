<form autocomplete="on" class="main-form" id="group-form" method="POST"
	action="<?php echo base_url() . 'news/addnewcategory'; ?>" novalidate>
	<div class="form-wrapper show">
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label>Nama</label> <input type="text" name="name"
						class="form-control" placeholder="Nama Kategori" /> <label
						class="error" for="name"></label>
				</div>
			</div>
		</div>
	</div>

	<hr />

	<div class="button-wrapper">
		<div class="row">
			<div class="col-sm-12">
				<button type="submit" class="btn btn-right btn-theme-inverse">
					<i class="fa fa-check"></i> Save
				</button>
				<button type="button" class="btn btn-right btn-danger"
					data-dismiss="modal">
					<i class="fa fa-times"></i> Cancel
				</button>
			</div>
		</div>
	</div>
</form>