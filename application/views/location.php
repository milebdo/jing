
<!--=============== wrapper ===============-->
<div id="wrapper">
	<div class="content-holder elem scale-bg2 transition3">
		<div class="content">
			<!-- background animation  -->
			<div class="bg-animate">
				<img src="<?php echo base_url()?>images/body-bg.png" class="respimg" alt="">
			</div>
			<!-- wrapper inner -->
			<div class="wrapper-inner">
				<section class="no-padding no-border">
					<!-- page title -->
					<div class="container">
						<div class="page-title no-border">
							<h2><?php echo $place == 'bandung' ? "Bandung" : "Sukabumi";?></h2>
							<h3>
								<span><?php echo $place == 'bandung' ? "Jingga Residence membuka perumahan di Ciwastra, Bandung
									Timur, yang akan menjadi daerah paling berkembang ke depan." : "Jingga Residence membuka perumahan di Kel. Cisarua, Kec. Cikole, Kota Sukabumi.";?></span>
							</h3>
						</div>
					</div>
				</section>
				<div class="clearfix"></div>
				<div class="container">
					<section>
						<div
							class="gallery-items three-coulms grid-small-pad popup-gallery">
							<!-- 1 -->
							<div class="gallery-item houses">
								<div class="grid-item-holder">
									<div class="box-item">
										<a href="<?php echo base_url()?>images/folio/thumbs/1.jpg" title="Image information">
											<span class="overlay"></span> <img
											src="<?php echo base_url()?>images/folio/thumbs/1.jpg" alt="">
										</a>
									</div>
								</div>
							</div>
							<!-- 2 -->
							<div class="gallery-item   interior industrial">
								<div class="grid-item-holder">
									<div class="box-item">
										<a href="<?php echo base_url()?>images/folio/thumbs/2.jpg"> <span class="overlay"></span>
											<img src="<?php echo base_url()?>images/folio/thumbs/2.jpg" alt="">
										</a>
									</div>
								</div>
							</div>
							<!-- 3 -->
							<div class="gallery-item   interior industrial">
								<div class="grid-item-holder">
									<div class="box-item">
										<a href="<?php echo base_url()?>images/folio/thumbs/3.jpg"> <span class="overlay"></span>
											<img src="<?php echo base_url()?>images/folio/thumbs/3.jpg" alt="">
										</a>
									</div>
								</div>
							</div>
							<!-- 4 -->
							<div
								class="gallery-item gallery-item-second  interior  industrial">
								<div class="grid-item-holder">
									<div class="box-item">
										<a href="<?php echo base_url()?>images/folio/thumbs/4.jpg"> <span class="overlay"></span>
											<img src="<?php echo base_url()?>images/folio/thumbs/4.jpg" alt="">
										</a>
									</div>
								</div>
							</div>
							<!-- 5 -->
							<div class="gallery-item  interior  industrial">
								<div class="grid-item-holder">
									<div class="box-item">
										<a href="<?php echo base_url()?>images/folio/thumbs/14.jpg"> <span class="overlay"></span>
											<img src="<?php echo base_url()?>images/folio/thumbs/14.jpg" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="gallery-item  interior  industrial">
								<div class="grid-item-holder">
									<div class="box-item">
										<a href="<?php echo base_url()?>images/folio/thumbs/5.jpg"> <span class="overlay"></span>
											<img src="<?php echo base_url()?>images/folio/thumbs/1.jpg" alt="">
										</a>
									</div>
								</div>
							</div>
							<!-- 6 -->
							<div class="gallery-item   interior">
								<div class="grid-item-holder">
									<div class="box-item">
										<a href="<?php echo base_url()?>images/folio/thumbs/6.jpg"> <span class="overlay"></span>
											<img src="<?php echo base_url()?>images/folio/thumbs/2.jpg" alt="">
										</a>
									</div>
								</div>
							</div>
							<!-- 7 -->
							<div class="gallery-item   houses">
								<div class="grid-item-holder">
									<div class="box-item">
										<a href="<?php echo base_url()?>images/folio/thumbs/7.jpg"> <span class="overlay"></span>
											<img src="<?php echo base_url()?>images/folio/thumbs/3.jpg" alt="">
										</a>
									</div>
								</div>
							</div>
						</div>
						<!-- end gallery items -->
						<div class="row">
							<div class="col-md-10">
								<div class="project-details">
									<h3>
										<span>Hanya beberapa menit dari wilayah Gedebage yang akan
											menjadi pusat perkembangan Kota <?php echo $place == 'bandung' ? "Bandung" : "";?> ke depan.</span>
									</h3>
									<?php echo $place == 'bandung' ? "<p>Perumahan yang dikembangkan ini berada di lokasi yang
										prospektif. Seiring dengan berkembangnya daerah gedebage
										sebagai sunrise area di kawasan bandung timur Jingga
										mengembangkan huniak eksklusif yang terletak di lokasi
										premium.</p>
									<p>Jingga terletak dekat rencana pengembangan bandung
										teknopolis yang akan berkembang sebagai pusat kegiatan
										perekonomian bandung timur, dekat dengan jalan sekarno hatta,
										tidak jauh dari BIUTR (Bandung Intra Urban Toll Road) pasupati
										gedebage, serta rencana interchange jalan tol purbaleunyi km
										149.</p>" : "<p>Perumahan yang dikembangkan ini berada di lokasi yang prospektif. Seiring dengan berkembangnya daerah Kec. Cikole sebagai sunrise area di kawasan Sukabumi Jingga mengembangkan huniak eksklusif yang terletak di lokasi premium. </p>";?>
									<ul class="descr">
										<li><span>Luas Area :</span>  <?php echo $place == 'bandung' ? "12" : "12";?> ha</li>
										<li><span>Jumlah Rumah :</span>  <?php echo $place == 'bandung' ? "123" : "123";?> unit</li>
										<li><span>Status :</span>  <?php echo $place == 'bandung' ? "76" : "76";?> % sold</li>
										<li><span>Lokasi : </span> <a href=" <?php echo $place == 'bandung' ? "https://goo.gl/maps/UzN5m" : "https://goo.gl/maps/UzN5m";?>"
											target="_blank">  <?php echo $place == 'bandung' ? "Ciwastra, Bandung" : "Cikole, Kota. Sukabumi";?> </a></li>
									</ul>
								</div>
							</div>
						</div>
					</section>
					<!-- about text end -->
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
			<!-- parallax column   -->
			<div class="img-wrap">
				<div class="bg" style="background-image: url(<?php echo base_url()?>images/bg/long/8.jpg)"
					data-top-bottom="transform: translateY(300px);"
					data-bottom-top="transform: translateY(-300px);"></div>
			</div>
			<!-- parallax column end   -->
			<!--to top    -->
			<div class="to-top">
				<i class="fa fa-long-arrow-up"></i>
			</div>
			<!-- to top  end -->