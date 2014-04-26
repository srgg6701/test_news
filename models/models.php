<?php
/**
 * Получить список городов
 */
function getCities($city_id=NULL){
    $Db=new Db();
    $connect=$Db->getConnect();
    $sth = $connect->prepare("SELECT `id`, `city_name` FROM cities");
    $sth->execute();
    $cities = array();
    foreach($sth->fetchAll() as $i => $data){
        $cities[$data['id']]=$data['city_name'];
    }
    /*$cities = array(
        5	=> "Армавир",
        6	=> "Артём",
        7	=> "Архангельск",
        1	=> "Абакан",
        2	=> "Альметьевск",
        3	=> "Ангарск",
        4	=> "Арзамас",
        8	=> "Астрахань",
        9	=> "Ачинск",
        14	=> "Белгород",
        15	=> "Бердск",
        16	=> "Березники",
        17	=> "Бийск",
        10	=> "Балаково",
        11	=> "Балашиха",
        12	=> "Барнаул",
        13	=> "Батайск",
        18	=> "Благовещенск",
        19	=> "Братск",
        20	=> "Брянск",
        21	=> "Великий Новгород",
        22	=> "Владивосток",
        23	=> "Владикавказ",
        24	=> "Владимир",
        25	=> "Волгоград",
        26	=> "Волгодонск",
        27	=> "Волжский",
        28	=> "Вологда",
        29	=> "Воронеж",
        30	=> "Грозный",
        31	=> "Дербент",
        32	=> "Дзержинск",
        33	=> "Димитровград",
        34	=> "Домодедово",
        35	=> "Евпатория",
        36	=> "Екатеринбург",
        37	=> "Елец",
        38	=> "Ессентуки",
        39	=> "Железнодорожный",
        40	=> "Жуковский",
        41	=> "Златоуст",
        42	=> "Иваново",
        43	=> "Ижевск",
        44	=> "Иркутск",
        45	=> "Йошкар-Ола",
        46	=> "Казань",
        47	=> "Калининград",
        48	=> "Калуга",
        49	=> "Каменск-Уральский",
        50	=> "Камышин",
        51	=> "Каспийск",
        52	=> "Кемерово",
        53	=> "Керчь",
        54	=> "Киров",
        55	=> "Кисловодск",
        56	=> "Ковров",
        57	=> "Коломна",
        58	=> "Комсомольск-на-Амуре",
        59	=> "Копейск",
        60	=> "Королёв",
        61	=> "Кострома",
        62	=> "Красногорск",
        63	=> "Краснодар",
        64	=> "Красноярск",
        65	=> "Курган",
        66	=> "Курск",
        67	=> "Кызыл",
        68	=> "Липецк",
        69	=> "Люберцы",
        70	=> "Магнитогорск",
        71	=> "Майкоп",
        72	=> "Махачкала",
        73	=> "Миасс",
        74	=> "Москва",
        75	=> "Мурманск",
        76	=> "Муром",
        77	=> "Мытищи",
        78	=> "Набережные Челны",
        79	=> "Назрань",
        80	=> "Нальчик",
        81	=> "Находка",
        82	=> "Невинномысск",
        83	=> "Нефтекамск",
        84	=> "Нефтеюганск",
        85	=> "Нижневартовск",
        86	=> "Нижнекамск",
        87	=> "Нижний Новгород",
        88	=> "Нижний Тагил",
        89	=> "Новокузнецк",
        90	=> "Новокуйбышевск",
        91	=> "Новомосковск",
        92	=> "Новороссийск",
        93	=> "Новосибирск",
        94	=> "Новочебоксарск",
        95	=> "Новочеркасск",
        96	=> "Новошахтинск",
        97	=> "Новый Уренгой",
        98	=> "Ногинск",
        99	=> "Норильск",
        100	=> "Ноябрьск",
        101	=> "Обнинск",
        102	=> "Одинцово",
        103	=> "Октябрьский",
        104	=> "Омск",
        105	=> "Орёл",
        106	=> "Оренбург",
        107	=> "Орехово-Зуево",
        108	=> "Орск",
        109	=> "Пенза",
        110	=> "Первоуральск",
        111	=> "Пермь",
        112	=> "Петрозаводск",
        113	=> "Петропавловск-Камчатский",
        114	=> "Подольск",
        115	=> "Прокопьевск",
        116	=> "Псков",
        117	=> "Пушкино",
        118	=> "Пятигорск",
        119	=> "Раменское",
        120	=> "Ростов-на-Дону",
        121	=> "Рубцовск",
        122	=> "Рыбинск",
        123	=> "Рязань",
        124	=> "Салават",
        125	=> "Самара",
        126	=> "Санкт-Петербург",
        127	=> "Саранск",
        128	=> "Сарапул",
        129	=> "Саратов",
        130	=> "Севастополь",
        131	=> "Северодвинск",
        132	=> "Северск",
        133	=> "Сергиев Посад",
        134	=> "Серпухов",
        135	=> "Симферополь",
        136	=> "Смоленск",
        137	=> "Сочи",
        138	=> "Ставрополь",
        139	=> "Старый Оскол",
        140	=> "Стерлитамак",
        141	=> "Сургут",
        142	=> "Сызрань",
        143	=> "Сыктывкар",
        144	=> "Таганрог",
        145	=> "Тамбов",
        146	=> "Тверь",
        147	=> "Тольятти",
        148	=> "Томск",
        149	=> "Тула",
        150	=> "Тюмень",
        151	=> "Улан-Удэ",
        152	=> "Ульяновск",
        153	=> "Уссурийск",
        154	=> "Уфа",
        155	=> "Хабаровск",
        156	=> "Хасавюрт",
        157	=> "Химки",
        158	=> "Чебоксары",
        159	=> "Челябинск",
        160	=> "Череповец",
        161	=> "Черкесск",
        162	=> "Чита",
        163	=> "Шахты",
        164	=> "Щёлково",
        165	=> "Электросталь",
        166	=> "Элиста",
        167	=> "Энгельс",
        168	=> "Южно-Сахалинск",
        169	=> "Якутск",
        170	=> "Ярославль"
    );*/
    if($city_id)
        return (array_key_exists($city_id, $cities))? $cities[$city_id] : false;
    return $cities;
}
/**
 * Получить новости
 */
