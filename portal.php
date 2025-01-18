<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	header.masthead {
		background-image: url('<?php echo validate_image($_settings->info('cover')) ?>') !important;
	}

	header.masthead .container {
		background: #0000006b;

	}

	img.card-img-top {
		margin-top: 10px;
	}

	.checked {
		color: orange;
	}
	button
	{
		background: green;
		color:white;
		border: none;
		height: 40px;
		border-radius: 10px;
	}
	button a{
		color:white;
	}
</style>

<!-- Services-->
<section class="page-section bg-dark" id="home">
	<div class="container">
		<h2 class="text-center" style="font-weight: 700;font-size: 30px; color:#24237e;">Tour Packages</h2>

		<div class="d-flex w-100 justify-content-center">
			<hr class="border-warning" style="border:3px solid" width="15%">
		</div>

		<div class="row">

			<?php
			$packages = $conn->query("SELECT * FROM `packages` order by rand() limit 3");
			while ($row = $packages->fetch_assoc()) :
				$cover = '';
				if (is_dir(base_app . 'uploads/package_' . $row['id'])) {
					$img = scandir(base_app . 'uploads/package_' . $row['id']);
					$k = array_search('.', $img);
					if ($k !== false)
						unset($img[$k]);
					$k = array_search('..', $img);
					if ($k !== false)
						unset($img[$k]);
					$cover = isset($img[2]) ? 'uploads/package_' . $row['id'] . '/' . $img[2] : "";
				}
				$row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));


				$review = $conn->query("SELECT * FROM `rate_review` where package_id='{$row['id']}'");
				$review_count = $review->num_rows;
				$rate = 0;
				while ($r = $review->fetch_assoc()) {
					$rate += $r['rate'];
				}
				if ($rate > 0 && $review_count > 0)
					$rate = number_format($rate / $review_count, 0, "");
			?>

				<div class="col-md-4 p-4 " style="
            border: 2px solid black;
            border-radius: 20px;
			font-size: 20px;
			text-align:center;
			font-family:arial;">

					<div class="card w-100 rounded-0">
						<center><img class="card-img-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="200rem" style="object-fit:cover"></center>
						<div class="card-body">
							<h5 class="card-title truncate-1 w-100"><?php echo $row['title'] ?></h5><br>
							<div class=" w-100 d-flex justify-content-start">
								<div class="stars stars-small">
									<div class="star-rating">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
									</div>
								</div>

							</div>
							<p class="card-text truncate">
								<?php
								$string = $row['description'];
								$string = (strlen($string) > 50) ? substr($string, 0, 120) . '...' : $string;
								echo $string;
								?>
							</p>
							<br>
                         <button>
							<?php
							// Output the button with a link to the second PHP page
							echo '<a href="view_package.php?id=' . $row['id'] . '">Book Now</a>';
							?>
						</button>
							<br>
							<br>
						</div>
					</div>
				</div>

			<?php endwhile; ?>
		</div>
		<br>
		<div class="d-flex w-100 justify-content-end" style="text-align: right;">
			<a href="packages.php" class="btn btn-flat btn-warning mr-4">Explore Package <i class="fa fa-arrow-right"></i></a>
		</div>
	</div>


</section>



