{extends template="admin/main-2col.tpl"}

    {container name="css"}{/container}
    {container name="js"}{/container}

    {container name="left"}
    <div class="grid_3">
        <div class="box menu">
            <h2>
                <a href="#" id="toggle-section-menu">Available actions</a>
            </h2>
            <div class="block" id="section-menu">
                <ul class="section menu">
                    <li>
                        <a href="/admin/pages" class="active">List</a>
                    </li>
                    <li>
                        <a href="/admin/pages/create">Create</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    {/container}

    {container name="content"}
    <div class="grid_13">
                    <div class="box">
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>In menu</th>
                <th>Directory</th>
                <th>Controller</th>
                <th>Action</th>
                <th>Allowed for</th>
                <th>Action</th>
            </tr>
            </thead>
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
                    <td>
                        <a href="#">Edit</a> | <a href="#">Delete</a>
                    </td>
                </tr>
                {/foreach}
            {/if}
        </table>
                    </div>
    </div>
    {/container}

    {container name="footer"}{/container}
{/extends}