function getNews($news_id=NULL,$limit=false){
    $Db=new Db();
    $connect=$Db->getConnect();
    if($news_id) $sub_text = "`text`";
    else{
        if (!$limit) $limit = 120;
        $sub_text = "LEFT (`text`, ".$limit.") AS 'text'";
    }
    $sth = $connect->prepare("SELECT `id`, DATE_FORMAT(`datetime`, '%d.%m.%Y') AS 'datetime', `subject`, $sub_text, `cities_id_id` FROM news");
    $sth->execute();
    $news = array();
    foreach($sth->fetchAll() as $i => $data){
        $newsid = $data['id'];
        $news[$newsid]=array();
        array_push($news[$newsid],$data['datetime'],$data['subject'],$data['text'],$data['cities_id_id']);
    }   //var_dump("<pre>",$news,"<pre/>");die();
    /*$news = array(
        1=>array('10.02.2014','Трактористы и комбайнёрки берут ипотеку', 'Россия возьмётся за глобальное изучение Луны. Во всяком случае, глава Роскосмоса Олег Остапенко сообщил, что в новой стратегической программе, которая увидит свет в ближайшие месяцы, рассматривается формирование на Луне станций с мощной энергетикой. Конечно, это не отменяет ни марсианской программы, ни проектов по изучению астероидов, но всё же Луна становится особым объектом интереса, поэтому Роскосмос уже обсуждает с соответствующими научными институтами возможности современных энергоустановок. Поскольку солнечной энергетики для лунных станций будет явно недостаточно, Остапенко предполагает в будущем серьёзные «изыскательные работы» и внедрение прорывных технологий и решений в освоении космического пространства.
«Планов громадьё», – пошутил г-н Остапенко, раскрывая некоторые «карты» разрабатываемой космической программы до 2025 года: это и усовершенствование аппаратов, и масштабное изучение космоса, и прорывные проекты с привлечением молодых учёных. Например, на днях глава Федерального космического агентства побывал в петербургском Политехническом университете и «спонтанно» договорился там о создании аппарата для дистанционного зондирования земли «с уникальными характеристиками».', '74,120,126'),
        2=>array('10.02.2014','Первая встреча с марсианами в Крыму', 'По внешнему виду одноэтажные домики в Shanghai Hi-Tech Industrial Park ничем не отличаются от обычных домов. И все же отличие, причем, довольно существенное имеется. Эти дома «построены» в расположенном на востоке Китая городе Сучжоу, провинция Цзянсу, огромным 3D принтером.
Вообще-то строго говоря, комплект «строительного» оборудования состоит из 4 принтеров, каждый из которых по размерам не отличается от создаваемых ими домов: 10 метров в ширину и 6,6 метра в высоту. Они оборудованы автоматическими спреями, которые вырабатывают смесь цемента с наполнителями и «печатают» стены слой за слоем.
Больше всего изобретатель принтерно-строительной системы Ма Ихэ гордится созданием технологии быстротвердеющего цемента, которая позволила ему «построить» при помощи принтеров за 24 часа 10 одноэтажных домов. Технология, сообщает агентство Синьхуа, позволяет строительному материалу быстро твердеть и набирать прочность. Естественно, она держится в тайне.
По словам Ма Ихэ, его принтеры могут «печатать» и многоэтажные дома, однако в строительных нормах и правилах в Китае еще нет раздела о «напечатанных» домах. Естественно, к нынешним домам повышенное внимание проявляют не только потенциальные покупатели, но и власти, которые проводят многочисленные проверки, чтобы убедиться в их прочности и надежности.', '74'),
        2=>array('11.02.2014','Обнаружено происхождение выражения "Кирдык"', 'Бюро по регистрации патентов и торговых марок США сообщило, что выдало компании Apple патент на интерактивный трехмерный монитор, проецирующий изображение в воздух.

Благодаря новой технологии пользователь сможет видеть трехмерное изображение без использования специальных очков.

Система нового монитора будет состоять из зеркального модуля с углублением, инфракрасных лазеров и ряда других излучающих свет устройств, пишет crmdaily.ru.

Полученным изображением пользователь сможет управлять по собственному желанию, используя для этого жесты.', '120,126'),
        4=>array('11.02.2014','Инфляция, это она', 'До конца 2014 года Роскомнадзор планирует запустить "самообучаемую" программу мониторинга интернета, в том числе форумов и социальных сетей. искать будут проявления экстремизма. Об этом сообщают РИА-новости.
Создание программы обусловлено стремлением к повышению ответственности за экстремизм в СМИ. Программное обеспечение для этих целей предлагалось и компанией "Медиалогия", и "Ашманов и партнеры", однако выбор пал на другого исполнителя, сведений о котором пока не распространяют. Стоимость проекта оценивается в 25 миллионов рублей.
При поиске экстремистких материалов система будет ориентироваться на "ключевые маркеры".
Напомним, ранее был поддержан закон о приравнивании популярных блогеров к СМИ. Критерий популярности — ежедневная аудитория не менее 3 тысяч пользователей. В частности, таких блогеров обяжут проверять достоверность общедоступной информации, не распространять информацию о частной жизни гражданина с нарушением гражданского законодательства, соблюдать запреты и ограничения избирательного закона и указывать возрастные ограничения для пользователей. Закон принят госдумой в третьем чтении.
В России с 1 ноября функционирует "черный список" сайтов с детским порно, инструкциями по суицидам и так далее. Добавления в список осуществляется Роскомнадзором. Также в России теперь можно заблокировать ресурс еще до суда.', '74,120'),
        5=>array('12.02.2014','Премия оскара', 'Социальная сеть запустила новостное агентство FB Newswire, которое станет публиковать проверенные материалы пользователей, сообщается в блоге компании. Сервис рассчитан, в первую очередь, на журналистов.

За основу новостных материалов будут браться фотографии, видеозаписи и посты, размещенные на страницах пользователей.

FB Newswire будет доступно как на странице в Facebook, так и в Twitter. Создатели подчеркивают, что обновление будет производиться в режиме реального времени. По расчетам Facebook, в создании новостного контента в соцсети участвуют не меньше 1 млн. человек каждый день.

Этот проект — далеко не первая попытка соцсети обратить внимание на новостной поток в лентах новостей пользователей. В декабре компания заявила, что снизит ранжирование в пользу новостных заметок.', '120'),
        6=>array('13.02.2014','ГМО побеждает', 'В Новосибирске, рядом со станцией «Разъезд Иня», где планируется в скором времени строительство нового жилмассива, археологи произвели раскопки и обнаружили  древнее поселение с сохранившейся керамической посудой, сообщил 25 апреля замдиректора по научной работе Института археологии и этнографии СО РАН Вячеслав Молодин, передает портал НГС.
Летом прошлого года, строители при проведении работ, нашли древнюю стоянку Ирменьской культуры и пригласили археологов для проведения на месте строительства раскопок. Как пояснил специалист, обнаруженное поселение относится к эпохе поздней бронзы XIV–X вв до н.э. На поселениях находят как правило, разбитые черепки, а на этом памятнике было найдено несколько целых сосудов.

Раскопки на месте строительства стали возможны благодаря администрации области, поскольку застройщик изначально не хотел выделять средства на эти цели, добавил Вячеслав Молодин.
За прошлое лето археологи провели работы на всей заказанной им территории, однако это не весь участок, предназначенный под строительство, и части уникального памятника по-прежнему угрожает снос. Вячеслав Молодин не исключает, что в ближайшее время археологи продолжат эти раскопки.', '120,126'),
        7=>array('13.02.2014','Новая память выходит на рынок', 'В Новосибирске, рядом со станцией «Разъезд Иня», где планируется в скором времени строительство нового жилмассива, археологи произвели раскопки и обнаружили  древнее поселение с сохранившейся керамической посудой, сообщил 25 апреля замдиректора по научной работе Института археологии и этнографии СО РАН Вячеслав Молодин, передает портал НГС.
Летом прошлого года, строители при проведении работ, нашли древнюю стоянку Ирменьской культуры и пригласили археологов для проведения на месте строительства раскопок. Как пояснил специалист, обнаруженное поселение относится к эпохе поздней бронзы XIV–X вв до н.э. На поселениях находят как правило, разбитые черепки, а на этом памятнике было найдено несколько целых сосудов.

Раскопки на месте строительства стали возможны благодаря администрации области, поскольку застройщик изначально не хотел выделять средства на эти цели, добавил Вячеслав Молодин.
За прошлое лето археологи провели работы на всей заказанной им территории, однако это не весь участок, предназначенный под строительство, и части уникального памятника по-прежнему угрожает снос. Вячеслав Молодин не исключает, что в ближайшее время археологи продолжат эти раскопки.', '74'),
        8=>array('13.02.2014','Британские учёные снова на коне', 'Как сообщил представитель Центра подготовки космонавтов, они были на заседании комиссии (в ее состав входят специалисты ИМБП, ФМБА) 22 апреля. По решению этой комиссии их не допустили к дальнейшим тренировкам. Однако это еще не говорит о том, что космонавтов отстранили от полета вообще. Это обычный случай - специалистам что-то не понравилось. Может, имела место простуда. Не исключено, что на следующей комиссии их вновь признают годными, и космонавты начнут тренироваться как обычно.

Тем более нет никакого повода говорить, что Романенко и Залетина отчислили из отряда, как уже поторопились сообщить некоторые СМИ.

Справка «МК»

Летчик-космонавт Сергей Залетин был зачислен в отряд космонавтов в 1990 году. Совершил два полета в космос — командиром экипажа "Союз ТМ-30" и командиром "Союз ТМА-1", проведя в космосе в общей сложности 83 суток 16 часов 35 минут 25 секунд. Герой России.

Летчик-космонавт Роман Романенко, сын советского космонавта, дважды Героя Советского Союза Юрия Романенко, военный летчик по специальности, был зачислен в отряд космонавтов в 1997 году. Совершил два полета: в 2009 году - в качестве командира корабля "Союз ТМА-15" и бортинженера МКС, и в 2012- 2013 годах в качестве командира "Союза ТМА-07М" и бортинженера МКС. Во время этого полета совершил выход в открытый космос длительностью 6,5 часа. Всего провел в космосе 145 суток 14 часов 18 минут. Удостоен звания Героя России.', '126'),
        9=>array('13.02.2014','Закрыт последний ларёк', 'Автограф поэтессы Марины Цветаевой, адресованный главе Временного правительства Александру Керенскому, был продан в четверг в московском "Доме антикварной книги" за 8,25 млн руб. (почти $230 тыс.) - это мировой рекорд цены за автограф поэта Серебряного века, сообщил директор дома Сергей Бурмистров.
        Автограф Цветаевой Керенскому был поставлен на вышедшем в 1922 г. в Берлине экземпляре поэмы "Царь-девица". "Дорогому Александру Федоровичу Керенскому - русскую сказку, где ничто не сладится. Марина Цветаева. Прага, февраль 1924 г.",- написала она. Покупателем выступил российский коллекционер.', '170'),
        10=>array('13.02.2014','Неандертальцы возрождены', 'Куряне с особым вниманием следили за проектом  "Голос. Дети" на Первом канале. Ведь одна из его участниц -  10-летняя Алиса Кожикина из Курчатовского района. 25 апреля, в пятницу, жители России выбрали лучший детский голос страны. Это свершилось – курянка   Алиса Кожикина одержала грандиозную победу в шоу «Голос. Дети»! Она  с большим отрывом обошла в финале своих конкурентов Льва Аксельрода и Рагду Ханиеву . Алиса получила 58,2% зрительских голосов, а Лев и Рагда 17,1 % и 24,7% голосов соответственно.
В финале  курянка прекрасно исполнила песню "Лучший".Скромная и энергичная, талантливая и непосредственная, она буквально очаровала своим выступлением. Было видно, как курянка  получает удовольствие, заряжается от зала и делится своей энергетикой с аудиторией.
Во втором туре финала каждый из тройки лидеров снова выступил сольно. И только после этого с учетом количества отданных за финалистов голосов  определился победитель проекта. Наша курянка выступила  последней. Она исполнила песню М. Керии "Все". Было трудно поверить, что курянке всего 10 лет, настолько трогательно и чувственно она исполнила песню о любви в финале, сыгравшую решительную роль в выборе телезрителей.', '169'),
        11=>array('13.02.2014','На Марсе найдена жизнь!', 'Минувшей ночью любителям книг по всей России было не до сна. Для них открылись тысячи библиотек, книжных магазинов и арт-кафе. Уже в третий раз прошла акция "Библионочь". Впервые она состоялась в Крыму. Россияне из других регионов с удовольствием отправили жителям полуострова книжные посылки.
Раз в год Государственная библиотека им. Ленина пускает всех желающих в святую святых – свое книгохранилище. Но для многих одним посещением дело не обошлось. Читатели во время акции решили пополнить библиотеки Крыма, в которых практически не осталось книг на русском языке. "Главная задача – пополнение фондов книгами на русском языке, потому что в течение 20 лет, естественно, книг на русском в крымские библиотеки никто не покупал. И каких-то централизованных поставок из Киева не было, образовался громадный культурный разрыв", - сказал министр культуры Владимир Мединский.
Почти месяц сбор литературы проводится и по всей стране. Правда, торжественную отправку ценного груза в Крым несколько раз пришлось откладывать: люди продолжают нести книги чемоданами.', '74,168'),
        12=>array('14.02.2014','Аукцион в Питера', 'Рособрнадзор заключил с Ростелекомом контракт на 600 миллионов рублей. Ростелеком обязался организовать видеонаблюдение за ходом Единого государственного экзамена, сообщает агентство экономической информации "Прайм”.

За Ростелекомом - оснащение большого числа объектов средствами для организации видеонаблюдения. Программно-аппаратный комплекс включает компьютер с жестким диском не менее 2 Тб и две видеокамеры. Оснащаться будут как пункты проведения экзаменов, так и региональные центры обработки информации.

В общей сложности будут оборудованы видеонаблюдением 36 тысяч помещений, из них 16 тысяч будут доступны в режиме онлайн.', '74,120,166'),
        13=>array('14.02.2014','Лучший автосервис в Жмуринке', 'Американская актриса, обладательница двух "Оскаров" Джоди Фостер вышла замуж. Вернее, сочеталась браком со своей подругой, фотографом и телеактрисой Александрой Хедисон.

Об этом агентству Reuters сообщила представитель актрисы, уточнив, что свадьба двух красавиц прошла еще в минувшие выходные. Правда, не сообщила, где состоялась церемония.

Джоди Фостер, которой в ноябре прошлого года исполнился 51 год, и 44-летняя Александра Хедисон встречаются с прошлого лета.

Александра Хедисон (слева) до нежной дружбы с Джоди Фостер встречалась с телеведущей Эллен ди Дженерис (справа). Фото: REUTERS
Александра Хедисон (слева) до нежной дружбы с Джоди Фостер встречалась с телеведущей Эллен ди Дженерис (справа). Фото: REUTERS
Кстати, Фостер поведала миру о своей любви к Хедисон на церемонии вручения премии "Золотой глобус" в январе, когда публично призналась в своей нетрадиционной сексуальной ориентации.

 ЧИТАЙТЕ ТАКЖЕ

Отцом сыновей Джоди Фостер может быть Мел Гибсон

После проникновенной речи Джоди Фостер на церемонии вручения "Золотых глобусов", в которой она впервые официально рассказала о своей нетрадиционной сексуальной ориентации, вновь поползли слухи о сыновьях кинодивы. Двое детей Джоди до сих пор не знают, кто их отец. По слухам, она пообещала назвать его имя, когда им исполнится 21 год. Не исключено, что им окажется Мел Гибсон', '165,164,163'),
        14=>array('01.02.2014','Первый урожай конопли на Дону', 'В Вологде стартовал открытый международный фестиваль мультимедийного творчества "Мультиматограф". В областной столице он проходит уже в десятый раз. Ежегодно здесь собираются сотни молодых людей со всего мира, которые готовы делиться своими идеями, а также знаменитые эксперты области мультимедиа, сообщает ИА REGNUM .

Всего конкурсный отбор прошли 129 работ. Участниками фестиваля стали художники-аниматоры из 18 стран мира. Среди них Россия, Австралия, Великобритания, Германия, Колумбия, Португалия, Франция, Канада, Испания, Израиль, Иран и другие. Благодаря именно этому фестивалю современная молодежь получает возможность набраться опыта у знаменитых экспертов и получить зрительскую оценку своего творчества.

"Этот фестиваль имеет большую ценность для нашего региона и способствует укреплению позитивного имиджа Вологодчины как столицы высоких культурных достижений. Он постояно собирает вокруг себя специалистов высокого уровня, способствует продвижению талантливой молодежи. И вместе с тем является очень интересным для широкой публики", – отметила начальник Управления государственной политики в сфере культуры и искусства Ирина Султаншина.

Членами экспертного жюри в этом году по традиции стали известные сценаристы, операторы и режиссеры со всего мира. Одним из них стал создатель знаменитых мультфильмов – таких как "Утиные истории", "Чип и Дейл", "Гуфи и его команда" – Джимн Мэгон. Известный художник анимации проведет несколько мастер-классов и поставит свою оценку конкурсным работам.

"Сейчас я работаю с одним из гостей прошлого фестиваля Майком де Севе. И он предложил организаторам мою кандидатуру. Мы трудимся над созданием мультфильма "Котики, вперед". Его презентация, кстати, пройдет здесь, на фестивале", – рассказал Джимн Мэгон.

Добавим, что смотр конкурсных работ начнется уже сегодня, 25 апреля. А победитель фестиваля будет назван 27 апреля на гала-концерте.', '159,160,162'),
    );*/
    //
    if($news_id){
        if(array_key_exists($news_id, $news)) {
            return array('id'       =>$news_id,
                         'date'     =>$news[$news_id][0],
                         'subject'  =>$news[$news_id][1],
                         'text'     =>$news[$news_id][2],
                         'cities'   =>$news[$news_id][3],
                    );// array_unshift($news[$news_id],$news_id); ?!!!
        }else{
            return false;
        }
    }
    else return $news;
}

function getNewsByCity($city_id){
    $city_news=array();
    $city_id = (string)$city_id;
    foreach(getNews(NULL,300) as $i=>$news){
        if(in_array($city_id, explode(',', $news[3])))
            $city_news[$i]=$news;
    } //echo "<hr>"; var_dump("<pre>",$city_news,"<pre/>");
    return $city_news;
}