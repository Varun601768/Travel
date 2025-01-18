<section class="page-section bg-dark" id="home">
	<div class="container">
		<center>
			<h2 class="text-center" style="font-weight: 700;font-size: 30px; color:#24237e;">Tour Packages</h2>
		</center>
		<div class="d-flex w-100 justify-content-center">
			<hr class="border-warning" style="border:3px solid" width="15%">
		</div>
		<div class="w-100" style="font-family: arial;
	
	font-size:17px;
	width:700px;
	margin-left:350px;
	background:#e2f0fa;
	text-align:justify;
	border-radius:30px;">
			<?php
			require_once("config.php");
			$packages = $conn->query("SELECT * FROM `packages` order by rand() ");
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
				<center>
					<div class="card d-flex w-100 rounded-0 mb-3 package-item" style="    padding: 20px 20px 20px 20px;">
						<img class="card-img-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="200rem" style="object-fit:cover">
						<div class="card-body">
							<h5 class="card-title truncate-1" style="font-weight: 700; font-size:20px"> <?php echo $row['title'] ?></h5>
							<div class=" w-100 d-flex justify-content-start">
								<form action="">
									<div class="stars stars-small">
									<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
									</div>
								</form>
							</div>
							<p class="card-text truncate"><?php echo $row['description'] ?></p>

							<br>

							<div class="w-100 d-flex justify-content-between">

								<button class="org"><span class="rounded-0 btn btn-flat btn-sm btn-primary"><i class="fa fa-tag"></i> <?php echo number_format($row['cost']) ?></span></button>
								<button class="gre">
									<?php
									// Output the button with a link to the second PHP page
									echo '<a href="view_package.php?id=' . $row['id'] . '">Book Now</a>';
									?>
								</button>

							</div>

                            <br>
							<hr style="border:1px solid black; width:100%">
						</div>
					</div>
				<?php endwhile; ?>
				</center>
		</div>

	</div>
</section>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.checked {
  color: orange;
}
	.org {
		background: orange;
		width: 200px;
		height: 40px;
		border: none;
		font-size: 19px;
		text-decoration: none;
		color: white;
	}

	.gre {
		background: green;
		width: 150px;
		height: 35px;
		font-size: 19px;
	}

	
	.gre a{
		text-decoration: none;
		color:white;
	}
</style>