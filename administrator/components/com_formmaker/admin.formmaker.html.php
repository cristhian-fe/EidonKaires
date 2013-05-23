<?php 
  
 /**
 * @package Form Maker Lite
 * @author Web-Dorado
 * @copyright (C) 2011 Web-Dorado. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die('Restricted access');



class HTML_contact
{
    const first_css = ".wdform_table1
{
font-size:14px;
font-weight:normal;
color:#000000;
width:100%;
}

.wdform_tbody1
{
float:left;
}
.wdform_table2
{
padding-right:50px !important;
float:left;
border-spacing: 0px;
border-collapse:separate !important;
}

.time_box
{
border-width:1px;
margin: 0px;
padding: 0px;
text-align:right;
width:30px;
vertical-align:middle
}

.mini_label
{
font-size:10px;
font-family: 'Lucida Grande', Tahoma, Arial, Verdana, sans-serif;
}

.ch_rad_label
{
display:inline;
margin-left:5px;
margin-right:15px;
float:none;
}

.label
{
border:none;
}


.td_am_pm_select
{
padding-left:5;
}

.am_pm_select
{
height: 16px;
margin:0;
padding:0
}

.input_deactive
{
color:#999999;
font-style:italic;
border-width:1px;
margin: 0px;
padding: 0px
}

.input_active
{
color:#000000;
font-style:normal;
border-width:1px;
margin: 0px;
padding: 0px
}

.required
{
border:none;
color:red
}

.captcha_img
{
border-width:0px;
margin: 0px;
padding: 0px;
cursor:pointer;


}

.captcha_refresh
{
width:30px;
height:30px;
border-width:0px;
margin: 0px;
padding: 0px;
vertical-align:middle;
cursor:pointer;
background-image: url(components/com_formmaker/images/refresh_black.png);
}

.captcha_input
{
height:20px;
border-width:1px;
margin: 0px;
padding: 0px;
vertical-align:middle;
}

.file_upload
{
border-width:1px;
margin: 0px;
padding: 0px
}    

.page_deactive
{
border:1px solid black;
padding:4px 7px 4px 7px;
margin:4px;
cursor:pointer;
background-color:#DBDBDB;
}

.page_active
{
border:1px solid black;
padding:4px 7px 4px 7px;
margin:4px;
cursor:pointer;
background-color:#878787;
}

.page_percentage_active
{
padding:0px;
margin:0px;
border-spacing: 0px;
height:30px;
line-height:30px;
background-color:yellow;
border-radius:30px;
font-size:15px;
float:left;
text-align: right !important; 
}


.page_percentage_deactive
{
height:30px;
line-height:30px;
padding:5px;
border:1px solid black;
width:100%;
background-color:white;
border-radius:30px;
text-align: left !important; 
}

.page_numbers
{
font-size:11px;
}

.phone_area_code
{
width:50px;
}

.phone_number
{
width:100px;
}";

function show_map($long,$lat){

		$document =& JFactory::getDocument();
 		$cmpnt_js_path = JURI::root(true).'/administrator/components/com_formmaker/js';

		$document->addScript($cmpnt_js_path.'/if_gmap.js');
		$document->addScript('http://maps.google.com/maps/api/js?sensor=false');
?>
<table style="margin:0px; padding:0px">
<tr><td><b>Address:</b></td><td><input type="text" id="addrval0" style="border:0px; background:none" size="100" readonly /> </td></tr>
<tr><td><b>Longitude:</b></td> <td><input type="text" id="longval0" style="border:0px; background:none" size="100" readonly /> </td></tr>
<tr><td><b>Latitude:</b></td><td><input type="text" id="latval0" style="border:0px; background:none" size="100" readonly /> </td></tr>
</table>
		
<div id="0_elementform_id_temp" long="<?php echo $long ?>" center_x="<?php echo $long ?>" center_y="<?php echo $lat ?>" lat="<?php echo $lat ?>" zoom="8" info="" style="width:600px; height:500px; "></div>

<script>
		if_gmap_init("0");
		add_marker_on_map(0, 0, "<?php echo $long ?>", "<?php echo $lat ?>", '');


</script>

<?php		

}


function country_list($id){

		$document		=& JFactory::getDocument();
		
		$cmpnt_js_path = JURI::root(true).'/administrator/components/com_formmaker/js';

		$document->addScript($cmpnt_js_path.'/jquery-1.7.1.js');
		$document->addScript($cmpnt_js_path.'/jquery.ui.core.js');
		$document->addScript($cmpnt_js_path.'/jquery.ui.widget.js');
		$document->addScript($cmpnt_js_path.'/jquery.ui.mouse.js');
    	$document->addScript($cmpnt_js_path.'/jquery.ui.slider.js');
		$document->addScript($cmpnt_js_path.'/jquery.ui.sortable.js');
		$document->addStyleSheet($cmpnt_js_path.'/jquery-ui.css');
		$document->addStyleSheet($cmpnt_js_path.'/parseTheme.css');

?>
<span style=" position: absolute;right: 29px;" >
<img alt="ADD" title="add" style="cursor:pointer; vertical-align:middle; margin:5px; " src="components/com_formmaker/images/save.png" onclick="save_list()">
<img alt="CANCEL" title="cancel" style=" cursor:pointer; vertical-align:middle; margin:5px; " src="components/com_formmaker/images/cancel_but.png" onclick="window.parent.SqueezeBox.close();">
</span>
<button onclick="select_all()">Select all</button>
<button onclick="remove_all()">Remove all</button>
<ul id="countries_list" style="list-style:none; padding:0px">
</ul>

<script>


selec_coutries=[];

coutries=["","Afghanistan","Albania",	"Algeria","Andorra","Angola","Antigua and Barbuda","Argentina","Armenia","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Brazil","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Central African Republic","Chad","Chile","China","Colombi","Comoros","Congo (Brazzaville)","Congo","Costa Rica","Cote d'Ivoire","Croatia","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","East Timor (Timor Timur)","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Fiji","Finland","France","Gabon","Gambia, The","Georgia","Germany","Ghana","Greece","Grenada","Guatemala","Guinea","Guinea-Bissau","Guyana","Haiti","Honduras","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel","Italy","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Korea, North","Korea, South","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Morocco","Mozambique","Myanmar","Namibia","Nauru","Nepa","Netherlands","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palau","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Qatar","Romania","Russia","Rwanda","Saint Kitts and Nevis","Saint Lucia","Saint Vincent","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia and Montenegro","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","Spain","Sri Lanka","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Togo","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Yemen","Zambia","Zimbabwe"];	

select_=window.parent.document.getElementById('<?php echo $id ?>_elementform_id_temp');
n=select_.childNodes.length;
for(i=0; i<n; i++)
{

	selec_coutries.push(select_.childNodes[i].value);
	var ch = document.createElement('input');
		ch.setAttribute("type","checkbox");
		ch.setAttribute("checked","checked");
		ch.value=select_.childNodes[i].value;
		ch.id=i+"ch";
		//ch.setAttribute("id",i);
	
	
	var p = document.createElement('span');
	    p.style.cssText ="color:#000000; font-size: 13px; cursor:move";
		p.innerHTML=select_.childNodes[i].value;

	var li = document.createElement('li');
	    li.style.cssText ="margin:3px; vertical-align:middle";
		li.id=i;
		
	li.appendChild(ch);
	li.appendChild(p);
	
	document.getElementById('countries_list').appendChild(li);
}
cur=i;
m=coutries.length;
for(i=0; i<m; i++)
{
	isin=isValueInArray(selec_coutries, coutries[i]);
	
	if(!isin)
	{
		var ch = document.createElement('input');
			ch.setAttribute("type","checkbox");
			ch.value=coutries[i];
			ch.id=cur+"ch";
		
		
		var p = document.createElement('span');
			p.style.cssText ="color:#000000; font-size: 13px; cursor:move";
			p.innerHTML=coutries[i];

		var li = document.createElement('li');
			li.style.cssText ="margin:3px; vertical-align:middle";
			li.id=cur;
			
		li.appendChild(ch);
		li.appendChild(p);
		
		document.getElementById('countries_list').appendChild(li);
		cur++;
	}
}




$.noConflict();
jQuery(function() {
	jQuery( "#countries_list" ).sortable();
	jQuery( "#countries_list" ).disableSelection();
});

function isValueInArray(arr, val) {
	inArray = false;
	for (x = 0; x < arr.length; x++)
		if (val == arr[x])
			inArray = true;
	return inArray;
}
function save_list()
{
select_.innerHTML=""
	ul=document.getElementById('countries_list');
	n=ul.childNodes.length;
	for(i=0; i<n; i++)
	{
		if(ul.childNodes[i].tagName=="LI")
		{
			id=ul.childNodes[i].id;
			if(document.getElementById(id+'ch').checked)
			{
				var option_ = document.createElement('option');
					option_.setAttribute("value", document.getElementById(id+'ch').value);
					option_.innerHTML=document.getElementById(id+'ch').value;

				select_.appendChild(option_);
			}
				
		}
		
		
	}
	window.parent.SqueezeBox.close();


}

function select_all()
{
	for(i=0; i<194; i++)
	{
		document.getElementById(i+'ch').checked=true;;	
	}
}

function remove_all()
{
	for(i=0; i<194; i++)
	{
		document.getElementById(i+'ch').checked=false;;	
	}
}
</script>




<?php

}




function preview_formmaker($css){
 /**
 * @package SpiderFC
 * @author Web-Dorado
 * @copyright (C) 2011 Web-Dorado. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 **/
		JHTML::_('behavior.tooltip');	
		JHTML::_('behavior.calendar');
		$document =& JFactory::getDocument();
 		$cmpnt_js_path = JURI::root(true).'/administrator/components/com_formmaker/js';

		$document->addScript($cmpnt_js_path.'/if_gmap.js');
		$document->addScript($cmpnt_js_path.'/main.js');
		$document->addScript('http://maps.google.com/maps/api/js?sensor=false');
		
		//$document->addStyleSheet(JURI::root(true).'/administrator/components/com_formmaker/css/style.css');
		
		$id='form_id_temp';
?>
<style>
<?php echo str_replace('[SITE_ROOT]', JURI::root(true), $css); ?>
</style>
<div id="form_id_temppages" class="wdform_page_navigation" show_title="" show_numbers="" type=""></div>

  <form id="form_preview"></form>
<input type="hidden" id="counter<?php echo $id ?>" value="" name="counter<?php echo $id ?>" />

<script>
	JURI_ROOT				='<?php echo JURI::root(true) ?>';  

	document.getElementById('form_preview').innerHTML = window.parent.document.getElementById('take').innerHTML;
	document.getElementById('form_id_temppages').setAttribute('show_title', window.parent.document.getElementById('pages').getAttribute('show_title'));
	document.getElementById('form_id_temppages').setAttribute('show_numbers', window.parent.document.getElementById('pages').getAttribute('show_numbers'));
	document.getElementById('form_id_temppages').setAttribute('type', window.parent.document.getElementById('pages').getAttribute('type'));
	document.getElementById('counterform_id_temp').value=window.parent.gen;;

	form_view_count<?php echo $id ?>=0;
	for(i=1; i<=30; i++)
	{
		if(document.getElementById('<?php echo $id ?>form_view'+i))
		{
			form_view_count<?php echo $id ?>++;
			form_view_max<?php echo $id ?>=i;
			document.getElementById('<?php echo $id ?>form_view'+i).parentNode.removeAttribute('style');
		}
	}
	
	refresh_first();

	
	if(form_view_count<?php echo $id ?>>1)
	{
		for(i=1; i<=form_view_max<?php echo $id ?>; i++)
		{
			if(document.getElementById('<?php echo $id ?>form_view'+i))
			{
				first_form_view<?php echo $id ?>=i;
				break;
			}
		}
		
		generate_page_nav(first_form_view<?php echo $id ?>, '<?php echo $id ?>', form_view_count<?php echo $id ?>, form_view_max<?php echo $id ?>);
	}
	

function remove_add_(id)
{
			attr_name= new Array();
			attr_value= new Array();
			var input = document.getElementById(id); 
			atr=input.attributes;
			for(v=0;v<30;v++)
				if(atr[v] )
				{
					if(atr[v].name.indexOf("add_")==0)
					{
						attr_name.push(atr[v].name.replace('add_',''));
						attr_value.push(atr[v].value);
						input.removeAttribute(atr[v].name);
						v--;
					}
				}
			for(v=0;v<attr_name.length; v++)
			{
				input.setAttribute(attr_name[v],attr_value[v])
			}
}

