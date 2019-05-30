$(document).ready(function() {

    $("#analix_text").on('click', function() {

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
				'<p class="blockquote">'+
					diz[1]+
				'</p>'
            );

        })
        .fail(function() {
            alert("error");
        });

    });
	
	    $("#analix_url").on('click', function() {

        $("#ris-table").html("");
        $("#ris-testo").html("");
		
		alert($("#url_art").val());

        $.ajax({
            url: "inc/articleUrl.php", 
            type: "get",
            //dataType: "json", 
            data : { 
                testo: $("#url_art").val()
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
				'<div class="blockquote">'+
					diz[1]+
				'</div>'
            );

        })
        .fail(function() {
            alert("error");
        });

    });

})
