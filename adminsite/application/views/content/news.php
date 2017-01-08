
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
							<a href="<?php echo base_url() . 'news/add'; ?>" class="btn btn-md btn-theme-inverse pull-right">Tambah</a>
							<div class="clearfix breakline"></div>
							<hr />
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover datatable" data-src="<?php echo base_url() . 'news/get_list'; ?>">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th class="text-center">Tanggal</th>
										<th class="text-center">Kategori</th>
										<th class="text-center">Judul</th>
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

	</div>
	<!-- //content-->
</div>
<!-- //main-->
