<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

		<?php
		if($lang == "en"){
			?>
			<meta property="og:url" content="http://www.discoverbritainnow.com/en" />
			<meta property="og:type" content="article" />
			<meta property="og:title" content="Discover and share your favourite OMGB moments!" />
			<meta property="og:description" content=".Win a trip to the UK with VisitBritain and Qatar Airways when you sign up to our newsletter. Terms and conditions apply" />
			<meta property="og:image" content="http://discoverbritainnow.com/assets/images/assets/landscape/8.jpg" />
			<?php
		}else{
			?>
			<meta property="og:url" content="http://www.discoverbritainnow.com/ar" />
			<meta property="og:type" content="article" />
			<meta property="og:title" content="لقد اكتشفت للتو لحظاتي المفضلة في بريطانيا! ماذا عن لحظاتك أنت؟" />
			<meta property="og:description" content="لا تفوت فرصة الفوز برحلة إلى المملكة المتحدة مع فيزيت بريتن والخطوط الجوية القطرية عند الاشتراك في نشرتنا الإخبارية.
			  المفضلة لديك! تُطبق الشروط والأحكام.OMGB اكتشف وشارك لحظات" />
			<meta property="og:image" content="http://discoverbritainnow.com/assets/images/assets/landscape/8.jpg" />
			<?php	
		}
		?>


	    <title data-ar="نص البريد ا لكتروني - نهائي">Win a trip to the Uk and discover the home of amazing moments with Qatar Airways.</title>

	    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	    <!-- Latest compiled and minified CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	    <!-- Latest compiled and minified JavaScript -->
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	    <script src="https://unpkg.com/packery@2.1/dist/packery.pkgd.js"></script>

	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
	     
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>

	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/generic.css">

		<script src="https://d3js.org/d3.v4.js"></script>

		<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
	    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>

	</head>
	<body class="<?php echo $lang;?>" data-lang="<?php echo $lang;?>" data-session="<?php echo $sessionId;?>">
		<!--en and ar-->		


		<div class="page-wrap">
			<header>
				
				<div class="wrap">
					<div class="container-fluid">
						<!--row ,use as a section-->
						<div class="row">

							<!--col-->
							<div class="col-xs-4 col-md-2 col">
								<img src="<?php echo base_url(); ?>assets/images/great-logo.png" alt="Great"/>
							</div>
							<!--col-->

							<!--col-->
							<div class="col-xs-6 col-md-2 pull-right col">
								<img class="qatarlog" src="<?php echo base_url(); ?>assets/images/QatarEN.png" alt="Qatar"/>
							</div>
							<!--col-->

						</div>
					</div>
				</div>

			</header>

			<!--root-->
			<div id="root" class="wrap">

				<!--page1-->
				<div id="page1" class="container-fluid pages">
					<!--row ,use as a section-->
					<div class="row">

						<!--col-->
						<div class="col-xs-12 col-md-5 col">
								
							<div class="infocontainer">
								<div class="infowrap">
									<h2 data-ar="ربح رحلة رائعة إلى المملكة المتحدة">Win an amazing trip to the UK</h2>	

									<p data-ar="كل ما عليك هو الاشتراك في رسائلنا الإخبارية، واختيار لحظاتك الخمس المفضلة، ومشاركة النتائج الخاصة بك للحصول على فرصة الربح">Simply sign up to our newsletter, choose your five favourite moments and share your results to be in with a chance.</p>
								</div>
							</div>

							<img class="logoomgb" src="<?php echo base_url(); ?>assets/images/omgbEN.png" data-ar="<?php echo base_url(); ?>assets/images/omgbarabic.png" alt="OMGB"/>
						</div>
						<!--col-->

						<!--col-->
						<div class="col-xs-12 col-md-5 col-md-offset-2 col formcontainer">
							
							<form id="signupForm" method="get" action="">
							  <fieldset>
							    <label for="firstName" data-ar="لاسم الأول">Firstname</label>
							    <input type="text" id="firstName" name="firstName" value="">
							    
							    <label for="surname" data-ar="سم العائلة">Surname</label>
							    <input type="text" id="surname" name="surname" value="">
							    
								<label for="email" data-ar="لبريد الإلكتروني">Email</label>
							    <input type="text" id="email" name="email" value="">
							   								   	 
								<label class="terms" for="terms" data-ar="">I agree to the Visit Britain and Qatar Airways Terms and Conditions</label>
							    <input type="checkbox" id="terms" name="terms" value="1">

							   	<!--
							    <label class="termsBT" for="termsBT" data-ar="وافق على شروط وأحكام Visit Britain.">I agree to the Visit Britain Terms and Conditions</label>
							    <input type="checkbox" id="termsBT" name="termsBT" value="1">

							    <label  class="termsQAT" for="termsQAT" data-ar="وافق على شروط وأحكام الخطوط الجوية القطرية.">I agree to the Qatar Airways Terms and Conditions</label>
							    <input type="checkbox" id="termsQAT" name="termsQAT" value="1">
							    -->

							    <input type="submit" data-ar="لخطوة التالية" value="Next Step >">
							  </fieldset>
							</form>

						</div>
						<!--col-->

					</div>
					<!--row ,use as a section-->
				</div>
				<!--page1-->


				<!--page2-->
				<div id="page2" class="container-fluid pages">
					<!--row ,use as a section-->
					<div class="row">

						<!--col-->
						<div class="col-xs-12 col-md-6 col infocontainer">
							<div class="infowrap">
								<h2 data-ar="ماذا تنتظر؟">What are you waiting for?</h2>

								<p data-ar="ختر نقطة المغادرة واختر خمس صور من مجموعتنا الواردة أدناه والتي تعتقد أنها تبدو رائعة للحصول على فرصة للفوز">Choose your point of departure and pick five images from our selection below which you think look fabulous for a chance to win.</p>
							</div>
						</div>
						<!--col-->

						<!--col-->
						<div class="col-xs-12 col-md-6 col">
							<div class="omgblogo">
								<img class="logoomgb" src="<?php echo base_url(); ?>assets/images/omgbEN.png" data-ar="<?php echo base_url(); ?>assets/images/omgbarabic.png" alt="OMGB"/>	
							</div>
						</div>
						<!--col-->

						<!--col-->
						<div class="col-xs-12 col-md-12 col selectionform">
							
							<form id="selectionForm" method="get" action="">
							  <fieldset>
							    <label for="flyingFrom"><span class="bold" data-ar="لخطوة 2">Step 2.</span> <span data-ar="من أين ستقلع طائرتك؟">Where are you flying from?</span></label>
								<select id="flyingFrom" name="flyingFrom" data-type="select">
									<option value="Jeddah" data-ar="جدة">Jeddah</option>
									<option value="Dammam" data-ar="لدمام">Dammam</option>
									<option value="Riyadh" data-ar="لرياض">Riyadh</option>
									<option value="Kuwait City" data-ar="مدينة الكويت">Kuwait City</option>
									<option value="Dubai" data-ar="دبي">Dubai</option>
									<option value="Sharjah" data-ar="لشارقة">Sharjah</option>
									<option value="Ras Al Khaima" data-ar="رأس الخيمة">Ras Al Khaima</option>
									<option value="Abu Dhabi" data-ar="بوظبي">Abu Dhabi</option>
								</select>

								<input type="hidden" name="language" value="<?php echo $lang;?>">
							    
							    <label for="choosepictures"><span class="bold" data-ar="لخطوة 3">Step 3.</span> <span data-ar="حدد 5 صور لفتح الرحلة المصممة خصيصاً لك.">Tick 5 images to unlock your tailor-made tour.</span></label>

 
							    <p class="selection"><span class="count">0</span> <span data-ar="لقد حددتم">selected</span>.<span class="error" data-ar="لا يمكنك اختيار أكثر من ٥.">You can not choose more than 5.</span></p>

								<!-- Slider main container -->
								<div class="swiper-container" data-type="swiper">
								    <!-- Additional required wrapper -->
								    <div class="swiper-wrapper">
								        <!-- Slides -->
								        <!--
								        <div class="swiper-slide">
									       <div class="grid2" data-type="packery">
												<div class="grid-item unselected">
													<input type="checkbox" class="ids" name="items[]" value="1"/>
													<img src="https://lumiere-a.akamaihd.net/v1/images/image_ccc4b657.jpeg"/>
												</div>
											</div>
								        </div>
								        -->
								    </div>
								    
								    <!-- If we need navigation buttons -->
								    <div class="swiper-button-prev arrows"></div>
								    <div class="swiper-button-next arrows"></div>
								</div>

							    <input type="submit" data-ar="ستكشف برنامج رحلتي" value="Discover my itinerary >">
							  </fieldset>
							</form>

						</div>
						<!--col-->

					</div>
					<!--row ,use as a section-->

				</div>
				<!--page2-->	


				<!--page3-->
				<div id="page3" class="container-fluid pages">
					<!--row ,use as a section-->
					<div class="row">


						<!--col-->
						<div class="col-xs-12 col-md-6 col infocontainer">
							<div class="infowrap">
								<!--<h2 data-ar="رض الأوقات الرائعة">Your home of amazing moments</h2>

								<p data-ar="تعرف على المزيد بناءً على اختياراتك وشاركها مع أصدقائك للحصول على فرصة للفوز">Find out more based on your choices and share with your friends for a chance to win.</p>-->

								<h2 data-ar="شكرًا لك!">Thank you</h2>

								<p data-ar="لقد استلمنا مشاركتك. حظاً سعيداً!">We have received your entry. Good luck!</p>

								<p data-ar="لق نظرة على أفضل التوصيات الخاصة بك وشاركه">Take a look at your top recommendations and share</p>

							</div>
						</div>
						<!--col-->
						
						<!--col-->
						<div class="col-xs-12 col-md-6 col">
							<div class="omgblogo">
								<img class="logoomgb" src="<?php echo base_url(); ?>assets/images/omgbEN.png" data-ar="<?php echo base_url(); ?>assets/images/omgbarabic.png" alt="OMGB"/></div>							
						</div>
						<!--col-->

						<!--col-->
						<div class="col-xs-12 col-md-12 col white">

							<div class="sharingbox">
								<h4 data-ar="لخطوة 4"><span class="bold">Step 4.</span> <span data-ar="لق نظرة على أفضل التوصيات الخاصة بك وشاركها">Take a look at your top recommendations and share</span></h4>

								<?php
									if($lang == "en"){
										?>
										<div class="fb-share-button" data-href="http://www.discoverbritainnow.com/en" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.discoverbritainnow.com%2Fen&amp;src=sdkpreparse">Share</a></div>

										<a class="twitter-share-button"
											href="https://twitter.com/intent/tweet"
											data-text="I’ve just discovered my favourite British moments. What are yours?"
											data-url="http://www.discoverbritainnow.com/en"
											data-via="VisitBritain"
											data-hashtags=""
											data-size="large">
										Tweet</a>
										<?php
									}else{
										?>
										<div class="fb-share-button" data-href="http://www.discoverbritainnow.com/ar" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.discoverbritainnow.com%2Far&amp;src=sdkpreparse">Share</a></div>

										<a class="twitter-share-button"
											href="https://twitter.com/intent/tweet"
											data-text="لقد اكتشفت للتو لحظاتي المفضلة في بريطانيا! ماذا عن لحظاتك أنت؟"
											data-url="http://www.discoverbritainnow.com/ar"
											data-via="VisitBritain"
											data-hashtags=""
											data-size="large">
										Tweet</a>
										<?php
									}
								?>
						
							</div>

							<div class="mapwrap">
								<div class="mapholder">
									<div class="markerholder">
										<div class="marker" data-type="markers" data-size="large" data-pos-x="41%" data-pos-y="16%">
											<div class="markerwrap">
												<div class="pointer">
													<div data-type="curve">some text that needs</div>
													<div class="coverimg"><img src="<?php echo base_url(); ?>assets/images/assets/square/0.jpg"></div>
													<img class="markerpointer" src="<?php echo base_url(); ?>assets/images/marker.png">
												</div>
											</div>
										</div>

										<div class="marker" data-type="markers" data-size="small" data-pos-x="427" data-pos-y="287">
											<div class="markerwrap">
												<div class="pointer">
													<div data-type="curve">some text that needs</div>
													<div class="coverimg"><img src="<?php echo base_url(); ?>assets/images/assets/square/1.jpg"></div>
													<img class="markerpointer" src="<?php echo base_url(); ?>assets/images/marker.png">
												</div>
											</div>
										</div>

										<div class="marker" data-type="markers" data-size="small" data-pos-x="400" data-pos-y="517">
											<div class="markerwrap">
												<div class="pointer">
													<div data-type="curve">some text that needs</div>
													<div class="coverimg"><img src="<?php echo base_url(); ?>assets/images/assets/square/2.jpg"></div>
													<img class="markerpointer" src="<?php echo base_url(); ?>assets/images/marker.png">
												</div>
											</div>
										</div>

										<div class="marker" data-type="markers" data-size="large" data-pos-x="571" data-pos-y="651">
											<div class="markerwrap">
												<div class="pointer">
													<div data-type="curve">some text that needs</div>
													<div class="coverimg"><img src="<?php echo base_url(); ?>assets/images/assets/square/3.jpg"></div>
													<img class="markerpointer" src="<?php echo base_url(); ?>assets/images/marker.png">
												</div>
											</div>
										</div>
									</div>

									<img class="map" src="<?php echo base_url(); ?>assets/images/map.png">
								</div>
							</div>
						</div>
						<!--col-->


						<!--col-->
						<div class="col-xs-12 col-md-12 col listingresults">

							<h3 data-ar="ستكشف المزيد بشأن لحظاتك المُختارة">Discover more about your chosen moments</h3>

							<p class="destinations"><span data-ar="رحلات الطيران إلى الخارج من">Fly out from</span> <span class="outbound">Dubai</span> <span data-ar="لى">to</span> <span class="inbound">Edingburgh</span></p>


							<!--
