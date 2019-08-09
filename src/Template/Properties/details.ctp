<?php 
	echo $this->Html->css("https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css");
	echo $this->Html->css("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
	$this->assign('title', 'Property Details');
?>

<?php
foreach($cPY as $c){
	$pID = $c -> id;
	$numBed = $c -> num_bedrooms;
	$numBath = $c -> num_bathrooms;
	$address = $c -> address;
	$soldPrice = $c -> sold_price;
	$listPrice = $c -> list_price;
	$imgUrl = $c -> image_url;
	$imgAttribution = $c -> img_attribution;
}
?>

<!-- Display section -->
<div class="container" style= "">
		<img class = "property_img" src="<?php echo $imgUrl; ?>" 
		width= "70%" height= "100%" style= "float: right; margin-top: 50px">
		
		<ul style= "font-family: Georgia; font-size: 30px; list-style: none; margin: auto;">
			
			<li id="detail_list_address" style= "font-size: 50px;"><?php echo $address; ?></li>
			<div class= "detail_middle" style= "padding-top: 300px; padding-left: 10px">
				<li id="detail_list_price"><b><?php echo $this->Number->currency($listPrice, '', ['places' => 0]) ?></b></li>
				<li id="num_of_bed"><i class="fa fa-bed"><?php echo $numBed; ?>
				<i class="fa fa-bath"><?php echo $numBath; ?></i></i></li>
			</div>
		
		
		</ul>
		<div class= "go_back_button_container" style= "padding-top: 100px">
		 <h4><?= $this->Html->link('Go Back to Overview', ['controller' => 'properties', 'action' => 'index']) ?></h4>
		</div>
		
</div>