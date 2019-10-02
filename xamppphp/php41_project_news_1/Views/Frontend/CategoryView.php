<div class="widget">
    <div class="marked-title">
        <h3>Danh mục tin tức</h3>
    </div>
    <ul class="tags">
        <?php foreach($data as $rows): ?>
        <li><a class="photo" href="news/category/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name); ?>"><?php echo $rows->name; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <div class="clear"></div>
</div>