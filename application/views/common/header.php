<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Jingga Residence </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/reset.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/plugins.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/style.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="<?php echo base_url()?>images/favicon.png">
    </head>
    <body>
        <div class="loader"><i class="fa fa-refresh fa-spin"></i></div>
        <!--================= main start ================-->
        <div id="main">
            <!--=============== header ===============-->
            <header>
                <div class="header-inner">
                    <div class="logo-holder">
                        <a href="index.html" class="ajax"><img src="<?php echo base_url()?>images/logo.png" alt=""></a>
                    </div>
                    <div class="nav-button-holder">
                        <div class="nav-button vis-m"><span></span><span></span><span></span></div>
                    </div>
                    <div class="nav-holder">
                        <nav>
                            <ul> 
                                <li><a href="<?php echo base_url()?>home" class="ajax <?php echo $current === '1' ? 'act-link' : '';?>">Home</a></li>
                                <li>
                                    <a href="#" >Bandung</a>
                                    <ul>
                                        <!-- li><a href="<?php //echo base_url()?>location/index/bandung" class="ajax  <?php //echo $current === '2' ? 'class="act-link"' : '';?>">Bandung</a></li>
                                        <li><a href="<?php //echo base_url()?>location/index/sukabumi" class="ajax  <?php //echo $current === '2' ? 'class="act-link"' : '';?>">Sukabumi</a></li-->
                                        <li><a href="<?php echo base_url()?>style" class="ajax <?php echo $current === '3' ? 'act-link' : '';?>">Style</a></li>
										<li><a href="<?php echo base_url()?>siteplan" class="ajax metab <?php echo $current === '4' ? 'act-link' : '';?>">Siteplan</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Sukabumi</a>
                                    <ul>
                                    	<li><a href="<?php echo base_url()?>style" class="ajax <?php echo $current === '3' ? 'act-link' : '';?>">Style</a></li>
										<li><a href="<?php echo base_url()?>siteplan" class="ajax metab <?php echo $current === '4' ? 'act-link' : '';?>">Siteplan</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url()?>contact" class="ajax <?php echo $current === '5' ? 'act-link' : '';?>">Contact</a></li>
                                <li><a href="<?php echo base_url()?>news" class="ajax <?php echo $current === '6' ? 'act-link' : '';?>">News</a></li>
								<li>
                                    <a href="<?php echo base_url()?>info" class="ajax pa <?php echo $current === '7' ? 'class="act-link"' : '';?>">Company Information</a>
                                    <!-- Scroll navigation  -->
                                    <ul>
                                        <li><a href="<?php echo base_url()?>info#sec1" class="ajax custom-scroll-link">Profil </a></li>
                                        <li><a href="<?php echo base_url()?>info#sec2" class="ajax custom-scroll-link">Tim Marketing</a></li>
                                        <li><a href="<?php echo base_url()?>info#sec3" class="ajax custom-scroll-link">Milestone </a></li>
                                        <li><a href="<?php echo base_url()?>info#sec4" class="ajax custom-scroll-link">Keunggulan</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="share-container isShare"></div>
                <a class="selectMe shareSelector transition">Share</a>
            </header>