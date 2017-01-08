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
						<div class="page-title">
							<h2>BERITA</h2>
						</div>
					</div>
				</section>
				<div class="clearfix"></div>
				<div class="container">
					<section>
						<div class="gallery-items three-coulms grid-small-pad">
							<!-- 1 -->
							<?php
							if($content)
							{
								foreach ($content as $news)
								{
									?>
									<div class="gallery-item">
										<div class="grid-item-holder">
											<article>
												<ul class="blog-title">
													<li><a href="#" class="tag"><?php echo $news->date;?></a></li>
													<li>-</li>
													<li><a href="#" class="tag"><?php echo $news->name;?> </a></li>
												</ul>
												<div class="blog-media">
													<div class="box-item">
														<a href="<?php echo base_url()?>news/detail/<?php echo $news->news_id;?>" class="ajax"> <span
															class="overlay"></span> <img
															src="<?php echo base_url().'adminsite/'.$news->image;?>" alt="" class="respimg">
														</a>
													</div>
												</div>
												<div class="blog-text">
													<?php
														echo trim_text($news->content,320, true, false); 
													?>
													<a href="<?php echo base_url()?>news/detail/<?php echo $news->news_id;?>" class="ajax btn"><span>selengkapnya
													</span> <i class="fa fa-long-arrow-right"></i></a>
												</div>
											</article>
										</div>
									</div>
									<?php 
								}
							} 
							?>
						</div>
					</section>
					<!-- posts end -->
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