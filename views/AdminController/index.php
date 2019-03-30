<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<?php include(dirname(__DIR__).'/head.html'); ?>
<!--<style>body {background-color: grey;}</style>-->


<body>
<div id="logoutBtn" class="row">
<form action="?page=logout"  method="post">
    <input  type="submit" class="btn btn-danger" value="Wyloguj">
</form>
</div>
<center>
<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row" id="admin-row" >

            <div class="col-sm col-lg">
                <h2>CRM</h2>
                <form action="?page=adminCRM" class="hide-submit" method="post">
                    <label>
                        <input type="submit"/>
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="button" aria-label="Placeholder: 140x140" ><image xlink:href="https://i0.wp.com/www.vectorsoft.pl/wp-content/uploads/2014/10/crm_icon_modul.png?ssl=1" height="140px" width="140px"/></svg>
                    </label>
                </form>
            </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
    <div class="row" id="admin-row" >
        <div class="col-sm-4 col-lg-4">
            <h2>RAPORTY</h2>
            <form action="?page=adminRaport" class="hide-submit" method="post">
                <label>
                    <input type="submit"/>
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="button" aria-label="Placeholder: 140x140" ><image xlink:href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0GNjQQwcCXvm--IC-RIAoTqRPcR-5IQszh-GVm4qEhHrn5fsA"  height="140px" width="140px"/></svg>
                </label>
            </form>
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-4 col-lg-4">
        </div>
        <div class="col-sm-4 col-lg-4">

            <h2>NIEZAPŁACONE</h2>
            <form action="?page=adminUnregulated" class="hide-submit" method="post">
                <label>
                    <input type="submit"/>
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="button" aria-label="Placeholder: 140x140"><image xlink:href="http://mrmeble.pl/wp-content/uploads/2015/10/wp_pieniadze_monety_oszczednosci_600.jpeg" height="140px" width="140px"/></svg>
                </label>
            </form>


        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

</center>

</body>
</html>