function refresh_first()
{
		
	n=window.parent.gen;
	for(i=0; i<n; i++)
	{
		if(document.getElementById(i))
		{	
			for(z=0; z<document.getElementById(i).childNodes.length; z++)
				if(document.getElementById(i).childNodes[z].nodeType==3)
					document.getElementById(i).removeChild(document.getElementById(i).childNodes[z]);

			if(document.getElementById(i).getAttribute('type')=="type_map")
			{
				if_gmap_init(i);
				for(q=0; q<20; q++)
					if(document.getElementById(i+"_elementform_id_temp").getAttribute("long"+q))
					{
					
						w_long=parseFloat(document.getElementById(i+"_elementform_id_temp").getAttribute("long"+q));
						w_lat=parseFloat(document.getElementById(i+"_elementform_id_temp").getAttribute("lat"+q));
						w_info=parseFloat(document.getElementById(i+"_elementform_id_temp").getAttribute("info"+q));
						add_marker_on_map(i,q, w_long, w_lat, w_info, false);
					}
			}
			
			if(document.getElementById(i).getAttribute('type')=="type_mark_map")
			{
				if_gmap_init(i);
				w_long=parseFloat(document.getElementById(i+"_elementform_id_temp").getAttribute("long"+0));
				w_lat=parseFloat(document.getElementById(i+"_elementform_id_temp").getAttribute("lat"+0));
				w_info=parseFloat(document.getElementById(i+"_elementform_id_temp").getAttribute("info"+0));
				add_marker_on_map(i,0, w_long, w_lat, w_info, true);
			}
			
			
			
			if(document.getElementById(i).getAttribute('type')=="type_captcha" || document.getElementById(i).getAttribute('type')=="type_recaptcha")
			{
				if(document.getElementById(i).childNodes[10])
				{
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				}
				else
				{
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				}
				continue;
			}
			
			if(document.getElementById(i).getAttribute('type')=="type_section_break")
			{
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				continue;
			}
						

			if(document.getElementById(i).childNodes[10])
			{
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
			}
			else
			{
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
			}
		}
	}
	
	for(i=0; i<=n; i++)
	{	
		if(document.getElementById(i))
		{
			type=document.getElementById(i).getAttribute("type");
				switch(type)
				{
					case "type_text":
					case "type_number":
					case "type_password":
					case "type_submitter_mail":
					case "type_own_select":
					case "type_country":
					case "type_hidden":
					case "type_map":
					{
						remove_add_(i+"_elementform_id_temp");
						break;
					}
					
					case "type_submit_reset":
					{
						remove_add_(i+"_element_submitform_id_temp");
						if(document.getElementById(i+"_element_resetform_id_temp"))
							remove_add_(i+"_element_resetform_id_temp");
						break;
					}
					
					case "type_captcha":
					{
						remove_add_("_wd_captchaform_id_temp");
						remove_add_("_element_refreshform_id_temp");
						remove_add_("_wd_captcha_inputform_id_temp");
						break;
					}
					
					case "type_recaptcha":
					{
						remove_add_("wd_recaptchaform_id_temp");
						break;
					}
						
					case "type_file_upload":
						{
							remove_add_(i+"_elementform_id_temp");
								break;
						}
						
					case "type_textarea":
						{
						remove_add_(i+"_elementform_id_temp");

								break;
						}
						
					case "type_name":
						{
						
						if(document.getElementById(i+"_element_titleform_id_temp"))
							{
							remove_add_(i+"_element_titleform_id_temp");
							remove_add_(i+"_element_firstform_id_temp");
							remove_add_(i+"_element_lastform_id_temp");
							remove_add_(i+"_element_middleform_id_temp");
							}
							else
							{
							remove_add_(i+"_element_firstform_id_temp");
							remove_add_(i+"_element_lastform_id_temp");

							}
							break;

						}
						
					case "type_phone":
						{
						
							remove_add_(i+"_element_firstform_id_temp");
							remove_add_(i+"_element_lastform_id_temp");

							break;

						}
						case "type_address":
							{	
								remove_add_(i+"_street1form_id_temp");
								remove_add_(i+"_street2form_id_temp");
								remove_add_(i+"_cityform_id_temp");
								remove_add_(i+"_stateform_id_temp");
								remove_add_(i+"_postalform_id_temp");
								remove_add_(i+"_countryform_id_temp");
							
								break;
	
							}
							
						
					case "type_checkbox":
					case "type_radio":
						{
							is=true;
							for(j=0; j<100; j++)
								if(document.getElementById(i+"_elementform_id_temp"+j))
								{
									remove_add_(i+"_elementform_id_temp"+j);
								}
						/*	if(document.getElementById(i+"_randomize").value=="yes")
								choises_randomize(i);*/
							
							break;
						}
						
					case "type_button":
						{
							for(j=0; j<100; j++)
								if(document.getElementById(i+"_elementform_id_temp"+j))
								{
									remove_add_(i+"_elementform_id_temp"+j);
								}
							break;
						}
						
					case "type_time":
						{	
						if(document.getElementById(i+"_ssform_id_temp"))
							{
							remove_add_(i+"_ssform_id_temp");
							remove_add_(i+"_mmform_id_temp");
							remove_add_(i+"_hhform_id_temp");
							}
							else
							{
							remove_add_(i+"_mmform_id_temp");
							remove_add_(i+"_hhform_id_temp");
							}
							break;

						}
						
					case "type_date":
						{	
						remove_add_(i+"_elementform_id_temp");
						remove_add_(i+"_buttonform_id_temp");
							break;
						}
					case "type_date_fields":
						{	
						remove_add_(i+"_dayform_id_temp");
						remove_add_(i+"_monthform_id_temp");
						remove_add_(i+"_yearform_id_temp");
								break;
						}
				}	
		}
	}
	

	for(t=1;t<=form_view_max<?php echo $id ?>;t++)
	{
		if(document.getElementById('form_id_tempform_view'+t))
		{
			form_view_element=document.getElementById('form_id_tempform_view'+t);
			xy=form_view_element.childNodes.length-2;
			for(z=0;z<=xy;z++)
			{
				if(form_view_element.childNodes[z])
				if(form_view_element.childNodes[z].nodeType!=3)
				if(!form_view_element.childNodes[z].id)
				{
					del=true;
					GLOBAL_tr=form_view_element.childNodes[z];
					//////////////////////////////////////////////////////////////////////////////////////////
					for (x=0; x < GLOBAL_tr.firstChild.childNodes.length; x++)
					{
						table=GLOBAL_tr.firstChild.childNodes[x];
						tbody=table.firstChild;
						if(tbody.childNodes.length)
							del=false;
					}
					
					if(del)
					{
						form_view_element.removeChild(form_view_element.childNodes[z]);
					}

				}
			}
		}
	}


	for(i=1; i<=window.parent.form_view_max; i++)
		if(document.getElementById('form_id_tempform_view'+i))
		{
			document.getElementById('form_id_tempform_view'+i).parentNode.removeChild(document.getElementById('form_id_tempform_view_img'+i));
			document.getElementById('form_id_tempform_view'+i).removeAttribute('style');
		}
	
}


</script>
<?php 


}


