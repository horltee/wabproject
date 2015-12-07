<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		
		
		
		<link href="themes/8/js-image-slider.css" rel="stylesheet" type="text/css" />
		<script src="themes/8/js-image-slider.js" type="text/javascript"></script>
		<link href="themes/8/tooltip.css" rel="stylesheet" type="text/css" />
		
    <title>Stock</title></title>
</head>
<body>
    
    	<div class="navbar-static-top navbar-inverse" id="home">
		<div class="container">
			<div class="navbar-brand">
				The Stock
			</div>
		
			
		</div>
	</div>
    
    
    <div class="jumbotron">
   
    
    
    
	
	
	<div id="sliderFrame">
        <div id="slider">
            <a href="http://www.menucool.com/javascript-image-slider" target="_blank">
                <img src="job1.jpg" alt="#cap1" />
            </a>
            <img src="job2.jpg" alt="#cap2" />
            <img src="job1.jpg" alt="#cap3" />
            <img src="job2.jpg" alt="#cap4" />
            <img src="job1.jpg" alt="#cap5" />
        </div>
        <div style="display: none;">
            <div id="cap1">
                Add Stock.
            </div>
            <div id="cap2">
                 Add Stock.
            </div>
		
   
		
	</div>
    	</div>
   
	
	 	<?php
	require 'simplexml.class.php';
	if(isset($_GET['action'])) {
		$products = simplexml_load_file('xml/product.xml');
		$id = $_GET['id'];
		$index = 0;
		$i = 0;
	foreach($products->product as $product){
		if($product['id']==$id){
			$index = $i;
			break;
		}
		$i++;
	}	
	unset($products->product[$index]);
	file_put_contents('xml/product.xml', $products->asXML());
	}
	$products = simplexml_load_file('xml/product.xml');
	echo 'Number of products: '.count($products);
	echo '<br>List Product Information';
	?>
	<br>
		<a href="add.php">Add new product</a>
	<br>
	<table cellpadding="2" cellspacing="2" border="1">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Price</th>
			<th>Option</th>
		</tr>
			<?php foreach($products->product as $product) { ?>
		<tr>
		<td><?php echo $product['id']; ?></td>
		<td><?php echo $product->name; ?></td>
		<td><?php echo $product->price; ?></td>
		<td><a href="edit.php?id=<?php echo $product['id']; ?>">Edit</a> | 
			<a href="index.php?action=delete&id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
	</tr>
	<?php } ?>
</table>
	 	
	 			
    
    
    <div class="alt2">
		<div class="container">
			<footer>
				&copy; Olajire Tobi x13111434 and Habeeb Alabi x14117185 <br />
				<a href="#home">Back to top</a>
			</footer>
		</div>
	</div>
	
	
	
<!-- Placed at the end of the document so the pages load faster -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script>
	$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top 
        }, 1000);
        return false;      
      }  
    }
  }); 
});
	</script>
	
	

	</div>
</body>
</html>