<?php
/* @var $this ProveedorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Proveedores',
);

$this->menu=array(
	array('label'=>Yii::t('app','Create'). ' Proveedores', 'url'=>array('create')),
	array('label'=>Yii::t('app','Manage'). ' Proveedores', 'url'=>array('admin')),
);
?>

<h1>Proveedores</h1>

<div class="form">
    <?php echo CHtml::beginForm('', 'get', array('id'=>'searchform')); ?>
    
    <div class="row">
        <?php echo CHtml::activeLabel($dataProvider,'nombresProveedor'); ?>
        <?php echo CHtml::activeTextField($dataProvider,'nombresProveedor') ?>
        <?php //echo CHtml::submitButton(Yii::t('app','Search')); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($dataProvider,'descripcion'); ?>
        <?php echo CHtml::activeTextField($dataProvider,'descripcion') ?>
        <?php //echo CHtml::submitButton(Yii::t('app','Search')); ?>
    </div>

    <?php echo CHtml::endForm(); ?>

</div><!-- form -->

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider->search(),
    'itemView'=>'_view',
        'enableHistory' => TRUE,
        'pagerCssClass' => "pagination",
        'id' => 'ajaxListView',
)); ?>

<?php
Yii::app()->clientScript->registerScript('search',
"$('#searchform').change(function(event) {
            SearchFunc();
            return false;
});
jQuery('input').keydown(function (event) {
    if (event.keyCode && event.keyCode == '13') {
        SearchFunc();
        return false;
    } else {
        return true;
    }
});
function SearchFunc()   {
    var data = $('input').serialize();
    var url = document.URL;
    var params = $.param(data);
    url = url.substr(0, url.indexOf('?'));
    window.History.pushState(null, document.title,$.param.querystring(url, data));
}
");
?>
