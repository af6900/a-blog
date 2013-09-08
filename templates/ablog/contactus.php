            <div class="contact">
               <div class="contactAdd">
                    <div class="ContainTitle"><?php echo lang('contactAdd');?></div>
                    <div class="article">
                     <?php echo $contact?>
                    </div> 
                </div>
              
                   <?php  qr_email('afshin@a-blog.ir','ایمیل','این ایمیل من است')?>                 
                <div class="contactForm">
                  <div class="ContainTitle"></div>
                    <?php echo form_open('site/contact');?>
                     <ul class="ulcontact">
                      <li><?php echo form_input('name',set_value('name'),'placeholder="'.lang('contactName').'"');?> </li>
                      <li><?php echo form_error('name'); ?></li> 
                      
                      <li><?php echo form_input('email',set_value('email'),'placeholder="'.lang('contactEmail').'"');?></li> 
                      <li><?php echo form_error('email'); ?></li>
                      
                      <li><?php echo form_input('subject',set_value('subject'),'placeholder="'.lang('contactSubject').'"');?></li>
                      <li><?php echo form_error('subject'); ?></li>
                      
                      <li><?php echo form_textarea('message',set_value('message'),'placeholder="'.lang('contactText').'"');?></li>
                      <li><?php echo form_error('message'); ?></li>
                      
                      <li><?php captcha()?></li>
                      <li><?php echo form_input('captcha','','class = "captcha" placeholder="'.lang('contactCaptcha').'"');?>
					      <?php echo form_submit('send',lang('contactSendEmail'))?>
					  </li>
                      <li style="text-align:right"><?php echo $msg?></li> 
                    </ul>
                    <?php echo form_close();?>
                   </div> 
               <div style="clear:both"></div>
            </div>
            
