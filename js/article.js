$(document).ready(function() {

    $("#analix").on('click', function() {

        $("#ris-table").html("");
        $("#ris-testo").html("");

        $.ajax({
            url: "inc/articleText.php", 
            type: "get",
            //dataType: "json", 
            data : { 
                testo: $("#testo").val()
            }
        })
        .done(function(data) {

            var diz = jQuery.parseJSON(data);

            diz[0].forEach(function(item){
                $("#ris-table").append(
                    '<tr>'+
                    '<th scope="row">'+item.word+'</th>'+
                    '<td>'+item.occ+'</td>'+
                    '</tr>'
                );
            });

            $("#ris-testo").append(
                diz[1]
            );

        })
        .fail(function() {
            alert("error");
        });

    });

    //<p class="blockquote">dasdasd ad adas d </p>

})
