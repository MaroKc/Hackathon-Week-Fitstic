$(document).ready(function() {

    $.ajax({
        url: "inc/storico.php", 
        type: "get",
    })
    .done(function(data) {

        JSON.parse(data).forEach(function(item){
            $("#all_search").append(
                '<div id="'+item+'" class="card card-plain storia mt-5">'+
                '<div  class="pointer text-center card-header card-header-danger" style="cursor: pointer;">'+
                'Ricerca Elemento : ' + item +
                '</div></div>'
            );
        })

        $(".storia").on('click', function() {

            $("#ris-table").html("");
            $("#ris-testo").html("");
            $("#myChart").html("");

            $.ajax({
                url: "inc/storico.php", 
                type: "get",
                data : { 
                    id : $(this).attr('id')
                }
            })
            .done(function(data) {
        
                var diz = jQuery.parseJSON(data)[0];
                var parole = jQuery.parseJSON(diz['parole']);

                Object.keys(parole).forEach(function(key) {

                    console.log(key, parole[key]);
                    var item = parole[key];
                    $("#ris-table").append(
                        '<tr>'+
                        '<th scope="row">'+item.text+'</th>'+
                        '<td>'+item.count+'</td>'+
                        '</tr>'
                    );
                  
                });


                let bb = "";
                if(diz['titolo'] != null)
                    bb += '<div class="text-center h3">'+diz['titolo']+'</div>';
        
                bb +=   '<div class="blockquote" style="overflow-y: scroll;max-height: 80vh;">'+
                            diz['testo']+
                        '</div>'
        
                $("#ris-testo").append(
                    bb
                );
                
            })
            .fail(function() {
                alert("error");
            });
    
        })

    })
    .fail(function() {
        alert("error");
    });

});