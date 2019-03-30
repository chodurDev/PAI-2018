<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="https://cdn.fancygrid.com/fancy.full.min.js"></script>
<script src="/public/js/tabelaAdminReport.js"></script>
<style> a[href="http://www.fancygrid.com"]{display: none}  </style>

<body onload="load()">
<div id="logoutBtn" class="row">
    <form action="?page=logout"  method="post">
        <input  type="submit" class="btn btn-danger" value="Wyloguj">

    </form>
</div>
<div style="height: 20px">

</div>
    <div class="container" >
        <div class="row">
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <center>
                <img src="https://image.freepik.com/darmowe-ikony/kalendarz-na-dzie%C5%84-codziennie-strona-31_318-51096.jpg" style="height: 40px;position: relative;top:-13px">
                    <span  style="color:black;position: relative;font-size: 20px;top:-10px;left: 4px;"> Raport za okres od <input id="fromDate" type="date" style=" border: 2px solid black; border-radius: 12px" oninput="loadData()" > do <input id="toDate" type="date" style=" border: 2px solid black; border-radius: 12px" oninput="loadData()" ></span>
                </center>
            </div>
        </div>
        <center>
            <div class="row">
                <div class="col col-sm" id="container"></div>
            </div>
        </center>
    </div>


</body>
</html>