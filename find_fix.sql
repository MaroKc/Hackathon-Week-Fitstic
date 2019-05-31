-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Mag 31, 2019 alle 12:46
-- Versione del server: 5.7.16-log
-- Versione PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `find_fix`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ricerche`
--

DROP TABLE IF EXISTS `ricerche`;
CREATE TABLE IF NOT EXISTS `ricerche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titolo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `testo` text COLLATE utf8_bin NOT NULL,
  `parole` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `ricerche`
--

INSERT INTO `ricerche` (`id`, `data`, `titolo`, `testo`, `parole`) VALUES
(1, '2019-05-31 08:43:40', 'Lo Spread sfiora 290, Piazza Affari maglia nera ', '                     Lo spread tra Btp e Bund chiude a 284 punti base, in lieve rialzo rispetto ai 282 punti della chiusura di ieri, dopo aver sfiorato quota 290 (a 289) nei primi scambi della seduta per le tensioni tra Roma e Bruxelles sui conti pubblici. Il rendimento del titolo a 10 anni del Tesoro è pari al 2,68%.Si confermano in calo, a parte Londra (+0,11%), le principali borse europee in attesa dell''avvio degli scambi a Wall Street, ieri chiusa per festività, i cui futures sono in calo. Milano (Ftse Mib -0,88%) è la peggiore, preceduta da Madrid (-0,43%), Parigi (-0,34%) e Francoforte (-0,23%). Meglio delle stime la fiducia economica nell''Ue, in maggio, diffusa all''indomani dell''esito delle elezioni. Dagli Usa invece sono in arrivo i prezzi delle case e l''indice manifatturiero della Fed di Dallas. Segno meno per i bancari Fineco (-2,93%) e Unicredit (-1,88%), appesantiti dallo spread a 286 punti e dalla possibile procedura d''infrazione nei confronti dell''Italia da parte dell''Ue. Giù anche SocGen (-1,91%), Commerzbank (-1,33%) e Lloyds (-1,21%). Il prezzo del greggio (Wti +0,67%) favorisce Saipem (+1,28%), Tullow Oil (+0,92%) e Bp (+0,35%). Brilla il comparto auto sulla scia del progetto di fusione tra Fca (+0,82%) e Renault (+1,82%), con Peugeot (+3,5%), interessata a Jaguar-Land Rover, nelle mani di Tata. "Avrò uno scambio di vedute con il governo italiano su misure aggiuntive che potrebbero essere richieste per essere in linea con le regole" ma "non prediligo le sanzioni", ha detto il commissario europeo agli Affari economici e monetari, Pierre Moscovici, durante una discorso pronunciato vicino Lisbona e riportato dall''agenzia Bloomberg. "E'' abbastanza probabile che avremo uno scambio di lettere", ha detto Moscovici. "Una cosa dev''essere chiara: se un paese, ad un certo punto, è totalmente fuori dalle regole, non compatibile con le regole, le sanzioni ci sono". L''avvertimento, a proposito dei conti pubblici italiani, arriva dal Commissario europeo agli Affari economici Pierre Moscovici. Che parlando a Lisbona - secondo quanto riportato dalla Bloomberg - ha anticipato un carteggio con il governo italiano "su misure aggiuntive che potrebbero essere richieste". Moscovici ha aggiunto che le sanzioni "sono principalmente dissuasive, ma possono essere anche persuasive. Cerchiamo di evitarlo". "Oggi lo spread è salito fino a 290 punti base. È un anno che a causa delle scelte economiche sbagliate di questo Governo, è rimasto inchiodato su livelli doppi rispetto a quelli di inizio 2018: il costo totale ha già superato i 17 miliari di euro, un costo che pagheranno tutti gli italiani. Con l''attuale governo, lo Stato italiano ha emesso titoli di Stato, per lo più bot e btp, obbligandosi a pagare 17 miliardi di interessi in più rispetto agli interessi che avremmo pagato con il governo Gentiloni. Un costo enorme per l''Italia. Tutto questo vuol dire più tasse o meno servizi. Bisogna voltare pagina per recuperare credibilità e fiducia. Dobbiamo far partire una nuova fase di sviluppo coniugando l''equità e la giustizia sociale. Ecco il nostro compito, ora idee e un Piano per l''Italia. Al lavoro per costruire l''alternativa". Così il segretario Pd Nicola Zingaretti in una nota."I mercati non abboccano e lo #spread vola a 290 ma ai sovranisti di casa nostra poco importa - ha scritto su twitter Alessia Rotta, vicepresidente vicaria dei deputati del Partito Democratico -. Vogliono sfasciare tutto e oggi si sentono legittimati a farlo dal voto popolare. Non hanno alleati in Europa per cambiare le regole e minacciano scelte suicide. Saranno mesi difficili". "Ci si abitua a tutto. Però ci stiamo abituando ad un livello di spread che non è sano per la nostra economia nel lungo periodo quindi non bisogna abituarsi", ha detto l''ad di Unipol, Carlo Cimbri circa lo spread. "E non va bene - ha aggiunto - perché non è dovuto ai fondamentali dell’economia italiana ma è anche dovuto al rischio che i mercati vedono circa la stabilità. Quindi bisogna modificare e correggere la percezione che i mercati hanno nei nostri confronti. Tra le cose che bisogna fare c’è sostenere la nostra economia, ridurre il debito ed essere credibili sui mercati internazionali". Cimbri ha poi sostenuto che il volatility adjustement "credo scatterà si questi livelli di spread ma il meccanismo è in corso di revisione. Siamo fiduciosi che possa essere adattato e diventare più lineare nella sua applicazione e meno a strappi". TITLE La responsabilit&agrave; editoriale e i contenuti di cui al presente comunicato stampa sono a cura di Business Wire Pagine Sì! SpA Pagine Sì! SpA IMG SOLUTION SRL news aktuell IMG SOLUTION SRL ', '{"0":{"text":"spread","count":6},"1":{"text":"governo","count":5},"2":{"text":"regole","count":4},"3":{"text":"punti","count":4},"4":{"text":"bisogna","count":4},"5":{"text":"moscovici","count":4},"6":{"text":"mercati","count":4},"7":{"text":290,"count":3},"8":{"text":"costo","count":3},"9":{"text":"rispetto","count":3},"10":{"text":"italiano","count":3},"11":{"text":"sanzioni","count":3},"12":{"text":"commissario","count":2},"13":{"text":"bloomberg","count":2},"14":{"text":"europeo","count":2}}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
