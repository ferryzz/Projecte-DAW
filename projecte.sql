-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
<<<<<<< HEAD
-- Tiempo de generación: 17-05-2018 a las 20:52:12
=======
-- Tiempo de generación: 17-05-2018 a las 21:16:03
>>>>>>> 8601e09ad1511ecc5e1feb03419bd6fc68b6b011
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `projecte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `id_familia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `id_familia`) VALUES
(1, 'Fuentes de Alimentación', 1),
(2, 'Placas Base', 1),
(3, 'Memorias RAM', 1),
(4, 'Procesadores', 1),
(5, 'Discos Duros', 1),
(6, 'Tarjetas Gráficas', 1),
(7, 'Sobremesa', 2),
(8, 'Portátiles', 2),
(9, 'Teclados', 3),
(10, 'Ratones', 3),
(11, 'Monitores', 3),
(12, 'Auriculares', 3),
(13, 'Cables USB', 4),
(14, 'Cables HDMI', 4),
(15, 'Cables VGA', 4),
(16, 'Cables de red', 4),
(17, 'Cables ATA', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` varchar(13) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `password` varchar(15) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `poblacion` varchar(50) NOT NULL,
  `Provincia` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `email`, `telefono`, `direccion`, `password`, `cp`, `poblacion`, `Provincia`, `pais`) VALUES
(1, 'Sergi Aguado Redondo', 'sergiaguado97@gmail.com', '666666666', 'c./ santa maria 34', '123456', '08180', 'Moià', 'Barcelona', 'España'),
(2, 'Jesus Rodriguez Martos', 'jesusrodri@gmail.com', '666666636', 'c./ santa roca 221', '123456', '08100', 'Mollet del vallès', 'Barcelona', 'España'),
(3, 'Raul Martinez Garcia', 'raulmg@yahoo.es', '655555555', 'c./ calle resp 32, 2º 1ª', '123456', '08001', 'Barcelona', 'Barcelona', 'España'),
(4, 'David Garcia Abad', 'garciadavidabad@gmail.com', '939939999', 'plaza de las fresas, 34', '123456', '08100', 'Mollet del vallès', 'Barcelona', 'España');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_productos_ventas`
--

CREATE TABLE `clientes_productos_ventas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes_productos_ventas`
--

INSERT INTO `clientes_productos_ventas` (`id`, `id_cliente`, `id_producto`, `id_venta`, `cantidad`) VALUES
(1, 1, 13, 1, 1),
(2, 1, 5, 1, 1),
(3, 1, 7, 1, 2),
(4, 2, 12, 2, 2),
(5, 2, 3, 2, 1),
(6, 1, 15, 3, 3),
(7, 1, 6, 3, 1),
(8, 1, 11, 3, 2),
(9, 4, 7, 4, 14),
(10, 4, 8, 5, 2),
(11, 4, 9, 5, 3),
(12, 4, 11, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`id`, `Nombre`) VALUES
(1, 'Componentes'),
(2, 'Ordenadores'),
(3, 'Periféricos'),
(4, 'Cables');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opiniones`
--

CREATE TABLE `opiniones` (
  `id` int(11) NOT NULL,
  `fecha` varchar(12) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `comentario` varchar(400) NOT NULL,
  `valoracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `opiniones`
--

INSERT INTO `opiniones` (`id`, `fecha`, `id_cliente`, `id_producto`, `comentario`, `valoracion`) VALUES
(1, '14/04/2018', 1, 7, 'Me ha gustado mucho etc tec etc et cetetc ectecte cecet ect ectce ect cetcetectcet cet cet cet ect cet ', 4),
(2, '14/04/2018', 1, 13, 'I love this producto jedw ewojdewiubfoewbuf', 5),
(3, '16/04/2018', 4, 7, 'No me ha gustado nada, va mal', 1),
(4, '17/04/2018', 2, 12, 'Esta bien.', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` int(6) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `stock` int(11) NOT NULL,
  `nombre_corto` varchar(20) NOT NULL,
  `promocion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `categoria_id`, `imagen`, `descripcion`, `stock`, `nombre_corto`, `promocion`) VALUES
(1, 'L-Link Fuente de Alimentación 650W PFC', 22, 1, 'assets/img/fuente1.jpg', 'Esta fuente de alimentación de 650W LL-PS-650 contiene un ventilador de 12 cm y 14 dB apenas perceptibles, que incluye un sistema inteligente con control de velocidad y un sistema antivibraciones. Asimismo, cumple con todas las normas europeas.', 23, 'L-Link 650W PFC', 0),
(2, 'Tacens APII500 Fuente Alimentación 500W', 13, 1, 'assets/img/fuente2.jpg', 'La fuente de alimentación APII500 cuenta con una potente tecnología de rail 12v único, que la capacita para un rendimiento extremadamente potente y estable. Además, ofrece la máxima compatibilidad gracias a la longitud de su cableado. Esta fuente incorpora con un ventilador TACENS de 12 cm y 14 dB, ultrasilencioso, que cuenta con control de velocidad térmico inteligente y sistema anti-vibraciones, reduciendo notablemente el nivel sonoro de la fuente.\r\n\r\nLa APII500 ha sido fabricada conforme a la normativa de la UE y dispone de protecciones eléctricas y filtrado de grado industrial para un funcionamiento seguro.', 21, 'Tacens APII500 500W', 0),
(3, 'MSI Z370 Gaming Plus', 140, 2, 'assets/img/placa1.jpg', 'Te presentamos la MSI Z370 Gaming Plus, una placa base con socket Intel 1151 y chipset Z370', 17, 'MSI Z370 Gaming Plus', 0),
(4, 'Gigabyte Z370P D3', 89, 2, 'assets/img/placa2.jpg\r\n', 'La placa base Gigabyte Z370 D3,  es una de las primeras placas base que ofrecerá el fabricante para la 8ª generación de Intel Core con arquitectura Coffee Lake.', 19, 'Gigabyte Z370P D3', 0),
(5, 'Crucial DDR4 2133 PC4-17000 8GB CL15', 75, 3, 'assets/img/ram1.jpg', 'Diseñada para ser compatible con los sistemas Mac, la memoria Crucial elimina las conjeturas relacionadas con una actualización de memoria. Fácil de instalar y respaldada por una garantía de vida útil limitada, la memoria Crucial mejora la velocidad de tu sistema para que funcione tal y como debería funcionar.', 45, 'Crucial DDR4 8GB', 0),
(6, 'Intel Core i7-8700K 3.7Ghz BOX', 319, 4, 'assets/img/procesador1.jpg', 'Te presentamos el Intel Core i7-8700K, un procesador de 8ª Generación, con socket Intel 1151.', 24, 'i7-8700K 3.7Ghz', 0),
(7, 'Intel Core i3-8100 3.6GHz BOX', 100, 4, 'assets/img/procesador2.jpg', 'Te presentamos el Intel Core i3-8100, un procesador Intel de 8ª Generación con socket Intel 1151.', 19, 'i3-8100 3.6GHz', 0),
(8, 'Seagate BarraCuda 3.5" 1TB SATA3', 45, 5, 'assets/img/discoduro1.jpg', 'BarraCuda lidera la industria con las capacidades más altas para ordenadores de sobremesa y portátiles. Las unidades de hasta 10 TB hacen que la cartera de productos BarraCuda sea una excelente opción para actualizar su infraestructura tecnológica sea cual sea su presupuesto. La contundente unidad BarraCuda Pro asocia la capacidad de almacenamiento líder del sector con velocidades de giro de 7.200 rpm para conseguir un rendimiento y unos tiempos de carga eficientes al jugar o realizar cargas de trabajo intensas. BarraCuda Pro también cuenta con una garantía limitada de 5 años.', 20, 'Seagate 3.5" 1TB ', 0),
(9, 'Samsung 850 Evo SSD Series 250GB SATA3', 85, 5, 'assets/img/discoduro2.jpg', 'Los discos SSD Samsung 850 EVO tienen una velocidad de lectura casi simétrica de 540 MB/s de lectura por 520 MB/s de escritura gracias a los cuales el acceso a tus aplicaciones, juegos y la carga del sistema operativo son casi instantáneos.\r\n\r\nGracias al software Magicina y a Turbowrite, las velocidades alcanzadas por este disco SSD no disparan su consumo, al contrario, lo hacen altamente eficiente.\r\n\r\nDespídete de los tiempos de carga con un disco duro SSD y disfruta de la garantía de calidad del gigante asiático con el Samsung Evo 850.  La tecnología 3D V-Nand permite acoplar más capas de células para aumentar exponencialmente la capacidad del disco SSD sin apenas ocupar más espacio.', 20, 'Samsung SSD 250GB', 0),
(10, 'Asus Dual GTX 1060 OC 6GB GDDR5', 379, 6, 'assets/img/gpu1.jpg', 'Con un gran elenco de novedosas tecnologías, la GTX 1060 se convierte en la puerta de entrada a la realidad virtual y a los gráficos en alta definición. Entre todas ellas destaca la tecnología Pascal utilizada para fabricar la GPU bajo una nueva arquitectura más óptima en todos los aspectos y de la que hablaremos más abajo.\r\n\r\nEl modelo de Asus hace uso de Wing-Blade como tecnología para mejorar el flujo de aire hasta con un 105% más de presión. Los ventiladores ultrasilenciosos instalados llegan a funcionar a 0dB ¡No notarás que está nencendidos!\r\n\r\nComo en otras gráficas Asus que utilizan Auto-Extreme Technology, una solución que reduce el consume de energía en un 50% y es respetuosa con el medio ambiente al reducir el uso de químicos en los materiales utilizados para fabricar esta tarjeta sin renunciar a nada y con unos materiales de primera calidad como una aleación especial que ha facilitado la creación de placas un 50% más frías que en diseños anteriores: Super Alloy Power II.  ', 15, 'Asus GTX 1060 6GB', 0),
(11, 'MSI GeForce GTX 1070 Ti GAMING 8 GB GDDR5', 592, 6, 'assets/img/gpu2.jpg', 'Prepárate para el juego con GeForce® GTX. Las tarjetas GeForce GTX son las más avanzadas jamás creadas. Descubre un rendimiento sin precedentes, eficiencia energética y experiencias gaming de nueva generación.', 15, 'MSI GTX 1070 Ti', 1),
(12, 'HP Pavilion Desktop 570-P066NS AMD A10-9700/12GB/1TB/RX 460', 600, 7, 'assets/img/sobremesa1.jpg', 'Mientras que el desarrollo de otras torres ha sido detenido, HP ha revolucionado esta categoría. Desde su diseño atractivo y ahorrador de espacio, hasta su pleno rendimiento y fiabilidad, este HP Pavilion 570-p066ns es lo mejor que ha pasado en el campo de las torres en más de 20 años.\r\n\r\nPotencia y rendimiento para un entretenimiento de primera clase, juegos y experiencia multitarea.', 20, 'HP 570-P066NS', 0),
(13, 'HP OMEN 880-127NS Intel Core i7-8700/16GB/1TB+128GB SSD/GTX 1060', 1120, 7, 'assets/img/sobremesa2.jpg', 'Pasar de un ser un jugador mediocre a uno legendario exige potencia que no requiere refuerzos. El PC de sobremesa HP OMEN 880-127NS posee un diseño de vanguardia, el hardware más reciente del sector y se actualiza con facilidad para aplastar los últimos títulos y darte el rendimiento de primera que la competición te exige. Mantener el objetivo exige una fuerza implacable.\n\nLas aberturas de ventilación en todo el perímetro y los dos ventiladores de 120 mm garantizan que, cuando estés en plena batalla, tu ordenador de sobremesa no se convertiran en el núcleo de un magma. Completa lo anterior con un diseño similar a una máquina y el asa de transporte lista para usar y estará listo.\n\nSubir los marcadores exige una máquina que te pueda acompañar en la hazaña. El equipo de sobremesa OMEN está pensado para aumentar la capacidad de actualización con una puerta libre de herramientas que agiliza el  acceso y mantenimiento', 0, 'HP OMEN 880-127NS', 0),
(14, 'HP Notebook 250 G6 Intel Core i5-7200U/8GB/256GB SSD/15.6"', 595, 8, 'assets/img/portatil1.jpg', 'Afronta todas tus tareas diarias con un portátil asequible que viene equipado con todas las características que necesitas. Obtén toda la potencia que deseas con el portátil HP Notebook 250 G6.', 5, 'HP Notebook 250 G6', 0),
(15, 'Portátil Lenovo IdeaPad 320-15AST AMD A4-9120/8GB/1TB/15.6"', 419, 8, 'assets/img/portatil2.jpg', 'Te presentamos el IdeaPad 320-15AST de Lenovo, un portátil con procesador AMD A4, 8GB de RAM, 1TB de disco duro y pantalla de 15.6".', 10, 'Lenovo IP 320-15AST', 0),
(16, 'Logitech Keyboard K120', 14, 9, 'assets/img/keyboard1.jpg', 'Un teclado USB que permite escribir cómodamente, durante mucho tiempo.\r\n', 50, 'Logitech K120', 0),
(17, 'Newskill Hanshi Spectrum Teclado Mecánico RGB Kailh Brown', 100, 9, 'assets/img/keyboard2.jpg', 'Te presentamos en PcComponentes lo último en periféricos Gaming de mano de la marca Newskill. Newskill nace gracias a la pasión por los e-sports, girando en todo momento en torno a la continua evolución y al perfeccionamiento de los usuarios, ya sean profesional o casual gamers. El objetivo de Newskill es proveer a los jugadores de los mejores productos de la escena gaming así como proporcionar el mejor soporte y experiencia de uso a cada uno de ellos. Bienvenidos jugadores!!!!\r\n\r\nTeclado Mecánico RGBHANSHI Spectrum\r\n\r\nHanshi Spectrum es una versión mejorada de su predecesor Hanshi en donde hemos añadido a todos los detalles que hacen de este teclado un arma infalible para gamers (totalmente mecánico, grabación de macros, acabados metálicos…) la reinvención de la tecnología RGB. Además, con los mecanismos Red y Brown, hemos alargado su vida útil hasta 55 millones de pulsaciones, y mejorado la comodidad de uso con un reposa muñecas extraíble ergonómico.', 28, 'Newskill Hanshi RGB', 0),
(18, 'HP 200 Ratón Inalámbrico 1000DPI', 10, 12, 'assets/img/raton1.jpg', 'Este ratón inalámbrico asequible HP 200 ofrece más que un precio económico. Proporciona libertad para crear sin cables que lo limiten. Además, nuestro ratón inalámbrico está contorneado pensando en diestros y zurdos por igual, para que pueda aumentar su productividad sin esfuerzo. Nunca había sido tan fácil y económico pasarse a la tecnología.', 43, 'HP 200 1000DPI', 0),
(19, 'Razer DeathAdder Elite Ratón Gaming 16000 DPI Negro', 75, 10, 'assets/img/raton2.jpg', 'Te presentamos el Razer DeathAdder Elite, un excelente ratón gaming de gran calidad, como todos los periféricos Racer, y un cuidado y aguerrido diseño con el que masacrar a tus enemigos con la mejor herramienta.', 40, 'Razer DeathAdder ', 0),
(20, 'Samsung S24D330H 24" LED', 135, 11, 'assets/img/monitor1.jpg', 'Te presentamos el monitor LED de 24" S24D330H de Samsung, un monitor perfecto para complementar tu equipo gaming.', 15, 'Samsung S24D330H', 0),
(21, 'MSI Optix G24C 24" FullHD Curvo', 255, 11, 'assets/img/monitor2.jpg', 'MSI Optix G24C es un fantástico monitor gaming, con pantalla LCD de 23.6" con retroiluminación LED (1920 x 1080 Full HD) y frecuencia de actualización de 144 Hz.', 20, 'MSI Optix G24C', 0),
(22, 'Logitech G430 Gaming Surround Sound 7.1', 75, 12, 'assets/img/auriculares2.jpg', 'Te acaban de dar una paliza por que no podías comunicarte con tus compañeros de equipo. Eso no te habría pasado si tuvieras unos Logitech G430, los auriculares gaming con el sonido más avanzado del mercado.\r\n\r\nHabla en todo momento con tus compañeros con el micrófono plegable. La cancelación de ruido permite que tus comunicaciones se escuchen alto y claro.\r\n\r\nDisfruta del sonido 7.1 más envolvente gracias a los Logitech G430. Escucha a tus enemigos antes de verlos y anticípate a sus movimientos. Gracias a sus siete canales más el canal de efectos, percibirás el sonido desde los canales adecuados para situar la ubicación de la acción en cada momento.\r\n\r\nLas almohadillas del estos cascos gaming están fabricadas con el mismo material que las prendas deportivas, facilitando la transpiración y evitando la incómoda sensación de sudor. Además, el diseño se ha optimizado al máximo para que estos auriculares sean lo más ligeros posible, algo que es de agradecer si pasas muchas horas al día delante del PC.', 40, 'Logitech G430', 0),
(23, 'SuperLux HD 668B', 30, 12, 'assets/img/auriculares2.jpg', 'Auriculares de estudio de increíble calidad sonora, con una relación calidad/precio excepcional.', 35, 'SuperLux HD 668B', 0),
(24, 'Cable USB 3.0 Alargador Macho/Hembra 1m', 5, 13, 'assets/img/usb1.jpg', 'Fabricado con cable Doble Apantallado\r\n4 conductores (UL2725, 2 x AWG24, 2 x AWG28 )\r\nCarcasas de plástico inyectado\r\nConector 1: USB A (6 Pines) Macho\r\nConector 2: USB A (6 Pines) Hembra\r\nCompatible USB Versión 1.1 y 2.0\r\nCertificado USB Versión 3.0', 50, 'USB Macho/Hembra', 0),
(25, 'Nanocable Cable USB Tipo A a Tipo B Negro para Impresora', 1, 13, 'assets/img/usb2.jpg', 'Te presentamos el Cable USB Tipo A a Tipo B Negro para Impresora de Nanocable.', 40, 'Nanocable USB A/B', 0),
(26, 'Owlotech Cable HDMI 1.4 1.8 Metros', 3, 14, 'assets/img/hdmi1.jpg', 'Cable Owlotech HDMI 3D ideal para todo tipo de dispositivos que utilicen interfaz HDMI.', 40, 'Cable HDMI 1.8M', 0),
(27, 'Nanocable Cable HDMI v2.0 4K Macho/Macho 1m Negro', 6, 14, 'assets/img/hdmi2.jpg', 'Te presentamos el Cable HDMI v2.0 de Nanocable. Un cable HDMI v2.0 premium de alta velocidad con conectores macho de alta calidad bañados en oro de 24K en ambos extremos. Fabricando con múltiple apantallamiento para la máxima reducción de interferencias y con conductores de cobre de alta calidad que garantizan la máxima calidad de transmisión.', 50, 'Cable HDMI M/M 1M', 0),
(28, 'Cable SVGA Macho/Macho 1.8M', 8, 15, 'assets/img/vga1.jpg', 'El cable VGA de Equip está construido con tornillos moleteados robustos y los granos de ferrita para ofrecer una conexión fiable entre los monitores o proyectores y los equipos con interfaz VGA.', 40, 'Cable SVGA M/M 1.8M', 0),
(29, 'Startech Cable 30cm Duplicador Divisor de Vídeo VGA de 2 Puertos Salidas', 15, 15, 'assets/img/vga2.jpg', 'Este cable divisor de video VGA de 1 pie permite conectar dos monitores/pantallas VGA a una única fuente de video VGA.\r\n\r\nEste cable duplicador de alta calidad es una solución eficaz y económica para configuraciones de pantalla doble VGA y cuenta con la Garantía de Por Vida de StarTech.com.', 50, 'Cable divisor VGA', 0),
(30, 'Owlotech Cable de Red RJ45 UTP Cat.6 10/100/1000 Gris (2m)', 3, 16, 'assets/img/red1.jpg', 'Te presentamos el cable Owlotec, un cable de red UTP con certificación de Cat 6.', 35, 'Owlotech CableRed 2m', 0),
(31, 'Cable de Red UTP RJ45 Cat 6e 50cm Azul', 2, 16, 'assets/img/red2.jpg', 'Longitud del cable en metros 0.50 m', 40, 'Cable Red 50cm', 0),
(32, 'Equip Cable Alimentación Molex/SATA 15 cm', 2, 17, 'assets/img/ata1.jpg', 'Cable de Alimentación Equip Molex/SATA de 15cm de longitud', 58, 'Cable Alim. 15cm', 0),
(33, 'Startech Cable Adaptador Bifurcador Divisor Splitter de Alimentación SATA de 0,15m 2x Hembra', 6, 17, 'assets/img/ata2.jpg', 'Agregue un conector de alimentación SATA a su Fuente de Alimentación con el cable cable divisor de alimentación SATA PYO2SATA de Startech. El cable divisor de alimentación SATA, PYO2SATA dispone de un conector SATA macho que se conecta a un conector SATA de la fuente de alimentación de un ordenador para dividirse en dos conectores de alimentación SATA hembra. El cable divisor/Y de alimentación SATA permite aumentar la cantidad de discos SATA que se pueden instalar en un sistema en base a las conexiones de alimentación disponibles del PSU, y elimina el gasto de actualizar la fuente de alimentación para dar cabida a una unidad extra de disco SATA.', 17, 'Splitter Cable SATA', 0),
(34, 'Gigabyte GeForce GTX 1070 Ti 8GB GDDR5', 549, 6, 'assets/img/gigabyte1070.jpg', 'Te presentamosla tarjeta gráfica Gigabyte GTX 1070Ti 8GB GDDR5.', 14, 'Gigabyte GTX 1070 TI', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`Id`, `Nombre`, `Email`, `Telefono`) VALUES
(1, 'Electro Stock', 'compras@electrostock.ocm', '939888888'),
(2, 'Componentes express', 'david@componentesexpress.com', '939999999'),
(3, 'Tecno Audio', 'clientes@tecnoaudio.com', '939777888');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repartidores`
--

CREATE TABLE `repartidores` (
  `nombre` varchar(50) NOT NULL,
  `telefono` int(10) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `repartidores`
--

INSERT INTO `repartidores` (`nombre`, `telefono`, `id`) VALUES
('Seur', 902101010, 1),
('MRW', 938720101, 2),
('NACEX', 938788472, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` varchar(12) NOT NULL,
  `hora` varchar(6) NOT NULL,
  `numeroseguimiento` int(11) NOT NULL,
  `id_repartidor` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `hora`, `numeroseguimiento`, `id_repartidor`, `total`, `estado`) VALUES
(1, '03/04/2018', '10:04', 1401, 1, 1341, 'FINALIZADO'),
(2, '04/07/2017', '20:00', 1402, 3, 1289, 'FINALIZADO'),
(3, '10/04/2018', '14:41', 1403, 2, 2646, 'FINALIZADO'),
(4, '10/04/2018', '17:30', 1404, 1, 1346, 'FINALIZADO'),
(5, '14/01/2018', '08:37', 1405, 1, 3167, 'FINALIZADO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes_productos_ventas`
--
ALTER TABLE `clientes_productos_ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `repartidores`
--
ALTER TABLE `repartidores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `clientes_productos_ventas`
--
ALTER TABLE `clientes_productos_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `repartidores`
--
ALTER TABLE `repartidores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
