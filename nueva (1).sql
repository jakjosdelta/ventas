-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2015 a las 00:29:28
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `nueva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
`id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `nombre2` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `nombre2`, `descripcion`) VALUES
(1, 'Edredones y Sabanas', 'Iluminación', 'hogar'),
(2, 'Aspiradoras y Abrillantadoras', 'Material Eléctrico', 'hogar'),
(3, 'Máquinas de Coser', 'Baño', 'hogar'),
(4, 'Planchas', 'Plomería', 'hogar'),
(5, 'Aire Acondicionado', 'Herramientas Eléctricas', 'hogar'),
(6, 'Procesadores de Alimentos', 'Cristalería', 'cocina'),
(7, 'Cafeteras y Teteras', 'Cubiertos', 'cocina'),
(8, 'Extractores de Jugos', 'Refractarios', 'cocina'),
(9, 'Licuadoras', 'Vajillas', 'cocina'),
(10, 'Batidoras', 'Utensilios de Cocina', 'cocina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `nombre_cat` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `marca`, `descripcion`, `descuento`, `precio`, `imagen`, `nombre_cat`) VALUES
(1, 'EDREDÓN DE PLUMÓN PIEL DE DURAZNO ', 'MODERTEX', 'Suave Plumón Tacto Piel de Durazno, relleno de microfibra tipo 6D para un suave tacto parecido a la pluma.', '0.00', '65.00', 'img/edredon.jpg', 'Edredones y Sabanas'),
(2, 'COBIJA ESQUIMAL', 'MODERTEX', 'Suave Cobija de microfibra', '0.00', '33.98', 'img/cobija.jpg', 'Edredones y Sabanas'),
(3, 'HIDROLAVADORA', 'ELECTROLUX EWS11', 'Hidrolavadora de alta presión, doméstica, útil y versátil para la limpieza de su hogar, fachadas, jardín, vehículo, lugar de trabajo, entre otros. \r\nUsted ahorrará tiempo, agua y energía eléctrica a través de un cómodo dispositivo que permite regular la cantidad de agua que desee utilizar. \r\n\r\n- 1800 watts de potencia\r\n- Presión máxima 2200 PSI\r\n- Caudal de 300 litros/hora\r\n- Botón encendido/apagado\r\n- Función Stop Total, le ofrece la facilidad de accionar o parar el funcionamiento de la hidrolavadora\r\n\r\nIncluye: \r\n- Manguera de alta presión de 5 metros\r\n- Pistola de agua\r\n- Dosificador de detergente o shampoo\r\n- Cepillo giratorio para lavar el auto\r\n- Manual en español.', '0.00', '201.00', 'img/aspiradora.jpg', 'Aspiradoras y Abrillantadoras'),
(4, 'ASPIRADORA H2O', 'VAC TURBO', 'Aspiradora H2O Vac Turbo\r\n\r\nEl primer avance significativo en tecnología para aspiradoras de los últimos 50 años, la H2O Vac Turbo reúne todas estas prestaciones en una sola aspiradora húmeda, aspiradora en seco, purificador de aire y aspiradora con filtro de agua, nunca se bloquea y mantiene siempre su máximo poder de succión\r\ncon su diseño especial todo en uno la H2O Vac Turbo es la única aspiradora doméstica que utiliza tecnología hidro poderosa de filtrado con agua, solo agregue un poco de agua y alcanza para limpiar toda su casa\r\nA diferencia de otras aspiradoras la H2O Vac Turbo succiona la suciedad y el polvo dentro de una Cámara especial de agua atrapándolos en el líquido e impidiendo que las partículas de polvo reduzcan el poder de succión\r\nLa H2O Vac Turbo atrapa el 99.97% de la suciedad, polvo, ácaros, moho, virus, polen y bacterias que de otro modo se dispersarían en el aire que usted y los suyos respiran en su hogar\r\nAdicionalmente coloque la manguera en el puerto de escape y obtendrá un poderoso soplador, ideal para limpiar hojas secas en el jardín o para inflar botes, piscinas inflables, etc\r\nincluye:\r\nCepillo ajustable para esquinas\r\nCepillo de cerdas\r\nBoquilla de succión\r\nSet de 3 boquillas adaptables para inflar\r\nCepillo de doble uso\r\nManguera flexible\r\nTubo telescópico.\r\nPeso del Producto empacado: 10kg', '0.00', '295.00', 'img/aspiradora2.jpg', 'Aspiradoras y Abrillantadoras'),
(5, 'EDREDÓN DE MICROFIBRA BEIGE CUADROS NEGROS', 'MODERTEX', 'Edredón de Microfibra Modertex Beige Cuadros Negros\r\n\r\n- Material: 100% Poliester \r\n- Cuadros negros, reverso color beige   \r\n- Medidas disponibles:  1 1/2, 2, 2 1/2 y 3 Plazas.', '0.00', '51.70', 'img/edredon2.jpg', 'Edredones y Sabanas'),
(6, 'EDREDÓN DE MICROFIBRA BEIGE PUNTOS BLANCOS', 'MODERTEX', 'Edredón de Microfibra Modertex Beige Puntos Blancos\r\n- Material: 100% POLIESTER\r\n- Color Beige con  puntos blancos \r\n- Medidas disponibles : 1 1/2, 2 , 2 1/2 y 3  Plazas', '0.00', '40.29', 'img/edredon3.jpg', 'Edredones y Sabanas'),
(7, 'EDREDÓN GARDENIA PURPURA CORAL SOFT', 'Deskansa', 'Edredón Gardenia Purpura Coral Soft\r\n\r\n- Elaborado en Bramante 144 hilos\r\n- Plumón estándar 2.5\r\n\r\nMedidas Disponibles:\r\n- Twin 1 1/2 Plazas\r\n- Full 2 Plazas\r\n- Queen 2 1/2 Plazas\r\n- King 3 Plazas.', '0.00', '50.40', 'img/edredon4.jpg', 'Edredones y Sabanas'),
(8, 'LUSTRASPIRADORA E100', 'ELECTROLUX', 'Lustraspiradora Electrolux E100\r\n\r\n- Aspira el polvillo que se genera al abrillantar\r\n- Funda de tela recolectora de polvillo del pulido\r\n- Accesorio anti marcas\r\n- 600 watts de potencia\r\n- Cable 5 metros de largo\r\n- Color: Rojo\r\n\r\nIncluye:\r\n- Dos juegos de cepillos: para abrillantar y para pulir\r\n- Manual en español, ingles, y portugués.', '0.00', '139.90', 'img/Lustraspiradora.jpg', 'Aspiradoras y Abrillantadoras'),
(9, 'ASPIRADORA DIRT BULLET', 'TVentas', 'Aspiradora Dirt Bullet\r\n\r\nDoble función:\r\nAspirado / soplado 750 watts de potencia\r\nNo requiere bolsa de papel\r\nExtremadamente portátil y potente\r\nMúltiples aplicaciones de aspirado: Alfombras, tapicerías, cojines, cortinas y todo tipo de suelos\r\nMúltiplés.', '0.00', '99.00', 'img/aspiradora3.jpg', 'Aspiradoras y Abrillantadoras'),
(10, 'ASPIRADORA LAVADORA BISSELL COMPLETE', 'BISSELL', 'Aspiradora Lavadora Bissell Complete\r\n\r\n¿Recuerda usted a la lavadora de alfombras Big Green Clean Machine? Nada limpiaba tan profundamente gracias a su sistema exclusivo de lavado de alfombras\r\nAhora el nuevo modelo Big Green Complete, es una aspiradora con filtro de agua, lavadora de alfombras y un sistema de limpieza de pisos\r\nLimpie toda su casa con esta versátil aspiradora, ya que posee un sistema de filtrado de 3 etapas, un calentador incorporado para limpiar tapizados, alfombras y una herramienta que le permite limpiar superficies de baldosas, vinilo, laminados y madera dura sellada\r\nLas 3 etapas de filtrado significa que usted obtendrá una excelente calidad de filtración mientras aspira, la primera etapa capta grandes partículas de suciedad como cabello, migas, etc., luego las partículas más pequeñas son capturadas por el segundo filtro asegurando que Big Green Complete capte toda la suciedad y el polvo en la aspiradora y por último el filtro HEPA limpia y filtra el aire antes de abandonar la aspiradora\r\nBig Green Clean Complete incluye una solución limpiadora para pisos duros y otra solución para alfombras y tapizados, además es la única que calienta internamente a 25º C la mezcla de agua y solución limpiadora para eliminar las manchas más difíciles de sus pisos\r\nSimplemente agregue agua y solución al tanque, encienda los motores de succión, vierta la solución precalentada en la alfombra, luego aspire la solución con la suciedad diluida y usted tendrá la alfombra más limpia renovada y brillante que siempre había deseado\r\nSolo Big Green Complete saca la mugre aún luego de aspirar 10 veces sus pisos\r\n\r\nIncluye:\r\n- Cepillo Turbo Brush para pisos\r\n- Cepillo para múltiples superficies\r\n- Cepillo de 5 pulgadas\r\n- Boquilla para rincones\r\nCepillo para polvillo\r\n- Accesorio para limpiar alfombras a fondo\r\n- Accesorio para tapizados de 4 pulgadas\r\n- Accesorio para suelos duros\r\n- Accesorio para desagües\r\n- Tubo de extensión\r\n- Manguera flexible\r\n- 2 paños de microfibra lavables que sirven para limpiar y secar rápidamente pisos de madera, baldosas, vinilo, laminados, etc.\r\n- Bolsa para accesorios\r\n- 1 frasco de solución Hard Floor de 236 ml para pisos duros\r\n- 1 frasco de solución Fiber Cleansing de 473 ml para alfombra y tapizados.', '0.00', '569.00', 'img/aspiradora4.jpg', 'Aspiradoras y Abrillantadoras'),
(11, 'MÁQUINA DE COSER BROTHER LS2125i', 'BROTHER', 'Máquina de Coser Brother LS25I\r\n\r\nMáquina de brazo libre: puede realizar costuras circulares como mangas, canales de pantalón, entre otros\r\nSistema de ojales automático en cuatro tiempos, costura recta, zigzag y dos costuras decorativas\r\n25 funciones de puntada + 10 puntadas integradas\r\nSistema automático de bobinado\r\nCaja de accesorios móvil incorporada en el chasis de la máquina\r\nFuncionamiento sencillo, solo utiliza un mando para realizar las costuras que ya están predeterminadas\r\nLuz incorporada para realizar más cómodamente la costura\r\nDoble altura de prensa telas para trabajar tejidos más gruesos\r\nAsa para el transporte de la máquina en el propio chasis\r\nManual en español e inglés\r\nAccesorios incluidos:\r\nPrensa telas para ojales\r\nPie de cremalleras\r\nPie para botones \r\nDestornillador 3 bobinas\r\nPaquete de agujas Aguja gemela\r\nPorta carrete extra\r\nPlaza de zurcir.', '0.00', '216.00', 'img/mcoser2.jpg', 'Máquinas de Coser'),
(12, 'MÁQUINA DE COSER SINGER S2250', 'SINGER', 'Máquina de Coser Singer S2250\r\n\r\n- Máquina de costura recta y zig-zag\r\n- Usted podrá coser rápida y fácilmente\r\n- Portátil no necesita mueble\r\n- Motor silencioso de 5600 rpm\r\n- Sistema de costura con brazo libre para mangas y puños\r\n- Escoja desde puntadas básicas hasta decorativas con 10 puntadas incluidas\r\n- Ojalador automático para realizar ojales en una simple operación\r\n- Bordado con bastidor\r\n- Ajuste variable de ancho de puntada de acuerdo a su necesidad\r\n- Cuando la bobina está llena, para automáticamente\r\n- Luz incorporada\r\n\r\nAccesorios:\r\n- Pedal\r\n- Prensa telas para cremalleras\r\n- Prensa telas para coser ojales\r\n- Prensa telas para coser botones\r\n- Placa cubre impelentes\r\n- Bobinas y agujas\r\n- Manual en español, inglés, francés.', '0.00', '219.00', 'img/mcoser.jpg', 'Máquinas de Coser'),
(13, 'MÁQUINA DE COSER SEW WHIZ', 'TVentas', 'Máquina de Coser Sew Whiz \r\nCompacta y potente que se puede utilizar para coser cualquier tipo de tejido, por lo que ofrece la funcionalidad de una máquina de coser profesional en un formato mini e increíblemente ligero.\r\nAdemás, esta máquina de coser es tan fácil de usar que ni siquiera se necesitan conocimientos de costura para manejarla y, gracias a sus dos velocidades y al pedal eléctrico, garantiza unos resultados profesionales y duraderos.\r\nEs tan fácil de usar y tan ligera que usted podrá coser cortinas con la rapidez con la que cose las bastas de unos pantalones.\r\nAdemás, gracias a que Sew Whiz funciona tanto con pilas como conectada a un enchufe, podrá utilizar Sew Whiz donde quiera, por lo que es perfectamente manejable.\r\n\r\nIncluye:\r\n-1 pedal\r\n-1 mecanismo de enhebrado\r\n-1 aguja\r\n-Adaptador eléctrico', '0.00', '69.00', 'img/mcoser3.jpg', 'Máquinas de Coser'),
(14, 'MÁQUINA DE COSER SINGER S1409', 'SINGER', 'Máquina de Coser Singer S1409\r\n\r\n- Costura recta y zigzag\r\n- Marco de metal\r\n- Fácil selección de puntada\r\n- Portátil, no necesita mueble\r\n- Motor silencioso\r\n- Escoja desde puntadas básicas hasta decorativas con 8 puntadas incluidas\r\n- Ojalador automático para realizar ojales en una simple operación de 4 pasos\r\n- Ajuste variable de ancho de puntada de acuerdo a su necesidad\r\n- Luz incorporada\r\n- Manual en español\r\n\r\nAccesorios: \r\n- Pedal \r\n- 4 prensatelas a presión \r\n- Abridor de ojales \r\n- Bobinas y agujas.', '0.00', '189.90', 'img/mcoser4.jpg', 'Máquinas de Coser'),
(15, 'MÁQUINA DE COSER SINGER S3221', 'SINGER', 'Máquina de Coser Singer S3221\r\n\r\n- 21 puntadas\r\n- Costura recta y zigzag\r\n- Marco de metal\r\n- Fácil selección de puntada\r\n- Portátil, no necesita mueble\r\n- Motor silencioso\r\n- Escoja desde puntadas básicas hasta decorativas con 6 puntadas básicas incluidas\r\n- Ojalador automático para realizar ojales en una simple operación de 4 pasos\r\n- Ajuste variable de ancho de puntada de acuerdo a su necesidad\r\n- Luz incorporada - Enhebrador automático\r\n- Manual en español\r\n\r\nAccesorios:\r\n- Pedal\r\n- Prensatelas a presión\r\n- Abridor de ojales\r\n- Bobinas y agujas.', '0.00', '249.00', 'img/mcoser5.jpg', 'Máquinas de Coser'),
(16, 'PLANCHA SUNBEAM GCSBBV4410', 'SUNBEAM', 'Plancha Sunbeam GCSBBV4410\r\n\r\nPlancha al seco o vapor\r\nBase antiadherente\r\nMango suave al tacto para mayor comodidad\r\nNiveles de vapor y temperatura variables para diferentes tipos de telas\r\nRociador fino de agua que humedece las telas para pliegues y arrugas\r\nVentana visora del tanque de agua\r\nSuperficie acanalada que permite planchar bajo los botones\r\nLuz indicadora de encendido\r\nCordón giratorio de 360º para evitar enredos\r\nManual en español e inglés\r\nincluye:\r\nVaso medidor de agua.', '0.00', '19.00', 'img/plancha.jpg', 'Planchas'),
(17, 'PLANCHA ELECTROLUX SIE10', 'ELECTROLUX', 'Plancha Electrolux SIE10\r\n\r\nPlancha al seco o al vapor\r\n1250 watts de potencia\r\nSuela curveada para un planchado libre de arrugas\r\nBase antiadherente que permite a la plancha deslizarse suavemente sobre la tela\r\nVapor ajustable de tres niveles\r\nRociador de agua que humedece la ropa con una suave brisa para arrugas difíciles\r\nSuperficie acanalada que permite planchar bajo los botones\r\nVentana de agua extra grande\r\nLuz indicadora de encendido\r\nFunción de autolimpieza\r\nGuía de temperatura dependiendo de la tela\r\nManual en español.', '0.00', '29.99', 'img/plancha2.jpg', 'Planchas'),
(18, 'PLANCHA OSTER GCSTBV4112', 'OSTER', 'Plancha Oster GCSTBV4112\r\n\r\nPlancha en seco\r\nBase antiadherente\r\nMango suave al tacto para mayor comodidad\r\ncontrol variable de temperatura para diferentes tipos de tela\r\nSuperficie acanalada que permite planchar bajo los botones\r\nLuz indicadora de encendido\r\nCordón giratorio de 180º para evitar enredos\r\nManual en español e inglés.', '0.00', '22.90', 'img/plancha3.jpg', 'Planchas'),
(19, 'PLANCHA PANASONIC W450', 'PANASONIC', 'Plancha Panasonic W450\r\n\r\nPlancha al seco o al vapor\r\nTecnología 360º Quick, suela curveada para un planchado multidireccional\r\n1500 watts de potencia\r\nHasta un 25% de planchado más rápido comparado con otro tipo de planchas\r\nBase antiadherente de titanio que permite a la plancha deslizarse suavemente sobre la tela\r\nVapor ajustable de tres niveles: poco vapor, medio vapor y mucho vapor\r\nRociador de agua que humedece la ropa con una suave brisa para arrugas difíciles\r\nSuperficie acanalada que permite planchar bajo los botones\r\nVentana de agua extra grande\r\nFunción de vapor vertical\r\nLuz indicadora de encendido\r\nGuía de temperatura dependiendo de la tela parte superior\r\nApagado automático cuando la plancha esta sin movimiento 1 minuto en posición de costado, boca abajo o 10 minutos en posición vertical\r\nCable giratorio para evitar enredos\r\nManual en español e inglés.', '0.00', '73.00', 'img/plancha4.jpg', 'Planchas'),
(20, 'PLANCHA OSTER GCSTBS5804', 'OSTER', 'Plancha Oster GCSTBS5804\r\n\r\nPlancha al seco o vapor\r\nBase antiadherente\r\nMango suave al tacto para mayor comodidad\r\nNiveles de vapor y temperatura variables para diferentes tipos de telas\r\nRociador fino de agua que humedece las telas para pliegues y arrugas\r\nIndicador de temperatura que cambia de rojo a negro mostrando cuando está lista para un almacenamiento seguro\r\nVentana visora del tanque de agua\r\nSistema anticalcáreo\r\nSuperficie acanalada que permite planchar bajo los botones\r\nLuz indicadora de encendido\r\nCordón giratorio de 360º para evitar enredos\r\nManual en español, inglés y francés.', '0.00', '32.50', 'img/plancha5.jpg', 'Planchas'),
(21, 'VENTILADOR DE MESA SATZUMA USB', 'SATZUMA', 'Ventilador de Mesa Satzuma USB\r\n\r\n- Ventilador compacto para mesa\r\n- Funciona conectándolo directamente a un puerto USB\r\n- Interruptor de encendido y apagado\r\n- Puede colocarlo en diferentes posiciones\r\n- Color negro\r\n\r\nIncluye:\r\n- Manual en inglés.', '0.00', '14.10', 'img/ventilador.jpg', 'Aire Acondicionado'),
(22, 'CALEFACTOR CONTINENTAL CE49310', 'CONTINENTAL', 'CALEFACTOR CONTINENTAL CE49310\r\nLa mejor opción para calentar habitaciones y espacios pequeños - No requiere un sistema de ventilación y puede colocarse en cualquier lugar de su hogar u oficina - 1500 watts de potencia - 2 niveles de temperatura - Protección de sobrecalentamiento - Botón de encendido con luz indicadora - Funcionamiento silencioso - Bajo consumo de energía - Montaje seguro de pared y fijadores incluidos - Asas para transporte Incluye: - Manual en español e inglés "', '0.00', '41.31', 'img/calefactor.jpg', 'Aire Acondicionado'),
(23, 'PICATODO OSTER 3320', 'OSTER', 'Picatodo Oster 3320\r\n\r\nCorte, pique y mezcle con solo presionar un botón\r\nMotor de 125 watts\r\nCapacidad 3 tazas\r\n2 velocidades\r\nBase en negro con modernos detalles cromados\r\nManual en español, inglés y francés.', '0.00', '46.90', 'img/procesadoralimentos.jpg', 'Procesadores de Alimentos'),
(24, 'PROCESADOR DE ALIMENTOS BLACK & DECKER EHC650B', 'BLACK & DECKER', 'Procesador de Alimentos Black & Decker EHC650B\r\n\r\nB&D procesador de alimentos EHC650B\r\nCorte, pique\r\nMotor de 500 watts, ideal para cubrir todas sus necesidades al momento de cocinar\r\nCon solo tocar un botón podrá cortar o picar\r\nDos velocidades\r\nCuchilla de acero inoxidable\r\nRecipiente con capacidad para 3 tazas\r\nFácil de limpiar, las piezas removibles se pueden lavar en el lavaplatos\r\nManual en inglés.', '0.00', '44.90', 'img/procesadoralimentos2.jpg', 'Procesadores de Alimentos'),
(25, 'PROCESADOR BULLET EXPRESS', 'BULLET EXPRESS', 'Procesador Bullet Express\r\n\r\nCortar, rebanar pollo y vegetales para freír puede volverse una tarea agotadora, prepare sus comidas favoritas en sólo segundos con el nuevo y revolucionario Bullet Express Trio\r\nEn menos de lo que le toma buscar un cuchillo afilado usted puede tener el pollo y los vegetales perfectamente cortados y listos para cocinar, o ese pie de manzana que tanto le gusta en 60 segundos o la pizza de su preferencia lista para el horno en 90 segundos gracias a Bullet Express\r\nDe los fabricantes del original Magic Bullet viene el nuevo Bullet Express Trio, la maravillosa máquina 3 en 1 que viene con un poderoso motor de 500 watts con la fuerza suficiente para cualquier tarea en la cocina\r\nAhora usted puede tener cualquier comida familiar lista para calentar o cocinar en sólo 8 minutos\r\nBullet Express está diseñado para cortar, picar y rebanar su comida favorita no importa sin son vegetales o frutas y lo mejor es que todo va directo al refractario, sartén, olla o plato en el que cocina\r\nBullet Express también se convierte en una poderosa mezcladora de comidas, ideal también para preparar masas para hacer pan, pizza o pie en tan solo 35 segundos, rebane y triture fácilmente papas, cebollas, queso, pollo sin esfuerzo\r\n¡Eso no es todo! el Bullet Express Trio también se convierte en Juicer Express, una poderosa juguera para frutas, solo meta manzanas o peras completas y observe como el Bullet Express rápida y fácilmente extrae todo el jugo de las frutas\r\nEl Bullet Express es fácil de limpiar o almacenar sólo póngalo debajo del chorro de agua o en el lavavajillas\r\n\r\nIncluye:\r\n- Accesorios para preparación de comidas (empujador, tapa del rebanador/rallador, bol del rebanador/rallador, disco doble función para rebanar/rallar, disco de salida)\r\n- Accesorio para mezclar alimentos (bol de la mezcladora, tapón del vertedor, tapa de la mezcladora, cuchilla picadora/mezcladora, cuchilla plana, pieza para extracción de cuchillas)\r\n- Accesorios juguera Express (empujador de frutas/vegetales, tapa del juguera, filtro de la juguera, recipiente para pulpa, bol de la juguera, cepillo de limpieza)\r\n- Recetario en español\r\n- Manual del usuario.', '0.00', '289.00', 'img/procesadoralimentos3.jpg', 'Procesadores de Alimentos'),
(26, 'PROCESADOR DE ALIMENTOS ELECTROLUX FPE11 2 V. S', 'ELECTROLUX', 'Procesador de Alimentos Electrolux Fpe11 2 V. S\r\n\r\n- Posee láminas multifuncionales para picar, cortar y batidoras para masas pesadas\r\n- Discos metálicos\r\n- Reversible de corte y trituración; emulsificación y exclusivo para corte de papas\r\n- Recipiente extraíble con capacidad para 1.2 L\r\n- Dos velocidades\r\n- Función de pulso que le permite controlar la consistencia de sus alimentos\r\n- Conducto de alimentos con empujador\r\n- Las partes removibles pueden lavarse en el lavavajillas\r\n- Manual en español\r\n\r\nIncluye:\r\n- Jarra licuadora\r\n- Cuchilla para amasar\r\n- Cuchilla multiusos Disco para batir\r\n- Disco para papas fritas\r\n- Disco para rallar y cortar\r\n- Disco para papas y rallado grueso.', '0.00', '151.00', 'img/procesadoralimentos4.jpg', 'Procesadores de Alimentos'),
(27, 'MINI PROCESADOR TAURUS CEPHEUS', 'TAURUS', 'Mini Procesador 1.5 Tz Taurus Cepheus\r\n\r\n- 100 watts\r\n- Recipiente plástico graduado con capacidad para 1.5 tazas\r\n- Potentes cuchillas de acero inoxidable\r\n- Ideal para picar tomate, cebolla, ajo, perejil y frutos secos\r\n- Función de pulso, permite seleccionar nivel de procesamiento\r\n- Desmontable para fácil limpieza\r\n- Diseño compacto, fácil de guardar.', '0.00', '23.15', 'img/procesadoralimentos5.jpg', 'Procesadores de Alimentos'),
(28, 'HERVIDOR DE AGUA 1.7 L UMCO 0084', 'UMCO', 'Hervidor de Agua 1.7 L Umco 0084\r\n\r\nHervidor de agua eléctrico en acero inoxidable.Inalámbrica\r\nBase giratoria a 360ºCalefactor oculto.Ideal para preparar infusiones, café, sopas instantáneas, biberones, etc\r\nApagado automático y manual\r\nFácil de limpiar.Manual en español.', '0.00', '34.75', 'img/hervidor.jpg', 'Cafeteras y Teteras'),
(29, 'CAFETERA 4 TZ OSTER 3301', 'OSTER', 'Cafetera 4 Tz Oster 3301\r\n\r\nCapacidad para 4 tazas\r\nJarra de vidrio con marcas que indican el nivel de café colado \r\nFiltro permanente incluido\r\nTanque de agua con indicador de nivel\r\nLuz indicadora de encendido/apagado \r\nNegra\r\nManual en español e inglés.', '0.00', '33.00', 'img/cafetera.jpg', 'Cafeteras y Teteras'),
(30, 'CAFETERA 35 TZ OSTER BVSTDC3390', 'OSTER', 'Cafetera 35 Tz Oster BVSTDC3390\r\n\r\nTipo percolador\r\nCapacidad para 35 tazas\r\nElaborado en acero inoxidable cepillado para mayor durabilidad\r\nAsas resistentes al calor\r\nTapa de seguridad\r\nPráctica función automática para mantener el café caliente\r\nLuz indicadora, se enciende cuando el café ya está listo para servir\r\nFunción de protección que apaga automáticamente la unidad si no tiene agua adentro\r\nCable removible para facilitar el llenado y la limpieza\r\nMarcas interiores del nivel de agua para llenar con precisión\r\nManual en español, inglés, portugués y francés.', '0.00', '55.90', 'img/cafetera2.jpg', 'Cafeteras y Teteras'),
(31, 'CAFETERA 6 TZ UMCO UM0085', 'UMCO', 'Cafetera 6 Tz Umco UM0085\r\n\r\n- Filtro permanente\r\n- Jarra refractaria con capacidad para 0.6 litros (4 a 6 tazas)\r\n- Dispositivo a prueba de goteo\r\n- Tanque de agua semitransparente con indicador de nivel de agua\r\n- Switch de encendido y apagado\r\n- Manual en español.', '0.00', '23.60', 'img/cafetera3.jpg', 'Cafeteras y Teteras'),
(32, 'CAFETERA 18 TZ ELECTROLUX CMP10', 'ELECTROLUX', 'Cafetera 18 Tz Electrolux CMP10\r\n- Capacidad para 18 tazas\r\n- Pantalla LCD \r\n- Reloj programable con temporizador para que su café pase automáticamente hasta 24 horas después de programado\r\n- Sistema permanente de filtración de agua, con carbono activo y filtro dorado que no mancha\r\n- Sistema anti goteo\r\n- Placa calefactora\r\n- Ventana indicadora de nivel del agua\r\n- Selector de la temperatura de la jarra\r\n- Selector de intensidad del café\r\n- Función de aroma que permite obtener un olor intenso del café mientras se filtra\r\n- Potencia 1100 watts\r\n- Color silver\r\nIncluye:\r\n- Manual en español.', '0.00', '115.00', 'img/cafetera4.jpg', 'Cafeteras y Teteras'),
(33, 'EXPRIMIDOR DE CITRICOS OSTER 3190', 'OSTER', 'Exprimidor de Citricos Oster 3190\r\n\r\nJarra de 0.75 litros de capacidad\r\nRotación bidireccional\r\nSistema de encendido y apagado automático\r\nCompartimiento para almacenamiento de cable\r\nManual español, inglés y francés\r\nIncluye:\r\nTapa protectora\r\n2 conos de exprimido.', '0.00', '28.30', 'img/extractor.jpg', 'Extractores de Jugos'),
(34, 'EXTRACTOR DE JUGOS OSTER 3168', 'OSTER', 'Extractor de Jugos Oster 3168\r\n\r\n- Potente motor de 600 watts para mayor extracción de jugo hasta en las frutas y vegetales más duros\r\n- Palanca de seguridad de un solo movimiento para una mayor protección y facilidad\r\n- Tubo de alimentación removible para fácil limpieza y cómodo almacenaje\r\n- Filtro completamente de acero inoxidable diseñado más robusto para mayor durabilidad\r\n- Envase para pulpa de gran capacidad\r\n- Fácil de ensamblar y limpiar\r\n- Jarra de gran capacidad que le permite extraer hasta 1 litro de jugo para su conveniencia\r\n- Manual en español, inglés y portugués.', '0.00', '139.00', 'img/extractor2.jpg', 'Extractores de Jugos'),
(35, 'EXTRACTOR DE JUGOS OSTER 3169', 'OSTER', 'Extractor de Jugos Oster 3169\r\n\r\n- Poderoso motor de 300 watts\r\n- Operación supersilenciosa de 2 velocidades\r\n- Práctica jarra para servir con separador de pulpa\r\n- Sistema de seguridad que impide abrir la tapa cuando la unidad está funcionando\r\n- Cepillo de limpieza extraresistente.', '0.00', '72.00', 'img/extractor3.jpg', 'Extractores de Jugos'),
(36, 'EXTRACTOR DE JUGOS JUICE BOOSTER', 'TVentas', 'Extractor de Jugos Juice Booster\r\n- Despierte su vitalidad y aumente su energía gracias a Juice Booster, el extractor de jugos más avanzado durable y garantizado\r\n- Juice Booster tiene 600 watts de potencia y es uno de los extractores más poderosos jamás creado, las cuchillas de extracción giran a  7000 rpm para extraer la mayor cantidad de jugo, nutrición y sabor de las frutas y vegetales\r\n- Juice Booster posee una abertura extra-grande para que pueda introducir frutas y vegetales enteros ahorrando tiempo y dinero sin desperdiciar la fruta\r\n- Saca hasta un 30% más de jugo, el secreto está en el diseño cilíndrico de extracción con cuchillas de acero de diseño exclusivo que pican el alimento por completo, su motor de alta velocidad produce una fuerza centrífuga extrema dejando a la pulpa totalmente seca para darle el jugo más puro, delicioso y lleno de vitaminas y minerales\r\n- Prepare deliciosas sopas, cocteles, y bebidas energizantes rápidamente y de forma natural sin químicos ni preservantes solo fruta fresca\r\n- Mejore su salud, baje de peso, y rejuvenezca gracias al poder antioxidante de los jugos naturales y a Juice Booster.', '0.00', '129.00', 'img/extractor4.jpg', 'Extractores de Jugos'),
(37, 'EXTRACTOR DE JUGOS POWER JUICER EXPRESS ROJO', 'POWER JUICER EXPRESS', 'Extractor de Jugos Power Juicer Express Rojo \r\n\r\nCon Power Juicer ahora podrá hacer sus propios jugos con 30% más del jugo de sus frutas y vegetales favoritos\r\nEs rápido, jugo fresco en cuestión de segundos\r\nNuevo diseño elegante y compacto con un 20 % menos de su tamaño original para ocupar el menor espacio en su cocina\r\nBoquilla antigoteo, para evitar derrames\r\nCompartimiento extra-grande, no necesita cortar en trozos las frutas y verduras para extraer el jugo\r\nRecolector de pulpa traslucido extra grande Silencioso motor de inducción de 3600RPM que esta enfocado en el esfuerzo de torsión y no solo de RPM generando menos calor que puede afectar los nutrientes de sus bebidas\r\nEs silencioso\r\nFácil de limpiar y seguro de lavar en lavavajillas Cuchilla de acero inoxidable\r\nColor rojo cromado\r\n\r\nIncluye:\r\n- Manual en español\r\n- Libro de recetas Recetas para una vida saludable\r\n- Guía de extracción express.', '0.00', '249.00', 'img/extractor5.jpg', 'Extractores de Jugos'),
(38, 'LICUADORA OSTER BLSTDG-R00-013', 'OSTER', 'Licuadora Oster BLSTDG-R00-013\r\n\r\nPotente motor de 450 watts de potencia\r\n6 velocidades\r\nDiseño elegante con detalles en rojo\r\nPanel de control sencillo y fácil de usar con botones suaves al tacto\r\nCuchilla removible de acero inoxidable para triturar frutas congeladas y hielo para preparar jugos\r\nVaso de vidrio de 1.75 litros 7 tazas diseñado para adaptarse con facilidad a la puerta del refrigerador e ideal para guardar jugos, leches, malteadas y otras bebidas congeladas\r\nTapa especial para verter fácilmente\r\nColor roja\r\nManual en español, inglés y portugués.', '0.00', '112.00', 'img/licuadora.jpg', 'Licuadoras'),
(39, 'LICUADORA ELECTROLUX BSS10', 'ELECTROLUX', 'Licuadora Electrolux BSS10\r\n\r\nIdeal para preparar diferentes bebidas, triturar frutas y verduras, batir crema, etc\r\n5 velocidades y control de pulso\r\n500 watts de potencia\r\nBotón de pulso\r\nBase cromada \r\nCuchillas de acero inoxidable\r\nVaso de vidrio de 1.5 litros de capacidad\r\nTapa dosificadora\r\nCompartimiento para almacenamiento del cable\r\nManual en español.', '0.00', '94.00', 'img/licuadora2.jpg', 'Licuadoras'),
(40, 'LICUADORA OSTER 6608', 'OSTER', 'Licuadora Oster 6608\r\n\r\nVaso de vidrio de 6 tazas 1.4 Litros que puede lavarse en el lavaplatos y soporta cambios de temperatura\r\nMotor de 450 watts de potencia\r\n14 velocidades\r\nFunción de pulso para controlar la mezcla con precisión\r\nCuchillas de acero inoxidable.', '0.00', '74.00', 'img/licuadora3.jpg', 'Licuadoras'),
(41, 'LICUADORA ELECTROLUX BCH10', 'ELECTROLUX', 'Licuadora Electrolux BCH10\r\n\r\nIdeal para preparar diferentes bebidas, triturar frutas y verduras\r\nVaso de vidrio de 1.5 litros de capacidad\r\n3 velocidades y control de pulso\r\nPotente motor de 500 watts de potencia\r\nCuchillas removibles con láminas de acero inoxidable\r\nFunción para picar hielo\r\nSistema de seguridad que impide el uso de la licuadora cuando la jarra no esté correctamente acoplada\r\nTapa con medidor\r\nSoportes de goma que mantienen la licuadora fija mientras licúa\r\nColor negra\r\nManual en español.', '0.00', '85.00', 'img/licuadora4.jpg', 'Licuadoras'),
(42, 'LICUADORA OSTER 6808', 'OSTER', 'Licuadora Oster 6808\r\n\r\nMotor de 450 watts de potencia\r\n10 velocidades\r\nVaso de plástico de 6 tazas 1.4 litros que puede lavarse en el lavaplatos y soporta cambios de temperatura\r\nCuchillas de acero inoxidable para triturar fruta congelada y hielo\r\nFunción de pulso para controlar la mezcla con precisión\r\nSistema de acople All Metal Drive para mayor durabilidad\r\nManual en español e inglés.', '0.00', '64.90', 'img/licuadora5.jpg', 'Licuadoras'),
(43, 'BATIDORA DE PEDESTAL KITCHEN AID KSM150', 'AID', 'Batidora de Pedestal Kitchen AID Ksm150\r\n\r\nLe ofrece una acción de mezclado extraordinario que hace dar vueltas el batidor en el sentido de las manecillas del reloj mientras el eje se mueve en el sentido contrario a las manecillas del reloj\r\n325 watts de potencia de motor\r\n10 velocidades de batido\r\nConstrucción robusta de metal\r\nEngranes metálicos\r\nBase de cabeza inclinable para un fácil acceso a los batidores y al tazón\r\nTazón de acero inoxidable pulido con capacidad de 5 litros\r\n59 puntos de contacto diferentes dentro del tazón, para una mejor cobertura\r\nPuede manipular mezclas con hasta 9 tazas (2.1 libras) de harina\r\nManual y recetas en español, inglés y francés\r\n\r\nAccesorios incluidos:\r\nBatidor tipo paleta recubierto\r\nBatidor tipo globo de 6 alambres\r\nGancho tipo C para masa con recubrimiento\r\nVertedor \r\nDisponible en:\r\nColores: negro, blanco o rojo.', '0.00', '495.00', 'img/batidora.jpg', 'Batidoras'),
(44, 'BATIDORA DE PEDESTAL OSTER 2610', 'OSTER', 'Batidora de Pedestal Oster 2610\r\n- 6 velocidades\r\n- Motor de 250 watts\r\n- Tazón de plástico giratorio de 2.5 L de capacidad\r\n- Función de mezclado que aumenta automáticamente la velocidad para una mejor consistencia de la mezcla.\r\n- Práctico botón de un solo toque que expulsa fácilmente los batidores\r\n- La cabeza de la batidora se separa de la base para usarse como batidora de mano\r\n- Mango ergonómico para un mejor equilibrio de la batidora\r\n\r\nIncluye:\r\n- 2 tipos de aspas: Para batir y amasar. ', '0.00', '67.00', 'img/batidora2.jpg', 'Batidoras'),
(45, 'BATIDORA DE PEDESTAL KITCHEN AID KSM150', 'AID', 'Batidora de Pedestal Kitchen AID KSM150\r\n\r\nLe ofrece una acción de mezclado extraordinario que hace dar vueltas el batidor en el sentido de las manecillas del reloj mientras el eje se mueve en el sentido contrario a las manecillas del reloj\r\n\r\nCaracterísticas:\r\n- 325 watts de potencia de motor\r\n- 10 velocidades de batido\r\n- Construcción robusta de metal\r\n- Engranes metálicos\r\n- Base de cabeza inclinable para un fácil acceso a los batidores y al tazón\r\n- Tazón de acero inoxidable pulido con capacidad de 4.83 litros\r\n- 59 puntos de contacto diferentes dentro del tazón, para una mejor cobertura\r\n- Puede manipular mezclas con hasta 9 tazas (2.1 lb) de harina\r\n- Color negro\r\n- Manual de instrucciones y recetas en español, inglés y francés\r\n\r\nAccesorios incluidos:\r\n- Batidor tipo paleta recubierto\r\n- Batidor tipo globo de 6 alambres\r\n- Gancho tipo C para masa con recubrimiento\r\n- Vertedor.', '0.00', '495.00', 'img/batidora3.jpg', 'Batidoras'),
(46, 'BATIDORA DE PEDESTAL UMCO UM0082', 'UMCO', 'Batidora de Pedestal Umco UM0082\r\n\r\n- 5 velocidades\r\n- 200 watts de potencia\r\n- Aspas cromadas\r\n- 2 tipos de aspas: para batir y para amasar\r\n- Tazón plástico\r\n- Puede usarse como batidora manual, ya que se separa del soporte\r\n- Botón expulsor de batidores\r\n- Regulador de inclinación\r\n- Mango ergonómico\r\n- Fácil acceso para cambiar las velocidades\r\n- Manual en español.', '0.00', '43.00', 'img/batidora4.jpg', 'Batidoras'),
(47, 'BATIDORA TAURUS NEW MIXO', 'TAURUS', 'Batidora Taurus New Mixo\r\n\r\n- 5 velocidades\r\n- Botón para mayor velocidad\r\n- Potencia 200 watts\r\n\r\nIncluye:\r\n- Dos aspas para batir\r\n- Dos aspas para mezclar\r\n- Color blanco\r\n- Manual en español.', '0.00', '17.90', 'img/batidora5.jpg', 'Batidoras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `rol` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `pass`, `rol`) VALUES
(1, 'Joseph Godoy', 'josephg059@gmail.com', '12345', 1),
(3, 'administrador', 'admin@admin.com', '123456', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