function add($themes){

		JRequest::setVar( 'hidemainmenu', 1 );
		
		$document =& JFactory::getDocument();

		$cmpnt_js_path = JURI::root(true).'/administrator/components/com_formmaker/js';

		$document->addScript($cmpnt_js_path.'/jquery.js');
		$document->addScript($cmpnt_js_path.'/if_gmap.js');
		$document->addScript($cmpnt_js_path.'/formmaker1.js');
		$document->addScript('http://maps.google.com/maps/api/js?sensor=false');
		
		$document->addStyleSheet(JURI::root(true).'/administrator/components/com_formmaker/css/style.css');
		
		$is_editor=false;
		
		$plugin =& JPluginHelper::getPlugin('editors', 'tinymce');
		if (isset($plugin->type))
		{ 
			$editor	=& JFactory::getEditor('tinymce');
			$is_editor=true;
		}
		
		JHTML::_('behavior.tooltip');	
		JHTML::_('behavior.calendar');
		?>

<script type="text/javascript">
$.noConflict(); 

function refresh_()
{
				
	document.getElementById('form').value=document.getElementById('take').innerHTML;
	document.getElementById('counter').value=gen;
	
	
	
	
	
	n=gen;
	for(i=0; i<n; i++)
	{
		if(document.getElementById(i))
		{	
			for(z=0; z<document.getElementById(i).childNodes.length; z++)
				if(document.getElementById(i).childNodes[z].nodeType==3)
					document.getElementById(i).removeChild(document.getElementById(i).childNodes[z]);

			if(document.getElementById(i).getAttribute('type')=="type_captcha" || document.getElementById(i).getAttribute('type')=="type_recaptcha")
			{
				if(document.getElementById(i).childNodes[10])
				{
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				}
				else
				{
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				}
				continue;
			}
			
			if(document.getElementById(i).getAttribute('type')=="type_section_break")
			{
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				continue;
			}
						

			if(document.getElementById(i).childNodes[10])
			{
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
			}
			else
			{
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
			}
		}
	}
	
	for(i=0; i<=n; i++)
	{	
		if(document.getElementById(i))
		{
			type=document.getElementById(i).getAttribute("type");
				switch(type)
				{
					case "type_text":
					case "type_number":
					case "type_password":
					case "type_submitter_mail":
					case "type_own_select":
					case "type_country":
					case "type_hidden":
					case "type_map":
					{
						remove_add_(i+"_elementform_id_temp");
						break;
					}
					
					case "type_submit_reset":
					{
						remove_add_(i+"_element_submitform_id_temp");
						if(document.getElementById(i+"_element_resetform_id_temp"))
							remove_add_(i+"_element_resetform_id_temp");
						break;
					}
					
					case "type_captcha":
					{
						remove_add_("_wd_captchaform_id_temp");
						remove_add_("_element_refreshform_id_temp");
						remove_add_("_wd_captcha_inputform_id_temp");
						break;
					}
					
					case "type_recaptcha":
					{
						document.getElementById("public_key").value = document.getElementById("wd_recaptchaform_id_temp").getAttribute("public_key");
						document.getElementById("private_key").value= document.getElementById("wd_recaptchaform_id_temp").getAttribute("private_key");
						document.getElementById("recaptcha_theme").value= document.getElementById("wd_recaptchaform_id_temp").getAttribute("theme");
						document.getElementById('wd_recaptchaform_id_temp').innerHTML='';
						remove_add_("wd_recaptchaform_id_temp");
						break;
					}
						
					case "type_file_upload":
						{
							remove_add_(i+"_elementform_id_temp");
								break;
						}
						
					case "type_textarea":
						{
						remove_add_(i+"_elementform_id_temp");

								break;
						}
						
					case "type_name":
						{
						
						if(document.getElementById(i+"_element_titleform_id_temp"))
							{
							remove_add_(i+"_element_titleform_id_temp");
							remove_add_(i+"_element_firstform_id_temp");
							remove_add_(i+"_element_lastform_id_temp");
							remove_add_(i+"_element_middleform_id_temp");
							}
							else
							{
							remove_add_(i+"_element_firstform_id_temp");
							remove_add_(i+"_element_lastform_id_temp");

							}
							break;

						}
						
					case "type_phone":
						{
						
							remove_add_(i+"_element_firstform_id_temp");
							remove_add_(i+"_element_lastform_id_temp");

							break;

						}
						case "type_address":
							{	
								remove_add_(i+"_street1form_id_temp");
								remove_add_(i+"_street2form_id_temp");
								remove_add_(i+"_cityform_id_temp");
								remove_add_(i+"_stateform_id_temp");
								remove_add_(i+"_postalform_id_temp");
								remove_add_(i+"_countryform_id_temp");
							
								break;
	
							}
							
						
					case "type_checkbox":
					case "type_radio":
						{
							is=true;
							for(j=0; j<100; j++)
								if(document.getElementById(i+"_elementform_id_temp"+j))
								{
									remove_add_(i+"_elementform_id_temp"+j);
								}
						/*	if(document.getElementById(i+"_randomize").value=="yes")
								choises_randomize(i);*/
							
							break;
						}
						
					case "type_button":
						{
							for(j=0; j<100; j++)
								if(document.getElementById(i+"_elementform_id_temp"+j))
								{
									remove_add_(i+"_elementform_id_temp"+j);
								}
							break;
						}
						
					case "type_time":
						{	
						if(document.getElementById(i+"_ssform_id_temp"))
							{
							remove_add_(i+"_ssform_id_temp");
							remove_add_(i+"_mmform_id_temp");
							remove_add_(i+"_hhform_id_temp");
							}
							else
							{
							remove_add_(i+"_mmform_id_temp");
							remove_add_(i+"_hhform_id_temp");
							}
							break;

						}
						
					case "type_date":
						{	
						remove_add_(i+"_elementform_id_temp");
						remove_add_(i+"_buttonform_id_temp");
							break;
						}
					case "type_date_fields":
						{	
						remove_add_(i+"_dayform_id_temp");
						remove_add_(i+"_monthform_id_temp");
						remove_add_(i+"_yearform_id_temp");
								break;
						}
				}	
		}
	}
	
	for(i=1; i<=form_view_max; i++)
		if(document.getElementById('form_id_tempform_view'+i))
		{
			if(document.getElementById('page_next_'+i))
				document.getElementById('page_next_'+i).removeAttribute('src');
			if(document.getElementById('page_previous_'+i))
				document.getElementById('page_previous_'+i).removeAttribute('src');
			document.getElementById('form_id_tempform_view'+i).parentNode.removeChild(document.getElementById('form_id_tempform_view_img'+i));
			document.getElementById('form_id_tempform_view'+i).removeAttribute('style');
		}
		
	for(t=1;t<=form_view_max;t++)
	{
		if(document.getElementById('form_id_tempform_view'+t))
		{
			form_view_element=document.getElementById('form_id_tempform_view'+t);
			n=form_view_element.childNodes.length-2;
			for(z=0;z<=n;z++)
			{
				if(form_view_element.childNodes[z])
				if(form_view_element.childNodes[z].nodeType!=3)
				if(!form_view_element.childNodes[z].id)
				{
					del=true;
					GLOBAL_tr=form_view_element.childNodes[z];
					//////////////////////////////////////////////////////////////////////////////////////////
					for (x=0; x < GLOBAL_tr.firstChild.childNodes.length; x++)
					{
						table=GLOBAL_tr.firstChild.childNodes[x];
						tbody=table.firstChild;
						if(tbody.childNodes.length)
							del=false;
					}
					
					if(del)
					{
						form_view_element.removeChild(form_view_element.childNodes[z]);
					}

				}
			}
		}
	}

	document.getElementById('form_front').value=document.getElementById('take').innerHTML;
}

Joomla.submitbutton= function (pressbutton){

	var form = document.adminForm;
	if (pressbutton == 'cancel') 
	{
		submitform( pressbutton );
		return;
	}

	if (form.title.value == "")
	{
		alert( "The form must have a title." );	
		return ;
	}		

	if(form.mail.value!='')
	{
		subMailArr=form.mail.value.split(',');
		emailListValid=true;
		for(subMailIt=0; subMailIt<subMailArr.length; subMailIt++)
		{
		trimmedMail = subMailArr[subMailIt].replace(/^\s+|\s+$/g, '') ;
		if (trimmedMail.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1)
		{
					alert( "This is not a list of valid email addresses." );	
					emailListValid=false;
					break;
		}
		}
		if(!emailListValid)	
		return;
	}	

	tox='';
	
	for(t=1;t<=form_view_max;t++)
	{
		if(document.getElementById('form_id_tempform_view'+t))
		{
			form_view_element=document.getElementById('form_id_tempform_view'+t);
			n=form_view_element.childNodes.length-2;

			for(z=0;z<=n;z++)
			{
				if(form_view_element.childNodes[z].nodeType!=3)
				if(!form_view_element.childNodes[z].id)
				{
					GLOBAL_tr=form_view_element.childNodes[z];
					//////////////////////////////////////////////////////////////////////////////////////////
					for (x=0; x < GLOBAL_tr.firstChild.childNodes.length; x++)
					{
						table=GLOBAL_tr.firstChild.childNodes[x];
						tbody=table.firstChild;
						for (y=0; y < tbody.childNodes.length; y++)
						{
							tr=tbody.childNodes[y];
							l_label = document.getElementById( tr.id+'_element_labelform_id_temp').innerHTML;
							l_label = l_label.replace(/(\r\n|\n|\r)/gm," ");

							if(tr.getAttribute('type')=="type_address")
							{
								addr_id=parseInt(tr.id);
								tox=tox+addr_id+'#**id**#'+'Street Line'+'#**label**#'+tr.getAttribute('type')+'#****#';addr_id++; 
								tox=tox+addr_id+'#**id**#'+'Street Line2'+'#**label**#'+tr.getAttribute('type')+'#****#';addr_id++; 
								tox=tox+addr_id+'#**id**#'+'City'+'#**label**#'+tr.getAttribute('type')+'#****#';	addr_id++; 
								tox=tox+addr_id+'#**id**#'+'State'+'#**label**#'+tr.getAttribute('type')+'#****#';	addr_id++; 
								tox=tox+addr_id+'#**id**#'+'Postal'+'#**label**#'+tr.getAttribute('type')+'#****#';	addr_id++; 
								tox=tox+addr_id+'#**id**#'+'Country'+'#**label**#'+tr.getAttribute('type')+'#****#'; 
							}
							else
								tox=tox+tr.id+'#**id**#'+l_label+'#**label**#'+tr.getAttribute('type')+'#****#';
						}
					}
				}
			}
		}
	}

		document.getElementById('label_order').value=tox;
		refresh_();
		document.getElementById('pagination').value=document.getElementById('pages').getAttribute("type");
		document.getElementById('show_title').value=document.getElementById('pages').getAttribute("show_title");
		document.getElementById('show_numbers').value=document.getElementById('pages').getAttribute("show_numbers");
		
		submitform( pressbutton );

}

gen=1; 
form_view=1; 
form_view_max=1; 
form_view_count=1;

 //add main form  id
    function enable()
	{
	alltypes=Array('customHTML','text','checkbox','radio','time_and_date','select','file_upload','captcha','map','button','page_break','section_break');
	for(x=0; x<12;x++)
	{
		document.getElementById('img_'+alltypes[x]).src="components/com_formmaker/images/"+alltypes[x]+".png";
	}
	
		document.getElementById('formMakerDiv').style.display	=(document.getElementById('formMakerDiv').style.display=='block'?'none':'block');
		document.getElementById('formMakerDiv1').style.display	=(document.getElementById('formMakerDiv1').style.display=='block'?'none':'block');
		if(document.getElementById('formMakerDiv').offsetWidth)
			document.getElementById('formMakerDiv1').style.width	=(document.getElementById('formMakerDiv').offsetWidth - 60)+'px';
		document.getElementById('when_edit').style.display		='none';
	}

    function enable2()
	{
	alltypes=Array('customHTML','text','checkbox','radio','time_and_date','select','file_upload','captcha','map','button','page_break','section_break');
	for(x=0; x<12;x++)
	{
		document.getElementById('img_'+alltypes[x]).src="components/com_formmaker/images/"+alltypes[x]+".png";
	}
	
		document.getElementById('formMakerDiv').style.display	=(document.getElementById('formMakerDiv').style.display=='block'?'none':'block');
		document.getElementById('formMakerDiv1').style.display	=(document.getElementById('formMakerDiv1').style.display=='block'?'none':'block');
		if(document.getElementById('formMakerDiv').offsetWidth)
			document.getElementById('formMakerDiv1').style.width	=(document.getElementById('formMakerDiv').offsetWidth - 60)+'px';
		document.getElementById('when_edit').style.display		='block';
		if(document.getElementById('field_types').offsetWidth)
			document.getElementById('when_edit').style.width	=document.getElementById('field_types').offsetWidth+'px';
		
		if(document.getElementById('field_types').offsetHeight)
			document.getElementById('when_edit').style.height	=document.getElementById('field_types').offsetHeight+'px';
		
	}
	
	function set_preview()
{
	appWidth			=parseInt(document.body.offsetWidth);
	appHeight			=parseInt(document.body.offsetHeight);

	document.getElementById('toolbar-popup-preview').childNodes[1].href='index.php?option=com_formmaker&task=preview&tmpl=component&theme='+document.getElementById('theme').value;
	document.getElementById('toolbar-popup-preview').childNodes[1].setAttribute('rel',"{handler: 'iframe', size: {x:"+(appWidth-100)+", y: "+531+"}}");
}

    </script>
    


<style>
#when_edit
{
position:absolute;
background-color:#666;
z-index:101;
display:none;
width:100%;
height:100%;
opacity: 0.7;
filter: alpha(opacity = 70);
}
#formMakerDiv
{
position:fixed;
background-color:#666;
z-index:100;
display:none;
left:0;
top:0;
width:100%;
height:100%;
opacity: 0.7;
filter: alpha(opacity = 70);
}
#formMakerDiv1
{
position:fixed;
z-index:100;
background-color:transparent;
top:0;
left:0;
display:none;
margin-left:30px;
margin-top:15px;
}
</style>
<form action="index.php" method="post" name="adminForm" enctype="multipart/form-data">
<table  style="border:6px #00aeef solid; background-color:#00aeef" width="100%" cellpadding="0" cellspacing="0">
<tr>


    <td align="left" valign="middle" rowspan="3" style="padding:10px;">
    <img src="components/com_formmaker/images/FormMaker.png" />
	</td>

    <td width="300" align="right" valign="middle">

    <span style="font-size:16.76pt; font-family:BauhausItcTEEMed; color:#FFFFFF; vertical-align:middle;">Form title:&nbsp;&nbsp;</span>

    </td>

    <td width="153" align="center" valign="middle">

    <div style="background-image:url(components/com_formmaker/images/input.png); height:19px">

    <input id="title" name="title" <?php if(JRequest::getCmd('task')=="edit") echo 'value="'.htmlspecialchars($row->title).'"' ?> style="background:none; width:151px; height:19px; border:none; font-size:11px; " />

    </div>

    </td>
	
</tr>


<tr>

    <td width="300" align="right" valign="middle">

    <span style="font-size:16.76pt; font-family:BauhausItcTEEMed; color:#FFFFFF; vertical-align:middle;">Email to send submissions to:&nbsp;&nbsp;</span>

    </td>

    <td width="153" align="center" valign="middle">

    <div style="background-image:url(components/com_formmaker/images/input.png); height:19px">

    <input id="mail" name="mail" <?php if(JRequest::getCmd('task')=="edit") echo 'value="'.$row->mail.'"' ?> style="background:none; width:151px; height:19px; border:none; font-size:11px" />

    </div>

    </td>

    </tr>

<tr>

    <td width="300" align="right" valign="middle">

    <span style="font-size:16.76pt; font-family:BauhausItcTEEMed; color:#FFFFFF; vertical-align:middle;">Theme:&nbsp;&nbsp;</span>

    </td>

    <td width="153" align="center" valign="middle">

    <div style="height:19px">

    <select id="theme" name="theme" style="background:transparent; width:151px; height:19px; border:none; font-size:11px" onChange="set_preview()" >
	
	<?php 
	$form_theme='';
	foreach($themes as $theme) 
	{
		if($theme->default == 1 )
		{		
			echo '<option value="'.$theme->id.'" selected>'.$theme->title.'</option>';
			$form_theme=$theme->css;
		}	
		else
			echo '<option value="'.$theme->id.'">'.$theme->title.'</option>';
		
	}
	?>
	</select>

    </div>

    </td>

    </tr>


  <tr>
  <td align="left" colspan="3">
  
  <img src="components/com_formmaker/images/addanewfield.png" onclick="enable(); Enable()" style="cursor:pointer;margin:10px;" />

  </td>
  </tr>
  </table>
  
  
  
<div id="formMakerDiv" onclick="close_window()"></div>   

<div id="formMakerDiv1" align="center">
    
<table border="0" width="100%" cellpadding="0" cellspacing="0" height="100%" style="border:6px #00aeef solid; background-color:#FFF">
  <tr>
    <td style="padding:0px">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
        <tr valign="top">
         <td width="15%" height="100%" style="border-right:dotted black 1px;" id="field_types">
         <div id="when_edit" style="display:none"></div>
            <table border="0" cellpadding="0" cellspacing="3" width="100%">
            <tr>
            <td align="center" onClick="addRow('customHTML')" class="field_buttons" id="table_editor"><img src="components/com_formmaker/images/customHTML.png" style="margin:5px" id="img_customHTML"/></td>
            
            <td align="center" onClick="addRow('text')" class="field_buttons" id="table_text"><img src="components/com_formmaker/images/text.png" style="margin:5px" id="img_text"/></td>
            </tr>
            <tr>
            <td align="center" onClick="addRow('time_and_date')" class="field_buttons" id="table_time_and_date"><img src="components/com_formmaker/images/time_and_date.png" style="margin:5px" id="img_time_and_date"/></td>
            
            <td align="center" onClick="addRow('select')" class="field_buttons" id="table_select"><img src="components/com_formmaker/images/select.png" style="margin:5px" id="img_select"/></td>
            </tr>
            <tr>             
            <td align="center" onClick="addRow('checkbox')" class="field_buttons" id="table_checkbox"><img src="components/com_formmaker/images/checkbox.png" style="margin:5px" id="img_checkbox"/></td>
            
            <td align="center" onClick="addRow('radio')" class="field_buttons" id="table_radio"><img src="components/com_formmaker/images/radio.png" style="margin:5px" id="img_radio"/></td>
            </tr>
            <tr>
            <td align="center" onClick="alert('This field type is disabled in free version. If you need this functionality, you need to buy the commercial version.')" class="field_buttons" id="table_file_upload"><img src="components/com_formmaker/images/file_upload.png" style="margin:5px" id="img_file_upload"/></td>
            
            <td align="center" onClick="addRow('captcha')" class="field_buttons" id="table_captcha"><img src="components/com_formmaker/images/captcha.png" style="margin:5px" id="img_captcha"/></td>
            </tr>
            <tr>
            <td align="center" onClick="addRow('page_break')" class="field_buttons" id="table_page_break"><img src="components/com_formmaker/images/page_break.png" style="margin:5px" id="img_page_break"/></td>  
            
            <td align="center" onClick="addRow('section_break')" class="field_buttons" id="table_section_break"><img src="components/com_formmaker/images/section_break.png" style="margin:5px" id="img_section_break"/></td>
            </tr>
            <tr>
            <td align="center" onClick="alert('This field type is disabled in free version. If you need this functionality, you need to buy the commercial version.')" class="field_buttons" id="table_map"><img src="components/com_formmaker/images/map.png" style="margin:5px" id="img_map"/></td>  
            
            <td align="center" onClick="addRow('button')" class="field_buttons" id="table_button"><img src="components/com_formmaker/images/button.png" style="margin:5px" id="img_button"/></td>
            </tr>
            </table>
         </td>
         <td width="35%" height="100%" align="left"><div id="edit_table" style="padding:0px; overflow-y:scroll; height:531px" ></div></td>
   <td align="center" valign="top" style="background:url(components/com_formmaker/images/border2.png) repeat-y;">&nbsp;</td>
         <td style="padding:15px">
         <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
         
            <tr>
                <td align="right"><input type="radio" value="end" name="el_pos" checked="checked" id="pos_end" onclick="Disable()"/>
                  At The End
                  <input type="radio" value="begin" name="el_pos" id="pos_begin" onclick="Disable()"/>
                  At The Beginning
                  <input type="radio" value="before" name="el_pos" id="pos_before" onclick="Enable()"/>
                  Before
                  <select style="width:100px; margin-left:5px" id="sel_el_pos" disabled="disabled">
                  </select>
                  <img alt="ADD" title="add" style="cursor:pointer; vertical-align:middle; margin:5px" src="components/com_formmaker/images/save.png" onClick="add(0)"/>
                  <img alt="CANCEL" title="cancel"  style=" cursor:pointer; vertical-align:middle; margin:5px" src="components/com_formmaker/images/cancel_but.png" onClick="close_window()"/>
				
                	<hr style=" margin-bottom:10px" />
                  </td>
              </tr>
              
              <tr height="100%" valign="top">
                <td  id="show_table"></td>
              </tr>
              
            </table>
         </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<input type="hidden" id="old" />
<input type="hidden" id="old_selected" />
<input type="hidden" id="element_type" />
<input type="hidden" id="editing_id" />
<input type="hidden" id="editing_page_break" />
<div id="main_editor" style="position:absolute; display:none; z-index:140;"><?php if($is_editor) echo $editor->display('editor','','440','350','40','6');
else
{
?>
<textarea name="editor" id="editor" cols="40" rows="6" style="width: 440px; height: 350px; " class="mce_editable" aria-hidden="true"></textarea>
<?php

}
 ?></div>

</div>


<?php if(!$is_editor)
?>
<iframe id="tinymce" style="display:none"></iframe>

<?php
?>

<br />
<br />

<fieldset>

    <legend>

    <h2 style="color:#00aeef">Form</h2>
    
    </legend>

     <style><?php echo self::first_css; ?></style>

<table width="100%" style="margin:8px"><tr id="page_navigation"><td align="center" width="90%" id="pages" show_title="false" show_numbers="true" type="none"></td><td align="left" id="edit_page_navigation"></td></tr></table>
<div id="take" class="main"><table cellpadding="4" cellspacing="0" class="wdform_table1" style="border-top:0px solid black;"><tbody id="form_id_tempform_view1" class="wdform_tbody1" page_title="Untitled page" next_title="Next" next_type="button" next_class="wdform_page_button" next_checkable="false" previous_title="Previous" previous_type="button" previous_class="wdform_page_button" previous_checkable="false"><tr class="wdform_tr1" ><td class="wdform_td1" ><table class="wdform_table2"><tbody class="wdform_tbody2"></tbody></table></td></tr><tr class="wdform_footer"><td colspan="100" valign="top"><table width="100%" style="padding-right:170px"><tbody><tr id="form_id_temppage_nav1"></tr></tbody></table></td></tr><tbody id="form_id_tempform_view_img1" style="float:right ;" ><tr><td width="0%"></td><td align="right"><img src="components/com_formmaker/images/minus.png" title="Show or hide the page" class="page_toolbar" onclick="show_or_hide('1')" id="show_page_img_1" /></td><td><img src="components/com_formmaker/images/page_delete.png" title="Delete the page"  class="page_toolbar" onclick="remove_page('1')" /></td><td><img src="components/com_formmaker/images/page_delete_all.png" title="Delete the page with fields"  class="page_toolbar" onclick="remove_page_all('1')" /></td><td><img src="components/com_formmaker/images/page_edit.png" title="Edit the page"  class="page_toolbar" onclick="edit_page_break('1')" /></td></tr></tbody></table></div>
</fieldset>

    <input type="hidden" name="form_front" id="form_front" />
    <input type="hidden" name="form" id="form" />

    <input type="hidden" name="counter" id="counter" />
    
    <input type="hidden" name="pagination" id="pagination" />
    <input type="hidden" name="show_title" id="show_title" />
    <input type="hidden" name="show_numbers" id="show_numbers" />
	
    <input type="hidden" name="public_key" id="public_key" />
    <input type="hidden" name="private_key" id="private_key" />
    <input type="hidden" name="recaptcha_theme" id="recaptcha_theme" />
	<input type="hidden" name="javascript" id="javascript" value="// before form is load
function before_load()
{

}

// before form submit
function before_submit()
{

}

// before form reset
function before_reset()
{

}">

	<input type="hidden" name="label_order" id="label_order" />
    <input type="hidden" name="option" value="com_formmaker" />

    <input type="hidden" name="task" value="" />

</form>



<script>
	appWidth			=parseInt(document.body.offsetWidth);
	appHeight			=parseInt(document.body.offsetHeight);
	document.getElementById('toolbar-popup-preview').childNodes[1].href='index.php?option=com_formmaker&task=preview&tmpl=component&theme='+document.getElementById('theme').value;
	document.getElementById('toolbar-popup-preview').childNodes[1].setAttribute('rel',"{handler: 'iframe', size: {x:"+(appWidth-100)+", y: "+531+"}}");
</script>

<?php

$bar=& JToolBar::getInstance( 'toolbar' );
$bar->appendButton( 'popup', 'preview', 'Preview', 'index.php?option=com_formmaker&task=preview&tmpl=component', '8', '0' );

		

	}

