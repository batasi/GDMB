		<section class="home">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
						<!-- <div class="headline">
							<div class="nav" id="headline-nav">
								<a class="left carousel-control" role="button" data-slide="prev">
									<span class="ion-ios-arrow-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" role="button" data-slide="next">
									<span class="ion-ios-arrow-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							<div class="owl-carousel owl-theme" id="headline">							
								<div class="item">
									<a href="#"><div class="badge">Tip!</div> Vestibulum ante ipsum primis in faucibus orci</a>
								</div>
								<div class="item">
									<a href="#">Ut rutrum sodales mauris ut suscipit</a>
								</div>
							</div>
						</div> -->
						<?php
							// Pick a random verse reference (you can expand this list)
							$references = [
								"john 3:16",
								"Philippians 4:13",
								"psalm 23:1",
								"romans 8:28",
								"jeremiah 29:11",
								"proverbs 3:5",
								"isaiah 41:10",
								"Matthew 5:14"
							];
							$randomRef = $references[array_rand($references)];

							// Use Bible-API to fetch the verse text
							

							// Get random image from local folder
							$images = glob("images/verse/*.{jpg,png,jpeg}", GLOB_BRACE);
							$image = $images ? $images[array_rand($images)] : "images/default.jpg"; // fallback image

							$randomRef = $references[array_rand($references)];
							$apiUrl = "https://bible-api.com/" . urlencode($randomRef);

							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, $apiUrl);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							$response = curl_exec($ch);
							curl_close($ch);

							$verseData = json_decode($response, true);

							$verseText = isset($verseData['text']) ? $verseData['text'] : "Verse unavailable at the moment.";
							$verseReference = isset($verseData['reference']) ? $verseData['reference'] : $randomRef;
							// Replace Yahweh or all-uppercase LORD with "the Lord"
							$verseText = str_ireplace(['Yahweh', 'YHWH', 'LORD'], 'the Lord', $verseText);
						?>


						<div class="owl-carousel owl-theme slide" id="featured">
							<!-- Event 1 -->
							<div class="item">
								<article class="featured">
									<div class="overlay"></div>
									<figure>
										<img src="<?= $image ?>" loading="lazy" alt="Bible Verse of the Day">
									</figure>
									<div class="details">
										<div class="category"><a href="#">Verse of the Day</a></div>
										<h1><a href="#"><?= "{$verseReference} – {$verseText}" ?></a></h1>
										<div class="time"><?= date('l, F jS, Y') ?></div>
									</div>
								</article>
							</div>
