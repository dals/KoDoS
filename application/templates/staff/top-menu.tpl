<ul class="nav main">
    {if $aTopNavigation}
        {foreach from=$aTopNavigation item=oPage}
            {if $oPage->directory}
                {assign var=mDir value='/'|cat:$oPage->directory}
                {else}
                {assign var=mDir value=''}
            {/if}
            {assign var=mPath value=$mDir|cat:'/'|cat:($oPage->controller|default:'index')}
            {if $mPath == "/"|cat:Request::instance()->uri}
                {assign var=classCurrent value='class="current"'}
                {else}
                {assign var=classCurrent value=''}
            {/if}
            <li {$classCurrent}>
                <a href="{$mPath}">{$oPage->menu}</a>
            </li>
        {/foreach}
            <li class="secondary">
                <a href="/admin/">Go to Administration</a>
            </li>
    {/if}

</ul>