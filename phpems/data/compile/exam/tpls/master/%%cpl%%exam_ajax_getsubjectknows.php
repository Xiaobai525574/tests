						<table class="table table-hover table-bordered" style="width:86%;margin:auto;">
							<?php if($this->tpl_var['sections']){ ?>
							<?php $sid = 0;
 foreach($this->tpl_var['sections'] as $key => $section){ 
 $sid++; ?>
							<tr class="info">
								<td colspan="3"><?php echo $section['section']; ?></td>
							</tr>
							<tr>
								<?php $kid = 0;
 foreach($this->tpl_var['knows'][$section['sectionid']] as $key => $know){ 
 $kid++; ?>
								<td><input type="checkbox" value="<?php echo $know['knowsid']; ?>"/> <?php echo $know['knows']; ?></td>
								<?php if($kid % 3 == 0){ ?>
								</tr><tr>
								<?php } ?>
								<?php } ?>
							</tr>
							<?php } ?>
							<?php } else { ?>
							<tr class="info">
								<td colspan="3">请先选择科目</td>
							</tr>
							<?php } ?>
						</table>