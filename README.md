🚀 Projeto Básico de Requisições PHP: Notícias Dinâmicas
🎯 Visão Geral
Este projeto é um exercício fundamental focado na implementação de requisições de código PHP, utilizando as diretivas require_once e include, e na manipulação básica de banco de dados para a exibição de conteúdo dinâmico.

O objetivo principal foi consolidar o entendimento sobre a modularização de código e o fluxo de trabalho essencial para interagir com um banco de dados MySQLi (ou similar), simulando um feed de notícias simples.

🛠️ Tecnologias Utilizadas
Linguagem de Servidor: PHP

Banco de Dados: MySQLi (Padrão para a conexão)

Marcação: HTML5

Estilização: CSS3 (Presumindo arquivos de estilo externos)

🔑 Pontos de Aprendizado e Implementação
O código demonstra a aplicação de conceitos cruciais para o desenvolvimento backend:

1. Modularização e Reuso de Código
require_once 'config/conexao.php';: Uso estratégico do require_once para garantir a conexão com o banco de dados antes de qualquer operação que a utilize. O _once previne inclusões duplicadas, evitando erros fatais de redefinição. Este é um padrão de segurança e eficiência.

include 'templates/cabecalho.php'; e include 'templates/rodape.php';: Aplicação do include para separar a estrutura visual (cabeçalho e rodapé) do conteúdo principal. Isso facilita a manutenção, padroniza a interface e reduz a repetição de código (Princípio DRY - Don't Repeat Yourself).

2. Manipulação de Banco de Dados (CRUD - Read)
Consulta Otimizada: Utilização de uma query SQL para buscar as 6 notícias mais recentes (ORDER BY data_publicacao DESC LIMIT 6), demonstrando a capacidade de filtrar e ordenar dados diretamente no banco de dados para otimizar o desempenho.

Verificação de Sucesso: O código inclui a verificação (if ($resultado && $resultado->num_rows > 0)) para garantir que a consulta foi executada sem erros e que há dados para exibir, demonstrando tratamento de fluxo de dados.

Fechamento de Conexão: Uso explícito de $conexao->close(); para liberar recursos do servidor, uma boa prática essencial para gerenciar a memória e o limite de conexões.

3. Tratamento e Segurança dos Dados
Formatação de Data: Uso da classe nativa DateTime do PHP para converter o formato de data do banco (ISO) para o padrão brasileiro (DD/MM/AAAA), um requisito comum em aplicações localizadas.

Limitação de Conteúdo: Implementação da função mb_substr() para limitar o preview de texto nas notícias (cards), melhorando a usabilidade e o design da página.

Prevenção de XSS: Aplicação do htmlspecialchars() ao exibir dados provenientes do banco de dados (título e conteúdo). Este é um passo de segurança fundamental para prevenir ataques de Cross-Site Scripting (XSS), uma prática obrigatória em qualquer código profissional.

🗺️ Estrutura do Projeto (Assumida)
A estrutura de pastas esperada para que o código funcione corretamente é:

.
├── config/
│   └── conexao.php (Contém a variável $conexao)
├── templates/
│   ├── cabecalho.php
│   └── rodape.php
└── index.php (Este arquivo principal)
🎓 Próximos Passos (Evolução Contínua)
Este projeto estabelece a base para um aprendizado mais avançado. Para evoluir esta aplicação, as próximas etapas lógicas seriam:

Uso de Prepared Statements: Migrar as consultas SQL para Prepared Statements (usando $conexao->prepare()) para aumentar significativamente a segurança contra ataques de SQL Injection.

Estrutura Orientada a Objetos: Reestruturar a conexão e as operações de banco de dados em uma classe dedicada (ex: Database.php ou NoticiaModel.php) para um código mais limpo, desacoplado e manutenível.

Paginação: Implementar lógica para dividir a exibição das notícias em múltiplas páginas, utilizando os clauses OFFSET e LIMIT no SQL.