function show_submits(&$rows, &$forms, &$lists, &$pageNav, &$labels, $label_titles, $rows_ord, $filter_order_Dir,$form_id, $labels_id, $sorted_labels_type, $total_entries, $total_views, $where, $where3)
{
	$label_titles_copy=$label_titles;
	JHTML::_('behavior.tooltip');
	JHTML::_('behavior.calendar');
	JHTML::_('behavior.modal');
	$mainframe = &JFactory::getApplication();
JSubMenuHelper::addEntry(JText::_('Forms'), 'index.php?option=com_formmaker&amp;task=forms' );
JSubMenuHelper::addEntry(JText::_('Submissions'), 'index.php?option=com_formmaker&amp;task=submits',true );
JSubMenuHelper::addEntry(JText::_('Themes'), 'index.php?option=com_formmaker&amp;task=themes' );
	$language = JFactory::getLanguage();
	$language->load('com_formmaker', JPATH_SITE, null, true);	

	$n=count($rows);
	$m=count($labels);
	$group_id_s= array();
	
	$rows_ord_none=array();
	
	if(count($rows_ord)>0 and $m)
	for($i=0; $i <count($rows_ord) ; $i++)
	{
	
		$row = &$rows_ord[$i];
	
		if(!in_array($row->group_id, $group_id_s))
		{
		
			array_push($group_id_s, $row->group_id);
			
		}
	}
	?>

<script type="text/javascript">
function tableOrdering( order, dir, task ) 
{
    var form = document.adminForm;
    form.filter_order2.value     = order;
    form.filter_order_Dir2.value = dir;
    submitform( task );
}

function renderColumns()
{
	allTags=document.getElementsByTagName('*');
	
	for(curTag in allTags)
	{
		if(typeof(allTags[curTag].className)!="undefined")
		if(allTags[curTag].className.indexOf('_fc')>0)
		{
			curLabel=allTags[curTag].className.replace('_fc','');
			if(document.forms.adminForm.hide_label_list.value.indexOf('@'+curLabel+'@')>=0)
				allTags[curTag].style.display = 'none';
			else
				allTags[curTag].style.display = '';
		}
	}
}

function clickLabChB(label, ChB)
{
	document.forms.adminForm.hide_label_list.value=document.forms.adminForm.hide_label_list.value.replace('@'+label+'@','');
	if(document.forms.adminForm.hide_label_list.value=='') document.getElementById('ChBAll').checked=true;
	
	if(!(ChB.checked)) 
	{
		document.forms.adminForm.hide_label_list.value+='@'+label+'@';
		document.getElementById('ChBAll').checked=false;
	}
	renderColumns();
}

function toggleChBDiv(b)
{
	if(b)
	{
		sizes=window.getSize();
		document.getElementById("sbox-overlay").style.width=sizes.x+"px";
		document.getElementById("sbox-overlay").style.height=sizes.y+"px";
		document.getElementById("ChBDiv").style.left=Math.floor((sizes.x-350)/2)+"px";
		
		document.getElementById("ChBDiv").style.display="block";
		document.getElementById("sbox-overlay").style.display="block";
	}
	else
	{
		document.getElementById("ChBDiv").style.display="none";
		document.getElementById("sbox-overlay").style.display="none";
	}
}

function clickLabChBAll(ChBAll)
{
	<?php
	if(isset($labels))
	{
		$templabels=array_merge(array('submitid','submitdate','submitterip'),$labels_id);
		$label_titles=array_merge(array('ID','Submit date', 'Submitter\'s IP Address'),$label_titles);
	}
	?>

	if(ChBAll.checked)
	{ 
		document.forms.adminForm.hide_label_list.value='';

		for(i=0; i<=ChBAll.form.length; i++)
			if(typeof(ChBAll.form[i])!="undefined")
				if(ChBAll.form[i].type=="checkbox")
					ChBAll.form[i].checked=true;
	}
	else
	{
		document.forms.adminForm.hide_label_list.value='@<?php echo implode($templabels,'@@') ?>@';

		for(i=0; i<=ChBAll.form.length; i++)
			if(typeof(ChBAll.form[i])!="undefined")
				if(ChBAll.form[i].type=="checkbox")
					ChBAll.form[i].checked=false;
	}

	renderColumns();
}

function remove_all()
{
	document.getElementById('startdate').value='';
	document.getElementById('enddate').value='';
	document.getElementById('ip_search').value='';
	<?php
		$n=count($rows);
	
	for($i=0; $i < count($labels) ; $i++)
	{
	echo "
	if(document.getElementById('".$form_id.'_'.$labels_id[$i]."_search'))
		document.getElementById('".$form_id.'_'.$labels_id[$i]."_search').value='';
	";
	}
	?>
}

function show_hide_filter()
{	
	if(document.getElementById('fields_filter').style.display=="none")
	{
		document.getElementById('fields_filter').style.display='';
		document.getElementById('filter_img').src='components/com_formmaker/images/filter_hide.png';
	}
	else
	{
		document.getElementById('fields_filter').style.display="none";
		document.getElementById('filter_img').src='components/com_formmaker/images/filter_show.png';
	}
}
</script>

<style>
.reports
{
	border:1px solid #DEDEDE;
	border-radius:11px;
	background-color:#F0F0F0;
	text-align:center;
	width:100px;
}

.bordered
{
	border-radius:8px
}
</style>
<?php 
if(isset($labels))
{
?>
<div id="sbox-overlay" style="z-index: 65555; position: fixed; top: 0px; left: 0px; visibility: visible; zoom: 1; background-color:#000000; opacity: 0.7; filter: alpha(opacity=70); display:none;" onclick="toggleChBDiv(false)"></div>
<div style="background-color:#FFFFFF; width: 350px; height: 350px; overflow-y: scroll; padding: 20px; position: fixed; top: 100px;display:none; border:2px solid #AAAAAA;  z-index:65556" id="ChBDiv">

<form action="#">
    <p style="font-weight:bold; font-size:18px;margin-top: 0px;">
    Select Columns
    </p>

    <input type="checkbox" <?php if($lists['hide_label_list']==='') echo 'checked="checked"' ?> onclick="clickLabChBAll(this)" id="ChBAll" />All</br>

	<?php 
    
        foreach($templabels as $key => $curlabel)
        {
            if(strpos($lists['hide_label_list'],'@'.$curlabel.'@')===false)
            echo '<input type="checkbox" checked="checked" onclick="clickLabChB(\''.$curlabel.'\', this)" />'.$label_titles[$key].'<br />';
            else
            echo '<input type="checkbox" onclick="clickLabChB(\''.$curlabel.'\', this)" />'.$label_titles[$key].'<br />';
        }
    
    
    ?>
    <br />
    <div style="text-align:center;">
        <input type="button" onclick="toggleChBDiv(false);" value="Done" /> 
    </div>
</form>
</div>

<?php } ?>

<form action="index.php?option=com_formmaker&task=submits" method="post" name="adminForm">
    <input type="hidden" name="option" value="com_formmaker">
    <input type="hidden" name="task" value="submits">
<br />
    <table width="100%">

        <tr >
            <td align="left" width="300"> Select a form:             
                <select name="form_id" id="form_id" onchange="if(document.getElementById('startdate'))remove_all();document.adminForm.submit();">
                    <option value="0" selected="selected"> Select a Form </option>
                    <?php 
            $option='com_formmaker';
            
            if( $forms)
            for($i=0, $n=count($forms); $i < $n ; $i++)
        
            {
                $form = &$forms[$i];
        
        
                if($form_id==$form->id)
                {
                    echo "<option value='".$form->id."' selected='selected'>".$form->title."</option>";
                    $form_title=$form->title;
                }
                else
                    echo "<option value='".$form->id."' >".$form->title."</option>";
            }
        ?>
                    </select>
            </td>
			<?php if(isset($form_id) and $form_id>0):  ?>
			<td class="reports" ><strong>Entries</strong><br /><?php echo $total_entries; ?></td>
			<td class="reports"><strong>Views</strong><br /><?php echo $total_views ?></td>
            <td class="reports"><strong>Conversion Rate</strong><br /><?php  if($total_views) echo round((($total_entries/$total_views)*100),2).'%'; else echo '0%' ?></td>
			<td style="font-size:36px;text-align:center;">
				<?php echo $form_title ?>
			</td>
			
			
        </tr>
        
        <tr>

            <td colspan=5>
                <br />
                <input type="hidden" name="hide_label_list" value="<?php  echo $lists['hide_label_list']; ?>" /> 
                <img id="filter_img" src="components/com_formmaker/images/filter_show.png" width="40" style="vertical-align:middle; cursor:pointer" onclick="show_hide_filter()"  title="Search by fields" />
				<input type="button" onclick="this.form.submit();" style="vertical-align:middle; cursor:pointer" value="<?php echo JText::_( 'Go' ); ?>" />	
				<input type="button" onclick="remove_all();this.form.submit();" style="vertical-align:middle; cursor:pointer" value="<?php echo JText::_( 'Reset' ); ?>" />
            </td>
			<td align="right">
                <br /><br />
                <?php if(isset($labels)) echo '<input type="button" onclick="toggleChBDiv(true)" value="Add/Remove Columns" />'; ?>
			</td>
        </tr>

		<?php else: echo '<td><br /><br /><br /></td></tr>'; endif; ?>
    </table>
    <table class="adminlist" width="100%">
        <thead>
            <tr>

                <th width="3%"><?php echo '#'; ?></th>

                <th width="3%">

                    <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($group_id_s)?>)">
                </th>
				
				 <?php
				 echo '<th width="4%" class="submitid_fc"';
				 if(!(strpos($lists['hide_label_list'],'@submitid@')===false)) 
				 echo 'style="display:none;"';
				 echo '>';
				 echo JHTML::_('grid.sort', 'Id', 'group_id', @$lists['order_Dir'], @$lists['order'] );
				 echo '</th>';
				 
				 echo '<th width="150" class="submitdate_fc"';
				 if(!(strpos($lists['hide_label_list'],'@submitdate@')===false)) 
				 echo 'style="display:none;"';
				 echo '>';
				 echo JHTML::_('grid.sort', 'Submit date', 'date', @$lists['order_Dir'], @$lists['order'] );
				 echo '</th>';

				 echo '<th width="100" class="submitterip_fc"';
				 if(!(strpos($lists['hide_label_list'],'@submitterip@')===false)) 
				 echo 'style="display:none;"';
				 echo '>';
				 echo JHTML::_('grid.sort', 'Submitter\'s IP Address', 'ip', @$lists['order_Dir'], @$lists['order'] );
				 echo '</th>';
				 
				 
	$n=count($rows);
	
	for($i=0; $i < count($labels) ; $i++)
	{
		if(strpos($lists['hide_label_list'],'@'.$labels_id[$i].'@')===false)  $styleStr='';
		else $styleStr='style="display:none;"';
		
		if($sorted_labels_type[$i]=='type_address')		
			switch($label_titles_copy[$i])
			{
			case 'Street Line': $field_title=JText::_('WDF_STREET_ADDRESS'); break;
			case 'Street Line2': $field_title=JText::_('WDF_STREET_ADDRESS2'); break;
			case 'City': $field_title=JText::_('WDF_CITY'); break;
			case 'State': $field_title=JText::_('WDF_STATE'); break;
			case 'Postal': $field_title=JText::_('WDF_POSTAL'); break;
			case 'Country': $field_title=JText::_('WDF_COUNTRY'); break;
			default : $field_title=$label_titles_copy[$i]; break;			
			}
		else
			$field_title=$label_titles_copy[$i];
			echo '<th class="'.$labels_id[$i].'_fc" '.$styleStr.'>'.JHTML::_('grid.sort', $field_title, $labels_id[$i]."_field", @$lists['order_Dir'], @$lists['order'] ).'</th>';
	}
?>

            </tr>
            <tr id="fields_filter" style="display:none">
                <th width="3%"></th>
                <th width="3%"></th>
				<th width="4%" class="submitid_fc" <?php if(!(strpos($lists['hide_label_list'],'@submitid@')===false)) echo 'style="display:none;"';?> ></th>
				
				
				<th width="150" class="submitdate_fc" style="text-align:left; <?php if(!(strpos($lists['hide_label_list'],'@submitdate@')===false)) echo 'display:none;';?>" align="center"> 
				<table class="simple_table">
					<tr class="simple_table">
						<td class="simple_table">From:</td>
						<td class="simple_table"><input class="inputbox" type="text" name="startdate" id="startdate" size="10" maxlength="10" value="<?php echo $lists['startdate'];?>" /> </td>
						<td class="simple_table"><input type="reset" class="button" value="..." onclick="return showCalendar('startdate','%Y-%m-%d');" /> </td>
					</tr>
					<tr class="simple_table">
						<td class="simple_table">To:</td>
						<td class="simple_table"><input class="inputbox" type="text" name="enddate" id="enddate" size="10" maxlength="10" value="<?php echo $lists['enddate'];?>" /> </td>
						<td class="simple_table"><input type="reset" class="button" value="..." onclick="return showCalendar('enddate','%Y-%m-%d');" /></td>
					</tr>
				</table>
				
				</th>
				
				
				
				
				<th width="100"class="submitterip_fc"  <?php if(!(strpos($lists['hide_label_list'],'@submitterip@')===false)) echo 'style="display:none;"';?>>
                 <input type="text" name="ip_search" id="ip_search" value="<?php echo $lists['ip_search'] ?>" onChange="this.form.submit();"/>
				</th>
				<?php				 
                    $n=count($rows);
					$ka_fielderov_search=false;
					
					if($lists['ip_search'] || $lists['startdate'] || $lists['enddate']){
						$ka_fielderov_search=true;
					}
					
                    for($i=0; $i < count($labels) ; $i++)
                    {
                        if(strpos($lists['hide_label_list'],'@'.$labels_id[$i].'@')===false)  
							$styleStr='';
                        else 
							$styleStr='style="display:none;"';
						
						if(!$ka_fielderov_search)
							if($lists[$form_id.'_'.$labels_id[$i].'_search'])
							{
								$ka_fielderov_search=true;
							}                        
 						if($sorted_labels_type[$i]!='type_mark_map')
                            echo '<th class="'.$labels_id[$i].'_fc" '.$styleStr.'>'.'<input name="'.$form_id.'_'.$labels_id[$i].'_search" id="'.$form_id.'_'.$labels_id[$i].'_search" type="text" value="'.$lists[$form_id.'_'.$labels_id[$i].'_search'].'"  onChange="this.form.submit();" >'.'</th>';
						else
   							echo '<th class="'.$labels_id[$i].'_fc" '.$styleStr.'>'.'</th>';
                 }
                ?>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="100"> <?php echo $pageNav->getListFooter(); ?> </td>
            </tr>
        </tfoot>

        <?php
    $k = 0;
	$m=count($labels);
	$group_id_s= array();
	$l=0;
	if(count($rows_ord)>0 and $m)
	for($i=0; $i <count($rows_ord) ; $i++)
	{
	
		$row = &$rows_ord[$i];
	
		if(!in_array($row->group_id, $group_id_s))
		{
		
			array_push($group_id_s, $row->group_id);
			
		}
	}
	

	for($www=0, $qqq=count($group_id_s); $www < $qqq ; $www++)
	{	
	$i=$group_id_s[$www];
	
		$temp= array();
		for($j=0; $j < $n ; $j++)
		{
			$row = &$rows[$j];
			if($row->group_id==$i)
			{
				array_push($temp, $row);
			}
		}
		$f=$temp[0];
		$date=$f->date;
		$ip=$f->ip;
		$checked 	= JHTML::_('grid.id', $www, $group_id_s[$www]);
		$link="index.php?option=com_formmaker&task=edit_submit&cid[]=".$f->group_id;
		?>

        <tr class="<?php echo "row$k"; ?>">

              <td align="center"><?php echo $www+1;?></td>

          <td align="center"><?php echo $checked?></td>
		  
<?php

if(strpos($lists['hide_label_list'],'@submitid@')===false)
echo '<td align="center" class="submitid_fc"><a href="'.$link.'" >'.$f->group_id.'</a></td>';
else 
echo '<td align="center" class="submitid_fc" style="display:none;"><a href="'.$link.'" >'.$f->group_id.'</a></td>';

if(strpos($lists['hide_label_list'],'@submitdate@')===false)
echo '<td align="center" class="submitdate_fc"><a href="'.$link.'" >'.$date.'</a></td>';
else 
echo '<td align="center" class="submitdate_fc" style="display:none;"><a href="'.$link.'" >'.$date.'</a></td>'; 

if(strpos($lists['hide_label_list'],'@submitterip@')===false)
echo '<td align="center" class="submitterip_fc"><a href="'.$link.'" >'.$ip.'</a></td>';
else 
echo '<td align="center" class="submitterip_fc" style="display:none;"><a href="'.$link.'" >'.$ip.'</a></td>';


		$ttt=count($temp);
		for($h=0; $h < $m ; $h++)
		{		
			$not_label=true;
			for($g=0; $g < $ttt ; $g++)
			{			
				$t = $temp[$g];
				if(strpos($lists['hide_label_list'],'@'.$labels_id[$h].'@')===false)  $styleStr='';
				else $styleStr='style="display:none;"';
				if($t->element_label==$labels_id[$h])
				{
					if(strpos($t->element_value,"***map***"))
					{
						$map_params=explode('***map***',$t->element_value);
						
						$longit	=$map_params[0];
						$latit	=$map_params[1];
						
						echo  '<td align="center" class="'.$labels_id[$h].'_fc" '.$styleStr.'><a class="modal"  href="index.php?option=com_formmaker&task=show_map&long='.$longit.'&lat='.$latit.'&tmpl=component" rel="{handler: \'iframe\', size: {x:630, y: 570}}">'.'Show on Map'."</a></td>";
					}
					else

						if(strpos($t->element_value,"*@@url@@*"))
						{
							$new_file=str_replace("*@@url@@*",'', str_replace("***br***",'<br>', $t->element_value));
							$new_filename=explode('/', $new_file);
							echo  '<td align="center" class="'.$labels_id[$h].'_fc" '.$styleStr.'><a target="_blank" href="'.$new_file.'">'.$new_filename[count($new_filename)-1]."</td>";
						}
						else
							echo  '<td align="center" class="'.$labels_id[$h].'_fc" '.$styleStr.'><pre style="font-family:inherit">'.str_replace("***br***",'<br>', $t->element_value).'</pre></td>';
					$not_label=false;
				}
			}
			if($not_label)
					echo  '<td align="center" class="'.$labels_id[$h].'_fc" '.$styleStr.'></td>';
		}
?>
        </tr>

        <?php


		$k = 1 - $k;

	}

	?>

    </table>

	
	
        <?php
		    $db =& JFactory::getDBO();

