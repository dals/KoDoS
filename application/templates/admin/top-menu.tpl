<ul class="nav main">
    {if $aTopNavigation}
        {foreach from=$aTopNavigation item=oPage}
            {if $oPage->menu|strlen}
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
            {/if}
        {/foreach}
            <li class="secondary">
                <a href="/staff/">Go to staff</a>
            </li>
    {/if}

</ul>