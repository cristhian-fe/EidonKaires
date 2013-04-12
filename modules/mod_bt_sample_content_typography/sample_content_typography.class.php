<?php 
/*--------------------------------------------------------
# BT Sample Content Typography - Joomla! Module
# -------------------------------------------------------
# For Joomla! 2.5.x
# Copyright (C) 2012 Bonusthemes.com. All Rights Reserved.
# @license Copyrighted Commercial Software
# Website: http://www.bonusthemes.com/
# Support: support@bonusthemes.com
------------------------------------------------------- */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class SampleContentTypography {
	
	var $params = '';
	
	function __construct(&$params)
	{
		$this->params = $this->bt_params($params);
	}
	
	function bt_params($params)
	{
		 // types
		for ($i = 1; $i<=10; $i++) 
		{
			$this->{'type_bt'.$i} = $params->get('type_bt'.$i, '');
			$this->{'image_bt'.$i} = $params->get('image_bt'.$i, '');
			$this->{'image_float_bt'.$i} = $params->get('image_float_bt'.$i, '');
			$this->{'count_bt'.$i} = $params->get('count_bt'.$i, '1');
			$this->{'count_of_chars_bt'.$i} = $params->get('count_of_chars_bt'.$i, '150');
			$this->{'count_of_bullets_bt'.$i} = $params->get('count_of_bullets_bt'.$i, '3');
			$this->{'css_class_bt'.$i} = $params->get('css_class_bt'.$i, '');
			$this->{'rows_bt'.$i} = $params->get('rows_bt'.$i, '');
			$this->{'cols_bt'.$i} = $params->get('cols_bt'.$i, '');
			$this->{'readmore_bt'.$i} = $params->get('readmore_bt'.$i, '');
			$this->{'suffix_info_bt'.$i} = $params->get('suffix_info_bt'.$i, '');
			$this->{'textarea_bt'.$i} = $params->get('textarea_bt'.$i, '');
		}
	}	
	
	function displayData()
	{
		
		$html = '';
			
			for ($j = 1; $j<=10; $j++) { // types

				for ($i = 1; $i<=$this->{'count_bt'.$j}; $i++) { // count

					switch ($this->{'type_bt'.$j}) {
						case 'h1':
							$html .= $this->headings('h1');
							break;
						case 'h2':
							$html .= $this->headings('h2');
							break;
						case 'h3':
							$html .= $this->headings('h3');
							break;
						case 'h4':
							$html .= $this->headings('h4');
							break;
						case 'h5':
							$html .= $this->headings('h5');
							break;
						case 'h6':
							$html .= $this->headings('h6');
							break;
						case 'ol':
							$html .= $this->lists('ol', $j);
							break;
						case 'ul':
							$html .= $this->lists('ul', $j);
							break;
						case 'image':
							$html .= $this->image($j);
							break;
						case 'paragraph':
							$html .= '<p>'.$this->paragraph($j).'</p>';
							break;
						case 'custom':
							$html .= $this->{'textarea_bt'.$j};
							break;
						case 'label':
							$html .= $this->form($j);
							break;
						case 'input_text':
							$html .= $this->form($j);
							break;
						case 'input_pass':
							$html .= $this->form($j);
							break;
						case 'checkbox':
							$html .= $this->form($j);
							break;
						case 'radio':
							$html .= $this->form($j);
							break;
						case 'textarea':
							$html .= $this->form($j);
							break;
						case 'submit':
							$html .= $this->form($j);
							break;
						case 'button':
							$html .= $this->form($j);
							break;
						case 'reset':
							$html .= $this->form($j);
							break;
						case 'blocknumber':
							$html .= $this->blocknumber($j);
							break;	
						case 'code':
							$html .= $this->code($j);
							break;
						case 'suffix':
							$html .= $this->suffix($j);
							break;	
						default:
							$html .= '';
					}
					
				}
				
			}
					
		return $html;
		
	}
	
	function paragraph($j = '1')
	{
		$paragraph_text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit eu lorem convallis pretium sit amet condimentum urna. Quisque vel nibh id nisi rutrum ullamcorper ut vel dolor. Fusce at nisi sed ante imperdiet cursus sed at nibh. Donec fringilla risus bibendum libero iaculis quis sagittis elit volutpat. Etiam sed magna et metus rhoncus tristique vitae sed nunc. Proin magna sem, ultrices ut faucibus at, blandit nec turpis. Proin viverra aliquet felis scelerisque commodo. Nulla facilisi. Nullam id ligula eu erat condimentum ullamcorper sit amet nec metus. Quisque et leo urna. Suspendisse potenti. Maecenas a ipsum venenatis nisi rutrum pellentesque a a metus. Duis cursus, enim in faucibus gravida, massa nisi egestas lectus, eu tincidunt magna felis pharetra mauris. Nam rhoncus tortor ac erat cursus nec tempor felis consequat. Phasellus dignissim bibendum enim at euismod.";
		
		$paragraph_text_count_chars = strlen($paragraph_text);
		
		$readmore = ($paragraph_text_count_chars >= $this->{"count_of_chars_bt".$j}) ? '... <a href="">Read more</a>' : '';
		
		$html = JString::substr($paragraph_text, 0, $this->{"count_of_chars_bt".$j}) . $readmore;

		return $html;
	}

	function headings($heading = 'h1')
	{
		$html = '<'.$heading .'>'.$heading .' This is a Sample Heading</'.$heading .'>';

		return $html;
	}
	
	function lists($list = 'ul', $j = '1')
	{
		$ul_class = ($list == 'ul' && $this->{'css_class_bt'.$j} != '') ? ' class="'.$this->{'css_class_bt'.$j}.'"' : '';
		$html = '<'.$list.$ul_class.'>';

		for ($i=1; $i<=$this->{'count_of_bullets_bt'.$j}; $i++) {
			$html .= '<li>Duis at dui neque, vitae dictum sem.</li>';
		}
			
		$html .= '</'.$list .'>';

		return $html;
	}
	
	function image($j = '1')
	{
		$image_float_left = ($this->{'image_float_bt'.$j} == 'left') ? 'style="float: '.$this->{"image_float_bt".$j}.'; margin: 0 10px 10px 0;"' : "";
		$image_float_right = ($this->{'image_float_bt'.$j} == 'right') ? 'style="float: '.$this->{"image_float_bt".$j}.'; margin: 0 0 10px 10px;"' : "";
		
		if ($this->{'image_float_bt'.$j} == 'center') {
			$html = '<div align="center"><img alt="image" src="modules/mod_bt_sample_content_typography/images/'.$this->{'image_bt'.$j}.'" '.$image_float_left.$image_float_right.' /></div>';
		}else{
			$html = '<img alt="image" src="modules/mod_bt_sample_content_typography/images/'.$this->{'image_bt'.$j}.'" '.$image_float_left.$image_float_right.' />';
		}
		
		return $html;
	}
	
	function form($j = '1')
	{
		$html = '';
		
		switch ($this->{'type_bt'.$j}) {
			
			case 'label':
				$label_value = ($this->{'textarea_bt'.$j} == '') ? 'Label' : $this->{'textarea_bt'.$j};
				$html .= '<p><label>'.$label_value.'</label></p>';
				break;
			case 'input_text':
				$input_text_value = ($this->{'textarea_bt'.$j} == '') ? 'Enter your name...' : $this->{'textarea_bt'.$j};
				$html .= '<p><input type="text" name="user" id="user" value="'.$input_text_value.'" /></p>';
				break;
			case 'input_pass':
				$password_value = ($this->{'textarea_bt'.$j} == '') ? 'Enter your password...' : $this->{'textarea_bt'.$j};
				$html .= '<p><input type="password" name="pwd" value="'.$password_value.'" /></p>';
				break;
			case 'checkbox':
				$checkbox_value = ($this->{'textarea_bt'.$j} == '') ? 'Checkbox' : $this->{'textarea_bt'.$j};
				$html .= '<p><input type="checkbox" name="vehicle" value="Bike" /> '.$checkbox_value.'</p>';
				break;
			case 'radio':
				$radio_value = ($this->{'textarea_bt'.$j} == '') ? 'Yes' : $this->{'textarea_bt'.$j};
				$html .= '<p><input type="radio" name="yes" value="'.$radio_value.'" /> Yes</p>';
				break;
			case 'textarea':
				$textarea_value = ($this->{'textarea_bt'.$j} == '') ? 'Enter your text here...' : $this->{'textarea_bt'.$j};
				$html .= '<p><textarea rows="5">'.$textarea_value.'</textarea></p>';
				break;
			case 'submit':
				$submit_value = ($this->{'textarea_bt'.$j} == '') ? 'Submit!' : $this->{'textarea_bt'.$j};
				$html .= '<p><input type="submit" value="'.$submit_value.'" /></p>';
				break;
			case 'button':
				$button_value = ($this->{'textarea_bt'.$j} == '') ? 'Button!' : $this->{'textarea_bt'.$j};
				$html .= '<p><button type="button">'.$button_value.'</button></p>';
				break;
			case 'reset':
				$reset_value = ($this->{'textarea_bt'.$j} == '') ? 'Reset!' : $this->{'textarea_bt'.$j};
				$html .= '<p><input type="reset" value="'.$reset_value.'"></p>';
				break;
			default:
				$html .= '';

		}
		
		return $html;
	}
	
	function blocknumber($j = '1')
	{
		$html = '<p class="'.$this->{'css_class_bt'.$j}.'">'.$this->paragraph($j).'</p>';

		return $html;
	}
	
	function code($j = '1')
	{
		$html = '<div class="'.$this->{'css_class_bt'.$j}.'">
		
		<p>
		div.dropcap4 span {<br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;float: left; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;font-size: 4em; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;font-weight: bold; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;color: #0094D4; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;padding: 0 15px 5px 0; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;margin: 0;<br />
		}
		</p>
		
		<p>
		div.dropcap4 span {<br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;float: left; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;font-size: 4em; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;font-weight: bold; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;color: #0094D4; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;padding: 0 15px 5px 0; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;margin: 0;<br />
		}
		</p>

		</div>';

		return $html;
	}

	function special($j = '1')
	{
		$html = '<div class="'.$this->{'css_class_bt'.$j}.'">
		
		<p>
		div.dropcap4 span {<br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;float: left; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;font-size: 4em; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;font-weight: bold; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;color: #0094D4; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;padding: 0 15px 5px 0; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;margin: 0;<br />
		}
		</p>
		
		<p>
		div.dropcap4 span {<br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;float: left; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;font-size: 4em; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;font-weight: bold; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;color: #0094D4; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;padding: 0 15px 5px 0; <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;margin: 0;<br />
		}
		</p>

		</div>';

		return $html;
	}
	
	function suffix($j = '1')
	{
		$html = '<ul><li>To make a module look like this, set its module suffix to "<strong>'.$this->{'suffix_info_bt'.$j}.'</strong>".</li></ul>';

		return $html;
	}
		
} // end class