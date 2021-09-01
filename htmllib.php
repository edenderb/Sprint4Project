<!--
<label for="category">Category</label><br/>
<select name="category" id="category">
	<option value="3" selected="selected">General</option>
	<option value="4">Computer</option>
</select>
-->
<style>
select{
	width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  height: 50px;
}
</style>
<?php

function html_create_select($the_array, $element_name, $label = '', $init_value = '') {
    $menu = '';
    if ($label != '') $menu .= '
    	<label for="'.$element_name.'">'.$label.'</label><br/>';

    $menu .= '
    	<select name="'.$element_name.'" id="'.$element_name.'">';
			if (empty($_REQUEST[$element_name])) {
				$curr_val = $init_value;
			} else {
				$curr_val = $_REQUEST[$element_name];
			}
			foreach ($the_array as $key => $value) {
				$menu .= '
				<option value="'.$key.'"';
				if ($key == $curr_val) $menu .= ' selected="selected"';
					$menu .= '>'.$value.'</option>';
			}
			$menu .= '
    	</select>';

    return $menu;
}
?>