foreach($sorted_labels_type as $key => $label_type)
{
	if($label_type=="type_checkbox" || $label_type=="type_radio" || $label_type=="type_own_select" || $label_type=="type_country")
	{	
		?>
<br />
<br />

        <strong><?php echo $label_titles_copy[$key]?></strong>
<br />
<br />

    <?php

		$query = "SELECT element_value FROM #__formmaker_submits ".$where3." AND element_label='".$labels_id[$key]."'";
		$db->setQuery( $query);
		$choices = $db->loadObjectList();
	
		if($db->getErrorNum()){
			echo $db->stderr();
			return false;}
			
	$colors=array('#2CBADE','#FE6400');
	$choices_labels=array();
	$choices_count=array();
	$all=count($choices);
	$unanswered=0;	
	foreach($choices as $key => $choice)
	{
		if($choice->element_value=='')
		{
			$unanswered++;
		}
		else
		{
			if(!in_array( $choice->element_value,$choices_labels))
			{
				array_push($choices_labels, $choice->element_value);
				array_push($choices_count, 0);
			}

			$choices_count[array_search($choice->element_value, $choices_labels)]++;
		}
	}
	array_multisort($choices_count,SORT_DESC,$choices_labels);
	?>
	<table width="50%" class="adminlist">
		<thead>
			<tr>
				<th width="20%">Choices</th>
				<th>Percentage</th>
				<th width="10%">Count</th>
			</tr>
		</thead>
    <?php 
	foreach($choices_labels as $key => $choices_label)
	{
	?>
		<tr>
			<td><?php echo str_replace("***br***",'<br>', $choices_label)?></td>
			<td><div class="bordered" style="width:<?php echo ($choices_count[$key]/($all-$unanswered))*100; ?>%; height:18px; background-color:<?php echo $colors[$key % 2]; ?>"></td>
			<td><?php echo $choices_count[$key]?></td>
		</tr>
    <?php 
	}
	
	if($unanswered){
	?>
    <tr>
    <td colspan="2" align="right">Unanswered</th>
    <td><strong><?php echo $unanswered;?></strong></th>
	</tr>

	<?php	
	}
	?>
    <tr>
    <td colspan="2" align="right"><strong>Total</strong></th>
    <td><strong><?php echo $all;?></strong></th>
	</tr>

	</table>
	<?php
	}
}
	?>

	
	
    <input type="hidden" name="boxchecked" value="0">

    <input type="hidden" name="filter_order2" value="<?php echo $lists['order']; ?>" />

    <input type="hidden" name="filter_order_Dir2" value="<?php echo $lists['order_Dir']; ?>" />

</form>

<script>
<?php if($ka_fielderov_search){?> 
document.getElementById('fields_filter').style.display='';
document.getElementById('filter_img').src='components/com_formmaker/images/filter_hide.png';
	<?php
 }?>
</script>

<?php


}

function show(&$rows, &$pageNav, &$lists){

JSubMenuHelper::addEntry(JText::_('Forms'), 'index.php?option=com_formmaker&amp;task=forms', true );
JSubMenuHelper::addEntry(JText::_('Submissions'), 'index.php?option=com_formmaker&amp;task=submits' );
JSubMenuHelper::addEntry(JText::_('Themes'), 'index.php?option=com_formmaker&amp;task=themes' );

		JHTML::_('behavior.tooltip');	

	?>
<script> function SelectAll(obj) { obj.focus(); obj.select(); } </script>
<form action="index.php?option=com_formmaker" method="post" name="adminForm">

    <table width="100%">

        <tr>

            <td align="left" width="100%"> <?php echo JText::_( 'Filter' ); ?>:

                <input type="text" name="search" id="search" value="<?php echo $lists['search'];?>" class="text_area" onchange="document.adminForm.submit();" />

                <button onclick="this.form.submit();"> <?php echo JText::_( 'Go' ); ?></button>

                <button onclick="document.getElementById('search').value='';this.form.submit();"> <?php echo JText::_( 'Reset' ); ?></button>

            </td>

        </tr>

    </table>

    <table class="adminlist" width="100%">

        <thead>

            <tr>

                <th width="4%"><?php echo '#'; ?></th>
                <th width="4%"><?php echo  JHTML::_('grid.sort', 'Id', 'Id', @$lists['order_Dir'], @$lists['order'] ); ?></th>

                <th width="8%">

                    <input type="checkbox" name="toggle"

 value="" onclick="checkAll(<?php echo count($rows)?>)">

                </th>

                <th width="34%"><?php echo JHTML::_('grid.sort', 'Title', 'title', @$lists['order_Dir'], @$lists['order'] ); ?></th>

                <th width="35%"><?php echo JHTML::_('grid.sort', 'Email to send submissions to', 'mail', @$lists['order_Dir'], @$lists['order'] ); ?></th>
				
                <th width="15%"><?php echo 'Plugin Code<br/>(Copy to article)'; ?></th>

            </tr>

        </thead>

        <tfoot>

            <tr>

                <td colspan="6"> <?php echo $pageNav->getListFooter(); ?> </td>

            </tr>

        </tfoot>

        <?php

	

    $k = 0;

	for($i=0, $n=count($rows); $i < $n ; $i++)

	{

		$row = &$rows[$i];

		$checked 	= JHTML::_('grid.id', $i, $row->id);

		$published 	= JHTML::_('grid.published', $row, $i); 


		// prepare link for id column

		$link 		= JRoute::_( 'index.php?option=com_formmaker&task=edit&cid[]='. $row->id );

		?>

        <tr class="<?php echo "row$k"; ?>">

                      <td align="center"><?php echo $i+1?></td>
                      <td align="center"><?php echo $row->id?></td>

          <td align="center"><?php echo $checked?></td>

            <td align="center"><a href="<?php echo $link; ?>"><?php echo $row->title?></a></td>

            <td align="center"><?php echo $row->mail?></td>
            <td align="center"><input type="text" readonly="readonly" value="{loadformmaker <?php echo $row->id?>}" onclick="SelectAll(this)" width="130"></td>

        </tr>

        <?php

		$k = 1 - $k;

	}

	?>

    </table>

    <input type="hidden" name="option" value="com_formmaker">
    <input type="hidden" name="task" value="forms">
    <input type="hidden" name="boxchecked" value="0">
    <input type="hidden" name="filter_order" value="<?php echo $lists['order']; ?>" />
    <input type="hidden" name="filter_order_Dir" value="" />

</form>

<?php
}

function edit(&$row, &$labels, &$themes){

JRequest::setVar( 'hidemainmenu', 1 );
		
		$document =& JFactory::getDocument();

		$cmpnt_js_path = JURI::root(true).'/administrator/components/com_formmaker/js';
		
		$document->addScript($cmpnt_js_path.'/jquery.js');
		$document->addScript($cmpnt_js_path.'/if_gmap.js');
		$document->addScript($cmpnt_js_path.'/formmaker1.js');
		$document->addScript('http://maps.google.com/maps/api/js?sensor=false');
		$document->addStyleSheet(JURI::root(true).'/administrator/components/com_formmaker/css/style.css');
		
		$is_editor=false;
		
		$plugin =& JPluginHelper::getPlugin('editors', 'tinymce');
		if (isset($plugin->type))
		{ 
			$editor	=& JFactory::getEditor('tinymce');
			$is_editor=true;
		}
		

		JHTML::_('behavior.tooltip');	
		JHTML::_('behavior.calendar');
	?>
    
<script type="text/javascript">
$.noConflict();

Joomla.submitbutton= function (pressbutton) 

{

	if(!document.getElementById('araqel'))
	{
		alert('Please wait while page loading');
		return;
	}
	else
		if(document.getElementById('araqel').value=='0')
		{
			alert('Please wait while page loading');
			return;
		}
		
	var form = document.adminForm;

	if (pressbutton == 'cancel') 

	{

		submitform( pressbutton );

		return;

	}

	if (form.title.value == "")

	{

				alert( "The form must have a title." );	
				return;

	}		

	if(form.mail.value!='')
	{
		subMailArr=form.mail.value.split(',');
		emailListValid=true;
		for(subMailIt=0; subMailIt<subMailArr.length; subMailIt++)
		{
		trimmedMail = subMailArr[subMailIt].replace(/^\s+|\s+$/g, '') ;
		if (trimmedMail.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1)
		{
					alert( "This is not a list of valid email addresses." );	
					emailListValid=false;
					break;
		}
		}
		if(!emailListValid)	
		return

	}		
	
		tox='';
		l_id_array=[<?php echo $labels['id']?>];
		l_label_array=[<?php echo $labels['label']?>];
		l_type_array=[<?php echo $labels['type']?>];
		l_id_removed=[];
		
		for(x=0; x< l_id_array.length; x++)
			{
				l_id_removed[x]=true;
			}

for(t=1;t<=form_view_max;t++)
{
	if(document.getElementById('form_id_tempform_view'+t))
	{
		form_view_element=document.getElementById('form_id_tempform_view'+t);
		n=form_view_element.childNodes.length-2;	
		
		for(q=0;q<=n;q++)
		{
				if(form_view_element.childNodes[q].nodeType!=3)
				if(!form_view_element.childNodes[q].id)
				{
					GLOBAL_tr=form_view_element.childNodes[q];
		
					for (x=0; x < GLOBAL_tr.firstChild.childNodes.length; x++)
					{
			
						table=GLOBAL_tr.firstChild.childNodes[x];
						tbody=table.firstChild;
						for (y=0; y < tbody.childNodes.length; y++)
						{
							is_in_old=false;
							tr=tbody.childNodes[y];
							l_id=tr.id;
				
							l_label=document.getElementById( tr.id+'_element_labelform_id_temp').innerHTML;
							l_label = l_label.replace(/(\r\n|\n|\r)/gm," ");
							l_type=tr.getAttribute('type');
							for(z=0; z< l_id_array.length; z++)
							{
								if(l_id_array[z]==l_id)
								{
									l_id_removed[z]=false;
									if(l_type_array[z]=="type_address")
									{
										z++;	
										l_id_removed[z]=false;
										z++;	
										l_id_removed[z]=false;
										z++;	
										l_id_removed[z]=false;
										z++;	
										l_id_removed[z]=false;
										z++;	
										l_id_removed[z]=false;
									}
								}
							}
							
								if(tr.getAttribute('type')=="type_address")
								{
									addr_id=parseInt(tr.id);
									tox=tox+addr_id+'#**id**#'+'Street Line'+'#**label**#'+tr.getAttribute('type')+'#****#';addr_id++; 
									tox=tox+addr_id+'#**id**#'+'Street Line2'+'#**label**#'+tr.getAttribute('type')+'#****#';addr_id++; 
									tox=tox+addr_id+'#**id**#'+'City'+'#**label**#'+tr.getAttribute('type')+'#****#';	addr_id++; 
									tox=tox+addr_id+'#**id**#'+'State'+'#**label**#'+tr.getAttribute('type')+'#****#';	addr_id++; 
									tox=tox+addr_id+'#**id**#'+'Postal'+'#**label**#'+tr.getAttribute('type')+'#****#';	addr_id++; 
									tox=tox+addr_id+'#**id**#'+'Country'+'#**label**#'+tr.getAttribute('type')+'#****#'; 
								}
								else
									tox=tox+l_id+'#**id**#'+l_label+'#**label**#'+l_type+'#****#';

							
							
						}
					}
				}
		}
	}	
}
	for(x=0; x< l_id_array.length; x++)
	{
		if(l_id_removed[x])
				tox=tox+l_id_array[x]+'#**id**#'+l_label_array[x]+'#**label**#'+l_type_array[x]+'#****#';
	}
	
	
	document.getElementById('label_order').value=tox;
	
	
	refresh_()
	document.getElementById('pagination').value=document.getElementById('pages').getAttribute("type");
	document.getElementById('show_title').value=document.getElementById('pages').getAttribute("show_title");
	document.getElementById('show_numbers').value=document.getElementById('pages').getAttribute("show_numbers");
	
	
		submitform( pressbutton );
}

function remove_whitespace(node)
{
	for (ttt=0; ttt < node.childNodes.length; ttt++)
	{
        if( node.childNodes[ttt].nodeType == '3')
		{
			if(!node.childNodes[ttt])
			node.removeChild(node.childNodes[ttt]);
		}
		else
		{
			if(node.childNodes[ttt].childNodes.length)
				remove_whitespace(node.childNodes[ttt]);
		}
	}
	return
}

function refresh_()
{
			
	document.getElementById('form').value=document.getElementById('take').innerHTML;
	document.getElementById('counter').value=gen;
	n=gen;
	for(i=0; i<n; i++)
	{
		if(document.getElementById(i))
		{	
			for(z=0; z<document.getElementById(i).childNodes.length; z++)
				if(document.getElementById(i).childNodes[z].nodeType==3)
					document.getElementById(i).removeChild(document.getElementById(i).childNodes[z]);

			if(document.getElementById(i).getAttribute('type')=="type_captcha" || document.getElementById(i).getAttribute('type')=="type_recaptcha")
			{
				if(document.getElementById(i).childNodes[10])
				{
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				}
				else
				{
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				}
				continue;
			}
						
			if(document.getElementById(i).getAttribute('type')=="type_section_break")
			{
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				continue;
			}
						


			if(document.getElementById(i).childNodes[10])
			{
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[2]);
			}
			else
			{
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
				document.getElementById(i).removeChild(document.getElementById(i).childNodes[1]);
			}
		}
	}
	
	for(i=0; i<=n; i++)
	{	
		if(document.getElementById(i))
		{
			type=document.getElementById(i).getAttribute("type");
				switch(type)
				{
					case "type_text":
					case "type_number":
					case "type_password":
					case "type_submitter_mail":
					case "type_own_select":
					case "type_country":
					case "type_hidden":
					case "type_map":
					{
						remove_add_(i+"_elementform_id_temp");
						break;
					}
					
					case "type_submit_reset":
					{
						remove_add_(i+"_element_submitform_id_temp");
						if(document.getElementById(i+"_element_resetform_id_temp"))
							remove_add_(i+"_element_resetform_id_temp");
						break;
					}
					
					case "type_captcha":
					{
						remove_add_("_wd_captchaform_id_temp");
						remove_add_("_element_refreshform_id_temp");
						remove_add_("_wd_captcha_inputform_id_temp");
						break;
					}
					
					case "type_recaptcha":
					{
						document.getElementById("public_key").value = document.getElementById("wd_recaptchaform_id_temp").getAttribute("public_key");
						document.getElementById("private_key").value= document.getElementById("wd_recaptchaform_id_temp").getAttribute("private_key");
						document.getElementById("recaptcha_theme").value= document.getElementById("wd_recaptchaform_id_temp").getAttribute("theme");
						document.getElementById('wd_recaptchaform_id_temp').innerHTML='';
						remove_add_("wd_recaptchaform_id_temp");
						break;
					}
						
					case "type_file_upload":
						{
							remove_add_(i+"_elementform_id_temp");
							
								break;
						}
						
					case "type_textarea":
						{
						remove_add_(i+"_elementform_id_temp");

								break;
						}
						
					case "type_name":
						{
						
							if(document.getElementById(i+"_element_titleform_id_temp"))
							{
								remove_add_(i+"_element_titleform_id_temp");
								remove_add_(i+"_element_firstform_id_temp");
								remove_add_(i+"_element_lastform_id_temp");
								remove_add_(i+"_element_middleform_id_temp");
							}
							else
							{
								remove_add_(i+"_element_firstform_id_temp");
								remove_add_(i+"_element_lastform_id_temp");
							}
								break;

						}
						
					case "type_phone":
						{
						
							remove_add_(i+"_element_firstform_id_temp");
							remove_add_(i+"_element_lastform_id_temp");
							break;

						}
						case "type_address":
							{	
								remove_add_(i+"_street1form_id_temp");
								remove_add_(i+"_street2form_id_temp");
								remove_add_(i+"_cityform_id_temp");
								remove_add_(i+"_stateform_id_temp");
								remove_add_(i+"_postalform_id_temp");
								remove_add_(i+"_countryform_id_temp");
							
								break;
	
							}
							
						
					case "type_checkbox":
					case "type_radio":
						{
							is=true;
							for(j=0; j<100; j++)
								if(document.getElementById(i+"_elementform_id_temp"+j))
								{
									remove_add_(i+"_elementform_id_temp"+j);
								}

							/*if(document.getElementById(i+"_randomize").value=="yes")
								choises_randomize(i);*/
							
							break;
						}
						
					case "type_button":
						{
							for(j=0; j<100; j++)
								if(document.getElementById(i+"_elementform_id_temp"+j))
								{
									remove_add_(i+"_elementform_id_temp"+j);
								}
							break;
						}
						
					case "type_time":
						{	
						if(document.getElementById(i+"_ssform_id_temp"))
							{
							remove_add_(i+"_ssform_id_temp");
							remove_add_(i+"_mmform_id_temp");
							remove_add_(i+"_hhform_id_temp");
							}
							else
							{
							remove_add_(i+"_mmform_id_temp");
							remove_add_(i+"_hhform_id_temp");

							}
							break;

						}
						
					case "type_date":
						{	
						remove_add_(i+"_elementform_id_temp");
						remove_add_(i+"_buttonform_id_temp");
						
							break;
						}
					case "type_date_fields":
						{	
						remove_add_(i+"_dayform_id_temp");
						remove_add_(i+"_monthform_id_temp");
						remove_add_(i+"_yearform_id_temp");
								break;
						}
				}	
		}
	}
	
	for(i=1; i<=form_view_max; i++)
	{
		if(document.getElementById('form_id_tempform_view'+i))
		{
			if(document.getElementById('page_next_'+i))
				document.getElementById('page_next_'+i).removeAttribute('src');
			if(document.getElementById('page_previous_'+i))
				document.getElementById('page_previous_'+i).removeAttribute('src');
			document.getElementById('form_id_tempform_view'+i).parentNode.removeChild(document.getElementById('form_id_tempform_view_img'+i));
			document.getElementById('form_id_tempform_view'+i).removeAttribute('style');
		}
	}
	
for(t=1;t<=form_view_max;t++)
{
	if(document.getElementById('form_id_tempform_view'+t))
	{
		form_view_element=document.getElementById('form_id_tempform_view'+t);		
		n=form_view_element.childNodes.length-2;
		
		for(q=0;q<=n;q++)
		{
				if(form_view_element.childNodes[q])
				if(form_view_element.childNodes[q].nodeType!=3)
				if(!form_view_element.childNodes[q].id)
				{
					del=true;
					GLOBAL_tr=form_view_element.childNodes[q];
					
					for (x=0; x < GLOBAL_tr.firstChild.childNodes.length; x++)
					{
			
						table=GLOBAL_tr.firstChild.childNodes[x];
						tbody=table.firstChild;
						
						if(tbody.childNodes.length)
							del=false;
					}
				
					if(del)
					{
						form_view_element.removeChild(form_view_element.childNodes[q]);
					}
				
				}
		}
	}	
}
	

	document.getElementById('form_front').value=document.getElementById('take').innerHTML;

}





	gen=<?php echo $row->counter; ?>;//add main form  id
    function enable()
	{
	alltypes=Array('customHTML','text','checkbox','radio','time_and_date','select','file_upload','captcha','map','button','page_break','section_break');
	for(x=0; x<12;x++)
	{
		document.getElementById('img_'+alltypes[x]).src="components/com_formmaker/images/"+alltypes[x]+".png";
	}
	

		document.getElementById('formMakerDiv').style.display	=(document.getElementById('formMakerDiv').style.display=='block'?'none':'block');
		document.getElementById('formMakerDiv1').style.display	=(document.getElementById('formMakerDiv1').style.display=='block'?'none':'block');
		if(document.getElementById('formMakerDiv').offsetWidth)
			document.getElementById('formMakerDiv1').style.width	=(document.getElementById('formMakerDiv').offsetWidth - 60)+'px';
		document.getElementById('when_edit').style.display		='none';
	}

    function enable2()
	{
	alltypes=Array('customHTML','text','checkbox','radio','time_and_date','select','file_upload','captcha','map','button','page_break','section_break');
	for(x=0; x<12;x++)
	{
		document.getElementById('img_'+alltypes[x]).src="components/com_formmaker/images/"+alltypes[x]+".png";
	}
	

		document.getElementById('formMakerDiv').style.display	=(document.getElementById('formMakerDiv').style.display=='block'?'none':'block');
		document.getElementById('formMakerDiv1').style.display	=(document.getElementById('formMakerDiv1').style.display=='block'?'none':'block');
		if(document.getElementById('formMakerDiv').offsetWidth)
			document.getElementById('formMakerDiv1').style.width	=(document.getElementById('formMakerDiv').offsetWidth - 60)+'px';
		document.getElementById('when_edit').style.display		='block';
		if(document.getElementById('field_types').offsetWidth)
			document.getElementById('when_edit').style.width	=document.getElementById('field_types').offsetWidth+'px';
		
		if(document.getElementById('field_types').offsetHeight)
			document.getElementById('when_edit').style.height	=document.getElementById('field_types').offsetHeight+'px';
		
		//document.getElementById('when_edit').style.position='none';
		
	}
	
