<div id="wrapper">
	<div class="content-holder elem scale-bg2 transition3">
		<div class="content">
			<!-- background animation  -->
			<div class="bg-animate">
				<img src="images/body-bg.png" class="respimg" alt="">
			</div>
			<!-- wrapper inner -->
			<div class="wrapper-inner">
				<div class="container">
					<!-- post -->
					<section>
					<?php if($content){?>
						<article class="sinnle-post">
							<h2><?php echo $content->title;?></h2>
							<ul class="blog-title">
								<li><a href="#" class="tag"><?php echo $content->date;?></a></li>
								<li>-</li>
								<li><a href="#" class="tag"><?php echo $content->name;?> </a></li>
							</ul>
							<div class="blog-media">
								<div class="fullwidth-slider-holder">
									<div class="full-width owl-carousel">
										<!-- 1 -->
										<div class="item">
											<img src="<?php echo base_url().'adminsite/'.$content->image;?>" class="respimg" alt="">
										</div>
									</div>
								</div>
							</div>
							<div class="blog-text">
								<?php echo $content->content;?>
							</div>
						</article>
					</section>
					<!-- post end -->
					<?php }?>
					<section class="no-border">
						<div class="comments-holder">
							<h3>Komentar</h3>
							<ul class="commentlist clearafix">
								<li class="comment">
									<div class="comment-body">
										<div class="comment-author">
											<img alt='' src='<?php echo base_url()?>images/blog/users/1.jpg' width="50"
												height="50">
										</div>
										<cite class="fn"><a href="#">Maimunah</a></cite>
										<div class="comment-meta">
											<h6>
												<a href="#">2 January 2016 jam 07:39 </a> / <a
													class='comment-reply-link' href="#">Balas</a>
											</h6>
										</div>
										<p>Alhamdulillah saya merasakan benar bagaimana mudahnya
											mengurus semua administrasi selama proses pembelian. Ini
											memang perumahan yang ok dan recomended.</p>
									</div>
									<ul class="children">
										<li class="comment">
											<!--comment body-->
											<div class="comment-body">
												<div class="comment-author">
													<img alt='' src='<?php echo base_url()?>images/blog/users/2.jpg' width="50"
														height="50">
												</div>
												<cite class="fn"><a href="#">Audrey</a></cite>
												<div class="comment-meta">
													<h6>
														<a href="#">3 Januari 2016 jam 13:29</a> / <a
															class='comment-reply-link' href="#">Balas</a>
													</h6>
												</div>
												<p>Hi Mun,</p>
												<p>Saya juga puas Jeng Mun, saya beli dua untuk anak anak
													saya, masing2 satu rumah.</p>
											</div>
										</li>
									</ul>
								</li>
								<li class="comment">
									<!--comment body-->
									<div class="comment-body">
										<div class="comment-author">
											<img alt='' src='<?php echo base_url()?>images/blog/users/1.jpg' width="50"
												height="50">
										</div>
										<cite class="fn"><a href="#">Lisa</a></cite>
										<div class="comment-meta">
											<h6>
												<a href="#">13 Januari 2016 jam 13:29</a> / <a
													class='comment-reply-link' href="#">Balas</a>
											</h6>
										</div>
										<p>Ini perumahan mewah atau mepet ke sawah, tapi lingkungannya
											sangat tertata rapi. Denger2 pengembangnya investasi
											besaruntuk mengatur lingkungan ini dengan baik. Tapi kerennya
											harga ke konsumen ga menjadi tinggi. Kudoakan rejeki
											developernya makin berkah.</p>
									</div>
								</li>
							</ul>
						</div>
						<div class="comment-form-holder">
							<h3>Komentari</h3>
							<div id="comment-form">
								<form method="post"
									action="http://www.domik.kwst.net/site/php/contact.php"
									name="commentform" id="contactform">
									<input name="name" type="text" id="name"
										onClick="this.select()" value="Name"> <input name="email"
										type="text" id="email" onClick="this.select()" value="E-mail">
									<textarea name="comments" id="comments" onClick="this.select()">Pesan</textarea>
									<button type="submit" id="submit">
										<span>Kirimkan </span> <i class="fa fa-long-arrow-right"></i>
									</button>
								</form>
							</div>
					
					</section>
				</div>
			</div>
			<!-- wrapper inner end   -->
			<!-- parallax column   -->
			<div class="img-wrap">
				<div class="bg" style="background-image: url(<?php echo base_url()?>images/bg/long/7.jpg)"
					data-top-bottom="transform: translateY(300px);"
					data-bottom-top="transform: translateY(-300px);"></div>
			</div>
			<!-- parallax column end   -->
			<!--to top    -->
			<div class="to-top">
				<i class="fa fa-long-arrow-up"></i>
			</div>
			<!-- to top  end -->