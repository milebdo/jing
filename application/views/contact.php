<!--=============== wrapper ===============-->
<div id="wrapper">
	<div class="content-holder elem scale-bg2 transition3">
		<div class="content">
			<!-- background animation  -->
			<div class="bg-animate">
				<img src="<?php echo base_url()?>images/body-bg.png" class="respimg" alt="">
			</div>
			<!-- wrapper-inner -->
			<div class="wrapper-inner">
				<div class="container">
					<div class="page-title no-border">
						<h2>Hubungi Kami</h2>
						<h3>
							<span>Seluruh informasi mengenai Jingga Residence dapat Anda
								dapatkan dengan menghubungi kami melalui kontak di bawah ini .</span>
						</h3>
					</div>
					<!-- map  -->
					<section class="no-border">
						<div class="map-box">
							<div id="map_addresses" class="map" data-latitude="-6.962150"
								data-longitude="107.664200" data-location="Jingga Residence"></div>
						</div>
					</section>
					<!-- map  end-->
					<!-- contact info  -->
					<section class="no-border">
						<div class="contact-details">
							<div class="row">
								<div class="col-md-3">
									<h3>Kontak :</h3>
								</div>
								<div class="col-md-3">
									<h4>Kantor Pemasaran Bandung</h4>
									<ul>
										<li><a href="#">Jl. Ciwastra, Bandung</a></li>
										<li><a href="#">+62.22.7566999 / 7567999</a></li>
										<li><a href="#">bandung@jinggaresidence.com</a></li>
									</ul>
								</div>
								<div class="col-md-3">
									<h4>Kantor Pemasaran Sukabumi</h4>
									<ul>
										<li><a href="#">Jl. Ciaul Pasir, Cisarua, Cikole, Kota
												Sukabumi</a></li>
										<li><a href="#">+62.266.229365</a></li>
										<li><a href="#">sukabumi@jinggaresidence.com</a></li>
									</ul>
								</div>
								<div class="col-md-3">
									<h4>Temukan kami di :</h4>
									<ul>
										<li><a href="#">Facebook</a></li>
										<li><a href="#">Twitter </a></li>
										<li><a href="#">Instagram</a></li>
									</ul>
								</div>
							</div>
						</div>
					</section>
					<!-- contact info  end-->
					<!-- contact form -->
					<section>
						<div class="contact-form-holder">
							<div id="contact-form">
								<div id="message"></div>
								<form method="post"
									action="http://www.domik.kwst.net/site/php/contact.php"
									name="contactform" id="contactform">
									<input name="name" type="text" id="name"
										onClick="this.select()" value="Nama"> <input name="email"
										type="text" id="email" onClick="this.select()" value="E-mail">
									<textarea name="comments" id="comments" onClick="this.select()">Pesan</textarea>
									<button type="submit" id="submit">
										<span>Kirim </span> <i class="fa fa-long-arrow-right"></i>
									</button>
								</form>
							</div>
						</div>
					</section>
					<!-- contact form  end-->
				</div>
			</div>
			<!-- wrapper inner end   -->
			<!-- parallax column   -->
			<div class="img-wrap">
				<div class="bg" style="background-image: url(<?php echo base_url()?>images/bg/long/10.jpg)"
					data-top-bottom="transform: translateY(300px);"
					data-bottom-top="transform: translateY(-300px);"></div>
			</div>
			<!-- parallax column end   -->
			<!--to top    -->
			<div class="to-top">
				<i class="fa fa-long-arrow-up"></i>
			</div>
			<!-- to top  end -->