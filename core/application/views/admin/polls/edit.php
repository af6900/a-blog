<script src="<?php assets('ajax/polls.js');?>" language="javascript" type="text/javascript"></script>
<div class="container dir-rtl">
	<div class="row">
		
        <div class="panel panel-default">
        	<div class="panel-heading">
            	<h3 class="panel-title">ویرایش</h3>
            </div>
			<?php echo form_open('admin-poll-update');?>
            <div class="panel-body">
			<div class="col-md-6 pull-right">
             <?php foreach($polls as $row):?>
                <input type="hidden" value="<?php echo $row->id_polls;?>" name="polls_id"/>
                  <div class="form-group">
                    <label for="pollTitle">عنوان نظر سنجی</label>
                    <input type="text" value="<?php echo $row->polls_title; ?>" class="form-control" id="pollTitle" name="polls_title" placeholder="نظر سنجی">
                  </div>
                
                <?php $answer = $this->model_polls->get_answer($row->id_polls);?>
					<?php foreach($answer as $rows):?>
                        <div class="form-group">
                        	<input class="form-control" type="text" value="<?php echo $rows->answer_title;?>" name="<?php echo $rows->id_answer;?>" />
                        </div>
                    <?php endforeach ?>

             <?php endforeach ?>
              </div>        
            </div>
            <div class="panel-footer text-left">
            	<button type="submit" class="btn btn-primary">ذخیره</button>
            </div>
              <?php echo form_close();?> 
        </div>
        



	</div>
</div>