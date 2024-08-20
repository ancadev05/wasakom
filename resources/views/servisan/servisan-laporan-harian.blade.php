@extends('template-dashboard.template-niceadmin')

@section('title')
    Laporan Teknisi
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Laporan Harian</h1>
    </div>



    <section class="section">
        {{-- manampilkan laporan harian teknisi --}}
        <div class="card p-3">
            <form action="{{ url('laporan-teknisi-harian') }}" method="post">
                @csrf
                <div class="row align-items-end">
                    <div class="col-12 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="tgl_awal">Tanggal Awal:</label>
                            <input class="form-control @error('tgl_awal') is-invalid @enderror" type="date"
                                name="tgl_awal" id="tgl_awal" value="{{ old('tgl_awal') }}">
                            @error('tgl_awal')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="tgl_akhir">Tanggal Akhir:</label>
                            <input class="form-control @error('tgl_akhir') is-invalid @enderror" type="date"
                                name="tgl_akhir" id="tgl_akhir" value="{{ old('tgl_akhir') }}">
                            @error('tgl_akhir')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="d-grid col-lg-1 mb-3">
                        <button type="submit" class="btn  btn-success shadow-sm">Cek</button>
                    </div>
                </div>
            </form>
        </div>

        {{-- loader export --}}
        <div id="bg-loader" class="d-none">
            <span id="loader-export-text">Export file</span>
            <div id="loader-export"></div>
        </div>

        {{-- <button id="coba">coba</button> --}}

        @if ($tgl_awal)
            {{-- export pdf --}}
            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-sm btn-danger" id="export-pdf"><i class="bi bi-file-pdf"></i> Export PDF</button>
            </div>

            <div class="card p-3" id="document-pdf">
                {{-- kop laporan --}}
                <div class="d-flex border-bottom border-2 border-dark mb-3 justify-content-center align-items-center p-2">
                    <img src="{{ asset('assets/img/logo-wana.png') }}" alt="" width="100px" class="me-3">
                    <div class="text-center p-0 m-0" style="line-height: 1">
                        <h4 class="p-0 m-0">CV. WANA SATRIA KOMPUTINDO</h4>
                        <h5 class="p-0 m-0">LAPORAN DEVISI TEKNISI</h5>
                        <h6 class="p-0 m-0">Per Tanggal {{ tanggalIndonesia($tgl_awal) }} -
                            {{ tanggalIndonesia($tgl_akhir) }}</h6>
                        <span style="font-size: 11px" class="p-0 m-0 d-block"><i>Jl. Monumen Emmy Saelan No. 9C, Kel. Gn.
                                Sari, Kec. Rappocini, Kota Makassar</i></span>
                        <span style="font-size: 11px" class="p-0 m-0 d-block"><i>Whatsapp : 08117229354, E-Mail :
                                cvwanasatria.id@gmail.com</i></span>
                    </div>
                </div>

                <ul>
                    @foreach ($servisans as $item)
                        <li>{{ $item->tgl_masuk }}</li>
                    @endforeach
                </ul>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Merek Laptop User</h5>

                                <!-- Bar Chart -->
                                <div id="user"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#user"), {
                                            series: [{
                                                data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
                                            }],
                                            chart: {
                                                type: 'bar',
                                                height: 350
                                            },
                                            plotOptions: {
                                                bar: {
                                                    borderRadius: 4,
                                                    horizontal: true,
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            xaxis: {
                                                categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy',
                                                    'France', 'Japan',
                                                    'United States', 'China', 'Germany'
                                                ],
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Bar Chart -->

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Merek Laptop User</h5>

                                <!-- Bar Chart -->
                                <div id="toko"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#toko"), {
                                            series: [{
                                                data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
                                            }],
                                            chart: {
                                                type: 'bar',
                                                height: 350
                                            },
                                            plotOptions: {
                                                bar: {
                                                    borderRadius: 4,
                                                    horizontal: true,
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            xaxis: {
                                                categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy',
                                                    'France', 'Japan',
                                                    'United States', 'China', 'Germany'
                                                ],
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Bar Chart -->

                            </div>
                        </div>
                    </div>

                    <p style="text-align: justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem, dolor
                        consequatur illum officia iste
                        sapiente rerum alias esse ipsum tenetur voluptatibus reprehenderit nostrum fugit hic adipisci neque
                        ullam quos optio nobis ad? Fuga nostrum reprehenderit placeat minima atque nam ex, impedit ducimus,
                        vel magnam ullam aspernatur perspiciatis animi neque rerum tempore praesentium eos itaque voluptate
                        inventore nemo. Dolorem, placeat inventore delectus accusamus, saepe blanditiis cupiditate dolor
                        officiis minima error sequi similique reprehenderit. Modi inventore neque, atque at ipsam molestiae
                        porro! Doloribus alias repellendus ea! Impedit magnam dolores error ratione ad dolorem aliquid
                        necessitatibus voluptatem eaque, pariatur earum, minima veniam maiores dicta hic laudantium harum
                        eligendi dolore ab optio perferendis rem? Dolore inventore accusamus qui quas dolorum adipisci
                        delectus provident voluptatibus corporis doloremque, laborum aut odit soluta illum. Qui, molestias
                        ex veritatis pariatur saepe labore nesciunt nostrum provident velit esse quae alias reprehenderit
                        tenetur recusandae eveniet eius temporibus totam aperiam, odio nemo inventore aspernatur dolorem
                        ullam? Cupiditate consequatur, deserunt aut perferendis doloribus earum quaerat ipsa ipsam
                        dignissimos nihil labore impedit saepe amet iusto illo in voluptate itaque voluptatem! Voluptatibus
                        vitae amet maxime illum natus temporibus, sapiente deserunt fuga rerum aliquid sunt nostrum
                        reiciendis mollitia at repudiandae neque suscipit quia maiores similique deleniti aut adipisci
                        aperiam. Ea, praesentium quis molestias sunt exercitationem nisi fugiat, atque nam tempore quibusdam
                        omnis autem reprehenderit? Tempora obcaecati quos minima, tempore voluptatibus libero consequuntur
                        quas natus. Sit voluptatem sapiente vel nesciunt ullam voluptatibus, possimus quisquam deserunt a
                        amet, repudiandae itaque est soluta. Unde, sint odit quas blanditiis accusamus voluptatibus est,
                        voluptatum iusto placeat laboriosam doloribus! Reprehenderit rerum eligendi exercitationem! Eos
                        consequatur hic quis error pariatur, dolor voluptates doloremque sunt officiis, rem laboriosam,
                        voluptatum ipsum repellendus? Dolorem non facere ipsa aliquid consequuntur? Ab repudiandae quae
                        nobis enim illum magnam corporis similique quaerat deserunt unde? Minus inventore sequi consectetur
                        tenetur similique repudiandae quasi dignissimos quisquam tempora quibusdam officiis ratione magnam,
                        accusamus modi, est exercitationem neque asperiores eum eveniet odit saepe pariatur soluta rerum.
                        Saepe aperiam perferendis dolorem dicta recusandae ab voluptas tempore accusamus harum quod quam
                        laudantium ducimus dolores, optio quisquam, atque et natus qui pariatur incidunt consequuntur
                        eveniet. Esse nihil nostrum incidunt deserunt. Inventore maiores asperiores, odit minus ipsa
                        tempora! Veritatis consequuntur iste, et veniam quam quae quas odio ipsam possimus saepe id ipsa
                        voluptatibus omnis sapiente. Accusantium incidunt sunt, officia quos, numquam culpa quo inventore
                        suscipit odit odio dolor dolore commodi ducimus fuga maxime eum. Culpa consectetur vitae magnam
                        aperiam iste officia quibusdam voluptatem repudiandae, enim, facere cum atque? Facere iste nobis
                        sequi rerum nesciunt laborum, consequatur explicabo eveniet, accusantium ad cumque, officiis hic
                        earum sed velit sint facilis quod a consectetur dolores. Ducimus odit deleniti esse natus.
                        Asperiores facilis voluptatibus reprehenderit quidem nobis sunt commodi. Asperiores at pariatur
                        ducimus. Nam odit, sunt, repellat consequuntur accusamus unde magnam doloremque dignissimos
                        doloribus quae cupiditate? Libero praesentium necessitatibus quia maiores, qui optio iusto ut est
                        doloribus temporibus velit autem labore nesciunt dolores in repudiandae consectetur natus sequi
                        inventore soluta, rem at quis dolor veniam! In mollitia commodi sapiente itaque corrupti at eos hic
                        aspernatur aut quod adipisci ipsum, earum molestiae sed ab laudantium soluta aliquid quo voluptatem
                        blanditiis aperiam? Esse animi perferendis quae corporis aperiam modi tempore nulla maiores, id,
                        assumenda, voluptatum quisquam. Earum mollitia consequatur amet tenetur expedita iste, eaque quidem
                        repellat nobis quaerat recusandae? Et suscipit ad esse. Eaque, consequuntur. Corrupti adipisci
                        perspiciatis aliquid! Error, facilis suscipit. Voluptatum tenetur cum architecto facilis ullam omnis
                        eius aperiam consequuntur temporibus deleniti consequatur enim tempora, quasi dignissimos eveniet
                        facere ea dolore voluptatem. Nesciunt quas est vero molestias. Dolor iure asperiores quidem porro
                        doloribus autem unde necessitatibus, laudantium molestiae quisquam exercitationem, excepturi iste.
                        Consequuntur consectetur architecto facilis eum excepturi totam quo. Repudiandae quos cupiditate
                        quam culpa doloremque quidem sed corporis qui iste, officiis saepe impedit praesentium obcaecati,
                        voluptas nobis ipsa eius fugit incidunt consequuntur reiciendis adipisci similique porro atque
                        labore. Dolor quae ipsam optio eveniet eius error odit, ea voluptatem veniam nihil molestiae
                        deserunt qui perspiciatis incidunt earum pariatur nesciunt blanditiis perferendis! Optio neque
                        architecto accusamus enim iusto laudantium pariatur repellendus dicta alias deleniti? Laborum fugit
                        eligendi quisquam cumque. Impedit omnis voluptatum fuga exercitationem. Sint, facilis quod qui odit
                        consequuntur magni quis explicabo, laudantium voluptas exercitationem aliquid veniam laborum
                        mollitia odio excepturi perspiciatis delectus eos voluptate recusandae quaerat debitis! Ab ipsum
                        mollitia, quasi vitae numquam dolorem quidem, porro impedit laudantium harum inventore aliquam
                        quaerat? Laudantium esse quod voluptate sed impedit amet, optio natus quos excepturi iusto? Pariatur
                        assumenda at atque, libero in molestias magni quam animi modi similique dignissimos beatae alias!
                        Qui blanditiis minus iure corporis itaque eveniet temporibus repellendus tenetur. Ea hic autem
                        quidem doloribus fuga error culpa quasi illo voluptatum iure, possimus eaque, beatae explicabo, amet
                        ipsum tempora. Laboriosam omnis exercitationem animi, accusamus ullam illum debitis perferendis
                        dignissimos consequatur, eum fugiat at maiores culpa dolorum iure dolore cumque. Maiores sed, rerum
                        aperiam reprehenderit doloremque ab nisi aut tempore fugiat dolorum necessitatibus veniam quae.
                        Similique ipsum adipisci nam, ad autem aperiam doloremque sit explicabo soluta eum possimus eius
                        placeat architecto perferendis eos, veritatis inventore sed consectetur animi obcaecati ipsam
                        assumenda ut voluptates! Nemo eos ullam tempore quae quasi natus ab aut vero quia ipsa, earum nisi
                        asperiores eligendi minus odio iusto at blanditiis, adipisci dolorem? Officia at iusto vel expedita?
                        Ea cumque fugit impedit est sequi ipsam assumenda culpa ad odit aut corporis quidem, aliquam magni
                        veritatis omnis dolorem voluptatum. Provident deleniti quisquam porro voluptatibus cumque ipsam
                        eveniet rerum quas laborum libero ullam molestiae repellat, nulla fugiat quaerat. Quibusdam
                        distinctio aliquam veritatis quis deserunt quos expedita quam cum delectus explicabo obcaecati velit
                        nisi earum excepturi vitae corporis numquam, accusantium repellat illo natus, itaque laboriosam.
                        Temporibus ipsum illum eos quae nam natus unde veritatis officia quis quam blanditiis officiis
                        dolorem quidem voluptatibus accusantium doloribus, in iste? Repellendus impedit fuga consectetur?
                        Dolore deserunt quod fugiat ab ipsam nisi eum eaque. Nesciunt quia, quidem dolor soluta quam
                        architecto vero at laboriosam necessitatibus quas similique recusandae assumenda sit blanditiis
                        alias doloremque possimus culpa ratione. Repudiandae cumque esse reiciendis atque explicabo est odit
                        facere aliquam.</p>
                </div> {{-- end row --}}
            </div> {{-- end card --}}
        @endif



    </section>
@endsection

