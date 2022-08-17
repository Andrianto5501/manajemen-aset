<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
    <link href="<?= base_url(); ?>/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        .card-img-asset {
            overflow-y: hidden ! important;
            overflow-x: hidden ! important;
            background-color: #f8f8f8;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            width: 100%;
            height: 300px;
        }

        #container {
            width: 100%;
            max-width: 1024px;
            padding: 3rem;
        }

        @media (max-width: 500px) {
            #container {
                padding-left: 0;
                padding-right: 0;
            }
        }
    </style>
</head>

<body class="bg-primary">
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div id="container">
            <div class="text-white text-center">
                <h1 class="mb-4">Asset Management Scan</h1>
                <div>
                    <button class="btn bg-white rounded-circle" style="width: 4.5rem;height: 4.5rem;display: none;" id="btnScanQRCode"><i class="fa fa-camera fs-2"></i></button>
                    <!-- <button class="btn btn-danger rounded-circle" style="width: 4.5rem;height: 4.5rem;"><i class="fa fa-times fs-2"></i></button> -->
                </div>
                <!-- <input type="text" class="form-control form-control-lg rounded-pill p-4" placeholder="Enter Asset Code"> -->
            </div>
            <div class="w-100" id="qrcodeReader"></div>
            <h2 class="text-center" id="qrcodeResult"></h2>
            <div class="card mt-3" id="asetDetail" style="display: none;">
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Kel</th>
                                <td>:</td>
                                <td class="value_nomor"></td>
                            </tr>
                            <tr>
                                <th>Skel</th>
                                <td>:</td>
                                <td class="value_sub_nomor"></td>
                            </tr>
                            <tr>
                                <th>satuan</th>
                                <td>:</td>
                                <td class="value_satuan"></td>
                            </tr>
                            <tr>
                                <th>kd_barang</th>
                                <td>:</td>
                                <td class="value_kode_barang"></td>
                            </tr>
                            <tr>
                                <th>tercatat</th>
                                <td>:</td>
                                <td class="value_tercatat"></td>
                            </tr>
                            <tr>
                                <th>no_aset</th>
                                <td>:</td>
                                <td class="value_no_aset"></td>
                            </tr>
                            <tr>
                                <th>kd_lokasi</th>
                                <td>:</td>
                                <td class="value_kode_lokasi"></td>
                            </tr>
                            <tr>
                                <th>kd_perk</th>
                                <td>:</td>
                                <td class="value_kode_perkap"></td>
                            </tr>
                            <tr>
                                <th>kondisi</th>
                                <td>:</td>
                                <td class="value_kondisi_aset"></td>
                            </tr>
                            <tr>
                                <th>urai</th>
                                <td>:</td>
                                <td class="value_uraian_aset"></td>
                            </tr>
                            <tr>
                                <th>urperk</th>
                                <td>:</td>
                                <td class="value_uraian_perkap"></td>
                            </tr>
                            <tr>
                                <th>kd_ruang</th>
                                <td>:</td>
                                <td class="value_kode_ruang"></td>
                            </tr>
                            <tr>
                                <th>uraian_ruang</th>
                                <td>:</td>
                                <td class="value_uraian_ruang"></td>
                            </tr>
                            <tr>
                                <th>kd_gedung</th>
                                <td>:</td>
                                <td class="value_kode_gedung"></td>
                            </tr>
                            <tr>
                                <th>catat</th>
                                <td>:</td>
                                <td class="value_catatan"></td>
                            </tr>
                            <tr>
                                <th>kondi</th>
                                <td>:</td>
                                <td class="value_kondisi"></td>
                            </tr>
                            <tr>
                                <th>sakhir</th>
                                <td>:</td>
                                <td class="value_nominal_aset"></td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengadaan</th>
                                <td>:</td>
                                <td class="value_tanggal_pengadaan"></td>
                            </tr>
                            <tr>
                                <th>Sumber Pengadaan</th>
                                <td>:</td>
                                <td class="value_sumber_pengadaan"></td>
                            </tr>
                            <tr>
                                <th>Foto</th>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <img class="img-thumbnail w-100 value_foto" src="" alt="">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center mt-2">
                <a href="<?= site_url("home") ?>" class="btn bg-white">Back to Home</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js" integrity="sha512-xIPqqrfvUAc/Cspuj7Bq0UtHNo/5qkdyngx6Vwt+tmbvTLDszzXM0G6c91LXmGrRx8KEPulT+AfOOez+TeVylg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= base_url(); ?>/js/html5-qrcode.min.js"></script>
    <script src="<?= base_url(); ?>/js/scripts.js"></script>

    <script type="text/javascript">
        const html5QrCode = new Html5Qrcode("qrcodeReader");

        const startQRCodeScanner = () => {
            $("#asetDetail").hide();
            $("#btnScanQRCode").hide();
            $("#qrcodeReader").show();
            document.getElementById('qrcodeResult').innerHTML = "";
            html5QrCode.start({
                        facingMode: "environment"
                    }, {
                        fps: 10, // Optional, frame per seconds for qr code scanning
                        disableFlip: true,
                        qrbox: 250 // Optional, if you want bounded box UI
                    },
                    (decodedText, decodedResult) => {
                        html5QrCode.stop();
                        $("#qrcodeReader").hide();
                        // document.getElementById('qrcodeResult').innerHTML = decodedText;
                        getAset(decodedText);
                    },
                    (errorMessage) => {
                        // console.log(errorMessage)
                    })
                .catch((err) => {
                    // Start failed, handle it.
                });
        }

        const getAset = (kdBarang) => {
            axios.get("<?= site_url("AssetScan/getAsset") ?>?kode=" + kdBarang)
                .then((res) => {
                    let data = res.data;
                    if (typeof(data) == "object" && data?.nomor) {
                        console.log(data)
                        $("#asetDetail").show();
                        $("#btnScanQRCode").show();

                        $(".value_nomor").text(data.nomor ?? "-");
                        $(".value_sub_nomor").text(data.sub_nomor ?? "-");
                        $(".value_satuan").text(data.satuan ?? "-");
                        $(".value_kode_barang").text(data.kode_barang ?? "-");
                        $(".value_tercatat").text(data.tercatat ?? "-");
                        $(".value_no_aset").text(data.no_aset ?? "-");
                        $(".value_kode_lokasi").text(data.kode_lokasi ?? "-");
                        $(".value_kode_perkap").text(data.kode_perkap ?? "-");
                        $(".value_kondisi_aset").text(data.kondisi_aset ?? "-");
                        $(".value_uraian_aset").text(data.uraian_aset ?? "-");
                        $(".value_uraian_perkap").text(data.uraian_perkap ?? "-");
                        $(".value_kode_ruang").text(data.kode_ruang ?? "-");
                        $(".value_uraian_ruang").text(data.uraian_ruang ?? "-");
                        $(".value_kode_gedung").text(data.kode_gedung ?? "-");
                        $(".value_catatan").text(data.catatan ?? "-");
                        $(".value_kondisi").text(data.kondisi ?? "-");
                        $(".value_nominal_aset").text(data.nominal_aset ?? "-");
                        $(".value_tanggal_pengadaan").text(data.tanggal_pengadaan ?? "-");
                        $(".value_sumber_pengadaan").text(data.sumber_pengadaan ?? "-");
                        $(".value_foto").attr("src", (data.foto ? "<?= base_url() ?>/img/aset/" + data.foto : ""));
                    } else {
                        alert("Aset tidak ditemukan");
                        startQRCodeScanner();
                    }
                })
        }

        (() => {
            startQRCodeScanner();

            $("#btnScanQRCode").on("click", () => {
                startQRCodeScanner();
            })
        })();
    </script>
</body>

</html>