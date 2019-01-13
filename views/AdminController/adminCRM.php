<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>


<body id="crm">

<center><div id="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Samochód_marka</th>
                <th>Samochód_model</th>
                <th>Rodzaj_usługi</th>
                <th>Cena</th>
                <th>Zapłacone</th>
                <th>Rodzaj_płatności</th>
                <th>Dane_do_FV(NIP)</th>
                <th>Email</th>
                <th>Uwagi</th>
                <th>Data_wykonania</th>
            </tr>
            </thead>
            <tbody class="users-list">
            </tbody>
        </table>
        <button class="btn btn-dark btn-lg" type="button" onclick="getUsluga()">Get all users</button>
    </div>
</center>

</body>
</html>