function set_preview()
{
	appWidth			=parseInt(document.body.offsetWidth);
	appHeight			=parseInt(document.body.offsetHeight);
	document.getElementById('toolbar-popup-preview').childNodes[1].href='index.php?option=com_formmaker&task=preview&tmpl=component&theme='+document.getElementById('theme').value;
	document.getElementById('toolbar-popup-preview').childNodes[1].setAttribute('rel',"{handler: 'iframe', size: {x:"+(appWidth-100)+", y: "+531+"}}");
}
    </script>
<style>
#when_edit
{
position:absolute;
background-color:#666;
z-index:101;
display:none;
width:100%;
height:100%;
opacity: 0.7;
filter: alpha(opacity = 70);
}

#formMakerDiv
{
position:fixed;
background-color:#666;
z-index:100;
display:none;
left:0;
top:0;
width:100%;
height:100%;
opacity: 0.7;
filter: alpha(opacity = 70);
}
#formMakerDiv1
{
position:fixed;
z-index:100;
background-color:transparent;
top:0;
left:0;
display:none;
margin-left:30px;
margin-top:15px;
}
</style>

<form action="index.php" method="post" name="adminForm" enctype="multipart/form-data">
<table  style="border:6px #00aeef solid; background-color:#00aeef" width="100%" cellpadding="0" cellspacing="0">
<tr>


    <td align="left" valign="middle" rowspan="3" style="padding:10px;">
    <img src="components/com_formmaker/images/FormMaker.png" />
	</td>

    <td width="70" align="right" valign="middle">

    <span style="font-size:16.76pt; font-family:BauhausItcTEEMed; color:#FFFFFF; vertical-align:middle;">Form title:&nbsp;&nbsp;</span>

    </td>

    <td width="153" align="center" valign="middle">

    <div style="background-image:url(components/com_formmaker/images/input.png);">

    <input id="title" name="title" <?php if(JRequest::getCmd('task')=="edit") echo 'value="'.htmlspecialchars($row->title).'"' ?> style="background:none; width:151px; height:17px; border:none; font-size:11px" />

    </div>

    </td>
	
</tr><tr>

    <td width="300" align="right" valign="middle">

    <span style="font-size:16.76pt; font-family:BauhausItcTEEMed; color:#FFFFFF; vertical-align:middle;">Email to send submissions to:&nbsp;&nbsp;</span>

    </td>

    <td width="153" align="center" valign="middle">

    <div style="background-image:url(components/com_formmaker/images/input.png);">

    <input id="mail" name="mail" <?php if(JRequest::getCmd('task')=="edit") echo 'value="'.$row->mail.'"' ?> style="background:none; width:151px; height:17px; border:none; font-size:11px" />

    </div>

    </td>

    </tr>

<tr>

    <td width="300" align="right" valign="middle">

    <span style="font-size:16.76pt; font-family:BauhausItcTEEMed; color:#FFFFFF; vertical-align:middle;">Theme:&nbsp;&nbsp;</span>

    </td>

    <td width="153" align="center" valign="middle">

    <div style="height:19px">

    <select id="theme" name="theme" style="background:transparent; width:151px; height:19px; border:none; font-size:11px"  onChange="set_preview()" >
	
	<?php 
	$form_theme='';
	foreach($themes as $theme) 
	{
		if($theme->id==$row->theme)
		{
			echo '<option value="'.$theme->id.'" selected>'.$theme->title.'</option>';
			$form_theme=$theme->css;
		}
		else
			echo '<option value="'.$theme->id.'">'.$theme->title.'</option>';
	}
	?>
	</select>

    </div>

    </td>

    </tr>

	<tr>
  <td align="left" colspan="3">
  
  <img src="components/com_formmaker/images/addanewfield.png" onclick="enable(); Enable()" style="cursor:pointer;margin:10px;" />

  </td>
  </tr>
  </table>

<div id="formMakerDiv" onclick="close_window()"></div>  
<div id="formMakerDiv1"  align="center">
    
    
<table border="0" width="100%" cellpadding="0" cellspacing="0" height="100%" style="border:6px #00aeef solid; background-color:#FFF">
  <tr>
    <td style="padding:0px">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
        <tr valign="top">
         <td width="15%" height="100%" style="border-right:dotted black 1px;" id="field_types">
            <div id="when_edit" style="display:none"></div>
			            <table border="0" cellpadding="0" cellspacing="3" width="100%">
            <tr>
            <td align="center" onClick="addRow('customHTML')" class="field_buttons" id="table_editor"><img src="components/com_formmaker/images/customHTML.png" style="margin:5px" id="img_customHTML"/></td>
            
            <td align="center" onClick="addRow('text')" class="field_buttons" id="table_text"><img src="components/com_formmaker/images/text.png" style="margin:5px" id="img_text"/></td>
            </tr>
            <tr>
            <td align="center" onClick="addRow('time_and_date')" class="field_buttons" id="table_time_and_date"><img src="components/com_formmaker/images/time_and_date.png" style="margin:5px" id="img_time_and_date"/></td>
            
            <td align="center" onClick="addRow('select')" class="field_buttons" id="table_select"><img src="components/com_formmaker/images/select.png" style="margin:5px" id="img_select"/></td>
            </tr>
            <tr>             
            <td align="center" onClick="addRow('checkbox')" class="field_buttons" id="table_checkbox"><img src="components/com_formmaker/images/checkbox.png" style="margin:5px" id="img_checkbox"/></td>
            
            <td align="center" onClick="addRow('radio')" class="field_buttons" id="table_radio"><img src="components/com_formmaker/images/radio.png" style="margin:5px" id="img_radio"/></td>
            </tr>
            <tr>
            <td align="center" onClick="alert('This field type is disabled in free version. If you need this functionality, you need to buy the commercial version.')" class="field_buttons" id="table_file_upload"><img src="components/com_formmaker/images/file_upload.png" style="margin:5px" id="img_file_upload"/></td>
            
            <td align="center" onClick="addRow('captcha')" class="field_buttons" id="table_captcha"><img src="components/com_formmaker/images/captcha.png" style="margin:5px" id="img_captcha"/></td>
            </tr>
            <tr>
            <td align="center" onClick="addRow('page_break')" class="field_buttons" id="table_page_break"><img src="components/com_formmaker/images/page_break.png" style="margin:5px" id="img_page_break"/></td>  
            
            <td align="center" onClick="addRow('section_break')" class="field_buttons" id="table_section_break"><img src="components/com_formmaker/images/section_break.png" style="margin:5px" id="img_section_break"/></td>
            </tr>
            <tr>
            <td align="center" onClick="alert('This field type is disabled in free version. If you need this functionality, you need to buy the commercial version.')" class="field_buttons" id="table_map"><img src="components/com_formmaker/images/map.png" style="margin:5px" id="img_map"/></td>  
            
            <td align="center" onClick="addRow('button')" class="field_buttons" id="table_button"><img src="components/com_formmaker/images/button.png" style="margin:5px" id="img_button"/></td>
            </tr>
            </table>

         </td>
         <td width="35%" height="100%" align="left"><div id="edit_table" style="padding:0px; overflow-y:scroll; height:531px" ></div></td>

		 <td align="center" valign="top" style="background:url(components/com_formmaker/images/border2.png) repeat-y;">&nbsp;</td>
         <td style="padding:15px">
         <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
         
            <tr>
                <td align="right"><input type="radio" value="end" name="el_pos" checked="checked" id="pos_end" onclick="Disable()"/>
                  At The End
                  <input type="radio" value="begin" name="el_pos" id="pos_begin" onclick="Disable()"/>
                  At The Beginning
                  <input type="radio" value="before" name="el_pos" id="pos_before" onclick="Enable()"/>
                  Before
                  <select style="width:100px; margin-left:5px" id="sel_el_pos" disabled="disabled">
                  </select>
                  <img alt="ADD" title="add" style="cursor:pointer; vertical-align:middle; margin:5px" src="components/com_formmaker/images/save.png" onClick="add(0)"/>
                  <img alt="CANCEL" title="cancel"  style=" cursor:pointer; vertical-align:middle; margin:5px" src="components/com_formmaker/images/cancel_but.png" onClick="close_window()"/>
				
                	<hr style=" margin-bottom:10px" />
                  </td>
              </tr>
              
              <tr height="100%" valign="top">
                <td  id="show_table"></td>
              </tr>
              
            </table>
         </td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<input type="hidden" id="old" />
<input type="hidden" id="old_selected" />
<input type="hidden" id="element_type" />
<input type="hidden" id="editing_id" />
<div id="main_editor" style="position:absolute; display:none; z-index:140;"><?php if($is_editor) echo $editor->display('editor','','440','350','40','6');
else
{
?>
<textarea name="editor" id="editor" cols="40" rows="6" style="width: 440px; height: 350px; " class="mce_editable" aria-hidden="true"></textarea>
<?php

}
 ?></div>
 </div>
 
 <?php if(!$is_editor)
?>
<iframe id="tinymce" style="display:none"></iframe>

<?php
?>


 
 
