
<div id="main">
	<ol class="breadcrumb">
	</ol>
	<!-- //breadcrumb-->

	<div id="content">

		<div class="row">

			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h3>
							<strong>News</strong> List
						</h3>
					</header>
					<div class="panel-body datatable-wrapper">
						<a href="<?php echo base_url() . 'news/addcat'; ?>" class="btn btn-md btn-theme-inverse btn-modal pull-right" title="Tambah Kategori" modal-title="Tambah Kategori" modal-width="480">Kategori Baru</a>
						<div class="clearfix breakline"></div>
						<hr />
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover datatable" data-src="<?php echo base_url() . 'news/get_catlist'; ?>">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th class="text-center">Title</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody align="center">																		
								</tbody>
							</table>
					</div>
				</section>
			</div>
			<!-- //content > row > col-lg-8 -->
		</div>
		<!-- //content > row-->
		<div class="row">
		<div class="col-lg-12">
			<section class="panel">
			<div class="panel-body">
			<form class="main-form" id="group-form" data-collabel="3" data-alignlabel="left" method="POST"
			action="<?php echo base_url() . 'news/writecontent/new'; ?>" novalidate>
				<div class="col-lg-6">
					<div class="form-group">
						<label class="control-label" for="inputTwo">Title</label>
						<div>
							<input type="text" class="form-control" name="title">
						</div>
					</div>
				</div>
				<div class="col-lg-1"></div>
				<div class="col-lg-6">
					<div class="col-lg-6">
					<div class="form-group">
						<label class="control-label">Kategori</label>
						<div>
						<div class="row">
						<div class="col-sm-11">
							<select name="category" class="selectpicker form-control">
								<option value=""> Pilih Kategori </option>
								<?php
									if($category) {
										foreach ($category as $cat)
										{
								?>
										<option value="<?php echo $cat->category_id;?>"> <?php echo $cat->name;?> </option>
								<?php 
										}
								   } 
								?>
							</select>
						</div>
						</div>
						</div>
					</div>
					</div>
					<div class="col-lg-6">
					<div class="form-group">
							<label class="control-label">Image</label>
							<div>
								<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="input-group">
												<div class="form-control uneditable-input" data-trigger="fileinput">
													<i class="glyphicon glyphicon-file fileinput-exists"></i>
													<span class="fileinput-filename"></span>
												</div>
												<span class="input-group-addon btn btn-inverse btn-file">
												<span class="fileinput-new">SELECT FILE TO UPLOAD</span>
												<span class="fileinput-exists">Change</span>
												<input type="file" name="image">
												</span>
												 <a href="#" class="input-group-addon  btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
										</div>
								</div><!-- //fileinput-->	
							</div>
					</div><!-- //form-group-->
					</div>
				</div>
				<div class="col-lg-12">
					<div class="control-group">
                         <label class="control-label">News Content</label>
                         <div>
                              <textarea name="content" class="input-large textarea" id="tinymce_intro" placeholder="Enter text ..."></textarea>
                         </div>
                   </div>
				</div>
				<div class="clearfix breakline"></div>
						<hr />
				<div class="col-lg-11 align-xs-right">
					<input type="submit" class="btn btn-theme-inverse" value="Save"/>
					<a href="<?php echo base_url()?>news" type="button" class="btn btn-theme">Cancel</a>					
				</div>
			</form>
			</div>			
			</section>
		</div>
		</div>
	</div>
	<!-- //content-->
</div>
<!-- //main-->