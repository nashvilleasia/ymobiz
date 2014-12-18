<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $('table.CityTable th') .click(
            function() {
                $(this) .parents('table.CityTable') .children('tbody') .toggle();
            }
        )

        $('table.StateTable tr.statetablerow th') .click(
            function() {
                $(this) .parents('table.StateTable') .children('tbody') .toggle();
            }
        )

    });

</script>
<style type="text/css">
    table.CityTable, table.StateTable{width:400px; border-color:#1C79C6; text-align:center;}
    table.StateTable{margin:20px; border:3px solid #1C79C6;}

    table td{padding:5px;}
    table.StateTable thead th{background: #1C79C6; padding: 10px; cursor:pointer; color:white;}
    table.CityTable thead th{padding: 10px; background: #C7DBF1;cursor:pointer; color:black;}

    table.StateTable td.nopad{padding:0;}
</style>


<table class="StateTable" rules="all" cellpadding="0" cellspacing="0">
    <thead>
    <tr class="statetablerow">
        <th>Missouri</th>
        <th>Type</th>
        <th>Users</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td></td>
        <td>Admin</td>
        <td>User Name #1</td>
    </tr>
    <tr>
        <td></td>
        <td>Reader</td>
        <td>User Name #2</td>
    </tr>
    <tr>
        <td></td>
        <td>Reader</td>
        <td>User Name #3</td>
    </tr>
    <tr>
        <td colspan="3">   <!--Added row for the nested table-->
            <table class="CityTable" rules="all" cellpadding="0" cellspacing="0">     <!--Start of the nested table-->
                <thead>
                <tr>
                    <th>St. Louis</th>
                    <th>Type</th>
                    <th>Users</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td>Admin</td>
                    <td>User Name #1</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Reader</td>
                    <td>User Name #2</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Reader</td>
                    <td>User Name #3</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</table>