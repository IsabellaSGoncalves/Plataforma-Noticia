<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/output.css" rel="stylesheet"> 
    <title>Meu Site de Notícias</title>
</head>

<body class="bg-gray-100 font-sans">
    <?php include 'contents/header.php'; ?>

    <div class="container mx-auto p-6 h-1/2 flex flex-col justify-center">
        
    <h1 class="text-4xl font-bold text-left text-gray-800 mb-3">Bem-vindo ao Weige News</h1>
    <h2 class="text-2xl text-left text-gray-800 mb-6"> Acompanhe as últimas novidades e se mantenha informado, sempre! </h2>
        
    </div>

    <div class="grid grid-rows-3 grid-flow-col gap-4 px-4 py-4 leading-10">
    <div class="p-4 w-10/12 bg-[#392c43] rounded-xl row-span-3">
           <?php include 'contents/prev_temp.php'; ?>
    </div>
    <div class="p-4 w-full bg-[#392c43] rounded-xl col-span-2"> 
        
        <h2 class="text-2xl font-semibold text-white mb-4">Últimas Notícias</h2>
    </div>
    <div class="p-4 w-full bg-gray-300 rounded-xl row-span-2 col-span-2">
    <ul class="list-disc list-inside space-y-2">
            <li>
                <a href="post.php?id=1" class="text-yellow-800 hover:underline">Notícia 1</a>
            </li>
            <li>
                <a href="post.php?id=2" class="text-yellow-800 hover:underline">Notícia 2</a>
            </li>
            <li>
                <a href="post.php?id=3" class="text-yellow-800 hover:underline">Notícia 3</a>
            </li>
        </ul>
    </div>
</div>


    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>


    <?php include 'contents/footer.php'; ?>
</body>
</html>