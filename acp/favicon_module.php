<?php
/**
*
* @package favicon
* @copyright (c) 2014 Татьяна5
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace tatiana5\favicon\acp;

use tatiana5\favicon\functions\acp_module_helper;

class favicon_module extends acp_module_helper
{
	public function main($id, $mode)
	{
		$this->ext_name ='tatiana5/favicon';
		$this->tpl_name = 'acp_favicon';
		$this->form_key = 'config_favicon';
		add_form_key($this->form_key);

		parent::main($id, $mode);
	}

	/**
	 * Generates the array of display_vars
	 */
	protected function generate_display_vars()
	{
		$this->display_vars = array(
			//'lang'  => array('acp/board', 'acp/forums'),
			'title' => 'ACP_FAVICON',
			'vars'  => array(
				'legend1'			=> '',
				'favicon_ext'		=> ['lang' => 'ACP_FAVICON_EXT', 'validate' => 'string', 'type' => 'select', 'method' => 'favicon_select', 'explain' => true],
				'favicon_apple'		=> ['lang' => 'ACP_FAVICON_APPLE', 'validate' => 'bool', 'type' => 'radio:yes_no', 'method' => false, 'explain' => true],
				'favicon_bubble'	=> ['lang' => 'ACP_FAVICON_BUBBLE', 'validate' => 'bool', 'type' => 'radio:yes_no', 'method' => false, 'explain' => false],

				'legend2'			=> 'ACP_SUBMIT_CHANGES',
			),
		);
	}

	function favicon_select()
	{
		global $config, $user, $phpbb_root_path;

		$fav_flag = true;
		$favicon_options = '';
		if (file_exists($phpbb_root_path . 'ext/tatiana5/favicon/favicon.ico'))
		{
			$selected = ($config['favicon_ext'] == 'ico') ? ' selected="selected"' : '';
			$favicon_options .= '<option value="ico"' . $selected . '>ico</option>';
			$fav_flag = false;
		}
		if (file_exists($phpbb_root_path . 'ext/tatiana5/favicon/favicon.png'))
		{
			$selected = ($config['favicon_ext'] == 'png') ? ' selected="selected"' : '';
			$favicon_options .= '<option value="png"' . $selected . '>png</option>';
			$fav_flag = false;
		}

		if ($fav_flag)
		{
			$favicon_options .= '<option val="">' . $user->lang['ACP_FAVICON_NOT_FOUND'] . '</option>';
		}

		return $favicon_options;
	}
}
