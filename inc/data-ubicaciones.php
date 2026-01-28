<?php

/**
 * Peru Locations Data
 * 
 * Contains Departments, Provinces and Districts of Peru.
 */

function get_peru_locations_data()
{
    return [
        'Amazonas' => [
            'Chachapoyas' => ['Chachapoyas', 'Asunción', 'Balsas', 'Cheto', 'Chiliquin', 'Chuquibamba', 'Granada', 'Huancas', 'La Jalca', 'Leimebamba', 'Levanto', 'Magdalena', 'Mariscal Castilla', 'Molinopampa', 'Montevideo', 'Olleros', 'Quinjalca', 'San Francisco de Daguas', 'San Isidro de Maino', 'Soloco', 'Sonche'],
            'Bagua' => ['La Peca', 'Aramango', 'Copallin', 'El Parco', 'Imaza'],
            'Bongará' => ['Jumbilla', 'Chisquilla', 'Churuja', 'Corosha', 'Cuispes', 'Florida', 'Jazan', 'Recta', 'San Carlos', 'Shipasbamba', 'Valera', 'Yambrasbamba'],
            'Condorcanqui' => ['Nieva', 'El Cenepa', 'Río Santiago'],
            'Luya' => ['Lamud', 'Camporredondo', 'Cocabamba', 'Colcamar', 'Conila', 'Inguilpata', 'Longuita', 'Lonya Chico', 'Luya', 'Luya Viejo', 'María', 'Ocalli', 'Ocumal', 'Pisuquia', 'Providencia', 'San Cristóbal', 'San Francisco del Yeso', 'San Jerónimo', 'San Juan de Lopecancha', 'Santa Catalina', 'Santo Tomas', 'Tingo', 'Trita'],
            'Rodríguez de Mendoza' => ['San Nicolás', 'Chirimoto', 'Cochamal', 'Huambo', 'Limabamba', 'Longar', 'Mariscal Benavides', 'Milpuc', 'Omia', 'Santa Rosa', 'Totora', 'Vista Alegre'],
            'Utcubamba' => ['Bagua Grande', 'Cajaruro', 'Cumba', 'El Milagro', 'Jamalca', 'Lonya Grande', 'Yamón']
        ],
        'Áncash' => [
            'Huaraz' => ['Huaraz', 'Cochabamba', 'Colcabamba', 'Huanchay', 'Independencia', 'Jangas', 'La Libertad', 'Olleros', 'Pampas Grandes', 'Pariacoto', 'Pira', 'Tarica'],
            'Aija' => ['Aija', 'Coris', 'Huacllan', 'La Merced', 'Succha'],
            'Antonio Raymondi' => ['Llamellin', 'Aczo', 'Chaccho', 'Chingas', 'Mirgas', 'San Juan de Rontoy'],
            'Asunción' => ['Chacas', 'Acochaca'],
            'Bolognesi' => ['Chiquian', 'Abelardo Pardo Lezameta', 'Antonio Raymondi', 'Aquia', 'Cajacay', 'Canis', 'Colquioc', 'Huallanca', 'Huasta', 'Huayllacayan', 'La Primavera', 'Mangas', 'Pacllon', 'San Abelardo Pardo Lezameta', 'Ticllos'],
            'Carhuaz' => ['Carhuaz', 'Acopampa', 'Amashca', 'Anta', 'Cascapara', 'Marcara', 'Pariahuanca', 'San Miguel de Aco', 'Shilla', 'Tinco', 'Yungar'],
            'Carlos Fermín Fitzcarrald' => ['San Luis', 'San Nicolás', 'Yauya'],
            'Casma' => ['Casma', 'Buenavista Alta', 'Comandante Noel', 'Yautan'],
            'Corongo' => ['Corongo', 'Aco', 'Bambas', 'Cusca', 'La Pampa', 'Yanac', 'Yupan'],
            'Huari' => ['Huari', 'Anra', 'Cajay', 'Chavin de Huantar', 'Huacachi', 'Huacchis', 'Huachis', 'Huantar', 'Masin', 'Paucas', 'Ponto', 'Rahuapampa', 'Rapayan', 'San Marcos', 'San Pedro de Chana', 'Uco'],
            'Huarmey' => ['Huarmey', 'Cochapeti', 'Culebras', 'Huayan', 'Malvas'],
            'Huaylas' => ['Caraz', 'Huallanca', 'Huata', 'Huaylas', 'Mato', 'Pamparomas', 'Pueblo Libre', 'Santa Cruz', 'Santo Toribio', 'Yuracmarca'],
            'Mariscal Luzuriaga' => ['Piscobamba', 'Casca', 'Eleazar Guzmán Barrón', 'Fidel Olivas Escudero', 'Llama', 'Llumpa', 'Lucma', 'Musga'],
            'Ocros' => ['Ocros', 'Acas', 'Cajamarquilla', 'Carhuapampa', 'Cochas', 'Congas', 'Llipa', 'San Cristóbal de Rajan', 'San Pedro', 'Santiago de Chilcas'],
            'Pallasca' => ['Cabana', 'Bolognesi', 'Conchucos', 'Huacaschuque', 'Huandoval', 'Lacabamba', 'Llapo', 'Pallasca', 'Pampas', 'Santa Rosa', 'Tauca'],
            'Pomabamba' => ['Pomabamba', 'Huayllan', 'Parobamba', 'Quinuabamba'],
            'Recuay' => ['Recuay', 'Catac', 'Cotaparaco', 'Huayllapampa', 'Llacllin', 'Marca', 'Pampas Chico', 'Pararin', 'Tapacocha', 'Ticapampa'],
            'Santa' => ['Chimbote', 'Cáceres del Perú', 'Coishco', 'Macate', 'Moro', 'Nepeña', 'Samanco', 'Santa', 'Nuevo Chimbote'],
            'Sihuas' => ['Sihuas', 'Acobamba', 'Alfonso Ugarte', 'Cashapampa', 'Chullin', 'Huayllabamba', 'Quiches', 'Ragash', 'San Juan', 'Sicsibamba'],
            'Yungay' => ['Yungay', 'Cascapara', 'Manco Kapac', 'Matacoto', 'Quillo', 'Ranrahirca', 'Shupluy', 'Yanama']
        ],
        'Arequipa' => [
            'Arequipa' => ['Arequipa', 'Alto Selva Alegre', 'Cayma', 'Cerro Colorado', 'Characato', 'Chiguata', 'Jacobo Hunter', 'Jose Luis Bustamante y Rivero', 'La Joya', 'Mariano Melgar', 'Miraflores', 'Mollebaya', 'Paucarpata', 'Pocsi', 'Polobaya', 'Quequeña', 'Sabandia', 'Sachaca', 'San Juan de Siguas', 'San Juan de Tarucani', 'Santa Isabel de Siguas', 'Santa Rita de Siguas', 'Socabaya', 'Tiabaya', 'Uchumayo', 'Vitor', 'Yanahuara', 'Yarabamba', 'Yura'],
            'Camaná' => ['Camaná', 'Jose María Quimper', 'Mariano Nicolás Valcarcel', 'Mariscal Cáceres', 'Nicolás de Piérola', 'Ocoña', 'Quilca', 'Samuel Pastor'],
            'Caravelí' => ['Caravelí', 'Acarí', 'Atico', 'Atiquipa', 'Bella Unión', 'Cahuacho', 'Chala', 'Chaparra', 'Huanuhuanu', 'Jaqui', 'Lomas', 'Quicacha', 'Yauca'],
            'Castilla' => ['Aplao', 'Andagua', 'Ayo', 'Chachas', 'Chilcaymarca', 'Choco', 'Huancarqui', 'Machaguay', 'Orcopampa', 'Pampacolca', 'Tipan', 'Uñon', 'Uraca', 'Viraco'],
            'Caylloma' => ['Chivay', 'Achoma', 'Cabanaconde', 'Callalli', 'Caylloma', 'Coporaque', 'Huambo', 'Huanca', 'Ichupampa', 'Lari', 'Lluta', 'Maca', 'Madrigal', 'Majes', 'Pinchollo', 'San Antonio de Chuca', 'Sibayo', 'Tapay', 'Tisco', 'Tuti', 'Yanque'],
            'Condesuyos' => ['Chuquibamba', 'Andaray', 'Cayarani', 'Chichas', 'Iray', 'Río Grande', 'Salamanca', 'Yanaquihua'],
            'Islay' => ['Mollendo', 'Cocachacra', 'Dean Valdivia', 'Islay', 'Mejia', 'Punta de Bombón'],
            'La Unión' => ['Cotahuasi', 'Alca', 'Charcana', 'Huaynacotas', 'Pampamarca', 'Puyca', 'Quechualla', 'Sayla', 'Tauria', 'Tomepampa', 'Toro']
        ],
        'Ayacucho' => [
            'Huamanga' => ['Ayacucho', 'Acocro', 'Acos Vinchos', 'Carmen Alto', 'Chiara', 'Ocros', 'Pacaycasa', 'Quinua', 'San Jose de Ticllas', 'San Juan Bautista', 'Santiago de Pischa', 'Socos', 'Tambillo', 'Vinchos', 'Jesus Nazareno'],
            'Cangallo' => ['Cangallo', 'Chuschi', 'Los Morochucos', 'María Parado de Bellido', 'Paras', 'Totos'],
            'Huanca Sancos' => ['Sancos', 'Carapo', 'Sacsamarca', 'Santiago de Lucanamarca'],
            'Huanta' => ['Huanta', 'Ayahuanco', 'Huamanguilla', 'Iguain', 'Llochegua', 'Santillana', 'Sivia', 'Puchcas'],
            'La Mar' => ['San Miguel', 'Anco', 'Ayna', 'Chilcas', 'Chungui', 'Luis Carranza', 'Santa Rosa', 'Tambo'],
            'Lucanas' => ['Puquio', 'Aucara', 'Cabana', 'Carmen Salcedo', 'Chaviña', 'Chipao', 'Huac-Huas', 'Laramate', 'Leoncio Prado', 'Llauta', 'Lucanas', 'Ocaña', 'Otoca', 'Saisa', 'San Cristóbal', 'San Juan', 'San Pedro', 'San Pedro de Palco', 'Sancos', 'Santa Ana de Huaycahuacho', 'Santa Lucia'],
            'Parinacochas' => ['Coracora', 'Chumpi', 'Coronel Castañeda', 'Pacapausa', 'Pullo', 'Puyusca', 'San Francisco de Ravacayco', 'Upahuacho'],
            'Paucar del Sara Sara' => ['Pausa', 'Colta', 'Corculla', 'Lampa', 'Marcabamba', 'Oyolo', 'Pararca', 'San Javier de Alpabamba', 'San Jose de Ushua', 'Sara Sara'],
            'Sucre' => ['Querobamba', 'Belén', 'Chalcos', 'Chilcayoc', 'Huacaña', 'Morcolla', 'Paico', 'San Salvador de Quije', 'Santiago de Paucaray', 'Soras'],
            'Víctor Fajardo' => ['Huancapi', 'Alcamenca', 'Apongo', 'Asquipata', 'Canaria', 'Cayara', 'Colca', 'Huamanquiquia', 'Huancaraylla', 'Sarhua', 'Vilcanchos'],
            'Vilcas Huamán' => ['Vilcas Huamán', 'Accomarca', 'Carhuanca', 'Concepcion', 'Huambalpa', 'Independencia', 'Saurama', 'Vischongo']
        ],
        'Cajamarca' => [
            'Cajamarca' => ['Cajamarca', 'Asunción', 'Chetilla', 'Cospan', 'Encañada', 'Jesus', 'Llacanora', 'Magdalena', 'Matara', 'Namora', 'San Juan'],
            'Cajabamba' => ['Cajabamba', 'Cachachi', 'Condebamba', 'Sitacocha'],
            'Celendín' => ['Celendín', 'Chumuch', 'Cortegana', 'Huasmin', 'Jorge Chávez', 'Jose Gálvez', 'Miguel Iglesias', 'Oxamarca', 'Sorochuco', 'Sucre', 'Utco', 'La Libertad de Pallan'],
            'Chota' => ['Chota', 'Anguia', 'Chadin', 'Chalamarca', 'Chiguirip', 'Chimban', 'Choropampa', 'Cochabamba', 'Conchan', 'Huambos', 'Llama', 'Miracosta', 'Paccha', 'Pion', 'Querocoto', 'San Juan de Licupis', 'Tacabamba', 'Tocmoche', 'Chalamarca'],
            'Contumazá' => ['Contumazá', 'Chilete', 'Cupisnique', 'Guzmango', 'San Benito', 'Santa Cruz de Toledo', 'Tantarica', 'Yonan'],
            'Cutervo' => ['Cutervo', 'Callayuc', 'Choros', 'Cujillo', 'La Ramada', 'Pimpingos', 'Querocotillo', 'San Andrés de Cutervo', 'San Juan de Cutervo', 'San Luis de Lucma', 'Santa Cruz', 'Santo Domingo de la Capilla', 'Santo Tomas'],
            'Hualgayoc' => ['Bambamarca', 'Chugur', 'Hualgayoc'],
            'Jaén' => ['Jaén', 'Bellavista', 'Chontali', 'Colasay', 'Huabal', 'Las Pirias', 'Pomahuaca', 'Pucara', 'Sallique', 'San Felipe', 'San Jose del Alto', 'Santa Rosa'],
            'San Ignacio' => ['San Ignacio', 'Chirinos', 'Huarango', 'La Coipa', 'Namballe', 'San Jose de Lourdes', 'Tabaconas'],
            'San Marcos' => ['Pedro Gálvez', 'Chancay', 'Eduardo Villanueva', 'Gregorio Pita', 'Ichocan', 'Jose Manuel Quiroz', 'Jose Sabogal'],
            'San Miguel' => ['San Miguel', 'San Silvestre de Cochan', 'Calquis', 'Catilluc', 'El Prado', 'Llapa', 'Nanchoc', 'Niepos', 'San Gregorio', 'Tongod', 'Union Agua Blanca'],
            'Santa Cruz' => ['Santa Cruz', 'Andabamba', 'Catache', 'Chancaybaños', 'La Esperanza', 'Ninabamba', 'Pullan', 'Saucepampa', 'Sexi', 'Uticyacu', 'Yauyucan'],
            'San Pablo' => ['San Pablo', 'San Bernardino', 'San Luis', 'Tumbaden']
        ],
        'Callao' => [
            'Callao' => ['Callao', 'Bellavista', 'Carmen de la Legua Reynoso', 'La Perla', 'La Punta', 'Ventanilla', 'Mi Perú']
        ],
        'Cusco' => [
            'Cusco' => ['Cusco', 'Ccorca', 'Poroy', 'San Jerónimo', 'San Sebastián', 'Santiago', 'Saylla', 'Wanchaq'],
            'Acomayo' => ['Acomayo', 'Acopia', 'Acos', 'Mosoc Llacta', 'Pomacanchi', 'Rondocan', 'Sangarara'],
            'Anta' => ['Anta', 'Ancahuasi', 'Cachimayo', 'Chinchaypujio', 'Huarocondo', 'Limatambo', 'Mollepata', 'Pucyura', 'Zurite'],
            'Calca' => ['Calca', 'Coya', 'Lamay', 'Lares', 'Pisac', 'San Salvador', 'Taray', 'Yanatile'],
            'Canas' => ['Yanaoca', 'Checca', 'Kunturkanki', 'Langui', 'Layo', 'Pampamarca', 'Quehue', 'Tupac Amaru'],
            'Canchis' => ['Sicuani', 'Checacupe', 'Combapata', 'Marangani', 'Pitumarca', 'San Pablo', 'San Pedro', 'Tinta'],
            'Chumbivilcas' => ['Santo Tomas', 'Capacmarca', 'Colquemarca', 'Livitaca', 'Llusco', 'Quiñota', 'Velille'],
            'Espinar' => ['Yauri', 'Condoroma', 'Coporaque', 'Ocoruro', 'Pallpata', 'Pichigua', 'Suyckutambo', 'Alto Pichigua'],
            'La Convención' => ['Quillabamba', 'Echarate', 'Huayopata', 'Maranura', 'Ocobamba', 'Pichari', 'Quellouno', 'Santa Ana', 'Santa Teresa', 'Vilcabamba', 'Inkarawasi', 'Quimbiri'],
            'Paruro' => ['Paruro', 'Accha', 'Ccapi', 'Colcha', 'Huanoquite', 'Omacha', 'Paccaritambo', 'Pillpinto', 'Yaurisque'],
            'Paucartambo' => ['Paucartambo', 'Caicay', 'Challabamba', 'Colquepata', 'Huancarani', 'Kosñipata'],
            'Quispicanchi' => ['Urcos', 'Andahuaylillas', 'Camanti', 'Ccarhuayo', 'Ccatca', 'Cusipata', 'Huaro', 'Lucre', 'Marcapata', 'Ocongate', 'Oropesa', 'Quiquijana'],
            'Urubamba' => ['Urubamba', 'Chinchero', 'Huayllabamba', 'Machupicchu', 'Maras', 'Ollantaytambo', 'Yucay']
        ],
        'Huancavelica' => [
            'Huancavelica' => ['Huancavelica', 'Acobambilla', 'Acoria', 'Conayca', 'Cuenca', 'Huachocolpa', 'Huayllahuara', 'Izcuchaca', 'Laria', 'Manta', 'Mariscal Cáceres', 'Moya', 'Nuevo Occoro', 'Palca', 'Pilchaca', 'Vilca', 'Yauli', 'Ascensión'],
            'Acobamba' => ['Acobamba', 'Andabamba', 'Anta', 'Caja', 'Marcas', 'Paucará', 'Pomacocha', 'Rosario'],
            'Angaraes' => ['Lircay', 'Anchonga', 'Callanmarca', 'Congalla', 'Huanca-Huanca', 'Huayllay Grande', 'Julcamarca', 'San Antonio de Antaparco', 'Santo Tomas de Pata', 'Secclla'],
            'Castrovirreyna' => ['Castrovirreyna', 'Arma', 'Aurahua', 'Capillas', 'Chupamarca', 'Cocas', 'Huachos', 'Huamatambo', 'Mollepampa', 'San Juan', 'Santa Ana', 'Tantara', 'Ticrapo'],
            'Churcampa' => ['Churcampa', 'Anco', 'Chinchihuasi', 'El Carmen', 'La Merced', 'Locroja', 'Paucarbamba', 'San Miguel de Mayocc', 'San Pedro de Coris'],
            'Huaytará' => ['Huaytará', 'Ayavi', 'Córdova', 'Huayacundo Arma', 'Laramarca', 'Ocoyo', 'Pilpichaca', 'Querco', 'Quito-Arma', 'San Antonio de Cusicancha', 'San Francisco de Sangayaico', 'San Isidro', 'Santiago de Chocorvos', 'Santiago de Quirahuara', 'Santo Domingo de Capillas', 'Tambillo'],
            'Tayacaja' => ['Pampas', 'Acraquia', 'Ahuaycha', 'Colcabamba', 'Daniel Hernández', 'Huachocolpa', 'Huaribamba', 'Ñahuimpuquio', 'Pazos', 'Quishuar', 'Salcabamba', 'Salcahuasi', 'San Marcos de Rocchac', 'Surcubamba', 'Tintay Puncu']
        ],
        'Huánuco' => [
            'Huánuco' => ['Huánuco', 'Amarilis', 'Chinchao', 'Churubamba', 'Margos', 'Quisqui', 'San Francisco de Cayran', 'San Pedro de Chaulan', 'Santa María del Valle', 'Yarumayo', 'Pillco Marca'],
            'Ambo' => ['Ambo', 'Cayna', 'Colpas', 'Conchamarca', 'Huacar', 'San Francisco', 'San Rafael', 'Tomay Kichwa'],
            'Dos de Mayo' => ['La Unión', 'Chuquis', 'Marías', 'Pachas', 'Quivilla', 'Ripan', 'Shunqui', 'Sillapata', 'Yanas'],
            'Huacaybamba' => ['Huacaybamba', 'Canchabamba', 'Cochabamba', 'Pinra'],
            'Huamalíes' => ['Llata', 'Arancay', 'Chavin de Pariarca', 'Jacas Grande', 'Jiron', 'Monzon', 'Punchao', 'Puños', 'Singa', 'Tantamayo'],
            'Leoncio Prado' => ['Rupa-Rupa', 'Daniel Alomía Robles', 'Hermilio Valdizán', 'Jose Crespo y Castillo', 'Luyando', 'Mariano Dámaso Beraun'],
            'Marañón' => ['Huacrachuco', 'Cholon', 'San Buenaventura'],
            'Pachitea' => ['Panao', 'Chaglla', 'Molino', 'Umari'],
            'Puerto Inca' => ['Puerto Inca', 'Codo del Pozuzo', 'Honoria', 'Tournavista', 'Yuyapichis'],
            'Lauricocha' => ['Jesus', 'Baños', 'Jivia', 'Queropalca', 'San Miguel de Cauri', 'San Francisco de Asís', 'Rondos'],
            'Yarowilca' => ['Chavinillo', 'Cahuac', 'Chacabamba', 'Aparicio Pomares', 'Jacas Chico', 'Obas', 'Pampamarca', 'Choras']
        ],
        'Ica' => [
            'Ica' => ['Ica', 'La Tinguiña', 'Los Aquijes', 'Ocucaje', 'Pachacutec', 'Parcona', 'Pueblo Nuevo', 'Salas', 'San Jose de los Molinos', 'San Juan Bautista', 'Santiago', 'Subtanjalla', 'Tate', 'Yauca del Rosario'],
            'Chincha' => ['Chincha Alta', 'Alto Laran', 'Chavin', 'Chincha Baja', 'El Carmen', 'El Recreo', 'Grocio Prado', 'Pueblo Nuevo', 'Sunampe', 'Tambo de Mora'],
            'Nasca' => ['Nasca', 'Changuillo', 'El Ingenio', 'Marcona', 'Vista Alegre'],
            'Palpa' => ['Palpa', 'Llipata', 'Santa Cruz', 'Tibillo', 'Río Grande'],
            'Pisco' => ['Pisco', 'Huancano', 'Humay', 'Independencia', 'Paracas', 'San Andrés', 'San Clemente', 'Tupac Amaru Inca']
        ],
        'Junín' => [
            'Huancayo' => ['Huancayo', 'Carhuacallanga', 'Chacapampa', 'Chicche', 'Chilca', 'Chongos Alto', 'Chupuro', 'Colca', 'Cullhuas', 'El Tambo', 'Huacrapuquio', 'Hualhuas', 'Huancan', 'Huasicancha', 'Huayucachi', 'Ingenio', 'Pariahuanca', 'Pilcomayo', 'Pucara', 'Quichuay', 'Quilcas', 'San Agustín', 'San Jerónimo de Tunan', 'Saño', 'Sapallanga', 'Sicaya', 'Viques'],
            'Concepción' => ['Concepción', 'Aco', 'Andamarca', 'Chambo', 'Cochas', 'Comas', 'Heroínas Toledo', 'Manzanares', 'Mariscal Castilla', 'Matahuasi', 'Mito', 'Nueve de Julio', 'Orcotuna', 'San Jose de Quero', 'Santa Rosa de Ocopa'],
            'Chanchamayo' => ['Chanchamayo', 'San Ramón', 'Vitoc', 'San Luis de Shuaro', 'Pichanaqui', 'Perene'],
            'Jauja' => ['Jauja', 'Acolla', 'Apata', 'Ataura', 'Canchayllo', 'Curicaca', 'El Mantaro', 'Huamali', 'Huaripampa', 'Huertas', 'Janjaillo', 'Julcán', 'Leonor Ordóñez', 'Llocllapampa', 'Marco', 'Masma', 'Masma Chicche', 'Molinos', 'Monobamba', 'Muqui', 'Muquiyauyo', 'Paca', 'Paccha', 'Pancan', 'Parco', 'Pomacancha', 'Ricran', 'San Lorenzo', 'San Pedro de Chunan', 'Sausa', 'Tarma-Tambo', 'Tunán Marca', 'Yauli', 'Yauyos'],
            'Junín' => ['Junín', 'Carhuamayo', 'Ondores', 'Ulcumayo'],
            'Satipo' => ['Satipo', 'Coviriali', 'Llaylla', 'Mazamari', 'Pampa Hermosa', 'Pantoa', 'Río Negro', 'Río Tambo'],
            'Tarma' => ['Tarma', 'Acobamba', 'Huaracayo', 'Huasahuasi', 'La Unión', 'Palca', 'Palcamayo', 'San Pedro de Cajas', 'Tapo'],
            'Yauli' => ['La Oroya', 'Chacapalpa', 'Huay-Huay', 'Marcapomacocha', 'Morococha', 'Paccha', 'Santa Bárbara de Carhuacayan', 'Santa Rosa de Sacco', 'Suitucancha', 'Yauli'],
            'Chupaca' => ['Chupaca', 'Ahuac', 'Chongos Bajo', 'Huachac', 'Huamancaca Chico', 'San Juan de Iscos', 'San Juan de Jarpa', 'Tres de Diciembre', 'Yanacancha']
        ],
        'La Libertad' => [
            'Trujillo' => ['Trujillo', 'El Porvenir', 'Florencia de Mora', 'Huanchaco', 'La Esperanza', 'Laredo', 'Moche', 'Poroto', 'Salaverry', 'Simbal', 'Victor Larco Herrera'],
            'Ascope' => ['Ascope', 'Chicama', 'Chocope', 'Magdalena de Cao', 'Paijan', 'Rázuri', 'Santiago de Cao', 'Casa Grande'],
            'Bolívar' => ['Bolívar', 'Bambamarca', 'Condormarca', 'Longotea', 'Uchumarca', 'Ucuncha'],
            'Chepén' => ['Chepén', 'Pacanga', 'Pueblo Nuevo'],
            'Julcán' => ['Julcán', 'Calamarca', 'Huaso', 'Carabamba'],
            'Otuzco' => ['Otuzco', 'Agallpampa', 'Charat', 'Huaranchal', 'La Cuesta', 'Mache', 'Paranday', 'Salpo', 'Sinsicap', 'Usquil'],
            'Pacasmayo' => ['San Pedro de Lloc', 'Guadalupe', 'Jequetepeque', 'Pacasmayo', 'San Jose'],
            'Pataz' => ['Tayabamba', 'Buldibuyo', 'Chillia', 'Huancaspata', 'Huaylillas', 'Huayo', 'Ongon', 'Parcoy', 'Pataz', 'Pias', 'Santiago de Challas', 'Taurija', 'Vicentino'],
            'Sánchez Carrión' => ['Huamachuco', 'Chugay', 'Cochorco', 'Curgos', 'Marcabal', 'Sanagorán', 'Sarin', 'Sartimbamba'],
            'Santiago de Chuco' => ['Santiago de Chuco', 'Angasmarca', 'Cachicadan', 'Mollebamba', 'Mollepata', 'Quiruvilca', 'Santa Cruz de Chuca', 'Sitabamba'],
            'Gran Chimú' => ['Cascas', 'Lucma', 'Marmot', 'Sayapullo'],
            'Virú' => ['Virú', 'Chao', 'Guadalupito']
        ],
        'Lambayeque' => [
            'Chiclayo' => ['Chiclayo', 'Chongoyape', 'Eten', 'Eten Puerto', 'Jose Leonardo Ortiz', 'La Victoria', 'Lagunas', 'Monsefu', 'Nueva Arica', 'Oyotun', 'Picsi', 'Pimentel', 'Reque', 'Santa Rosa', 'Saña', 'Cayalti', 'Patapo', 'Pomalca', 'Pucala', 'Tumán'],
            'Ferreñafe' => ['Ferreñafe', 'Cañaris', 'Incahuasi', 'Manuel Antonio Mesones Muro', 'Pitipo', 'Pueblo Nuevo'],
            'Lambayeque' => ['Lambayeque', 'Chochope', 'Illimo', 'Jayanca', 'Mochumi', 'Morrope', 'Motupe', 'Olmos', 'Pacora', 'Salas', 'San Jose', 'Tucume']
        ],
        'Lima' => [
            'Lima' => ['Lima', 'Ancón', 'Ate', 'Barranco', 'Breña', 'Carabayllo', 'Chaclacayo', 'Chorrillos', 'Cieneguilla', 'Comas', 'El Agustino', 'Independencia', 'Jesús María', 'La Molina', 'La Victoria', 'Lince', 'Los Olivos', 'Lurigancho', 'Lurín', 'Magdalena del Mar', 'Miraflores', 'Pachacámac', 'Pucusana', 'Pueblo Libre', 'Puente Piedra', 'Punta Hermosa', 'Punta Negra', 'Rímac', 'San Bartolo', 'San Borja', 'San Isidro', 'San Juan de Lurigancho', 'San Juan de Miraflores', 'San Luis', 'San Martín de Porres', 'San Miguel', 'Santa Anita', 'Santa María del Mar', 'Santa Rosa', 'Santiago de Surco', 'Surquillo', 'Villa El Salvador', 'Villa María del Triunfo'],
            'Barranca' => ['Barranca', 'Paramonga', 'Pativilca', 'Supe', 'Supe Puerto'],
            'Cajatambo' => ['Cajatambo', 'Copa', 'Gorgor', 'Huancapon', 'Manas'],
            'Canta' => ['Canta', 'Enos', 'Huamantanga', 'Huaros', 'Lachaqui', 'San Buenaventura', 'Santa Rosa de Quives'],
            'Cañete' => ['San Vicente de Cañete', 'Asia', 'Calango', 'Cerro Azul', 'Coayllo', 'Imperial', 'Lunahuana', 'Mala', 'Nuevo Imperial', 'Pacaran', 'Quilmana', 'San Antonio', 'San Luis', 'Santa Cruz de Flores', 'Zúñiga'],
            'Huaral' => ['Huaral', 'Atavillos Alto', 'Atavillos Bajo', '27 de Noviembre', 'Ihuari', 'Lampian', 'Pacaraos', 'San Miguel de Acos', 'Santa Cruz de Andamarca', 'Sumbilca', ' Chancay', 'Aucallama'],
            'Huarochirí' => ['Matucana', 'Antioquia', 'Callahuanca', 'Carampoma', 'Chicla', 'Cuenca', 'Huachupampa', 'Huanza', 'Huarochirí', 'Lahuaytambo', 'Langa', 'Laraos', 'Mariatana', 'Ricardo Palma', 'San Andrés de Tugua', 'San Antonio', 'San Bartolomé', 'San Damian', 'San Juan de Iris', 'San Juan de Tantaranche', 'San Lorenzo de Quinti', 'San Mateo', 'San Mateo de Otao', 'San Pedro de Casta', 'San Pedro de Huancayre', 'Sangallaya', 'Santa Cruz de Cocachacra', 'Santa Eulalia', 'Santiago de Anchucaya', 'Santiago de Tuna', 'Santo Domingo de los Olleros', 'Surco'],
            'Huaura' => ['Huacho', 'Ambar', 'Caleta de Carquin', 'Checras', 'Hualmay', 'Huaura', 'Leoncio Prado', 'Paccho', 'Santa Leonor', 'Santa María', 'Sayán', 'Vegueta'],
            'Oyón' => ['Oyón', 'Andajes', 'Caujul', 'Cochamarca', 'Navan', 'Pachangara'],
            'Yauyos' => ['Yauyos', 'Alis', 'Ayauca', 'Ayaviri', 'Azángaro', 'Cacra', 'Carania', 'Catahuasi', 'Chocos', 'Cochas', 'Colonia', 'Hongos', 'Huampara', 'Huancaya', 'Huangascar', 'Huantan', 'Huañec', 'Laraos', 'Lincha', 'Madean', 'Miraflores', 'Omas', 'Putinja', 'Quinches', 'Quinocay', 'San Joaquín', 'San Pedro de Pilas', 'Tanta', 'Tauripampa', 'Tomas', 'Tupe', 'Viñac', 'Vitis']
        ],
        'Loreto' => [
            'Maynas' => ['Iquitos', 'Alto Nanay', 'Fernando Lores', 'Indiana', 'Las Amazonas', 'Mazan', 'Napo', 'Punchana', 'Torres Causana', 'Belén', 'San Juan Bautista'],
            'Alto Amazonas' => ['Yurimaguas', 'Balsapuerto', 'Jeberos', 'Lagunas', 'Santa Cruz', 'Teniente Cesar López Rojas'],
            'Loreto' => ['Nauta', 'Parinari', 'Tigre', 'Trompeteros', 'Urarinas'],
            'Mariscal Ramón Castilla' => ['Ramón Castilla', 'Pebas', 'Yavari', 'San Pablo'],
            'Requena' => ['Requena', 'Alto Tapiche', 'Capelo', 'Emilio San Martín', 'Maquia', 'Puinahua', 'Saquena', 'Soplin', 'Tapiche', 'Jenaro Herrera', 'Yaquerana'],
            'Ucayali' => ['Contamana', 'Inahuaya', 'Padre Márquez', 'Pampa Hermosa', 'Sarayacu', 'Vargas Guerra'],
            'Datem del Marañón' => ['Barranca', 'Cahuapanas', 'Manseriche', 'Morona', 'Pastaza', 'Andoas'],
            'Putumayo' => ['Putumayo', 'Rosa Panduro', 'Teniente Manuel Clavero', 'Yaguas']
        ],
        'Madre de Dios' => [
            'Tambopata' => ['Puerto Maldonado', 'Inambari', 'Las Piedras', 'Laberinto'],
            'Manu' => ['Manu', 'Fitzcarrald', 'Madre de Dios', 'Huepetuhe'],
            'Tahuamanu' => ['Iñapari', 'Iberia', 'Tahuamanu']
        ],
        'Moquegua' => [
            'Mariscal Nieto' => ['Moquegua', 'Carumas', 'Cuchumbaya', 'Samegua', 'San Cristóbal', 'Torata'],
            'General Sánchez Cerro' => ['Omate', 'Chojata', 'Coalaque', 'Ichuña', 'La Capilla', 'Lloque', 'Matalaque', 'Puquina', 'Quinistaquillas', 'Ubinas', 'Yunga'],
            'Ilo' => ['Ilo', 'El Algarrobal', 'Pacocha']
        ],
        'Pasco' => [
            'Pasco' => ['Chaupimarca', 'Huachon', 'Huariaca', 'Huayllay', 'Ninacaca', 'Pallanchacra', 'Paucartambo', 'San Francisco de Asís de Yarusyacan', 'Simon Bolívar', 'Ticlacayan', 'Tinyahuarco', 'Vicco', 'Yanacancha'],
            'Daniel Alcides Carrión' => ['Yanahuanca', 'Chacayan', 'Goyllarisquizga', 'Paucar', 'San Pedro de Pillao', 'Santa Ana de Tusi', 'Tapuc', 'Vilcabamba'],
            'Oxapampa' => ['Oxapampa', 'Chontabamba', 'Huancabamba', 'Palcazu', 'Pozuzo', 'Puerto Bermúdez', 'Villa Rica', 'Constitución']
        ],
        'Piura' => [
            'Piura' => ['Piura', 'Castilla', 'Catacaos', 'Cura Mori', 'El Tallán', 'La Arena', 'La Unión', 'Las Lomas', 'Tambo Grande', '26 de Octubre'],
            'Ayabaca' => ['Ayabaca', 'Frias', 'Jilili', 'Lagunas', 'Montero', 'Pacaipampa', 'Paimas', 'Sapillica', 'Sicchez', 'Suyo'],
            'Huancabamba' => ['Huancabamba', 'Canchaque', 'El Faique', 'Huarmaca', 'Lalaquiz', 'San Miguel de El Faique', 'Sondor', 'Sondorillo'],
            'Morropón' => ['Chulucanas', 'Buenos Aires', 'Chalaco', 'La Matanza', 'Morropón', 'Salitral', 'San Juan de Bigote', 'Santa Catalina de Mossa', 'Santo Domingo', 'Yamango'],
            'Paita' => ['Paita', 'Amotape', 'Arenal', 'Colan', 'La Huaca', 'Tamarindo', 'Vichayal'],
            'Sullana' => ['Sullana', 'Bellavista', 'Ignacio Escudero', 'Lancones', 'Marcavelica', 'Miguel Checa', 'Querecotillo', 'Salitral'],
            'Talara' => ['Pariñas', 'El Alto', 'La Brea', 'Lobitos', 'Los Órganos', 'Mancora'],
            'Sechura' => ['Sechura', 'Bellavista de la Unión', 'Bernal', 'Cristo Nos Valga', 'Vice', 'Rinconada Llicuar']
        ],
        'Puno' => [
            'Puno' => ['Puno', 'Acora', 'Atuncolla', 'Capachica', 'Chucuito', 'Coata', 'Huata', 'Mañazo', 'Paucarcolla', 'Pichacani', 'Plateria', 'San Antonio', 'Tiquillaca', 'Vilque'],
            'Azángaro' => ['Azángaro', 'Achaya', 'Arapa', 'Asillo', 'Caminaca', 'Chupa', 'Jose Domingo Choquehuanca', 'Muñani', 'Potoni', 'Saman', 'San Anton', 'San Jose', 'San Juan de Salinas', 'Santiago de Pupuja', 'Tirapata'],
            'Carabaya' => ['Macusani', 'Ajoyani', 'Ayapata', 'Coasa', 'Corani', 'Crucero', 'Ituata', 'Ollachea', 'San Gaban', 'Usicayos'],
            'Chucuito' => ['Juli', 'Desaguadero', 'Huacullani', 'Kelluyo', 'Pisacoma', 'Pomata', 'Zepita'],
            'El Collao' => ['Ilave', 'Capazo', 'Conduriri', 'Santa Rosa', 'Pilcuyo'],
            'Huancané' => ['Huancané', 'Cojata', 'Huatasani', 'Pusi', 'Rosaspata', 'Taraco', 'Vilque Chico', 'Inchupalla'],
            'Lampa' => ['Lampa', 'Cabanilla', 'Calapuja', 'Nicasio', 'Ocuviri', 'Palca', 'Paratia', 'Pucara', 'Santa Lucia', 'Vilavila'],
            'Melgar' => ['Ayaviri', 'Antauta', 'Cupi', 'Llalli', 'Macari', 'Nuñoa', 'Orurillo', 'Santa Rosa', 'Umachiri'],
            'Moho' => ['Moho', 'Conima', 'Tilali', 'Huayrapata'],
            'San Antonio de Putina' => ['Putina', 'Ananea', 'Pedro Vilca Apaza', 'Quilcapuncu', 'Sina'],
            'San Román' => ['Juliaca', 'Cabana', 'Cabanillas', 'Caracoto'],
            'Sandia' => ['Sandia', 'Cuyocuyo', 'Limbani', 'Patambuco', 'Phara', 'Quiaca', 'San Juan del Oro', 'Yanahuaya', 'Alto Inambari', 'San Pedro de Putina Punco'],
            'Yunguyo' => ['Yunguyo', 'Anapia', 'Copani', 'Cuturapi', 'Ollaraya', 'Tinicachi', 'Unicachi']
        ],
        'San Martín' => [
            'Moyobamba' => ['Moyobamba', 'Calzada', 'Habana', 'Jepelacio', 'Soritor', 'Yantalo'],
            'Bellavista' => ['Bellavista', 'Alto Biavo', 'Bajo Biavo', 'Huallaga', 'Mazamari', 'San Pablo', 'San Rafael'],
            'El Dorado' => ['San Jose de Sisa', 'Agua Blanca', 'San Martín', 'Santa Rosa', 'Shatuja'],
            'Huallaga' => ['Saposoa', 'Alto Saposoa', 'Eslabón', 'Piscoyacu', 'Sacanche', 'Tingo de Saposoa'],
            'Lamas' => ['Lamas', 'Alonso de Alvarado', 'Barranquita', 'Caynarachi', 'Cuñumbuqui', 'Pinto Recodo', 'Rumisapa', 'San Roque de Cumbaza', 'Shanao', 'Tabalosos', 'Zapatero'],
            'Mariscal Cáceres' => ['Juanjuí', 'Campanilla', 'Huicungo', 'Pachiza', 'Pajarillo'],
            'Picota' => ['Picota', 'Buenos Aires', 'Caspisapa', 'Pilluana', 'Pucacaca', 'San Cristóbal', 'San Hilarión', 'Shamboyacu', 'Tingo de Ponasa'],
            'Rioja' => ['Rioja', 'Awajun', 'Elias Soplin Vargas', 'Nueva Cajamarca', 'Pardo Miguel', 'Posic', 'San Fernando', 'Yorongos', 'Yuracyacu'],
            'San Martín' => ['Tarapoto', 'Alberto Leveau', 'Cacatachi', 'Chazuta', 'Chipurana', 'El Porvenir', 'Huimbayoc', 'Juan Guerra', 'Morales', 'Papaplaya', 'San Antonio', 'Sauce', 'Shapaja', 'La Banda de Shilcayo'],
            'Tocache' => ['Tocache', 'Nuevo Progreso', 'Pólvora', 'Shunte', 'Uchiza']
        ],
        'Tacna' => [
            'Tacna' => ['Tacna', 'Alto de la Alianza', 'Calana', 'Ciudad Nueva', 'Inclán', 'Pachia', 'Palca', 'Pocollay', 'Sama', 'Coronel Gregorio Albarracín Lanchipa'],
            'Candarave' => ['Candarave', 'Cairani', 'Camilaca', 'Curibaya', 'Huanuara', 'Quilahuani'],
            'Jorge Basadre' => ['Locumba', 'Ilabaya', 'Ite'],
            'Tarata' => ['Tarata', 'Chucatamani', 'Estique', 'Estique-Pampa', 'Sitajara', 'Susapaya', 'Tarucachi', 'Ticaco']
        ],
        'Tumbes' => [
            'Tumbes' => ['Tumbes', 'Corrales', 'La Cruz', 'Pampas de Hospital', 'San Jacinto', 'San Juan de la Virgen'],
            'Contralmirante Villar' => ['Zorritos', 'Casitas', 'Canoas de Punta Sal'],
            'Zarumilla' => ['Zarumilla', 'Aguas Verdes', 'Matapalo', 'Papayal']
        ],
        'Ucayali' => [
            'Coronel Portillo' => ['Pucallpa', 'Campoverde', 'Iparia', 'Masisea', 'Yarinacocha', 'Nueva Requena', 'Manantay'],
            'Atalaya' => ['Raymondi', 'Sepahua', 'Tahuania', 'Yurua'],
            'Padre Abad' => ['Aguaytía', 'Irazola', 'Curimana', 'Neshuya', 'Alexander Von Humboldt'],
            'Purús' => ['Purús']
        ]
    ];
}
