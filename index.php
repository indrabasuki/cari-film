<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Search Info Film</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-light bg-info">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h4 class="text-center">Aplikasi Pencarian Film</h4>
            </a>
        </div>

    </nav>
    <a href="index.php">
        <button class="btn btn-primary text-center mt-2">Refresh Halaman</button>
    </a>
    <div class="alert alert-primary mt-2 text-center" role="alert">
        <p>Untuk Pencarian Baru Tekan "Refresh" Untuk Mendapatkan Data Yang Akurat
            Aplikasi Ini Connect Langsung Dengan OMDb API
            Dengan Data Yang Asli Film Indo maupun Luar
        </p>
    </div>
    <div class="container">
        <div class="row mt-2 justify-content-center">
            <div class="col-md-9">
                <h4 class="text-center">Cari Film / Movie</h4>
                <div class="input-group mb-3">
                    <input id="input-cari" type="text" class="form-control" placeholder="Massukan film Yang Anda Cari">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" id="button-cari" type="button">Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-center">Daftar Film</h2>
            </div>
        </div>

        <div class="row" id="daftar-movie">

        </div>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small indigo fixed-bottom">
        <div class="alert alert-primary mt-1" role="alert">
            <div class="footer-copyright text-center py-3">© <?= date('Y'); ?> Aplikasi Pencarian Film
                <a href="https://www.instagram.com/indra.bas/"> By Indra Basuki</a>
            </div>
        </div>
    </footer>

    <script src="jquery/jquery-3.4.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $('#button-cari').on('click', function() {
            $.ajax({
                url: 'http://omdbapi.com',
                type: 'get',
                dataType: 'json',
                data: {
                    'apikey': 'd494d46',
                    's': $('#input-cari').val()
                },
                success: function(hasil) {
                    if (hasil.Response == "True") {
                        let film = hasil.Search;
                        $.each(film, function(i, data) {
                            $('#daftar-movie').append(`
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="` + data.Poster + `" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">` + data.Title + `</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Tahun : ` + data.Year + `</h6>
                                        <h6 class="card-subtitle mb-2 text-muted">imdbID:` + data.imdbID + `</h6>
                                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                        
                                    </div>
                                </div>
                            </div>                
                            `);
                        });

                    } else {
                        $('#daftar-movie').html('<h3>Tidak Ditemukan !!!</h3>');
                    }
                }
            })
        });
    </script>
</body>

</html>