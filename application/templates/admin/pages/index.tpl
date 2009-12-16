{extends template="admin/main.tpl"}

    {container name="css"}{/container}
    {container name="js"}{/container}

    {container name="left"}{/container}

    {container name="content"}
        <table>
            <tr>
                <td>id</td>
                <td>Title</td>
                <td>In menu</td>
                <td>Directory</td>
                <td>Controller</td>
                <td>Action</td>
                <td>Allowed for</td>
            </tr>
            {if $aPages}
                {foreach from=$aPages item=page}
                <tr>
                    <td>{$page->id}</td>
                    <td>{$page->title}</td>
                    <td>{$page->menu}</td>
                    <td>{$page->directory}</td>
                    <td>{$page->controller}</td>
                    <td>{$page->action}</td>
                    <td>{$page->role_allowed}</td>
                </tr>
                {/foreach}
            {/if}
        </table>
    {/container}

    {container name="footer"}{/container}
{/extends}