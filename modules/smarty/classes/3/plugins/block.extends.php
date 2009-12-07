<?php
/**
 * Блок, наследующий шаблон
 *
 * @param  array   $params   Список параметров, указанных в вызове блока
 * @param  string  $content  Текст между тегами {extends}..{/extends}
 * @param  mySmarty  $smarty   Ссылка на объект Smarty
 */

function smarty_block_extends($params, $content, Smarty3 $smarty)
{
    /** No one should trust. Even myself! */
    if (false === array_key_exists('template', $params)) {
        $smarty->trigger_error('Give the template from which extended!');
    }

    if (!is_null($content)) {
        $caching = $smarty->caching;
        if ($caching) {
            $smarty->caching = false;
        }

        $content = $smarty->fetch(APPPATH.'templates/'.$params['template']);
        if ($caching) {
            $smarty->caching = true;
        }

        return $content;

    }
    return false;
}