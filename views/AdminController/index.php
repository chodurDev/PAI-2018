<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<?php include(dirname(__DIR__).'/head.html'); ?>


<body>
<center>
<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row" id="admin-row" >
            <div class="col-lg-4">
                <h2>CRM</h2>
                <form action="?page=adminCRM" class="hide-submit" method="post">
                    <label>
                        <input type="submit"/>
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="button" aria-label="Placeholder: 140x140" ><image xlink:href="https://i0.wp.com/www.vectorsoft.pl/wp-content/uploads/2014/10/crm_icon_modul.png?ssl=1" height="140px" width="140px"/></svg>
                    </label>
                </form>
            </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <h2>RAPORTY</h2>
            <form action="?page=adminRaport" class="hide-submit" method="post">
                <label>
                    <input type="submit"/>
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="button" aria-label="Placeholder: 140x140" ><rect fill="#66ccff " width="100%" height="100%"/><image xlink:href="https://sky-shop.pl/images/possibilities/raports-low_inventory.png" x="-15" y="-5" height="140px" width="140px"/></svg>
                </label>
            </form>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
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