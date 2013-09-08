<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function comment($date,$id,$ShowComment)
{
	
	if($ShowComment == 1){
	 $tag = "<div class='commentForm'>
        <div class='msg'>
            <h4>با تشکر از شما ، تظرتان با موفقیت ثبت شد، بعداز تائید نشان داده خواهد شد</h4>
        </div>
		 <input type='hidden' value='".$date."' class='dat'>
         <input type='hidden' value='".$id."' class='articleId'>
         <ul class='ulcontact'>
          <li style='color:#F00' class='NameError'></li>
          <li>".form_input('name',set_value('name'),'class="UserName" placeholder="'.lang('contactName').'"')."</li> 
          <li style='color:#F00' class='EmailError'></li> 
          <li>".form_input('email',set_value('email'),'class="email" placeholder="'.lang('contactEmail').'"')."</li>		  
          <li style='color:#F00' class='TextError'></li>
          <li>".form_textarea('text',set_value('text'),'class="text" placeholder="'.lang('contactText').'"')."</li>		  
          <li class='LIcaptcha'></li>
          <li style='text-align:right; color:#F00' class='CaptchaError'></li>		  
          <li>"
		  .form_input('captcha','','class = "captcha" placeholder="'.lang('contactCaptcha').'"')
          .form_button('send',lang('contactSendEmail'),'class="commentSend"')."
          </li>
         
        </ul>
 </div>		  		
		";
		echo stripslashes($tag);
	 }
	 

}
