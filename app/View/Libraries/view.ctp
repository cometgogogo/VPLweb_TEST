<?php $this->Html->addCrumb("Home" , "/"); ?>
<?php $this->Html->addCrumb("About Vaughan Public Libraries" , "/about"); ?>
<?php $this->Html->addCrumb("Locations and Hours" , "/libraries"); ?>
<?php
$this->pageTitle = $library['Library']['BranchName'];
?>


<script language="javascript" type="text/javascript" >
	pictures = new Array();
	currentPicture = <?php echo $currentPicture; ?>;
	<?php




		foreach ($details["pictures"] as $element => $picture) {
			echo "	picture = new Array();
					picture['picture'] = '" . $picture["picture"] . "';
					picture['caption'] = '" . $picture["caption"] . "';
					pictures[" . $element . "] = picture;
					";
		}
	?>


	function onLoad() {
		document.getElementById('control_javascript').style.display = 'block';
	}

	function onPictureChange(newPicture) {
		document.getElementById('picture_link_' + currentPicture).className = "non_current";
		document.getElementById('picture_' + currentPicture).style.display = "none";

		document.getElementById('picture_' + (newPicture - 1)).style.display = "block";
		document.getElementById('picture_link_' + (newPicture- 1)).className = "current";
		currentPicture = newPicture - 1;
	}

	function onPictureNext() {
		onPictureChange((currentPicture +1) % pictures.length +1);
	}

	function onPicturePrevious() {
		onPictureChange((currentPicture + pictures.length -1) % pictures.length +1);
	}


</script>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1><?php echo $library['Library']['BranchName']?></h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<?php if ($details["elibrary"]) { ?>
			<div class="intro">
				<p>
					VPL's Web site &#8212; the ELibrary &#8212; is Vaughan's electronic public library.<br><br>It
					is a resource tailored by VPL librarians and support staff to meet the
					needs of people who live, work, or study in Vaughan. At the ELibrary,
					you can do most of the things you can do at your local community or
					resource library:
				</p>
			</div>
			<hr />
		<?php } else { ?>

			<div class="intro">
			
			
			<a href="<?php echo '/events_calendars/calendar/library/' . $library['Library']['BranchID']; ?> "><img class="img_wrapped_right" width="200px" src="/img/myCalendar.gif" title="<?php echo 'Check out What\'s On @ ' . $library['Library']['BranchName']; ?>" alt="<?php echo 'Check out What\'s On @ ' . $library['Library']['BranchName']; ?>" /></a>
			
				
				<?php

				$location_js = "";

				if ($library['Library']['street'] <> "") { ?>
				 	<img class="img_wrapped_left" width="110px" height="72px" src="<?php echo "/img/libraries/" . $library['Library']['image']; ?>" alt="<?php echo $library['Library']['BranchName']?>" />
					<?php echo $library['Library']['street']; ?><br />
					<?php echo $library['Library']['city']; ?>, Ontario <?php echo $library['Library']['postal_code']; ?>

					<?php $location_js = str_replace(" ","%20",$library['Library']['street'])."%20".str_replace(" ","%20",$library['Library']['city'])."%20".str_replace(" ","%20",$library['Library']['postal_code']);
					?>


				<?php } ?>
				<br />

				<?php if ($library['Library']['telephone'] <> "") { ?>
					Telephone: <?php echo $library['Library']['telephone']; ?><br />
				<?php } ?>
				<?php if ($library['Library']['fax'] <> "") { ?>
					Fax: <?php echo $library['Library']['fax']; ?><br />
				<?php } ?>
				<?php if (!$details["elibrary"]) { ?>
					<a class="map_link" href="#direction">Direction</a>&nbsp;&nbsp;&nbsp;<a class="map_link" href="/libraries/map">Map</a>&nbsp;&nbsp;&nbsp;<a class="map_link" href="/files/factSheet_<?php echo $library['Library']['BranchShort']; ?>.pdf" target="_blank">Fact Sheet</a>
					<?php if ($library['Library']['BranchID'] == "7") { ?>
						&nbsp;&nbsp;&nbsp;<a class="map_link" href="http://www.youtube.com/user/VaughanPL#p/u/9/LPZZcP9wE5c" rel="external">Online Tour</a>
					<?php } ?>
					<?php if ($library['Library']['BranchID'] == "2") { ?>
						&nbsp;&nbsp;&nbsp;<a class="map_link" href="http://www.youtube.com/user/VaughanPL#p/u/1/7GhliC9gb-w" rel="external">Online Tour</a>
					<?php } ?><BR/>



				<?php } ?>

		<?php } ?>

		<div class="manager"><br/>
			<?php if ($details['manager']['name'] <> "") { ?>
				<strong>Manager: </strong><br/>
				<?php echo $details['manager']['name']; ?> <br/>
				<?php echo $details['manager']['email']; ?><br/><br/>
			<?php } ?>

			<?php if ($details['coordinator']['name'] <> "") { ?>
				<strong>Library Co-ordinator: </strong><br/>
				<?php echo $details['coordinator']['name']; ?> <br/>
				<?php echo $details['coordinator']['email']; ?>
			<?php } ?>


		</div>
		<br/>
		
		<?php if ($library['Library']['BranchID'] == "8" ) { ?>
			<div class="servicenotes">* Woodbridge Library will be CLOSED for renovations starting Tuesday, May 26 and will reopen on Saturday, May 30 at 10 am. Customers can deactivate their holds online or pick them up at <a href="/libraries/view/7">Pierre Berton Resource Library</a>.</div>
		<?php } ?>
		


	</div>

