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
                        <a href="/admin/pages">List</a>
                    </li>
                    <li>
                        <a href="/admin/pages/create" class="active">Create</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {/container}

    {container name="content"}
    <div class="grid_13">
        <div class="box">
            <form action="/admin/pages/create" method="post">
            <table>
                <tr>
                    <td>Title</td>
                    <td>In menu</td>
                    <td>Directory</td>
                    <td>Controller</td>
                    <td>Action</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="iTitle" name="title" value="Welcome to site!" />
                    </td>
                    <td>
                        <input type="text" id="iMenu" name="menu" value="Homepage" />
                    </td>
                    <td>
                        <select id="sDirectory" name="directory">
                            <option value="staff">Staff</option>
                            <option value="admin">Admin</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" id="iController" name="controller" value="welcome" />
                    </td>
                    <td>
                        <input type="text" id="iAction" name="action" value="index" />
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center;">
                        <input type="submit" value="Create page" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
    {/container}

    {container name="footer"}{/container}
{/extends}