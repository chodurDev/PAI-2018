<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="https://cdn.fancygrid.com/fancy.full.min.js"></script>
<script src="/public/js/tabelaAdmin.js"></script>
<style> a[href="http://www.fancygrid.com"]{display: none}  </style>
<body id="crm" onload="load()">
<div id="logoutBtn" class="row">
    <form action="?page=logout"  method="post">
        <input  type="submit" class="btn btn-danger" value="Wyloguj">
    </form>
</div>
<center>
    <div style="height: 10px"></div>
    <div >
        <button class="btn btn-dark active" id="lessDate" style="border-radius: 100%" onclick="lessDate()"><b><</b></button>
        <input  id="dateExecution" type="date" style=" border: 2px solid black; border-radius: 12px" oninput="loadData()"">
        <button class="btn btn-dark active"  id="moreDate" style="border-radius: 100%" onclick="moreDate()"><b> > </b></button>
    </div>
    <div style="height: 10px"></div>
    <div id="container" ></div>

</center>


</body>
</html>