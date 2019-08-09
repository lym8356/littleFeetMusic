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
<body>
	<div class= "container" style= "max-width: 80%;"">
		<div class= "img_container" style= "float: right;">
			<img class = "property_img" src="<?php echo $imgUrl; ?>" width= "100%" height= "100%" style= "margin-left: 150px">
		</div>
		
		<ul style= "font-family: Georgia; font-size: 30px; list-style: none; margin: auto;">
			
			<li id="detail_list_address" style= "font-size: 40px; padding-bottom: 40px"><?php echo $address; ?></li>
			<li id="detail_desc" style= "font-size: 17px">From the outside this house looks posh and extravagant. It has been built with red bricks and has white brick decorations. Tall, large windows add to the overall look of the house and have been added to the house in a mostly symmetric way.
			<br></br>
			<br>The house is equipped with a small kitchen and one large bathroom, it also has a comfortable living room, four bedrooms, a roomy dining area, a game room and a spacious storage room.</br>
			<br>The building is shaped like a short U. The two extensions are linked by a garden path.The second floor is the same size as the first, but part of it hangs over the edge of the floor below, creating an overhang on one side and a balcony on the other. This floor follows the same style as the floor below.</br>
			<br>The roof is low and pyramid shaped and is covered with overlapping roof tiles. One large chimney pokes out the center of the roof. Large, skylight windows let in plenty of light to the rooms below the roof.The house itself is surrounded by grass, a huge tree in the center and bushes on the borders of the plot.</br></li>
			<div class= "detail_middle" style= "padding-top: 100px; padding-left: 10px">
				<li id="detail_list_price"><b><?php echo $this->Number->currency($listPrice, '', ['places' => 0]) ?></b></li>
				<li id="num_of_bed"><i class="fa fa-bed"><?php echo $numBed; ?>
				<i class="fa fa-bath"><?php echo $numBath; ?></i></i></li>
			</div>
		</ul>
		<div class= "go_back_button_container" style= "padding-top: 100px">
		 <h4><?= $this->Html->link('Go Back to Overview', ['controller' => 'properties', 'action' => 'index']) ?></h4>
		</div>
	</div>
</body>