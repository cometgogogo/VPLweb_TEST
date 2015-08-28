<?php 
$html->addCrumb("Home" , "/");
$html->addCrumb("Using the Library" , "/services");
$html->addCrumb("Maker Kits" , "/services/maker_kit");
?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"3D Printing Terms of Use","url"=>"/files/services/3DPrintingTermsofUse.pdf","target"=>"_blank"),array("Title"=>"Library Services","url"=>"/library_services"),array("Title"=>"Libraries and Hours","url"=>"/libraries"),array("Title"=>"Borrowing Materials","url"=>"/services/borrowing"),array("Title"=>"Downloads & Digital","url"=>"/materials/downloads_digital")))));
	
	$relatedContentElements[] = array ('image', array("image"=>array("source"=>"/img/makerkit_sidebar.jpg","width"=>"200", "height"=>"257", "title"=>"Maker Kits", "link"=>"/services/maker_kit", "target"=>"self")));
	
	$this->controller->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header" width="100%">
	<div class="opening"></div>
	<div class="details">
		<h1>Reserve a Maker Kit</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		Your inquiry could not be send due to problems with the Email system. Please try again at a later time. We apologize for the inconvenience.
	</div>
	<div class="closing"></div>
</div>