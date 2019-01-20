<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="/public/js/tabela.js"></script>

<body id="crm" >

<center>
    <div>
        <button class="btn btn-dark active" id="lessDate" style="border-radius: 100%" onclick="lessDate()"><</button>
        <input  id="dateExecution" type="date" style=" border: 2px solid black; border-radius: 12px" oninput="loadData()">
        <button class="btn btn-dark active"  id="moreDate" style="border-radius: 100%" onclick="moreDate()">></button>
    </div>
    <div id="container" ></div>
</center>

</body>
</html>