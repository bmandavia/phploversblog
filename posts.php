<?php include 'includes/header.php'; ?>
<?php

    //Create DB object
	$db = new Database();
   //
   if(isset($_GET['category'])){
	   $category = $_GET['category'];
	   //Create Query
		$query = "SELECT * FROM posts where category = ".$category." ORDER BY id DESC";
		//Run Query
		$posts = $db->select($query);
   } else {
	   //Create Query
		$query = "SELECT * FROM posts ORDER BY id DESC";
		//Run Query
		$posts = $db->select($query);
    }

	//Create Query
	$query = "SELECT * FROM categories";
	
	//Run Query
	$categories = $db->select($query);
	

?>
<?php if($posts) : ?>
<?php while($row = $posts->fetch_assoc()) : ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?>&nbsp&nbsp<a href="#"><?php  echo $row['author']; ?></a></p>
				<?php echo shortenText($row['body']); ?>
			<a class="readmore" style="display:black; text-align:center; padding:5px; background:#f4f4f4; margin-top:10px; color:#666;" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More</a>
          </div><!-- /.blog-post -->
		 <?php endwhile; ?>
<?php else : ?>
	<p>There are no posts yet</p>
<?php endif; ?>		  
 <?php include 'includes/footer.php'; ?>       