<link rel="stylesheet" type="text/css" href="../../../../../assets/admin/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../../../../../assets/admin/bootstrap/css/bootstrap-theme.min.css"/>
<script src="<?php assets('ajax/communique.js')?>" language="javascript" type="text/javascript"></script>
<script src="<?php assets('ajax/status.js')?>" language="javascript" type="text/javascript"></script>

<div class="container text-right well-sm" style="background-color:#FFF">
	<div class="row">
    <?php $this->load->view('admin/panel/topPanel');?>

 
  <div class="col-xs-12 col-sm-6 col-md-4">
  
      	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-primary">
              <div class="panel-body">
                 <?php if($UserName['avatar'] != ''):?>
                    <img width="100" src="<?php echo site_url('upload/avatar/'.$UserName['avatar']);?>" class="img-thumbnail pull-left">
                 <?php else: ?>
                   <img src="<?php echo site_url('assets/admin/img/avatar.jpg')?>" width="100" class="img-thumbnail pull-left">
                  <?php endif ?>
                     <ul class="list-unstyled">
                     	<li><span><?php echo $UserName['name']?></span> : <i class="glyphicon glyphicon-user"></i></li>
                        <li><span><?php echo $_SERVER['REMOTE_ADDR']?></span> : <i class="glyphicon glyphicon-globe"></i></li>
                        <li><span><?php echo adate()?></span>  : <i class="glyphicon glyphicon-calendar" ></i></li>
                        <li><?php echo anchor('admin_logout',"خروج ","title='خروج'")?> : <span class='glyphicon glyphicon-log-out'></span></li>
                     </ul>
              </div>
            </div>
        </div>
       
     	<div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">بخش ها</h3>
              </div>
              <div class="panel-body">
                <ul class="list-group">
                <?php foreach($sectionvisit as $row):?>
                  <li class="list-group-item">
                    <span class="badge pull-left"><?php echo $row->visit?></span>
                    <?php echo $row->title?>
                  </li>
                <?php endforeach ?>
                </ul>
              </div>
            </div>
        </div>
     
        <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">آمار بازدید</h3>
              </div>
              <div class="panel-body">
                <ul class="list-group">
                  <li class="list-group-item">
                    <span class="badge pull-left"><?php echo $this->lib_database->count_all('useronline')?></span>
                    کاربر
                  </li>
                  <li class="list-group-item">
                    <span class="badge pull-left"><?php echo $this->lib_database->get_filde('visit',NULL,'dey')?></span>
                    امروز
                  </li>
                  <li class="list-group-item">
                    <span class="badge pull-left"><?php echo $this->lib_database->get_filde('visit',NULL,'week')?></span>
                    دیروز
                  </li>
                  <li class="list-group-item">
                    <span class="badge pull-left"><?php echo $this->lib_database->get_filde('visit',NULL,'total')?></span>
                    کل
                  </li>
                </ul>
              </div>
            </div>
        </div>
  
  </div>
  
  <div class="col-xs-12 col-sm-6 col-md-8">
  <div class="col-md-12">
    <div class="tab-content" style="margin-bottom:10px; border:1px solid #CCC; padding:10px 10px 0 10px; border-radius:5px; background-color:#EEF">
    <ul class="nav nav-pills navbar-right" id="myTab" style="border:none !important">
    
      <li><a href="#notes">دفتر یاداشت</a></li>
      <li><a href="#communique">اطلاعیه</a></li>
      <li class="active" ><a href="#status">سخن روز</a></li>
    </ul>
    <div class="clearfix"></div>
      <div class="tab-pane" id="notes">
      <div class="form-group">
      <script src="<?php assets('ajax/notes.js')?>" language="javascript" type="text/javascript"></script>
      	<textarea class="form-control notes text-right" id="adminNotes"></textarea>
      </div>
      </div>
      <div class="tab-pane well-sm" id="communique"><div class="col-md-12">
                  <div class="form-group">
      				<button type="submit" id="communiqueSubmit" class="btn btn-info btn" >ثبت</button>
                       <div class="col-lg-10 pull-right">
                        <input type="text"  class="form-control text-right" id="inputCommunique" placeholder="اطلاعیه">
                        </div>
                  </div>
                  
                 <div class="col-lg-6">
                       <div class="form-group text-right">
                        <div class="input-group">
                          <input type="text" class="form-control text-right datepicker" id="endPublic" placeholder="پایان انتشار">
                          <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                        </div>
                        </div>
                 </div> 
                 
                 <div class="col-lg-6">
				    <div class="form-group text-right">
                        <div class="input-group">
                          <input type="text" class="form-control text-right datepicker" id="startPublic" placeholder="شروع انتشار">
                          <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                        </div>
                    </div>
                 </div>
                               
                <div class="clearfix"></div>
                 <ul class="list-group" id="ulCommunique" style="margin-top:5px;">
					<li class="list-group-item"><img src="<?php echo site_url('assets/admin/img/loader.gif')?>" width="16" height="16" /></li>
                </ul>

        </div></div>
      <div class="tab-pane well-sm active" id="status"><div class="col-md-12">
               <div class="form-group">
      				<button type="submit" id="statusSubmit" class="btn btn-info btn" >ثبت</button>
                       <div class="col-md-10 pull-right">
                        <input type="text"  class="form-control text-right" id="statusInput" placeholder="سخن روز">
                        </div>
                  </div>
               
               <div class="col-md-6 text-right">
                  <div class="input-group">
                          <input type="text" class="form-control text-right datepicker" id="endStatus" placeholder="پایان انتشار" disabled >
                          <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                        </div>
               </div>
               <div class="col-md-6 text-right">
				   <div class="form-group text-right">
                        <div class="input-group">
                          <input type="text" class="form-control text-right datepicker" id="startStatus" placeholder="شروع انتشار" disabled >
                          <span class="input-group-addon glyphicon glyphicon-calendar "></span>
                        </div>
               </div>
               </div>
               
			   <div class="clearfix"></div>
               <ul class="list-group" id="ulStatus" style="margin-top:5px;">
					<li class="list-group-item"><img src="<?php echo site_url('assets/admin/img/loader.gif')?>" width="16" height="16" /></li>
                </ul>
              <div style="" class="divPagination text-center">
                <ul class="pagination pagination-sm">
                <?php 
					$perPage = 10;
					$c = ceil($countStatus /$perPage);
				for($i=0; $i <= $c -1; $i++):?>
                  <li><a href="javascript:void(null)" class="aCPage" data-ajax="true" page ='<?php echo $i * $perPage?>'><?php echo $i+1?></a></li>
                <?php endfor?>
                </ul>
    		 </div>
        </div>
        </div>
      
    </div>
    </div>
    <script>
//    $('#myTab a').click(function (e) {
//      e.preventDefault()
//      $(this).tab('show')
//    })
    </script>
    	<div class="col-md-12">
            <div class="panel panel-info ">
              <div class="panel-heading">
                <h3 class="panel-title">مطالب محبوب</h3>
              </div>
              <div class="panel-body">
               <ul class="list-group">
               <?php foreach($articleList as $row):?>
                  <li class="list-group-item">
                    <span class="badge pull-left"><?php echo $row->visit?></span>
                    <?php echo $row->title?>
                  </li>
               <?php endforeach?>
                </ul>
              </div>
            </div>
        </div>
  </div>
    
     
        
    </div> <!--row-->
</div>
