-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2025 at 02:40 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_lagu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin1', 'password123');

-- --------------------------------------------------------

--
-- Table structure for table `lagu`
--

CREATE TABLE `lagu` (
  `id` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penyanyi` varchar(100) NOT NULL,
  `lirik` text NOT NULL,
  `nada_dasar` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lagu`
--

INSERT INTO `lagu` (`id`, `judul`, `penyanyi`, `lirik`, `nada_dasar`, `created_at`) VALUES
(4, 'Jangan Pernah Menyerah', 'Bos', 'G             D/F#\nTuhan Tak Pernah Janji\n       Em       G/D\nLangit Selalu Biru\n    C             G/B\nTetapi Dia Berjanji\n    Am         D\nSelalu Menyertai\n\n      G             D/F#\nTuhan Tak Pernah Janji\n      Em       G/D\nJalan Selalu Rata\n    C            G/B\nTetapi Dia Berjanji\n    Am       D\nBerikan Kekuatan\n\nReff :\n       G           D/F#\nJangan Pernah Menyerah\n       Em        D/G\nJangan Berputus Asa\n    C          G/B\nMujizat Tuhan Ada\n     Am         D\nSaat Hati Menyembah\n\n       G           D/F#\nJangan Pernah Menyerah\n       Em        D/G\nJangan Berputus Asa\n    C          G/B\nMujizat Tuhan Ada\n     Am             D    G\nBagi Yang Setia Dan Percaya', 'G', '2025-02-16 12:45:13'),
(5, 'Tuhan Selalu Menolong ku', 'Mela', 'Bait :\n                  E\nMusim Akan Selalu Berganti\n                   A/E\nKasih Tuhan Tetap Abadi\n             F#m               B\nTak Akan Berubah, Sampai Selamanya\n            E     B\nKu Tetap Percaya\n\n                    E\nKuyakin Tuhan Memberkati\n                   A/E\nKuyakin Tuhan Melindungi\n             F#m            B\nBurung Di Udara Tuhan Pelihara\n         E\nKarena KasihNya\n\nReff :\n               A         B/A\nTuhan Selalu Menolongku\n          G#m     C#\nSelalu Menjagaku\n                 F#m\nSehelai Di Rambutku\n              B\nTak Akan Terjatuh\n           E   F#m E/G#\nTanpa SeizinMu\n\n               A         B/A\nTuhan Selalu Menolongku\n          G#m     C#\nSelalu Menjagaku\n                 F#m            B\nDia Mengenyangkanku Dan Peliharaku\n         E\nSeumur Hidupku', 'E', '2025-02-16 13:59:21'),
(6, 'above all', 'Ervin', 'Verse :\n          D#       F\nAbove All Powers\n          Bb       Bb/D\nAbove All Kings\n          D#\nAbove All Nature\n    F           Bb      F/A\nAnd All Created Things\n          Gm\nAbove All Wisdom\n    F               D#   Bb/D\nAnd All The Ways Of Man\nCm\nYou Were Here\n  D#/Bb            F/A  F\nBefore The World Began\n\n          D#        F\nAbove All Kingdoms\n          Bb       Bb/D\nAbove All Thrones\n          D#          F\nAbove All Wonders The World\n         Bb     F/A\nHas Ever Known\n          Gm\nAbove All Wealth\n    F                D#     Bb/D\nAnd Treasures Of The Earth\nCm                D#/Bb\nThere\'s No Way To Measure\n            Dsus4  D\nWhat You\'re Worth\n\nChorus :\nBb   Cm\nCrucified\nF/A             Bb\nLaid Behind The Stone\n    Bb       Cm\nYou Lived To Die\n  F/A         Bb\nRejected And Alone\n       Gm\nLike A Rose\nF               D#      Bb/D\nTrampled On The Ground\n             Cm    Bb/D\nYou Took The Fall\n               D#  F\nAnd Thought Of Me\n      Bb\nAbove All', 'F', '2025-02-16 14:21:04'),
(7, 'Waktu Terbaik (GMS)', 'Yosep', 'C                     Em\nSaatku tak mampu berharap\nDm                      G\nKekhawatiran menghimpit jiwaku\nF       G  Em         Am\nKekuatanku datang dariMu\n     Dm                   G   Gm-G\nMemampukanku kembali berharap\n\n[Verse 2]\nC                   Em\nAjarku mengenal hatiMu\n    Dm\nDan percaya\n                G\nJalanMulah yang terbaik\nF       G           Em      Am\nDikelemahan kuasaMu sempurna\nDm                 F           G\nKau Allah yang tak akan tinggalkan\n\n[Chorus]\n       C\nKupercaya\n         Gm    C      F       G/B Dm\nEngkau bekerja buat kebaikanku\n      G         Em Am  Dm\nWalau belum kumeli-hat\n                 G\nNamun kuasaMu sempurna\n       C\nKupercaya\n        Gm    C     F      G/B  Dm\nPasti Tuhan bukakan jalanku\n      G            Em   Am  Dm\nDi waktuMu yang terba - ik\n        G       C\nS\'turut kehendakMu.', 'F', '2025-02-16 14:57:24'),
(8, 'Waktu Terbaik (GMS)', 'Ervin', 'C                     Em\r\nSaatku tak mampu berharap\r\nDm                      G\r\nKekhawatiran menghimpit jiwaku\r\nF       G  Em         Am\r\nKekuatanku datang dariMu\r\n     Dm                   G   Gm-G\r\nMemampukanku kembali berharap\r\n\r\n[Verse 2]\r\nC                   Em\r\nAjarku mengenal hatiMu\r\n    Dm\r\nDan percaya\r\n                G\r\nJalanMulah yang terbaik\r\nF       G           Em      Am\r\nDikelemahan kuasaMu sempurna\r\nDm                 F           G\r\nKau Allah yang tak akan tinggalkan\r\n\r\n[Chorus]\r\n       C\r\nKupercaya\r\n         Gm    C      F       G/B Dm\r\nEngkau bekerja buat kebaikanku\r\n      G         Em Am  Dm\r\nWalau belum kumeli-hat\r\n                 G\r\nNamun kuasaMu sempurna\r\n       C\r\nKupercaya\r\n        Gm    C     F      G/B  Dm\r\nPasti Tuhan bukakan jalanku\r\n      G            Em   Am  Dm\r\nDi waktuMu yang terba - ik\r\n        G       C\r\nS\'turut kehendakMu.', 'C', '2025-02-16 15:18:18'),
(9, 'Ada Kuasa (Symphony Worship)', 'Yosep', '        Bb   F         C      Dm\r\nNamaNya Tuhanku menara yang teguh\r\nBb           F           C\r\nKota benteng perlindunganku\r\n           Bb   F           C      Dm\r\nAllah yang perkasa Dia Bapa yang kekal\r\nBb          F          C\r\nGunung batu keselamatanku\r\n\r\n[Chorus]\r\n       F         F/A         Bb    F\r\nEngkau yang termulia di bumi di surga\r\n      Dm        Bb       F\r\nTermahsyur perkasa selamanya\r\n       Dm         F\r\nEngkau yang berkuasa\r\n         Bb     F/A\r\nDi dalam segala hal\r\n    Gm          C         F\r\nAda kuasa dalam nama Yesusku', 'F', '2025-02-16 15:49:43'),
(10, 'Tuhan Yesus Baik', 'Mela', '[Verse]\nG             C   D             G\nTiada berkesudahan kasih setiaMu Tuhan\nC                 G/B        D\nS\'lalu baru rahmat-Mu bagiku\nG              C\nHari berganti hari\nD                G\nTetap ‘ku lihat kasih-Mu\nC                  G/B        D\nTak pernah berakhir di hidupku\n\n[Chorus]\n              G  C               G  C\nTuhan Yesus baik, sungguh amat baik\n             G   D\nUntuk selama-lamanya\n              G   D\nTuhan Yesus baik\n              G  C               G  C\nTuhan Yesus baik, sungguh amat baik\n             G/D    D\nUntuk selama-lama - nya\n              G\nTuhan Yesus baik', 'D', '2025-02-16 15:50:34'),
(12, 'Kau Tuhan Adalah Bapaku', 'Yosep', 'Bait :\r\nD\r\nKumiliki KasihMu\r\n     Em\r\nYang Tak Ternilai Bagiku\r\nG                A\r\nMeskipun Tak Kupunya\r\n          D    G/D   A\r\nSiapapun Juga\r\n\r\nD\r\nSungguh Indah KasihMu\r\n     Em\r\nYang Tak Bersyarat Untukku\r\nG                A\r\nWalaupun Tak Ada Yang\r\n        D   A\r\nMengasihiku\r\n\r\nReff :\r\n      D      A/C#    Bm\r\nKau Tuhan Adalah Bapaku\r\n     G        Em      A\r\nYang Sangat Menyayangiku\r\n       D       A/C#  Bm\r\nTak Pernah Sekalipun Kudapati\r\nG       Em     A\r\nKau Sakiti Hatiku\r\n\r\n      D      A/C#    Bm\r\nKau Tuhan Adalah Bapaku\r\n    G        Em     A\r\nS\'lalu Memperhatikanku\r\n     D     A/C#   Bm\r\nTak Ada Alasan Ku Ragu-Ragu\r\nG        D/F#   Em   A   D\r\nTuk Serahkan Hatiku KepadaMu', 'D', '2025-02-17 14:09:07'),
(14, 'Selalu Bersyukur (Kamasean)', 'Mela', 'Bait :\r\nC        D/C       Bm         Em\r\n  Dengan Apa Ku Membalas KasihMu\r\nAm       D          G\r\n  Yang Kuterima DariMu\r\nC        D/C       Bm         Em\r\n  Dengan Apa Ku Membalas CintaMu\r\nAm        D\r\n  Oh Yesusku\r\n\r\nReff :\r\n       G           D/F#\r\nKu Mau Slalu Bersyukur\r\nEm           Bm\r\nSelalu Bersyukur\r\nC              G/B\r\nKau Tuhan Yang Setia\r\nAm           D \r\nYang Slalu Menopang\r\n\r\n       G           D/F#\r\nKu Mau Slalu Bersyukur\r\nEm           Bm\r\nSelalu Bersyukur\r\nAm         D        G\r\nKau Bapaku Yang Setia', 'G', '2025-02-17 14:13:23'),
(18, 'Bapa yang kekal', 'Yosep', 'Bait :\nC                G/B\nKasih Yang Sempurna\n      E     E/G#   Am\nTelah Kut’rima DariMu\n          F        G\nBukan Kar’na Kebaikanku\n\nF/A  G/B  C            G/B\nHa – nya  Oleh Kasih KaruniaMu\nE     E/G#    Am           F\nKau Pulihkan Aku, Layakkanku\n                G      F/A  G/B\nTuk Dapat MemanggilMu, Ba – pa\n\nReff :\nC                   G/B\nKau B’ri Yang Kupinta\n       Am                Em\nSaat Kumencari Kumendapatkan\n            F               C\nKuketuk PintuMu Dan Kau Bukakan\n            D                 G      F/A  G/B\nS’bab Kau Bapaku, Bapa Yang Kekal\n\nC               G/B\nTak Kan Kau Biarkan\n      Am                   Em\nAku Melangkah Hanya Sendirian\n           F       C\nKau Selalu Ada Bagiku\n            F\nS’bab Kau Bapaku\n  G         C\nBapa Yang Kekal', 'C', '2025-02-17 14:18:00'),
(19, 'Imanuel (JPCC Worship)', 'Yosep', 'Bait :\n  F               Bb\nBapa Kudatang Dan Berserah\n  F/A   Dm     Gm      C\nKunyatakan Kau Yang Berkuasa\nF       F/A     Bb\nDalam Gelap Kau Setia\n     F/A    Dm      Gm  C  \n\'Kau Caha - ya Hidupku\n\nReff :\n        Bb           C/Bb\nKau Kuatkan Aku Bertahan\n        Am            Dm\nKau Harapan Dalam Kesesakan\n         Gm\nKau Buktikan\n         Am7   Dm\nKesetiaanMu  Tuhan\n   Gm         C   F\nEngkau Allah Imanuel\n\nBait :\n  F               Bb\nBapa Kudatang Tuk Menyembah\n  F/A   Dm     Gm      C\nKunyatakan Kau Yang Bertahta\nF       F/A     Bb\nDalam Lemah Kau Sempurna\n    F/A    Dm     Gm  C\nKau Caha - ya Bagiku\n\nReff :\n        Bb           C/Bb\nKau Kuatkan Aku Bertahan\n        Am            Dm\nKau Harapan Dalam Kesesakan\n         Gm\nKau Buktikan\n         Am7   Dm\nKesetiaanMu  Tuhan\n   Gm         C   F\nEngkau Allah Imanuel\n\nBridge :\n C        F\nImanuel, Imanuel\n   C         F\nEngkau Besertaku\n C   C/Bb F/A\nImanuel, Imanuel\n   Gm          C    F\nEngkau Allah Besertaku', 'F', '2025-02-17 14:19:48'),
(20, 'Roh Kudus Hadir Disini', 'Aldo', 'Bait :\r\nE             A          E\r\nRoh Kudus Kau Hadir Di Sini\r\n      C#m    F#/A#    B\r\nRoh Kudus Ku MengasihiMu\r\nE              A\r\nKau Lembut Kau Manis\r\n   G#           C#m\r\nKaulah Penghiburku\r\n  E/B        B        E\r\nPenolongku Diutus Bapaku\r\n \r\nReff :\r\n     E         A           E     A/C#  B/D#\r\nKu Buka Hati Untuk RohMu Tuhan\r\n     E         F#/A#       B\r\nKu Buka Hati MenyembahMu Yesus\r\nA          B/A   G#m    C#m\r\nJamahlah Kami, Penuhi Kami\r\n    E/B        B            E\r\nDengan Kuasa Allah Maha Tinggi', 'E', '2025-02-17 14:29:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lagu`
--
ALTER TABLE `lagu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lagu`
--
ALTER TABLE `lagu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
