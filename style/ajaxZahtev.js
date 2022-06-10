$(document).ready(function(){
    $('.btnObrisi').click(function(){
        var id = $(this).data('id');
        

        $.ajax({
            method: 'POST',
            url: "php/delete.php",
            dataType: 'json',
            data: {
                id : id
            },
            success: function(podaci){
                console.log("stagod");
                alert("Uspesno ste izbrisali nalog");
            },
            error: function(xhr, statusTxt, error){
                var status = xhr.status;
                switch(status){
                    case 500:
                        alert("Greska na serveru. Trenutno nije moguce izbrisati korisnika.");
                        break;
                    case 404:
                        alert("Stranica nije pronadjena.");
                        break;
                    default:
                        alert("Greska: " + status + " - " + statusTxt);
                        break;
                }
            }
        });
    });
});