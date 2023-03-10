<?php

namespace Faker\Provider\fi_FI;

class Person extends \Faker\Provider\Person
{
    protected static $maleNameFormats = [
        '{{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}}',
        '{{titleMale}} {{firstNameMale}} {{lastName}}',
    ];

    protected static $femaleNameFormats = [
        '{{firstNameFemale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}',
        '{{titleFemale}} {{firstNameFemale}} {{lastName}}',
    ];

    protected static $firstNameMale = [
        'Aleksi', 'Anssi', 'Antero', 'Antti', 'Ari', 'Arttu', 'Daniel', 'Eero', 'Eetu', 'Elias', 'Elmo', 'Emil', 'Erkki',
        'Hampus', 'Hannu', 'Harri', 'Heikki', 'Helmi', 'Henri', 'Hermanni', 'Ilja', 'Jaakko', 'Jake', 'Jani', 'Janne',
        'Jari', 'Jarno', 'Jere', 'Jeremy', 'Jesper', 'Jesse', 'Jimi', 'Joakim', 'Joel', 'Joona', 'Joonas', 'Juha',
        'Juho', 'Jukka', 'Julius', 'Jussi', 'Justus', 'Juuso', 'Kalle', 'Kasperi', 'Konsta', 'Kristian', 'Lassi', 'Leevi',
        'Leo', 'Levin', 'Luca', 'Lukas', 'Magnus', 'Marko', 'Markus', 'Matias', 'Matti', 'Miika', 'Mika', 'Mikael',
        'Mikko', 'Neo', 'Nico', 'Niklas', 'Niko', 'Oliver', 'Oskari', 'Ossi', 'Otto', 'Paavo', 'Pasi', 'Patrik',
        'Paulus', 'Peetu', 'Pekka', 'Pertti', 'Petri', 'Petteri', 'Pyry', 'Rami', 'Rasmus', 'Riku', 'Risto', 'Roope',
        'Saku', 'Sami', 'Samu', 'Samuel', 'Samuli', 'Santeri', 'Taneli', 'Tatu', 'Teemu', 'Teppo', 'Tero', 'Timo',
        'Tomi', 'Tommi', 'Topi', 'Touko', 'Tuomas', 'Tuomo', 'Tuukka', 'Tuukka', 'Valtteri', 'Veli', 'Viljo', 'Ville',
        'Aake', 'Aapeli', 'Aapo', 'Aappo', 'Aarni', 'Aaro', 'Aatto', 'Aatu', 'Akseli', 'Aku', 'Antton', 'Artturi',
        'Aune', 'Beeda', 'Briitta', 'Eeli', 'Eelis', 'Eemeli', 'Ekku', 'Eljas', 'Erkko', 'Iiro', 'Ilmari', 'Isto',
        'Jirko', 'Joonatan', 'Jore', 'Junnu', 'Jusu', 'Kaste', 'Kauto', 'Luukas', 'Nuutti', 'Onni', 'Osmo', 'Pekko',
        'Sampo', 'Santtu', 'Sauli', 'Simo', 'Sisu', 'Teijo', 'Unto', 'Urho', 'Veeti', 'Veikko', 'Vilho', 'Werneri', 'Wiljami',

    ];

