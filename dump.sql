-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (5,'Ваш беспокойный подросток','Роберт Т.Байярд, Джин Байярд'),(6,'Семья глазами ребенка','Г.Т.Хоментаускас'),(7,'Мы и наша семья','В.Зацепин, В.Цимбалюк'),(8,'Inhabitant of the State','Andrey Platonov');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chapter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(10) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapter`
--

LOCK TABLES `chapter` WRITE;
/*!40000 ALTER TABLE `chapter` DISABLE KEYS */;
INSERT INTO `chapter` VALUES (1,1,'ЛЮБОВЬ ТОРЖЕСТВУЕТ НАД ВРЕМЕНЕМ',7),(2,2,'М. ЛЕРМОНТОВ',7),(3,3,'Ф. ТЮТЧЕВ',7),(7,1,'Практическое руководство для отчаявшихся родителей',5),(8,2,'Предисловие',5),(9,3,'Глава 1 Рассмотрим проблему в перспективе',5),(10,1,'РЕБЕНОК ВОСПИТАТЕЛЬ СЕБЯ',6),(11,2,'ВИДИМ ЛИ МЫ ТО ЖЕ ТАК ЖЕ!',6),(12,3,'ПОЧЕМУ В ОДНОЙ СЕМЬЕ - РАЗНЫЕ ДЕТИ!',6),(13,1,'Platonov Chapter 1',8),(14,2,'Platonov Chapter 2',8),(15,3,'Platonov Chapter 3',8);
/*!40000 ALTER TABLE `chapter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lang`
--

DROP TABLE IF EXISTS `lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lang` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `language` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lang`
--

