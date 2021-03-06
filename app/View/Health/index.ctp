<?php
$this->Html->addCrumb("Home" , "/");
$this->Html->addCrumb("Books & Resources" , "/materials");
?>

<?php
$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Welcome Brochures","url"=>"/materials/welcome"), array("Title"=>"Borrowing Materials","url"=>"/services/borrowing"), array("Title"=>"Library Services","url"=>"/library_services"), array("Title"=>"Email Librarian","url"=>"/email_librarian")))));

$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Health & Wellness</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"><h2><span style="display: none !important;">Health & Wellness Content</span></h2></div>
	<div class="details">
	<div class="entry">
	<div id="tabs" class="ui-tabs-nav">

	<ul>
		<li><a href="#collection">Library Collections</a></li>
		<li><a href="#database">Article & Research</a></li>
		<li><a href="#link">Links</a></li>



	</ul>

<!----- Collection Starts ----->
	<div id="collection" class="tab">
<h3>Health Topics</h3>
		<div class="search_results">
		<ul>
				<li><div class="name"><a href="http://catalogue.vaughanpl.info/catalogue/search/query?match_1=SHOULD&field_1=s&term_1=nutrition+diet&match_2=NOT&field_2=s&term_2=Fiction&sort=sort_ss_date%3Bdescending,sort_ss_author" rel="external">Nutrition & Diet</a> </div></li>
				<li><div class="name"><a href="http://catalogue.vaughanpl.info/catalogue/search/query?match_1=SHOULD&field_1=s&term_1=fitness+exercise&match_2=NOT&field_2=s&term_2=Fiction&facet_ta=g&sort=sort_ss_date%3Bdescending,sort_ss_author&theme=vaughan" rel="external">Fitness & Exercise</a> </div></li>
				<li><div class="name"><a rel="external" href="http://catalogue.vaughanpl.info/catalogue/search/query?match_1=PHRASE&field_1=s&term_1=Alternative+medicine&match_2=NOT&field_2=s&term_2=Fiction&sort=sort_ss_date%3Bdescending,sort_ss_author">Alternative Medicine</a> </div></li>
				<li><div class="name"><a rel="external" href="http://catalogue.vaughanpl.info/catalogue/search/query?match_1=SHOULD&field_1=text&term_1=%22family+health%22+%22families+health%22+%22children+health%22+%22children+diseases%22&sort=sort_ss_date%3Bdescending,sort_ss_author">Family Health</a></div></li>
				<li><div class="name"><a rel="external" href="http://catalogue.vaughanpl.info/catalogue/search/query?match_1=SHOULD&field_1=s&term_1=%22heart+disease%22+%22heart+diseases%22&sort=sort_ss_date%3Bdescending,sort_ss_author">Heart Disease</a> </div></li>
				<li><div class="name"><a rel="external" href="http://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=s&term_1=cancer&match_2=NOT&field_2=s&term_2=Fiction&match_3=NOT&field_3=s&term_3=Drama&sort=sort_ss_date%3Bdescending,sort_ss_author">Cancer</a></div></li>
				<li><div class="name"><a rel="external" href="http://catalogue.vaughanpl.info/catalogue/search/query?match_1=PHRASE&field_1=s&term_1=Mental+health&match_2=NOT&field_2=s&term_2=Fiction&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text">Mental Health</a> </div></li>
		</ul>

		</div>
	<h3><a href="http://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=s&term_1=health&match_2=MUST&field_2=s&term_2=periodicals&sort=dateBookAdded%3Bdescending" rel="external">Health Periodicals</a></h3>




</div>
<!-----Collection Ends ------>
<!----- Database Starts ----->
	<div id="database" class="tab">
		<div class="entry">

				<?php $databaseCount = 0; ?>
				<?php foreach ($databases as $database): ?>


					<div class="list_with_summary">

						<div class="name">
							<?php echo $this->Html->link($database['Eproducts']['Name'], $database['Eproducts']['URL'], array("rel"=>"external")); ?>
						</div>
						<div class="summary">
							<?php
							if (strlen($database['Eproducts']['Description'])>59) {
								echo substr($database['Eproducts']['Description'],0,strpos($database['Eproducts']['Description']," ",60));
							} else {
								echo $database['Eproducts']['Description'];
							}
							?>&nbsp;...
							<?php echo $this->Html->link("more", "/databases/view/".$database['Eproducts']["Short"]); ?><br /><br />
							<?php echo $this->Html->link($database['Eproducts']['Availability'], $database['Eproducts']['URL'], array("rel"=>"external")); ?>

							<?php if ($database['Eproducts']['Help']) { ?>
							&nbsp;&nbsp;

							<a href="javascript:var newwindow=window.open('<?php echo '/files/dbhelp' . $database['Eproducts']['Help']; ?>','popuppage','width=500,height=600,top=100,left=350, scrollbars=yes'); if (window.focus) {newwindow.focus();}">How to search ...</a>

			<?php }?>
						</div>
					</div>
					<?php $databaseCount ++; ?>
				<?php endforeach; ?>
				<?php if ($databaseCount==0) {; ?>
					No databases were found for Career & Employment right now. Please come back later.
		<?php } ?>

</div>
</div>
<!----- Database Ends ------>