    protected static $firstNameFemale = [
        'Aada', 'Ada', 'Aina', 'Aino', 'Aki', 'Aliisa', 'Amalia', 'Amanda', 'Amelia', 'Amira', 'Anissa', 'Anita', 'Anna',
        'Anne', 'Anni', 'Anniina', 'Annu', 'Anu', 'Asta', 'Atte', 'Atte', 'Aura', 'Aurora', 'Bella', 'Cara',
        'Celina', 'Christa', 'Christel', 'Clara', 'Cornelia', 'Dani', 'Eija', 'Elea', 'Elina', 'Elisa', 'Elise', 'Ella',
        'Ellen', 'Elma', 'Emilia', 'Emma', 'Emmi', 'Enna', 'Erja', 'Esa', 'Essi', 'Eva', 'Eveliina', 'Fanni',
        'Fiona', 'Hanna', 'Heidi', 'Heli', 'Helin??', 'Henna', 'Hilda', 'Hilja', 'Hilla', 'Hilma', 'Iida', 'Iina',
        'Iiris', 'Ilona', 'Inka', 'Inkeri', 'Inna', 'Isabella', 'Jade', 'Jami', 'Janette', 'Janika', 'Janina', 'Janita',
        'Janna', 'Janni', 'Jasmiina', 'Jenna', 'Jenni', 'Jessica', 'Johanna', 'Joni', 'Jonna', 'Julia', 'Juulia', 'Kaija',
        'Karla', 'Karri', 'Kati', 'Katja', 'Katri', 'Kia', 'Kimi', 'Kirsi', 'Krista', 'Lari', 'Laura', 'Lauri',
        'Lea', 'Lila', 'Linnea', 'Lotta', 'Lumina', 'Maarit', 'Maia', 'Maija', 'Maiju', 'Maisa', 'Mari', 'Maria',
        'Meeri', 'Meri', 'Mette', 'Mia', 'Milla', 'Mimi', 'Mimosa', 'Minna', 'Mira', 'Mirella', 'Miska', 'Nadja',
        'Natalia', 'Nea', 'Neea', 'Nella', 'Nia', 'Niina', 'Noora', 'Olga', 'Olivia', 'Oona', 'Outi', 'Paula',
        'Pauliina', 'Petra', 'Pia', 'Piia', 'Pinja', 'P??ivi', 'Reeta', 'Reetta', 'Riikka', 'Riina', 'Ritva', 'Roni',
        'Ronja', 'Sanna', 'Sari', 'Satu', 'Seija', 'Sirpa', 'Siru', 'Susanna', 'Tanja', 'Tara', 'Taru', 'Tea',
        'Terhi', 'Tiia', 'Tiina', 'Tiiu', 'Tinja', 'Veera', 'Vili', 'Vilma', 'Wilma', 'Aamu', 'Aliina', 'Annilotta',
        'Eerika', 'Eeva', 'Eevi', 'Eliina', 'Elviira', 'Emmaliina', 'Enni', 'Ennika', 'Helmiina', 'Henniina',
        'Hertta', 'Hilppa', 'Iia', 'Iita', 'Jadessa', 'Jemina', 'Jenika', 'Jermia', 'Jooa', 'Juttamari', 'Kaisla',
        'Kaisu', 'Loviisa', 'Malla', 'Martta', 'Matleena', 'Miina', 'Mimmu', 'Minea', 'Minttu', 'Mirva', 'Nelli', 'Ninni',
        'Oliivia', 'Peppi', 'Pihla', 'Pirkko', 'Riia', 'Roosa', 'Taika', 'Venla', 'Viivi', 'Vilja',
    ];

