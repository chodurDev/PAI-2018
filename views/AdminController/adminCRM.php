<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="https://cdn.fancygrid.com/fancy.full.min.js"></script>
<script src="/public/js/tabelaAdmin.js"></script>

<body id="crm" onload="load()">

<center>
    <div>
        <button class="btn btn-dark active" id="lessDate" style="border-radius: 100%" onclick="lessDate()"><</button>
        <input  id="dateExecution" type="date" style=" border: 2px solid black; border-radius: 12px" oninput="loadData()"">
        <button class="btn btn-dark active"  id="moreDate" style="border-radius: 100%" onclick="moreDate()">></button>
    </div>
    <div id="container" ></div>
</center>
<form action="?page=login"  method="post">
    <input type="submit" class="button-start" value="">
</form>

</body>
</html>