<?php 
	//load file layout vao day
	$this->fileLayout = "Views/Frontend/Layout.php";
 ?>
 <?php 
 	//lay danh sach danh muc
 	$category = $this->fetchAllCategory();
 	foreach($category as $rows_category):
  ?>
 <!-- list category tin tuc -->
                    <div class="row-fluid">
                        <div class="marked-title">
                            <h3><a href="index.php?controller=NewsCategory&id=<?php echo $rows_category->id; ?>" style="color:white"><?php echo $rows_category->name; ?></a></h3>
                        </div>
                    </div>                    
                    <div class="row-fluid">
                        <div class="span2">
                        <?php 
                        	//lay tin dau tien thuoc danh muc nay
                        	$first_news = $this->fetchFirstNews($rows_category->id);
                         ?>
<!-- first news -->
<article>
    <div class="post-thumb">
        <a href="news/detail/<?php echo $first_news->id; ?>/<?php echo $this->removeUnicode($first_news->name); ?>">"><img src="Assets/upload/news/<?php echo $first_news->img; ?>" alt=""></a>
    </div>
    <div class="cat-post-desc">
        <h3><a href="news/detail/<?php echo $first_news->id; ?>/<?php echo $this->removeUnicode($first_news->name); ?>"><?php echo $first_news->name; ?></a></h3>
        <p><?php echo $first_news->description; ?></p>
    </div>
</article>
<!-- end first news -->
                        </div>
                        <div class="span2">
<?php 
	//lay 3 tin ke tiep
	$news = $this->fetchAllOtherNews($rows_category->id);
	foreach($news as $rows):
 ?>                        	
   <!-- list news -->
    <article class="twoboxes">
        <div class="right-desc">
            <h3><a href="news/detail/<?php echo $first_news->id; ?>/<?php echo $this->removeUnicode($first_news->name); ?>"><img src="Assets/upload/news/<?php echo $rows->img; ?>" alt=""></a><a href="news/detail/<?php echo $first_news->id; ?>/<?php echo $this->removeUnicode($first_news->name); ?>"><?php echo $rows->name; ?></a></h3>  
            <div class="clear"></div>    
        </div>
        <div class="clear"></div>
    </article>
    <!-- end list news -->
    <?php endforeach; ?>                         
                        </div>
                    </div>
                    <div class="clear"></div>
                    <!-- end list category tin tuc -->
     <?php endforeach; ?>               
                    