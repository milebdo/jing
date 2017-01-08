<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/tagging.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.9.1.min.js"></script> 
<div id="success">
<div id="popupback"></div>
<div id=exits>x</div>
<div class="thanks"><span id="message"></span></div>
</div>
<div id="popup">
<div id="popupback"></div>
<div id=exit>x</div>
<form class="form_settings" id=myinputform enctype="multipart/form-data" action="<?=base_url()?>index.php/siteplan/booking" method=post>
	<table id=tabinputform>
		<input type=hidden name="ids"/>
		<tr>
		<td colspan=3 style="padding: 20px;"><font style='font-weight:600;'>BOOKING SEKARANG</font></td>
		</tr>
		<tr>
		<td>Nama</td><td>  </td><td><input type=text name="name"/></td>
		</tr>	
		<tr>
		<td>No. Kontak</td><td>  </td><td><input type=text name="kontak"/></td>
		</tr>
		<tr>
		<td>Email</td><td>  </td><td><input type=text name="email"/></td>
		</tr>
		<tr>
		<td colspan=3 style="padding: 15px;"><input style="background-color: #1a1a1a;" class="button" type=submit value='Kirim' /></td>
		</tr>
	</table>	
</form>
</div>
<div id="wrapper">
	<div class="content-holder elem scale-bg2 transition3">
		<div class="content">
			<!-- background animation  -->
			<div class="bg-animate">
				<img src="<?php echo base_url()?>images/body-bg.png" class="respimg" alt="">
			</div>
			<div class="wrapper-inner">
			<div id="imgtag"> 
    				<img id="<?php echo $image[0]['image_id']; ?>" src="<?php echo base_url()."adminsite/".$image[0]['name']; ?>" /> 
				    <div id="tagbox">
				    </div>
  			</div>
				<div class="container">					
					<div class="content-nav">
						<ul>
							<li><a href="#" class="ajax"><i
									class="fa fa-long-arrow-left"></i></a></li>
							<li><span>/</span></li>
							<li><a href="#" class="ajax"><i
									class="fa fa-long-arrow-right"></i></a></li>
						</ul>
						<div class="p-all">
							<a href="#" class="ajax"><i class="fa fa-th-large"></i></a>
						</div>
					</div>
				</div>
			</div>
			<!-- wrapper inner end   -->
			<!--to top    -->
			<div class="to-top">
				<i class="fa fa-long-arrow-up"></i>
			</div>
			<!-- to top  end -->