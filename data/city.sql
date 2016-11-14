-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 03 Novembre 2016 à 15:17
-- Version du serveur :  5.7.16-0ubuntu0.16.04.1
-- Version de PHP :  7.0.8-0ubuntu0.16.04.3

--
-- Base de données :  `agrobusiness`
--

--
-- Contenu de la table `city`
--

INSERT INTO `city` (`id`, `province_id`, `name`, `slug`) VALUES
(2, 2, 'BANIKOARA', 'banikoara'),
(12, 2, 'GOGOUNOU', 'gogounou'),
(22, 2, 'KANDI', 'kandi'),
(32, 2, 'KARIMAMA', 'karimama'),
(42, 2, 'MALANVILLE', 'malanville'),
(52, 2, 'SEGBANA', 'segbana'),
(62, 12, 'BOUKOUMBE', 'boukoumbe'),
(72, 12, 'COBLY', 'cobly'),
(82, 12, 'KEROU', 'kerou'),
(92, 12, 'KOUANDE', 'kouande'),
(102, 12, 'MATERI', 'materi'),
(112, 12, 'NATITINGOU', 'natitingou'),
(122, 22, 'ABOMEY-CALAVI', 'abomey-calavi'),
(132, 22, 'ALLADA', 'allada'),
(142, 22, 'KPOMASSE', 'kpomasse'),
(152, 22, 'OUIDAH', 'ouidah'),
(162, 22, 'SO-AVA', 'so-ava'),
(172, 22, 'TOFFO', 'toffo'),
(182, 22, 'TORI-BOSSITO', 'tori-bossito'),
(192, 22, 'ZE', 'ze'),
(202, 32, 'BEMBEREKE', 'bembereke'),
(212, 32, 'KALALE', 'kalale'),
(222, 32, 'N\'DALI', 'n\'dali'),
(232, 32, 'NIKKI', 'nikki'),
(242, 32, 'PARAKOU', 'parakou'),
(252, 32, 'PERERE', 'perere'),
(262, 32, 'SINENDE', 'sinende'),
(272, 32, 'TCHAOUROU', 'tchaourou'),
(282, 42, 'BANTE', 'bante'),
(292, 42, 'DASSA ZOUME', 'dassa zoume'),
(302, 42, 'GLAZOUE', 'glazoue'),
(312, 42, 'OUESSE', 'ouesse'),
(322, 42, 'SAVALOU', 'savalou'),
(332, 42, 'SAVE', 'save'),
(342, 52, 'APLAHOUE', 'aplahoue'),
(352, 52, 'DJAKOTOMEY', 'djakotomey'),
(362, 52, 'DOGBO', 'dogbo'),
(372, 52, 'KLOUEKANME', 'klouekanme'),
(382, 52, 'LALO', 'lalo'),
(392, 52, 'TOVIKLIN', 'toviklin'),
(402, 62, 'BASSILA', 'bassila'),
(412, 62, 'COPARGO', 'copargo'),
(422, 62, 'DJOUGOU', 'djougou'),
(432, 62, 'OUAKE', 'ouake'),
(442, 72, 'COTONOU', 'cotonou'),
(452, 82, 'ATHIEME', 'athieme'),
(462, 82, 'BOPA', 'bopa'),
(472, 82, 'COME', 'come'),
(482, 82, 'GRAND-POPO', 'grand-popo'),
(492, 82, 'HOUEYOGBE', 'houeyogbe'),
(502, 82, 'LOKOSSA', 'lokossa'),
(512, 92, 'ADJARRA', 'adjarra'),
(522, 92, 'ADJOHOUN', 'adjohoun'),
(532, 92, 'AGUEGUES', 'aguegues'),
(542, 92, 'AKPRO- MISSRETE', 'akpro- missrete'),
(552, 92, 'AVRANKOU', 'avrankou'),
(562, 92, 'BONOU', 'bonou'),
(572, 92, 'DANGBO', 'dangbo'),
(582, 92, 'PORTO-NOVO', 'porto-novo'),
(592, 92, 'SEME-KPODJI', 'seme-kpodji'),
(602, 102, 'ADJA-OUERE', 'adja-ouere'),
(612, 102, 'IFANGNI', 'ifangni'),
(622, 102, 'KETOU', 'ketou'),
(632, 102, 'POBE', 'pobe'),
(642, 102, 'SAKETE', 'sakete'),
(652, 122, 'ABOMEY', 'abomey'),
(662, 122, 'AGBANGNIZOUN', 'agbangnizoun'),
(672, 122, 'BOHICON', 'bohicon'),
(682, 122, 'COVE', 'cove'),
(692, 122, 'DJIDJA', 'djidja'),
(702, 122, 'OUINHI', 'ouinhi'),
(712, 122, 'ZAGNANADO', 'zagnanado'),
(722, 122, 'ZA-KPOTA', 'za-kpota'),
(732, 122, 'ZOGBODOMEY', 'zogbodomey');
