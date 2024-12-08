<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startup de Sementes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">VTxp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-light text-center py-5">
        <div class="container">
            <h1 class="display-4">Bem-vindo à SementesTech</h1>
            <p class="lead">Oferecemos as melhores sementes para o seu cultivo com tecnologia e qualidade.</p>
            <a href="#produtos" class="btn btn-success btn-lg">Nossos Produtos</a>
        </div>
    </header>

    <!-- Sobre -->
    <section id="sobre" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Sobre Nós</h2>
                    <p>Somos uma startup dedicada a fornecer sementes de alta qualidade, aliando inovação tecnológica e sustentabilidade. Nossa missão é ajudar agricultores e entusiastas a alcançar um cultivo eficiente e produtivo.</p>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
    </section>

    <!-- Produtos -->
    <section id="produtos" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Nossos Produtos</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Sementes de Alta Qualidade</h5>
                            <p class="card-text">Produzidas com o mais alto padrão para garantir sua colheita.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Variedades Especiais</h5>
                            <p class="card-text">Sementes adaptadas a diferentes climas e regiões.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Sementes Sustentáveis</h5>
                            <p class="card-text">Contribuímos para um futuro mais verde e sustentável.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contato -->
    <section id="contato" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Entre em Contato</h2>
            <form action="processar_contato.php" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="nome" class="form-control" placeholder="Seu Nome" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Seu Email" required>
                    </div>
                </div>
                <div class="mb-3">
                    <textarea name="mensagem" class="form-control" rows="4" placeholder="Sua Mensagem" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Enviar Mensagem</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-success text-white text-center py-3">
        <p class="mb-0">&copy; 2024 VTxp. Todos os direitos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
