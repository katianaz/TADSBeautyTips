/*var btnSubmit = document.querySelector("#btnSubmit");
btnSubmit.addEventListener("click", submit);

var txtName = document.querySelector("#txtName");
var txtTopic = document.querySelector("#txtTopic");
var buttonPost = document.querySelector("#btnSubmit")


function submit() {
    if ((txtName.value == "") || (txtTopic.value == "")) {
        window.alert("Atenção! Preencha todos os campos para publicar!");
    } 
    window.alert("Obrigada pelo seu comentário!\n\nAdoramos te ver por aqui.");
}*/

var comments = [
    {
        nome:"",
        conteudo:""
    }
];
function show_comments(comments){

	var n = comments.length; // variavel n assume o valor do indice maximo do array list

	$("#comentarios2").html(""); // seleciono o id comentarios e faco a alteracao de conteudo para ""
	for(var i=0; i<n; i++) { // criando um looping que percorre um array
		$("#comentarios2").append($("<h4></h4>").html(comments.nome[i]));
        $("#comentarios2").append($("<p></p>").html(comments.conteudo[i]));
    }
         // seleciono o id list crio um filho <LI> com 
        // o conteudo do array para aquele indice

	return(comments); // retorne o array list
}
// quando clica no botao adicionar coloca o item na lista
$(document).ready(function(ev){

  $("btnSubmit").on("click",function(ev){ // quando clica no adicionar
		ev.preventDefault(); // nao recarregue a pagina
		

		comments.nome.push($("#txtName").val());//coloque no array list o value de txtname
        $("#txtName").val(""); // selecione o id item e coloque o valor ""
        comments.conteudo.push($("#txtTopic").val())
        $("#txtTopic").val(""); // selecione o id item e coloque o valor ""
		

		show_comments(comments); //aplique a funcao desenha lista no array list

		// Impede que o formulario seja submetido e pagina recarregue.
		return(false);
	});
});



