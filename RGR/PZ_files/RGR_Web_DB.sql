-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 22 2021 г., 21:51
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `RGR_Web_DB`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_letter` char(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id`, `name`, `first_letter`) VALUES
(1, 'Audi', 'A'),
(2, 'BMW', 'B'),
(3, 'Acura', 'A'),
(4, 'Citroen', 'C'),
(5, 'Cadillac', 'C'),
(6, 'Lamborghini', 'L'),
(7, 'Ford', 'F'),
(8, 'Opel', 'O'),
(9, 'Mercedes', 'M');

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `fio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `fio`, `phone`) VALUES
(1, 'Александр Сергеевич Шведенко', '+79788117315'),
(2, 'Александр Сергеевич Шведенко', '+79788117315'),
(3, 'Александр Сергеевич Шведенко', '+79788117315'),
(4, 'Марина Владимировна Шведенко', '+79787831763'),
(5, 'Александр Сергеевич Шведенко', '+79788117315'),
(6, 'Александр Сергеевич Шведенко', '+79788117315'),
(7, 'Александр Сергеевич Шведенко', '+79788117315'),
(8, 'Александр Сергеевич Шведенко', '+79788117315'),
(9, 'Александр Сергеевич Шведенко', '+79788117315'),
(10, 'Александр Сергеевич Шведенко', '+79788117315'),
(11, 'Александр Сергеевич Шведенко', '+79788117315'),
(12, 'Александр Сергеевич Шведенко', '+79788117315'),
(13, 'Александр Сергеевич Шведенко', '+79788117315'),
(14, 'Александр Сергеевич Шведенко', '+79788117315'),
(15, 'Александр Сергеевич Шведенко', '+79788117315'),
(16, 'Александр Сергеевич Шведенко', '+79788117315'),
(17, 'Александр Сергеевич Шведенко', '+79788117315'),
(18, 'Марина Владимировна Шведенко', '+79787831763');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_20_095902_create_news_models_table', 1),
(2, '2021_03_21_083752_create_customers_table', 2),
(3, '2021_03_21_000010_create_users_data_table', 3),
(4, '2021_03_21_000011_create_users_data_table', 4),
(5, '2021_03_21_000020_create_customers_table', 4),
(6, '2021_03_21_000030_create_users_table', 4),
(7, '2021_03_26_110010_create_stock_table', 5),
(8, '2021_03_28_144640_create_brand_table', 6),
(10, '2021_03_29_205559_create_model_table', 7),
(12, '2021_03_31_091614_create_modification_table', 8),
(13, '2021_04_08_135205_create_product_category_table', 9),
(14, '2021_04_08_135333_create_product_fabricator_table', 9),
(15, '2021_04_08_135344_create_product_provider_table', 9),
(16, '2021_04_08_135622_create_product_options_table', 10),
(17, '2021_04_08_144240_create_product_table', 11),
(18, '2021_04_08_144943_create_product_option_table', 12),
(19, '2021_04_08_161507_update_product_fabricator_table', 13),
(20, '2021_04_08_161657_update_product_provider_table', 14),
(28, '2021_04_08_161837_update_product_options_table', 15),
(29, '2021_04_14_104831_create_product_option_type_table', 15),
(30, '2021_04_14_105037_update_product_options', 15),
(31, '2021_04_14_125333_update_prduct_option_table', 16),
(32, '2021_05_15_094608_delete_customers_table', 16),
(33, '2021_05_15_094642_delete_users_data_table', 16),
(34, '2021_05_15_094707_delete_users_table', 16),
(35, '2021_05_15_101319_delete_users_table', 17),
(36, '2021_05_15_101326_delete_users_data_table', 17),
(37, '2021_05_15_101358_delete_users_data_table', 18),
(38, '2021_05_15_101511_create_user_table', 19),
(42, '2021_05_18_201926_create_new_customers_table', 20),
(43, '2021_05_18_201937_create_order_table', 20),
(44, '2021_05_18_201942_create_orders_table', 20),
(54, '2021_05_28_184436_create_slide_table', 21),
(55, '2021_05_28_184538_create_slider_table', 21),
(56, '2021_05_28_184612_create_site_table', 21);

-- --------------------------------------------------------

--
-- Структура таблицы `model`
--

CREATE TABLE `model` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `model`
--

INSERT INTO `model` (`id`, `brand_id`, `name`, `img`) VALUES
(2, 1, 'A1', 'Audi_A1.png'),
(3, 6, 'Huracan', 'Lamborgini_Huracan.png'),
(4, 6, 'Aventador', 'aventador.png'),
(5, 2, 'I8', 'BMW_I8.png'),
(6, 8, 'Astra', 'astra_j4t_PZT_01.png'),
(7, 7, 'Mustang', '2016-ford-Mustang-GT.png'),
(8, 9, 'SLS AMG', '59693230dc0c8-1200x900_cropgrayscale.png');

-- --------------------------------------------------------

--
-- Структура таблицы `modification`
--

CREATE TABLE `modification` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engine_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engine_model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engine_volume` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `power` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `modification`
--

