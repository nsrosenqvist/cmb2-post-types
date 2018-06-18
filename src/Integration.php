<?php namespace NSRosenqvist\CMB2\PostTypesField;

class Integration
{
	static $init = false;

	static function init()
	{
		if (self::$init) {
			return;
		}

		$init = true;

		// Renderer callback
		add_action('cmb2_render_multicheck_post_type', function($field, $escaped_value, $object_id, $object_type, $field_type_object) {
			$i = 1;
			$options = '';
			$values = (array) $escaped_value;

			foreach (get_post_types(['public' => true], 'names', 'and') as $type) {
				$info = get_post_type_object($type);
				$args = [
				    'value' => $type,
				    'label' => $info->label,
				    'type' => 'checkbox',
				    'name' => $field->args['_name'].'[]',
				];

				if (in_array($type, $values)) {
					$args['checked'] = 'checked';
				}

				$options .= $field_type_object->list_input($args, $i);
				$i++;
			}

			$classes = (! $field->args('select_all_button'))
				? 'cmb2-checkbox-list no-select-all cmb2-list'
				: 'cmb2-checkbox-list cmb2-list';

			echo $field_type_object->radio([
				'class' => $classes,
				'options' => $options,
			], 'multicheck_post_type');
		}, 10, 5);
    }
}