<br />
<br />

    <fieldset>

    <legend>

    <h2 style="color:#00aeef">Form</h2>

    </legend>

        <?php
		
    echo '<style>'.self::first_css.'</style>';

?>
<table width="100%" style="margin:8px"><tr id="page_navigation"><td align="center" width="90%" id="pages" show_title="<?php echo $row->show_title; ?>" show_numbers="<?php echo $row->show_numbers; ?>" type="<?php echo $row->pagination; ?>"></td><td align="left" id="edit_page_navigation"></td></tr></table>

    <div id="take">
    <?php
	
	    echo $row->form;
		
	 ?> </div>

    </fieldset>

    <input type="hidden" name="form" id="form">
    <input type="hidden" name="form_front" id="form_front">
    
    <input type="hidden" name="pagination" id="pagination" />
    <input type="hidden" name="show_title" id="show_title" />
    <input type="hidden" name="show_numbers" id="show_numbers" />
	
    <input type="hidden" name="public_key" id="public_key" />
    <input type="hidden" name="private_key" id="private_key" />
    <input type="hidden" name="recaptcha_theme" id="recaptcha_theme" />

    <input type="hidden" id="label_order" name="label_order" value="<?php echo $row->label_order;?>" />
    <input type="hidden" name="counter" id="counter" value="<?php echo $row->counter;?>">

<script type="text/javascript">

function formOnload()
{
//enable maps
for(t=0; t<<?php echo $row->counter;?>; t++)
	if(document.getElementById(t+"_typeform_id_temp"))
	{
		if(document.getElementById(t+"_typeform_id_temp").value=="type_map" || document.getElementById(t+"_typeform_id_temp").value=="type_mark_map")
		{
			if_gmap_init(t);
			for(q=0; q<20; q++)
				if(document.getElementById(t+"_elementform_id_temp").getAttribute("long"+q))
				{
				
					w_long=parseFloat(document.getElementById(t+"_elementform_id_temp").getAttribute("long"+q));
					w_lat=parseFloat(document.getElementById(t+"_elementform_id_temp").getAttribute("lat"+q));
					w_info=parseFloat(document.getElementById(t+"_elementform_id_temp").getAttribute("info"+q));
					add_marker_on_map(t,q, w_long, w_lat, w_info, false);
				}
		}
		else
		if(document.getElementById(t+"_typeform_id_temp").value=="type_date")
				Calendar.setup({
						inputField: t+"_elementform_id_temp",
						ifFormat: document.getElementById(t+"_buttonform_id_temp").getAttribute('format'),
						button: t+"_buttonform_id_temp",
						align: "Tl",
						singleClick: true,
						firstDay: 0
						});

	}
	
	form_view=1;
	form_view_count=0;
	for(i=1; i<=30; i++)
	{
		if(document.getElementById('form_id_tempform_view'+i))
		{
			form_view_count++;
			form_view_max=i;
		}
	}
	
	if(form_view_count>1)
	{
		for(i=1; i<=form_view_max; i++)
		{
			if(document.getElementById('form_id_tempform_view'+i))
			{
				first_form_view=i;
				break;
			}
		}
		form_view=form_view_max;
		
		generate_page_nav(first_form_view);
		
	var img_EDIT = document.createElement("img");
			img_EDIT.setAttribute("src", "components/com_formmaker/images/edit.png");
			img_EDIT.style.cssText = "margin-left:40px; cursor:pointer";
			img_EDIT.setAttribute("onclick", 'el_page_navigation()');
			
	var td_EDIT = document.getElementById("edit_page_navigation");
			td_EDIT.appendChild(img_EDIT);
	
	document.getElementById('page_navigation').appendChild(td_EDIT);

			
	}


//if(document.getElementById('take').innerHTML.indexOf('up_row(')==-1) location.reload(true);
//else 
document.getElementById('form').value=document.getElementById('take').innerHTML;
document.getElementById('araqel').value=1;

}

function formAddToOnload()
{ 
	if(formOldFunctionOnLoad){ formOldFunctionOnLoad(); }
	formOnload();
}

function formLoadBody()
{
	formOldFunctionOnLoad = window.onload;
	window.onload = formAddToOnload;
}

var formOldFunctionOnLoad = null;

formLoadBody();


</script>

    <input type="hidden" name="option" value="com_formmaker" />

    <input type="hidden" name="id" value="<?php echo $row->id?>" />

    <input type="hidden" name="cid[]" value="<?php echo $row->id; ?>" />

    <input type="hidden" name="task" value="" />
    <input type="hidden" id="araqel" value="0" />

</form>
<script>
	appWidth			=parseInt(document.body.offsetWidth);
	appHeight			=parseInt(document.body.offsetHeight);
	document.getElementById('toolbar-popup-preview').childNodes[1].href='index.php?option=com_formmaker&task=preview&tmpl=component&theme='+document.getElementById('theme').value;
	document.getElementById('toolbar-popup-preview').childNodes[1].setAttribute('rel',"{handler: 'iframe', size: {x:"+(appWidth-100)+", y: "+531+"}}");
</script>

<?php		
$bar=& JToolBar::getInstance( 'toolbar' );
$bar->appendButton( 'popup', 'preview', 'Preview', 'index.php?option=com_formmaker&task=preview&tmpl=component', '800', '600' );

       }	

	


/////////////////////////////////////////////////////////////////////// THEME /////////////////////////////////



function show_themes(&$rows, &$pageNav, &$lists){

JSubMenuHelper::addEntry(JText::_('Forms'), 'index.php?option=com_formmaker&amp;task=forms' );
JSubMenuHelper::addEntry(JText::_('Submissions'), 'index.php?option=com_formmaker&amp;task=submits' );
JSubMenuHelper::addEntry(JText::_('Themes'), 'index.php?option=com_formmaker&amp;task=themes', true );

		JHTML::_('behavior.tooltip');	

	?>
<script type="text/javascript">
Joomla.tableOrdering= function ( order, dir, task )  {
    var form = document.adminForm;
    form.filter_order_themes.value     = order;
    form.filter_order_Dir_themes.value = dir;
    submitform( task );
}

function isChecked(isitchecked){
	if (isitchecked == true){
		document.adminForm.boxchecked.value++;
	}
	else {
		document.adminForm.boxchecked.value--;
	}
}

</script>
	
   
	<form action="index.php?option=com_formmaker" method="post" name="adminForm">
    
		<table>
		<tr>
			<td align="left" width="100%">
				<?php echo JText::_( 'Filter' ); ?>:
				<input type="text" name="search_theme" id="search_theme" value="<?php echo $lists['search_theme'];?>" class="text_area" onchange="document.adminForm.submit();" />
                <button onclick="this.form.submit();"><?php echo JText::_( 'Go' ); ?></button>
				<button onclick="document.getElementById('search_theme').value='';this.form.submit();"><?php echo JText::_( 'Reset' ); ?></button>
			</td>
		</tr>
		</table>    
    
        
    <table class="adminlist">
    <thead>
    	<tr>            
            <th width="30" class="title"><?php echo "#" ?></td>
            <th width="20"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($rows)?>)"></th>
            <th width="30" class="title"><?php echo JHTML::_('grid.sort',   'ID', 'id', @$lists['order_Dir'], @$lists['order'] ); ?></td>
            <th><?php echo JHTML::_('grid.sort', 'Title', 'title', @$lists['order_Dir'], @$lists['order'] ); ?></th>
            <th><?php echo JText::_('Default'); ?></th>
        </tr>
    </thead>
	<tfoot>
		<tr>
			<td colspan="11">
			 <?php echo $pageNav->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>
                
    <?php
    $k = 0;
	for($i=0, $n=count($rows); $i < $n ; $i++)
	{
		$row = &$rows[$i];
		$checked 	= JHTML::_('grid.id', $i, $row->id);
		$link 		= JRoute::_( 'index.php?option=com_formmaker&task=edit_themes&cid[]='. $row->id );
?>
        <tr class="<?php echo "row$k"; ?>">
        	<td align="center"><?php echo $i+1?></td>
        	<td><?php echo $checked?></td>
        	<td align="center"><?php echo $row->id?></td>
        	<td><a href="<?php echo $link;?>"><?php echo $row->title?></a></td>            
			<td align="center">
				<?php if ( $row->default == 1 ) : ?>
				<img src="templates/bluestork/images/menu/icon-16-default.png" alt="<?php echo JText::_( 'Default' ); ?>" />
				<?php else : ?>
				&nbsp;
				<?php endif; ?>
			</td>
       </tr>
        <?php
		$k = 1 - $k;
	}
	?>
    </table>
	
    <input type="hidden" name="option" value="com_formmaker">
    <input type="hidden" name="task" value="themes">    
    <input type="hidden" name="boxchecked" value="0"> 
    <input type="hidden" name="filter_order_themes" value="<?php echo $lists['order']; ?>" />
    <input type="hidden" name="filter_order_Dir_themes" value="<?php echo $lists['order_Dir']; ?>" />       
    </form>

<?php
}

function add_themes($def_theme){

		JRequest::setVar( 'hidemainmenu', 1 );
		
		?>
        
<script>

function submitbutton(pressbutton) {
	
	var form = document.adminForm;
	
	if (pressbutton == 'cancel_themes') 
	{
		submitform( pressbutton );
		return;
	}
	if(form.title.value=="")
	{
		alert('Set Theme title');
		return;
	}

	submitform( pressbutton );
}


</script>        
<form action="index.php" method="post" name="adminForm" enctype="multipart/form-data">
<table class="admintable">

 
				<tr>
					<td class="key">
						<label for="title">
							Title of theme:
						</label>
					</td>
					<td >
                                    <input type="text" name="title" id="title" size="80"/>
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="title">
							Css:
						</label>
					</td>
					<td >
                                    <textarea name="css" id="css" rows=30 cols=100><?php echo $def_theme->css ?></textarea>
					</td>
				</tr>
</table>           
    <input type="hidden" name="option" value="com_formmaker" />
    <input type="hidden" name="task" value="" />
</form>

	   <?php	
	
}


function edit_themes(&$row){

		JRequest::setVar( 'hidemainmenu', 1 );
		
		?>
        
<script>

function submitbutton(pressbutton) {
	
	var form = document.adminForm;
	
	if (pressbutton == 'cancel_themes') 
	{
		submitform( pressbutton );
		return;
	}
	if(form.title.value=="")
	{
		alert('Set Theme title');
		return;
	}

	submitform( pressbutton );
}


</script>        
<form action="index.php" method="post" name="adminForm" enctype="multipart/form-data">
<table class="admintable">

 
				<tr>
					<td class="key">
						<label for="title">
							Title of theme:
						</label>
					</td>
					<td >
                                    <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($row->title) ?>" size="80"/>
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="title">
							Css:
						</label>
					</td>
					<td >
                                    <textarea name="css" id="css" rows=30 cols=100><?php echo htmlspecialchars($row->css) ?></textarea>
					</td>
				</tr>
</table>           
    <input type="hidden" name="option" value="com_formmaker" />
	<input type="hidden" name="id" value="<?php echo $row->id?>" />        
	<input type="hidden" name="cid[]" value="<?php echo $row->id; ?>" />        
	<input type="hidden" name="task" value="" />        
</form>

	   <?php	
	
}

/////////////////////////////////////////////////////////////////////// THEME /////////////////////////////////










	
function editSubmit($rows, $labels_id ,$labels_name,$labels_type){
JRequest::setVar( 'hidemainmenu', 1 );
$editor	=& JFactory::getEditor();
		?>
        
<script language="javascript" type="text/javascript">

Joomla.submitbutton= function (pressbutton) {
	var form = document.adminForm;

	if (pressbutton == 'cancel_submit') 
	{
	submitform( pressbutton );
	return;
	}

	submitform( pressbutton );
}

</script>        

<form action="index.php" method="post" name="adminForm">
<table class="admintable">
				<tr>
					<td class="key">
						<label for="ID">
							<?php echo JText::_( 'ID' ); ?>:
						</label>
					</td>
					<td >
                       <?php echo $rows[0]->group_id;?>
					</td>
				</tr>
                
                <tr>
					<td class="key">
						<label for="Date">
							<?php echo JText::_( 'Date' ); ?>:
						</label>
					</td>
					<td >
                       <?php echo $rows[0]->date;?>
					</td>
				</tr>
                <tr>
					<td class="key">
						<label for="IP">
							<?php echo JText::_( 'IP' ); ?>:
						</label>
					</td>
					<td >
                       <?php echo $rows[0]->ip;?>
					</td>
                </tr>
                
<?php 

foreach($labels_id as $key => $label_id)
{
	if($labels_type[$key]!='type_editor' and $labels_type[$key]!='type_submit_reset' and $labels_type[$key]!='type_map' and $labels_type[$key]!='type_mark_map' and $labels_type[$key]!='type_captcha' and $labels_type[$key]!='type_recaptcha' and $labels_type[$key]!='type_button')
	{
		$element_value='';
		foreach($rows as $row)
		{
			if($row->element_label==$label_id)
			{		
				$element_value=	$row->element_value;
				break;
			}
		}
		if($labels_type[$key]!='type_checkbox')
		echo '		<tr>
						<td class="key">
							<label for="title">
								'.$labels_name[$key].'
							</label>
						</td>
						<td >
							<input type="text" name="submission_'.$label_id.'" id="submission_'.$label_id.'" value="'.str_replace("*@@url@@*",'',$element_value).'" size="80" />
						</td>
					</tr>
					';
		else
		{
			$choices	= explode('***br***',$element_value);
			$choices 	= array_slice($choices,0, count($choices)-1);   
		echo '		<tr>
						<td class="key" rowspan="'.count($choices).'">
							<label for="title">
								'.$labels_name[$key].'
							</label>
						</td>';
			foreach($choices as $choice_key => $choice)
		echo '
						<td >
							<input type="text" name="submission_'.$label_id.'_'.$choice_key.'" id="submission_'.$label_id.'_'.$choice_key.'" value="'.$choice.'" size="80" />
						</td>
					</tr>
					';
		}
	}
}

?>
 </table>        
<input type="hidden" name="option" value="com_formmaker" />
<input type="hidden" name="id" value="<?php echo $rows[0]->group_id?>" />        
<input type="hidden" name="form_id" value="<?php echo $rows[0]->form_id?>" />        
<input type="hidden" name="date" value="<?php echo $rows[0]->date?>" />        
<input type="hidden" name="ip" value="<?php echo $rows[0]->ip?>" />        
<input type="hidden" name="task" value="save_submit" />        
</form>
        <?php		
       

}
	   
	   
	   
function forchrome($id){
?>
<script type="text/javascript">


window.onload=val; 

function val()
{
var form = document.adminForm;
	submitform();
}

</script>
<form action="index.php" method="post" name="adminForm">

    <input type="hidden" name="option" value="com_formmaker" />

    <input type="hidden" name="id" value="<?php echo $id;?>" />

    <input type="hidden" name="cid[]" value="<?php echo $id; ?>" />

    <input type="hidden" name="task" value="gotoedit" />
</form>
<?php
}

function editCSS(&$row){
JRequest::setVar( 'hidemainmenu', 1 );
		?>

<script language="javascript" type="text/javascript">
Joomla.submitbutton= function (pressbutton) 
{
	var form = document.adminForm;
	if (pressbutton == 'cancel') 
	{
		submitform( pressbutton );
		return;
	}

	submitform( pressbutton );
}


</script>

<form action="index.php" method="post" name="adminForm">
    <table class="adminform">
        <tr>
            <th>
                <label for="message"> <?php echo JText::_( 'CSS' ); ?> </label>
                <button onclick="document.getElementById('css').value=document.getElementById('def').innerHTML; return false;" style="margin-left:15px;">Restore default CSS</button>
            </th>
        </tr>
        <tr>
            <td >
                <textarea style="margin: 0px;" cols="110" rows="25" name="css" id="css" ><?php
echo $row->css;
?></textarea>
            </td>
        </tr>
    </table>
    <input type="hidden" name="option" value="com_formmaker" />
    <input type="hidden" name="id" value="<?php echo $row->id?>" />
    <input type="hidden" name="cid[]" value="<?php echo $row->id; ?>" />
    <input type="hidden" name="task" value="" />
</form>
<textarea style="visibility:hidden" id="def"><?php echo self::first_css; ?></textarea>

<?php		

       }
	 

