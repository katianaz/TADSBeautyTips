// Events on the submit button
$("#btnSubmit").click(function() {
    if ($("#txtName").val() == "" || $("#txtTopic") == "") {
        window.alert("Atenção! Preencha todos os campos para publicar!");
    } else if ($("#txtName").val() != "" && $("#txtTopic") != "") {
       window.alert("Obrigada pelo seu comentário!\nAdoramos te ver por aqui.");
    }
});

$("#btnSubmit").mouseover( function() {
    $("#btnSubmit").css("background-color", "#BA6E6E");
    $("#btnSubmit").css("border-color", "black");
});

$("#btnSubmit").mouseout( function() {
    $("#btnSubmit").css("background-color", "white");
    $("#btnSubmit").css("border-color", "#BA6E6E");
});


//vai ser usado no futuro para mostrar os comentarios
/*var comments = [];


function showComments() {

}

function addComment () {
    var addName = txtName.value;
    var addText = txtTopic.value;
}*/