<!----- Link Starts ----->
	<div id="link" class="tab">

		<div class="search_results">
		
		<?php
		foreach ($subjects as $subject) { 
			$cur = $subject['subjectName'];
			$cur = str_replace(' ', '_', $cur);
			?>
				<div class="title"><a href="javascript:toggleMin('<?php echo $cur; ?>')" title="Click to display or hide the list"><?php echo $subject['subjectName']; ?></a></div>
				<div id="<?php echo $cur; ?>" style="display: none">
				<?php foreach ($subject['links'] as $link) { ?>

				

				<div class="name"><?php echo $this->Html->link($link['Link']['TitleOfWebsite'],$link['Link']['UrlOfWebsite'],array("rel"=>"external")); ?></div>
				<div class="description"><?php echo $link['Link']['Description']; ?></div>
				<div class="technical_details">Prepared By: <?php echo $link['Link']['WebsitePublisher']; ?></div>
				<div class="technical_details">Date Reviewed by Vaughan Public Libraries: <?php echo $link['Link']['DateUpdated']; ?></div>
				<div class="url"><?php echo str_replace ( array("&","+","%","/"), array("&<wbr>","+<wbr>","%<wbr>","/<wbr>"), $link['Link']['UrlOfWebsite']); ?></div>
				<br/>
				<?php } ?>
				</div>
		<?php } ?>
	

</div>
</div>

<!-----Link Ends ------>





</div>
</div>
</div>
</div>



<?php

	function getLibraryUrl($libraryId,$criteria) {
		return getEventUrl ($criteria, null, $libraryId, null, null, null);
	}

	function getAgeGroupUrl($ageGroupId,$criteria) {
		return getEventUrl ($criteria, null, null, $ageGroupId, null, null);
	}

	function getCategoryUrl($categoryId,$criteria) {
		return getEventUrl ($criteria, null, null, null, $categoryId, null);
	}

	function getAreaUrl($areaId,$criteria) {
		return getEventUrl ($criteria, null, null, null, null, $areaId);
	}

	function getDateUrl($date,$criteria) {
		return getEventUrl ($criteria, $date, null, null, null, null);
	}


	function getEventUrl ($criteria, $date=null, $libraryId=null, $ageGroupId=null, $categoryId=null, $areaId=null) {

		if (isset($libraryId)) $criteria["library"]["id"] = $libraryId;
		if (isset($ageGroupId)) $criteria["ageGroup"]["id"] = $ageGroupId;
		if (isset($categoryId)) $criteria["category"]["id"] = $categoryId;
		if (isset($areaId)) $criteria["area"]["id"] = $areaId;
		if (isset($date)) $criteria["date"] = $date;

		$url = "/programs/index";

		if (isset($criteria["library"]["id"])) $url .= "/library/" . $criteria["library"]["id"];
		if (isset($criteria["ageGroup"]["id"])) $url .= "/age_group/" . $criteria["ageGroup"]["id"];
		if (isset($criteria["category"]["id"])) $url .= "/category/" . $criteria["category"]["id"];
		if (isset($criteria["area"]["id"])) $url .= "/collection/" . $criteria["area"]["id"];
		if (isset($criteria["date"])) $url .= "/" . $criteria["date"];

		return $url;
	}




	function getScheduleType($program) {

		if ((!isset($program['Event']['date']) || substr($program['Event']['date'],8,2) == "00") || ($program['Event']['date'] != $program['Event']['end_date'])) {
			return "period";
		} elseif (isset($program['Event']['date']) && (substr($program['Event']['date'],8,2) != "00") && ($program['Event']['date'] == $program['Event']['end_date'])) {
			return "date";
		} else {
			return "other";
		}
	}

function get_lan_shortName($lan) {
		$shortName="";
	 	switch($lan){
	 	 case "Chinese":
	 	 	$shortName = "chi";
	 	 	break;
	 	 case "Farsi":
		  	$shortName = "per";
	 	 	break;
		case "Gujarati":
			$shortName = "guj";
			break;
		case "Hebrew":
			$shortName = "heb";
			break;
		case "Hindi":
			$shortName = "hin";
			break;
		case "Italian":
			$shortName = "ita";
			break;
		case "Korean":
			$shortName = "kor";
			break;
		case "Malayalam":
			$shortName = "mal";
			break;
		case "Portuguese":
			$shortName = "por";
			break;
		case "Punjabi":
			$shortName = "pan";
			break;
		case "Russian":
			$shortName = "rus";
			break;
		case "Spanish":
			$shortName = "spa";
			break;
		 case "Tamil":
	 		$shortName = "tam";
	 		break;
	 	case "Urdu":
	 		$shortName = "urd";
	 		break;
	 	case "French":
			$shortName = "fre";
			break;
		case "Vietnamese":
			$shortName = "vie";
			break;
	 	}

	 	return $shortName;
 }
 	function get_location($loc) {
 		$shortName=0;
 	 	switch($loc){
 	 	 case "Bathurst Clark Resource Library":
 	 	 	$shortName = 20000;
 	 	 	break;
 	 	 case "Dufferin Clark Library":
 		  	$shortName = 30000;
 	 	 	break;
 		case "Ansley Grove Library":
 			$shortName = 40000;
 			break;
 		case "Kleinburg Library":
 			$shortName = 50000;
 			break;
 		case "Maple Library":
 			$shortName = 60000;
 			break;
 		case "Woodbridge Library":
 			$shortName = 70000;
 			break;
 		case "Pierre Berton Resource Library":
 			$shortName = 80000;
 			break;

 	 	}

 	 	return $shortName;
 }

 function get_format($format) {
  		$shortName="";
  	 	switch($format){
  	 	 case 'Book':
  	 	 	$shortName = "book";
  	 	 	break;
  	 	 case 'DVD':
  		  	$shortName = "movies.dvd";
  	 	 	break;
  		case 'CD':
  			$shortName = "sound_recording.cd";
  			break;
  		case 'Mag':
  			$shortName = "serial";
  			break;
  	 	}

  	 	return $shortName;
 }





?>