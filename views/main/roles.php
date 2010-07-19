<?php
$this->breadcrumbs=array(
	Yii::t('rights', 'Rights')=>array('/rights/main'),
	Yii::t('rights', 'Roles'),
);
?>

<div class="rights">

	<?php $this->renderPartial('_menu'); ?>

	<div id="rightsRoles">

		<h2><?php echo Yii::t('rights', 'Roles'); ?></h2>

		<?php if( count($authItems)>0 ): ?>

			<table class="rightsTable operationTable" border="0" cellpadding="0" cellspacing="0">

				<tr>

					<th class="nameColumnHeading"><?php echo Yii::t('rights', 'Name'); ?></th>
					<th class="descriptionColumnHeading"><?php echo Yii::t('rights', 'Description'); ?></th>

					<?php if( $isBizRuleEnabled===true ): ?>

						<th class="bizRuleColumnHeading"><?php echo Yii::t('rights', 'Business rule'); ?></th>

						<?php if( $isBizRuleDataEnabled===true ): ?>

							<th class="dataColumnHeading"><?php echo Yii::t('rights', 'Data'); ?></th>

						<?php endif; ?>

					<?php endif; ?>

					<th class="deleteColumnHeading" style="width:60px;">&nbsp;</th>

				</tr>

				<?php foreach( $authItems as $name=>$item ): ?>

					<tr class="<?php echo ($i++ % 2)===0 ? 'odd' : 'even'; ?>">

						<td>
							<?php echo CHtml::link($name, array('authItem/update', 'name'=>$name, 'redirect'=>urlencode('main/roles'))); ?>

							<?php if( $childCount[ $name ]>0 ): ?>

								[ <b><?php echo $childCount[ $name ]; ?></b> ]

							<?php endif; ?>
						</td>

						<td><?php echo CHtml::encode($item->description); ?></td>

						<?php if( $isBizRuleEnabled===true ): ?>

							<td class="bizRuleColumn"><?php echo CHtml::encode($item->bizRule); ?></td>

							<?php if( $isBizRuleDataEnabled===true ): ?>

								<td class="bizRuleDataColumn"><?php echo $item->data!==NULL ? CHtml::encode( @serialize($item->data) ) : ''; ?></td>

							<?php endif; ?>

						<?php endif; ?>

						<td class="deleteColumn">
							<?php
							echo CHtml::linkButton(Yii::t('rights', 'Delete'), array(
								'submit'=>array('authItem/delete', 'name'=>$name, 'redirect'=>urlencode('main/roles')),
								'confirm'=>Yii::t('rights', 'Are you sure to delete this item?')));
							?>
						</td>

					</tr>

				<?php endforeach; ?>

			</table>

			<p class="rightsInfo"><?php echo Yii::t('rights', 'Values within square brackets tell how many children each item has.'); ?></p>

		<?php else: ?>

			<p><?php echo Yii::t('rights', 'No roles found.'); ?></p>

		<?php endif; ?>

	</div>

</div>