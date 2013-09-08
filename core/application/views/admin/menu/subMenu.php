<div class="container dir-rtl">
	<div class="row">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>core/assets/style/menu.css"/>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>core/assets/js/menu.js"></script>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">لیست منوها</a></li>
	</ul>
	<fieldset>
		<legend>ایجاد زیر منو</legend>
        <?php echo form_open('admin/menu/insert_submenu');?>
    	<table dir="rtl" >
        	<tr>
            	<td align="left">نام :</td>
                <td><?php echo form_input('name');?></td>
            </tr>
            <tr>
            	<td align="left">منوی اصلی :</td>
                <td>
                	<select name="parent">
                    	<?php foreach($parent as $menu):?>
                    	<option value="<?php echo $menu->id; ?>"><?php echo $menu->name; ?></option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
        	<tr>
            	<td align="left">آدرس منو :</td>
                <td><?php echo form_input('link','','id="link"');?><input type="submit" value="آدرس"/></td>
            </tr>
        </table>
        <?php echo form_close();?>
        <div>
        <div><a href="javascript:void(nul);" id="homeLink" link="site/index">صفحه اصلی</a></div>
        <div><a href="javascript:void(nul);" id="aboutLink" link="site/about">درباره ما</a></div>
        <div><a href="javascript:void(nul);" id="contactLink" link="site/contact">تماس با ما</a></div>
        </div>
    </fieldset>
	</div>
</div>
</div>
</