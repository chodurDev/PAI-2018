var grid;


format = function date2str(x, y) {
    var z = {
        M: x.getMonth() + 1,
        d: x.getDate(),
        h: x.getHours(),
        m: x.getMinutes(),
        s: x.getSeconds()
    };
    y = y.replace(/(M+|d+|h+|m+|s+)/g, function(v) {
        return ((v.length > 1 ? "0" : "") + eval('z.' + v.slice(-1))).slice(-2)
    });

    return y.replace(/(y+)/g, function(v) {
        return x.getFullYear().toString().slice(-v.length)
    });
}






function load(){
    grid=new FancyGrid({
        resizable: true,
        renderTo: 'container',
        title: '44 DETAILING - CRM',
        width: 'fit',
        height: 200,
        selModel:'row',
        trackOver: true,
        filter: true,


        data: {
            proxy: {
                api:{
                    create:'?page=adminServiceAdd',
                    read:'?page=admin_services&data_wykonania='+format(new Date(), 'yyyy-MM-dd'),
                    update:'?page=adminServiceUpdate',
                    destroy:'?page=adminServiceDelete'
                }


            }
        },
        tbar: [{
            type:'button',
            text: 'Add',
            action: 'add'
        }, {
            type:'button',
            text: 'Delete',
            action: 'remove'
        }, {
            type: 'date',
            emptyText: format(new Date(), 'yyyy-MM-dd'),
            editable: false

        }],
        defaults: {
            type: 'string',
            width: 75,
            resizable: true,
            sortable: true,
            editable: true,


        },
        clicksToEdit: 1,
        columnLines: true,
        columnClickData: true,
        columns: [{
            title: 'Imie',
            index: 'imie',
            width: 100
        }, {
            title: 'Nazwisko',
            index: 'nazwisko',
            width: 100
        }, {
            title: 'Marka',
            index: 'marka',
            width: 100,
            type:'combo',
            data: {
                proxy: {
                    url: 'public/js/DataCarMarka.php'
                }
            }

        },{
            title: 'Model',
            index: 'model',
            width: 100,
            type:'combo',
            data: {
                proxy: {
                    url: 'public/js/DataCarModel.php'
                }
            }

        },{
            title: 'Rodzaj usługi',
            index: 'nazwa_uslugi',
            width: 100,
            type:'combo',
            data: ['pranie','komplet']
        }, {
            title: 'Cena',
            index: 'cena',
            type: 'number',
            spin: true,
            step: 10,
            min: 0,
            max: 100000,
            format: {
                inputFn: cenaInputFn
            }
        },{
            title: 'Zapłacone',
            index: 'zaplacone',
            type:'combo',
            width: 80,
            data:['tak','nie']

        },{
            title: 'Rodzaj płatności',
            index: 'nazwa_platnosci',
            width: 110
        },{
            title: 'Dane do FV(NIP)',
            index: 'nip',
            width: 110
        },{
            title: 'Email',
            index: 'email',
            width: 80
        },{
            title: 'Uwagi',
            index: 'tresc_uwagi',
            width: 80
        },{
            title: 'Data wykonania',
            index: 'data_wykonania',
            type: 'date',
            width: 120,
            format: {

                read: 'Y-m-d',
                write: 'd/m/Y',
                edit: 'd/m/Y'
            }
        }]

    });

};


function cenaInputFn(value) {
    value = value.toString().replace('zł', '').replace(/\,/g, ' ').replace('-', '').replace('.', '');

    if (value.length === 0) {
        value = '';
    } else if (value.length > 6) {
        value = value.substr(0, 6);
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ' ')+' zł';
    } else {
        value =value.replace(/\B(?=(\d{3})+(?!\d))/g, ' ')+ ' zł';
    }

    return value;
}






