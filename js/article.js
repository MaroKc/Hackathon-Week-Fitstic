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

function pulisci () {

    $("#ris-table").html("");
    $("#ris-testo").html("");
    $("#myChart").html("");

}

function get_dati(to, campo) {


    $.ajax({
        url: "inc/"+to+".php", 
        type: "get",
        //dataType: "json", 
        data : { 
            leng : $("#lingua").val(),
            testo: campo
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

        let bb = "";
        if(diz['titolo'] != null)
            bb += '<div class="text-center h3">'+diz['titolo']+'</div>';

        bb +=   '<div class="blockquote" style="overflow-y: scroll;max-height: 80vh;>"'+
                    diz['bold']+
                '</div>'

        $("#ris-testo").append(
            bb
        );

        nuvoletta(diz['stat']);

    })
    .fail(function() {
        alert("error");
    });

}

function start_info () {
var intro = introJs();
intro.setOptions({
  steps: [
    { 
        intro: "Benvenuto su Find_FIX!<br>Alcune Linee Guida",
        position: 'right',
        
    },
    { 
      element: document.querySelectorAll('.primo')[0],
      intro: "Vuoi scrivere o inserire un Link? <br>Scegli qui!",
      position: 'right',
      
    },
    { 
        intro: "Non dimenticarti di analizzare il testo e ricorda di controllare la cronologia delle ricerche",
        position: 'right',
        
    }
  ]
});

intro.start();
}

$(document).ready(function() {

    setTimeout(function(){ start_info() }, 3000);
    

    $(".select-lang").on('click', function() {

        $("#lingua").val($(this).attr('id'));
        $(".select-lang").removeClass("focus-lang");
        $(this).addClass("focus-lang");

    })

    $("#analix_text").on('click', function() {

        pulisci();
        get_dati("articleText",$('#testo').val());

    });
	
	$("#analix_url").on('click', function() {

        pulisci();
        get_dati("articleUrl", $('#url_art').val() );

    });

})
