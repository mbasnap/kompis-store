BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS `user` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`family`	TEXT,
	`name`	TEXT,
	`sername`	TEXT,
	`address_id`	INTEGER
);
INSERT INTO `user` VALUES (1,'kompis',NULL,NULL,NULL);
CREATE TABLE IF NOT EXISTS `post` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`name`	TEXT UNIQUE,
	`content`	TEXT
);
INSERT INTO `post` VALUES (1,'restoration','    <h1 >Обслуживание</h1>
            <p> <img alt="ТДС" src="/static/img/tdc_logo.jpg"
                style="width: 340px; height: 220px; float: right; margin-left: 5px; margin-right: 5px;">
            </p>
            <p>
                В мире нет ничего вечного и это всем известно.
                Вечный двигатель еще не изобретен, но давно уже известны секреты,
                как можно продлить ресурс и длительность работы узлов и агрегатов любой техники.
                Ответ очень прост: нужно своевременно проводить техническое обслуживание техники.
            </p>
            <p>
                Каждый клиент сам решает, как проводить техническое обслуживание - экономить ли
                на нем и делать все самому, или нанять специально подготовленных специалистов для выполнения
                всего спектра работ. Проведение технического обслуживания погрузчика и другой
                техники – не просто смена масла и фильтров. Техническое обслуживание
                    – это целый список работ, необходимых для выполнения через равные промежутки времени.
                    Ведь даже банально пропущенный болт во время проведения технического обслуживания может
                    стать причиной серьезной поломки. Экономия в 100 гривен может превратиться в дорогостоящий
                    ремонт двигателя, коробки передач, гидравлических насосов.
            </p>
            <p>
                Можно привести простой пример. Те, кто имеет свой легковой автомобиль,
                всегда проводят техническое обслуживание вовремя и в полном объеме согласно инструкции по
                эксплуатации. Возникает вопрос - почему же, когда дело доходит до техники, которая
                зарабатывает деньги, хозяева техники пытаются сэкономить?
            </p>
            <p>
                Доказано опытом, что экономия получается тогда, когда техника работает дольше,
                а не когда стоит на ремонте. В момент ремонта техники хозяин теряет вдвойне – платит за ремонт
                и одновременно теряет деньги от простоя.
            </p>
            <h2>ТДС УкрСпецтехника предлагает свои услуги</h2>
            <p>
                ТДС УкрСпецтехника предлагает свои услуги по техническому обслуживанию 
                погрузчиков, грейдеров, экскаваторов и другой строительной техники.&nbsp;
                <span style="line-height: 1.6em;">
                    Компания является официальным представителем в Украине 
                    торговых марок Andoria, SDLG, Wheichai Power, Lon King и обладает огромным опытом 
                    обслуживания европейской техники марок CAT, JCB, HSW, Dressta, Atlas, CASE; 
                    китайской техники SEM, SDLG, XCMG, Long Gong, Foton, Cheng Gong, Lon King, TOTA; 
                    белорусской техники Амкодор ТО-18Б, 332, 342, 333Б, 352, ТО-28.
                </span>
            </p>
            <p>
                Свой автопарк сервисных автомобилей позволяет нам в кратчайшие сроки выехать в
                любую точку Украины для выполнения технического обслуживания погрузчика и другой техники.
                В машине есть все инструменты, диагностическое оборудование, специнструмент для технического 
                обслуживания.
            </p>
            <p>
                ТДС УкрСпецтехника поможет Вам оперативно и качественно решить вопросы по 
                техническому обслуживанию погрузчиков, экскаваторов, грейдеров и продлить срок службы техники.
                Наш клиент может в любое время обратиться к нам за помощью, для Вас мы работаем круглосуточно.
            </p>
            <p><img src="/static/img/watermarked.jpg"  style="height: 467px; width: 700px;">
            </p>
            <p>
                <a name="video">
                    <iframe allowfullscreen="allowfullscreen" frameborder="0" height="315"
                        src="https://www.youtube.com/embed/GaVL9ujddjk" width="700">
                    </iframe>
                </a>
            </p>
</div>');
INSERT INTO `post` VALUES (2,'test','sssss');
CREATE TABLE IF NOT EXISTS `phone` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`type`	TEXT NOT NULL,
	`kod`	TEXT NOT NULL,
	`number`	TEXT NOT NULL,
	`user_id`	INTEGER
);
INSERT INTO `phone` VALUES (1,'vodaphone','+38(095)','624 81 82',1);
INSERT INTO `phone` VALUES (2,'vodaphone','+38(095)','624 81 83',1);
CREATE TABLE IF NOT EXISTS `mainMenu` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`name`	TEXT NOT NULL,
	`path`	TEXT NOT NULL,
	`positionIndex`	INTEGER
);
INSERT INTO `mainMenu` VALUES (1,'Ремонт спецтехники','/mending',1);
INSERT INTO `mainMenu` VALUES (2,'Восстановление отверстий','/restoration',2);
INSERT INTO `mainMenu` VALUES (3,'Запчасти','/spares',3);
INSERT INTO `mainMenu` VALUES (4,'Контакты','/contacts',4);
CREATE TABLE IF NOT EXISTS `mail` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`mail`	TEXT NOT NULL,
	`user_id`	INTEGER
);
INSERT INTO `mail` VALUES (1,'mbasnap@yandex.ua',NULL);
CREATE TABLE IF NOT EXISTS `company` (
	`name`	TEXT NOT NULL UNIQUE,
	`value`	TEXT
);
INSERT INTO `company` VALUES ('name','Kompis');
INSERT INTO `company` VALUES ('address_id','1');
INSERT INTO `company` VALUES ('phone_id','1');
INSERT INTO `company` VALUES ('mail_id','1');
CREATE TABLE IF NOT EXISTS `address` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`country`	TEXT,
	`province`	TEXT,
	`city`	TEXT,
	`street`	TEXT,
	`home`	TEXT,
	`flat`	TEXT
);
INSERT INTO `address` VALUES (1,'Ukrain','Donetska','Mariupol','Fontanna','4',NULL);
COMMIT;
