<?php
// 1. REQUER a conexão. Sem isso, o banco não existe.
require_once 'config/conexao.php';

// 2. INCLUI o cabeçalho. (Onde a tag <body> e o <header> estão.)
include 'templates/cabecalho.php';
?>

<h2 class="titulo-principal">Últimas Notícias</h2>
<p>Veja o que há de novo em nossa plataforma e no mundo da tecnologia.</p>

<div class="noticias-container">

    <?php
    // 3. Consulta SQL para buscar informações (as 6 mais recentes)
    $sql = "SELECT titulo, conteudo, data_publicacao
            FROM noticias
            ORDER BY data_publicacao DESC
            LIMIT 6";

    // Executa a consulta usando a variável $conexao que veio do require_once
    $resultado = $conexao->query($sql);

    // Verifica se a consulta deu certo E se retornou alguma linha
    if ($resultado && $resultado->num_rows > 0) {

        // 4. Loop para processar cada resultado e criar o Card
        while ($noticia = $resultado->fetch_assoc()) {

            // 5. (Bônus) Formatação da data (BR é o padrão de gente fina)
            // Criamos um objeto DateTime a partir da string do banco
            $data = new DateTime($noticia['data_publicacao']);
            // Formatamos para o padrão Dia/Mês/Ano e Hora
            $data_formatada = $data->format('d/m/Y H:i');

            // 6. (Bônus) Limita o tamanho do conteúdo para não estourar o card
            $conteudo_curto = mb_substr($noticia['conteudo'], 0, 150);
            
            // Verifica se o texto original era maior
            if (mb_strlen($noticia['conteudo']) > 150) {
                $conteudo_curto .= "..."; // Adiciona a elipse (os '...')
            }

            // 7. Exibe o HTML do Card (Usando echo, mas poderia ser fechando o PHP)
            echo '<article class="card">';
            echo '  <div class="card-conteudo">';
            // SEMPRE use htmlspecialchars! É a sua máscara de segurança!
            echo '      <h3>' . htmlspecialchars($noticia['titulo']) . '</h3>';
            echo '      <p>' . htmlspecialchars($conteudo_curto) . '</p>';
            echo '  </div>';
            echo '  <div class="card-meta">';
            echo '      Publicado em: ' . $data_formatada;
            echo '  </div>';
            echo '</article>';
        }
    } else {
        // Exibe mensagem de falha se não houver notícias (O "Plano B"!)
        echo "<p>Nenhuma notícia encontrada no banco de dados.</p>";
    }

    // 8. Fecha a conexão para liberar o recurso. (Bom garoto!)
    $conexao->close();
    ?>

</div> <?php
// 9. INCLUI o rodapé. (Onde o <footer>, </body> e </html> estão.)
include 'templates/rodape.php';
?>