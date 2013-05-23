<?php 
  
 /**
 * @package Form Maker Lite
 * @author Web-Dorado
 * @copyright (C) 2011 Web-Dorado. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die('Restricted access'); 
jimport( 'joomla.application.component.model' );
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
class formmakerModelformmaker extends JModel
{	
	function showform()
	{
		$id=JRequest::getVar('id',0);
		$Itemid=JRequest::getVar('Itemid'.$id);
		$db =& JFactory::getDBO();
		$db->setQuery("SELECT * FROM #__formmaker WHERE id=".$db->getEscaped($id) ); 
		$row = $db->loadObject();
		if ($db->getErrorNum())	{echo $db->stderr(); return false;}	
		if(!$row)
			return false;
			
		$db->setQuery("SELECT css FROM #__formmaker_themes WHERE id=".$db->getEscaped($row->theme) ); 
		$form_theme = $db->loadResult();
		if ($db->getErrorNum())	{echo $db->stderr(); return false;}	
		
		$label_id= array();
		$label_type= array();
			
		$label_all	= explode('#****#',$row->label_order);
		$label_all 	= array_slice($label_all,0, count($label_all)-1);   
		
		foreach($label_all as $key => $label_each) 
		{
			$label_id_each=explode('#**id**#',$label_each);
			array_push($label_id, $label_id_each[0]);
			
			$label_order_each=explode('#**label**#', $label_id_each[1]);
			
			array_push($label_type, $label_order_each[1]);
		}
		
		return array($row, $Itemid, $label_id, $label_type, $form_theme);
	}

	function savedata($form)
	{	
		$all_files=array();
		$db =& JFactory::getDBO();
		@session_start();
		$id=JRequest::getVar('id',0);
		$captcha_input=JRequest::getVar("captcha_input");
		$recaptcha_response_field=JRequest::getVar("recaptcha_response_field");
		$counter=JRequest::getVar("counter".$id);
		if(isset($counter))
		{	
			if (isset($captcha_input))
			{				
				$session_wd_captcha_code=isset($_SESSION[$id.'_wd_captcha_code'])?$_SESSION[$id.'_wd_captcha_code']:'-';

				if($captcha_input==$session_wd_captcha_code)
				{
					$all_files=$this->save_db($counter);
					if(is_numeric($all_files))		
						$this->remove($all_files);
					else
						if(isset($counter))
							$this->gen_mail($counter, $all_files);

				}
				else
				{
							echo "<script> alert('".JText::_('WDF_INCORRECT_SEC_CODE')."');
						</script>";
				}
			}	
			
			else
				if(isset($recaptcha_response_field))
				{	
				$privatekey = $form->private_key;
	
					$resp = recaptcha_check_answer ($privatekey,
													$_SERVER["REMOTE_ADDR"],
													$_POST["recaptcha_challenge_field"],
													$recaptcha_response_field);
					if($resp->is_valid)
					{
						$all_files=$this->save_db($counter);
						if(is_numeric($all_files))		
							$this->remove($all_files);
						else
							if(isset($counter))
								$this->gen_mail($counter, $all_files);
	
					}
					else
					{
								echo "<script> alert('".JText::_('WDF_INCORRECT_SEC_CODE')."');
							</script>";
					}
				}	
			
				else	
				{
					$all_files=$this->save_db($counter);
					if(is_numeric($all_files))		
						$this->remove($all_files);
					else
						if(isset($counter))
							$this->gen_mail($counter, $all_files);
		
				}
	

			return $all_files;
		}

		return $all_files;
			
			
	}
	
	function save_db($counter)
	{
		$id=JRequest::getVar('id');
		$chgnac=true;	
		$all_files=array();
		
		JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_formmaker'.DS.'tables');
		$form =& JTable::getInstance('formmaker', 'Table');
		$form->load( $id);
		
		$label_id= array();
		$label_label= array();
		$label_type= array();
			
		$label_all	= explode('#****#',$form->label_order);
		$label_all 	= array_slice($label_all,0, count($label_all)-1);   
		
		foreach($label_all as $key => $label_each) 
		{
			$label_id_each=explode('#**id**#',$label_each);
			array_push($label_id, $label_id_each[0]);
			
			$label_order_each=explode('#**label**#', $label_id_each[1]);
			
			array_push($label_label, $label_order_each[0]);
			array_push($label_type, $label_order_each[1]);
		}
		
		
		
		$db =& JFactory::getDBO();
		$db->setQuery("SELECT MAX( group_id ) FROM #__formmaker_submits" ); 
		$db->query();
		$max = $db->loadResult();
		foreach($label_type as $key => $type)
		{
			$value='';
			if($type=="type_submit_reset" or $type=="type_map" or $type=="type_editor" or  $type=="type_captcha" or  $type=="type_recaptcha" or  $type=="type_button")
				continue;

			$i=$label_id[$key];
			
			if($type!="type_address")
			{
				$deleted=JRequest::getVar($i."_type".$id);
				if(!isset($deleted))
					break;
			}
				
			switch ($type)
			{
				case 'type_text':
				case 'type_password':
				case 'type_textarea':
				case "type_submitter_mail":
				case "type_date":
				case "type_own_select":					
				case "type_country":				
				case "type_number":				
				{
					$value=JRequest::getVar($i."_element".$id);
					break;
				}
				
				case "type_mark_map":				
				{
					$value=JRequest::getVar($i."_long".$id).'***map***'.JRequest::getVar($i."_lat".$id);
					break;
				}
									
				case "type_date_fields":
				{
					$value=JRequest::getVar($i."_day".$id).'-'.JRequest::getVar($i."_month".$id).'-'.JRequest::getVar($i."_year".$id);
					break;
				}
				
				case "type_time":
				{
					$ss=JRequest::getVar($i."_ss".$id);
					if(isset($ss))
						$value=JRequest::getVar($i."_hh".$id).':'.JRequest::getVar($i."_mm".$id).':'.JRequest::getVar($i."_ss".$id);
					else
						$value=JRequest::getVar($i."_hh".$id).':'.JRequest::getVar($i."_mm".$id);
							
					$am_pm=JRequest::getVar($i."_am_pm".$id);
					if(isset($am_pm))
						$value=$value.' '.JRequest::getVar($i."_am_pm".$id);
						
					break;
				}
				
				case "type_phone":
				{
					$value=JRequest::getVar($i."_element_first".$id).' '.JRequest::getVar($i."_element_last".$id);
						
					break;
				}
	
				case "type_name":
				{
					$element_title=JRequest::getVar($i."_element_title".$id);
					if(isset($element_title))
						$value=JRequest::getVar($i."_element_title".$id).' '.JRequest::getVar($i."_element_first".$id).' '.JRequest::getVar($i."_element_last".$id).' '.JRequest::getVar($i."_element_middle".$id);
					else
						$value=JRequest::getVar($i."_element_first".$id).' '.JRequest::getVar($i."_element_last".$id);
						
					break;
				}
	
				case "type_file_upload":
				{
					$file = JRequest::getVar($i.'_file'.$id, null, 'files', 'array');
					if($file['name'])
					{	
						$untilupload = $form->form;
						
						$pos1 = strpos($untilupload, "***destinationskizb".$i."***");
						$pos2 = strpos($untilupload, "***destinationverj".$i."***");
						$destination = substr($untilupload, $pos1+(23+(strlen($i)-1)), $pos2-$pos1-(23+(strlen($i)-1)));
						$pos1 = strpos($untilupload, "***extensionskizb".$i."***");
						$pos2 = strpos($untilupload, "***extensionverj".$i."***");
						$extension = substr($untilupload, $pos1+(21+(strlen($i)-1)), $pos2-$pos1-(21+(strlen($i)-1)));
						$pos1 = strpos($untilupload, "***max_sizeskizb".$i."***");
						$pos2 = strpos($untilupload, "***max_sizeverj".$i."***");
						$max_size = substr($untilupload, $pos1+(20+(strlen($i)-1)), $pos2-$pos1-(20+(strlen($i)-1)));
						
						$fileName = $file['name'];
						/*$destination = JPATH_SITE.DS.JRequest::getVar($i.'_destination');
						$extension = JRequest::getVar($i.'_extension');
						$max_size = JRequest::getVar($i.'_max_size');*/
					
						$fileSize = $file['size'];

						if($fileSize > $max_size*1024)
						{
							echo "<script> alert('".JText::sprintf('WDF_FILE_SIZE_ERROR',$max_size)."');</script>";
							return ($max+1);
						}
						
						$uploadedFileNameParts = explode('.',$fileName);
						$uploadedFileExtension = array_pop($uploadedFileNameParts);
						$to=strlen($fileName)-strlen($uploadedFileExtension)-1;
						
						$fileNameFree= substr($fileName,0, $to);
						$invalidFileExts = explode(',', $extension);
						$extOk = false;

						foreach($invalidFileExts as $key => $value)
						{
						if(  is_numeric(strpos(strtolower($value), strtolower($uploadedFileExtension) )) )
							{
								$extOk = true;
							}
						}
						 
						if ($extOk == false) 
						{
							echo "<script> alert('".JText::_('WDF_FILE_TYPE_ERROR')."');</script>";
							return ($max+1);
						}
						
						$fileTemp = $file['tmp_name'];
						$p=1;
						while(file_exists( $destination.DS.$fileName))
						{
						$to=strlen($file['name'])-strlen($uploadedFileExtension)-1;
						$fileName= substr($fileName,0, $to).'('.$p.').'.$uploadedFileExtension;
						$p++;
						}
						
						if(!JFile::upload($fileTemp, $destination.DS.$fileName)) 
						{	
							echo "<script> alert('".JText::_('WDF_FILE_MOVING_ERROR')."');</script>";
							return ($max+1);
						}

						$value= JURI::root(true).'/'.$destination.'/'.$fileName.'*@@url@@*';
		
						$file['tmp_name']=$destination.DS.$fileName;
						array_push($all_files,$file);

					}
					break;
				}
				
				case 'type_address':
				{
					$value='*#*#*#';
					$element=JRequest::getVar($i."_street1".$id);
					if(isset($element))
					{
						$value=JRequest::getVar($i."_street1".$id);
						break;
					}
					
					$element=JRequest::getVar($i."_street2".$id);
					if(isset($element))
					{
						$value=JRequest::getVar($i."_street2".$id);
						break;
					}
					
					$element=JRequest::getVar($i."_city".$id);
					if(isset($element))
					{
						$value=JRequest::getVar($i."_city".$id);
						break;
					}
					
					$element=JRequest::getVar($i."_state".$id);
					if(isset($element))
					{
						$value=JRequest::getVar($i."_state".$id);
						break;
					}
					
					$element=JRequest::getVar($i."_postal".$id);
					if(isset($element))
					{
						$value=JRequest::getVar($i."_postal".$id);
						break;
					}
					
					$element=JRequest::getVar($i."_country".$id);
					if(isset($element))
					{
						$value=JRequest::getVar($i."_country".$id);
						break;
					}
					
					break;
				}
				
				case "type_hidden":				
				{
					$value=JRequest::getVar($label_label[$key]);
					break;
				}
				
				case "type_radio":				
				{
					$element=JRequest::getVar($i."_other_input".$id);
					if(isset($element))
					{
						$value=$element;	
						break;
					}
					
					$value=JRequest::getVar($i."_element".$id);
					break;
				}
				
				case "type_checkbox":				
				{
					$start=-1;
					$value='';
					for($j=0; $j<100; $j++)
					{
					
						$element=JRequest::getVar($i."_element".$id.$j);
		
						if(isset($element))
						{
							$start=$j;
							break;
						}
					}
						
					$other_element_id=-1;
					$is_other=JRequest::getVar($i."_allow_other".$id);
					if($is_other=="yes")
					{
						$other_element_id=JRequest::getVar($i."_allow_other_num".$id);
					}
					
					if($start!=-1)
					{
						for($j=$start; $j<100; $j++)
						{
							$element=JRequest::getVar($i."_element".$id.$j);
							if(isset($element))
							if($j==$other_element_id)
							{
								$value=$value.JRequest::getVar($i."_other_input".$id).'***br***';
							}
							else
							
								$value=$value.JRequest::getVar($i."_element".$id.$j).'***br***';
						}
					}
					
					break;
				}
				
			}
	
			if($type=="type_address")
				if(	$value=='*#*#*#')
					break;

			$unique_element=JRequest::getVar($i."_unique".$id);
			if($unique_element=='yes')
			{
				$db->setQuery("SELECT id FROM #__formmaker_submits WHERE form_id='".$db->getEscaped($id)."' and element_label='".$db->getEscaped($i)."' and element_value='".$db->getEscaped($value)."'");					
				$unique = $db->loadResult();
				if ($db->getErrorNum()){echo $db->stderr();	return false;}
	
				if ($unique) 
				{
					echo "<script> alert('".JText::sprintf('WDF_UNIQUE', '"'.$label_label[$key].'"')	."');</script>";		
					return ($max+1);
				}
			}

			$ip=$_SERVER['REMOTE_ADDR'];
			
			$db->setQuery("INSERT INTO #__formmaker_submits (form_id, element_label, element_value, group_id, date, ip) VALUES('".$id."', '".$i."', '".addslashes($value)."','".($max+1)."', now(), '".$ip."')" ); 
			$rows = $db->query();
			if ($db->getErrorNum()){echo $db->stderr();	return false;}
			$chgnac=false;
		}

		if($chgnac)
		{		$mainframe = &JFactory::getApplication();
	
				if(count($all_files)==0)
					$mainframe->redirect($_SERVER["REQUEST_URI"], addslashes(JText::_('WDF_EMPTY_SUBMIT')));
		}
		
		return $all_files;
	}
	
	
	
	function gen_mail($counter, $all_files)
	{
		@session_start();
		$mainframe = &JFactory::getApplication();
		$id=JRequest::getVar('id');
		$Itemid=JRequest::getVar('Itemid'.$id);
		JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_formmaker'.DS.'tables');
		$row =& JTable::getInstance('formmaker', 'Table');
		$row->load( $id);
		
			$cc=array();
			$label_order_original= array();
			$label_order_ids= array();
			
			$label_all	= explode('#****#',$row->label_order);
			$label_all 	= array_slice($label_all,0, count($label_all)-1);   
			foreach($label_all as $key => $label_each) 
			{
				$label_id_each=explode('#**id**#',$label_each);
				$label_id=$label_id_each[0];
				array_push($label_order_ids,$label_id);
				
				$label_oder_each=explode('#**label**#', $label_id_each[1]);							
				$label_order_original[$label_id]=$label_oder_each[0];
			}
		
			$list='<table border="1" cellpadding="3" cellspacing="0" style="width:600px;">';
			foreach($label_order_ids as $key => $label_order_id)
			{
				$i=$label_order_id;
				$type=JRequest::getVar($i."_type".$id);
				if(isset($type))
				if($type!="type_map" and  $type!="type_submit_reset" and  $type!="type_editor" and  $type!="type_captcha" and  $type!="type_recaptcha" and  $type!="type_button")
				{	
					$element_label=$label_order_original[$i];
							
					switch ($type)
					{
						case 'type_text':
						case 'type_password':
						case 'type_textarea':
						case "type_date":
						case "type_own_select":					
						case "type_country":				
						case "type_number":	
						{
							$element=JRequest::getVar($i."_element".$id);
							if(isset($element))
							{
								$list=$list.'<tr valign="top"><td >'.$element_label.'</td><td ><pre style="font-family:inherit; margin:0px; padding:0px">'.$element.'</pre></td></tr>';					
							}
							break;
						
						
						}
						
						case "type_hidden":				
						{
							$element=JRequest::getVar($element_label);
							if(isset($element))
							{
								$list=$list.'<tr valign="top"><td >'.$element_label.'</td><td ><pre style="font-family:inherit; margin:0px; padding:0px">'.$element.'</pre></td></tr>';					
							}
							break;
						}
						
						
						case "type_mark_map":
						{
							$element=JRequest::getVar($i."_long".$id);
							if(isset($element))
							{
								$list=$list.'<tr valign="top"><td >'.$element_label.'</td><td >Longitude:'.JRequest::getVar($i."_long".$id).'<br/>Latitude:'.JRequest::getVar($i."_lat".$id).'</td></tr>';
							}
							break;		
						}
											
						case "type_submitter_mail":
						{
							$element=JRequest::getVar($i."_element".$id);
							if(isset($element))
							{
								$list=$list.'<tr valign="top"><td >'.$element_label.'</td><td ><pre style="font-family:inherit; margin:0px; padding:0px">'.$element.'</pre></td></tr>';					
								if(JRequest::getVar($i."_send".$id)=="yes")
									array_push($cc, $element);
							}
							break;		
						}
						
						case "type_time":
						{
							
							$hh=JRequest::getVar($i."_hh".$id);
							if(isset($hh))
							{
								$ss=JRequest::getVar($i."_ss".$id);
								if(isset($ss))
									$list=$list.'<tr valign="top"><td >'.$element_label.'</td><td >'.JRequest::getVar($i."_hh".$id).':'.JRequest::getVar($i."_mm".$id).':'.JRequest::getVar($i."_ss".$id);
								else
									$list=$list.'<tr valign="top"><td >'.$element_label.'</td><td >'.JRequest::getVar($i."_hh".$id).':'.JRequest::getVar($i."_mm".$id);
								$am_pm=JRequest::getVar($i."_am_pm".$id);
								if(isset($am_pm))
									$list=$list.' '.JRequest::getVar($i."_am_pm".$id).'</td></tr>';
								else
									$list=$list.'</td></tr>';
							}
								
							break;
						}
						
						case "type_phone":
						{
							$element_first=JRequest::getVar($i."_element_first".$id);
							if(isset($element_first))
							{
									$list=$list.'<tr valign="top"><td >'.$element_label.'</td><td >'.JRequest::getVar($i."_element_first".$id).' '.JRequest::getVar($i."_element_last".$id).'</td></tr>';
							}	
							break;
						}
						
						case "type_name":
						{
							$element_first=JRequest::getVar($i."_element_first".$id);
							if(isset($element_first))
							{
								$element_title=JRequest::getVar($i."_element_title".$id);
								if(isset($element_title))
									$list=$list.'<tr valign="top"><td >'.$element_label.'</td><td >'.JRequest::getVar($i."_element_title".$id).' '.JRequest::getVar($i."_element_first".$id).' '.JRequest::getVar($i."_element_last".$id).' '.JRequest::getVar($i."_element_middle".$id).'</td></tr>';
								else
									$list=$list.'<tr valign="top"><td >'.$element_label.'</td><td >'.JRequest::getVar($i."_element_first".$id).' '.JRequest::getVar($i."_element_last".$id).'</td></tr>';
							}	   
							break;		
						}
						
						case "type_address":
						{
							$street1=JRequest::getVar($i."_street1".$id);
							if(isset($street1))
							{
								$list=$list.'<tr valign="top"><td >'.$label_order_original[$i].'</td><td >'.JRequest::getVar($i."_street1".$id).'</td></tr>';
								$i++;
								$list=$list.'<tr valign="top"><td >'.$label_order_original[$i].'</td><td >'.JRequest::getVar($i."_street2".$id).'</td></tr>';
								$i++;
								$list=$list.'<tr valign="top"><td >'.$label_order_original[$i].'</td><td >'.JRequest::getVar($i."_city".$id).'</td></tr>';
								$i++;
								$list=$list.'<tr valign="top"><td >'.$label_order_original[$i].'</td><td >'.JRequest::getVar($i."_state".$id).'</td></tr>';
								$i++;
								$list=$list.'<tr valign="top"><td >'.$label_order_original[$i].'</td><td >'.JRequest::getVar($i."_postal".$id).'</td></tr>';
								$i++;
								$list=$list.'<tr valign="top"><td >'.$label_order_original[$i].'</td><td >'.JRequest::getVar($i."_country".$id).'</td></tr>';
								$i++;			
							}		
							break;
						}
						
						case "type_date_fields":
						{
							$day=JRequest::getVar($i."_day".$id);
							if(isset($day))
							{
								$list=$list.'<tr valign="top"><td >'.$element_label.'</td><td >'.JRequest::getVar($i."_day".$id).'-'.JRequest::getVar($i."_month".$id).'-'.JRequest::getVar($i."_year".$id).'</td></tr>';
							}
							break;
						}
						
						case "type_radio":
						{
							$element=JRequest::getVar($i."_other_input".$id);
							if(isset($element))
							{
								$list=$list.'<tr valign="top"><td >'.$element_label.'</td><td >'.JRequest::getVar($i."_other_input".$id).'</td></tr>';
								break;
							}	
							
							$element=JRequest::getVar($i."_element".$id);
							if(isset($element))
							{
								$list=$list.'<tr valign="top"><td >'.$element_label.'</td><td ><pre style="font-family:inherit; margin:0px; padding:0px">'.$element.'</pre></td></tr>';					
							}
							break;	
						}
						
						case "type_checkbox":
						{
							$list=$list.'<tr valign="top"><td >'.$element_label.'</td><td >';
						
							$start=-1;
							for($j=0; $j<100; $j++)
							{
								$element=JRequest::getVar($i."_element".$id.$j);
								if(isset($element))
								{
									$start=$j;
									break;
								}
							}	
							
							$other_element_id=-1;
							$is_other=JRequest::getVar($i."_allow_other".$id);
							if($is_other=="yes")
							{
								$other_element_id=JRequest::getVar($i."_allow_other_num".$id);
							}
							
					
							if($start!=-1)
							{
								for($j=$start; $j<100; $j++)
								{
									
									$element=JRequest::getVar($i."_element".$id.$j);
									if(isset($element))
									if($j==$other_element_id)
									{
										$list=$list.JRequest::getVar($i."_other_input".$id).'<br>';
									}
									else
									
										$list=$list.JRequest::getVar($i."_element".$id.$j).'<br>';
								}
								$list=$list.'</td></tr>';
							}
										
							
							break;
						}
						default: break;
					}
				}
					
						
					
				
				
			}
			
			$list=$list.'</table>';
			$list = wordwrap($list, 70, "\n", true);

							$config =& JFactory::getConfig();
							$site_mailfrom=$config->getValue( 'config.mailfrom' )	;						
							$site_fromname=$config->getValue( 'config.fromname' )		;					
							for($k=0;$k<count($all_files);$k++)
								$attachment[]=array($all_files[$k]['tmp_name'], $all_files[$k]['name'], $all_files[$k]['name'] );
							
							if(isset($cc[0]))
							{
								foreach	($cc as $c)	
								{	
									if($c)
									{
										 $from      = $site_mailfrom;
										 $fromname  = $site_fromname; 
										 $recipient = $c;
										 $subject   = $row->title;
										 $body      = $row->script_user1.'<br>'.$list.'<br>'.$row->script_user2;
										 $mode      = 1; 
									$send=$this->sendMail($from, $fromname, $recipient, $subject, $body, $mode, $cca, $bcc, $attachment, $replyto, $replytoname);  
									}	
									
									
									if($row->mail)
									{

										if($c)
										{
											 $from      = $c;
											 $fromname  = $c; 
										}
										else
										{
											 $from      = $site_mailfrom;
											 $fromname  = $site_fromname; 
										}
											 $recipient = $row->mail;
											 $subject   = $row->title;
											 $body      = $row->script1.'<br>'.$list.'<br>'.$row->script2;
											 $mode      = 1; 

										$send=$this->sendMail($from, $fromname, $recipient, $subject, $body, $mode, $cca, $bcc, $attachment, $replyto, $replytoname);  
									}
								}
							}
							else 
							{ 
								if($row->mail)
								{

								 $from      = $site_mailfrom;
								 $fromname  = $site_fromname; 
								 $recipient = $row->mail;
								 $subject     = $row->title;
								 $body      = $row->script1.'<br>'.$list.'<br>'.$row->script2;
								 $mode        = 1; 
            
								 $send=$this->sendMail($from, $fromname, $recipient, $subject, $body, $mode, $cca, $bcc, $attachment, $replyto, $replytoname); 
								} 
							}
									
		if($row->mail)
			{
				if ( $send !== true ) 
					$msg=JText::_('WDF_MAIL_SEND_ERROR');
				else 
					$msg=JText::_('WDF_MAIL_SENT');
			}
		else	
			$msg=JText::_('WDF_SUBMITTED');
									
		switch($row->submit_text_type)
		{
					case "2":
					{
						$mainframe->redirect("index.php?option=com_content&view=article&id=".$row->article_id."&Itemid=".$Itemid, $msg);
						break;
					}
					case "3":
					{
						$_SESSION['show_submit_text'.$id]=1;
						$mainframe->redirect($_SERVER["REQUEST_URI"], $msg);
						break;
					}											
					case "4":
					{
						$mainframe->redirect($row->url, $msg);
						break;
					}
					default:
					{
						$mainframe->redirect($_SERVER["REQUEST_URI"], $msg);
						break;
					}
		}														
	}
	
	function sendMail(&$from, &$fromname, &$recipient, &$subject, &$body, &$mode=0, &$cc=null, &$bcc=null, &$attachment=null, &$replyto=null, &$replytoname=null)
    {
 				$recipient=explode (',', str_replace(' ', '', $recipient ));
                // Get a JMail instance
                $mail = &JFactory::getMailer();
 
                $mail->setSender(array($from, $fromname));
                $mail->setSubject($subject);
                $mail->setBody($body);
 
                // Are we sending the email as HTML?
                if ($mode) {
                        $mail->IsHTML(true);
                }
 
                $mail->addRecipient($recipient);
                $mail->addCC($cc);
                $mail->addBCC($bcc);
				
				if($attachment)
					foreach($attachment as $attachment_temp)
					{
						$mail->AddEmbeddedImage($attachment_temp[0], $attachment_temp[1], $attachment_temp[2]);
					}
 
                // Take care of reply email addresses
                if (is_array($replyto)) {
                        $numReplyTo = count($replyto);
                        for ($i=0; $i < $numReplyTo; $i++){
                                $mail->addReplyTo(array($replyto[$i], $replytoname[$i]));
                        }
                } elseif (isset($replyto)) {
                        $mail->addReplyTo(array($replyto, $replytoname));
                }
 
                return  $mail->Send();
        }
	
	
	
	function remove($group_id)
	{

		$db =& JFactory::getDBO();
		$db->setQuery('DELETE FROM #__formmaker_submits WHERE group_id="'.$db->getEscaped($group_id).'"');
		$db->query();
	}
	
}
	
	?>
