<link rel="stylesheet" type="text/css" href="../../../../assets/admin/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../../../../assets/admin/bootstrap/css/bootstrap-theme.min.css"/>
<div class="container text-right">
	<div class="row">
    	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">لیست کاربران</h3>
        </div>
        <div class="panel-body">
                <ul class="list-group"> 
                <?php foreach($user as $row):?>
                  <li class="list-group-item" style="height:120px;">
                  	<ul class="list-inline list-unstyled pull-right">
                    	<?php if($row->UserAvatar){
						?>
						<li><img width="100" src="<?php echo site_url('upload/avatar/'.$row->UserAvatar)?>" class="img-thumbnail" /></li>
						<?php
							} else { 
							?>
                            <li><img width="100" src="<?php echo site_url('assets/admin/img/avatar.jpg')?>" class="img-thumbnail" /></li>
                            <?php } ?>
                    </ul>
                    
                    <ul class="list-unstyled" style="margin-top:20px;">
                        <li> <?php echo $row->name?> : <span style="margin-right:5px;" class="glyphicon glyphicon-user"></span></li>
                        <li> <?php echo $row->UserEmail?> : <span style="margin-right:5px;" class="glyphicon glyphicon-envelope"></span></li>
                        <li> <?php echo $row->UserMobile?> : <span style="margin-right:5px;" class="glyphicon glyphicon-phone"></span></li>
                    </ul>
    			   <span class="pull-left" style="margin-right:30px;"><?php echo btn_delete('admin-user-delete/'.$row->id)?></span>
                   <span class="pull-left" style="margin-right:30px;"><?php echo btn_edit('admin-user-edit/'.$row->id)?></span>
                   <span class="pull-left" style="margin-right:30px;"><?php echo btn_email('admin-user-send-email/'.$row->id)?></span>
                  </li>
                <?php endforeach?>
                </ul>

        </div>
    	<div class="panel-footer text-left">
        </div>
    </div> 
</div>
</div>