The final Aspect on the map is the in-bound / out-bound map markers.

The out-bound marker will always be london. "fly from London"

The in-bound will be defined by how many locations you pick in each area out of 5. For example if you pick 3 from Birmingham and 2 from edinburgh the "fly into Birmingham" marker will appear on the map. The marker images can be grabbed from the already existing ones in the database

The one issue which we have addressed to the client is if the users pick 2 - 2 -1, so for example 2 for london 2 for Edniburgh and 1 for Manchester. In which case we will have to decide that some locations always take priority over others. I would like to include the the fly-in location at the start of the pruple itinerary below as well. So before the 1st location have a line "Fly to xxxxx from Dubai" for example.

Let me know your thoughts / if this doesn't make sense.

							-->

							<div class="list">

								<!--row ,use as a section-->
								<div class="row">

									<!--col-->
									<div class="col-xs-12 col-md-6 col">
										<div class="imgwrap">
											<img src="http://media.dcentertainment.com/sites/default/files/PLASMCONV_Cv1_R1_gallery_5543c2cdea2c82.60410834.jpg">
										</div>
									</div>
									<!--col-->
									<!--col-->
									<div class="col-xs-12 col-md-6 col">
										<h4>Fly to Edinburgh</h4>

										<p>Get lost in the cobbled alleyways of the Old Town, admire the Georgian splendour of the New Town and climb Calton Hill for outstanding views across the city. One of the best times to visit is during summer when the enormous Edinburgh Festival is at its peak.</p>
									</div>
									<!--col-->

								</div>
								<!--row ,use as a section-->

								<!--row ,use as a section-->
								<div class="row">

									<!--col-->
									<div class="col-xs-12 col-md-6 col">
										<div class="imgwrap">
											<img src="http://media.dcentertainment.com/sites/default/files/PLASMCONV_Cv1_R1_gallery_5543c2cdea2c82.60410834.jpg">
										</div>
									</div>
									<!--col-->
									<!--col-->
									<div class="col-xs-12 col-md-6 col">
										<h4>Fly to Edinburgh</h4>

										<p>Get lost in the cobbled alleyways of the Old Town, admire the Georgian splendour of the New Town and climb Calton Hill for outstanding views across the city. One of the best times to visit is during summer when the enormous Edinburgh Festival is at its peak.</p>
									</div>
									<!--col-->

								</div>
								<!--row ,use as a section-->
							
							</div>

						</div>
						<!--col-->

					</div>
				</div>
				<!--page3-->		

			</div>
			<!--root-->

			<div class="bg">
				<picture>
				    <source srcset="<?php echo base_url(); ?>assets/images/smaller.jpg" media="(max-width: 768px)">
				    <source srcset="<?php echo base_url(); ?>assets/images/default.jpg">
				    <img srcset="<?php echo base_url(); ?>assets/images/default.jpg" alt="My default image">
				</picture>
			</div>

		</div>
		<footer class="site-footer">

			<div class="wrap">
				<div class="container-fluid">
					<!--row ,use as a section-->
					<div class="row">
					
						<!--col-->
						<div class="col-xs-4 col-md-2 col">
							<img src="<?php echo base_url(); ?>assets/images/great-logo.png" alt="Great"/>
						</div>
						<!--col-->

						<!--col-->
						<div class="col-xs-6 col-md-2 pull-right col">
							<img class="qatarlog" src="<?php echo base_url(); ?>assets/images/QatarEN.png" alt="Qatar"/>
						</div>
						<!--col-->

					</div>
				</div>
			</div>

		</footer>


		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1984780878410642";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

	
		  <script>window.twttr = (function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0],
		    t = window.twttr || {};
		  if (d.getElementById(id)) return t;
		  js = d.createElement(s);
		  js.id = id;
		  js.src = "https://platform.twitter.com/widgets.js";
		  fjs.parentNode.insertBefore(js, fjs);

		  t._e = [];
		  t.ready = function(f) {
		    t._e.push(f);
		  };

		  return t;
		}(document, "script", "twitter-wjs"));</script>

	</body>
</html>