INSERT INTO `modification` (`id`, `model_id`, `name`, `engine_type`, `engine_model`, `engine_volume`, `power`) VALUES
(1, 2, '1.2 TFSI', 'Бензиновый', 'CBZA', '1.2', '90'),
(2, 4, '6.5 AMT SVJ Coupe', 'Бензиновый', 'VVT', '2', '770'),
(3, 5, 'I12', 'Бензиновый', 'VVS', '1.5', '231'),
(4, 6, 'Cabrio 1.6i', 'Бензиновый', 'OHC', '6.4', '71'),
(5, 7, 'GT500', 'Бензиновый', 'Ford Predator', '5.2', '760'),
(6, 8, '6.2', 'Бензиновый', 'M 159.980', '6.2', '571');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `desc`, `img`, `text`, `date`) VALUES
(1, 'Новость', '&lt;p&gt;Здесь идёт описание новости. Оно не очень большое&lt;/p&gt;', 'image_2.png', '&lt;p&gt;Предварительные выводы неутешительны: постоянный количественный рост и сфера нашей активности говорит о возможностях экономической целесообразности принимаемых решений. Высокий уровень вовлечения представителей целевой аудитории является четким доказательством простого факта: перспективное планирование позволяет оценить значение вывода текущих активов. Но постоянное информационно-пропагандистское обеспечение нашей деятельности предполагает независимые способы реализации как самодостаточных, так и внешне зависимых концептуальных решений. А также акционеры крупнейших компаний являются только методом политического участия и указаны как претенденты на роль ключевых факторов. Сплочённость команды профессионалов позволяет выполнить важные задания по разработке новых принципов формирования материально-технической и кадровой базы. Задача организации, в особенности же курс на социально-ориентированный национальный проект играет определяющее значение для экономической целесообразности принимаемых решений. Для современного мира перспективное планирование однозначно фиксирует необходимость форм воздействия. Сложно сказать, почему сторонники тоталитаризма в науке неоднозначны и будут описаны максимально подробно. Курс на социально-ориентированный национальный проект предполагает независимые способы реализации соответствующих условий активизации. А также предприниматели в сети интернет призваны к ответу. Приятно, граждане, наблюдать, как представители современных социальных резервов, превозмогая сложившуюся непростую экономическую ситуацию, объективно рассмотрены соответствующими инстанциями. Мы вынуждены отталкиваться от того, что разбавленное изрядной долей эмпатии, рациональное мышление создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом комплекса стандартных подходов. Элементы политического процесса ассоциативно распределены по отраслям. Предварительные выводы неутешительны: разбавленное изрядной долей эмпатии, рациональное мышление создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом комплекса как самодостаточных, так и внешне зависимых концептуальных решений. В частности, внедрение современных методик обеспечивает широкому кругу (специалистов) участие в формировании как самодостаточных, так и внешне зависимых концептуальных решений.&lt;/p&gt;', '2021-03-20'),
(2, 'Новость побольше', 'Здесь идёт описание ещё одной новости. Оно чуть большое, для демонстрации вместимости текста', 'image_2.png', 'Предварительные выводы неутешительны: постоянный количественный рост и сфера нашей активности говорит о возможностях экономической целесообразности принимаемых решений. Высокий уровень вовлечения представителей целевой аудитории является четким доказательством простого факта: перспективное планирование позволяет оценить значение вывода текущих активов. Но постоянное информационно-пропагандистское обеспечение нашей деятельности предполагает независимые способы реализации как самодостаточных, так и внешне зависимых концептуальных решений. \r\n\r\nА также акционеры крупнейших компаний являются только методом политического участия и указаны как претенденты на роль ключевых факторов. Сплочённость команды профессионалов позволяет выполнить важные задания по разработке новых принципов формирования материально-технической и кадровой базы. Задача организации, в особенности же курс на социально-ориентированный национальный проект играет определяющее значение для экономической целесообразности принимаемых решений. \r\n\r\nДля современного мира перспективное планирование однозначно фиксирует необходимость форм воздействия. Сложно сказать, почему сторонники тоталитаризма в науке неоднозначны и будут описаны максимально подробно. Курс на социально-ориентированный национальный проект предполагает независимые способы реализации соответствующих условий активизации. А также предприниматели в сети интернет призваны к ответу. Приятно, граждане, наблюдать, как представители современных социальных резервов, превозмогая сложившуюся непростую экономическую ситуацию, объективно рассмотрены соответствующими инстанциями. Мы вынуждены отталкиваться от того, что разбавленное изрядной долей эмпатии, рациональное мышление создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом комплекса стандартных подходов. \r\n\r\nЭлементы политического процесса ассоциативно распределены по отраслям. Предварительные выводы неутешительны: разбавленное изрядной долей эмпатии, рациональное мышление создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом комплекса как самодостаточных, так и внешне зависимых концептуальных решений. В частности, внедрение современных методик обеспечивает широкому кругу (специалистов) участие в формировании как самодостаточных, так и внешне зависимых концептуальных решений.', '2021-03-19'),
(3, 'Огромная новость', 'Здесь идёт описание новости, которая поражает своими размерами.\r\n                            Здесь текст не влезает, поэтому вам не видно, что происходит дальше за этими волшебными\r\n                            тремя точками\r\n                        ', 'image_2.png', 'Предварительные выводы неутешительны: постоянный количественный рост и сфера нашей активности говорит о возможностях экономической целесообразности принимаемых решений. Высокий уровень вовлечения представителей целевой аудитории является четким доказательством простого факта: перспективное планирование позволяет оценить значение вывода текущих активов. Но постоянное информационно-пропагандистское обеспечение нашей деятельности предполагает независимые способы реализации как самодостаточных, так и внешне зависимых концептуальных решений. \r\n\r\nА также акционеры крупнейших компаний являются только методом политического участия и указаны как претенденты на роль ключевых факторов. Сплочённость команды профессионалов позволяет выполнить важные задания по разработке новых принципов формирования материально-технической и кадровой базы. Задача организации, в особенности же курс на социально-ориентированный национальный проект играет определяющее значение для экономической целесообразности принимаемых решений. \r\n\r\nДля современного мира перспективное планирование однозначно фиксирует необходимость форм воздействия. Сложно сказать, почему сторонники тоталитаризма в науке неоднозначны и будут описаны максимально подробно. Курс на социально-ориентированный национальный проект предполагает независимые способы реализации соответствующих условий активизации. А также предприниматели в сети интернет призваны к ответу. Приятно, граждане, наблюдать, как представители современных социальных резервов, превозмогая сложившуюся непростую экономическую ситуацию, объективно рассмотрены соответствующими инстанциями. Мы вынуждены отталкиваться от того, что разбавленное изрядной долей эмпатии, рациональное мышление создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом комплекса стандартных подходов. \r\n\r\nЭлементы политического процесса ассоциативно распределены по отраслям. Предварительные выводы неутешительны: разбавленное изрядной долей эмпатии, рациональное мышление создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом комплекса как самодостаточных, так и внешне зависимых концептуальных решений. В частности, внедрение современных методик обеспечивает широкому кругу (специалистов) участие в формировании как самодостаточных, так и внешне зависимых концептуальных решений.', '2021-03-18'),
(4, 'Новая новость', 'Описание', 'image_3.png', 'Текст', '2021-03-25'),
(10, 'Это ещё одна новость', 'и ещё одно описание', 'image_1.png', 'ну и текст', '2021-03-25'),
(11, 'Ура, новая новость!', '&lt;p&gt;И новое описание!&lt;/p&gt;', 'image_4.png', '&lt;p&gt;И конечно же новый текст!&lt;/p&gt;', '2021-03-25'),
(12, 'New news', 'News description', 'w20160701_6 (2).jpg', 'News text', '2021-04-04'),
(13, 'CKEDitor', '&lt;p&gt;this is description&lt;/p&gt;', 'github.png', '&lt;p&gt;new text news1&lt;/p&gt;', '2021-05-22'),
(14, 'Replica', '&lt;p&gt;test&lt;/p&gt;', '6b067144fc96b9c9a7921fd402077c9a.png', '&lt;p&gt;tester&lt;/p&gt;', '2021-05-22'),
(15, 'name', '&lt;p&gt;desc&lt;/p&gt;', '01708b6e54790a7011d050719ebef27668163f0002.jpeg', '&lt;p&gt;&lt;i&gt;&lt;strong&gt;asdasd&lt;/strong&gt;&lt;/i&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;hkjhj&lt;/li&gt;&lt;li&gt;lkj&lt;/li&gt;&lt;li&gt;hgk&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;figure class=&quot;table&quot;&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;test&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;text&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;&amp;nbsp;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;', '2021-05-22');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `date` datetime NOT NULL,
  `count_products` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `customer_id`, `date`, `count_products`, `total_price`) VALUES
