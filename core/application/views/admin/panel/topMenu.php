<nav class="navbar navbar-default text-right navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
     <a class="navbar-brand" href="<?php echo site_url('admin')?>"><?php get_web_title();?></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav navbar-right">
 
        <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    قالب ها
                    <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('WebTemplate',"فالب سایت")?></li>
                        <li><?php echo anchor('EmailTemplate',"قالب ایمیل")?></li>
                    </ul>
          </li>
 
 
       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          امکانات
          <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
              <li><?php echo anchor('friend','دوستان');?></li>
              <li><?php echo anchor('admin/banner','تبلیغات');?></li>
              <li><?php echo anchor('box','بلوک ها');?></li>
              <li><?php echo anchor('poll',"ایجاد نظرسنجی")?></li>
              <li><?php echo anchor('backup',"پشتیبان گیری")?></li>
              <li><?php echo anchor('robots',"روبات")?></li>
          </ul>
      </li>

 
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          ایجاد صفحه
          <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
                  <li><?php echo anchor('new-pages','صفحه جدید');?></li>
                   <li class="divider"></li>
                   <?php $pages = $this->lib_database->get('pages')?>
                   <?php foreach($pages as $row):?>
                       <li><?php echo anchor('edit-pages/'.$row->id, $row->title)?></li>
                  <?php endforeach ?>
          </ul>
      </li> 
      
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          مطالب
          <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
                  <li><?php echo anchor('section','ایجاد بخش <span class="glyphicon glyphicon-pencil"></span>');?></li>
                  <li class="divider"></li>
                  <li><?php echo anchor('article','ثیت مطالب <span class="glyphicon glyphicon-pencil"></span>')?></li>
                  <li><?php echo anchor('articleList','لیست مطالب <span class="glyphicon glyphicon-list"></span>');?></li>
                  <li class="divider"></li>
                  <li><?php echo anchor('archive','آرشیو <span class="glyphicon glyphicon-briefcase"></span>');?></li>
                  <li class="divider"></li>
                  <li><?php echo anchor('admin-news','ثبت اخبار <span class="glyphicon glyphicon-pencil"></span>')?></li>
                  <li><?php echo anchor('admin-news-list','لیست اخبار <span class="glyphicon glyphicon-list"></span>');?></li>
          </ul>
      </li>      
      
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          مدیریت منو
          <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
                  <li><?php echo anchor('block','ایجاد بلوک');?></li>
                  <li><?php echo anchor('menu/','ایجاد منو')?></li>
                 
                  <!--<li><?php echo anchor('menu/subMenu','ایجاد زیر منو');?></li>-->
          </ul>
      </li>     
      
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          کاربران
          <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
              <li><?php echo anchor('admin-users',"ایجاد کاربر جدید")?></li>
              <li><?php echo anchor('admin-users-list',"لیست کاربران")?></li>
              <li><?php echo anchor('users',"ایجاد گروه کاربری")?></li>
              <li><?php echo anchor('admin-send-group-email',"ارسال ایمیل گروهی")?></li>
          </ul>
      </li>
      
   
        
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        تنظیمات
        <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><?php echo anchor('configuration','کلمات کلیدی');?></li>
            <li><?php echo anchor('SiteOff','بستن سایت');?></li>
            <li><?php echo anchor('settings','تنظیمات');?></li>
            <li class="divider"></li>
            <li><?php echo anchor('admin_logout',"خروج <i class='icon-off'></i>")?></li>
        </ul>
        </li>
        <li><?php echo anchor('admin',"داشبورد <span class='glyphicon glyphicon-dashboard'></span>","title='مدیریت'")?></li>
    </ul>
    
  </div><!-- /.navbar-collapse -->
</nav>
