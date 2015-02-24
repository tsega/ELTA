<?php
$search_box = $page['search_box'];

?>
<div class="main
<?php

if (theme_get_setting('boson_boxed') == TRUE) {
	print 'boxed';
}
else {
	print 'boxed-none';
}
?> 
 ">

	<!-- TOP BAR 
	============================================= -->
	<div class="b-top-bar">
		<div class="layout">
			<!-- Some text -->
			<div class="wrap-left">
				<?php if ($page['top_left']): ?><?php print render($page['top_left']); ?><?php endif; ?>

			</div>
			<div class="wrap-right">
				<?php if ($page['top_right']): ?><?php print render($page['top_right']); ?><?php endif; ?>

			</div>
		</div>
	</div>
	<!-- END TOP BAR 
	============================================= -->

	<!-- SITE HEADER
	============================================= -->
	<div class="site-header clearfix">
		<div>
			<!-- Logo -->
			<?php if ($logo): ?>
				<a href="<?php print $front_page; ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
			<?php endif; ?>
		</div><!-- brand -->

		<div id="site-heading">
			<h1>የኢትዮጵያ ቁም እንስሳት ነጋዴዎች ማህበር</h1>
			<h1>Ethiopian Livestock Traders Association</h1>
		</div>

		<div>&nbsp;</div>
	</div>
	<!-- END SITE HEADER
	============================================= -->

	<!-- HEADER
	============================================= -->
	<div class="header">
		<div class="layout clearfix">
			<div class="mob-layout wrap-left">

				<div class="brand">
					<!-- Logo -->


				</div><!-- brand -->

				<div class="elta-main-menu">
					<?php print render($page['main_menu']); ?>
				</div>

				<!-- Search Form -->
				<?php if($search_box) { ?>
					<div class="b-search-form">
						<div class="input-wrap">
							<?php print render($search_box); ?>
						</div>
					</div>
				<?php } ?>
			</div>

			<!-- End Search Form -->

		</div>


	</div>
	<!-- END HEADER
	============================================= -->

	<!--  SLIDER
	============================================= -->
	<div class="slider clearfix">
		<?php if ($page['slider']): ?><?php print render($page   ['slider']); ?><?php endif; ?>
		<?php if($is_front): ?>
			<div class="banner">
				<ul>
					<li class="first">
						<div class="text-container">
							<h3 class="centered semibold uppercase">Ethiopian Livestock Traders Association</h3>
							<p>ELTA works towards the creation of a number one Livestock Association in Ethiopia with an international standard of excellence able to compete and succeed in the global livestock trade industry.</p>
							<a href="#" class="btn big blue">More <i class="icon-chevron-sign-right"></i></a>
						</div>
					</li>
					<li class="second">
						<div class="text-container">
							<h3 class="centered semibold uppercase">Become a Member</h3>
							<p>ELTA works towards the creation of a number one Livestock Association in Ethiopia with an international standard of excellence able to compete and succeed in the global livestock trade industry.</p>
							<a href="/user/register" class="btn big blue">Register <i class="icon-chevron-sign-right"></i></a>
						</div>
					</li>
					<li class="third">
						<div class="text-container">
							<h3 class="centered semibold uppercase">Discover New Opportunities</h3>
							<p>ELTA works towards the creation of a number one Livestock Association in Ethiopia with an international standard of excellence able to compete and succeed in the global livestock trade industry.</p>
							<a href="#" class="btn big blue">Connect <i class="icon-chevron-sign-right"></i></a>
						</div>
					</li>
				</ul>
			</div>
		<?php endif; ?>
	</div>
	<!-- END SLIDER
	============================================= -->

	<!-- FEATURED CONTENT
	============================================= -->


	<?php if ($page['featured']): ?>
		<div class="content-featured">
			<div class="layout">
				<?php print render($page['featured']); ?>
			</div>
		</div>

	<?php endif; ?>

	<!-- END FEATURED CONTENT
	============================================= -->




	<?php if (!drupal_is_front_page()): ?>

		<!-- TITLE BAR
        ============================================= -->
		<div class="b-titlebar">
			<div class="layout">
				<!-- Bread Crumbs -->
				<ul class="crumbs">


					<?php print $breadcrumb; ?>

				</ul>
				<!-- Title -->
				<h1 class="tb1"><?php print $title; ?></h1>
			</div>
		</div>
		<!-- END TITLE BAR -->
	<?php endif; ?>

	<?php if ($page['top_content']): ?>

		<div class="content shortcodes">
			<div class="layout  top-content">
				<?php print render($page['top_content']); ?>

			</div>
		</div>

	<?php endif; ?>

	<!-- CONTENT -->
	<div class="content shortcodes">
		<div class="layout" style="padding-bottom: 1px;">

			<?php if ($page['sidebar_first']): ?>
			<div class="row">
				<div class="row-item col-3_4">
					<?php endif; ?>
					<?php if (!$page['sidebar_first']): ?>
					<div class="dmd">
						<div class="dd">
							<?php endif; ?>



							<?php if ($messages): ?>
								<div id="messages">
									<?php print $messages; ?>
								</div>
							<?php endif; ?>

							<?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
							<?php print render($page['help']); ?>
							<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
							<?php print render($page['content']); ?>


						</div>

						<?php if ($page['sidebar_first']): ?>
							<!-- sidebar first -->
							<div class="row-item col-1_4 sidebar">
								<?php print render($page['sidebar_first']); ?>
							</div>
							<!-- // sidebar first -->
						<?php endif; ?>


					</div>

				</div>
			</div>

			<div class="content">

				<?php if($page['postscript_first'] || $page['postscript_second'] || $page['postscript_third'] || $page['postscript_fourth'] || $page['bottom'] ) : ?>

					<div class="layout">

						<?php if ($page['postscript_first']): ?>
							<?php print render($page['postscript_first']); ?>
							<div class="gap" style="height: 10px;"></div>
						<?php endif; ?>


						<div class="row">

							<?php if ($page['postscript_second']): ?>
								<div class="row-item col-1_2"><?php print render($page['postscript_second']); ?></div>
							<?php endif; ?>


							<?php if ($page['postscript_third']): ?>
								<div class="row-item col-1_2"><?php print render($page['postscript_third']); ?></div>
							<?php endif; ?>
						</div>


						<?php if ($page['postscript_fourth']): ?>
							<div class="gap" style="height: 10px;"></div>
							<?php print render($page['postscript_fourth']); ?>

						<?php endif; ?>




						<?php if ($page['bottom']): ?>
							<div class="gap" style="height: 10px;"></div>
							<?php print render($page['bottom']); ?>
						<?php endif; ?>



					</div>
				<?php endif; ?>


			</div>
			<!-- END CONTENT
            ============================================= -->

			<!-- FOOTER
            ============================================= -->
			<div class="footer">
				<!-- Widget Area -->
				<div class="b-widgets">
					<div class="layout">
						<div class="row">

							<div class="row-item col-1_4">

								<?php if ($page['footer_firstcolumn']): ?>
									<?php print render($page['footer_firstcolumn']); ?>
								<?php endif; ?>
							</div>

							<div class="row-item col-1_4">
								<?php if ($page['footer_secondcolumn']): ?>
									<?php print render($page['footer_secondcolumn']); ?>
								<?php endif; ?>

							</div>


							<div class="row-item col-1_4">

								<?php if ($page['footer_thirdcolumn']): ?>
									<?php print render($page['footer_thirdcolumn']); ?>
								<?php endif; ?>

							</div>


							<div class="row-item col-1_4">

								<?php if ($page['footer_fourthcolumn']): ?>
									<?php print render($page['footer_fourthcolumn']); ?>
								<?php endif; ?>
							</div>

						</div>
					</div>
				</div>

				<div class="b-copyright">
					<div class="layout clearfix">
						<div class="f-a">
							<?php if ($page['footer-a']): ?>
								<?php print render($page['footer-a']); ?>
							<?php endif; ?>
						</div>
						<div class="f-b">
							<?php if ($page['footer-b']): ?>
								<?php print render($page['footer-b']); ?>
							<?php endif; ?>

						</div>
					</div>
				</div>
				<!-- END FOOTER
                ============================================= -->


			</div>
			<!-- END MAIN
            ============================================= -->
