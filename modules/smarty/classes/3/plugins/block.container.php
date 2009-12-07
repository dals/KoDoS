<?php
/**
 * Создаёт именованные блоки в тексте шаблона
 *
 * @param  array   $params   Список параметров, указанных в вызове блока
 * @param  string  $content  Текст между тегами {extends}..{/extends}
 * @param  mySmarty  $smarty   Ссылка на объект Smarty
 */

function smarty_block_container($params, $content, Smarty3 $smarty)
{
    if (array_key_exists('name', $params) === false) {
        $smarty->trigger_error('Не указано имя блока');
    }

    $name = $params['name'];

    if ($content) {
        $smarty->setBlock($name, $content);
    }

    return $smarty->getBlock($name);
}