<hr />

		<?php if (count($details["hours"]) > 0) { ?>
			<div class="time_table">
				<h2>Hours of Operation</h2>
				<?php foreach ($details["hours"] as $weekday => $hours) { ?>
					<div class="entry">
						<div class="name"><?php echo $weekday; ?></div>
						<div class="value"><?php echo $hours; ?></div>
					</div>
				<?php } ?>
				<!--
				<?php if ($library['Library']['BranchID'] != "2" && $library['Library']['BranchID'] != "7") { ?>
					<div class="note">* The library is <span style="color: red; font-weight: bold;">CLOSED</span> on Sundays in July and August.</div>
				<?php } ?>				
				-->
			</div>
		<?php } ?>



		<?php if (count($details["features"]) > 0) { ?>
			<div class="feature_chart">
				<ul>
					<?php foreach ($library["LibraryFeature"] as $libraryFeature) {

						

					?>
						<li id="<?php echo $libraryFeature['Image'];?>"><?php echo $this->Html->link($libraryFeature["Name"], $libraryFeature["PageURL"]); ?></li>

					<?php
					}
					

					?>


				</ul>
			</div>
			<hr />
		<?php } ?>

<!--
		<?php if ($details["internet_access"]) { ?>
			<div class="entry">
				<h2>Free Public Computers </h2>
				<p>Use of any of the public access Internet terminals is free of charge and granted on a
				first come - first served basis. The library also has computers equipped with Microsoft Word, Excel and PowerPoint.
				</p>
			</div>
		<?php } ?>
-->
		<?php if ($details["multilingual"]) { ?>
			<div class="entry">
				<h2>Multilingual Collections</h2>
				<p><?php echo $library['Library']['BranchName']?> has <?php echo $this->Html->link("collections of materials","/newcomers"); ?> in <?php  echo $details["multilingual"]; ?> other than English and French.
				</p>
			</div>
		<?php } ?>


		<?php if ($details["special_collections"]) { ?>
			<div class="entry">
				<h2>Special Collections</h2>
				<p><?php echo $library['Library']['BranchName']?> has <?php  echo $details["special_collections"]; ?>.
				</p>
			</div>
		<?php } ?>

		
			<div>
				<h2><a name="direction">Directions by Google Map</a></h2><br/>
