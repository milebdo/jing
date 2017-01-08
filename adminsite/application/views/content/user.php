
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
							<strong>User</strong> 
						</h3>
					</header>
					<div class="panel-body">
						<?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?>
						<div class="clearfix breakline"></div>
						<hr />
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover datatable">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th class="text-center">First Name</th>
										<th class="text-center">Last Name</th>
										<th class="text-center">Email</th>
										<th class="text-center">Group</th>
										<th class="text-center">Status</th>										
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody align="center">	
									<?php                         	  
	                                  $ix = 1;
	                                  foreach ($users as $user):?>
										<tr>
											<td><?php echo $ix;?></td>
											<td><?php echo $user->first_name;?></td>
											<td><?php echo $user->last_name;?></td>
											<td><?php echo $user->email;?></td>
											<td>
												<?php foreach ($user->groups as $group):?>
													<?php echo anchor("auth/edit_group/".$group->id, $group->name) ;?><br />
								                <?php endforeach?>
											</td>
											<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
											<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
										</tr>
										<?php $ix++;?>
									<?php endforeach; ?>																	
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
