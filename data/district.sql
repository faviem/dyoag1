-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 03 Novembre 2016 à 15:16
-- Version du serveur :  5.7.16-0ubuntu0.16.04.1
-- Version de PHP :  7.0.8-0ubuntu0.16.04.3


--
-- Base de données :  `agrobusiness`
--

--
-- Contenu de la table `district`
--

INSERT INTO `district` (`id`, `city_id`, `name`) VALUES
(2, 2, 'BANIKOARA'),
(12, 2, 'FOUNOUGO'),
(22, 2, 'GOMPAROU'),
(32, 2, 'GOUMORI'),
(42, 2, 'KOKEY'),
(52, 2, 'KOKIBOROU'),
(62, 2, 'OUNET'),
(72, 2, 'SOMPEREKOU'),
(82, 2, 'SOROKO'),
(92, 2, 'TOURA'),
(102, 2, 'BAGOU'),
(112, 12, 'GOGOUNOU'),
(122, 12, 'GOUNAROU'),
(132, 12, 'OUARA'),
(142, 12, 'SORI'),
(152, 12, 'ZOUNGOU-PANTROSSI'),
(162, 22, 'ANGARADEBOU'),
(172, 22, 'BENSEKOU'),
(192, 22, 'DONWARI'),
(202, 22, 'KANDI I'),
(212, 22, 'KANDI II'),
(222, 22, 'KANDI III'),
(232, 22, 'KASSAKOU'),
(242, 22, 'SAAH'),
(252, 22, 'SAM'),
(262, 22, 'SONSORO'),
(272, 32, 'BIRNI-LAFIA'),
(282, 32, 'BOGO-BOGO'),
(292, 32, 'KARIMAMA'),
(302, 32, 'KOMPA'),
(312, 32, 'MONSEY'),
(322, 42, 'GAROU'),
(332, 42, 'GUENE'),
(342, 42, 'MADECALI'),
(352, 42, 'MALANVILLE'),
(362, 42, 'TOMBOUTOU'),
(372, 52, 'LIBANTE'),
(382, 52, 'LIBOUSSOU'),
(392, 52, 'LOUGOU'),
(402, 52, 'SEGBANA'),
(412, 52, 'SOKOTINDJI'),
(422, 62, 'BOUKOUMBE'),
(432, 62, 'DIPOLI'),
(442, 62, 'KOROUTIERE'),
(452, 62, 'KOSSOUCOINGOU'),
(462, 62, 'MANTA'),
(472, 62, 'NATTA'),
(482, 62, 'TABOTA'),
(492, 72, 'COBLY'),
(502, 72, 'DATORI'),
(512, 72, 'KOUNTORI'),
(522, 72, 'TAPOGA'),
(532, 82, 'BRIGNAMARO'),
(542, 82, 'FIROU'),
(552, 82, 'KOABAGOU'),
(562, 82, 'KEROU'),
(572, 92, 'BIRNI'),
(582, 92, 'CHABI-KOUMA'),
(592, 92, 'FO-TANCE'),
(602, 92, 'GUILMARO'),
(612, 92, 'KOUANDE'),
(622, 92, 'OROUKAYO'),
(632, 102, 'DASSARI'),
(642, 102, 'GOUANDE'),
(652, 102, 'MATERI'),
(662, 102, 'NODI'),
(672, 102, 'TANTEGA'),
(682, 102, 'TCHIANHOUNCOSSI'),
(692, 112, 'KOTOPOUNGA'),
(702, 112, 'KOUABA'),
(712, 112, 'KOUANDATA'),
(722, 112, 'PERMA'),
(732, 112, 'TCHOUMI-TCHOUMI'),
(742, 112, 'NATITINGOU I'),
(752, 112, 'NATITINGOU II'),
(762, 112, 'NATITINGOU III'),
(772, 112, 'NATITINGOU IV'),
(782, 122, 'ABOMEY-CALAVI'),
(792, 122, 'AKASSATO'),
(802, 122, 'GODOMEY'),
(812, 122, 'GLO-DJIGBE'),
(822, 122, 'HEVIE'),
(832, 122, 'KPANROUN'),
(842, 122, 'OUEDO'),
(852, 122, 'TOGBA'),
(862, 122, 'ZINVIE'),
(872, 132, 'AGBANOU'),
(882, 132, 'AHOUANNONZOUN'),
(892, 132, 'ALLADA'),
(902, 132, 'ATTOGON'),
(912, 132, 'AVAKPA'),
(922, 132, 'AYOU'),
(932, 132, 'HINVI'),
(942, 132, 'LISSEGAZOUN'),
(952, 132, 'LON-AGONMEY'),
(962, 132, 'SEKOU'),
(972, 132, 'TOKPA-AVAGOUDO'),
(982, 132, 'TOGOUDO'),
(992, 142, 'AGANMALOME'),
(1002, 142, 'AGBANTO'),
(1012, 142, 'AGONKANME'),
(1022, 142, 'DEDOME'),
(1032, 142, 'DEKANME'),
(1042, 142, 'KPOMASSE'),
(1052, 142, 'SEGBEYA'),
(1062, 142, 'SEGBOHOUE'),
(1072, 142, 'TOKPA-DOME'),
(1082, 152, 'AVLEKETE'),
(1092, 152, 'DJEGBADJI'),
(1102, 152, 'GAKPE'),
(1112, 152, 'OUAKPE-DAHO'),
(1122, 152, 'PAHOU'),
(1132, 152, 'SAVI'),
(1142, 152, 'OUIDAH I'),
(1152, 152, 'OUIDAH II'),
(1162, 162, 'AHOMEY-LOKPO'),
(1172, 162, 'DÉKANMEY'),
(1182, 162, 'GANVIÉ I'),
(1192, 162, 'GANVIÉ II'),
(1202, 162, 'HOUÉDO-AGUÉKON'),
(1212, 162, 'SO-AVA'),
(1222, 162, 'VEKKY'),
(1232, 172, 'AGUE'),
(1242, 172, 'COLLI-AGBAME'),
(1252, 172, 'COUSSI'),
(1262, 172, 'DAME'),
(1272, 172, 'DJANGLANME'),
(1282, 172, 'HOUEGBO'),
(1292, 172, 'KPOME'),
(1302, 172, 'SE'),
(1312, 172, 'SEHOUE'),
(1322, 172, 'TOFFO AGUE'),
(1332, 182, 'AVAME'),
(1342, 182, 'AZOHOUE-ALIHO'),
(1352, 182, 'AZOHOUE CADA'),
(1362, 182, 'TORI-BOSSITO'),
(1372, 182, 'TORI CADA'),
(1382, 182, 'TORI-GARE'),
(1392, 192, 'ADJAN'),
(1402, 192, 'DAWE'),
(1412, 192, 'DJIGBE'),
(1422, 192, 'DODJI-BATA'),
(1432, 192, 'HEKANME'),
(1442, 192, 'KOUNDOKPOE'),
(1452, 192, 'SEDJE-DENOU'),
(1462, 192, 'SEDJE-HOUEGOUDO'),
(1472, 192, 'TANGBO-DJEVIE'),
(1482, 192, 'YOKPO'),
(1492, 192, 'ZE'),
(1502, 202, 'BEMBEREKE'),
(1512, 202, 'BEROUBOUAY'),
(1522, 202, 'BOUANRI'),
(1532, 202, 'GOMIA'),
(1542, 202, 'INA'),
(1552, 212, 'BASSO'),
(1562, 212, 'BOUKA'),
(1572, 212, 'DERASSI'),
(1582, 212, 'DUNKASSA'),
(1592, 212, 'KALALE'),
(1602, 212, 'PEONGA'),
(1612, 222, 'BORI'),
(1622, 222, 'GBEGOUROU'),
(1632, 222, 'N\'DALI'),
(1642, 222, 'OUENOU'),
(1652, 222, 'SIRAROU'),
(1662, 232, 'BIRO'),
(1672, 232, 'GNONKOURAKALI'),
(1682, 232, 'NIKKI'),
(1692, 232, 'OUENOU'),
(1702, 232, 'SEREKALE'),
(1712, 232, 'SUYA'),
(1722, 232, 'TASSO'),
(1732, 242, '1ER ARRONDISSEMENT'),
(1742, 242, '2EME ARRONDISSEMENT'),
(1752, 242, '3EME ARRONDISSEMENT'),
(1762, 252, 'GNINSY'),
(1772, 252, 'GUINAGOUROU'),
(1782, 252, 'KPANE'),
(1792, 252, 'PEBIE'),
(1802, 252, 'PERERE'),
(1812, 252, 'SONTOU'),
(1822, 262, 'FO-BOURE'),
(1832, 262, 'SEREKE'),
(1842, 262, 'SINENDE'),
(1852, 262, 'SIKKI'),
(1862, 272, 'ALAFIAROU'),
(1872, 272, 'BETEROU'),
(1882, 272, 'GORO'),
(1892, 272, 'KIKA'),
(1902, 272, 'SANSON'),
(1912, 272, 'TCHAOUROU'),
(1922, 272, 'TCHATCHOU'),
(1932, 282, 'AGOUA'),
(1942, 282, 'AKPASSI'),
(1952, 282, 'ATOKOLIGBE'),
(1962, 282, 'BANTE'),
(1972, 282, 'BOBE'),
(1982, 282, 'GOUKA'),
(1992, 282, 'KOKO'),
(2002, 282, 'LOUGBA'),
(2012, 282, 'PIRA'),
(2022, 292, 'AKOFODJOULE'),
(2032, 292, 'DASSA I'),
(2042, 292, 'DASSA II'),
(2052, 292, 'GBAFFO'),
(2062, 292, 'GBAFFO'),
(2072, 292, 'KERE'),
(2082, 292, 'KPINGNI'),
(2092, 292, 'LEMA'),
(2102, 292, 'POUINGNAN'),
(2112, 292, 'SOCLOGBO'),
(2122, 292, 'TRE'),
(2132, 302, 'AKLANKPA'),
(2142, 302, 'ASSANTE'),
(2152, 302, 'GLAZOUE'),
(2162, 302, 'GOME'),
(2172, 302, 'KPAKPAZA'),
(2182, 302, 'MAGOUMI'),
(2192, 302, 'OOUEDEME'),
(2202, 302, 'SOKPONTA'),
(2212, 302, 'THIO'),
(2222, 302, 'ZAFFE'),
(2232, 312, 'CHALLA-OGOI'),
(2242, 312, 'DJEGBE'),
(2252, 312, 'GBANLIN'),
(2262, 312, 'KEMON'),
(2272, 312, 'KILIBO'),
(2282, 312, 'LAMINOU'),
(2292, 312, 'ODOUGBA'),
(2302, 312, 'OUESSE'),
(2312, 312, 'TOUI'),
(2322, 322, 'DJALOUKOU'),
(2332, 322, 'DOUME'),
(2342, 322, 'GOBADA'),
(2352, 322, 'KPATABA'),
(2362, 322, 'LAHOTAN'),
(2372, 322, 'LOGOZOHOUE'),
(2382, 322, 'MONKPA'),
(2392, 322, 'OUESSE'),
(2402, 322, 'OTTOLA'),
(2412, 322, 'SAVALOU-AGA'),
(2422, 322, 'SAVALOU-AGBADO'),
(2432, 322, 'SAVALOU-ATTAKE'),
(2442, 322, 'TCHETTI'),
(2452, 332, 'ADIDO'),
(2462, 332, 'BESSE'),
(2472, 332, 'KABOUA'),
(2482, 332, 'BONI'),
(2492, 332, 'OFE'),
(2502, 332, 'OKPARA'),
(2512, 332, 'SAKIN'),
(2522, 332, 'PLATEAU'),
(2532, 342, 'APLAHOUE'),
(2542, 342, 'ATOME'),
(2552, 342, 'AZOVE'),
(2562, 342, 'DEKPO'),
(2572, 342, 'GODOHOU'),
(2582, 342, 'KISSAMEY'),
(2592, 342, 'LONKLY'),
(2602, 352, 'ADJINTIMEY'),
(2612, 352, 'BETOUMEY'),
(2622, 352, 'DJAKOTOMEY I'),
(2632, 352, 'DJAKOTOMEY II'),
(2642, 352, 'GOHOMEY'),
(2652, 352, 'HOUEGAMEY'),
(2662, 352, 'KINKINHOUE'),
(2672, 352, 'KOKOHOUE'),
(2682, 352, 'KPOBA'),
(2692, 352, 'SOKOUHOUE'),
(2702, 362, 'AYOMI'),
(2712, 362, 'DEVE'),
(2722, 362, 'HONTON'),
(2732, 362, 'LOKOGOHOUE'),
(2742, 362, 'MADJRE'),
(2752, 362, 'TOTCHANGNI'),
(2762, 362, 'TOTA'),
(2772, 372, 'ADJANHONME'),
(2782, 372, 'AHOGBEYA'),
(2792, 372, 'AYAHOHOUE'),
(2802, 372, 'DJOTTO'),
(2812, 372, 'HONDJI'),
(2822, 372, 'KLOUEKANME'),
(2832, 372, 'LANTA'),
(2842, 372, 'TCHIKPE'),
(2852, 382, 'ADOUKANDJI'),
(2862, 382, 'AHODJINNAKO'),
(2872, 382, 'AHOMADEGBE'),
(2882, 382, 'BANIGBE'),
(2892, 382, 'GNIZOUNME'),
(2902, 382, 'HLASSAME'),
(2912, 382, 'LALO'),
(2922, 382, 'LOKOGBA'),
(2932, 382, 'TCHITO'),
(2942, 382, 'TOHOU'),
(2952, 382, 'ZALLI'),
(2962, 392, 'ADJIDO'),
(2972, 392, 'AVEDJIN'),
(2982, 392, 'DOKO'),
(2992, 392, 'HOUEDOGLI'),
(3002, 392, 'MISSINKO'),
(3012, 392, 'TANNOU GOLA'),
(3022, 392, 'TOVIKLIN'),
(3032, 402, 'ALEDJO'),
(3042, 402, 'BASSILA'),
(3052, 402, 'MANIGRI'),
(3062, 402, 'PENESSOULOU'),
(3072, 412, 'ANANDANA'),
(3082, 412, 'COPARGO'),
(3092, 412, 'PABEGOU'),
(3102, 412, 'SINGRE'),
(3112, 422, 'BAREI'),
(3122, 422, 'BARIENOU'),
(3132, 422, 'BELLEFOUNGOU'),
(3142, 422, 'BOUGOU'),
(3152, 422, 'DJOUGOU I'),
(3162, 422, 'DJOUGOU II'),
(3172, 422, 'DJOUGOU III'),
(3182, 422, 'KOLOKONDE'),
(3192, 422, 'ONKLOU'),
(3202, 422, 'PATARGO'),
(3212, 422, 'PELEBINA'),
(3222, 422, 'SEROU'),
(3232, 432, 'BAJOUDE'),
(3242, 432, 'KONDE'),
(3252, 432, 'OUAKE'),
(3262, 432, 'SEMERE I'),
(3272, 432, 'SEMERE II'),
(3282, 432, 'TCHALINGA'),
(3292, 442, '4EME ARRONDISSEMENT'),
(3302, 442, '5EME ARRONDISSEMENT'),
(3312, 442, '6EME ARRONDISSEMENT'),
(3322, 442, '7EME ARRONDISSEMENT'),
(3332, 442, '8EME ARRONDISSEMENT'),
(3342, 442, '9EME ARRONDISSEMENT'),
(3352, 442, '10EME ARRONDISSEMENT'),
(3362, 442, '11EME ARRONDISSEMENT'),
(3372, 442, '12EME ARRONDISSEMENT'),
(3382, 442, '13EME ARRONDISSEMENT'),
(3392, 452, 'ADOHOUN'),
(3402, 452, 'ATCHANNOU'),
(3412, 452, 'ATHIEME'),
(3422, 452, 'DEDEKPOE'),
(3432, 452, 'KPINNOU'),
(3442, 462, 'AGBODJI'),
(3452, 462, 'BADAZOUI'),
(3462, 462, 'BOPA'),
(3472, 462, 'GBAKPODJI'),
(3482, 462, 'LOBOGO'),
(3492, 462, 'POSSOTOME'),
(3502, 462, 'YEGODOE'),
(3512, 472, 'AGATOGBO'),
(3522, 472, 'AKODEHA'),
(3532, 472, 'COME'),
(3542, 472, 'OUEDEME-PEDAH'),
(3552, 472, 'OUMAKO'),
(3562, 482, 'ADJAHA'),
(3572, 482, 'AGOUE'),
(3582, 482, 'AVLOH'),
(3592, 482, 'DJANGLANMEY'),
(3602, 482, 'GBEHOUE'),
(3612, 482, 'SAZOUE'),
(3622, 482, 'GRAND-POPO'),
(3632, 492, 'DAHE'),
(3642, 492, 'DOUTOU'),
(3652, 492, 'HONHOUE'),
(3662, 492, 'ZOUNGBONOU'),
(3672, 492, 'HOUEYOGBE'),
(3682, 492, 'SE'),
(3692, 502, 'AGAME'),
(3702, 502, 'HOUIN'),
(3712, 502, 'KOUDO'),
(3722, 502, 'OUEDEME'),
(3732, 502, 'LOKOSSA'),
(3742, 512, 'ADJARRA I'),
(3752, 512, 'ADJARRA II'),
(3762, 512, 'AGLOBE'),
(3772, 512, 'HONVIE'),
(3782, 512, 'MALANHOUI'),
(3792, 512, 'MEDJEDJONOU'),
(3802, 522, 'ADJOHOUN'),
(3812, 522, 'AKPADANOU'),
(3822, 522, 'AWONOU'),
(3832, 522, 'AZONWLISSE'),
(3842, 522, 'DEME'),
(3852, 522, 'GANGBAN'),
(3862, 522, 'KODE'),
(3872, 522, 'TOGBOTA'),
(3882, 532, 'AVAGBODJI'),
(3892, 532, 'HOUEDOME'),
(3902, 532, 'ZOUNGAME'),
(3912, 542, 'AKPRO- MISSERETE'),
(3922, 542, 'GOME-SOTA'),
(3932, 542, 'KATAGON'),
(3942, 542, 'VAKON'),
(3952, 542, 'ZOUNGBOME'),
(3962, 552, 'ATCHOUKPA'),
(3972, 552, 'AVRANKOU'),
(3982, 552, 'DJOMON'),
(3992, 552, 'GBOZOUNME'),
(4002, 552, 'KOUTY'),
(4012, 552, 'OUANHO'),
(4022, 552, 'SADO'),
(4032, 562, 'AFFAME'),
(4042, 562, 'ATCHONSA'),
(4052, 562, 'BONOU'),
(4062, 562, 'DAME-WOGNON'),
(4072, 562, 'HOUNVIGUE'),
(4082, 572, 'DANGBO'),
(4092, 572, 'GBEKO'),
(4102, 572, 'HOUEDOMEY'),
(4112, 572, 'HOZIN'),
(4122, 572, 'KESSOUNOU'),
(4132, 572, 'ZOUNGUE'),
(4142, 592, 'AGBLANGANDAN'),
(4152, 592, 'AHOLOUYEME'),
(4162, 592, 'DJREGBE'),
(4172, 592, 'EKPE'),
(4182, 592, 'SEME-KPODJI'),
(4192, 592, 'TOHOUE'),
(4202, 602, 'ADJA-OUERE'),
(4212, 602, 'IKPINLE'),
(4222, 602, 'KPOULOU'),
(4232, 602, 'MASSE'),
(4242, 602, 'OKO-AKARE'),
(4252, 602, 'TOTONNOUKON'),
(4262, 612, 'BANIGBE'),
(4272, 612, 'DAAGBE'),
(4282, 612, 'IFANGNI'),
(4292, 612, 'KO-KOUMOLOU'),
(4302, 612, 'LAGBE'),
(4312, 612, 'TCHAADA'),
(4322, 622, 'ADAKPLAME'),
(4332, 622, 'IDIGNY'),
(4342, 622, 'KPANKOU'),
(4352, 622, 'KETOU'),
(4362, 622, 'UDOMETA'),
(4372, 622, 'OKPOMETA'),
(4382, 632, 'AHOYEYE'),
(4392, 632, 'IGANA'),
(4402, 632, 'ISSABA'),
(4412, 632, 'POBE'),
(4422, 632, 'TOWE'),
(4432, 642, 'AGUIDI'),
(4442, 642, 'ITA-DJEBOU'),
(4452, 642, 'SAKETE I'),
(4462, 642, 'SAKETE II'),
(4472, 642, 'TAKON'),
(4482, 642, 'YOKO'),
(4492, 652, 'AGBOKPA'),
(4502, 652, 'DETOHOU'),
(4512, 652, 'SEHOUN'),
(4522, 652, 'ZOUNZOUNME'),
(4532, 652, 'DJEGBE'),
(4542, 652, 'HOUNLI'),
(4552, 652, 'VIDOLE'),
(4562, 662, 'ADAHONDJIGON'),
(4572, 662, 'ADINGNINGON'),
(4582, 662, 'AGBANGNINZOUN'),
(4592, 662, 'KINTA'),
(4602, 662, 'LISSAZOUNME'),
(4612, 662, 'SAHE'),
(4622, 662, 'KPOTA'),
(4632, 662, 'SIWE'),
(4642, 662, 'TANVE'),
(4652, 662, 'ZOUNGOUDO'),
(4662, 672, 'AGONGOINTO'),
(4672, 672, 'AVOGBANA'),
(4682, 672, 'BOHICON I'),
(4692, 672, 'BOHICON II'),
(4702, 672, 'GNIDJAZOUN'),
(4712, 672, 'LISSEZOUN'),
(4722, 672, 'OUASSAHO'),
(4732, 672, 'PASSAGON'),
(4742, 672, 'SACLO'),
(4752, 672, 'SODOHOME'),
(4762, 682, 'HOUEKO'),
(4772, 682, 'ADOGBE'),
(4782, 682, 'GOUNLI'),
(4792, 682, 'HOUENHOUNSO'),
(4802, 682, 'LAINTA-COGBE'),
(4812, 682, 'NAOGON'),
(4822, 682, 'SOLI'),
(4832, 682, 'ZOGBA'),
(4842, 692, 'AGONDJI'),
(4852, 692, 'DAN'),
(4862, 692, 'DJIDJA'),
(4872, 692, 'DOHOUIME'),
(4882, 692, 'GOBE'),
(4892, 692, 'OUNGBEGAME'),
(4902, 692, 'MONSOUROU'),
(4912, 692, 'MOUGNON'),
(4922, 692, 'OUTO'),
(4932, 692, 'SETTO'),
(4942, 692, 'ZOUKOU'),
(4952, 702, 'DASSO'),
(4962, 702, 'OUINHI'),
(4972, 702, 'SAGON'),
(4982, 702, 'TOHOUE'),
(4992, 712, 'AGONLI-HOUEGBO'),
(5002, 712, 'BANAME'),
(5012, 712, 'DON-TAN'),
(5022, 712, 'DOVI'),
(5032, 712, 'KPEDEKPO'),
(5042, 712, 'ZAGNANADO'),
(5052, 722, 'ALLAHE'),
(5062, 722, 'ASSALIN'),
(5072, 722, 'HOUNGOMEY'),
(5082, 722, 'KPAKPAME'),
(5092, 722, 'KPOZOUN'),
(5102, 722, 'ZA-KPOTA'),
(5112, 722, 'ZA-TANTA'),
(5122, 722, 'ZEKO'),
(5132, 732, 'AKIZA'),
(5142, 732, 'AVLAME'),
(5152, 732, 'AVLAME'),
(5162, 732, 'CANA I'),
(5172, 732, 'CANA II'),
(5182, 732, 'DOME'),
(5192, 732, 'KOUSSOUKPA'),
(5202, 732, 'KPOKISSA'),
(5212, 732, 'MASSI'),
(5222, 732, 'TANWE-HESSOU'),
(5232, 732, 'ZOGBODOMEY'),
(5242, 732, 'ZOUKOU'),
(5252, 442, '1ER ARRONDISSEMENT'),
(5262, 442, '2EME ARRONDISSEMENT'),
(5272, 442, '3EME ARRONDISSEMENT'),
(5282, 582, '1ER ARRONDISSEMENT'),
(5292, 582, '2EME ARRONDISSEMENT'),
(5302, 582, '3EME ARRONDISSEMENT'),
(5312, 582, '4EME ARRONDISSEMENT'),
(5322, 582, '5EME ARRONDISSEMENT');