import Alpine from 'alpinejs';
import Inputmask from 'inputmask';

import './bootstrap';

window.Alpine = Alpine;

Alpine.start();

//Mascara para campo do telefone
document.addEventListener('DOMContentLoaded', function() {
    const telefoneInput = document.getElementById('telefone');
    Inputmask('(99) 9999-9999[9]').mask(telefoneInput);
  });

//Mascara para campo do CEP
document.addEventListener("DOMContentLoaded", function() {
    const cepInput = document.getElementById("cep");
    if (cepInput) {
        cepInput.addEventListener("input", function() {
            const cepValue = cepInput.value.replace(/\D/g, "");
            const cepFormatted = formatCEP(cepValue);
            cepInput.value = cepFormatted;
        });
    }
});

function formatCEP(cep) {
    const cepRegex = /^(\d{5})(\d{3})$/;
    return cep.replace(cepRegex, "$1-$2");
}

//buscar por CEP e Autocomplete
document.addEventListener("DOMContentLoaded", function() {
    const cepInput = document.getElementById("cep");
    if (cepInput) {
      cepInput.addEventListener("input", function() {
        const cepValue = cepInput.value.replace(/\D/g, "");
        if (cepValue.length === 8) {
          fetch(`/consulta-cep/${cepValue}`)
            .then(response => response.json())
            .then(data => {
              if (data && data.logradouro) {
                document.getElementById("logradouro").value = data.logradouro;
                document.getElementById("bairro").value = data.bairro;
                document.getElementById("localidade").value = data.localidade;
                document.getElementById("uf").value = data.uf;
              }
            })
            .catch(error => console.error("Erro ao buscar o CEP:", error));
        }
      });
    }
});

const elemento = document.getElementById('meuElemento');
if (elemento !== null) {
  if (elemento.nodeName === 'DIV') {
    console.log('Este é um elemento DIV.');
  } else if (elemento.nodeName === 'P') {
    console.log('Este é um elemento de parágrafo (P).');
  } else {
    console.log('Este é um elemento de tipo desconhecido:', elemento.nodeName);
  }
}









