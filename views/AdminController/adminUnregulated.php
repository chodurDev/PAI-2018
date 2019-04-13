<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="https://cdn.fancygrid.com/fancy.full.min.js"></script>
<script src="/public/js/tabelaAdminUnregulated.js"></script>
<style> a[href="http://www.fancygrid.com"]{display: none}  </style>
<body>
<div class="row" id="logoutBtn" >
    <div class="col-1">
    <form action="?page=logout"  method="post">
        <input  type="submit" class="btn btn-danger" value="Wyloguj">
    </form>
    </div>
</div>
<div class="row" style="height: 40px"></div>
<center>
    <div style="height: 10px"></div>
    <div class="row">
        <div class="col" id="container" ></div>
    </div>
</center>

</body>
</html>