    protected static $lastName = [
        'Aakula', 'Aalto', 'Aaltonen', 'Aarnio', 'Aaronen', 'Aavikkola', 'Ahmala', 'Aho', 'Ahokas', 'Ahola', 'Ahomaa', 'Ahonen', 'Ahoniemi', 'Ahopelto', 'Ahovaara', 'Ahtila', 'Ahtiluoto', 'Ahtio', 'Ahtisaari', 'Ahto', 'Ahtola', 'Ahtonen', 'Ahtorinne', 'Aija', 'Aijala', 'Ainola', 'Aitio', 'Aitolahti', 'Aitomaa', 'Aittasalmi', 'Akkala', 'Akkanen', 'Alahuhta', 'Alajoki', 'Alaj??rvi', 'Alanen', 'Alatalo', 'Alasalmi', 'Alapuro', 'Alhola', 'Alijoki', 'Ankkala', 'Ankkuri', 'Annala', 'Annunen', 'Anttila', 'Anttinen', 'Anttonen', 'Ara', 'Arhila', 'Arhinm??ki', 'Arhosuo', 'Arinen', 'Arjamaa', 'Arjanen', 'Arkkila', 'Armio', 'Arnio', 'Aronen', 'Arosuo', 'Arponen', 'Arvola', 'Asikainen', 'Astala', 'Attila', 'Aunela', 'Aura', 'Auramies', 'Auranen', 'Autio', 'Auvinen', 'Auvola', 'Avonius', 'Avotie',
        'Br??ysy',
        'Davidsainen', 'Dufva',
        'Eerik??inen', 'Eerola', 'Einel', 'Eino', 'Einola', 'Einonen', 'Ekman', 'Ekola', 'Ellil??', 'Ellinen', 'Elomaa', 'Eloharju', 'Eloranta', 'Eno', 'Enola', 'En??j??rvi', 'Erkinjuntti', 'Erkkil??', 'Erkkinen', 'Erkko', 'Erkkola', 'Ernamo', 'Erola', 'Eronen', 'Ervola', 'Er??harju', 'Er??maja', 'Er??nen', 'Eskelinen', 'Eskel??', 'Eskola', 'Evel??', 'Evil??',
        'Filppula', 'Finni', 'Fr??ndil??', 'Fr??nti',
        'Haahka', 'Haahkola', 'Haanp????', 'Haapakorpi', 'Haapala', 'Haapanen', 'Haaparanta', 'Haajudulmi', 'Haajudulo', 'Haapkyl??', 'Haapoja', 'Haataja', 'Haavisto', 'Haikala', 'Haikara', 'Hakala', 'Hakkarainen', 'Hakki', 'Hakula', 'Halinen', 'Halkola', 'Halkonen', 'Halla', 'Hallaper', 'Hallapuro', 'Hallikainen', 'Hallila', 'Hallonen', 'Halme', 'Halmela', 'Halmelahti', 'Halonen', 'Halttunen', 'Hammas', 'Hanhela', 'Hanhinen', 'Hannula', 'Hannunen', 'Hapola', 'Harjam??ki', 'Harju', 'Harjula', 'Harjunp????', 'Harkimo', 'Hautakangas', 'Hautakoski', 'Hautala', 'Hautam??ki', 'Haverinen', 'Havukoski', 'Heikkil??', 'Heikkinen', 'Heimola', 'Hein??l??', 'Heiskanen', 'Heiskari', 'Helenius', 'Helinen', 'Helismaa', 'Helmel', 'Helovirta', 'Helppolainen', 'Helstel', 'Hellgren', 'Hentinen', 'Hento', 'Hepom??ki', 'Heponen', 'Herranen', 'Hervanta', 'Hervanto', 'Hekkaharju', 'Hiesu', 'Hietala', 'Hietanen', 'Hiltunen', 'Heintikainen', 'Hirvel??', 'Hirvi', 'Hirvikangas', 'Hirvonen', 'Hoikkala', 'Hoikkanen', 'Holappa', 'Holkeri', 'Hongisto', 'Honkanen', 'Hovi', 'Huhta', 'Huhtala', 'Hukkala', 'Huopainen', 'Huotari', 'Huovinen', 'Huttunen', 'Huuhka', 'Huurinainen', 'Huusko', 'Huvinen', 'Hypp??l??', 'Hypp??nen', 'Hyt??l??', 'Hyypi??', 'Hyypp??', 'H??kkinen', 'H??k??mies', 'H??m??l??inen', 'H??nninen', 'H??rk??nen',
        'Ihalainen', 'Ikola', 'Ikonen', 'Ilmarinen', 'Ilom??ki', 'Iloniemi', 'Ilvesniemi', 'Immonen', 'Inkeri', 'Inkinen', 'Isoluoma', 'Isom??ki', 'Isotalo', 'Itkonen', 'It??vaara', 'It??vuori',
        'Jaakkola', 'Jaakkonen', 'Jaakonmaa', 'Jaatinen', 'Jakkila', 'Jalonen', 'Jauhiainen', 'Jauho', 'Joenhaara', 'Johto', 'Jokelainen', 'Jokihaara', 'Jokimies', 'Jokinen', 'Jortikka', 'Joru', 'Junkkari', 'Juntti', 'Juppi', 'Jurva', 'Jurvala', 'Jurvanen', 'Jussila', 'Juustinen', 'Juuti', 'Juvanen', 'Juvonen', 'Jylh??', 'J??nis', 'J??ppinen', 'J??rvel??', 'J????skel??inen',
        'Kaakko', 'Kaikkonen', 'Kainulainen', 'Kaista', 'Kaivola', 'Kakkola', 'Kakkonen', 'Kalinainen', 'Kalkkinen', 'Kalliala', 'Kallio', 'Kaillom??ki', 'Kalmo', 'Kalvo', 'Kamari', 'Kamppinen', 'Kanala', 'Kangaskorte', 'Kangassalo', 'Kannelmaa', 'Kannelm??ki', 'Kantele', 'Kantola', 'Kapanen', 'Karalahti', 'Karhu', 'Karjalainen', 'Karpela', 'Karppinen', 'Karukoski', 'Karvonen', 'Katainen', 'Kataja', 'Kauhala', 'Kaukovaara', 'Kauppala', 'Kauppinen', 'Kaurism??ki', 'Kekkonen', 'Kerava', 'Kerttula', 'Keskinen', 'Keskioja', 'Ketola', 'Ketonen', 'Kettula', 'Kieli', 'Kiianen', 'Kiille', 'Kimalainen', 'Kiiski', 'Kinnula', 'Kinnunen', 'Kiskonen', 'Kissala', 'Kivi', 'Kiviniemi', 'Kivist??', 'Koirala', 'Koivisto', 'Koivula', 'Koivulehto', 'Koivuniemi', 'Kokkonen', 'Kolehmainen', 'Komulainen', 'Konttinen', 'Kontunen', 'Korhonen', 'Koriseva', 'Kortesj??rvi', 'Koskela', 'Koskelainen', 'Kosonen', 'Kotanen', 'Koukkula', 'Kouvonen', 'Kovalainen', 'Krapu', 'Krekel??', 'Kujala', 'Kujanp????', 'Kukkala', 'Kukkam??ki', 'Kukkonen', 'Kultala', 'Kumpula', 'Kumpulainen', 'Kunnas', 'Kuoppala', 'Kuosmanen', 'Kurkela', 'Kurki', 'Kuusij??rvi', 'Kyll??nen', 'Kynsij??rvi', 'Kynsilehto', 'K??rki', 'K??rkk??inen',
        'Laakkola', 'Laakkonen', 'Laakso', 'Laaksonen', 'Laatikainen', 'Lahdenp????', 'Laine', 'Lainela', 'Lakka', 'Lampinen', 'Lappalainen', 'Lassinen', 'Laurila', 'Lauronen', 'Lavola', 'Lehm??l??', 'Lehtim??ki', 'Lehtinen', 'Lehtisalo', 'Lehto', 'Lehtonen', 'Leino', 'Lepist??', 'Lepom??ki', 'Leppilampi', 'Lepp??korpi', 'Lepp??l??', 'Lepp??virta', 'Leskinen', 'Liimatainen', 'Lind', 'Linnala', 'Linnam??ki', 'Lippo', 'Litmanen', 'Litvala', 'Liukkonen', 'Loiri', 'Lukkari', 'Lumme', 'Luoma', 'Luukkonen', 'Lyly', 'Lyytik??inen', 'L??hteenm??ki', 'L??ms??',
        'Maahinen', 'Made', 'Maijala', 'Makkonen', 'Malmi', 'Malmivaara', 'Mannila', 'Manninen', 'Mannonen', 'Mansikka-aho', 'Mansikkaoja', 'Marila', 'Marjala', 'Marjam??ki', 'Marjola', 'Marjomaa', 'Marjonen', 'Markkanen', 'Markkula', 'Markuksela', 'Markus', 'Martikainen', 'Marttinen', 'Masala', 'Masanen', 'Matom??ki', 'Mattila', 'Maunula', 'Maunola', 'Melasniemi', 'Merel??', 'Meril??', 'Meril??inen', 'Merimaa', 'Metsoja', 'Mets??lampi', 'Mets??oja', 'Mielonen', 'Miettinen', 'Mikkola', 'Mikkonen', 'Muhonen', 'Mujunen', 'Murola', 'Mustap????', 'Mustonen', 'Muurinen', 'Myllym??ki', 'Myllypuro', 'Myllys', 'Myll??ri', 'M??enp????', 'M??kel??', 'M??ki', 'M??kinen', 'M??ntyl??', 'M????tt??', 'M??tt??nen',
        'Naula', 'Naulap????', 'Neuvonen', 'Nevala', 'Niemel??', 'Niemi', 'Nieminen', 'Niemist??', 'Niinimaa', 'Niinist??', 'Niiranen', 'Nikkanen', 'Nikkil??', 'Nikula', 'Nikulainen', 'Niskala', 'Nisukangas', 'Niukkanen', 'Nokelainen', 'Nokkonen', 'Notkonen', 'Nousiainen', 'Nukka', 'Nummelin', 'Nuotio', 'Nurkkala', 'Nurmela', 'Nurmi', 'Nurminiemi', 'Nurminen', 'Nuutti', 'Nyk??nen', 'Nyman', 'N??rv??l??', 'N????t??nen',
        'Oikkonen', 'Oikonen', 'Oinonen', 'Oja', 'Ojala', 'Ojam??ki', 'Ojanen', 'Ojaniemi', 'Oksala', 'Oksanen', 'Ollikainen', 'Ollila', 'Ollinen', 'Oravainen', 'Oravala', 'Otsamo', 'Outinen', 'Ovaska',
        'Paajanen', 'Paakkanen', 'Paananen', 'Paasikivi', 'Paasilinna', 'Paasonen', 'Paavola', 'Pahajoki', 'Pahkasalo', 'Pajum??ki', 'Pajunen', 'Pakarinen', 'Pakkala', 'Pakola', 'Pallas', 'Paloheimo', 'Palola', 'Palom??ki', 'Parkkonen', 'Pekkala', 'Pekkarinen', 'Pelkonen', 'Peltomaa', 'Pennanen', 'Pennil??', 'Pentik??inen', 'Penttil??', 'Perni??', 'Pesola', 'Pesonen', 'Peuranen', 'Peuraniemi', 'Pietil??', 'Piippola', 'Piirainen', 'Pikkarainen', 'Pirttij??rvi', 'Pirttikangas', 'Pitk??m??ki', 'Pohtamo', 'Porkkala', 'Poronen', 'Poropudas', 'Puhakainen??', 'Puhakka', 'Pukkila', 'Pulli', 'Puolakka', 'Puuper??', 'Pyykk??', 'Pyykk??nen', 'P??iv??l??', 'P??iv??rinta', 'P????kk??nen', 'P??ll??nen', 'P??ntinen', 'P??ysti',
        'Raappana', 'Raatikainen', 'Raatila', 'Rahka', 'Rahkala', 'Raiskio', 'Raitanen', 'Raittila', 'Rajam??ki', 'Ramu', 'Ranta', 'Rantamaa', 'Rapala', 'Rasila', 'Rasmus', 'Rauhala', 'Rauhanen', 'Rautaporras', 'Rautavirta', 'Rautio', 'Rehu', 'Reinikainen', 'Reinikka', 'Rekomaa', 'Repo', 'Repola', 'Riihim??ki', 'Riikonen', 'Rimmanen', 'Rinne', 'Rinta', 'Rintam??ki', 'Ristil??', 'Ritari', 'Rokko', 'Ronkainen', 'Roponen', 'Ruhanen', 'Rumpunen', 'Runtti', 'Ruohoniemi', 'Ruonala', 'Ruonansuu', 'Ruotsalainen', 'Ruuhonen', 'Ruuskari', 'Ruusula', 'Ruutti', 'Ryh??nen', 'Ryti', 'Ryysyl??inen', 'R??ikk??nen', 'R??is??nen', 'R??s??nen',
        'Saanila', 'Saarela', 'Saarenheimo', 'Saari', 'Saarikivi', 'Saarnio', 'Saarnivaara', 'Saastamoinen', 'Saikkonen', 'Saksala', 'Salenius', 'Salmela', 'Salmelainen', 'Salo', 'Salolainen', 'Salonen', 'Saloranta', 'Samulin', 'Sannala', 'Santanen', 'Saraste', 'Sarasvuo', 'Saukko', 'Savioja', 'Savolainen', 'Sel??nne', 'Seppelin', 'Sepp??nen', 'Sepp??l??', 'Servo', 'Set??nen', 'Siekkinen', 'Sievinen', 'Sihvonen', 'Siira', 'Siltonen', 'Sikala', 'Silakka', 'Sillanp????', 'Siltala', 'Silvennoinen', 'Simo', 'Simonen', 'Sinnem??ki', 'Sipil??', 'Sipola', 'Sirkesalo', 'Sirvi??', 'Raiski', 'Soikkeli', 'Soini', 'Sonninen', 'Soppela', 'Sorajoki', 'Sormunen', 'Sorsa', 'Suhonen', 'Suikkala', 'Summanen', 'Suomela', 'Suominen', 'Suosalo', 'Susiluoto', 'Sutinen', 'Suuronen', 'Suutarinen', 'Suvela', 'Syd??nm??ki', 'Syrj??', 'Syrj??l??', 'S??kkinen', 'S??rkk??',
        'Taavettila', 'Taavila', 'Taavitsainen', 'Taipale', 'Takkala', 'Takkula', 'Tamminen', 'Tammisto', 'Tanskanen', 'Tapio', 'Tapola', 'Tarvainen', 'Taskinen', 'Tastula', 'Tauriainen', 'Tenkanen', 'Teppo', 'Tervo', 'Tervonen', 'Ter??sniska', 'Tiainen', 'Tiilikainen', 'Timonen', 'Toijala', 'Toikkanen', 'Toivanen', 'Tokkola', 'Tolonen', 'Torkkeli', 'Tuisku', 'Tukiainen', 'Tulkki', 'Tuomela', 'Tuominen', 'Tuomisto', 'Tuppurainen', 'Turpeinen', 'Turunen', 'Tuutti', 'Tynkkynen', 'Typp??', 'Tyrninen', 'T??rr??', 'T??rr??nen',
        'Ukkola', 'Ulvila', 'Unhola', 'Uosukainen', 'Urhonen', 'Uronen', 'Urpalainen', 'Urpilainen', 'Utriainen', 'Uusikari', 'Uusikyl??', 'Uusisalmi', 'Uusitalo',
        'Vaara', 'Vahala', 'Vahanen', 'Vahvanen', 'Vainio', 'Valjakka', 'Valo', 'Valtanen', 'Vanhanen', 'Vanhoja', 'Varjus', 'Vartiainen', 'Vasala', 'Vauhkonen', 'Veijonen', 'Veini', 'Vennala', 'Vennamo', 'Veps??l??inen', 'Vesa', 'Vesuri', 'Vetel??inen', 'Vierikko', 'Vihtanen', 'Viikate', 'Viinanen', 'Viinikka', 'Vilhola', 'Viljanen', 'Vilkkula', 'Vilpas', 'Virkkula', 'Virkkunen', 'Virolainen', 'Virtala', 'Voutilainen', 'Vuokko', 'Vuorenp????', 'Vuorikoski', 'Vuorinen', 'V??h??l??', 'V??is??l??', 'V??is??nen', 'V??limaa', 'V??lioja', 'V??yrynen', 'V????t??nen',
        'Wettenranta', 'Wiitanen', 'Wirtanen', 'Wiskari',
        'Ylij??l??', 'Yliannala', 'Ylijoki', 'Ylikangas', 'Ylioja', 'Ylitalo', 'Ylpp??', 'Yl??joki', 'Yrj??nen', 'Yrj??n??', 'Yrj??l??', 'Yrttiaho', 'Y??maa',
        '??ij??l??', '??mm??l??', '??n??kk??l??', '??yr??s', '????rynen',
        '??versti', '??ysti', '????rni',
    ];

