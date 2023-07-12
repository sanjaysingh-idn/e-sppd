<?php

namespace Database\Seeders;

use App\Models\BiayaTiketPesawat;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Golongan;
use App\Models\MataAnggaran;
use App\Models\Representasi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        MataAnggaran::create([
            'kode_mak'      => '3722.PAC.002.051.A.524111',
            'ket'           => '',
            'input_by'      => 'Dima Septa',
        ]);

        Representasi::create([
            'pangkat'       => 'PEJABAT ESELON I',
            'luar_kota'     => 250000,
            'dalam_kota'    => 125000,
        ]);

        Representasi::create([
            'pangkat'       => 'PEJABAT ESELON II',
            'luar_kota'     => 200000,
            'dalam_kota'    => 100000,
        ]);

        Representasi::create([
            'pangkat'       => 'PEJABAT ESELON III',
            'luar_kota'     => 150000,
            'dalam_kota'    => 75000,
        ]);

        User::create([
            'jabatan_id'    => 1,
            'golongan_id'   => 1,
            'name'          => 'Dima Septa',
            'nip'           => '199917062003',
            'email'         => 'admin@gmail.com',
            'role'          => 'admin',
            'contact'       => '0895327788649',
            'address'       => 'lorem',
            'password'      => bcrypt('password'),
        ]);

        User::create([
            'jabatan_id'    => 1,
            'golongan_id'   => 1,
            'name'          => 'Ahmad Akmal',
            'nip'           => '199917062004',
            'email'         => 'pegawai@gmail.com',
            'role'          => 'pegawai',
            'contact'       => '081234567891',
            'address'       => 'lorem',
            'password'      => bcrypt('password'),
        ]);

        User::create([
            'jabatan_id'    => 1,
            'golongan_id'   => 1,
            'name'          => 'Eko Purwanto',
            'nip'           => '199917062005',
            'email'         => 'ekopurwanto@gmail.com',
            'role'          => 'pegawai',
            'contact'       => '081234567891',
            'address'       => 'lorem',
            'password'      => bcrypt('password'),
        ]);

        User::create([
            'jabatan_id'    => 3,
            'golongan_id'   => 7,
            'name'          => 'Beny Wahyudi',
            'nip'           => '199917062226',
            'email'         => 'beny@gmail.com',
            'role'          => 'pegawai',
            'contact'       => '081234567891',
            'address'       => 'lorem',
            'password'      => bcrypt('password'),
        ]);

        User::create([
            'jabatan_id'    => 3,
            'golongan_id'   => 8,
            'name'          => 'Rahmat Efendy',
            'nip'           => '1999170623361',
            'email'         => 'rahmat@gmail.com',
            'role'          => 'pegawai',
            'contact'       => '081234567891',
            'address'       => 'lorem',
            'password'      => bcrypt('password'),
        ]);

        User::create([
            'jabatan_id'    => 3,
            'golongan_id'   => 6,
            'name'          => 'Danu Mulki',
            'nip'           => '1999170623141',
            'email'         => 'danu@gmail.com',
            'role'          => 'pegawai',
            'contact'       => '081234567891',
            'address'       => 'lorem',
            'password'      => bcrypt('password'),
        ]);

        User::create([
            'jabatan_id'    => 3,
            'golongan_id'   => 6,
            'name'          => 'Restu Aryadi',
            'nip'           => '19991706214314',
            'email'         => 'restu@gmail.com',
            'role'          => 'pegawai',
            'contact'       => '081234567891',
            'address'       => 'lorem',
            'password'      => bcrypt('password'),
        ]);
        User::create([
            'jabatan_id'    => 2,
            'golongan_id'   => 3,
            'name'          => 'Drs. Widiantoro Puji W., M.Si',
            'nip'           => '19991706214532',
            'email'         => 'penanggungjwb@gmail.com',
            'role'          => 'penanggung jawab kegiatan',
            'contact'       => '081234567891',
            'address'       => 'lorem',
            'password'      => bcrypt('password'),
        ]);
        User::create([
            'jabatan_id'    => 2,
            'golongan_id'   => 3,
            'name'          => 'Erwansyah, S.E., M.Si.',
            'nip'           => '199917062152521',
            'email'         => 'ppk@gmail.com',
            'role'          => 'pejabat pembuat komitmen',
            'contact'       => '081234567891',
            'address'       => 'lorem',
            'password'      => bcrypt('password'),
        ]);
        User::create([
            'jabatan_id'    => 2,
            'golongan_id'   => 4,
            'name'          => 'Resti Gustiawati',
            'nip'           => '19991706215887',
            'email'         => 'bendahara@gmail.com',
            'role'          => 'bendahara pengeluaran',
            'contact'       => '081234567891',
            'address'       => 'lorem',
            'password'      => bcrypt('password'),
        ]);

        Jabatan::create([
            'jabatan_id'    => 1,
            'jabatan_name'  => 'Direktur Bina Usaha Dan Pelaku Distribusi',
            'jabatan_alias' => 'Dirut',
        ]);
        Jabatan::create([
            'jabatan_id'    => 2,
            'jabatan_name'  => 'Kepala Subdirektorat Distribusi Langsung Dan Waralaba pada Dit. Bina Usaha dan Pelaku Distribusi',
            'jabatan_alias' => 'Kasub',
        ]);
        Jabatan::create([
            'jabatan_id'    => 3,
            'jabatan_name'  => 'Analis Perdagangan pada Dit. Bina Usaha dan Pelaku Distribusi',
            'jabatan_alias' => 'Analsis',
        ]);
        Jabatan::create([
            'jabatan_id'    => 4,
            'jabatan_name'  => 'Honorer pada Dit. Bina Usaha dan Pelaku Distribusi',
            'jabatan_alias' => 'Honorer',
        ]);

        Golongan::create([
            'golongan_id'    => 1,
            'golongan_name'  => 'PEJABAT ESELON I',
        ]);
        Golongan::create([
            'golongan_id'    => 2,
            'golongan_name'  => 'PEJABAT ESELON II',
        ]);
        Golongan::create([
            'golongan_id'    => 3,
            'golongan_name'  => 'PEJABAT ESELON III',
        ]);
        Golongan::create([
            'golongan_id'    => 4,
            'golongan_name'  => 'PEJABAT ESELON IV',
        ]);
        Golongan::create([
            'golongan_id'    => 5,
            'golongan_name'  => 'GOLONGAN IV',
        ]);
        Golongan::create([
            'golongan_id'    => 6,
            'golongan_name'  => 'GOLONGAN III',
        ]);
        Golongan::create([
            'golongan_id'    => 7,
            'golongan_name'  => 'GOLONGAN II',
        ]);
        Golongan::create([
            'golongan_id'    => 8,
            'golongan_name'  => 'GOLONGAN I',
        ]);

        BiayaTiketPesawat::create([
            'asal'          => 'TANGERANG',
            'tujuan'        => 'BANDA ACEH',
            'besaran'       => 3425000
        ]);
    }
}
// INPUT PROVINSI & BIAYA 
// ganti provinsi ke biaya
// INSERT INTO `biayas` (`prov_id`, `nama_provinsi`) VALUES
// (1, 'ACEH'),
// (2, 'SUMATERA UTARA'),
// (3, 'SUMATERA BARAT'),
// (4, 'RIAU'),
// (5, 'JAMBI'),
// (6, 'SUMATERA SELATAN'),
// (7, 'BENGKULU'),
// (8, 'LAMPUNG'),
// (9, 'KEPULAUAN BANGKA BELITUNG'),
// (10, 'KEPULAUAN RIAU'),
// (11, 'DKI JAKARTA'),
// (12, 'JAWA BARAT'),
// (13, 'JAWA TENGAH'),
// (14, 'DI YOGYAKARTA'),
// (15, 'JAWA TIMUR'),
// (16, 'BANTEN'),
// (17, 'BALI'),
// (18, 'NUSA TENGGARA BARAT'),
// (19, 'NUSA TENGGARA TIMUR'),
// (20, 'KALIMANTAN BARAT'),
// (21, 'KALIMANTAN TENGAH'),
// (22, 'KALIMANTAN SELATAN'),
// (23, 'KALIMANTAN TIMUR'),
// (24, 'KALIMANTAN UTARA'),
// (25, 'SULAWESI UTARA'),
// (26, 'SULAWESI TENGAH'),
// (27, 'SULAWESI SELATAN'),
// (28, 'SULAWESI TENGGARA'),
// (29, 'GORONTALO'),
// (30, 'SULAWESI BARAT'),
// (31, 'MALUKU'),
// (32, 'MALUKU UTARA'),
// (33, 'PAPUA'),
// (34, 'PAPUA BARAT');
// BIAYA