function editSubmitText(&$row){

		JRequest::setVar( 'hidemainmenu', 1 );
		$is_editor=false;
		
		$plugin =& JPluginHelper::getPlugin('editors', 'tinymce');
		if (isset($plugin->type))
		{ 
			$editor	=& JFactory::getEditor('tinymce');
			$is_editor=true;
		}
		
		$value="";

		$article =& JTable::getInstance('content');
		if ($value) {
			$article->load($value);
		} else {
			$article->title = JText::_('Select an Article');
		}

		?>

<script language="javascript" type="text/javascript">
Joomla.submitbutton= function (pressbutton) 
{
	var form = document.adminForm;
	if (pressbutton == 'cancel') 
	{
		submitform( pressbutton );
		return;
	}

	submitform( pressbutton );
}

function jSelectArticle(id, title, object) {
			document.getElementById('article_id').value = id;
			document.getElementById(object + '_name').value = title;
			document.getElementById('sbox-window').close();
			}
			
function remove_article()
{
	document.getElementById('id_name').value="Select an Article";
	document.getElementById('article_id').value="";
}
function set_type(type)
{
	switch(type)
	{
		case 'article':
			document.getElementById('article').removeAttribute('style');
			document.getElementById('custom').setAttribute('style','display:none');
			document.getElementById('url').setAttribute('style','display:none');
			document.getElementById('none').setAttribute('style','display:none');
			break;
			
		case 'custom':
			document.getElementById('article').setAttribute('style','display:none');
			document.getElementById('custom').removeAttribute('style');
			document.getElementById('url').setAttribute('style','display:none');
			document.getElementById('none').setAttribute('style','display:none');
			break;
			
		case 'url':
			document.getElementById('article').setAttribute('style','display:none');
			document.getElementById('custom').setAttribute('style','display:none');
			document.getElementById('url').removeAttribute('style');
			document.getElementById('none').setAttribute('style','display:none');
			break;
			
		case 'none':
			document.getElementById('article').setAttribute('style','display:none');
			document.getElementById('custom').setAttribute('style','display:none');
			document.getElementById('url').setAttribute('style','display:none');
			document.getElementById('none').removeAttribute('style');
			break;
	}
}
</script>

<style>
.borderer
{
border-radius:5px;
padding-left:5px;
background-color:#F0F0F0;
height:19px;
width:153px;
}
</style>

<form action="index.php" method="post" name="adminForm">
    <table class="admintable">
        <tr valign="top">
            <td class="key">
                <label for="submissioni text"> <?php echo JText::_( 'Action type' ); ?>: </label>
            </td>
			<td>
			<input type="radio" name="submit_text_type" onclick="set_type('none')"		value="1" <?php if($row->submit_text_type!=2 and $row->submit_text_type!=3 ) echo "checked" ?> /> Stay on form<br/>
			<input type="radio" name="submit_text_type" onclick="set_type('article')"  	value="2" <?php if($row->submit_text_type==2 ) echo "checked" ?> /> Article<br/>
			<input type="radio" name="submit_text_type" onclick="set_type('custom')" 	value="3" <?php if($row->submit_text_type==3 ) echo "checked" ?> /> Custom text<br/>
			<input type="radio" name="submit_text_type" onclick="set_type('url')" 		value="4" <?php if($row->submit_text_type==4 ) echo "checked" ?> /> URL
			</td>
        </tr>
        <tr  id="none" <?php if($row->submit_text_type==2 or $row->submit_text_type==3 or $row->submit_text_type==4 ) echo 'style="display:none"' ?> >
			<td class="key">
                <label for="submissioni text"> <?php echo JText::_( 'Stay on form' ); ?>: </label>
			</td>
			<td >
				<img src="templates/bluestork/images/admin/tick.png" border="0">			
			</td>
       </tr>
       <tr id="article" <?php if($row->submit_text_type!=2) echo 'style="display:none"' ?>   >
			<td class="key">
                <label for="submissioni text"> <?php echo JText::_( 'Article' ); ?>: </label>
			</td>
			<td >
		<?php 

$name="id";
$value=$row->article_id;
$control_name="urlparams";

		$db		=& JFactory::getDBO();
		$doc 		=& JFactory::getDocument();
		$fieldName	= $control_name.'['.$name.']';
		$article =& JTable::getInstance('content');
		if ($value) {
			$article->load($value);
		} else {
			$article->title = JText::_('Select an Article');
		}

		$js = "	function jSelectArticle_".$name."(id, title, object) {
			document.getElementById('article_id').value = id;
			document.getElementById('".$name."_name').value = title;
			SqueezeBox.close();
		}";
		$doc->addScriptDeclaration($js);

		$link = 'index.php?option=com_content&amp;view=articles&amp;layout=modal&amp;tmpl=component&amp;function=jSelectArticle_'.$name;

		JHTML::_('behavior.modal', 'a.modal');
		$html = "\n".'<div style="background-color:white; height:19px"><a class="modal" title="'.JText::_('Select an Article').'"  href="'.$link.'" rel="{handler: \'iframe\', size: {x: 750, y: 500}}"><input style="background:none; width:151px; height:17px; border:none; font-size:11px" type="text" id="'.$name.'_name" value="'.htmlspecialchars($article->title, ENT_QUOTES, 'UTF-8').'"  readonly="readonly" /></a></div>';
		$html .= "\n".'</div><input type="hidden" id="article_id" name="article_id" value="'.(int)$value.'" />';

		echo $html;

?>
			<span onclick="remove_article()" style="color:#000000; cursor:pointer; padding-left:5px;"><i>Remove article</i></span>			
			</td>
        </tr>

		
		
		
        <tr  <?php if($row->submit_text_type!=3 ) echo 'style="display:none"' ?>  id="custom">
           <td class="key">
                <label for="submissioni text"> <?php echo JText::_( 'Text' ); ?>: </label>
           </td>
           <td >
<?php if($is_editor) echo $editor->display('submit_text',$row->submit_text,'50%','350','40','6');
else
{
?>
<textarea name="submit_text" id="submit_text" cols="40" rows="6" style="width: 450px; height: 350px; " class="mce_editable" aria-hidden="true"><?php echo $row->submit_text ?></textarea>
<?php

}
 ?>				</td>
        </tr>
        <tr  <?php if($row->submit_text_type!=4 ) echo 'style="display:none"' ?>  id="url">
           <td class="key">
                <label for="submissioni text"> <?php echo JText::_( 'URL' ); ?>: </label>
           </td>
           <td >
			   <input type="text" id="url" name="url" style="width:300px" value="<?php echo $row->url ?>" />
			</td>
        </tr>
    </table>
    <input type="hidden" name="option" value="com_formmaker" />
    <input type="hidden" name="id" value="<?php echo $row->id?>" />
    <input type="hidden" name="cid[]" value="<?php echo $row->id; ?>" />
    <input type="hidden" name="task" value="" />
</form>

<?php		

       }





	 
function editJavaScript(&$row){

JRequest::setVar( 'hidemainmenu', 1 );

		?>

<script language="javascript" type="text/javascript">

<!--

Joomla.submitbutton= function (pressbutton) 

{

var form = document.adminForm;

if (pressbutton == 'cancel') {

submitform( pressbutton );

return;

}

			

submitform( pressbutton );

}



//-->

</script>

<form action="index.php" method="post" name="adminForm">

    <table class="adminform">

        <tr>

            <th>

                <label for="message"> <?php echo JText::_( 'Javascript' ); ?> </label>

            </th>

        </tr>

        <tr>

            <td >

                <textarea style="margin: 0px;" cols="110" rows="25" name="javascript" id="css" ><?php echo $row->javascript; ?></textarea>

            </td>

        </tr>

    </table>

    <input type="hidden" name="option" value="com_formmaker" />

    <input type="hidden" name="id" value="<?php echo $row->id?>" />

    <input type="hidden" name="cid[]" value="<?php echo $row->id; ?>" />

    <input type="hidden" name="task" value="" />

</form>

<?php		

       }

function editScript(&$row){

JRequest::setVar( 'hidemainmenu', 1 );

$is_editor=false;
		
		$plugin =& JPluginHelper::getPlugin('editors', 'tinymce');
		if (isset($plugin->type))
		{ 
			$editor	=& JFactory::getEditor('tinymce');
			$is_editor=true;
		}
		
		$editor	=& JFactory::getEditor('tinymce');
		?>

<script language="javascript" type="text/javascript">

<!--

Joomla.submitbutton= function (pressbutton) 

{

var form = document.adminForm;

if (pressbutton == 'cancel') {

submitform( pressbutton );

return;

}

			

submitform( pressbutton );

}



//-->

</script>

<form action="index.php" method="post" name="adminForm">

    <table class="adminform">

        <tr>

            <th>

                <label for="message"> <?php echo JText::_( 'Text before Message'); ?> </label>

            </th>

        </tr>

        <tr>

            <td >

<?php if($is_editor) echo $editor->display('script1',$row->script1,'50%','350','40','6');
else
{
?>
<textarea name="script1" id="script1" cols="40" rows="6" style="width: 450px; height: 350px; " class="mce_editable" aria-hidden="true"><?php echo $row->script1 ?></textarea>
<?php

}
 ?>		   		   

            </td>

        </tr>

    </table><br /><hr />
<br />
    <h2 style="text-align:center">MESSAGE</h2><br />
<hr />
<br />

    <table class="adminform">

        <tr>

            <th>

                <label for="message"> <?php echo JText::_( 'Text after Message'); ?> </label>

            </th>

        </tr>

        <tr>

            <td >
<?php if($is_editor) echo $editor->display('script2',$row->script2,'50%','350','40','6');
else
{
?>
<textarea name="script2" id="script2" cols="40" rows="6" style="width: 450px; height: 350px; " class="mce_editable" aria-hidden="true"><?php echo $row->script2 ?></textarea>
<?php

}
 ?>		   		   

            </td>

        </tr>

    </table>

    <input type="hidden" name="option" value="com_formmaker" />

    <input type="hidden" name="id" value="<?php echo $row->id?>" />

    <input type="hidden" name="cid[]" value="<?php echo $row->id; ?>" />

    <input type="hidden" name="task" value="" />

</form>

<?php		
   
}
function editScriptUser(&$row){

JRequest::setVar( 'hidemainmenu', 1 );


		$is_editor=false;
		
		$plugin =& JPluginHelper::getPlugin('editors', 'tinymce');
		if (isset($plugin->type))
		{ 
			$editor	=& JFactory::getEditor('tinymce');
			$is_editor=true;
		}
		
		$editor	=& JFactory::getEditor('tinymce');
		?>

<script language="javascript" type="text/javascript">

<!--

Joomla.submitbutton= function (pressbutton){

var form = document.adminForm;

if (pressbutton == 'cancel') {

submitform( pressbutton );

return;

}

submitform( pressbutton );

}

//-->

</script>

<form action="index.php" method="post" name="adminForm">

    <table class="adminform">

        <tr>

            <th>

                <label for="message"> <?php echo JText::_( 'Text before Message'); ?> </label>

            </th>

        </tr>

        <tr>

            <td >

<?php if($is_editor) echo $editor->display('script_user1',$row->script_user1,'50%','350','40','6');
else
{
?>
<textarea name="script_user1" id="script_user1" cols="40" rows="6" style="width: 450px; height: 350px; " class="mce_editable" aria-hidden="true"><?php echo $row->script_user1 ?></textarea>
<?php

}
 ?>	
 </td>

        </tr>

    </table><br /><hr />
<br />
    <h2 style="text-align:center">MESSAGE</h2><br />
<hr />
<br />

    <table class="adminform">

        <tr>

            <th>

                <label for="message"> <?php echo JText::_( 'Text after Message'); ?> </label>

            </th>

        </tr>

        <tr>

            <td >
<?php if($is_editor) echo $editor->display('script_user2',$row->script_user2,'50%','350','40','6');
else
{
?>
<textarea name="script_user2" id="script_user2" cols="40" rows="6" style="width: 450px; height: 350px; " class="mce_editable" aria-hidden="true"><?php echo $row->script_user2 ?></textarea>
<?php

}
 ?>	

            </td>

        </tr>

    </table>

    <input type="hidden" name="option" value="com_formmaker" />

    <input type="hidden" name="id" value="<?php echo $row->id?>" />

    <input type="hidden" name="cid[]" value="<?php echo $row->id; ?>" />

    <input type="hidden" name="task" value="" />

</form>

<?php		

}

function select_article(&$rows, &$pageNav, &$lists)
{



		JHTML::_('behavior.tooltip');	

	?>

<form action="index.php?option=com_formmaker" method="post" name="adminForm">

    <table width="100%">

        <tr>

            <td align="left" width="100%"> <?php echo JText::_( 'Filter' ); ?>:

                <input type="text" name="search" id="search" value="<?php echo $lists['search'];?>" class="text_area" onchange="document.adminForm.submit();" />

                <button onclick="this.form.submit();"> <?php echo JText::_( 'Go' ); ?></button>

                <button onclick="document.getElementById('search').value='';this.form.submit();"> <?php echo JText::_( 'Reset' ); ?></button>

            </td>

        </tr>

    </table>

    <table class="adminlist" width="100%">

        <thead>

            <tr>

                <th width="4%"><?php echo '#'; ?></th>

                <th width="8%">

                    <input type="checkbox" name="toggle"

 value="" onclick="checkAll(<?php echo count($rows)?>)">

                </th>

                <th width="50%"><?php echo JHTML::_('grid.sort', 'Title', 'title', @$lists['order_Dir'], @$lists['order'] ); ?></th>

                <th width="38%"><?php echo JHTML::_('grid.sort', 'Email to send submissions to', 'mail', @$lists['order_Dir'], @$lists['order'] ); ?></th>

            </tr>

        </thead>

        <tfoot>

            <tr>

                <td colspan="50"> <?php echo $pageNav->getListFooter(); ?> </td>

            </tr>

        </tfoot>

        <?php

	

    $k = 0;

	for($i=0, $n=count($rows); $i < $n ; $i++)

	{

		$row = &$rows[$i];

		$checked 	= JHTML::_('grid.id', $i, $row->id);

		$published 	= JHTML::_('grid.published', $row, $i); 

		// prepare link for id column

		$link 		= JRoute::_( 'index.php?option=com_formmaker&task=edit&cid[]='. $row->id );

		?>

        <tr class="<?php echo "row$k"; ?>">

              <td align="center"><?php echo $row->id?></td>

          <td align="center"><?php echo $checked?></td>

            <td align="center"><a href="<?php echo $link; ?>"><?php echo $row->title?></a></td>

            <td align="center"><?php echo $row->mail?></td>

        </tr>

        <?php

		$k = 1 - $k;

	}

	?>

    </table>

    <input type="hidden" name="option" value="com_formmaker">
    <input type="hidden" name="task" value="forms">
    <input type="hidden" name="boxchecked" value="0">
    <input type="hidden" name="filter_order" value="<?php echo $lists['order']; ?>" />
    <input type="hidden" name="filter_order_Dir" value="" />

</form>

<?php

}







//////////////////////////////glxavor 
}
?>

