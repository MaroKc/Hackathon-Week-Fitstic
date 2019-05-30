function nuvoletta(words) {

    ZC.LICENSE = ["b55b025e438fa8a98e32482b5f768ff5"];
    var myConfig = {
        "graphset":[
        {
            "type":"wordcloud",
            "options": {
                "rotate": true,
                "style": {
                    fontFamily: 'Cabin Sketch',
                    backgroundColor: 'rgb(33,39,61)',
                    //alpha: 0.9,
                    borderRadius: 5,
                    padding: '15px 50px',
                    textAlpha: 1,
                    "tooltip": {
                        visible: true,
                        text: '%text: %hits'
                    }
                 },
            "words":
                words
            }
        }]
    };
         
    zingchart.render({
        id: 'myChart', 
        data: myConfig, 
        height: '500', 
        width: '100%' 
    });

}

$(document).ready(function() {

    let lan;
    $(".select-lang").on('click', function() {

        $("#lingua").val($(this).attr('id'));

        if(lan != null) 
            $(lan).removeClass("focus-lang");

        $(this).addClass("focus-lang");
        lan = this;

    })

    $("#analix_text").on('click', function() {

        $("#ris-table").html("");
        $("#ris-testo").html("");

        $.ajax({
            url: "inc/articleText.php", 
            type: "get",
            //dataType: "json", 
            data : { 
                leng : $("#lingua").val(),
                testo: $("#testo").val()
            }
        })
        .done(function(data) {

            var diz = jQuery.parseJSON(data);

            diz['stat'].forEach(function(item){
                $("#ris-table").append(
                    '<tr>'+
                    '<th scope="row">'+item.text+'</th>'+
                    '<td>'+item.count+'</td>'+
                    '</tr>'
                );
            });

            $("#ris-testo").append(
				'<div class="blockquote" style="overflow-y: scroll;max-height: 80vh;>">'+
					diz['bold']+
				'</div>'
            );

            nuvoletta(diz['stat']);

        })
        .fail(function() {
            alert("error");
        });

    });
	
	    $("#analix_url").on('click', function() {

        $("#ris-table").html("");
        $("#ris-testo").html("");
		
        $.ajax({
            url: "inc/articleUrl.php", 
            type: "get",
            //dataType: "json", 
            data : {
                leng : $("#lingua").val(), 
                testo: $("#url_art").val()
            }
        })
        .done(function(data) {

            var diz = jQuery.parseJSON(data);

            diz['stat'].forEach(function(item){
                $("#ris-table").append(
                    '<tr>'+
                    '<th scope="row">'+item.text+'</th>'+
                    '<td>'+item.count+'</td>'+
                    '</tr>'
                );
            });

            $("#ris-testo").append(
                '<div class="text-center h3">'+diz['titolo']+'</div>'+
                '<div class="blockquote" style="overflow-y: scroll;max-height: 80vh;>"'+
					diz['bold']+
				'</div>'
            );

            nuvoletta(diz['stat']);

        })
        .fail(function() {
            alert("error");
        });

    });

})
