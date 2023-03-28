<?php
use silvercodes\phpmvc\form\TextareaField;
/** @var $this \silvercodes\phpmvc\View */
/** @var $model \app\models\ContactForm */

$this->title = 'Contact';

?>

<h1>Contact us</h1>

<?php $form = \silvercodes\phpmvc\form\Form::begin('', 'post') ?>
<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new TextareaField($model, 'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php $form = \silvercodes\phpmvc\form\Form::end(); ?>
