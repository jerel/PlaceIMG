<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * PlaceImg Plugin
 *
 * A plugin for displaying filler images
 *
 * @author		Jerel Unruh
 * @package		PyroCMS\Addon\Plugins
 * @copyright	Copyright (c) 2013
 * @license		MIT
 */
class Plugin_Place extends Plugin
{
	public $version = '1.0.0';

	public $name = array(
		'en'	=> 'Place Image'
	);

	public $description = array(
		'en'	=> 'Display images of a specified size in your site.'
	);

	/**
	 * Returns a PluginDoc array that PyroCMS uses 
	 * to build the reference in the admin panel
	 *
	 * @return array
	 */
	public function _self_doc()
	{
		$info = array(
			'img' => array(
				'description' => array(
					'en' => 'Output an image for pleasing filler content.'
				),
				'single' => true,
				'double' => false,
				'variables' => '',
				'attributes' => array(
					'width' => array(
						'type' => 'number',
						'flags' => '',
						'default' => '640',
						'required' => false,
					),
					'height' => array(
						'type' => 'number',
						'flags' => '',
						'default' => '480',
						'required' => false,
					),
					'filter' => array(
						'type' => 'flag',
						'flags' => 'grayscale|sepia',
						'default' => '',
						'required' => false,
					),
					'category' => array(
						'type' => 'flag',
						'flags' => 'animals|arch|nature|people|tech',
						'default' => 'any',
						'required' => false,
					),
					'title' => array(
						'type' => 'text',
						'flags' => '',
						'default' => '',
						'required' => false,
					),
					'alt' => array(
						'type' => 'text',
						'flags' => '',
						'default' => '',
						'required' => false,
					),
				),
			),
		);
	
		return $info;
	}

	/**
	 * Image
	 *
	 * Usage:
	 * {{ place:img category="nature" alt="nature scenes" }}
	 *
	 * @return string
	 */
	function img()
	{
		// set up the basic url which we will always have
		$url = array(
			$this->attribute('width', 640),
			$this->attribute('height', 480),
			$this->attribute('category', 'any'),
		);

		// see if they want to apply a filter
		if ($filter = $this->attribute('filter'))
		{
			$url[] = $filter;
		}

		// let them pass any attribute in (such as style="foo")
		$attr = $this->attributes();
		unset(
			$attr['tag'],
			$attr['width'], 
			$attr['height'], 
			$attr['category'], 
			$attr['filter'], 
			$attr['parse_params']
		);

		$protocol = (IS_SECURE ? 'https' : 'http');
		
		return img($protocol.'://placeimg.com/'.implode('/', $url), false, $attr);
	}
}

/* End of file place.php */