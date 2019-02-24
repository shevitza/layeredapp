<?php
namespace core;

/**
 * Description of Application
 *
 * @author Evgenia
 */
class Application
{
   const VIEWS_FOLDER = 'views';

    public function load_view($templateName, $data = null)
    {
		extract($data, EXTR_PREFIX_SAME, "wddx");
        include self::VIEWS_FOLDER
            . '/'
            . $templateName
            . '.php';
		
    }
}
