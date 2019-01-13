function getUsluga() {
    const apiUrl = "http://localhost:8003";
    const $list = $('.users-list');

    $.ajax({
        url : apiUrl + '/?page=admin_uslugi',
        dataType : 'json'
    })
        .done((res) => {

            $list.empty();
            //robimy pętlę po zwróconej kolekcji
            //dołączając do tabeli kolejne wiersze
            res.forEach(el => {
                $list.append(`<tr>
                    <td>${el.imie}</td>
                    <td>${el.nazwisko}</td>
                    <td>${el.samochód_marka}</td>
                    <td>${el.samochód_model}</td>
                    <td>${el.rodzaj_usługi}</td>
                    <td>${el.cena}</td>
                    <td>${el.zaplacone}</td>
                    <td>${el.rodzaj_platnosci}</td>
                    <td>${el.nip}</td>
                    <td>${el.email}</td>
                    <td>${el.uwagi}</td>
                    <td>${el.data_wykonania}</td>
                    </tr>`);
            })
        });
}