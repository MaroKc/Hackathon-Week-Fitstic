$(document).ready(function() {

    $("#analix").on('click', function() {

        $("#ris").html("");

        $.ajax({
            url: "file.php", 
            type: "get",
            //dataType: "json", 
            data : { 
                testo: $("#testo").val()
            }
        })
        .done(function(data) {

            var diz = jQuery.parseJSON(data);

            console.log(diz.values);

            JSON.parse(data).forEach(function(item){
                $("#ris").append(
                    '<button type="button" class="btn btn-info m-1">' +
                        item.word+ ' <span class="badge badge-dark"> ' +item.occ+'</span>' +
                    '</button>'
                );
            });


        })
        .fail(function() {
            alert("error");
        });

    });

})
