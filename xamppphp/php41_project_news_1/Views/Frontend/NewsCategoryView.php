<?php 
    $this->fileLayout = "Views/Frontend/Layout.php";
 ?>
 <div class="marked-title">
        <h3>Category</h3>
    </div>
    <div class="row">
    	<?php foreach($data as $rows): ?>
        <!-- list news -->
        <article>
			<div class="cat-post-desc">
				<h3><a href="news/detail/<?php echo $first_news->id; ?>/<?php echo $this->removeUnicode($first_news->name); ?>"><?php echo $rows->name; ?></a></h3>
				<p><a href="news/detail/<?php echo $first_news->id; ?>/<?php echo $this->removeUnicode($first_news->name); ?>"><img class="img_category" src="Assets/upload/news/<?php echo $rows->img; ?>" style="width:200px;" alt=""></a><?php echo $rows->description; ?></p>
			</div>
			<div class="clear"></div>
			<div class="line_category"></div>
		</article>                       
        <!-- end list news -->
        <?php endforeach; ?>                                                       
                                
    </div>
    <div class="clear"></div>
    <div class="post-navi">
        <ul>
            <li><a href="#">&lt;</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">42</a></li>
            <li><a href="#">43</a></li>
            <li><a href="#">&gt;</a></li>
        </ul>
    </div>