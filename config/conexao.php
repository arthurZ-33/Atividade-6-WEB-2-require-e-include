<?php
// Configurações de Conexão (Não deixe 'root' e senha vazia em produção, seu louco!)
$servidor = "localhost";
$usuario = "root";
$senha = ""; // Em desenvolvimento, ok. Em produção, use uma senha de verdade!
$banco = "meu_banco";

// Cria a conexão
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se houve algum erro na conexão
if ($conexao->connect_error) {
    // Morre e exibe o erro. Cruel, mas necessário.
    die("Falha na conexão: " . $conexao->connect_error);
}

$conexao->set_charset("utf8");

?>