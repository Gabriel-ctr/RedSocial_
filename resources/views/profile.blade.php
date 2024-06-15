<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    @include('partials.navbar')
    <div class="container mt-4">
        <h2>Perfil del Usuario</h2>
        <div class="row">
            <div class="col-md-4">
                <img src="https://via.placeholder.com/150" class="img-fluid rounded-circle" alt="Foto de Perfil">
                <h3>Nombre del Usuario</h3>
                <p>@username</p>
                <p>Descripción del usuario...</p>
                <p>Seguidores: 100 | Seguidos: 150</p>
            </div>
            <div class="col-md-8">
                <h3>Mis Publicaciones</h3>
                <div class="row">
                    <!-- Publicación 1 -->
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/500" class="card-img-top" alt="Imagen">
                            <div class="card-body">
                                <h5 class="card-title">Username</h5>
                                <p class="card-text">Descripción de la imagen...</p>
                                <p class="card-text">Likes: 10</p>
                                <button class="btn btn-primary btn-like">Like</button>
                            </div>
                        </div>
                    </div>
                    <!-- Publicación 2 -->
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <img src="https://via.placeholder.com/500" class="card-img-top" alt="Imagen">
                            <div class="card-body">
                                <h5 class="card-title">Username</h5>
                                <p class="card-text">Descripción de la imagen...</p>
                                <p class="card-text">Likes: 20</p>
                                <button class="btn btn-primary btn-like">Like</button>
                            </div>
                        </div>
                    </div>
                    <!-- Agrega más publicaciones aquí -->
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.btn-like').click(function(){
                $(this).toggleClass('btn-primary btn-danger');
                let likes = $(this).siblings('.card-text').find('.likes');
                let count = parseInt(likes.text());
                if ($(this).hasClass('btn-danger')) {
                    count++;
                    $(this).text('Unlike');
                } else {
                    count--;
                    $(this).text('Like');
                }
                likes.text(count);
            });
        });
    </script>
</body>
</html>
