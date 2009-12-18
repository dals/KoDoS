{extends template="staff/main-2col.tpl"}

{container name="css"}{/container}
{container name="js"}{/container}

{container name="content"}
<div class="grid_13">
    <div class="box" style="text-align: right;">
        <form action="#" method="post" >
            From <input type="text" id="iDateFilterFrom" name="dateFilter[from]" value="2009-12-01" />
            &nbsp;
            to <input type="text" id="iDateFilterTo" name="dateFilter[to]" value="2009-12-31" />
            <input type="submit" value="Apply filter" />
        </form>
    </div>
</div>
{/container}

{container name="left"}

                <div class="grid_3">
                <div class="box menu">
                    <h2>
                        <a href="#" id="toggle-section-menu">Available actions</a>
                    </h2>
                    <div class="block" id="section-menu">
                        <ul class="section menu">
                            <li>
                                <a href="#" class="active">List</a>
                            </li>
                            <li>
                                <a href="#">Add</a>
                            </li>
                            <li>
                                <a href="#">Archive</a>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>

{/container}

{container name="footer"}{/container}
{/extends}