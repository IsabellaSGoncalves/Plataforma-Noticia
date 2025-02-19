<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";

$query = ''; 


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$query = isset($_GET['query']) ? $_GET['query'] : ''; // Função que verifica se query(pesquisa) é nula, se for returnará nulo na URL da página 
$results = []; // Array que guarda os resultados

if ($query) { // Se tiver uma pesquisa

    $stmt = $conn->prepare("SELECT id, titulo FROM noticias WHERE titulo LIKE ? OR conteudo LIKE ?"); // Busca no banco se existe aquele termo em titulo ou conteudo
    $searchTerm = "%" . $query . "%"; // O termo de busca é criado adicionando o caractere % antes e depois do valor de $query. 
    $stmt->bind_param("ss", $searchTerm, $searchTerm); // Vincula os valores os termos de busca, que são string 
    $stmt->execute(); // O banco de dados realiza a consulta
    $result = $stmt->get_result(); // pega o resultado


    while ($row = $result->fetch_assoc()) { // cada linha terá a associação do resultado
        $results[] = $row; // as linhas serão armazenadas no array results
    }

    $stmt->close(); // fecha a busca
}

$conn->close(); // fecha a conexão com o banco
?>

<header>
    <nav class="bg-[#392c43] border-gray-200 px-4 lg:px-6 py-2.5 flex justify-end">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            
            <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                <svg class="hidden w-6 h-6" fill="currentColor " viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0 items-center">
                <li>
                    <a href="index.php" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#company" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Empresa</a>
                </li>
                <li>
                    <a href="#contact" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contato</a>
                </li>
                <li>
                <div class="flex items-center lg:order-2">
                    <div class="search-container max-w-md mx-auto">
                        <form action="" method="GET" class="relative mb-4">
                            <label for="search-input" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Buscar notícias</label>
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="search-input" name="query" placeholder="Buscar notícias" autocomplete="off" required class="block w-full p-4 ps-10 text-sm text-gray-900 border border-[#1d131a] rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-[#564564]" value="<?php echo htmlspecialchars($query); ?>" />
                            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-yellow-800 hover:bg-yellow-700 focus:ring-1 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2">Buscar</button>
                        </form>
                
                        <?php if ($query): ?> 
                            <h2>Resultados da Busca para "<?php echo htmlspecialchars($query); ?>"</h2> 
                            <?php if (count($results) > 0): ?> 
                                <ul> 
                                    <?php foreach ($results as $result): ?> 
                                        <li>
                                            <?php if (isset($result['id'])): ?>
                                                <a href="post.php?id=<?php echo htmlspecialchars($result['id']); ?>">
                                                    <?php echo htmlspecialchars($result['titulo']); ?>
                                                </a>
                                            <?php else: ?>
                                                <p class="text-red-600">ID não disponível para este resultado.</p>
                                            <?php endif; ?>
                                        </li> 
                                    <?php endforeach; ?> 
                                </ul> 
                            <?php else: ?> 
                                <p>Nenhuma notícia encontrada.</p> 
                            <?php endif; ?> 
                        <?php endif; ?> 
                    </div> 
                </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
</body>
</html>
