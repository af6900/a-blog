<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
*   aBlog cms
*	www.a-blog.ir
* 	template helper v 1.0.0 beta
*	@author  Afshin Nj 
*/
function qr_email($email = NULL, $subject = NULL, $text = NULL)
{
  
$CI =& get_instance();
?>
<script src="<?php echo site_url('assets/admin/js/jquery.classyqr.js')?>"></script>
<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		$('#qrEmail').ClassyQR({
			size:'100',
			create: true,
			type: 'email',
			email: '<?php echo $email;?>',
			subject: '<?php echo $subject;?>',
			text: '<?php echo $text?>'
		});
	});
</script>
<div id="qrEmail"></div>
<?php  
}/* qr emial*/   


function qr_text($text = NULL)
{
$CI =& get_instance();
?>
<script src="<?php echo site_url('assets/admin/js/jquery.classyqr.js')?>"></script>
<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		$('#qrText').ClassyQR({
			size:'100',
			create: true,
			type: 'text',
			text: '<?php echo $text;?>'
		});
	});
</script>
<div id="qrText"></div>	
<?php	
}/* qr_text*/


function qr_number($number = NULL)
{
$CI =& get_instance();
?>
<script src="<?php echo site_url('assets/admin/js/jquery.classyqr.js')?>"></script>
<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		$('#qrNumber').ClassyQR({
			size:'100',
			create: true,
			type: 'call',
			number: '<?php echo $number;?>'
		});
	});
</script>
<div id="qrNumber"></div>

<?php	
}/* qr_number*/

function qr_sms($number = NULL, $text = NULL)
{
$CI =& get_instance();
?>
<script src="<?php echo site_url('assets/admin/js/jquery.classyqr.js')?>"></script>
<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		$('#qrSms').ClassyQR({
			size:'100',
			create: true,
			type: 'sms',
			number: '<?php echo $number?>',
			text: '<?php echo $text?>'
		});
	});
</script>
<div id="qrSms"></div>	
<?php	
}/* qr_Sms*/



function qr_url($url = NULL)
{
$CI =& get_instance();
?>
<script src="<?php echo site_url('assets/admin/js/jquery.classyqr.js')?>"></script>
<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		$('#qrUrl').ClassyQR({
			size:'100',
			create: true,
 			type: 'url',
            url: '<?php echo $url?>'
		});
	});
</script>
<div id="qrUrl"></div>	
<?php	
}/* qr_Sms*/



