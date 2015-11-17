<?php
use yii\widgets\LinkPager;
?>
<div>
<table>
<th>ID</th>
<th>标题</th>
<th>添加时间</th>
<th>作者</th>
<th>点击量</th>
<th>操作</th>
<?php foreach($article as $k=>$v){ ?>
	<tr>
		<td><?php echo $v['id']?></td>
		<td><?php echo $v['title']?></td>
		<td><?php echo $v['addtime']?></td>
		<td><?php echo $v['author']?></td>
		<td><?php echo $v['number']?></td>
		<td><a href="index.php?r=article/del&id=<?php echo $v['id']?>">删除</a>&nbsp;<a href="index.php?r=article/upd&id=<?php echo $v['id']?>">修改</a></td>
	</tr>
<?php }?>
</table>
    <div >
      <?= LinkPager::widget(['pagination' => $pages]) ?>
</div> 
</div>


