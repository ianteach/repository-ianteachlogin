<!-- <div class="container">

<?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">Data
                    <strong>berhasil</strong>
                    <?= $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?> -->
<!-- <div class="row mt-3">
        <div class="col-md-6">
        </div>
    </div>
</div> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hello, <?= $user['name']; ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.css" rel="stylesheet">


</head>


<body>

    <div class="container">
        <header class="header">
            <div class="hero">
                <!-- jumbotron -->
                <div class="jumbotron text-center">
                    <img src="<?= base_url('assets/'); ?>img/hero/fotoku.png">
                    <h1>&copy; Muhammad Ryan</h1>
                    <p>Universitas Pembangunan Pancabudi</p>
                </div>
                <!-- akhir jumbotron -->
                <h2 class="heading"><?= $title; ?><br>
                    "<span class="efek-ngetik"></span></h2>
                <p class="sub-heading"> Welcome to My Website </p>
            </div>
            <div class="features feature-1">
                <h4 class="icon"><a href="<?= base_url('info/absen'); ?>" target="blank" style="text-decoration:none">📝</a></h4>
                <p class="item">Attandance List (Absen)</p>
            </div>
            <div class="features feature-2">
                <h4 class="icon"><a href="<?= base_url('info/classroom'); ?>" target="blank" style="text-decoration:none">🏫</a></h4>
                <p class="item">Classroom</p>
            </div>
        </header>


        <nav class="menu">
            <!-- menu mobile -->
            <div class="menu-toggle">
                <input type="checkbox">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="brand">
                <h1>Hello, <?= $user['name']; ?></h1>
            </div>
            <ul class="menu-list">
                <li><a href="<?= base_url('info'); ?>">My Web Pages</a></li>
                <li><a href="<?= base_url('info/absen'); ?>" target="blank">Attandance List (Absen)</a></li>
                <li><a href="<?= base_url('info/classroom'); ?>" target="blank">Classroom</a></li>
                <li><a href="<?= base_url('admin/teachers_room'); ?>" target="blank">Teacher's Room</a></li>
            </ul>
        </nav>

        <!-- Service -->
        <section class="services">
            <div class="service">
                <div class="icon">📖</div>
                <h3>Learning Materials</h3>
                <p>Lerning Material (Media Pembelajaran), yang akan disajikan di Website ini adalah Media Pembelajaran yang berkaitan dengan Networking Fundamental, dan materi-materi yang disajikan juga berkaitan dengan Networking dalam membangun suatu Server dengan menggunakan Linux Debian Server.
                </p>
            </div>

            <div class="service">
                <div class="icon">💻</div>
                <h3>Tutorial</h3>
                <p>Video Tutorial dalam Media Pembelajaran ini semuanya berkaitan dengan Networking Fundamental, yang dimana Video Tutorial ini akan menjelaskan tentang cara Penginstallasian Debian Server, Konfigurasi Debian Server, Serta Penggunaan nya dari "Awal" hingga hingga "Akhir".
                </p>
            </div>

            <div class="service">
                <div class="icon">💾</div>
                <h3>Android Application</h3>
                <p>Android Application (Aplikasi Android), Penulis juga membuat Aplikasi Android yang dapat di install di semua pengguna SmartPhone berbasis (Android) yang dapat digunakan oleh pengguna untuk Media Pembelajaran. Dan di dalam Aplikasi Android ini terdapat fitur-fitur menarik seperti Materi, Video, dan Quiz.
                </p>
            </div>
        </section>

        <!-- Menu Pembelajaran -->
        <section class="pembelajaran">
            <div class="service">
                <div class="icon">📌</div>
                <h3><a href="#" style="text-decoration:none">Attantion!</a></h3>
                <p>Sebelum kalian mengunjungi Layanan Website Pembelajaran ini lebih jauh, Alangkah Baiknya Login terlebih dahulu ke layanan Akun Google Account untuk mendapatkan hasil yang MASKIMAL! <br> <a href="https://accounts.google.com/ServiceLogin/identifier?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="btn btn-danger fab fa-google" target="blank"> Click Here for Login your Google Account!</a>
                </p>
            </div>


            <div class="service">
                <div class="icon"><i class="fab fa-whatsapp"></i></div>
                <h3><a href="#" style="text-decoration:none">Join Group</a></h3>
                <p>Untuk memanfaatkan Layanan Berdiskusi didalam Web ini, Pengunjung dapat melakukan Join ke Group WhatsApps untuk mendapatkan informasi-informasi yang menarik seputar Pembelajaran Networking Fundamental.<br><a href="https://chat.whatsapp.com/G3OHSzsq9C23wWjn9LUXrm" class="btn btn-success fab fa-whatsapp" target="blank"> Click Here for Join Group WhatsApps</a>
                </p>
            </div>

        </section>
    </div>



    <!-- Contact -->
    <section class="contacts">
        <div class="service">
            <div class="icon">🏠</div>
            <h4><a href="https://www.google.co.id/maps/place/Gg.+Ambarsari,+Karang+Berombak,+Kec.+Medan+Bar.,+Kota+Medan,+Sumatera+Utara/" style="text-decoration:none" target="blank">Alamat</a></h4>
            <p>Jl. Karya Gg. Ambarsari No.3 Medan</p>
        </div>

        <div class="service">
            <div class="icon">🌏</div>
            <h4><a href="https://ryan-develop.github.io" style="text-decoration:none" target="blank">MyWebsite</a></h4>
            <p>https://ryan-develop.github.io</p>
        </div>

        <div class="service">
            <div class="icon">😼</div>
            <h4><a href="https://github.com/Ryan-Develop" style="text-decoration:none" target="blank">Git Hub</a></h4>
            <p>https://github.com/Ryan-Develop</p>
        </div>


    </section>

    <footer>
        <div class="container-footer">
            <span>Copyright &copy; Muhammad Ryan - ianTeach<sup>iT</sup>
                <?= date('Y'); ?> </span>

        </div>
    </footer>

    <!-- Data Script-->

    <script src="<?= base_url('assets/'); ?>js/script.js"></script>
    <script src="<?= base_url('assets/'); ?>js/script1.js"></script>
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>