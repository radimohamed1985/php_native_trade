$(function() {
    $('#submit').on('click', function(e) {
        e.preventDefault();
        var product = $('#select').val();
        var price = $('#price').val();
        var qty = $('#qty').val();
        var sqty = $('#sqty').val();
        var total = $('#total').val();
        var serial = $('#serial').val();
        var client = $('#client').val();
        var cost = $('#price2').val();
        var date = $('#date').val();
        console.log(cost);

        $.ajax({
            type: "POST",
            url: "query/fatora.php",
            data: {
                'serial': serial,
                'product': product,
                'price': price,
                'qty': qty,
                'total': total,
                'client': client,
                'date': date,
                'sqty': sqty,
                'cost': cost
            }
        });
    });

    $('#tregery').on('click', tregery);







    $('#n-account').fadeOut();
    $('.addnew').fadeOut();
    $('#print2').on('click', clientname);
    $('#print2').on('click', invoce);
    $('#print3').on('click', allinvoice);
    $('#print4').on('click', todayinvoice);
    $('#print5').on('click', clientinvoice);
    $('#print6').on('click', statment);
    $('#print6').on('click', function() {
        $(".table").fadeOut();
        $("h4").html("كشف حساب عميل ");
        $('#n-account').fadeIn();
    });
    $('#print7').on('click', supplierstatment);
    $('#print7').on('click', function() {
        $(".table").fadeOut();
        $("h4").html("كشف حساب المورد ");

        $('#n-account').fadeIn();
    });




    // fatora page
    $('#print').on('click', function(e) {
        e.preventDefault();
        showsale();
        showtotal();



        $('.selecttable').fadeOut();
        $('.addnew').fadeIn();
        var product = $('#select').val();
        var price = $('#price').val();
        var qty = $('#qty').val();
        var sqty = $('#sqty').val();
        var total = $('#total').val();
        var serial = $('#serial').val();
        var client = $('#client').val();
        var date = $('#date').val();
        $.ajax({
            type: "POST",
            url: "query/account.php",
            data: {
                'serial': serial,
                'product': product,
                'price': price,
                'qty': qty,
                'total': total,
                'client': client,
                'date': date,
                'sqty': sqty
            }
        });


    });


    $('#submit').on('click', showsale);
    $('#print8').on('click',function(e){
        e.preventDefault();
        supplierstatment2();
        $("h4").html("كشف حساب المورد ");
    });
 
    // now inserting data into database and use this function to show values on input fields 
    $('#select').on('change', fetchprice);
    $('#select').on('change', store);
    $('#select').on('change', names);
    $('#select').on('change', costprice);
    $('#qty').on('keyup', total);
    $('#price').on('keyup', total);




});

//  fetching price of selected item from database and use it on its input field 

function fetchprice() {
    var product = $('#select').val();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("price").value = this.responseText;
            console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "query/price.php?q=" + product, true);
    xmlhttp.send();
}

function names() {
    var product = $('#select').val();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("costname").value = this.responseText;
            console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "query/hiddenname.php?q=" + product, true);
    xmlhttp.send();
}

// get cost price 


function costprice() {
    var product = $('#select').val();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("price2").value = this.responseText;

            console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "query/costprice.php?q=" + product, true);
    xmlhttp.send();
}
//  function for multiplaying qty * price and get total 
function total() {

    var total = $('#price').val() * $('#qty').val();
    $('#total').val(total);

}

function showsale() {
    var serial = $('#serial').val();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("form").innerHTML = this.responseText;


            $('.del_btn').on('click', function(e) {

                e.preventDefault();
                showsale;
                showtotal;


            });

        }
    };
    xmlhttp.open("GET", "query/sales.php?q=" + serial, true);
    xmlhttp.send();


};

function showtotal() {
    var serial = $('#serial').val();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tot").innerHTML = this.responseText;
            // console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "query/total-sales.php?q=" + serial, true);
    xmlhttp.send();


}


function id_deleting() {


    var id = $('#select').val();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tot").innerHTML = this.responseText;
            // console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "query/delete.php?q=" + id, true);
    xmlhttp.send();
}


function store() {
    var product = $('#select').val();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("sqty").value = this.responseText;
            console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "query/store.php?qq=" + product, true);
    xmlhttp.send();
}

function clientname() {
    var client = $('#client').val();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("client_name").innerHTML = this.responseText;
            console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "query/client.php?qq=" + client, true);
    xmlhttp.send();
}

function statment() {
    var client = $('#client').val();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("form3").innerHTML = this.responseText;
            console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "query/statment.php?qq=" + client, true);
    xmlhttp.send();
}
function supplierstatment2(){
    var supplier =$('#supplier_name').val();
    console.log(supplier);
    var myreq = new XMLHttpRequest();
    myreq.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("form4").innerHTML = this.responseText;
            console.log(this.responseText);
         
        }}
        myreq.open("GET","query/supplieracc.php?supplier=" + supplier,true);
        myreq.send();
    
}

function supplierstatment() {
    var supplier = $('#supplier').val();
    console.log(supplier);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("form3").innerHTML = this.responseText;
            console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "query/supplierstatment.php?qq=" + supplier, true);
    xmlhttp.send();
}

function invoce() {
    var serial = $('#serial').val();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("form2").innerHTML = this.responseText;
            // console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "query/invoice.php?q=" + serial, true);
    xmlhttp.send();


}

function allinvoice() {
    var date = $('#date2').val();
    console.log(date);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("form2").innerHTML = this.responseText;
            // console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "query/all-invoice.php?q=" + date, true);
    xmlhttp.send();


}

function todayinvoice() {
    var date = $('#date2').val();
    console.log(date);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("form2").innerHTML = this.responseText;
            // console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "query/today-invoice.php?q=" + date, true);
    xmlhttp.send();


}

function clientinvoice() {
    var date = $('#client').val();
    console.log(date);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("form2").innerHTML = this.responseText;
            // console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "query/client-invoice.php?q=" + date, true);
    xmlhttp.send();


}

function tregery() {
    var date = $('#date2').val();
    console.log(date);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("form4").innerHTML = this.responseText;
            console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "query/tregery.php?q=" + date, true);
    xmlhttp.send();


}


// document.getElementById('serial').value = Math.floor(Math.random() * 100);

function deleting(id) {

    // console.log(id);


    var serialnumber = $('.serialnumber').val();
    var idd = id;
    var date = $('.date').val();
    var client_id = $('.client_id').val();
    console.log(serialnumber);
    console.log(idd);
    console.log(client_id);
    console.log(date);
    $.ajax({
        type: "GET",
        url: "query/delete.php",
        data: {
            'serial': serialnumber,
            'idd': idd,
            'date': date,
            'client_id': client_id

        },
        success: function() {
            showsale();
            showtotal();
        }

    })


}