<!-- 
							<div class="item">
								<article class="featured">
									<div class="overlay"></div>
									<figure>
										<img src="<?= $image ?>" loading="lazy" alt="Bible Verse of the Day">
									</figure>
									<div class="details">
										<div class="category"><a href="#">Verse of the Day</a></div>
										<h1><a href="#"><?= "{$verseReference} – {$verseText}" ?></a></h1>
										<div class="time"><?= date('l, F jS, Y') ?></div>
									</div>
								</article>
							</div>
							<div class="item">
								<article class="featured">
									<div class="overlay"></div>
									<figure>
										<img src="images/testimonies/testimony_image.jpg" alt="Testimony">
									</figure>
									<div class="details">
										<div class="category"><a href="#">Testimony</a></div>
										<h1><a href="#">“How I Found Faith Through Christ” - Jane Doe's Story</a></h1>
										<div class="time">March 2025</div>
									</div>
								</article>
							</div>
							<div class="item">
								<article class="featured">
									<div class="overlay"></div>
									<figure>
										<img src="images/prayer_requests/prayer_image.jpg" alt="Prayer Request">
									</figure>
									<div class="details">
										<div class="category"><a href="#">Prayer Requests</a></div>
										<h1><a href="#">Submit Your Prayer Requests to Us</a></h1>
										<div class="time">Ongoing</div>
									</div>
								</article>
							</div> -->
						</div>

						<!-- <div class="line">
							<div>Latest News</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="row">
									<article class="article col-md-12">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img10.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<div class="detail">
													<div class="time">December 10, 2016</div>
													<div class="category"><a href="category.html">Healthy</a></div>
												</div>
												<h2><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
												<footer>
													<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1263</div></a>
													<a class="btn btn-primary more" href="single.html">
														<div>More</div>
														<div><i class="ion-ios-arrow-thin-right"></i></div>
													</a>
												</footer>
											</div>
										</div>
									</article>
									<article class="article col-md-12">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img06.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<div class="detail">
													<div class="time">December 22, 2016</div>
													<div class="category"><a href="category.html">Healthy</a></div>
												</div>
												<h2><a href="single.html">Exercitation ullamco laboris nisi ut aliquip</a></h2>
												<p>Maecenas accumsan tortor ut velit pharetra mollis. Proin eu nisl et arcu iaculis placerat sollicitudin ut est. In fringilla dui dui.</p>
												<footer>
													<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>327</div></a>
													<a class="btn btn-primary more" href="single.html">
														<div>More</div>
														<div><i class="ion-ios-arrow-thin-right"></i></div>
													</a>
												</footer>
											</div>
										</div>
									</article>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="row">
									<article class="article col-md-12">
										<div class="inner">
											<figure>                                
												<a href="single.html">
													<img src="images/news/img05.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<div class="detail">
													<div class="time">December 09, 2016</div>
													<div class="category"><a href="category.html">Lifestyle</a></div>
												</div>
												<h2><a href="single.html">Mauris elementum libero at pharetra auctor</a></h2>
												<p>Vivamus in efficitur mi. Nullam semper justo ut elit lacinia lacinia. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
												<footer>
													<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1083</div></a>
													<a class="btn btn-primary more" href="single.html">
														<div>More</div>
														<div><i class="ion-ios-arrow-thin-right"></i></div>
													</a>
												</footer>
											</div>
										</div>
									</article>
									<article class="article col-md-12">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img07.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<div class="detail">
													<div class="time">December 21, 2016</div>
													<div class="category"><a href="category.html">Sport</a></div>
												</div>
												<h2><a href="single.html">Sed do eiusmod tempor incididunt ut labore</a></h2>
												<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris elementum libero at pharetra auctor.</p>
												<footer>
													<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>980</div></a>
													<a class="btn btn-primary more" href="single.html">
														<div>More</div>
														<div><i class="ion-ios-arrow-thin-right"></i></div>
													</a>
												</footer>
											</div>
										</div>
									</article>
								</div>
							</div>
						</div> 
						<div class="line transparent little"></div>
						
						<div class="line top">
							<div>Just Another News</div>
						</div>
						<div class="row">
							<article class="col-md-12 article-list">
								<div class="inner">
									<figure>
										<a href="single.html">
											<img src="images/news/img11.jpg" alt="Sample Article">
										</a>
									</figure>
									<div class="details">
										<div class="detail">
											<div class="category">
												<a href="#">Film</a>
											</div>
											<div class="time">December 19, 2016</div>
										</div>
										<h1><a href="single.html">Donec consequat arcu at ultrices sodales quam erat aliquet diam</a></h1>
										<p>
										Donec consequat, arcu at ultrices sodales, quam erat aliquet diam, sit amet interdum libero nunc accumsan nisi.
										</p>
										<footer>
											<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>273</div></a>
											<a class="btn btn-primary more" href="single.html">
												<div>More</div>
												<div><i class="ion-ios-arrow-thin-right"></i></div>
											</a>
										</footer>
									</div>
								</div>
							</article>
							<article class="col-md-12 article-list">
								<div class="inner">
									<div class="badge">
										Sponsored
									</div>
									<figure>
										<a href="single.html">
											<img src="images/news/img02.jpg" alt="Sample Article">
										</a>
									</figure>
									<div class="details">
										<div class="detail">
											<div class="category">
												<a href="#">Travel</a>
											</div>
											<div class="time">December 18, 2016</div>
										</div>
										<h1><a href="single.html">Maecenas accumsan tortor ut velit pharetra mollis</a></h1>
										<p>
											Maecenas accumsan tortor ut velit pharetra mollis. Proin eu nisl et arcu iaculis placerat sollicitudin ut est. In fringilla dui.
										</p>
										<footer>
											<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>4209</div></a>
											<a class="btn btn-primary more" href="single.html">
												<div>More</div>
												<div><i class="ion-ios-arrow-thin-right"></i></div>
											</a>
										</footer>
									</div>
								</div>
							</article>
							<article class="col-md-12 article-list">
								<div class="inner">
									<figure>
										<a href="single.html">
											<img src="images/news/img03.jpg" alt="Sample Article">
										</a>
									</figure>
									<div class="details">
										<div class="detail">
											<div class="category">
											<a href="#">Travel</a>
											</div>
											<div class="time">December 16, 2016</div>
										</div>
										<h1><a href="single.html">Nulla facilisis odio quis gravida vestibulum Proin venenatis pellentesque arcu</a></h1>
										<p>
											Nulla facilisis odio quis gravida vestibulum. Proin venenatis pellentesque arcu, ut mattis nulla placerat et.
										</p>
										<footer>
											<a href="#" class="love active"><i class="ion-android-favorite"></i> <div>302</div></a>
											<a class="btn btn-primary more" href="single.html">
												<div>More</div>
												<div><i class="ion-ios-arrow-thin-right"></i></div>
											</a>
										</footer>
									</div>
								</div>
							</article>
							<article class="col-md-12 article-list">
								<div class="inner">
									<figure>
										<a href="single.html">
											<img src="images/news/img09.jpg" alt="Sample Article">
										</a>
									</figure>
									<div class="details">
										<div class="detail">
											<div class="category">
												<a href="#">Healthy</a>
											</div>
											<div class="time">December 16, 2016</div>
										</div>
										<h1><a href="single.html">Maecenas blandit ultricies lorem id tempor enim pulvinar at</a></h1>
										<p>
											Maecenas blandit ultricies lorem, id tempor enim pulvinar at. Curabitur sit amet tortor eu ipsum lacinia malesuada.
										</p>
										<footer>
											<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>783</div></a>
											<a class="btn btn-primary more" href="single.html">
												<div>More</div>
												<div><i class="ion-ios-arrow-thin-right"></i></div>
											</a>
										</footer>
									</div>
								</div>
							</article>
						</div> -->
					</div>
					<div class="col-xs-6 col-md-4 sidebar" id="sidebar">
						<div class="sidebar-title for-tablet">Sidebar</div>
						<aside>
							<div class="aside-body">
								<div class="featured-author">
									<div class="featured-author-inner">
										<div class="featured-author-cover" style="background-image: url('images/18.jpg');">
											<div class="badges">
												<div class="badge-item"><i class="ion-star"></i></div>
											</div>
											<div class="featured-author-center">
												<figure class="featured-author-picture">
													<img src="images/IMG_0785.jpg" loading="lazy" alt="Sample Article">
												</figure>
												<div class="featured-author-info">
													<div class="desc"></div>
												</div>
											</div>
										</div>
										<div class="featured-author-body">
											<div class="featured-author-count">
												<div class="item">
													<a href="#">
														<div class="icon">
															<div>More</div>
															<i class="ion-chevron-right"></i>
														</div>														
													</a>
												</div>
											</div>
											<div class="featured-author-quote">
												<h6>
													"We seek to create innovative ways of engagement that bring people and communities together in creative and interactive ways"
												</h6>
										    </div>
											<div class="block">
												<h2 class="block-title">Our Photos</h2>
												<div class="block-body">
													<ul class="item-list-round" data-magnific="gallery">
														<?php
														$imageFiles = glob("images/gallery/*.{jpg,jpeg,png}", GLOB_BRACE);
														$visibleCount = 6; // Number of initially visible images
														$count = 0;

														foreach ($imageFiles as $index => $image) {
															$isHidden = $index >= $visibleCount ? 'hidden' : '';
															$moreText = $index == $visibleCount - 1 && count($imageFiles) > $visibleCount ? "<div class='more'>+" . (count($imageFiles) - $visibleCount) . "</div>" : "";
															echo "<li class='{$isHidden}'><a href='{$image}' style='background-image: url(\"{$image}\");'>{$moreText}</a></li>";
														}
														?>
													</ul>
												</div>
											</div>

											<div class="featured-author-footer">
												<a href="#">Explore Our Gallery</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</aside>
						<!-- <aside>
							<h1 class="aside-title">Popular <a href="#" class="all">See All <i class="ion-ios-arrow-right"></i></a></h1>
							<div class="aside-body">
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="images/news/img07.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">Fusce ullamcorper elit at felis cursus suscipit</a></h1>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="images/news/img14.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="images/news/img09.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">Aliquam et metus convallis tincidunt velit ut rhoncus dolor</a></h1>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="images/news/img11.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">dui augue facilisis lacus fringilla pulvinar massa felis quis velit</a></h1>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="images/news/img06.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">neque est semper nulla, ac elementum risus quam a enim</a></h1>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="images/news/img03.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">Morbi vitae nisl ac mi luctus aliquet a vitae libero</a></h1>
										</div>
									</div>
								</article>
							</div>
						</aside>
						
						<aside>
							<ul class="nav nav-tabs nav-justified" role="tablist">
								<li class="active">
									<a href="#recomended" aria-controls="recomended" role="tab" data-toggle="tab">
										<i class="ion-android-star-outline"></i> Recomended
									</a>
								</li>
								<li>
									<a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">
										<i class="ion-ios-chatboxes-outline"></i> Comments
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="recomended">
									<article class="article-fw">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img16.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="details">
												<div class="detail">
													<div class="time">December 31, 2016</div>
													<div class="category"><a href="category.html">Sport</a></div>
												</div>
												<h1><a href="single.html">Donec congue turpis vitae mauris</a></h1>
												<p>
													Donec congue turpis vitae mauris condimentum luctus. Ut dictum neque at egestas convallis. 
												</p>
											</div>
										</div>
									</article>
									<div class="line"></div>
									<article class="article-mini">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img05.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
												<div class="detail">
													<div class="category"><a href="category.html">Lifestyle</a></div>
													<div class="time">December 22, 2016</div>
												</div>
											</div>
										</div>
									</article>
									<article class="article-mini">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img02.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<h1><a href="single.html">Fusce ullamcorper elit at felis cursus suscipit</a></h1>
												<div class="detail">
													<div class="category"><a href="category.html">Travel</a></div>
													<div class="time">December 21, 2016</div>
												</div>
											</div>
										</div>
									</article>
									<article class="article-mini">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img10.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
												<div class="detail">
													<div class="category"><a href="category.html">Healthy</a></div>
													<div class="time">December 20, 2016</div>
												</div>
											</div>
										</div>
									</article>
								</div>
								<div class="tab-pane comments" id="comments">
									<div class="comment-list sm">
										<div class="item">
											<div class="user">                                
												<figure>
													<img src="images/img01.jpg" alt="User Picture">
												</figure>
												<div class="details">
													<h5 class="name">Mark Otto</h5>
													<div class="time">24 Hours</div>
													<div class="description">
														Lorem ipsum dolor sit amet, consectetur adipisicing elit.
													</div>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="user">                                
												<figure>
													<img src="images/img01.jpg" alt="User Picture">
												</figure>
												<div class="details">
													<h5 class="name">Mark Otto</h5>
													<div class="time">24 Hours</div>
													<div class="description">
														Lorem ipsum dolor sit amet, consectetur adipisicing elit.
													</div>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="user">                                
												<figure>
													<img src="images/img01.jpg" alt="User Picture">
												</figure>
												<div class="details">
													<h5 class="name">Mark Otto</h5>
													<div class="time">24 Hours</div>
													<div class="description">
														Lorem ipsum dolor sit amet, consectetur adipisicing elit.
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</aside>
						<aside id="sponsored">
							<h1 class="aside-title">Sponsored</h1>
							<div class="aside-body">
								<ul class="sponsored">
									<li>
										<a href="#">
											<img src="images/sponsored.png" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="images/sponsored.png" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="images/sponsored.png" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="images/sponsored.png" alt="Sponsored">
										</a>
									</li> 
								</ul>
							</div>
						</aside> -->
					</div>
				</div>
			</div>
		</section>

		<section class="best-of-the-week">
			<div class="container">
				<h1><div class="text-center">Best Of The Week</div>
					<div class="carousel-nav" id="best-of-the-week-nav">
						<div class="prev" style="color:white; background-color:black;" >
							<i class="ion-ios-arrow-left"></i>
						</div>
						<div class="next" style="color:white; background-color:black;" >
							<i class="ion-ios-arrow-right"></i>
						</div>
					</div>
				</h1>
				<div class="owl-carousel owl-theme carousel-1">
					<article class="article">
						<div class="inner">
							<figure>
								<a href="./?p=blogs/baptism">
									<img src="images/2.jpg" loading="lazy" alt="Sermon of the Week">
								</a>
							</figure>
							<div class="padding">
								<div class="detail">
									<div class="time">January 17, 2025</div>
									<div class="category"><a href="#">Sermons</a></div>
								</div>
								<h2><a href="./?p=blogs/baptism">Saved & Condemned</a></h2>
								<p>Mark 16:16 speaks about faith, baptism, and salvation, emphasizing the importance of believing in Jesus Christ....</p>
							</div>
						</div>
					</article>	
					<article class="article">
						<div class="inner">
							<figure>
								<a href="./?p=blogs/shepherd">
									<img src="images/blogs/shepherd.png" loading="lazy" alt="Sermon of the Week">
								</a>
							</figure>
							<div class="padding">
								<div class="detail">
									<div class="time">January 16, 2025</div>
									<div class="category"><a href="#">Sermons</a></div>
								</div>
								<h2><a href="./?p=blogs/shepherd">The lord is my good shepherd</a></h2>
								<p>Psalm 23 is one of the most cherished biblical declarations, reflecting God’s care for His people. God is portrayed as the...</p>
							</div>
						</div>
					</article>	
					<article class="article">
						<div class="inner">
							<figure>
								<a href="./?p=blogs/faith">
									<img loading="lazy" src="images/4.jpg" alt="Sermon of the Week">
								</a>
							</figure>
							<div class="padding">
								<div class="detail">
									<div class="time">January 14, 2025</div>
									<div class="category"><a href="#">Sermons</a></div>
								</div>
								<h2><a href="./?p=blogs/faith">“The Power of Faith” – A Message of Breakthrough</a></h2>
								<p>This week’s sermon reminds us to trust God through trials. Read the full message here...</p>
							</div>
						</div>
					</article>
					<article class="article">
						<div class="inner">
							<figure>
								<a href="./?p=503">
									<img src="images/13.jpg" loading="lazy" alt="Devotional Highlight">
								</a>
							</figure>
							<div class="padding">
								<div class="detail">
									<div class="time">April 04, 2025</div>
									<div class="category"><a href="./?p=503">Devotional</a></div>
								</div>
								<h2><a href="./?p=503">Morning Grace: Starting Your Day With God</a></h2>
								<p>A refreshing devotional reminding us to seek God’s presence.</p>
							</div>
						</div>
					</article>
					<!-- Article 3: Scripture of the Week -->
					<article class="article">
						<div class="inner">
							<figure>
								<a href="./?p=503">
									<img src="images/15.jpg" loading="lazy" alt="Scripture of the Week">
								</a>
							</figure>
							<div class="padding">
								<div class="detail">
									<div class="time">April 03, 2025</div>
									<div class="category"><a href="./?p=503">Scripture</a></div>
								</div>
								<h2><a href="./?p=503">Philippians 4:6 – Do Not Be Anxious</a></h2>
								<p>"Do not be anxious about anything..." A gentle reminder to bring all our worries to God in prayer.</p>
							</div>
						</div>
					</article>
					<!-- Article 4: Weekly Prayer Focus -->
					<article class="article">
						<div class="inner">
							<figure>
								<a href="./?p=503">
									<img src="images/16.jpg" loading="lazy" alt="Prayer Focus">
								</a>
							</figure>
							<div class="padding">
								<div class="detail">
									<div class="time">April 02, 2025</div>
									<div class="category"><a href="./?p=503">Prayer</a></div>
								</div>
								<h2><a href="./?p=503">Prayer Focus: Peace in Our Hearts and Homes</a></h2>
								<p>This week we pray for God’s peace to reign within families, communities, and personal lives.</p>
							</div>
						</div>
					</article>
					<!-- Article 5: Worship Moment -->
					<article class="article">
						<div class="inner">
							<figure>
								<a href="./?p=503">
									<img src="images/17.jpg" loading="lazy" alt="Worship Moment">
								</a>
							</figure>
							<div class="padding">
								<div class="detail">
									<div class="time">April 01, 2025</div>
									<div class="category"><a href="./?p=503">Worship</a></div>
								</div>
								<h2><a href="./?p=503">Heaven Touched Earth: Praise Night Recap</a></h2>
								<p>An evening of pure worship where hearts were lifted and God’s presence filled the room.</p>
							</div>
						</div>
					</article>
					<!-- Article 6: Quote from Pastor -->
					<article class="article">
						<div class="inner">
							<figure>
								<a href="./?p=503">
									<img src="images/18.jpg" loading="lazy" alt="Pastor Quote">
								</a>
							</figure>
							<div class="padding">
								<div class="detail">
									<div class="time">March 31, 2025</div>
									<div class="category"><a href="./?p=503">Quote</a></div>
								</div>
								<h2><a href="./?p=503">"Faith is Trusting God's Silence" – Pastor David</a></h2>
								<p>This week’s quote reminds us that even in silence, God is working behind the scenes.</p>
							</div>
						</div>
	     			</article>
					<article class="article">
						<div class="inner">
							<figure>
								<a href="./?p=503">
									<img src="images/19.jpg" loading="lazy" alt="Pastor Quote">
								</a>
							</figure>
							<div class="padding">
								<div class="detail">
									<div class="time">March 31, 2025</div>
									<div class="category"><a href="./?p=503">Quote</a></div>
								</div>
								<h2><a href="./?p=503">"Faith is Trusting God's Silence" – Pastor David</a></h2>
								<p>This week’s quote reminds us that even in silence, God is working behind the scenes.</p>
							</div>
						</div>
					</article>
					<article class="article">
						<div class="inner">
							<figure>
								<a href="./?p=503">
									<img src="images/20.png" loading="lazy" alt="Worship Moment">
								</a>
							</figure>
							<div class="padding">
								<div class="detail">
									<div class="time">April 01, 2025</div>
									<div class="category"><a href="./?p=503">Worship</a></div>
								</div>
								<h2><a href="./?p=503">Heaven Touched Earth: Praise Night Recap</a></h2>
								<p>An evening of pure worship where hearts were lifted and God’s presence filled the room.</p>
							</div>
						</div>
					</article>		
				</div>
			</div>
		</section>
		<section class="home">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
						<div class="banner">
							<a href="#">
								<img src="images/kk.jpg" alt="Sample Article">
							</a>
						</div>
						<div class="line transparent little"></div>
						<div class="row">
							<div class="col-md-6 col-sm-6 trending-tags">
								<h1 class="title-col">Trending Tags</h1>
								<div class="body-col">
									<ol class="tags-list">
										<li><a href="./?p=503">Faith</a></li>
										<li><a href="./?p=503">Community Outreach</a></li>
										<li><a href="./?p=503">Youth Ministry</a></li>
										<li><a href="./?p=503">Charity Events</a></li>
										<li><a href="./?p=503">Volunteering</a></li>
										<li><a href="./?p=503">Global Mission</a></li>
										<li><a href="./?p=503">Health Initiatives</a></li>
										<li><a href="./?p=503">Religious Studies</a></li>
										<li><a href="./?p=503">Humanitarian Aid</a></li>
										<li><a href="./?p=503">Spiritual Growth</a></li>
									</ol>
								</div>

							</div>
							<div class="col-md-6 col-sm-6">
								<h1 class="title-col">
									Hot News
									<div class="carousel-nav" id="hot-news-nav">
										<div class="prev" style="background-color:black;">
											<i class="ion-ios-arrow-left"></i>
										</div>
										<div class="next" style="background-color:black;">
											<i class="ion-ios-arrow-right"></i>
										</div>
									</div>
								</h1>
								<div class="body-col vertical-slider" data-max="4" data-nav="#hot-news-nav" data-item="article">
									<article class="article-mini">
										<div class="inner">
										<figure>
											<a href="#">
											<img src="images/16.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="./?p=503">Missionary Work in Kenya: A Heartfelt Journey</a></h1>
											<div class="detail">
											<div class="category"><a href="#">Global Mission</a></div>
											<div class="time">April 7, 2025</div>
											</div>
										</div>
										</div>
									</article>
									 <article class="article-mini">
										<div class="inner">
										<figure>
											<a href="#">
											<img src="images/IMG_0798.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="./?p=503">Spreading Faith Through Education: A Global Effort</a></h1>
											<div class="detail">
											<div class="category"><a href="#">Education</a></div>
											<div class="time">April 6, 2025</div>
											</div>
										</div>
										</div>
									</article>
									<article class="article-mini">
										<div class="inner">
										<figure>
											<a href="#">
											<img src="images/18.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="./?p=503">New Charity Event for Underprivileged Communities</a></h1>
											<div class="detail">
											<div class="category"><a href="#">Charity</a></div>
											<div class="time">April 5, 2025</div>
											</div>
										</div>
										</div>
									</article>
									<article class="article-mini">
										<div class="inner">
											<figure>
											<a href="#">
												<img src="images/18.jpg" alt="Sample Article">
											</a>
											</figure>
											<div class="padding">
											<h1><a href="./?p=503">Building Stronger Communities Through Faith</a></h1>
											<div class="detail">
												<div class="category"><a href="#">Community</a></div>
												<div class="time">April 4, 2025</div>
											</div>
											</div>
										</div>
									</article>
									<article class="article-mini">
										<div class="inner">
											<figure>
											<a href="#">
												<img src="images/19.jpg" alt="Sample Article">
											</a>
											</figure>
											<div class="padding">
											<h1><a href="./?p=503">New Volunteer Program to Support Families in Need</a></h1>
											<div class="detail">
												<div class="category"><a href="#">Volunteer</a></div>
												<div class="time">April 3, 2025</div>
											</div>
											</div>
										</div>
									</article>
									<article class="article-mini">
										<div class="inner">
											<figure>
											<a href="#">
												<img src="images/bible/1.jpg" alt="Sample Article">
											</a>
											</figure>
											<div class="padding">
											<h1><a href="./?p=503">Empowering Youth Through Education and Mentorship</a></h1>
											<div class="detail">
												<div class="category"><a href="#">Youth Ministry</a></div>
												<div class="time">April 2, 2025</div>
											</div>
											</div>
										</div>
									</article>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-6 col-md-4 sidebar" id="sidebar">
					<div class="sidebar-title for-tablet">Sidebar</div>
					<aside>
						<div class="aside-body">
							<form class="newsletter"  style="background-color:#252e38;">
								<div class="icon">
									<i class="ion-ios-email-outline"></i>
									<h1>Newsletter</h1>
								</div>
								<div class="input-group">
									<input type="email" class="form-control email" placeholder="Your mail">
									<div class="input-group-btn">
										<button class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
									</div>
								</div>
								<p>By subscribing you will receive new articles in your email.</p>
							</form>
						</div>
					</aside>
					<aside>
						<h1 class="aside-title">Videos
							<div class="carousel-nav" id="video-list-nav">
								<div class="prev" style="background-color:black;"><i class="ion-ios-arrow-left"></i></div>
								<div class="next" style="background-color:black;"><i class="ion-ios-arrow-right"></i></div>
							</div>
						</h1>
						<div class="aside-body">
							<ul class="video-list" data-youtube='"carousel":true, "nav": "#video-list-nav"'>
								<li><a data-youtube-id="GsT3w0W3Isw" data-action="magnific"></a></li>
								<li><a data-youtube-id="sG9XELyani4" data-action="magnific"></a></li>
								<li><a data-youtube-id="ZeLy2z29w5E" data-action="magnific"></a></li>
								<li><a data-youtube-id="wA1cMMe9ccA" data-action="magnific"></a></li>
							</ul>
							<div class="sharing">
								<ul class="social">
									<li>
										<a href="https://www.youtube.com/@globalministries-dailybread" target="_blank" class="youtube">
											<i class="ion-social-youtube"></i> For More Videos, Subscribe
										</a>
									</li>
								</ul>
							</div>
						</div>
					</aside>
					</div>
				</div>
			</div>
		</section>