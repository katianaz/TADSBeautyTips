function leavePage() {
  if ((campo_nome.value != "") || (campo_email.value != "") || (campo_telNo.value != "") ||
  (campo_date.value != "")) {
     return "Deseja realmente deixar a página?"
   } else {
     return "Obrigado sr(a) ' + campo_nome + ' os seus dados foram encaminhados com sucesso');"
   }
}

// Events on the submit button
$("#btnSubmit").click(function() {
    if ($("#campo_nome").val() == "" || $("#campo_email").val() == "" || $("#campo_telNo").val() == "" ||
    $("#campo_date").val() == "") {
        window.alert("Atenção! Preencha todos os campos para finalizar cadastro!");
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


//var nome = document.getElementsByClassName("campo_nome").value;


//passar para maiuscula
$('#campo_nome').on('keyup', (ev) => {
  $('#campo_nome').val($('#campo_nome').val().toUpperCase());
});

/*document.getElementById('campo_nome').addEventListener('keyup', (ev) => {
  const input = ev.target;
  input.value = input.value.toUpperCase();
});
*/

//Campo senha verificação da força

function calculaIdade(dobString) {

var data_nasc = document.getElementById('data').value.split("/");
var verifica = data[2]+data[1]+data[0];

var dob = new Date(dobString);
var currentDate = new Date();
var currentYear = currentDate.getFullYear();
var birthdayThisYear = new Date(currentYear, dob.getMonth(), dob.getDate());
var verifica = currentYear - dob.getFullYear();

alert(verifica); //mostra a idade
alert(currentYear); // mostra o ano

alert(birthdayThisYear);

if (verifica >= 15 && currentYear < birthdayThisYear ){
    //alert('pode');
    document.getElementById('mostravid').style.display = "block";
} else {
    //alert('nao pode');
    document.getElementById('mostravid').style.display = "none";

}

if (verifica == ''){
    document.getElementById('mostravid').style.display = "none";

  }
}