(1, 1, '2021-05-18 21:05:32', 2, 33935),
(2, 2, '2021-05-18 21:05:33', 2, 33935),
(3, 3, '2021-05-18 21:05:34', 2, 74725),
(4, 4, '2021-05-18 21:05:35', 1, 8158),
(5, 5, '2021-05-19 16:05:16', 2, 25128),
(6, 6, '2021-05-19 17:05:46', 2, 50604),
(7, 7, '2021-05-19 21:05:21', 1, 3756),
(8, 8, '2021-05-22 08:05:15', 1, 5772),
(9, 9, '2021-05-22 08:05:17', 4, 84746),
(10, 10, '2021-05-22 13:05:54', 1, 11544),
(11, 11, '2021-05-29 06:05:27', 2, 15233),
(12, 12, '2021-05-30 09:05:30', 1, 5772),
(13, 13, '2021-05-30 09:05:30', 1, 5772),
(14, 14, '2021-05-30 09:05:30', 1, 5772),
(15, 15, '2021-05-30 09:05:38', 1, 5772),
(16, 16, '2021-05-30 09:05:44', 1, 5772),
(17, 17, '2021-05-30 09:05:50', 1, 5772),
(18, 18, '2021-05-30 09:05:52', 1, 5772);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `product_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `product_total_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `product_total_price`, `product_quantity`) VALUES
(1, 12, 24474, 3),
(1, 16, 9461, 1),
(2, 12, 24474, 3),
(2, 16, 9461, 1),
(3, 16, 9461, 1),
(3, 12, 65264, 8),
(4, 12, 8158, 1),
(5, 10, 7812, 1),
(5, 9, 17316, 3),
(6, 10, 39060, 5),
(6, 9, 11544, 2),
(7, 11, 3756, 3),
(8, 9, 5772, 1),
(9, 12, 24474, 3),
(9, 11, 10016, 8),
(9, 10, 15624, 2),
(9, 9, 34632, 6),
(10, 9, 11544, 2),
(11, 9, 5772, 1),
(11, 16, 9461, 1),
(14, 9, 5772, 1),
(15, 9, 5772, 1),
(16, 9, 5772, 1),
(17, 9, 5772, 1),
(18, 9, 5772, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `modification_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `product_fabricator_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `product_provider_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `product_category_id`, `modification_id`, `product_fabricator_id`, `product_provider_id`, `name`, `count`, `img`, `price`, `date_added`) VALUES
(9, 1, 1, 3, 1, 'Батарея аккумуляторная 60А/ч 540А 12В обратная поляр. стандартные клеммы', 78, '01f447b9d0dc8d5de9a10df2de1c4134bac9690002.jpeg', 5772, '2021-05-28'),
(10, 1, 1, 4, 1, 'Батарея аккумуляторная 95А/ч 850А 12В обратная поляр. стандартные клеммы', 2, '09428a5eb60e7041f5075804affbeaf11d169c0002.jpeg', 7812, '2021-04-14'),
(11, 2, 2, 3, 1, 'Шина зимняя шипованная NOKIAN TYRES NORDMAN 5 185/65 R15 92T XL', 136, '014a2b3081979110f07b7e8960b8cd4ae11ea60002.jpeg', 1252, '2021-04-14'),
(12, 1, 5, 3, 1, 'Батарея аккумуляторная 72А/ч 680А 12В обратная поляр. стандартные клеммы', 60, '018c866c3004786047473c3d7addf57470b4140002.jpeg', 8158, '2021-04-14'),
(15, 3, 6, 5, 1, 'Диск литой 7x17 5/112 ET40 D57.1', 82, '08f897a3c5078807aa19adc34d4736822088120002.jpeg', 7059, '2021-04-17'),
(16, 1, 3, 4, 1, 'Батарея аккумуляторная 60А/ч 650А 12В прямая поляр. стандартные клеммы', 3, '086712650efadf7a2711c9e8e61efb8a63b68c0002.jpeg', 9461, '2021-04-18'),
(17, 1, 4, 3, 1, 'Батарея аккумуляторная 77А/ч 780А 12В обратная поляр. стандартные клеммы', 46, '01708b6e54790a7011d050719ebef27668163f0002.jpeg', 9755, '2021-04-18'),
(18, 1, 6, 6, 1, 'Батарея аккумуляторная 225А/ч 1150А 12В прямая поляр. стандартные клеммы', 3, '00e6d06aabab2e5bcc11103a6d1cfa43edb4700002.jpeg', 42567, '2021-05-29');

-- --------------------------------------------------------

--
-- Структура таблицы `product_category`
--

CREATE TABLE `product_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_category`
--

INSERT INTO `product_category` (`id`, `name`) VALUES
(1, 'Аккумуляторы'),
(2, 'Шины'),
(3, 'Диски');

-- --------------------------------------------------------

--
-- Структура таблицы `product_fabricator`
--

CREATE TABLE `product_fabricator` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_fabricator`
--

INSERT INTO `product_fabricator` (`id`, `name`, `description`, `logo`) VALUES
(3, 'Varta', 'Varta - самый лучший производитель!', 'varta-akumuliatoriai-logo.png'),
(4, 'Bosch', 'Bosch - Top!', 'bosch-1200x630.png'),
(5, 'Replica', 'Replica - эксклюзивные диски', '6b067144fc96b9c9a7921fd402077c9a.png'),
(6, 'Exide', 'Exide - дорогой бренд', '7db93505611cf0059ac82c8844b35baf.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `product_option`
--

CREATE TABLE `product_option` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `product_options_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_option`
--

INSERT INTO `product_option` (`id`, `product_id`, `product_options_id`, `value`, `category_id`) VALUES
(9, 9, 5, '70', 1),
(10, 9, 6, '12', 1),
(11, 10, 5, '95', 1),
(12, 10, 6, '12', 1),
(13, 11, 7, '126', 1),
(14, 12, 5, '72', 1),
(15, 12, 6, '15', 1),
(16, 12, 8, 'Кальциевая', 1),
(18, 15, 9, 'Литой', 1),
(19, 16, 5, '60', 1),
(20, 16, 6, '12', 1),
(21, 16, 8, 'Гибридная', 1),
(22, 17, 5, '77', 1),
(23, 17, 6, '12', 1),
(24, 17, 8, 'Кальциевая', 1),
(25, 18, 5, '300', 1),
(26, 18, 6, '30', 1),
(27, 18, 8, 'Кальциевая необслуживаемая', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_options`
--

CREATE TABLE `product_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_options`
--

INSERT INTO `product_options` (`id`, `product_category_id`, `name`, `type`) VALUES
(5, 1, 'Ёмкость, А/ч', 1),
(6, 1, 'Напряжение, В', 1),
(7, 2, 'Ширина, мм', 1),
(8, 1, 'Тип батареи', 2),
(9, 3, 'Тип диска', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product_option_type`
--

CREATE TABLE `product_option_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_option_type`
--

INSERT INTO `product_option_type` (`id`, `type`) VALUES
(1, 'Число'),
(2, 'Текст');

-- --------------------------------------------------------

--
-- Структура таблицы `product_provider`
--

CREATE TABLE `product_provider` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_provider`
--

INSERT INTO `product_provider` (`id`, `name`, `description`, `logo`) VALUES
(1, 'Titan', 'Titan - один из лучших поставщиков', '1.png');

-- --------------------------------------------------------

--
-- Структура таблицы `site`
--

CREATE TABLE `site` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `site`
--

INSERT INTO `site` (`id`, `name`, `address`, `work_time`, `phone`, `email`, `description`) VALUES
(1, 'EMEX', 'г. Севастополь, ул. Суворова, д. 1', 'Пн-Пт 9:00 - 18:00', '+7 (978) 777 07 07', 'Emex@info.com', '<p>Предварительные выводы неутешительны: постоянный количественный рост и сфера нашей активности говорит о возможностях экономической целесообразности принимаемых решений. Высокий уровень вовлечения представителей целевой аудитории является четким доказательством простого факта: перспективное планирование позволяет оценить значение вывода текущих активов. Но постоянное информационно-пропагандистское обеспечение нашей деятельности предполагает независимые способы реализации как самодостаточных, так и внешне зависимых концептуальных решений.</p><p>А также акционеры крупнейших компаний являются только методом политического участия и указаны как претенденты на роль ключевых факторов. Сплочённость команды профессионалов позволяет выполнить важные задания по разработке новых принципов формирования материально-технической и кадровой базы. Задача организации, в особенности же курс на социально-ориентированный национальный проект играет определяющее значение для экономической целесообразности принимаемых решений.</p>');

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `title`, `img`) VALUES
(7, 'Новый аккумулятор', '09428a5eb60e7041f5075804affbeaf11d169c0002.jpeg'),
(9, NULL, 'history-of-industrial-robots-header.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `stock`
--

CREATE TABLE `stock` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stock`
--

INSERT INTO `stock` (`id`, `title`, `desc`, `img`, `date_start`, `date_end`) VALUES
(1, 'прлпрл', 'аоапо', 'image_3.png', '2021-03-25', '2021-03-28'),
(2, 'asdd', 'asd', 'image_3.png', '2021-03-24', '2021-03-28'),
(3, 'Новая акция', 'Здесь идёт осмысленный текст', 'image_4.png', '2021-04-03', '2021-04-11'),
(4, 'Практикум', 'asfagasgd', 'image_2.png', '2021-03-03', '2021-03-05'),
(5, 'Акция с редактором текста', '&lt;p&gt;Это тест &lt;strong&gt;акции &lt;/strong&gt;с редактором &lt;i&gt;текста&lt;/i&gt;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;Это список&lt;/li&gt;&lt;/ol&gt;', 'Potenza-del-V10-di-Huracan-Evo.jpg', '2021-05-22', '2021-06-01');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$EhBsBvfDr5M.gwA.5k/nQ.UNSJ88AfcmGyq4YqlTXLAy8yvIwnhCq', 'admin'),
(2, 'content', '$2y$10$tt1/.9O0.oVSqN2byLSvD.1Uq/nPRALddfG2CNoKMjjmphUvI83Sq', 'content'),
(3, 'content2', '$2y$10$GbL2o1lFZTnpVqUPcHzSMee9Mks8fLjhGLUQ9qFaEVBoGRIVEIub2', 'content');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_brand_id_foreign` (`brand_id`);

--
-- Индексы таблицы `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modification_model_id_foreign` (`model_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_customer_id_foreign` (`customer_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD KEY `orders_order_id_foreign` (`order_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_product_category_id_foreign` (`product_category_id`),
  ADD KEY `product_modification_id_foreign` (`modification_id`),
  ADD KEY `product_product_fabricator_id_foreign` (`product_fabricator_id`),
  ADD KEY `product_product_provider_id_foreign` (`product_provider_id`);

--
-- Индексы таблицы `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_fabricator`
--
ALTER TABLE `product_fabricator`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_option`
--
ALTER TABLE `product_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_option_product_id_foreign` (`product_id`),
  ADD KEY `product_option_product_options_id_foreign` (`product_options_id`),
  ADD KEY `product_option_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_options_spare_part_category_id_foreign` (`product_category_id`),
  ADD KEY `product_options_type_foreign` (`type`);

--
-- Индексы таблицы `product_option_type`
--
ALTER TABLE `product_option_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_provider`
--
ALTER TABLE `product_provider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `model`
--
ALTER TABLE `model`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `modification`
--
ALTER TABLE `modification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `product_fabricator`
--
ALTER TABLE `product_fabricator`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `product_option`
--
ALTER TABLE `product_option`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `product_option_type`
--
ALTER TABLE `product_option_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `product_provider`
--
ALTER TABLE `product_provider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `site`
--
ALTER TABLE `site`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);

--
-- Ограничения внешнего ключа таблицы `modification`
--
ALTER TABLE `modification`
  ADD CONSTRAINT `modification_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`);

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_modification_id_foreign` FOREIGN KEY (`modification_id`) REFERENCES `modification` (`id`),
  ADD CONSTRAINT `product_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`),
  ADD CONSTRAINT `product_product_fabricator_id_foreign` FOREIGN KEY (`product_fabricator_id`) REFERENCES `product_fabricator` (`id`),
  ADD CONSTRAINT `product_product_provider_id_foreign` FOREIGN KEY (`product_provider_id`) REFERENCES `product_provider` (`id`);

--
-- Ограничения внешнего ключа таблицы `product_option`
--
ALTER TABLE `product_option`
  ADD CONSTRAINT `product_option_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`),
  ADD CONSTRAINT `product_option_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_option_product_options_id_foreign` FOREIGN KEY (`product_options_id`) REFERENCES `product_options` (`id`);

--
-- Ограничения внешнего ключа таблицы `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_spare_part_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`),
  ADD CONSTRAINT `product_options_type_foreign` FOREIGN KEY (`type`) REFERENCES `product_option_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
