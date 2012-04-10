<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<table class="mainTable padTable" border="0" cellspacing="0" cellpadding="0">
	<caption><?=lang('create_new_options_caption')?></caption>
		<thead>
			<tr>
				<th>
					<strong><?=lang('create_new_options_header1')?></strong>
				</th>
				<th>
					<strong><?=lang('create_new_options_header2')?></strong>
				</th>
				<th>
					<strong><?=lang('create_new_options_header3')?></strong>
				</th>
				<th>
					<strong><?=lang('create_new_options_header4')?></strong>
				</th>
			</tr>
		</thead>
	<tbody>
	<?=form_open('C=addons_modules'.AMP.'M=show_module_cp'.AMP.'module=fanceebox'.AMP.'method=create_new', 'id="fanceebox"')?>
		<input type="hidden" value="yes" name="allow_create" />
		<input type="hidden" value="0" id="is_cp" name="is_cp" />
		<?php

			foreach($options as $key => $value)
			{
				if($value == 'bool')
				{
						echo 	'
										<tr class="">
											<td style="width:10%;">
												<label>'.$key.'</label>
											</td>
											<td style="width:50%;">
												<div class="subtext">'.lang($key.'_desc').'</div>
											</td>
											<td style="width:5%;">
												<div>'.lang($key.'_default').'</div>
											</td>
											<td style="width:30%;">
												<input class="radio" type="radio" name="'.$key.'" value="1" /> 
												'.lang('true').'
												<input class="radio" type="radio" name="'.$key.'" value="0" /> 
												'.lang('false').'
											</td>
										</tr>
									';
				}
				elseif(is_array($value))
				{
				// We currently only have one array so this isn't prepared to handle more without manually adding in what's needed.
				// Consider it on the todo list though, I doubt Fancybox will be changing these options.
					echo	'
									<tr class="">
										<td style="width:10%;">
												<label>'.$key.'</label>
										</td>
										<td style="width:50%;">
												<div class="subtext">'.lang($key.'_desc').'</div>
										</td>
										<td style="width:5%;">
											<div>'.lang($key.'_default').'</div>
										</td>
										<td style="width:30%;">						
											<select>
												<option selected value="">Select...</option>
												<option value="yes">'.lang($key.'_desc_yes').'</option>
												<option value="no">'.lang($key.'_desc_no').'</option>
												<option value="auto">'.lang($key.'_desc_auto').'</option>
											</select>
										</td>
									</tr>
								';
				}
				else // else $value is a string or int
				{
					echo	'
									<tr class="">
										<td style="width:10%;">
											<label>'.$key.'</label>
										</td>
										<td style="width:50%;">
												<div class="subtext">'.lang($key.'_desc').'</div>
										</td>
										<td style="width:5%;">
												<div>'.lang($key.'_default').'</div>
										</td>
										<td style="width:30%;">
											<input dir="ltr" type="text" name="'.$key.'" id="'.$key.'" value="" size="90" maxlength="100" />
										</td>
									</tr>
								';
				}
			}
		?>
	</tbody>
	</table>
	<br />
	<div class="tableFooter stopper">
		<div class="tableSubmit">
			<?=form_submit(array('name' => 'submit', 'value' => lang('submit'), 'class' => 'submit'))?>
		</div>
	</div>	
<?=form_close()?>	

