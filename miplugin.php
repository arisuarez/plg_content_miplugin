<?php
/**
 * Mi Plugin - Formación Joomla
 *
 */
defined('JPATH_BASE') or die;

/**
 * Smart Search adapter for Joomla Menus.
 *
 * @since  2.5
 */
class PlgContentMiPlugin extends JPlugin
{
	/**
	 * Load the language file on instantiation.
	 *
	 * @var    boolean
	 * @since  3.1
	 */
	protected $autoloadLanguage = true;

	/**
	 * Plugin that cloaks all emails in content from spambots via Javascript.
	 *
	 * @param   string   $context  The context of the content being passed to the plugin.
	 * @param   mixed    &$row     An object with a "text" property.
	 * @param   mixed    &$params  Additional parameters.
	 * @param   integer  $page     Optional page number.
	 *
	 * @return  boolean	True on success.
	 */
	public function onContentPrepare($context, &$row, &$params, $page = 0)
	{
		// Don't run this plugin when the content is being indexed
		if ($context == 'com_finder.indexer')
		{
			return true;
		}

		$search = 'vehicula';
		$replace = "<a href=\"#\" title=\"Vehículos\">{$search}</a>";

		if (is_object($row))
		{
			$row->text = str_replace($search, $replace, $row->text);
			$row->text .= '<hr><h4>Mi Plugin - Formación Joomla <small>agregado desde plugin</small></h4>';
			return $row->text;
		}
		$row = str_replace($search, $replace, $row);
		$row .= '<hr><h4>Mi Plugin - Formación Joomla <small>agregado desde plugin.</small></h4>';
		return $row;
	}
}