    protected static $titleMale = ['Hra.', 'Tri.'];

    protected static $titleFemale = ['Rva.', 'Nti.', 'Tri.'];

    /**
     * National Personal Identity Number (Henkil??tunnus)
     *
     * @see http://www.finlex.fi/fi/laki/ajantasa/2010/20100128
     *
     * @param \DateTime $birthdate
     * @param string    $gender    Person::GENDER_MALE || Person::GENDER_FEMALE
     *
     * @return string on format DDMMYYCZZZQ, where DDMMYY is the date of birth, C the century sign, ZZZ the individual number and Q the control character (checksum)
     */
    public function personalIdentityNumber(\DateTime $birthdate = null, $gender = null)
    {
        $checksumCharacters = '0123456789ABCDEFHJKLMNPRSTUVWXY';

        if (!$birthdate) {
            $birthdate = \Faker\Provider\DateTime::dateTimeThisCentury();
        }
        $datePart = $birthdate->format('dmy');

        switch ((int) ($birthdate->format('Y') / 100)) {
            case 18:
                $centurySign = '+';

                break;

            case 19:
                $centurySign = '-';

                break;

            case 20:
                $centurySign = 'A';

                break;

            default:
                throw new \InvalidArgumentException('Year must be between 1800 and 2099 inclusive.');
        }

        $randomDigits = self::numberBetween(0, 89);

        if ($gender && $gender == static::GENDER_MALE) {
            if ($randomDigits === 0) {
                $randomDigits .= static::randomElement([3, 5, 7, 9]);
            } else {
                $randomDigits .= static::randomElement([1, 3, 5, 7, 9]);
            }
        } elseif ($gender && $gender == static::GENDER_FEMALE) {
            if ($randomDigits === 0) {
                $randomDigits .= static::randomElement([2, 4, 6, 8]);
            } else {
                $randomDigits .= static::randomElement([0, 2, 4, 6, 8]);
            }
        } else {
            if ($randomDigits === 0) {
                $randomDigits .= self::numberBetween(2, 9);
            } else {
                $randomDigits .= (string) static::numerify('#');
            }
        }
        $randomDigits = str_pad($randomDigits, 3, '0', STR_PAD_LEFT);

        $checksum = $checksumCharacters[(int) ($datePart . $randomDigits) % strlen($checksumCharacters)];

        return $datePart . $centurySign . $randomDigits . $checksum;
    }
}