LOCK TABLES `lang` WRITE;
/*!40000 ALTER TABLE `lang` DISABLE KEYS */;
INSERT INTO `lang` VALUES (1,'ENG');
/*!40000 ALTER TABLE `lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(25) DEFAULT NULL,
  `content` text,
  `chapter_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chapter_id` (`chapter_id`),
  CONSTRAINT `page_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `chapter` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (3,1,'<br>&nbsp; &nbsp; &nbsp; Каждый из  нас время от времени  бывает  слушателем монолога одного из\nвзрослых членов семьи. Основная его тема  звучит  приблизительно так: Почему\nименно в нашей семье растет такой  (далее  следует перечень  преимущественно\nотрицательных  черт характера)  ребенок? Ведь никто из нас -  ни  я, ни отец\n(мать),  ни дедушка  (бабушка)  не  были такими. Наоборот! Мы всегда были  (\nдалее  следует  перечень  преимущественно  положительных  качеств  личности)\nлюдьми. И любили мы его  (ее), и воспитывали как надо... Кто его  (ее) этому\nнаучил?\n<br>&nbsp; &nbsp; &nbsp; Оставим  на  время  в  стороне  наших  воображаемых  персонажей,  столь\nэмоционально   переживающих  свою   родительскую   беспомощность.  Попробуем\nрационально разобраться в ее причинах. Возмущение наших воображаемых, так же\nкак  зачастую  и  реальных,  родителей  черпает   энергию  из  определенных,\nосознаваемых   или    неосознаваемых,   субъективных    установок,   которые\nформулируются следующим  образом:  1)  дети должны быть такими,  как  мы; 2)\nродители полностью ответственны за воспитание детей. Если вдуматься, в обоих\nэтих  мнениях   присутствует  распространенное  и   существенное   искажение\nреальности.\n<br>&nbsp; &nbsp; &nbsp; Разберемся по  порядку. Что  касается первой  родительской позиции,  то\nнадо прежде всего понимать, что  даже очень отличающиеся друг от друга  люди\nценны и полезны  для общества. И  непоседа -  путешественник,  и общительный\nрубаха-парень,   и   задумчивый,   замкнутый  ученый   -   все   они  чем-то\nпривлекательны, чем-то  хороши.  По  крайней  мере,  сами  они наверняка  не\nпоменялись бы  местами. Аналогично отличие ребенка от  вас вовсе не означает\nего  плохости,  так же  как отличие других  людей от  вас не говорит  об  их\nникчемности. Часто  оказывается, что те  особенности личности детей, которые\nволновали родителей (скажем, независимость, настырность), позднее становятся\nглавными их достоинствами.',1),(4,2,'<br>&nbsp; &nbsp; &nbsp; Родители,  заботясь  о  будущем  своих  детей,  хотят,  чтобы они  были\nносителями всего наилучшего,  видят их имеющими все то, что в них самих есть\nхорошего, и без их недостатков. Такое желание понятно и естественно.  Однако\nоно часто приводит к нереальным, завышенным требованиям по отношению к нашим\nдетям и к себе самим как воспитателям.\n<br>&nbsp; &nbsp; &nbsp; Представьте, что вам надо собираться в пожизненное  плавание  на судне.\nЕсли  вы  загрузите судно всем, что есть  в мире хорошего, начиная  с картин\nЛеонардо до  Винчи  и  кончая  золотыми  слитками  Госбанка,  оно просто  не\nостанется на  плаву. И никто  так и  не поступит. Каждый человек  возьмет  с\nсобой необходимое. Уверен, что часть груза составят приятные безделушки. При\nэтом  вы  бы  просто  пренебрегли  мнением  тех  людей, которым  такое  ваше\nповедение  показалось  бы  глупым. Если  позволить  себе  сравнить  личность\nребенка  с судном,  а  ее  содержание -с  грузом,  то  ребенок,  как  и  вы,\nвкладывает в нее разное.  Он  грузит туда то,  что ему кажется  необходимым,\nдорогим.  Как  невозможно для каждого из нас  идеально укомплектовать судно,\nтак невозможно говорить об идеально укомплектованной  личности. Каждый имеет\nсвой  собственный идеал. Главное, чтобы  каждый был доволен  тем, что взял с\nсобой,  и   умел  бы  этим  пользоваться.  Иначе  говоря,  не  всегда  стоит\nбеспокоиться о том, что дети отличаются от нас (они - это не мы!).',1),(5,3,'<br>&nbsp; &nbsp; &nbsp; Теперь о второй позиции. Тоя. что дети не имеют  тех  качеств,  которые\nродители пытались у них воспитать, вовсе не  значит,  что родители  за это в\nполном  ответе.  Кроме  усилий   родителей,  их  воспитательных  воздействий\nдействует  громадное   количество  других  факторов  -   общение  ребенка  с\nвоспитательницей детского  сада и учительницей школы, сверстниками и другими\nвзрослыми и т.д. и т.д. Кроме того, нельзя уповать на то, что только от нас,\nвзрослых,  зависит, какой  личностью  станет  наш  ребенок. Да, влияние мира\nвзрослых  громадное, но  ведь  существует и сам  ребенок, с характерными ему\nвозрастными   особенностями,   специфическим   восприятием   и    творческой\nинтерпретацией окружающего мира. Ребенок не  кусок глины, из которого  можно\nвылепить  все,  что  захочешь  и  сможешь.  Он  человек, способный  ощущать,\nчувствовать,  воспринимать,   рассуждать,  хотеть,  и,   опираясь   на  свой\nуникальный опыт, вырабатывать собственную точку зрения, и  выбирать, как ему\nвести себя.\n<br>&nbsp; &nbsp; &nbsp; Педагогическое  и  психологическое  образование  современного  общества\nвысоко. Родители  знают, что  хорошо  и  плохо  с научной точки  зрения,  их\nразговоры о воспитании детей наполнены научными терминами и аргументами. Это\nпрекрасно. Но они, как, впрочем, и некоторые педагоги,  в  подобных  беседах\nчасто забывают, что разговор идет о живом, мыслящем и чувствующем ребенке, а\nне о дрессировке  персидского кота... Однако  этот существенный недостаток в\nоценке происходящего не мешает  возникновению потока советов  по  воспитанию\nдетей  знатоков родителям.  Эти  советы  варьируют от научно  обосновываемых\nрекомендаций  до  стопроцентных воспитательных средств,  которые вы слышите,\nпроходя с ребенком от бабушки, сидящей на скамейке.',1),(9,1,'Lorem ipsum page 1... Lorem ipsum page 1... Lorem ipsum page 1... ',13),(10,2,'Lorem ipsum page 2... Lorem ipsum page 2... Lorem ipsum page 2... ',13),(11,3,'Lorem ipsum page 3... Lorem ipsum page 3... Lorem ipsum page 3... ',13),(15,1,'Lorem ipsum page 1 Chapter 2... Lorem ipsum page 1 Chapter 2... ',14),(16,2,'Lorem ipsum page 2 Chapter 2... Lorem ipsum page 2 Chapter 2... ',14),(17,3,'Lorem ipsum page 3 Chapter 2... Lorem ipsum page 3 Chapter 2... ',14);
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-20  0:34:33