// SET TUJUAN
// UPDATE `biayas` SET tgl_lahir=, dalam_kota=0, diklat=0, eselon_1=0, eselon_2=0, eselon_3_golongan_4=0, eselon_4_golongan_3=0, biaya_taksi=0;
// TUJUAN

// UPDATE `users` SET `tgl_lahir` = '1995-12-07';

// INPUT KOTA

// INSERT INTO `kotas` (`city_id`, `nama_kota`, `prov_id`) VALUES
// (1, 'PIDIE JAYA', 1),
// (2, 'SIMEULUE', 1),
// (3, 'BIREUEN', 1),
// (4, 'ACEH TIMUR', 1),
// (5, 'ACEH UTARA', 1),
// (6, 'PIDIE', 1),
// (7, 'ACEH BARAT DAYA', 1),
// (8, 'GAYO LUES', 1),
// (9, 'ACEH SELATAN', 1),
// (10, 'ACEH TAMIANG', 1),
// (11, 'ACEH BESAR', 1),
// (12, 'ACEH TENGGARA', 1),
// (13, 'BENER MERIAH', 1),
// (14, 'ACEH JAYA', 1),
// (15, 'LHOKSEUMAWE', 1),
// (16, 'ACEH BARAT', 1),
// (17, 'NAGAN RAYA', 1),
// (18, 'LANGSA', 1),
// (19, 'BANDA ACEH', 1),
// (20, 'ACEH SINGKIL', 1),
// (21, 'SABANG', 1),
// (22, 'ACEH TENGAH', 1),
// (23, 'SUBULUSSALAM', 1),
// (24, 'NIAS SELATAN', 2),
// (25, 'MANDAILING NATAL', 2),
// (26, 'DAIRI', 2),
// (27, 'LABUHAN BATU UTARA', 2),
// (28, 'TAPANULI UTARA', 2),
// (29, 'SIMALUNGUN', 2),
// (30, 'LANGKAT', 2),
// (31, 'SERDANG BEDAGAI', 2),
// (32, 'TAPANULI SELATAN', 2),
// (33, 'ASAHAN', 2),
// (34, 'PADANG LAWAS UTARA', 2),
// (35, 'PADANG LAWAS', 2),
// (36, 'LABUHAN BATU SELATAN', 2),
// (37, 'PADANG SIDEMPUAN', 2),
// (38, 'TOBA SAMOSIR', 2),
// (39, 'TAPANULI TENGAH', 2),
// (40, 'HUMBANG HASUNDUTAN', 2),
// (41, 'SIBOLGA', 2),
// (42, 'BATU BARA', 2),
// (43, 'SAMOSIR', 2),
// (44, 'PEMATANG SIANTAR', 2),
// (45, 'LABUHAN BATU', 2),
// (46, 'DELI SERDANG', 2),
// (47, 'GUNUNGSITOLI', 2),
// (48, 'NIAS UTARA', 2),
// (49, 'NIAS', 2),
// (50, 'KARO', 2),
// (51, 'NIAS BARAT', 2),
// (52, 'MEDAN', 2),
// (53, 'PAKPAK BHARAT', 2),
// (54, 'TEBING TINGGI', 2),
// (55, 'BINJAI', 2),
// (56, 'TANJUNG BALAI', 2),
// (57, 'DHARMASRAYA', 3),
// (58, 'SOLOK SELATAN', 3),
// (59, 'SIJUNJUNG (SAWAH LUNTO SIJUNJUNG)', 3),
// (60, 'PASAMAN BARAT', 3),
// (61, 'SOLOK', 3),
// (62, 'PASAMAN', 3),
// (63, 'PARIAMAN', 3),
// (64, 'TANAH DATAR', 3),
// (65, 'PADANG PARIAMAN', 3),
// (66, 'PESISIR SELATAN', 3),
// (67, 'PADANG', 3),
// (68, 'SAWAH LUNTO', 3),
// (69, 'LIMA PULUH KOTO / KOTA', 3),
// (70, 'AGAM', 3),
// (71, 'PAYAKUMBUH', 3),
// (72, 'BUKITTINGGI', 3),
// (73, 'PADANG PANJANG', 3),
// (74, 'KEPULAUAN MENTAWAI', 3),
// (75, 'INDRAGIRI HILIR', 4),
// (76, 'KUANTAN SINGINGI', 4),
// (77, 'PELALAWAN', 4),
// (78, 'PEKANBARU', 4),
// (79, 'ROKAN HILIR', 4),
// (80, 'BENGKALIS', 4),
// (81, 'INDRAGIRI HULU', 4),
// (82, 'ROKAN HULU', 4),
// (83, 'KAMPAR', 4),
// (84, 'KEPULAUAN MERANTI', 4),
// (85, 'DUMAI', 4),
// (86, 'SIAK', 4),
// (87, 'TEBO', 5),
// (88, 'TANJUNG JABUNG BARAT', 5),
// (89, 'MUARO JAMBI', 5),
// (90, 'KERINCI', 5),
// (91, 'MERANGIN', 5),
// (92, 'BUNGO', 5),
// (93, 'TANJUNG JABUNG TIMUR', 5),
// (94, 'SUNGAIPENUH', 5),
// (95, 'BATANG HARI', 5),
// (96, 'JAMBI', 5),
// (97, 'SAROLANGUN', 5),
// (98, 'PALEMBANG', 6),
// (99, 'LAHAT', 6),
// (100, 'OGAN KOMERING ULU TIMUR', 6),
// (101, 'MUSI BANYUASIN', 6),
// (102, 'PAGAR ALAM', 6),
// (103, 'OGAN KOMERING ULU SELATAN', 6),
// (104, 'BANYUASIN', 6),
// (105, 'MUSI RAWAS', 6),
// (106, 'MUARA ENIM', 6),
// (107, 'OGAN KOMERING ULU', 6),
// (108, 'OGAN KOMERING ILIR', 6),
// (109, 'EMPAT LAWANG', 6),
// (110, 'LUBUK LINGGAU', 6),
// (111, 'PRABUMULIH', 6),
// (112, 'OGAN ILIR', 6),
// (113, 'BENGKULU TENGAH', 7),
// (114, 'REJANG LEBONG', 7),
// (115, 'MUKO MUKO', 7),
// (116, 'KAUR', 7),
// (117, 'BENGKULU UTARA', 7),
// (118, 'LEBONG', 7),
// (119, 'KEPAHIANG', 7),
// (120, 'BENGKULU SELATAN', 7),
// (121, 'SELUMA', 7),
// (122, 'BENGKULU', 7),
// (123, 'LAMPUNG UTARA', 8),
// (124, 'WAY KANAN', 8),
// (125, 'LAMPUNG TENGAH', 8),
// (126, 'MESUJI', 8),
// (127, 'PRINGSEWU', 8),
// (128, 'LAMPUNG TIMUR', 8),
// (129, 'LAMPUNG SELATAN', 8),
// (130, 'TULANG BAWANG', 8),
// (131, 'TULANG BAWANG BARAT', 8),
// (132, 'TANGGAMUS', 8),
// (133, 'LAMPUNG BARAT', 8),
// (134, 'PESISIR BARAT', 8),
// (135, 'PESAWARAN', 8),
// (136, 'BANDAR LAMPUNG', 8),
// (137, 'METRO', 8),
// (138, 'BELITUNG', 9),
// (139, 'BELITUNG TIMUR', 9),
// (140, 'BANGKA', 9),
// (141, 'BANGKA SELATAN', 9),
// (142, 'BANGKA BARAT', 9),
// (143, 'PANGKAL PINANG', 9),
// (144, 'BANGKA TENGAH', 9),
// (145, 'KEPULAUAN ANAMBAS', 10),
// (146, 'BINTAN', 10),
// (147, 'NATUNA', 10),
// (148, 'BATAM', 10),
// (149, 'TANJUNG PINANG', 10),
// (150, 'KARIMUN', 10),
// (151, 'LINGGA', 10),
// (152, 'JAKARTA UTARA', 11),
// (153, 'JAKARTA BARAT', 11),
// (154, 'JAKARTA TIMUR', 11),
// (155, 'JAKARTA SELATAN', 11),
// (156, 'JAKARTA PUSAT', 11),
// (157, 'KEPULAUAN SERIBU', 11),
// (158, 'DEPOK', 12),
// (159, 'KARAWANG', 12),
// (160, 'CIREBON', 12),
// (161, 'BANDUNG', 12),
// (162, 'SUKABUMI', 12),
// (163, 'SUMEDANG', 12),
// (164, 'INDRAMAYU', 12),
// (165, 'MAJALENGKA', 12),
// (166, 'KUNINGAN', 12),
// (167, 'TASIKMALAYA', 12),
// (168, 'CIAMIS', 12),
// (169, 'SUBANG', 12),
// (170, 'PURWAKARTA', 12),
// (171, 'BOGOR', 12),
// (172, 'BEKASI', 12),
// (173, 'GARUT', 12),
// (174, 'PANGANDARAN', 12),
// (175, 'CIANJUR', 12),
// (176, 'BANJAR', 12),
// (177, 'BANDUNG BARAT', 12),
// (178, 'CIMAHI', 12),
// (179, 'PURBALINGGA', 13),
// (180, 'KEBUMEN', 13),
// (181, 'MAGELANG', 13),
// (182, 'CILACAP', 13),
// (183, 'BATANG', 13),
// (184, 'BANJARNEGARA', 13),
// (185, 'BLORA', 13),
// (186, 'BREBES', 13),
// (187, 'BANYUMAS', 13),
// (188, 'WONOSOBO', 13),
// (189, 'TEGAL', 13),
// (190, 'PURWOREJO', 13),
// (191, 'PATI', 13),
// (192, 'SUKOHARJO', 13),
// (193, 'KARANGANYAR', 13),
// (194, 'PEKALONGAN', 13),
// (195, 'PEMALANG', 13),
// (196, 'BOYOLALI', 13),
// (197, 'GROBOGAN', 13),
// (198, 'SEMARANG', 13),
// (199, 'DEMAK', 13),
// (200, 'REMBANG', 13),
// (201, 'KLATEN', 13),
// (202, 'KUDUS', 13),
// (203, 'TEMANGGUNG', 13),
// (204, 'SRAGEN', 13),
// (205, 'JEPARA', 13),
// (206, 'WONOGIRI', 13),
// (207, 'KENDAL', 13),
// (208, 'SURAKARTA (SOLO)', 13),
// (209, 'SALATIGA', 13),
// (210, 'SLEMAN', 14),
// (211, 'BANTUL', 14),
// (212, 'YOGYAKARTA', 14),
// (213, 'GUNUNG KIDUL', 14),
// (214, 'KULON PROGO', 14),
// (215, 'GRESIK', 15),
// (216, 'KEDIRI', 15),
// (217, 'SAMPANG', 15),
// (218, 'BANGKALAN', 15),
// (219, 'SUMENEP', 15),
// (220, 'SITUBONDO', 15),
// (221, 'SURABAYA', 15),
// (222, 'JEMBER', 15),
// (223, 'PAMEKASAN', 15),
// (224, 'JOMBANG', 15),
// (225, 'PROBOLINGGO', 15),
// (226, 'BANYUWANGI', 15),
// (227, 'PASURUAN', 15),
// (228, 'BOJONEGORO', 15),
// (229, 'BONDOWOSO', 15),
// (230, 'MAGETAN', 15),
// (231, 'LUMAJANG', 15),
// (232, 'MALANG', 15),
// (233, 'BLITAR', 15),
// (234, 'SIDOARJO', 15),
// (235, 'LAMONGAN', 15),
// (236, 'PACITAN', 15),
// (237, 'TULUNGAGUNG', 15),
// (238, 'MOJOKERTO', 15),
// (239, 'MADIUN', 15),
// (240, 'PONOROGO', 15),
// (241, 'NGAWI', 15),
// (242, 'NGANJUK', 15),
// (243, 'TUBAN', 15),
// (244, 'TRENGGALEK', 15),
// (245, 'BATU', 15),
// (246, 'TANGERANG', 16),
// (247, 'SERANG', 16),
// (248, 'PANDEGLANG', 16),
// (249, 'LEBAK', 16),
// (250, 'TANGERANG SELATAN', 16),
// (251, 'CILEGON', 16),
// (252, 'KLUNGKUNG', 17),
// (253, 'KARANGASEM', 17),
// (254, 'BANGLI', 17),
// (255, 'TABANAN', 17),
// (256, 'GIANYAR', 17),
// (257, 'BADUNG', 17),
// (258, 'JEMBRANA', 17),
// (259, 'BULELENG', 17),
// (260, 'DENPASAR', 17),
// (261, 'MATARAM', 18),
// (262, 'DOMPU', 18),
// (263, 'SUMBAWA BARAT', 18),
// (264, 'SUMBAWA', 18),
// (265, 'LOMBOK TENGAH', 18),
// (266, 'LOMBOK TIMUR', 18),
// (267, 'LOMBOK UTARA', 18),
// (268, 'LOMBOK BARAT', 18),
// (269, 'BIMA', 18),
// (270, 'TIMOR TENGAH SELATAN', 19),
// (271, 'FLORES TIMUR', 19),
// (272, 'ALOR', 19),
// (273, 'ENDE', 19),
// (274, 'NAGEKEO', 19),
// (275, 'KUPANG', 19),
// (276, 'SIKKA', 19),
// (277, 'NGADA', 19),
// (278, 'TIMOR TENGAH UTARA', 19),
// (279, 'BELU', 19),
// (280, 'LEMBATA', 19),
// (281, 'SUMBA BARAT DAYA', 19),
// (282, 'SUMBA BARAT', 19),
// (283, 'SUMBA TENGAH', 19),
// (284, 'SUMBA TIMUR', 19),
// (285, 'ROTE NDAO', 19),
// (286, 'MANGGARAI TIMUR', 19),
// (287, 'MANGGARAI', 19),
// (288, 'SABU RAIJUA', 19),
// (289, 'MANGGARAI BARAT', 19),
// (290, 'LANDAK', 20),
// (291, 'KETAPANG', 20),
// (292, 'SINTANG', 20),
// (293, 'KUBU RAYA', 20),
// (294, 'PONTIANAK', 20),
// (295, 'KAYONG UTARA', 20),
// (296, 'BENGKAYANG', 20),
// (297, 'KAPUAS HULU', 20),
// (298, 'SAMBAS', 20),
// (299, 'SINGKAWANG', 20),
// (300, 'SANGGAU', 20),
// (301, 'MELAWI', 20),
// (302, 'SEKADAU', 20),
// (303, 'KOTAWARINGIN TIMUR', 21),
// (304, 'SUKAMARA', 21),
// (305, 'KOTAWARINGIN BARAT', 21),
// (306, 'BARITO TIMUR', 21),
// (307, 'KAPUAS', 21),
// (308, 'PULANG PISAU', 21),
// (309, 'LAMANDAU', 21),
// (310, 'SERUYAN', 21),
// (311, 'KATINGAN', 21),
// (312, 'BARITO SELATAN', 21),
// (313, 'MURUNG RAYA', 21),
// (314, 'BARITO UTARA', 21),
// (315, 'GUNUNG MAS', 21),
// (316, 'PALANGKA RAYA', 21),
// (317, 'TAPIN', 22),
// (318, 'BANJAR', 22),
// (319, 'HULU SUNGAI TENGAH', 22),
// (320, 'TABALONG', 22),
// (321, 'HULU SUNGAI UTARA', 22),
// (322, 'BALANGAN', 22),
// (323, 'TANAH BUMBU', 22),
// (324, 'BANJARMASIN', 22),
// (325, 'KOTABARU', 22),
// (326, 'TANAH LAUT', 22),
// (327, 'HULU SUNGAI SELATAN', 22),
// (328, 'BARITO KUALA', 22),
// (329, 'BANJARBARU', 22),
// (330, 'KUTAI BARAT', 23),
// (331, 'SAMARINDA', 23),
// (332, 'PASER', 23),
// (333, 'KUTAI KARTANEGARA', 23),
// (334, 'BERAU', 23),
// (335, 'PENAJAM PASER UTARA', 23),
// (336, 'BONTANG', 23),
// (337, 'KUTAI TIMUR', 23),
// (338, 'BALIKPAPAN', 23),
// (339, 'MALINAU', 24),
// (340, 'NUNUKAN', 24),
// (341, 'BULUNGAN (BULONGAN)', 24),
// (342, 'TANA TIDUNG', 24),
// (343, 'TARAKAN', 24),
// (344, 'BOLAANG MONGONDOW (BOLMONG)', 25),
// (345, 'BOLAANG MONGONDOW SELATAN', 25),
// (346, 'MINAHASA SELATAN', 25),
// (347, 'BITUNG', 25),
// (348, 'MINAHASA', 25),
// (349, 'KEPULAUAN SANGIHE', 25),
// (350, 'MINAHASA UTARA', 25),
// (351, 'KEPULAUAN TALAUD', 25),
// (352, 'KEPULAUAN SIAU TAGULANDANG BIARO (SITARO)', 25),
// (353, 'MANADO', 25),
// (354, 'BOLAANG MONGONDOW UTARA', 25),
// (355, 'BOLAANG MONGONDOW TIMUR', 25),
// (356, 'MINAHASA TENGGARA', 25),
// (357, 'KOTAMOBAGU', 25),
// (358, 'TOMOHON', 25),
// (359, 'BANGGAI KEPULAUAN', 26),
// (360, 'TOLI-TOLI', 26),
// (361, 'PARIGI MOUTONG', 26),
// (362, 'BUOL', 26),
// (363, 'DONGGALA', 26),
// (364, 'POSO', 26),
// (365, 'MOROWALI', 26),
// (366, 'TOJO UNA-UNA', 26),
// (367, 'BANGGAI', 26),
// (368, 'SIGI', 26),
// (369, 'PALU', 26),
// (370, 'MAROS', 27),
// (371, 'WAJO', 27),
// (372, 'BONE', 27),
// (373, 'SOPPENG', 27),
// (374, 'SIDENRENG RAPPANG / RAPANG', 27),
// (375, 'TAKALAR', 27),
// (376, 'BARRU', 27),
// (377, 'LUWU TIMUR', 27),
// (378, 'SINJAI', 27),
// (379, 'PANGKAJENE KEPULAUAN', 27),
// (380, 'PINRANG', 27),
// (381, 'JENEPONTO', 27),
// (382, 'PALOPO', 27),
// (383, 'TORAJA UTARA', 27),
// (384, 'LUWU', 27),
// (385, 'BULUKUMBA', 27),
// (386, 'MAKASSAR', 27),
// (387, 'SELAYAR (KEPULAUAN SELAYAR)', 27),
// (388, 'TANA TORAJA', 27),
// (389, 'LUWU UTARA', 27),
// (390, 'BANTAENG', 27),
// (391, 'GOWA', 27),
// (392, 'ENREKANG', 27),
// (393, 'PAREPARE', 27),
// (394, 'KOLAKA', 28),
// (395, 'MUNA', 28),
// (396, 'KONAWE SELATAN', 28),
// (397, 'KENDARI', 28),
// (398, 'KONAWE', 28),
// (399, 'KONAWE UTARA', 28),
// (400, 'KOLAKA UTARA', 28),
// (401, 'BUTON', 28),
// (402, 'BOMBANA', 28),
// (403, 'WAKATOBI', 28),
// (404, 'BAU-BAU', 28),
// (405, 'BUTON UTARA', 28),
// (406, 'GORONTALO UTARA', 29),
// (407, 'BONE BOLANGO', 29),
// (408, 'GORONTALO', 29),
// (409, 'BOALEMO', 29),
// (410, 'POHUWATO', 29),
// (411, 'MAJENE', 30),
// (412, 'MAMUJU', 30),
// (413, 'MAMUJU UTARA', 30),
// (414, 'POLEWALI MANDAR', 30),
// (415, 'MAMASA', 30),
// (416, 'MALUKU TENGGARA BARAT', 31),
// (417, 'MALUKU TENGGARA', 31),
// (418, 'SERAM BAGIAN BARAT', 31),
// (419, 'MALUKU TENGAH', 31),
// (420, 'SERAM BAGIAN TIMUR', 31),
// (421, 'MALUKU BARAT DAYA', 31),
// (422, 'AMBON', 31),
// (423, 'BURU', 31),
// (424, 'BURU SELATAN', 31),
// (425, 'KEPULAUAN ARU', 31),
// (426, 'TUAL', 31),
// (427, 'HALMAHERA BARAT', 32),
// (428, 'TIDORE KEPULAUAN', 32),
// (429, 'TERNATE', 32),
// (430, 'PULAU MOROTAI', 32),
// (431, 'KEPULAUAN SULA', 32),
// (432, 'HALMAHERA SELATAN', 32),
// (433, 'HALMAHERA TENGAH', 32),
// (434, 'HALMAHERA TIMUR', 32),
// (435, 'HALMAHERA UTARA', 32),
// (436, 'YALIMO', 33),
// (437, 'DOGIYAI', 33),
// (438, 'ASMAT', 33),
// (439, 'JAYAPURA', 33),
// (440, 'PANIAI', 33),
// (441, 'MAPPI', 33),
// (442, 'TOLIKARA', 33),
// (443, 'PUNCAK JAYA', 33),
// (444, 'PEGUNUNGAN BINTANG', 33),
// (445, 'JAYAWIJAYA', 33),
// (446, 'LANNY JAYA', 33),
// (447, 'NDUGA', 33),
// (448, 'BIAK NUMFOR', 33),
// (449, 'KEPULAUAN YAPEN (YAPEN WAROPEN)', 33),
// (450, 'PUNCAK', 33),
// (451, 'INTAN JAYA', 33),
// (452, 'WAROPEN', 33),
// (453, 'NABIRE', 33),
// (454, 'MIMIKA', 33),
// (455, 'BOVEN DIGOEL', 33),
// (456, 'YAHUKIMO', 33),
// (457, 'SARMI', 33),
// (458, 'MERAUKE', 33),
// (459, 'DEIYAI (DELIYAI)', 33),
// (460, 'KEEROM', 33),
// (461, 'SUPIORI', 33),
// (462, 'MAMBERAMO RAYA', 33),
// (463, 'MAMBERAMO TENGAH', 33),
// (464, 'RAJA AMPAT', 34),
// (465, 'MANOKWARI SELATAN', 34),
// (466, 'MANOKWARI', 34),
// (467, 'KAIMANA', 34),
// (468, 'MAYBRAT', 34),
// (469, 'SORONG SELATAN', 34),
// (470, 'FAKFAK', 34),
// (471, 'PEGUNUNGAN ARFAK', 34),
// (472, 'TAMBRAUW', 34),
// (473, 'SORONG', 34),
// (474, 'TELUK WONDAMA', 34),
// (475, 'TELUK BINTUNI', 34); 
// Kota