<p>Click "More options" to get the directions</p>
				
				<iframe src="https://www.google.com/maps/embed?pb=<?php echo $details['gmaploc']; ?>" width="400" height="300" frameborder="1" style="border:1"></iframe>

			</div>
		

		<?php if ($details["elibrary"]) { ?>
			<div class="entry">
				<h2>Become a VPL Member</h2>
				<p>
					If you are not already a Vaughan Public Libraries member, <?php echo $this->Html->link("apply for membership online","#"); ?>.
				</p>
			</div>
			<div class="entry">
				<h2>Search the Vaughan Public Libraries Catalogue</h2>
				<p>
					Browse the <?php echo $this->Html->link("library catalogue","/materials/catalogues"); ?>library catalogue, reserve, and renew library materials.
				</p>
			</div>
			<div class="entry">
				<h2>Email Librarian</h2>
				<p>
					Qualified librarians are always on hand to answer your questions when
					you visit the library. If you can't get to the library, e-mail your
					questions to <?php echo $this->Html->link("Email Librarian","/email_librarian"); ?> and your question will be answered within
					24 hours.
				</p>
			</div>
			<div class="entry">
				<h2>Search Recommended Links</h2>
				<p>
					<?php echo $this->Html->link("Librarian-researched Web sites","/links"); ?> for general information, for study or for business.
				</p>
			</div>
			<div class="entry">
				<h2>Search Premium Databases</h2>
				<p>
					Vaughan Public Libraries subscribe to a number of <?php echo $this->Html->link("databases","/databases"); ?> that are free to VPL members.
				</p>
			</div>
			<div class="entry">
				<h2>Find Information About Vaughan</h2>
				<p>
					<?php echo $this->Html->link("eVaughan","/community/vaughan"); ?> is a growing portal to information for everyday life in the City of Vaughan.
				</p>
			</div>
			<div class="entry">
				<h2>Check what's On</h2>
				<p>
					Search for library <?php echo $this->Html->link("programs","/programs"); ?> of interest to VPL members of all ages.
				</p>
			</div>
			<div class="entry">
				<h2>Suggest an Item for Purchase</h2>
				<p>
					Use
					our <?php echo $this->Html->link("form","/user_requests/add/purchase"); ?> to suggest an item you would like added to our collection.
					Your suggestion will be responded to within seven days.
				</p>
			</div>
			<div class="entry">
				<h2>Contact Your Local Branch</h2>
				<p>
					Find out what's on at your local <?php echo $this->Html->link("library","/libraries"); ?>, call library staff with your reference or membership questions and more.
				</p>
			</div>
		<?php } ?>

		&nbsp;
		<!--
		<hr />
		<?php if (count($details["pictures"]) > 0) { ?>
			<div id="photo_tour">
				<div class="title_caption">Photo tour</div>
				<noscript>
					<h3><?php echo $details["pictures"][$currentPicture]["caption"] ; ?></h3>
					<img id="library_picture" src="/img/libraries/<?php echo $details["pictures"][$currentPicture]["picture"]; ?>" width="310px"/>
					<div class="section_end">&nbsp;</div>
					<?php
						if ($currentPicture > 0) {
							echo $this->Html->link("Previous","/libraries/view/" . $library['Library']['BranchID'] . "/" . $currentPicture . "/#photo_tour") . "&nbsp;&nbsp;";
						} else {
							echo "Previous&nbsp;&nbsp;";
						}
						foreach ($details["pictures"] as $element => $picture) {
							if ($element == $currentPicture) {
								echo "<div class='current'>" . ($element+1) . "</div>&nbsp;&nbsp;";
							} else {
								echo $this->Html->link($element+1, "/libraries/view/" . $library['Library']['BranchID'] . "/" .  ($element+1) . "/#photo_tour") . "&nbsp;&nbsp;";
							}
						}
						if ($currentPicture+1 < count($details["pictures"])) {
							echo $this->Html->link("Next","/libraries/view/" . $library['Library']['BranchID'] . "/" . ($currentPicture +2) . "/#photo_tour");
						} else {
							echo "Next&nbsp;&nbsp;";
						}

					?>
				</noscript>
				<div id="control_javascript">
					<?php foreach ($details["pictures"] as $element => $picture) { ?>
							<div id="picture_<?php echo $element ; ?>" class = "<?php echo ($element == $currentPicture ? "current" : "non_current"); ?>">
								<h3><?php echo $picture["caption"] ; ?></h3>
								<img id="library_picture" src="/img/libraries/<?php echo $picture["picture"] ; ?>" width="310px"/>
							</div>
					<?php } ?>

					<?php
					echo $this->Html->link("Previous","javascript:onPicturePrevious()"). "&nbsp;&nbsp;";
					foreach ($details["pictures"] as $element => $picture) {
						echo $this->Html->link($element+1, "javascript:onPictureChange(" . ($element+1) . ");", array("id"=>"picture_link_" . $element, "class"=> ($element == $currentPicture ? "current" : ""))) . "&nbsp;&nbsp;";
					}
					echo $this->Html->link("Next","javascript:onPictureNext()");
					?>
				</div>
			</div>&nbsp;
		<?php } ?>
		-->

	</div>

	<div class="closing"></div>
</div>
