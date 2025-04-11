function copiarDados() {
  const dados = document.getElementById("dados").innerText;
  navigator.clipboard
    .writeText(dados)
    .then(() => {
      alert("Dados copiados para a área de transferência!");
    })
    .catch((err) => {
      alert("Erro ao copiar os dados: " + err);
    });
}

function baixarPDF() {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();
  const texto = document.getElementById("dados").innerText;

  const margem = 10;
  const larguraTexto = 180; // largura do texto dentro da página (210 - 2x margem)
  const alturaLinha = 7;
  const linhas = doc.splitTextToSize(texto, larguraTexto);

  let y = margem;

  for (let i = 0; i < linhas.length; i++) {
    if (y > 280) {
      // Altura máxima da página A4 (297mm) - margem inferior
      doc.addPage();
      y = margem;
    }
    doc.text(linhas[i], margem, y);
    y += alturaLinha;
  }

  doc.save("dados_cpf.pdf");
}function baixarPDF() {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  const dadosElement = document.getElementById("dados");

  // Pega o texto puro (como já fazia antes)
  const texto = dadosElement.innerText;

  const margem = 10;
  const larguraTexto = 180;
  const alturaLinha = 7;
  const linhas = doc.splitTextToSize(texto, larguraTexto);

  let y = margem;

  // Escreve o texto
  linhas.forEach((linha) => {
    if (y > 280) {
      doc.addPage();
      y = margem;
    }
    doc.text(linha, margem, y);
    y += alturaLinha;
  });

  // Pega a imagem base64 (se existir)
  const img = dadosElement.querySelector("img");
  if (img) {
    const base64 = img.src;

    // Se for muito embaixo, adiciona nova página
    if (y > 220) {
      doc.addPage();
      y = margem;
    } else {
      y += 10;
    }

    // Adiciona a imagem no PDF
    doc.addImage(base64, 'JPEG', 60, y, 90, 90); // centralizada (x=60), tamanho 90x90
  }

  doc.save("dados_cpf.pdf");
}


function baixarTXT() {
  const dados = document.getElementById("dados").innerText;
  const blob = new Blob([dados], { type: "text/plain;charset=utf-8" });
  const link = document.createElement("a");
  link.href = URL.createObjectURL(blob);
  link.download = "dados_cpf.txt";
  link.click();
}