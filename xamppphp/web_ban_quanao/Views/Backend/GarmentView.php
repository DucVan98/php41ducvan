<!-- load file layout vao day -->
<?php 
    $this->fileLayout = "Views/Backend/Layout1.php";
 ?>
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?area=backend&controller=garment&action=add" class="btn btn-primary">Add garment</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">List garment</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="width:100px;">Image</th>
                    <th>Title</th>
                    <th style="width: 150px;">Category</th>
                    <th style="width: 100px;">Price</th>
                    <th style="width: 100px;">color</th>
                    <th style="width: 100px;">size</th>
                    <th style="width: 100px;">material</th>
                    <th style="width: 100px;">Hot product</th>

                    <th style="width:100px;"></th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td>
<?php if($rows->img != "" && file_exists("Assets/upload/news/".$rows->img)): ?>
    <img src="Assets/upload/news/<?php echo $rows->img; ?>" style="width: 100px;">
<?php endif; ?>
                    </td>
                    <td><?php echo $rows->name; ?></td>
                    <td>
<?php 
    //tu day co the goi thang ham trong model, ham getCategory nam trong model
    $category = $this->getCategory($rows->category_id);
    echo isset($category->name)?$category->name:"";
 ?>
                    </td>
                    <td style="text-align: center;">
                        <?php echo number_format($rows->price); ?>
                    </td>
                    <td><?php echo $rows->color; ?></td>
                        <td><?php echo $rows->size; ?></td>
                        <td><?php echo $rows->material; ?></td>
                    <td style="text-align: center;">
                    <?php if($rows->hotproduct == 1): ?>
                        <span class="glyphicon glyphicon-check"></span>
                    <?php endif; ?>
                    </td>
                    <td style="text-align:center;">
                        <a href="index.php?area=backend&controller=Garment&action=edit&id=<?php echo $rows->id; ?>">Edit</a>&nbsp;
                        <a href="index.php?area=backend&controller=Garment&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                <li class="page-item disabled">
                    <a href="#" class="page-link">Trang</a>
                </li>
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li class="page-item">
                    <a href="index.php?area=backend&controller=garment&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>                    
                </li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>