-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 01:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feacore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'feapitsat.core@gmail.com', '$2y$10$.wf6Awlwk7iuPLYMEL2sduSpEmXQAXuxfGC.PQdCC.KpzjAzM9G8.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `email`, `message`) VALUES
(45, 'sevilla.francis@feapitsat.com', '&quot;Your course recommender is brilliant—tailored, user-friendly, and enriching! Kudos to your team!&quot;\r\n'),
(46, 'merliah@feapitsat.com', 'Impressive!'),
(47, 'jhon@feapitsat.com', '&quot;Smart, helpful, and easy-to-use your course suggestions rock! Great job!&quot;'),
(49, 'fea@feapitsat.com', '123\r\n'),
(50, 'fe@feapitsat.com', '1213'),
(51, 'fea@feapitsat.com', '123'),
(52, 'fea@feapitsat.com', '123'),
(53, 'fea@feapitsat.com', '123'),
(54, 'fea@feapitsat.com', '123'),
(55, 'fea@feapitsat.com', '123'),
(56, '123@feapitsat.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` bigint(8) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `strand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `description`, `strand`) VALUES
(11813867, 'Bachelor of Science in Computer Engineering', 'The Bachelor of Science in Computer Engineering (BS CpE) is a five-year program that is a combination of electrical engineering and computer science. The curriculum provides students with a foundation in basic science, mathematics, software, and engineering. It covers topics on how to design a microprocessor and develop embedded systems that are used in desktops or handheld devices. The program also equips students with the ability to analyze, plan, design, install, operate and maintain digital devices, computer hardware, and software systems. \r\n\r\nStudents who wish to pursue a degree in Computer Engineering are encouraged to take the Information and Communication Technology strand. The strand equips students with basic topics on illustration, web design, animation, technical drafting, and computer programming.\r\nGraduates of Computer Engineering may pursue a career path in various development and manufacturing companies or government agencies that needs specialized Computer Engineering services. They may apply for roles such as a software developer, test engineers, computer programmer, support specialist, robotics control systems engineer, electrical designer, quality assurance manager, and systems analyst.\r\n\r\nSource: finduniversity.ph', 'STEM'),
(15144175, 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'The Bachelor of Industrial Technology major in Electrical Technology is designed to prepare students for entry level employment in the repair, installation, and maintenance of residential, commercial and industrial electrical systems. This curriculum will blend both academic and major shop subjects parallel to the latest industry requirement. Students will develop the skills necessary for employment in many industrial manufacturing settings. Students will learn the Electrical Safety and Health Practices, Philippine Electrical Code (PEC), blueprint reading, electrical wiring, circuitry, basic pneumatic, electro pneumatic, Programmable Logic Controls, Computer Aided Design, power systems, solid state fundamentals, motor controls, transformers, and troubleshooting.\r\n\r\nSource: www.isatu.edu.ph', 'STEM'),
(20372537, 'Bachelor of Science in Information Technology', 'The Bachelor of Science in Information Technology (BS IT) is a four-year degree program that equips students with the basic ability to conceptualize, design and implement software applications. It prepares students to be IT professionals who are able to perform installation, operation, development, maintenance, and administration of computer applications. The goal of the program is to produce information technologists who can assist individuals and organizations in solving problems using information technology techniques and processes. \r\nStudents who wish to pursue a degree in BS in Information Technology are encouraged to take the Information and Communication Technology strand. The strand equips students with basic topics on illustration, web design, animation, technical drafting, and computer programming.\r\nGraduates of BS in Information Technology may pursue a career path in IT firms and corporations, any government or private institutions. They may apply as an applications developer, database administrator, technical support specialist, test engineer, web administrator, web developer, network administrator, information technology, information security administrator, network engineer, and systems analyst.\r\n\r\nSource: finduniversity.ph', 'STEM'),
(20606457, 'Bachelor of Science in Business Administration major in Marketing Management', 'The Bachelor of Science in Business Administration Major in Marketing Management (BSBA- Marketing Management) is a four-year business program in the Philippines that will prepare you for a Marketing career in various organizations and businesses.\r\nBy enrolling in this program, you will learn how to identify business opportunities, assess their strengths and weaknesses, and devise plans that will help you make more profits while controlling your possible losses at the same time. You will also be taught how to create, introduce, and promote your own products using various tools and techniques ranging from the traditional to the more technologically advanced ones.\r\nIn addition to those, you will also be trained to make critical business decisions by examining how other companies manage their operations and using what you\'ve learned from observation to solve complex problems with social, financial, and legal implications.\r\n\r\nSource: www.courses.com.ph', 'ABM'),
(25510861, 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'The Bachelor of Industrial Technology Major in Mechanical Technology provides the knowledge, skills and attitudes in the various \r\nmachining process that can be applied on their on-the-job training and on their future careers. It encompasses measurements, metallurgy \r\nand heat treatment, welding drive components, repair and maintenance, pipelifting, lubrication and principle of tool and die. Likewise, \r\npneumatics and hydraulics, CNC, inspection and quality control are also vital elements of the curriculum.\r\n\r\nSource: batstate-u.edu.ph', 'STEM'),
(25980969, 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'The Bachelor of Industrial Technology major in Automotive Technology program is designed to prepare students with the basic knowledge and skills necessary for a modern state of the art automotive workers. The increasing sophistication of Automotive Technology now requires workers who can use computerized shop equipment and work with electronic components while maintaining their skills with traditional hand tools. Automotive service technicians as vehicle components and Systems become increasingly sophisticated. Motorcycle Mechanics repair and overhaul motorcycle. Besides, repairing engines, they may work on clutches transmissions, brakes, drivelines, differential cycles, tires, power Steering system, auto electricity and electronics, ignition system and make minor body repairs.\r\n\r\n\r\nSource: batstate-u.edu.ph', 'STEM'),
(30107388, 'Bachelor of Science in Tourism Management', 'The Bachelor of Science in Tourism Management is a four-year degree program for people who want to have a career in the field of Tourism and Event Management. This course leads to expertise in the management of tour-operating agencies, as well as other jobs in the tourism and hospitality sector. The curriculum also includes operational competencies, event management classes, investment, and market study. \r\nStudents who want to pursue a degree in Tourism Management are encouraged to take the Home Economics strand under the Technical-Vocational and Livelihood (TVL) track. The strand covers interesting topics like beauty and wellness, cooking, fashion designing, tourism, hospitality, and handicrafts. These topics are helpful to incoming college students as it teaches the basics of their degree program.\r\nCareer Opportunities\r\n\r\nGraduates of BS in Tourism Management may pursue a career path in travel agencies, travel ticketing offices, event organizing companies, and the Department of Tourism. They may apply as a tour escort, tour agency clerk, hotel and resort personnel, tour agent, government tourism staff, event coordinator, flight attendant, travel writer, and a tourism researcher.\r\n\r\nSource: finduniversity.ph', 'ABM'),
(30182299, 'Bachelor of Science in Accountancy', 'The Bachelor of Science in Accountancy (BSA) program is a five-year program focused on subjects in financial, public, and managerial accounting, auditing, administration, business laws, and taxation. The program also teaches students to integrate information technology concepts into business systems, to create a more systematic and organized way of storing business-related data. Aside from business topics, BSA also equips students with a basic understanding of computer programming and auditing systems.\r\n\r\nStudents who want to pursue a degree in BS in Accountancy are encouraged to take the Accountancy, Business and Management strand. This strand provides the basic concepts of business and financial management, and corporate operations that will be helpful for college. \r\n\r\nGraduates of BS in Accountancy may pursue a career path in various corporate and auditing companies. They may for roles such as an accounting associate, audit staff, financial accounting and reporting staff, state accounting examiner, state accountant, and budget analyst.\r\n\r\nSource: finduniversity.ph\r\n', 'ABM'),
(30720286, 'Bachelor of Elementary Education', 'The Bachelor of Elementary Education (BEED) is a four-year degree program designed to prepare students to become primary school teachers. The program combines both theory and practice in order to teach students the necessary knowledge and skills a primary school teacher needs. The program aims to produce competent teachers specializing in the pedagogical approach of education. \r\n\r\nStudents who want to pursue a degree in Elementary Education are encouraged to take the Humanities and Social Sciences (HUMSS) strand under the Academic track. The curriculum focuses on human behavior, literature, education, politics, liberal arts, and society. The HUMSS strand will cover relevant topics that may be further discussed in their college lectures. \r\n\r\nGraduates of Bachelor of Elementary Education may pursue a career path in any educational institutions. They could apply as a preschool teacher, teaching assistant, private tutor, or subject teacher. \r\n\r\nSource: finduniversity.ph', 'HUMSS'),
(36147676, 'Bachelor of Science in Applied Mathematics', 'The Bachelor of Science in Applied Mathematics program is a 4-year undergraduate degree program that provides graduates with the ability to identify, formulate, model, and analyze real-world problems and find their solutions using operations research techniques, geospatial tools, and statistical methods. It also provides competencies in the decision-making analysis, optimization, mathematical modeling and simulation, and the ability to implement and develop computer programs to facilitate complex computations.\r\n\r\nSource: dmpcs.upmin.edu.ph', 'STEM'),
(46030450, 'Bachelor Of Science in Office Administration', 'The Bachelor of Science in Office Administration (BSOA) is a four-year degree program designed to provide students with knowledge and skills in business and office management needed in various workplaces such as general business, legal, or medical offices. The program prepares students to be able to handle clerical, administrative, supervisory and managerial tasks. \r\n\r\nStudents who want to pursue a degree in Office Administration are encouraged to take the Accountancy, Business, and Management (ABM) strand. This strand provides the basic concepts of business and financial management, and corporate operations which will be helpful in their college journey.\r\n\r\nHowever, students may also opt to take the General Academic Strand (GAS) if they prefer a wider range of topics. The GAS strand has a flexible curriculum where students can learn from the electives of all the other academic strands. \r\n\r\nGraduates of BS in Office Administration may pursue a career path in various legal or medical companies. They may apply for roles such as a medical secretary, legal secretary, court stenographer, administrative staff, customer service representative, encoder, or bookkeeper.\r\n\r\nSource: finduniversity.ph', 'ABM'),
(46345095, 'Bachelor of Secondary Education', 'Bachelor of Secondary Education (BSED) is a four year degree program designed to prepare students for becoming high school teachers. The program combines both theory and practice in order to teach students the necessary knowledge and skills a high school teacher needs. The program aims to produce competent teachers who provide a conducive learning experience to their students. \r\n\r\nStudents who want to pursue a degree in Secondary Education are encouraged to take the Humanities and Social Sciences strand under the Academic track. The curriculum focuses on human behavior, literature, education, politics, liberal arts, and society. The HUMSS strand will cover relevant topics that may be further discussed in their college lectures. \r\n\r\nGraduates of Bachelor of Secondary Education may pursue a career path in any educational institution. They could apply as a teaching assistant, private tutor, subject teacher, high school teacher, or English as a Second Language (ESL) Teacher.\r\n\r\nSource: finduniversity.ph', 'HUMSS'),
(49393175, 'Bachelor of Science in Electrical Engineering', 'The Bachelor of Science in Electrical Engineering is a five-year degree program that focuses on conceptualizing, developing, and designing a safe, economical, and ethical utilization of electrical energy. The program also trains students to effectively develop and test real-life applications of electrical circuitry, digital systems, electrical equipment, and machinery control.\r\n\r\nStudents who want to pursue a degree in Electrical Engineering are encouraged to take the Science, Technology, Engineering, and Mathematics (STEM) strand under the Academic Track. They will learn topics relevant that to their degree that will be useful in their college life.\r\n\r\nGraduates of Electrical Engineering may pursue a career path in various development and manufacturing companies or government agencies that needs specialized Electrical Engineering services. They may apply for roles such as technical support engineer, electrical installer, electrical field service engineer, junior programmer, electrical engineer, computer systems engineer, electrical technician, and engineering Technician.\r\n\r\nSource: finduniversity.ph', 'STEM'),
(52237458, 'Bachelor of Arts in Philosophy', 'The Bachelor of Arts in Philosophy is a four-year degree program that provides students with an understanding of different philosophical theories regarding human nature, society, civilization, culture, and religion. The program teaches students how to analyze philosophical arguments and texts, construct good arguments and present arguments in a logical way. It also has special emphasis on Philippine culture, arts, politics, and folkways.\r\n\r\nStudents who want to pursue a degree in AB in Philosophy are encouraged to take the Humanities and Social Sciences (HUMSS) strand under the Academic track. The curriculum focuses on human behavior, literature, education, politics, liberal arts, and society. The HUMSS strand will cover relevant topics that may be further discussed in their college lectures. \r\n\r\nGraduates of AB in Philosophy may pursue a career path as a philosophy professor or lecturer at a higher education institute. \r\n\r\nSource: finduniversity.ph', 'HUMSS'),
(55994242, 'Bachelor Of Science in Social Work ', 'The Bachelor of Science in Social Work is a four-year degree program designed to provide students with the knowledge and skills in social work practice, social welfare policies, and human welfare. It helps students understand the different units of society, such as families and communities, the problems and issues that surround them and the possible solutions that can empower and improve their way of living. The program aims to educate students on how to deal with different groups or individuals, including people who have disabilities, mental illnesses, criminal backgrounds, and addictions.\r\n\r\nStudents who want to pursue a degree in Social Work are encouraged to take the Humanities and Social Sciences (HUMSS) strand under the Academic track. The curriculum focuses on human behavior, literature, education, politics, liberal arts, and society. The HUMSS strand will cover relevant topics that may be further discussed in their college lectures. \r\n\r\nGraduates of BS in Social Work may pursue a career path in school settings, child welfare agencies, mental health clinics, settlement houses, community development corporations, or privately owned companies. They may apply as a family social worker, school social worker, community development officer, child welfare social worker, public health social worker, mental health social worker, social planner, or a social researcher.\r\n\r\nSource: finduniversity.ph', 'HUMSS'),
(58619650, 'Bachelor of Science in Computer Science', 'The BS in Computer Science is a four-year degree program that focuses on the study of computer algorithms and its implementation through computer software and hardware. It also equips students with proficiency in designing, writing, and developing computer programs and computer networks, as well as intricacies of software applications, data processing, web development, programming, and computer architecture.\r\n\r\nStudents who wish to pursue a degree in BS in Computer Science are encouraged to take the Information and Communication Technology strand. The strand equips students with basic topics on illustration, web design, animation, technical drafting, and computer programming.\r\n\r\nGraduates of BS in Computer Science may pursue a career path in IT firms and corporations, any government or private institutions. They may apply as a computer support specialist, computer hardware troubleshooter, software tester, computer programmer, web developer, mobile web developer, computer data encoder, database programmer, software developer, and computer professor. \r\n\r\nSource: finduniversity.ph', 'STEM'),
(61679300, 'Bachelor of Arts in Sociology', 'The Bachelor of Arts in Sociology is a four-year degree program that aims to equip students with sociological perspectives and skills necessary for understanding social issues and problems. It also teaches students how to explain and analyze the development of society and culture as well as human interactions based on historical context. The AB Sociology program provides a strong foundation on the theories and concepts of social processes, belief systems, human society, culture, and social interactions.\r\n\r\nStudents who want to pursue a degree in AB in Sociology are encouraged to take the Humanities and Social Sciences (HUMSS) strand under the Academic track. The curriculum focuses on human behavior, literature, education, politics, liberal arts, and society. The HUMSS strand will cover relevant topics that may be further discussed in their college lectures. \r\n\r\nGraduates of AB in Sociology may pursue a career path in universities, government organizations, non-profit organizations, and research institutions. They may apply as a community worker, child welfare officer, human services worker, social science research assistant, social science teacher, human resource officer, social planner, social research, community development officer, or a foster care worker.\r\n\r\nSource: finduniversity.ph', 'HUMSS'),
(70232079, 'Bachelor of Science in Psychology', 'The Bachelor of Science in Psychology (BS Psych) is a four-year program designed to help you observe human behavior through the scientific method, allowing you to gain access to the human psyche and fathom its depths. You will gain the knowledge, tools, and skills needed to assess and conduct empirical research regarding individual and group behavior through the lens of various psychological theories and concepts. The BS in Psychology degree prepares you for general careers in teaching, research, counseling and human resources. It can also be a foundation for further studies in the fields of Medicine, Guidance and Counseling, Human Resource Development and Law.\r\n\r\nStudents who want to pursue a degree in BS in Psychology are encouraged to take the Humanities and Social Sciences (HUMSS) strand under the Academic track. The curriculum focuses on human behavior, literature, education, politics, liberal arts, and society. The HUMSS strand will cover relevant topics that may be further discussed in their college lectures. \r\n\r\n\r\nGraduates of BS in Psychology may pursue a career path in the human resource department, educational and research institutions, and clinical facilities.  They may apply a human resource associate, training and program associate, community and program developer, rehabilitation specialist, researcher, or an academician.\r\n\r\nSource: finduniversity.ph', 'STEM'),
(72665047, 'Bachelor of Arts in Political Science', 'The Bachelor of Arts in Political Science (AB PolSci) is a four-year degree program that centers on the study of the types of government, the history and forms of political institutions, political behavior, and political policies. It covers important areas of study including Philippine Politics, Comparative Politics, International Relations, Political Theory and Methodology, Public Administration, Political Dynamics, Local and Global Governance, and Research in Politics. \r\n\r\nStudents who want to pursue a degree in AB in Political Science are encouraged to take the Humanities and Social Sciences (HUMSS) strand under the Academic track. The curriculum focuses on human behavior, literature, education, politics, liberal arts, and society. The HUMSS strand will cover relevant topics that may be further discussed in their college lectures. \r\n\r\nGraduates of AB in Political Science may pursue a career path in government offices, non-government organizations, or private businesses. They may apply as a paralegal, public opinion researcher, corporate adviser for government relations, political consultant, or a professor. \r\n\r\nSource: finduniversity.ph', 'HUMSS'),
(73664903, 'Bachelor of Science in Hospitality Management ', 'The Bachelor of Science in Hospitality Management (BSHM) is a four-year degree program that covers the process of conception, planning, development, human resource and management of the different aspects of the hotel, restaurant, and resort operations. The program provides students with technical skills, as well as knowledge in marketing, finance, budgeting, staffing and other fields of business. The program also aims to teach entrepreneurship skills. \r\n\r\nStudents who want to pursue a degree in Hospitality Management are encouraged to take the Home Economics strand under the Technical-Vocational and Livelihood (TVL) track. The strand covers interesting topics like beauty and wellness, cooking, fashion designing, tourism, hospitality, and handicrafts. These topics are helpful to incoming college students as it teaches the basics of their degree program.\r\n\r\nGraduates of BS in Hospitality Management may pursue a career path in hotel, resort, events management companies, and travel and tour companies or agencies. They may apply as a front office desk clerk, travel agency staff, kitchen staff, housekeeping staff, cruise ship staff, waiter, or an accommodation assistant.\r\n\r\nSource: finduniversity.ph', 'ABM'),
(74462627, 'Bachelor of Science in Accounting Information System', 'The Bachelor of Science in Accounting Information System (BSAIS) is a Four-year program that equips the students with cutting edge skills in accounting and management information systems needed for the evolving business environment.\r\n\r\n\r\nAccounting Information System combines knowledge in business, accounting, and computer systems. It involves partnering with management operations and decision-making, by coordinating the information technology activities, providing expertise in choosing the best software or designing and maintaining the over-all information system, assessing the integrity of systems, assessing the inefficiencies of a company’s system and recommending improvements to assist management in the formulation and implementation of an organization’s strategy. \r\n\r\nSource: iciap.edu.ph', 'ABM'),
(76561386, 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'The Bachelor of Industrial Technology Major in Welding and Fabrication Technology deals with fundamental principles of welding \r\nprocess in metal working industry. It provides knowledge skills and attitudes in various welding processes that can be used in their on the-job training and on their future careers. It also includes technical knowledge and techniques of joining various types of metal.\r\n\r\nSource: batstate-u.edu.ph', 'STEM'),
(78360797, 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'The program in Bachelor if Industrial Technology Major in Drafting Technology provides knowledge in the construction of different\r\nworking drawings that help improve the skills in drawing. Knowledge in graphic communication is an important factor of the course. This course includes the basic and advanced technical drawings, floor planning, architectural and structural drawings, architectural\r\nmodeling and estimating. This course also contains computer-aided design concept and applications.\r\n\r\nSource: www.batstate-u.edu.ph', 'STEM'),
(83227296, 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'The Electronics Technology program prepares graduates for employment in a wide variety of industries producing and/or using \r\nelectrical and electronic equipment. The program provides a thorough understanding of digital electronics, circuit analysis, electronic \r\ndevices, machine controls, programmable logic controllers and industrial electronics. This course also includes theoretical analysis, \r\nsoftware simulation and hands-on applications.\r\n\r\nSource: www.batstate-u.edu.ph', 'STEM'),
(85297219, 'Bachelor of Science in Culinary Management', 'This specialist degree marries the practical and technical aspects of working in a commercial kitchen with the business and management skills of a culinary manager, the Bachelor of Culinary Management not only teaches you the fundamentals of cookery but asks you to think deeply about the business of being a creative culinary entrepreneur.\r\n\r\nThis four-year degree combines experiential learning and academic rigor to equip you with a broad, critical understanding of the role of the culinary manager. Bringing together the theoretical and practical dimensions of the kitchen, extensive applied skills including classic cooking techniques, food service and menu design are explored and sharpened.\r\n\r\nSource: www.angliss.edu.au', 'ABM'),
(85480216, 'BSBA major in Human Resource Development Management', 'The Bachelor of Science in Business Administration major in Human Resource Development Management is a four-year college course that incorporates employment-related issues with business management. The program provides students with knowledge and abilities in workforce organization, job analysis, recruitment, compensation, personnel training, legal provisions, and other labor concerns. The BSBA in Human Resource Development Management also covers topics such as principles and theories of employment, personnel training and skills development and other systems or procedures in managing people in an organization. \r\n\r\nStudents who want to pursue a degree in Business Administration are encouraged to take the Accountancy, Business and Management strand. This strand provides the basic concepts of business and financial management, and corporate operations that will be helpful for college. \r\n\r\nGraduates of BSBA in Human Resource Development may pursue a career path in various corporate and business companies. They may apply for roles such as recruitment trainee, human resource associate, employment engagement coordinator, training and development officer, and compensation and benefits development officer.\r\n\r\nSource: finduniversity', 'ABM'),
(89144032, 'Bachelor of Science in Criminology', 'The Bachelor of Science in Criminology or Criminal Justice is a four-year degree program intended for individuals who wish to have a career in the fields of law enforcement, security administration, crime detection, and prevention of correctional administration. The program teaches students the various theories, policies, practices, and laws associated with criminal behavior and the methods applied to manage deviant activities. \r\n\r\nStudents who want to pursue a degree in BS in Criminology are encouraged to take the Humanities and Social Sciences (HUMSS) strand under the Academic track. The curriculum focuses on human behavior, literature, education, politics, liberal arts, and society. The HUMSS strand will cover relevant topics that may be further discussed in their college lectures. \r\n\r\nGraduates of BS in Criminology may pursue a career path in university settings, research institutions, prison facilities, or law enforcement agencies. They may apply as a police patrol officer, forensic photographer, court peace offer, discipline officer, or an investigator.\r\n\r\nSource: finduniversity.ph', 'HUMSS'),
(96591266, 'Bachelor of Arts in Psychology', 'The Bachelor of Arts in Psychology (AB PSY) is a four-year degree program that helps students understand human behavior and different thinking processes through the use of basic scientific principles and psychological theories. It equips students with the knowledge and skills to assess and conduct empirical research regarding individual and group behavior by integrating subjects in personality, human development, and psychological testing.\r\nStudents who want to pursue a degree in AB in Psychology are encouraged to take the Humanities and Social Sciences (HUMSS) strand under the Academic track. The curriculum focuses on human behavior, literature, education, politics, liberal arts, and society. The HUMSS strand will cover relevant topics that may be further discussed in their college lectures. \r\nGraduates of BS in Psychology may pursue a career path in human resource department and educational and research institutions. They may apply as a school counselor, vocational counselor, rehabilitation counselor, marriage, couple, and family counselor, substance abuse counselor, human resource associate, researcher, or a psychometrician.\r\n\r\nSource: finduniversity.ph\r\n', 'HUMSS'),
(96985868, 'BSBA major in Financial Management', 'The Bachelor of Science in Business Administration major in Financial Management is a four-year program recommended for people who plan to pursue a career in Banking and Finance Industry. The program aims to help students acquire analytical skills, perception, and competencies necessary for sound financial decision making in the business world. It focuses on financial analysis, economics, investment strategies, management systems, banking, and commercial planning. \r\n\r\nStudents who want to pursue a degree in BSBA in Financial Management are encouraged to take the Accountancy, Business and Management strand. This strand provides the basic concepts of business and financial management, and corporate operations that will be helpful for college. \r\n\r\nGraduates of BSBA in Financial Management may pursue a career path in various corporate and business companies. They may apply for roles such as bank teller, accounting clerk, payroll associate, finance officer, financial advisor, financial analyst, and investment analyst.\r\n\r\nSource: finduniversity.ph', 'ABM');

-- --------------------------------------------------------

--
-- Table structure for table `lrn`
--

CREATE TABLE `lrn` (
  `id` int(11) NOT NULL,
  `student_lrn` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lrn`
--

INSERT INTO `lrn` (`id`, `student_lrn`) VALUES
(19, '111111111111'),
(20, '467856468467'),
(21, '467856468467'),
(22, '108009090909'),
(23, '108098912737'),
(24, '108163060122'),
(25, '108163060122'),
(26, '123123123123'),
(27, '437586789679');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens_temp`
--

CREATE TABLE `password_reset_tokens_temp` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` text NOT NULL,
  `isvalid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset_tokens_temp`
--

INSERT INTO `password_reset_tokens_temp` (`id`, `email`, `token`, `isvalid`) VALUES
(1, 'feapitsat.core@gmail.com', 'bfaa60f2c969354dc51be4b8b3d3b6d2a9e2026803a69b59cbab41cbff5d90b9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_abm_acad`
--

CREATE TABLE `question_abm_acad` (
  `id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `qtype` varchar(255) NOT NULL,
  `a` varchar(255) NOT NULL,
  `b` varchar(255) NOT NULL,
  `c` varchar(255) NOT NULL,
  `d` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `assigned_course` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_abm_acad`
--

INSERT INTO `question_abm_acad` (`id`, `question_text`, `qtype`, `a`, `b`, `c`, `d`, `correct_answer`, `assigned_course`, `keyword`) VALUES
(11387098, 'What is the term for the systematic process of identifying, acquiring, and retaining top talent for an organization?', 'academic', 'Performance management', 'Succession planning', 'Talent management', 'Employee engagement', 'c', 'BSBA major in Human Resource Development Management', 'retaining'),
(13006751, 'What is the primary focus of the BS in Accounting Information Systems program?', 'academic', 'Financial Analysis', 'Marketing Strategies', 'Political Science', 'Accounting and Information Systems', 'd', 'Bachelor of Science in Accounting Information System', 'primary focus of the BS in Accounting Information Systems program'),
(14356084, 'What is the primary responsibility of the HRD manager in an organization?', 'academic', 'Overseeing the production process', 'Managing the marketing department', 'Developing and implementing HRD strategies', 'Managing financial resources', 'c', 'BSBA major in Human Resource Development Management', 'HRD manager'),
(15722222, 'Which culinary discipline involves the art of making and decorating pastries?', 'academic', 'Baking and Pastry Arts ', 'Garde Manger', 'Saucier', 'Corporate Dining', 'a', 'Bachelor of Science in Culinary Management', 'pastries'),
(16138570, 'Which HRD function involves assessing the current and future skills and knowledge needs of an organization?', 'academic', 'Employee relations', 'Training and development', 'Recruitment and selection', 'Compensation and benefits', 'b', 'BSBA major in Human Resource Development Management', 'assessing'),
(17466176, 'Which HRD function involves designing and delivering programs to improve employee skills and knowledge?', 'academic', 'Compensation and benefits', 'Employee relations', 'Training and development', 'Recruitment and selection', 'c', 'BSBA major in Human Resource Development Management', 'delivering'),
(19025857, 'What is the term for a tour operator who sells directly to the public without using retail agents?', 'academic', 'Wholesaler', 'Inbound Tour Operator', 'Outbound Tour Operator', 'Vertical Integration Operator', 'd', 'Bachelor of Science in Tourism Management', 'operator'),
(20805528, 'Which of the following is a core component of the Bachelor of Science in Tourism Management curriculum?', 'academic', 'Biology', 'Sustainable Tourism', 'Political Science', 'Graphic Design', 'b', 'Bachelor of Science in Tourism Management', 'Bachelor of Science in Tourism Management curriculum'),
(22960713, 'What is the main purpose of employee engagement in HRD management?', 'academic', 'Increasing the workload on employees', 'Reducing employee turnover', 'Enhancing employee motivation and commitment', 'Managing legal compliance', 'c', 'BSBA major in Human Resource Development Management', 'main purpose of employee'),
(25464158, 'What is the role of a financial manager in a company?', 'academic', 'Handling day-to-day operations', 'Managing employee relations', 'Making investment and financing decisions', 'Setting marketing strategies', 'c', 'Bachelor of Science in Business Administration major in Financial Management', 'financial manager'),
(26825902, 'Which technology is commonly used in AIS to process and store financial data? ', 'academic', 'Barcode Scanner', 'Blockchain technology', 'Cloud Computing', 'Augmented Reality', 'c', 'Bachelor of Science in Accounting Information System', 'AIS to process'),
(27169668, 'What is the importance of internal controls in accounting?', 'academic', 'To reduce taxes', 'To increase sales revenue', 'To prevent fraud and errors ', 'To forecast financial statements', 'c', 'Bachelor of Science in Accountancy', 'internal'),
(31558015, 'Which type of projects or assignments are commonly found in the Accounting Information Systems coursework?', 'academic', 'Art projects', 'Scientific experiments', 'Case studies in accounting and information systems', 'Poetry writing', 'c', 'Bachelor of Science in Accounting Information System', 'coursework'),
(32609339, 'Which of the following is a common area of study in the BS in Accounting Information Systems program?', 'academic', 'Botany', 'Financial Reporting', 'Creative Writing', 'Political Science', 'b', 'Bachelor of Science in Accounting Information System', 'common area of study in the BS in Accounting Information Systems program'),
(33280663, 'What is the role of an auditor in accounting?', 'academic', 'To prepare financial statements', 'To analyze market trends', 'To oversee financial transactions', 'To examine and verify financial records ', 'd', 'Bachelor of Science in Accountancy', 'auditor'),
(33453465, 'How can organizations effectively manage their distribution channels to ensure efficient delivery of products and services to customers?', 'academic', 'By maintaining exclusive distribution rights with a single retailer.', 'By using multiple distribution channels simultaneously to reach different customer segments.', 'By limiting distribution to direct sales only and eliminating intermediaries.', 'By outsourcing distribution operations to third-party logistics providers.', 'b', 'Bachelor of Science in Business Administration major in Marketing Management', 'efficient'),
(34297049, 'Which type of hotel typically offers basic accommodation with minimal amenities and services?', 'academic', 'Boutique hotel', 'Resort hotel', 'Luxury hotel', 'Budget hotel', 'd', 'Bachelor of Science in Hospitality Management ', 'accommodation'),
(34339814, 'What is the purpose of the income statement?', 'academic', 'To show the financial position of a company', 'To calculate financial ratios', 'To record daily transactions', 'To measure the profitability of a company ', 'd', 'Bachelor of Science in Accountancy', 'income statement'),
(34589248, 'Which subject is an essential part of the Accounting Information Systems?', 'academic', 'Chemistry', 'Information Technology', 'Philosophy', 'Fashion Design', 'b', 'Bachelor of Science in Accounting Information System', 'essential part of the Accounting Information Systems'),
(34868908, 'What is the purpose of a SWOT analysis in the context of tourism?', 'academic', 'Assessing the strengths, weaknesses, opportunities, and threats of a tourism destination or organization', 'Calculating the cost of a vacation package', 'Determining the weather conditions for a specific destination', 'Analyzing the cultural heritage of a region', 'a', 'Bachelor of Science in Tourism Management', 'SWOT'),
(36368530, 'Which subject is an essential part of the BSCM program?', 'academic', 'Chemistry', 'Philosophy', 'Wine and Beverage Management', 'Environmental Science', 'c', 'Bachelor of Science in Culinary Management', 'Which subject is an essential part of the BSCM program'),
(38151163, 'How can digital marketing strategies be used to reach and engage with target audiences in today\'s digital landscape? What are the emerging trends and best practices in digital marketing?', 'academic', 'Digital marketing utilizes online advertising platforms exclusively. Emerging trends include voice search optimization and influencer marketing.', 'Digital marketing leverages social media, search engine optimization (SEO), and content marketing. Emerging trends include chatbots and personalized marketing automation.', 'Digital marketing focuses on email marketing and mobile applications. Emerging trends include virtual reality (VR) advertising and blockchain-based marketing.', 'Digital marketing relies on website optimization and affiliate marketing. Emerging trends include augmented reality (AR) campaigns and programmatic advertising.', 'b', 'Bachelor of Science in Business Administration major in Marketing Management', 'target'),
(38697278, 'What is the purpose of an audit trail in AIS? ', 'academic', 'Determining employee performance', 'Identifying potential fraud or errors', 'Allocating budget resources', 'Generating financial reports', 'b', 'Bachelor of Science in Accounting Information System', 'audit trail'),
(38750025, 'In the context of hospitality management, what does the term “occupancy rate” refer to?', 'academic', 'The percentage of guest complaints.', 'The average length of guest stays.', 'The percentage of available rooms occupied.', 'The number of rooms available for booking.', 'c', 'Bachelor of Science in Hospitality Management ', 'occupancy'),
(42252322, 'Which of the following best describes the primary goal of the Accounting Information Systems program?', 'academic', 'To study world history', 'To master culinary arts', 'To excel in accounting and information systems', 'To become a professional athlete', 'c', 'Bachelor of Science in Accounting Information System', 'primary goal of the Accounting Information Systems program'),
(45452554, 'What is the role of marketing in today\'s business environment, and how does it contribute to organizational success?', 'academic', 'Marketing helps in managing the financial resources of an organization.', 'Marketing focuses on developing new products and services.', 'Marketing builds and maintains customer relationships and generates revenue for the organization.', 'Marketing is responsible for human resource management within the organization.', 'c', 'Bachelor of Science in Business Administration major in Marketing Management', 'role of marketing'),
(45884885, 'What is the primary focus of the Bachelor of Science in Tourism Management program?', 'academic', 'Culinary Arts', 'Hotel Management', 'Tourism and Hospitality', 'Computer Science', 'c', 'Bachelor of Science in Tourism Management', 'primary focus of the Bachelor of Science in Tourism Management program'),
(46786258, 'What is the main purpose of the Bachelor of Science in Accountancy program?', 'academic', 'To study literature', 'To master the art of dance', 'To excel in accounting and financial management', 'To become professional athletes', 'c', 'Bachelor of Science in Accountancy', 'main purpose of the Bachelor of Science in Accountancy program'),
(48585566, 'In the Bachelor of Science in Tourism Management program, what is the primary goal for students?', 'academic', 'To become professional athletes', 'To excel in culinary arts', 'To develop expertise in tourism and hospitality management', 'To become poets', 'c', 'Bachelor of Science in Tourism Management', 'In the Bachelor of Science in Tourism Management program,'),
(49623095, 'What is the primary purpose of the balance sheet?', 'academic', 'To track cash flows', 'To evaluate employee performance', 'To measure business profitability', 'To show the financial position of a company', 'd', 'Bachelor of Science in Accountancy', 'balance'),
(49828097, 'What is the importance of pricing in marketing, and what factors should be considered when determining the pricing strategy for a product or service?', 'academic', 'Pricing is crucial for cost recovery only. Factors to consider include competitive pricing and profit margins.', 'Pricing helps in positioning a product in the market. Factors to consider include demand elasticity and perceived value.', 'Pricing determines the product\'s features and benefits. Factors to consider include production costs and market share.', 'Pricing has minimal impact on consumer behavior. Factors to consider include promotional activities and sales volume.', 'b', 'Bachelor of Science in Business Administration major in Marketing Management', 'pricing'),
(50554857, 'What is the importance of time management in office administration?', 'academic', 'To allocate resources effectively', 'To meet project deadlines and deliverables ', 'To develop marketing strategies', 'To calculate employee salaries and benefits', 'b', 'Bachelor Of Science in Office Administration', 'time management'),
(52540817, 'Yield management in the hospitality industry refers to:', 'academic', 'Managing customer complaints', 'Managing revenue and pricing strategies', 'Managing staff schedules and shifts', 'Managing hotel security and safety', 'b', 'Bachelor of Science in Hospitality Management ', 'yield'),
(52676434, 'What term is used to describe the cost of borrowing funds for a specific period?', 'academic', 'Dividend', 'Interest', 'Depreciation', 'Amortization', 'b', 'Bachelor of Science in Business Administration major in Financial Management', 'borrowing'),
(53224960, 'Which of the following is an example of a current liability?', 'academic', 'Long-term loans', 'Accounts receivable', 'Inventory', 'Accounts payable', 'd', 'Bachelor of Science in Accountancy', 'liability'),
(55115049, 'Which of the following is NOT a key skill required for hospitality management?', 'academic', 'Communication', 'Leadership', 'Financial Accounting', 'Problem-solving', 'c', 'Bachelor of Science in Hospitality Management ', 'key skill'),
(55859293, 'What is the primary purpose of a feasibility study in hospitality management?', 'academic', 'Assessing the potential profitability of a new project', 'Evaluating employee performance', 'Conducting market research', 'Ensuring compliance with safety regulations', 'a', 'Bachelor of Science in Hospitality Management ', 'feasibility'),
(56018299, 'What is the purpose of office automation in an organization?', 'academic', 'To reduce the need for human employees', 'To increase productivity and efficiency', 'To eliminate the need for communication between departments', 'To eliminate the need for physical office spaces', 'b', 'Bachelor Of Science in Office Administration', 'automation'),
(56278543, 'Which of the following is a core component of the Bachelor of Science in Accountancy curriculum?', 'academic', 'Botany', 'Taxation', 'Political Science', 'Music Composition', 'b', 'Bachelor of Science in Accountancy', 'core component of the Bachelor of Science in Accountancy curriculum'),
(56540353, 'What is the primary objective of cash management in financial management?', 'academic', 'Maximizing cash reserves', 'Minimizing cash flow', 'Minimizing liquidity', 'Ensuring sufficient liquidity for daily operations', 'd', 'Bachelor of Science in Business Administration major in Financial Management', 'objective'),
(56583223, 'What is the primary goal of Human Resource Development (HRD) management in an organization?', 'academic', 'Maximizing shareholder wealth', 'Enhancing employee job satisfaction', 'Minimizing legal liabilities', 'Managing financial resources', 'b', 'BSBA major in Human Resource Development Management', 'primary goal of Human Resource Development (HRD) management in an organization'),
(56709609, 'What HRD strategy is concerned with preparing employees to assume higher-level roles within the organization?', 'academic', 'Employee engagement', 'Recruitment', 'Succession planning', 'Career development', 'c', 'BSBA major in Human Resource Development Management', 'higher'),
(57098570, 'Which subject is a significant part of the Culinary Management curriculum?', 'academic', 'Culinary Nutrition', 'Microbiology', 'Sociology', 'Art Critique', 'a', 'Bachelor of Science in Culinary Management', 'significant part of the Culinary Management curriculum'),
(57236542, 'What is the primary focus of the Bachelor of Science in Accountancy program?', 'academic', 'Culinary Arts', 'Engineering', 'Business Accounting and Finance', 'Literature', 'c', 'Bachelor of Science in Accountancy', 'primary focus of the Bachelor of Science in Accountancy program'),
(57457659, 'What is the primary goal of financial management within a business?', 'academic', 'Maximizing profits', 'Minimizing costs', 'Maximizing shareholder wealth', 'Minimizing taxes', 'c', 'Bachelor of Science in Business Administration major in Financial Management', 'primary goal of financial management within a business'),
(57854125, 'Which financial statement provides a snapshot of a company\'s financial position at a specific point in time?', 'academic', 'Income statement', 'Balance sheet', 'Cash flow statement', 'Statement of retained earnings', 'b', 'Bachelor of Science in Business Administration major in Financial Management', 'snapshot'),
(58767644, 'What is the purpose of conducting market research in culinary management?', 'academic', 'To analyze customer behavior and preferences', 'To calculate food costs', 'To develop supply chain strategies', 'To monitor employees\' online activities', 'a', 'Bachelor of Science in Culinary Management', 'conducting market research'),
(60396822, 'What is the role of a culinary manager in ensuring food quality?', 'academic', 'To oversee human resources', 'To manage accounting and bookkeeping tasks', 'To enforce sanitation standards and quality control', 'To develop marketing campaigns', 'c', 'Bachelor of Science in Culinary Management', 'quality'),
(67262751, 'Which HRD function involves establishing fair and competitive compensation and benefit packages for employees?', 'academic', 'Succession planning', 'Employee relations', 'Compensation and benefits', 'Recruitment and selection', 'c', 'BSBA major in Human Resource Development Management', 'packages'),
(67300883, 'What are the various marketing communication channels available to organizations, and how can they be integrated to create an effective promotional mix?', 'academic', 'Television, radio, and print advertising. They should be used in isolation for maximum impact.', 'Social media, email marketing, and content marketing. They should be integrated to reach a wider audience.', 'Personal selling, direct mail, and outdoor advertising. They should be used interchangeably to avoid repetition.', 'Public relations, sponsorships, and sales promotions. They should be used separately to target different customer segments.', 'b', 'Bachelor of Science in Business Administration major in Marketing Management', 'various marketing communication'),
(67320969, 'Which department is responsible for overseeing the food and beverage operations in a hotel?', 'academic', 'Front Office', 'Housekeeping', 'Human Resources', 'Food and Beverage', 'd', 'Bachelor of Science in Hospitality Management ', 'overseeing'),
(67757828, 'What is the primary focus of the Bachelor of Science in Culinary Management (BSCM) program?', 'academic', 'Business Administration', 'Culinary Arts and Restaurant Management', 'Geology', 'Computer Science', 'b', 'Bachelor of Science in Culinary Management', 'primary focus of the Bachelor of Science in Culinary Management (BSCM) program'),
(70087651, 'What is the purpose of conducting performance evaluations for office employees?', 'academic', 'To monitor social media platforms', 'To assess employees\' job performance and provide feedback', 'To evaluate financial risks and opportunities', 'To develop employee training programs', 'b', 'Bachelor Of Science in Office Administration', 'evaluations for office employees'),
(71794782, 'Which financial document provides a summary of a company\'s revenues and expenses over a specific period?', 'academic', 'Balance sheet', 'Statement of cash flows', 'Income statement', 'Statement of retained earnings', 'c', 'Bachelor of Science in Business Administration major in Financial Management', 'summary'),
(73621768, 'What does the term RevPAR; stand for in the hospitality industry?', 'academic', 'Revenue Per Area', 'Revenue Per Available Room', 'Revenue Per Account', 'Revenue Per Attendee', 'b', 'Bachelor of Science in Hospitality Management ', 'RevPAR'),
(73903185, 'What is the primary purpose of the Global Distribution System (GDS) in the travel industry?', 'academic', 'Managing tour guide schedules', 'Connecting travel agencies with airlines, hotels, and car rental companies', 'Promoting local restaurants to tourists', 'Operating tourist information centers', 'b', 'Bachelor of Science in Tourism Management', 'GDS'),
(74671678, 'Which culinary technique involves cooking food in a vacuum-sealed bag?', 'academic', 'Grilling', 'Stir-frying', 'Sous-vide ', 'Deep-frying', 'c', 'Bachelor of Science in Culinary Management', 'vacuum'),
(76091167, '. What is the role of the Generally Accepted Accounting Principles (GAAP)?', 'academic', 'To regulate auditors', 'To standardize financial reporting ', 'To manage inventory control', 'To oversee tax compliance', 'b', 'Bachelor of Science in Accountancy', 'GAAP'),
(76257410, 'Which of the following factors is NOT considered when determining the location for a new hotel?', 'academic', 'Proximity to tourist attractions', 'Accessibility to transportation hubs', 'Availability of skilled workforce', 'Local climate and weather patterns', 'd', 'Bachelor of Science in Hospitality Management ', 'new'),
(76486508, 'What is the primary role of an office administrator?', 'academic', 'Human resource management', 'Financial analysis', 'Documentation and record management', 'Marketing strategies', 'c', 'Bachelor Of Science in Office Administration', 'primary role of an office administrator'),
(78197079, 'Which of the following is an example of office etiquette?', 'academic', 'Using social media during work hours', 'Dressing casually for client meetings', 'Being punctual and respectful', ' Ignoring colleagues\' requests for assistance', 'c', 'Bachelor Of Science in Office Administration', 'etiquette'),
(80202213, 'Which accounting principle ensures that all financial transactions are recorded accurately and completely?', 'academic', 'Materiality Principle', 'Matching Principle', 'Cost Principle ', 'Completeness Principle', 'd', 'Bachelor of Science in Accounting Information System', 'recorded'),
(80271127, 'What financial concept is concerned with the time value of money and the idea that a dollar received in the future is worth less than a dollar received today?', 'academic', 'Risk management', 'Opportunity cost', 'Present value', 'Market segmentation', 'c', 'Bachelor of Science in Business Administration major in Financial Management', 'financial concept'),
(82202505, 'Which of the following is NOT a primary source of revenue for hotels?', 'academic', 'Room bookings', 'Food and beverage sales', 'Conference room rentals', 'Tour guide services', 'd', 'Bachelor of Science in Hospitality Management ', 'revenue for hotels'),
(83421791, 'Which of the following is an example of an ecotourism activity?', 'academic', 'Visiting a large amusement park', 'Going on a safari to observe wildlife in their natural habitat', 'Taking a city sightseeing bus tour', 'Attending a music festival', 'b', 'Bachelor of Science in Tourism Management', 'ecotourism'),
(83441235, 'Which financial ratio measures a company\'s profitability by comparing net income to its shareholders\' equity?', 'academic', 'Return on Assets (ROA)', 'Return on Investment (ROI)', 'Return on Equity (ROE)', 'Earnings Before Interest and Taxes (EBIT)', 'c', 'Bachelor of Science in Business Administration major in Financial Management', 'financial ratio'),
(85078718, 'How does effective communication contribute to successful office administration?', 'academic', ' By facilitating collaboration and teamwork', ' By reducing the need for office technology', 'By automating financial transactions', 'By eliminating the need for office supplies', 'a', 'Bachelor Of Science in Office Administration', 'contribute to successful'),
(87092748, 'Which subject is an essential part of the Bachelor of Science in Tourism Management?', 'academic', 'Physics', 'Hotel Accounting', 'Sociology', 'Cultural Anthropology', 'b', 'Bachelor of Science in Tourism Management', 'essential part of the Bachelor of Science in Tourism Management'),
(87098943, 'What is the primary goal of the Bachelor of Science in Culinary Management (BSCM) program?', 'academic', 'To study astrophysics', 'To excel in fashion design', 'To develop expertise in culinary arts and restaurant management', 'To become professional athletes', 'c', 'Bachelor of Science in Culinary Management', 'primary goal of the Bachelor of Science in Culinary Management (BSCM) program'),
(88797762, 'What is the term for the process of evaluating and managing the risks associated with financial decisions?', 'academic', 'Financial modeling', 'Risk assessment', 'Hedging', 'Risk management', 'd', 'Bachelor of Science in Business Administration major in Financial Management', 'risks'),
(90424338, 'What are the key elements of a comprehensive marketing strategy, and how do they interact to create value for customers and the organization?', 'academic', 'Product, price, promotion, and place (distribution) - collectively known as the 4Ps of marketing.', 'Manufacturing, advertising, customer service, and logistics.', 'Research and development, operations, public relations, and sales.', 'Product development, financial planning, customer retention, and supply chain management.', 'a', 'Bachelor of Science in Business Administration major in Marketing Management', 'key elements'),
(90816100, 'What are the ethical and social responsibilities of marketers, and how can they ensure that their marketing activities align with ethical standards and societal expectations?', 'academic', 'Marketers are solely responsible for maximizing profits. Ethical standards are subjective and vary between organizations.', 'Marketers should prioritize customer satisfaction over ethical considerations. Society\'s expectations are constantly changing, making alignment difficult.', 'Marketers have a duty to act responsibly and ethically, considering the impact of their actions on stakeholders and society. Compliance with legal and industry regulations is crucial.', 'Marketers should focus on maintaining a competitive advantage, even if it means disregarding ethical standards and societal expectations. ', 'c', 'Bachelor of Science in Business Administration major in Marketing Management', 'marketers'),
(91564859, 'How can market research be used to identify and analyze customer needs, preferences, and behavior? What are the different methods and tools available for conducting market research?', 'academic', 'Market research helps organizations understand the competition and develop pricing strategies. Methods include surveys, interviews, and focus groups.', 'Market research assists in identifying target markets and positioning products. Tools include social media analytics, online surveys, and data mining.', 'Market research focuses on sales forecasting and distribution planning. Methods include experimental research and customer observation.', 'arket research helps in selecting appropriate promotional strategies. Tools include financial statements and market share analysis.', 'b', 'Bachelor of Science in Business Administration major in Marketing Management', 'preferences'),
(91927900, 'Which of the following is a core component of the AIS curriculum?', 'academic', 'Environmental Science', 'Financial Accounting', 'Music Theory', 'Art History', 'b', 'Bachelor of Science in Accounting Information System', 'core component of the AIS curriculum'),
(92427880, 'How does culinary management contribute to sustainable practices?', 'academic', 'By implementing energy-saving initiatives', 'By reducing food waste', 'By developing social media marketing campaigns', 'By using organic ingredients', 'b', 'Bachelor of Science in Culinary Management', 'sustainable'),
(92645207, 'What is the purpose of the cash flow statement?', 'academic', 'To show the financial position of a company', 'To record daily transactions', 'To evaluate investment opportunities', 'To track cash inflows and outflows', 'd', 'Bachelor of Science in Accountancy', 'cash flow'),
(93511588, 'How does branding play a crucial role in building customer loyalty and market differentiation? What are the key components of a successful brand strategy?', 'academic', 'Branding helps in setting prices for products and services. Key components include product features and quality.', 'Branding creates emotional connections with customers and sets products apart from competitors. Key components include brand positioning and brand identity.', 'Branding helps in identifying target markets and developing distribution strategies. Key components include market segmentation and channel selection.', 'Branding focuses on promotional activities and advertising campaigns. Key components include media selection and message creation.', 'b', 'Bachelor of Science in Business Administration major in Marketing Management', 'crucial'),
(93798777, 'What is the significance of maintaining confidentiality in office administration?', 'academic', 'To protect sensitive information and maintain privacy ', 'To improve customer relationships', 'To increase employee productivity', 'To minimize absenteeism and turnover rates', 'a', 'Bachelor Of Science in Office Administration', 'confidentiality'),
(94037075, 'How does a computer-based information system benefit office administration?', 'academic', 'By simplifying payroll management', 'By facilitating online collaboration and communication ', 'By automating inventory management', 'By streamlining marketing strategies', 'b', 'Bachelor Of Science in Office Administration', 'computer-based'),
(94089385, 'Which of the following best defines hospitality management?', 'academic', 'Managing hotels and resorts', 'Managing restaurants and catering businesses', 'Managing customer service in the hospitality industry', 'Managing events and conferences', 'c', 'Bachelor of Science in Hospitality Management ', 'defines'),
(94111561, 'Which of the following is a common area of study in the program?', 'academic', 'Geophysics', 'Marketing Research', 'Philosophy', 'Zoology', 'b', 'Bachelor of Science in Tourism Management', 'common area of study in the program'),
(95262614, 'Which of the following is a core component of the BSCM program\'s curriculum?', 'academic', 'Botany', 'Culinary Techniques', 'Political Science', 'Music Composition', 'b', 'Bachelor of Science in Culinary Management', 'core component of the BSCM program\'s curriculum'),
(96086294, 'What is the term for a structured process of helping employees improve their performance and achieve their potential?', 'academic', 'Recruitment', 'Onboarding', 'Performance management', 'Succession planning', 'c', 'BSBA major in Human Resource Development Management', 'achieve'),
(96873011, 'Which of the following is not a primary motivation for people to travel for leisure?', 'academic', 'Exploration and adventure', 'Business conferences', 'Relaxation and stress relief', 'Cultural enrichment', 'b', 'Bachelor of Science in Tourism Management', 'leisure'),
(96892423, 'What kind of courses are typically offered in the Accounting Information Systems program?', 'academic', 'Art History', 'Supply Chain Management', 'Accounting Software', 'Zoology', 'c', 'Bachelor of Science in Accounting Information System', 'offered'),
(97294658, 'Which HRD strategy focuses on helping employees develop the skills and knowledge needed for their current roles?', 'academic', 'Succession planning', 'Career development', 'Employee engagement', 'Recruitment', 'b', 'BSBA major in Human Resource Development Management', 'current roles'),
(98076960, 'What financial metric measures a company\'s ability to meet its short-term obligations with its current assets?', 'academic', 'Return on Investment (ROI)', 'Gross Profit Margin', 'Current Ratio', 'Debt to Equity Ratio', 'c', 'Bachelor of Science in Business Administration major in Financial Management', 'short'),
(98116544, 'What is the purpose of conducting training programs for office employees?', 'academic', 'To improve employee morale', 'To enhance employees\' technical skills and knowledge', 'To develop customer service strategies', 'To establish financial goals and targets', 'b', 'Bachelor Of Science in Office Administration', 'training'),
(98308644, 'Which of the following is not a typical responsibility of an office administrator?', 'academic', 'Managing appointment schedules', 'Filing and organizing documents', 'Developing marketing campaigns', 'Monitoring office supplies inventory ', 'd', 'Bachelor Of Science in Office Administration', 'not a typical'),
(99098480, 'What are the different factors that influence consumer behavior?', 'academic', 'Cultural, social, personal, and psychological factors. Marketers can tailor their campaigns to align with these influences.', 'Economic, technological, legal, and political factors. Marketers need to adapt to these external forces.', 'Demographic, geographic, and behavioral factors. Marketers should segment their target audience accordingly.', 'Competitive, supply chain, and pricing factors. Marketers should focus on differentiating their products based on these factors.', 'a', 'Bachelor of Science in Business Administration major in Marketing Management', 'influence');

-- --------------------------------------------------------

--
-- Table structure for table `question_abm_int`
--

CREATE TABLE `question_abm_int` (
  `id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `qtype` varchar(255) NOT NULL,
  `assigned_course` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_abm_int`
--

INSERT INTO `question_abm_int` (`id`, `question_text`, `qtype`, `assigned_course`, `keyword`) VALUES
(10017235, 'Do you want to understand how financial decisions impact an organization\'s success?', 'interest', 'Bachelor of Science in Business Administration major in Financial Management', 'impact'),
(10688256, 'Do you enjoy planning and organizing events?', 'interest', 'Bachelor of Science in Hospitality Management ', 'do you enjoy planning and organizing events'),
(11930439, 'Can you see yourself working in social media marketing or public relations when you start college?', 'interest', 'Bachelor of Science in Business Administration major in Marketing Management', 'social media'),
(14538221, 'Can you imagine working in digital marketing, branding, or advertising after starting college?', 'interest', 'Bachelor of Science in Business Administration major in Marketing Management', 'digital'),
(15339550, 'Do you like working with computers and software applications?', 'interest', 'Bachelor Of Science in Office Administration', 'computers'),
(15384695, 'Do you take satisfaction in maintaining a smoothly running office?', 'interest', 'Bachelor Of Science in Office Administration', 'smoothly'),
(16917550, 'Do you see yourself developing and executing marketing campaigns for products or services?', 'interest', 'Bachelor of Science in Business Administration major in Marketing Management', 'executing'),
(17375188, 'Do you find the idea of creating and implementing marketing strategies exciting and engaging?', 'interest', 'Bachelor of Science in Business Administration major in Marketing Management', 'engaging'),
(18394449, 'Do you have a passion for maintaining organized and productive office environments? ', 'interest', 'Bachelor Of Science in Office Administration', 'productive'),
(19215716, 'Do you like scheduling appointments and managing calendars?', 'interest', 'Bachelor Of Science in Office Administration', 'appointments'),
(19589054, 'Can you see yourself in a career that combines accounting and information technology?', 'interest', 'Bachelor of Science in Accounting Information System', 'combines'),
(20691276, 'Do you see yourself working in a team environment to manage financial operations for a business?', 'interest', 'Bachelor of Science in Accountancy', 'team environment'),
(21084856, 'Do you see yourself collaborating with local businesses and vendors?', 'interest', 'Bachelor of Science in Tourism Management', 'vendors'),
(21618208, 'Does the management of databases and information systems intrigue you?', 'interest', 'Bachelor of Science in Accounting Information System', 'intrigue'),
(22005800, 'Is completing tasks accurately and in a timely manner something you value?', 'interest', 'Bachelor Of Science in Office Administration', 'timely'),
(22925458, 'Is the idea of creating and managing marketing plans something you\'re passionate about?', 'interest', 'Bachelor of Science in Business Administration major in Marketing Management', 'marketing plans'),
(22952114, 'Do you have a passion for food and beverage management?', 'interest', 'Bachelor of Science in Hospitality Management ', 'food and beverage management'),
(23567895, 'Do you like staying up-to-date with industry trends and best practices in tourism management?', 'interest', 'Bachelor of Science in Tourism Management', 'tourism management'),
(24501323, 'Do you enjoy learning new skills and technologies related to office?', 'interest', 'Bachelor Of Science in Office Administration', 'new skills'),
(24540174, 'Do you like staying up-to-date with industry trends and best practices in software development?', 'interest', 'BSBA major in Human Resource Development Management', 'best practices in software development'),
(26407827, 'Would you like to study customer relationship management and sales techniques in college?', 'interest', 'Bachelor of Science in Business Administration major in Marketing Management', 'relationship'),
(27223711, 'Is the idea of integrating technology into accounting appealing to you?', 'interest', 'Bachelor of Science in Accounting Information System', 'appealing'),
(27905247, 'Do you like planning and organizing travel vacations?', 'interest', 'Bachelor of Science in Tourism Management', 'vacations'),
(30695295, 'Is designing and implementing financial information systems something you\'d like to explore?', 'interest', 'Bachelor of Science in Accounting Information System', 'financial information systems'),
(32279170, 'Are you interested in establishing a strong educational foundation in culinary and hospitality management as you begin your college journey?', 'interest', 'Bachelor of Science in Culinary Management', 'establishing'),
(32917066, 'Do you find satisfaction in ensuring data accuracy and financial compliance?', 'interest', 'Bachelor of Science in Accounting Information System', 'ensuring'),
(33939717, 'Do you see yourself collaborating with others to gather requirements for projects?', 'interest', 'BSBA major in Human Resource Development Management', 'requirements'),
(34569566, 'Are you comfortable handling customer complaints?', 'interest', 'Bachelor of Science in Hospitality Management ', 'handling customer complaints'),
(35806857, 'Are you interested in the tourism industry?', 'interest', 'Bachelor of Science in Hospitality Management ', 'tourism industry'),
(37867640, 'Do you see yourself collaborating with clients to develop financial strategies and plans?', 'interest', 'Bachelor of Science in Accountancy', 'develop financial'),
(38384121, 'Are you interested in learning how to manage hotel operations?', 'interest', 'Bachelor of Science in Hospitality Management ', 'hotel operations'),
(38440778, 'Can you see yourself pursuing a career in accounting, auditing, or financial analysis?', 'interest', 'Bachelor of Science in Accountancy', 'auditing'),
(38926416, 'Are you open to learning about various accounting software applications?', 'interest', 'Bachelor of Science in Accounting Information System', 'various accounting'),
(39207179, 'Do you enjoy managing budgets for projects?', 'interest', 'BSBA major in Human Resource Development Management', 'Do you enjoy managing budgets for projects'),
(39639022, 'Do you enjoy cooking and food preparation?', 'interest', 'Bachelor of Science in Culinary Management', 'cooking'),
(40198435, 'Do you find satisfaction in mentoring and coaching people?', 'interest', 'BSBA major in Human Resource Development Management', 'coaching'),
(41898453, 'Are you open to learning about dietary restrictions and special cuisines?', 'interest', 'Bachelor of Science in Accounting Information System', 'dietary'),
(42139308, 'Do you see yourself promoting travel destinations to potential customers?', 'interest', 'Bachelor of Science in Tourism Management', 'promoting'),
(42447731, 'Do you like working with accounting software and technology?', 'interest', 'Bachelor of Science in Accountancy', 'Do you like working with accounting software and technology'),
(42741727, 'Are you interested in studying market research and data analysis in college?', 'interest', 'Bachelor of Science in Business Administration major in Marketing Management', 'market research'),
(43256706, 'Can you see yourself pursuing a career related to financial management in various industries?', 'interest', 'Bachelor of Science in Business Administration major in Financial Management', 'financial management'),
(43392977, 'Do you see yourself resolving a customer complaints and issues related to travel arrangements?', 'interest', 'Bachelor of Science in Tourism Management', 'issues'),
(44325409, 'Would you like to learn about investment strategies and portfolio management?', 'interest', 'Bachelor of Science in Business Administration major in Financial Management', 'portfolio'),
(46996582, 'Do you enjoy researching and learning about different travel destinations?', 'interest', 'Bachelor of Science in Tourism Management', 'different travel destinations'),
(47994814, 'Are you interested in learning about marketing for the hospitality industry?', 'interest', 'Bachelor of Science in Hospitality Management ', 'hospitality industry'),
(48482905, 'Do you like to study financial markets and economic trends?', 'interest', 'Bachelor of Science in Business Administration major in Financial Management', 'economic'),
(48556554, 'Are you comfortable working in a fast-paced environment?', 'interest', 'Bachelor of Science in Hospitality Management ', 'fast'),
(49527782, 'Do you see yourself identifying and solving financial problems for clients?', 'interest', 'Bachelor of Science in Accountancy', 'financial problems'),
(53578243, 'Do you enjoy working with financial records, transactions, and statements?', 'interest', 'Bachelor of Science in Accounting Information System', 'records'),
(54964026, 'Are you attracted to careers in investment management and financial consulting?', 'interest', 'Bachelor of Science in Business Administration major in Financial Management', 'consulting'),
(55020883, 'Are you open to keeping up with changing accounting regulations and industry standards during your college education?', 'interest', 'Bachelor of Science in Accounting Information System', 'standards'),
(55110760, 'Are you interested in learning about event planning and management?', 'interest', 'Bachelor of Science in Hospitality Management ', 'event planning'),
(57063108, 'Do you like staying up-to-date with industry regulations and laws related to financial reporting and taxation?', 'interest', 'Bachelor of Science in Accountancy', 'laws'),
(57189729, 'Do you enjoy analyzing data and metrics to measure the success of projects?', 'interest', 'BSBA major in Human Resource Development Management', 'metrics'),
(57641889, 'Do you like to pursue career in finance and investment?', 'interest', 'Bachelor of Science in Business Administration major in Financial Management', 'finance and investment'),
(58210202, 'Do you have a passion for working with financial data and numbers?', 'interest', 'Bachelor of Science in Accounting Information System', 'financial data and numbers'),
(59538896, 'Do you like the idea of planning and designing menus?', 'interest', 'Bachelor of Science in Culinary Management', 'menus'),
(60019427, 'Are you satisfied by solving challenges in projects?', 'interest', 'BSBA major in Human Resource Development Management', 'solving challenges'),
(61813948, 'Are you attracted to the idea of analyzing financial information and improving business processes?', 'interest', 'Bachelor of Science in Accounting Information System', 'processes'),
(63803533, 'Do you like interacting with individuals through phone calls and email exchanges?', 'interest', 'Bachelor Of Science in Office Administration', 'phone'),
(65333269, 'Do you like working with people from different cultures and backgrounds?', 'interest', 'Bachelor of Science in Tourism Management', 'backgrounds'),
(69092948, 'Do you enjoy meeting and interacting with new people?', 'interest', 'Bachelor of Science in Hospitality Management ', 'meeting'),
(70243884, 'Do you see yourself managing a restaurant or culinary establishment in the future?', 'interest', 'Bachelor of Science in Culinary Management', 'future'),
(71978368, 'Do you enjoy learning about new technologies and tools for software development?', 'interest', 'BSBA major in Human Resource Development Management', 'tools'),
(73134628, 'Would you like to learn about financial strategies for long-term growth and sustainability?', 'interest', 'Bachelor of Science in Business Administration major in Financial Management', 'sustainability'),
(73341024, 'Do you have a passion for hospitality and customer service?', 'interest', 'Bachelor of Science in Hospitality Management ', ' hospitality and customer service'),
(74889365, 'Do you enjoy calculating numbers and financial data?', 'interest', 'Bachelor of Science in Accountancy', 'numbers and financial data'),
(74928425, 'Are you interested in managing and optimizing financial resources for organizations?', 'interest', 'Bachelor of Science in Business Administration major in Financial Management', 'optimizing'),
(75911416, 'Are you interested in financial planning for individuals and businesses?', 'interest', 'Bachelor of Science in Business Administration major in Financial Management', 'for individuals'),
(76629240, 'Are you drawn to financial markets and investments?', 'interest', 'Bachelor of Science in Business Administration major in Financial Management', 'drawn'),
(77918721, 'Do you have a strong interest in studying consumer behavior and staying up-to-date with market trends?', 'interest', 'Bachelor of Science in Business Administration major in Marketing Management', 'behavior'),
(79954011, 'Would you like to develop skills in areas such as leadership, communication, and talent development? ', 'interest', 'BSBA major in Human Resource Development Management', 'leadership'),
(80429035, 'Do you see yourself providing an excellent customer service to travelers?', 'interest', 'Bachelor of Science in Tourism Management', 'excellent'),
(80542012, 'Are you interested in pursuing a career in sales?', 'interest', 'Bachelor of Science in Business Administration major in Marketing Management', 'career in sales'),
(83452606, 'Do you enjoy working with teams to develop projects?', 'interest', 'BSBA major in Human Resource Development Management', 'develop projects'),
(84154235, 'Do you enjoy managing budgets and finances for business?', 'interest', 'Bachelor of Science in Accountancy', 'budgets and finances for business'),
(85302464, 'Are you interested in food presentation and plating techniques?', 'interest', 'Bachelor of Science in Culinary Management', 'plating'),
(87005927, 'Are you curious about restaurant operations and management?', 'interest', 'Bachelor of Science in Culinary Management', 'restaurant operations'),
(87914649, 'Do you feel confident in your ability to effectively communicate marketing messages?', 'interest', 'Bachelor of Science in Business Administration major in Marketing Management', 'confident'),
(88199892, 'Do you find satisfaction in managing budgets and finances for travel arrangements?', 'interest', 'Bachelor of Science in Tourism Management', 'finances for travel arrangements'),
(89054460, 'Are you open to studying business and management in the culinary context?', 'interest', 'Bachelor of Science in Culinary Management', 'context'),
(90768947, 'Do you enjoy organizing files and documents?', 'interest', 'Bachelor Of Science in Office Administration', 'documents'),
(92781478, 'Do you enjoy managing budgets and finances related to office?', 'interest', 'Bachelor Of Science in Office Administration', 'finances related to office'),
(94303302, 'Do you enjoy managing the entire software development life cycle from planning to deployment?', 'interest', 'BSBA major in Human Resource Development Management', 'cycle'),
(94805317, 'Do you see yourself handling tax returns and financial statements?', 'interest', 'Bachelor of Science in Accountancy', 'tax returns'),
(95020349, 'Do you see yourself planning and organizing events or activities for travelers?', 'interest', 'Bachelor of Science in Tourism Management', 'activities'),
(95688828, 'Do you like organizing and analyzing financial information?', 'interest', 'Bachelor of Science in Accountancy', 'and analyzing'),
(97036399, 'Would you like to explore the history and culture of cuisine?', 'interest', 'Bachelor of Science in Culinary Management', 'history'),
(98104038, 'Are you passionate about problem-solving and resolving workplace challenges effectively?', 'interest', 'Bachelor Of Science in Office Administration', 'problem-solving'),
(98153208, 'Are you interested in understanding food and beverage cost control?', 'interest', 'Bachelor of Science in Culinary Management', 'cost');

-- --------------------------------------------------------

--
-- Table structure for table `question_humss_acad`
--

CREATE TABLE `question_humss_acad` (
  `id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `qtype` varchar(255) NOT NULL,
  `a` varchar(255) NOT NULL,
  `b` varchar(255) NOT NULL,
  `c` varchar(255) NOT NULL,
  `d` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `assigned_course` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_humss_acad`
--

INSERT INTO `question_humss_acad` (`id`, `question_text`, `qtype`, `a`, `b`, `c`, `d`, `correct_answer`, `assigned_course`, `keyword`) VALUES
(10592396, 'This reading process model refers to the progress of children in learning the parts of language to understand the whole text', 'academic', 'Bottom-up', 'Top-down', 'Interactive', 'Comprehension', 'a', 'Bachelor of Secondary Education', 'model'),
(12257280, 'Which area of psychology is concerned with understanding and promoting psychological well-being and optimal functioning?', 'academic', 'Clinical psychology', 'Educational psychology', 'Positive psychology', 'Social psychology', 'c', 'Bachelor of Arts in Psychology', 'concerned'),
(16092569, 'What does the BA in BA Psychology typically stand for?', 'academic', 'Bachelor of Analysis in Psychology', 'Bachelor of Arts in Psychology', 'Bachelor of Advanced Psychology', 'Bachelor of Applied Psychology', 'b', 'Bachelor of Arts in Psychology', 'typically'),
(16482990, 'What is the term for a system of government in which power is divided between a central authority and regional governments?', 'academic', 'Autocracy', 'Federalism', 'Totalitarianism', 'Oligarchy', 'b', 'Bachelor of Arts in Political Science', 'divided'),
(16764248, 'What is the branch of philosophy that deals with the nature and limits of human knowledge, including questions of belief, justification, and truth?', 'academic', 'Ethics', 'Metaphysics', 'Epistemology', 'Aesthetics', 'c', 'Bachelor of Arts in Philosophy', 'limits'),
(17021165, 'Who is considered the father of modern criminology and is known for his classical theory of crime?', 'academic', 'Cesare Beccaria', 'Sigmund Freud', 'Emile Durkheim', 'Karl Marx', 'a', 'Bachelor of Science in Criminology', 'father'),
(17849498, 'Who is known for his theory of historical materialism and the idea that class struggle is the driving force of history?', 'academic', 'Max Weber', 'Karl Marx', 'Émile Durkheim', 'Auguste Comte', 'b', 'Bachelor of Arts in Sociology', 'materialism'),
(19536529, 'Which criminological theory suggests that crime is a result of the interaction between individuals and their environment, including social influences?', 'academic', 'Strain Theory', 'Rational Choice Theory', 'Social Learning Theory', 'Routine Activities Theory', 'c', 'Bachelor of Science in Criminology', 'environment'),
(20540282, 'What is the term for a type of crime that involves violence, the threat of violence, or the use of force to commit a crime?', 'academic', 'Property Crime', 'White-Collar Crime', 'Violent Crime', 'Cybercrime', 'c', 'Bachelor of Science in Criminology', 'threat'),
(22450145, 'What is the role of a school social worker?', 'academic', 'Administering medical treatment to students', 'Providing therapy to teachers', 'Supporting students\' academic and social well-being', 'Managing a school\'s budget', 'c', 'Bachelor Of Science in Social Work ', 'social worker'),
(23115801, 'Which branch of political science focuses on the relationships between different countries, international organizations, and global issues?', 'academic', 'Political Economy', 'Comparative Politics', 'International Relations', 'Political Theory', 'c', 'Bachelor of Arts in Political Science', 'global'),
(23829488, 'How does differentiated instruction benefit students in elementary education?', 'academic', 'By standardizing learning experiences', 'By promoting collaboration among students', 'By addressing students\' individual needs ', 'By increasing classroom management challenges', 'c', 'Bachelor of Elementary Education', 'differentiated'),
(23886142, 'Which sociological perspective focuses on the ways in which power, conflict, and social inequality shape society?', 'academic', 'Symbolic Interactionism', 'Structural Functionalism', 'Conflict Theory', 'Postmodernism', 'c', 'Bachelor of Arts in Sociology', 'conflict'),
(24463470, 'Which part of the brain is associated with decision-making, problem-solving, and impulse control?', 'academic', 'Hippocampus', 'Cerebellum', 'Prefrontal cortex', 'Medulla oblongata', 'c', 'Bachelor of Arts in Psychology', 'brain'),
(25053344, 'Which ancient Greek philosopher is known for his contributions to ethics, including the concept of the Golden Mean?', 'academic', 'Socrates', 'Plato', 'Aristotle', 'Epicurus', 'c', 'Bachelor of Arts in Philosophy', 'Greek'),
(28763979, 'It is the main goal of teaching reading', 'academic', 'Assessments ', 'Tasks     ', 'Comprehension ', 'Vocabulary ', 'c', 'Bachelor of Secondary Education', 'teaching'),
(28799016, 'Why is classroom management important in elementary education? ', 'academic', 'To increase test scores', 'To enhance students\' creative thinking', 'To create a positive learning environment ', 'To analyze students\' academic performance', 'c', 'Bachelor of Elementary Education', 'important'),
(29326157, 'Which philosophical tradition focuses on the search for personal enlightenment and the path to liberation from suffering?', 'academic', 'Existentialism', 'Pragmatism', 'Stoicism', 'Buddhism', 'd', 'Bachelor of Arts in Philosophy', 'tradition'),
(29858815, 'It refers to the multifaceted process involving word recognition, comprehension, fluency, and motivation', 'academic', 'Reading ', 'Listening ', 'Writing  ', 'Speaking ', 'a', 'Bachelor of Secondary Education', 'multifaceted'),
(30500027, 'What does the term philosophy mean etymologically?', 'academic', 'The study of the human mind', 'The love of wisdom', 'The pursuit of power', 'The analysis of language', 'b', 'Bachelor of Arts in Philosophy', 'etymologically'),
(31389316, 'Who is the philosopher famous for his Meditations, in which he sought to establish a foundation for knowledge through doubt and skepticism?', 'academic', 'René Descartes', 'Baruch Spinoza', 'Blaise Pascal', 'Jean-Jacques Rousseau', 'a', 'Bachelor of Arts in Philosophy', 'meditations'),
(32380634, 'What is the primary focus of humanistic psychology?', 'academic', 'The influence of unconscious conflicts', 'The study of observable behavior', 'The growth and potential of individuals', 'The role of reinforcement in learning', 'c', 'Bachelor of Arts in Psychology', 'humanistic'),
(34483067, 'Who is the philosopher known for the concept of the categorical imperative as a basis for moral actions?', 'academic', 'Immanuel Kant', 'Jean-Jacques Rousseau', 'Friedrich Nietzsche', 'John Locke', 'a', 'Bachelor of Arts in Philosophy', 'imperative'),
(35292520, 'Which branch of criminology focuses on understanding and preventing criminal behavior within families and communities?', 'academic', 'Victimology', 'Environmental Criminology', 'Community Criminology', 'Forensic Criminology', 'c', 'Bachelor of Science in Criminology', 'preventing'),
(36193103, 'The concept of cultural competence in social work refers to what?', 'academic', 'Understanding and respecting cultural differences', 'Diagnosing mental health conditions', 'Managing conflicts in the workplace', 'Administering government programs', 'a', 'Bachelor Of Science in Social Work ', 'competence'),
(37989192, 'What is the term for the process of analyzing and comparing different cultures to understand their similarities and differences?', 'academic', 'Cultural Appropriation', 'Cultural Relativism', 'Cultural Assimilation', 'Cultural Determinism', 'b', 'Bachelor of Arts in Sociology', 'differences'),
(38264975, 'How does cooperative learning benefit students in elementary education?', 'academic', 'By increasing competition among students', 'By improving student-teacher relationships', 'By fostering teamwork and collaboration ', 'By decreasing student motivation', 'c', 'Bachelor of Elementary Education', 'cooperative'),
(39015317, 'What is the primary focus of the Bachelor of Science in Elementary Education program?', 'academic', 'Geology', 'Culinary', 'Early Childhood Education', 'Music Composition', 'c', 'Bachelor of Elementary Education', 'What is the primary focus of the Bachelor of Science in Elementary Education program'),
(39201941, 'In social work, what is the term for the process of helping individuals and communities build on their strengths and resources to improve their well-being?', 'academic', 'Empowerment', 'Clinical therapy', 'Rehabilitation', 'Case management', 'a', 'Bachelor Of Science in Social Work ', 'improve'),
(39312294, 'Who is often regarded as the founder of modern sociology and coined the term sociology?', 'academic', 'Auguste Comte', 'Karl Marx', 'Émile Durkheim', 'Max Weber', 'a', 'Bachelor of Arts in Sociology', 'coined'),
(40522537, 'The philosophical problem of the external world, including questions about perception and reality, is a central topic in which branch of philosophy?', 'academic', 'Epistemology', 'Aesthetics', 'Ethics', 'Logic', 'a', 'Bachelor of Arts in Philosophy', 'external'),
(40907753, 'Which psychological perspective focuses on how people perceive, remember, think, and solve problems?', 'academic', 'Psychoanalytic perspective', 'Behavioral perspective', 'Cognitive perspective', 'All of the above', 'c', 'Bachelor of Arts in Psychology', 'think'),
(41233122, 'The process by which individuals and groups are stigmatized and labeled as criminals is a central concept in which criminological theory?', 'academic', 'Rational Choice Theory', 'Social Learning Theory', 'Labeling Theory', 'Routine Activities Theory', 'c', 'Bachelor of Science in Criminology', 'stigmatized'),
(42005065, 'What is the primary focus of sociology as a discipline?', 'academic', 'The study of individual behavior', 'The study of the natural world', 'The systematic study of society and social behavior', 'The analysis of economic systems', 'c', 'Bachelor of Arts in Sociology', 'discipline'),
(42730944, 'What is the importance of early intervention in elementary education?', 'academic', 'To increase school funding', 'To prevent learning difficulties', 'To implement technology in the classroom', 'To monitor student attendance', 'b', 'Bachelor of Elementary Education', 'intervention'),
(46356843, 'What is the term for the systematic study of the distribution and patterns of wealth, income, and economic inequality in society?', 'academic', 'Economic Sociology', 'Political Sociology', 'Industrial Sociology', 'Rural Sociology', 'a', 'Bachelor of Arts in Sociology', 'wealth'),
(47220746, 'Which psychological perspective emphasizes the role of rewards and punishments in shaping behavior?', 'academic', 'Cognitive psychology', 'Behavioral psychology', 'Psychodynamic psychology', 'Humanistic psychology', 'b', 'Bachelor of Arts in Psychology', 'punishments'),
(48443828, 'What is the philosophical position that reality is fundamentally mental or immaterial, rather than material?', 'academic', 'Dualism', 'Materialism', 'Idealism', 'Nihilism', 'c', 'Bachelor of Arts in Philosophy', 'immaterial'),
(50020254, 'What is the purpose of developing literacy skills in elementary education?', 'academic', 'To improve students\' logical reasoning', 'To enhance students\' creativity', 'To promote reading comprehension ', 'To implement technology in the classroom', 'c', 'Bachelor of Elementary Education', 'literacy'),
(51953258, 'Readers use both knowledge of word structure and background knowledge to interpret the texts they read', 'academic', 'Bottom-up', 'Top-down', 'Interactive ', 'Comprehension ', 'c', 'Bachelor of Secondary Education', 'readers'),
(53392587, 'Which sociological perspective emphasizes the role of institutions and their contribution to the stability of society?', 'academic', 'Symbolic Interactionism', 'Structural Functionalism', 'Conflict Theory', 'Postmodernism', 'b', 'Bachelor of Arts in Sociology', 'institutions'),
(54899457, 'What would be your instructions when asking the students to do responding tasks?', 'academic', 'Share personal opinions about the text', 'Utilize a scoring rubric and provide a summary of the reading material', 'Share personal opinions about the text and utilize a scoring rubric', 'Utilize concise headings and use single words in headings', 'c', 'Bachelor of Secondary Education', 'responding'),
(55134786, 'The study of social structures, such as family, education, and government, is a central focus of which subfield of sociology?', 'academic', 'Political Sociology', 'Urban Sociology', 'Structural Sociology', 'Social Institutions', 'd', 'Bachelor of Arts in Sociology', 'subfield'),
(56230348, 'Who is known for the theory of psychosocial development, which includes stages like trust vs. mistrust and identity vs. role confusion?', 'academic', 'B.F. Skinner', 'Erik Erikson', 'Abraham Maslow', 'Sigmund Freud', 'b', 'Bachelor of Arts in Psychology', 'identity'),
(56418795, 'Who is considered the founder of modern social work and established the Hull House in Chicago, a settlement house to help immigrants and the poor?', 'academic', 'Mary Richmond', 'Jane Addams', 'Abraham Maslow', 'Sigmund Freud', 'b', 'Bachelor Of Science in Social Work ', 'hull'),
(57050628, 'What type of social work involves assisting individuals and families in managing crises, such as domestic violence or substance abuse?', 'academic', 'Clinical social work', 'Medical social work', 'School social work', 'Case management', 'a', 'Bachelor Of Science in Social Work ', 'crises'),
(57522771, 'Which criminological theory suggests that crime is a result of individuals\' inability to achieve culturally approved goals through legitimate means?', 'academic', 'Social Disorganization Theory', 'Labeling Theory', 'Strain Theory', 'Routine Activities Theory', 'c', 'Bachelor of Science in Criminology', 'inability'),
(58851443, 'What term is used to describe the process by which individuals or groups influence government decisions?', 'academic', 'Governance', 'Diplomacy', 'Political Participation', 'Bureaucracy', 'c', 'Bachelor of Arts in Political Science', 'groups influence'),
(61402553, 'The National Association of Social Workers or NASW is a professional organization that:', 'academic', 'Advocates for stricter licensure requirements', 'Promotes social work research', 'Provides health insurance to social workers', 'Advocates for social justice and professional development', 'd', 'Bachelor Of Science in Social Work ', 'NASW'),
(61562264, 'What is the best task to give your students if you want them to create their own reviewers? ', 'academic', 'Summarizing Task     ', 'Outlining Task ', 'Responding task ', 'Skimming task ', 'b', 'Bachelor of Secondary Education', 'reviewers'),
(63716053, 'What does the BA stand for in BA Political Science?', 'academic', 'Balanced State', 'Bachelor of Arts', 'Bureaucratic System', 'Basic Sovereignty', 'b', 'Bachelor of Arts in Political Science', 'BA Political'),
(65668146, 'What does the nature vs. nurture debate?', 'academic', 'The role of genetics in behavior', 'The influence of society on personality', 'The impact of early childhood experiences', 'The role of hormones in aggression', 'a', 'Bachelor of Arts in Psychology', 'debate'),
(65960975, 'The principle of separation of powers is associated with which political philosopher and the structure of modern democracies?', 'academic', 'John Locke', 'Jean-Jacques Rousseau', 'Karl Marx', 'Montesquieu', 'd', 'Bachelor of Arts in Political Science', 'powers'),
(66130410, 'The study of public policies and their impact on society is known as?', 'academic', 'Political Theory', 'Comparative Politics', 'Political Economy', 'Public Policy Analysis', 'd', 'Bachelor of Arts in Political Science', 'policies'),
(69028958, 'In social work, what does the term casework refer to?', 'academic', 'Legal work for clients', 'Group therapy sessions', 'Individualized assistance and counseling for clients', 'Advocacy for social policy change', 'c', 'Bachelor Of Science in Social Work ', 'casework'),
(71284349, 'Which political concept refers to the state\'s exclusive right to make and enforce laws within its territory?', 'academic', 'Anarchy', 'Sovereignty', 'Pluralism', 'Communism', 'b', 'Bachelor of Arts in Political Science', 'enforce'),
(72007347, 'What is the term for the emotional bond that forms between an infant and their primary caregiver?', 'academic', 'Trust', 'Attachment', 'Dependency', 'Oedipus complex', 'b', 'Bachelor of Arts in Psychology', 'bond'),
(75163791, 'Reading is interactive. Which of the following supports this statement? ', 'academic', 'The complex process of reading requires the skill of speaking to pronounce the words we read', 'The mind of the reader interacts, conducts a dialogue, and actively engages with the text to decode, assign meaning, and interpret', 'Skilled readers understand the process and employ different strategies automatically at each stage', 'The process of looking at a series of written symbols and getting meaning from them', 'b', 'Bachelor of Secondary Education', 'supports'),
(77494703, 'In criminology, what is the term for the process of determining whether a particular individual committed a crime?', 'academic', 'Criminal Profiling', 'Criminal Investigation', 'Criminal Adjudication', 'Criminalization', 'b', 'Bachelor of Science in Criminology', 'determining'),
(78752465, 'What is the term for a deliberate, planned, and systematic attempt to commit a non-violent crime for financial gain?', 'academic', 'Burglary', 'Robbery', 'White-Collar Crime', 'Homicide', 'c', 'Bachelor of Science in Criminology', 'deliberate'),
(79208432, 'Reading is a Process. Which of the following justifies this statement? ', 'academic', 'The reader applies prior knowledge of the world to this act', 'The mind of the reader interacts, conducts a dialogue, and actively engages with the reading material', 'It has various stages at which different tasks need to be performed', 'It is more than just knowing words and grammar', 'c', 'Bachelor of Secondary Education', 'justifies'),
(80316740, 'What is the primary function of classroom instruction in elementary education?', 'academic', 'To develop students\' problem-solving skills', 'To oversee student behavior management', 'To deliver academic content ', 'To implement extracurricular activities', 'c', 'Bachelor of Elementary Education', 'classroom instruction'),
(80359327, 'What is the significance of multicultural education in elementary classrooms?', 'academic', 'To increase students\' athletic abilities', 'To develop students\' artistic talents', 'To promote diversity and inclusivity ', 'To analyze academic achievement gaps', 'c', 'Bachelor of Elementary Education', 'multicultural'),
(81224610, 'The study of victimology in criminology focuses on:', 'academic', 'The analysis of criminal motives', 'The investigation of unsolved crimes', 'Understanding the experiences and impact of crime on victims', 'The rehabilitation of offenders', 'c', 'Bachelor of Science in Criminology', 'victimology'),
(84999728, 'What term is used to describe a legal principle that states that a person is innocent until proven guilty in a court of law?', 'academic', 'Presumption of Guilt', 'Due Process', 'Double Jeopardy', 'Presumption of Innocence', 'd', 'Bachelor of Science in Criminology', 'innocent'),
(85234408, 'What is the primary goal of macro social work practice?', 'academic', 'Providing individual counseling', 'Promoting social justice and systemic change', 'Administering medical treatment', 'Managing caseloads', 'b', 'Bachelor Of Science in Social Work ', 'macro'),
(85796662, 'Who is known for his contributions to social and political philosophy, particularly the concept of the social contract?', 'academic', 'Karl Marx', 'John Locke', 'Jean-Jacques Rousseau', 'Thomas Hobbes', 'c', 'Bachelor of Arts in Philosophy', 'contract'),
(87145626, 'What is the branch of philosophy that deals with the nature of reality, including questions about existence, properties, and causality?', 'academic', 'Ethics', 'Metaphysics', 'Epistemology', 'Aesthetics', 'b', 'Bachelor of Arts in Philosophy', 'causality'),
(87212018, 'In sociology, the concept of socialization refers to what?', 'academic', 'The process by which individuals learn the values and norms of society', 'The analysis of political institutions', 'The study of religious beliefs', 'The impact of climate on human behaviour', 'a', 'Bachelor of Arts in Sociology', 'socialization'),
(88588034, 'It refers to the comprehension strategy that most learners use to find the main idea of a paragraph. ', 'academic', 'Skimming      ', 'Scanning                                               ', 'Summarizing ', 'Outlining ', 'b', 'Bachelor of Secondary Education', 'comprehension strategy'),
(92683736, 'When instructing your students to summarize a paragraph, what specific guidelines do you provide?', 'academic', 'Emphasizing the main idea', 'Incorporating in-class demonstrations and organizational tools', 'Prioritizing logical organization and original writing', 'Combining the main idea and logical organization', 'a', 'Bachelor of Secondary Education', 'guidelines'),
(93017043, 'What is the term for a government system in which a single ruler holds all political power and authority?', 'academic', 'Democracy', 'Monarchy', 'Republic', 'Federalism', 'b', 'Bachelor of Arts in Political Science', 'ruler'),
(94463397, 'What is the primary focus of social work practice?', 'academic', 'Providing medical treatment', 'Advocating for social justice and equality', 'Conducting psychological assessments', 'Administering legal services', 'b', 'Bachelor Of Science in Social Work ', 'What is the primary focus of social work practice'),
(96911485, 'In classical conditioning, what is the unconditioned response (UCR)?', 'academic', 'The learned response to the conditioned stimulus', 'The response caused by the conditioned stimulus', 'The unlearned response to the unconditioned stimulus', 'The neutral response before conditioning', 'c', 'Bachelor of Arts in Psychology', 'UCR'),
(97610054, 'Which of the following is a core component of the Elementary Education?', 'academic', 'Educational Psychology', 'Botany', 'Political Science', 'Digital Art', 'a', 'Bachelor of Elementary Education', 'Which of the following is a core component of the Elementary Education'),
(98125422, 'What is the term for the study of patterns of social relationships and interactions in everyday life?', 'academic', 'Microsociology', 'Macrosociology', 'Structural Sociology', 'Cultural Sociology', 'a', 'Bachelor of Arts in Sociology', 'social relationships'),
(98297845, 'Which branch of political science studies the behavior and decisions of individuals and groups in the political context?', 'academic', 'Political Philosophy', 'International Relations', 'Comparative Politics', 'Political Behavior', 'd', 'Bachelor of Arts in Political Science', 'context'),
(98447274, 'The strengths based perspective in social work emphasizes to?', 'academic', 'Identifying and focusing on individuals\' weaknesses', 'Building on individuals existing strengths and resources', 'Diagnosing mental health conditions', 'Managing conflicts in families', 'b', 'Bachelor Of Science in Social Work ', 'based'),
(98973254, 'In political science, what is the term for a group of people living within the same geographic area, with a shared government and laws?', 'academic', 'Nation', 'Organization', 'Colony', 'Alliance', 'a', 'Bachelor of Arts in Political Science', 'geographic'),
(99609125, 'Which subject is an essential part of the Elementary Education?', 'academic', 'Chemistry', 'Literacy Education', 'Philosophy', 'Environmental Science', 'b', 'Bachelor of Elementary Education', 'Which subject is an essential part of the Elementary Education');

-- --------------------------------------------------------

--
-- Table structure for table `question_humss_int`
--

CREATE TABLE `question_humss_int` (
  `id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `qtype` varchar(255) NOT NULL,
  `assigned_course` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_humss_int`
--

INSERT INTO `question_humss_int` (`id`, `question_text`, `qtype`, `assigned_course`, `keyword`) VALUES
(13249533, 'Are you comfortable with abstract reasoning and critical thinking? ', 'interest', 'Bachelor of Arts in Philosophy', 'reasoning'),
(13892412, 'Do you have a curiosity about the interactions between different social groups and their dynamics? ', 'interest', 'Bachelor of Arts in Sociology', 'curiosity'),
(16339543, 'Do you have an interest in the history of philosophical thought and influential philosophers?  ', 'interest', 'Bachelor of Arts in Philosophy', 'influential'),
(16399962, 'Are you interested in staying current with educational trends and techniques for secondary education?', 'interest', 'Bachelor of Secondary Education', 'current'),
(17372662, 'Is the study of logic and argumentation something that interests you? ', 'interest', 'Bachelor of Arts in Philosophy', 'argumentation'),
(18074123, 'Do you have a strong sense of ethics and justice?', 'interest', 'Bachelor of Science in Criminology', 'ethics'),
(20247775, 'Are you passionate about social justice and advocacy work?', 'interest', 'Bachelor of Arts in Political Science', 'advocacy work'),
(21268767, 'Do you enjoy analyzing crime statistics and trends?', 'interest', 'Bachelor of Science in Criminology', 'analyzing crime'),
(22126645, 'Do you enjoy building relationships and connecting with people to provide support and guidance?', 'interest', 'Bachelor Of Science in Social Work ', 'support'),
(22375652, 'Would you like to develop strong research and data analysis skills?  ', 'interest', 'Bachelor of Arts in Sociology', 'analysis'),
(23325031, 'Is the idea of being a role model and mentor for young learners appealing to you?', 'interest', 'Bachelor of Elementary Education', 'mentor'),
(24755469, 'Are you interested in teaching and working with adolescents and young adults?', 'interest', 'Bachelor of Secondary Education', 'adolescents'),
(25074442, 'Are you interested in helping people improve their lives and overcome difficult situations?', 'interest', 'Bachelor Of Science in Social Work ', 'difficult'),
(28453485, 'Are you interested in understanding human behavior and thought processes?', 'interest', 'Bachelor of Arts in Psychology', 'understanding human'),
(28743638, 'Are you open to considering a career in fields that value philosophical thinking, such as academia or law?', 'interest', 'Bachelor of Arts in Philosophy', 'academia'),
(29210052, 'Do you enjoy reading and analyzing complex texts and ideas? ', 'interest', 'Bachelor of Arts in Philosophy', 'complex'),
(31044244, 'Are you interested in pursuing a career in education or related fields such as curriculum development, educational policy, or educational research?', 'interest', 'Bachelor of Secondary Education', 'policy'),
(31055529, 'Do you have good communication skills?', 'interest', 'Bachelor of Arts in Political Science', 'good'),
(31630239, 'Are you interested in analyzing social problems and finding solutions to address them?', 'interest', 'Bachelor of Arts in Sociology', 'solutions'),
(32064526, 'Do you enjoy studying and analyzing real-life scenarios?', 'interest', 'Bachelor of Arts in Psychology', 'scenarios'),
(32230408, 'Is understanding and addressing societal challenges through sociology something you\'re passionate about? ', 'interest', 'Bachelor of Arts in Sociology', 'societal challenges'),
(33301994, 'Do you have an interest in the academic and personal development of teenagers?  ', 'interest', 'Bachelor of Secondary Education', 'personal'),
(34229915, 'Are you willing to work in a field that often involves working with vulnerable populations?', 'interest', 'Bachelor Of Science in Social Work ', 'vulnerable'),
(34700121, 'Are you interested in the relationship between government and society?', 'interest', 'Bachelor of Arts in Political Science', 'relationship between'),
(37724959, 'Are you interested in pursuing a career in education or related fields such as educational administration, curriculum design, or teacher training?', 'interest', 'Bachelor of Secondary Education', 'administration'),
(37758033, 'Are you interested in pursuing a career in research, social services, or related fields that require a strong understanding of human behavior and social dynamics?', 'interest', 'Bachelor of Arts in Sociology', 'social dynamics'),
(38306728, 'Can you see yourself participating in internships or field experiences related to politics?', 'interest', 'Bachelor of Arts in Political Science', 'internships'),
(38650767, 'Do you have an interest in understanding the role of government in society and the impact of political decisions?', 'interest', 'Bachelor of Arts in Political Science', 'Do you have an interest in understanding the role of government in society and the impact of political decisions'),
(39747580, 'Are you interested in learning how to administer and interpret psychological assessments?', 'interest', 'Bachelor of Arts in Psychology', 'administer'),
(42409144, 'Are you fascinated by the criminal justice system and how it operates?', 'interest', 'Bachelor of Science in Criminology', 'operates'),
(42664321, 'Are you interested in understanding how society and social structures shape human behavior?', 'interest', 'Bachelor of Arts in Sociology', 'shape human'),
(42701948, 'Do you enjoy learning about different cultures, societies, and social norms?', 'interest', 'Bachelor of Arts in Sociology', 'norms'),
(42835144, 'Would you like to learn how to conduct research studies in psychology?', 'interest', 'Bachelor of Arts in Psychology', 'research studies'),
(43252182, 'Do you find satisfaction in completing projects that involve applying psychological knowledge to real-world situations?', 'interest', 'Bachelor of Arts in Psychology', 'real-world'),
(44088133, 'Do you enjoy studying theories and models in criminology?', 'interest', 'Bachelor of Science in Criminology', 'models'),
(44996999, 'Are you interested in studying the nature of crime and criminal behavior?', 'interest', 'Bachelor of Science in Criminology', 'nature'),
(46677128, 'Do you enjoy learning about political theories and philosophies?', 'interest', 'Bachelor of Arts in Political Science', 'philosophies'),
(48125460, 'Do you enjoy working with young children and helping them develop their cognitive, social, and emotional skills?', 'interest', 'Bachelor of Elementary Education', 'emotional skills'),
(48383809, 'Are you interested in exploring different teaching methodologies, curriculum development, and assessment strategies for elementary education?', 'interest', 'Bachelor of Elementary Education', 'Are you interested in exploring different teaching methodologies, curriculum development, and assessment strategies for elementary education'),
(48664971, 'Do you like to communicate and interact with people from diverse backgrounds?', 'interest', 'Bachelor of Arts in Psychology', 'communicate'),
(48792831, 'Do you enjoy helping people overcome challenges and obstacles?', 'interest', 'Bachelor Of Science in Social Work ', 'obstacles'),
(50274673, 'Is the pursuit of knowledge and understanding through philosophy something you\'re passionate about?', 'interest', 'Bachelor of Arts in Philosophy', 'pursuit'),
(50956351, 'Would you like to develop strong analytical and critical thinking skills?', 'interest', 'Bachelor of Arts in Philosophy', 'analytical'),
(51774426, 'Is the idea of addressing issues such as poverty, addiction, and mental health appealing to you?', 'interest', 'Bachelor Of Science in Social Work ', 'poverty'),
(52605882, 'Do you have a desire to study the teaching and development of young learners as part of your education?', 'interest', 'Bachelor of Elementary Education', 'teaching and development'),
(55113869, 'Do you see yourself as a teacher and a lifelong learner, constantly striving to improve your own knowledge and skills in the field of education?', 'interest', 'Bachelor of Elementary Education', 'lifelong'),
(55648674, 'Are you curious about how Philosophy can enhance your ability to express and defend your ideas effectively?', 'interest', 'Bachelor of Arts in Philosophy', 'defend'),
(56526892, 'Would you like to develop teaching skills in areas such as lesson planning, assessment, and classroom instruction? ', 'interest', 'Bachelor of Elementary Education', 'lesson'),
(56932096, 'Are you interested in understanding how political systems work?', 'interest', 'Bachelor of Arts in Political Science', 'systems'),
(56974400, 'Are you interested in pursuing a career in government, law, or public service?', 'interest', 'Bachelor of Arts in Political Science', 'public'),
(57871588, 'Is the idea of being a positive influence and role model for young adults appealing to you?', 'interest', 'Bachelor of Secondary Education', 'role model for'),
(59159834, 'Are you enthusiastic about creating an engaging and inspiring classroom environment for your students?', 'interest', 'Bachelor of Secondary Education', 'enthusiastic'),
(59222534, 'Are you open to working in challenging environments?', 'interest', 'Bachelor of Science in Criminology', 'challenging'),
(59871528, 'Are you passionate about teaching and helping children develop their cognitive, social, emotional, and physical skills?', 'interest', 'Bachelor of Elementary Education', 'physical'),
(60241286, 'Do you enjoy exploring different teaching methodologies, curriculum development, and assessment strategies for secondary education?', 'interest', 'Bachelor of Secondary Education', 'strategies for secondary education'),
(60455277, 'Is the study of social inequality and its effects on society something that intrigues you? ', 'interest', 'Bachelor of Arts in Sociology', 'inequality'),
(61037344, 'Are you open to learning about international relations, and comparative politics?', 'interest', 'Bachelor of Arts in Political Science', 'comparative'),
(61346311, 'Are you interested in exploring the root causes of crime and social deviance?', 'interest', 'Bachelor of Science in Criminology', 'root'),
(61651066, 'Do you have a desire to study criminology as part of your education?', 'interest', 'Bachelor of Science in Criminology', 'Do you have a desire to study criminology as part of your education'),
(62935268, 'Are you interested in exploring the impact of social institutions on individuals and communities? ', 'interest', 'Bachelor of Arts in Sociology', 'communities'),
(64119845, 'Do you see yourself working with other professionals, such as psychologists and healthcare providers?', 'interest', 'Bachelor Of Science in Social Work ', 'providers'),
(64495886, 'Are you interested in learning about different types of therapy and counseling techniques?', 'interest', 'Bachelor of Arts in Psychology', 'counseling'),
(69338098, 'Are you interested in teaching a variety of subjects to elementary school students?', 'interest', 'Bachelor of Elementary Education', 'subjects'),
(73547419, 'Do you enjoy asking and exploring philosophical questions about the meaning of life, the nature of reality, or the existence of God?', 'interest', 'Bachelor of Arts in Philosophy', 'God'),
(75694439, 'Can you envision yourself conducting social research and contributing to our understanding of society?', 'interest', 'Bachelor of Arts in Sociology', 'contributing'),
(81614260, 'Can you envision working collaboratively with fellow educators and school staff to enhance the educational experience for students?', 'interest', 'Bachelor of Secondary Education', 'envision'),
(82683960, 'Are you interested in learning about the history of philosophy and the different schools of thought that have shaped human thinking? ', 'interest', 'Bachelor of Arts in Philosophy', 'shaped'),
(83824003, 'Are you interested in working with young children and helping them learn and grow?', 'interest', 'Bachelor of Elementary Education', 'grow'),
(84734125, 'Are you interested in learning about the theories and concepts of psychology?', 'interest', 'Bachelor of Arts in Psychology', 'Are you interested in learning about the theories and concepts of psychology'),
(85518341, 'Is making a positive impact on society through social work something you\'re passionate about?', 'interest', 'Bachelor Of Science in Social Work ', 'positive impact on society'),
(86145677, 'Do you have an interest in understanding the factors that influence criminal behavior and societal responses?', 'interest', 'Bachelor of Science in Criminology', 'responses'),
(86146839, 'Do you enjoy analyzing and interpreting data and statistics?', 'interest', 'Bachelor of Arts in Psychology', 'data and statistics'),
(90061479, 'Do you enjoy working with individuals to help solve problems and improve mental health?', 'interest', 'Bachelor of Arts in Psychology', 'solve'),
(91630098, 'Do you enjoy conducting research and analyzing data related to social issues?', 'interest', 'Bachelor Of Science in Social Work ', 'analyzing data'),
(92544498, 'Are you comfortable working with diverse groups of people, including those from different cultures and backgrounds?', 'interest', 'Bachelor Of Science in Social Work ', 'diverse groups'),
(94533026, 'Can you visualize yourself adapting your teaching style to meet the diverse needs of your secondary students?', 'interest', 'Bachelor of Secondary Education', 'style'),
(95761596, 'Can you envision a career in areas like criminal investigation, forensic science, or victim advocacy?', 'interest', 'Bachelor of Science in Criminology', 'victim'),
(97632528, 'Do you enjoy researching and analyzing political data and information?', 'interest', 'Bachelor of Arts in Political Science', 'information'),
(97955971, 'Can you see yourself working in a variety of settings, including schools, hospitals, or nonprofit organizations?', 'interest', 'Bachelor Of Science in Social Work ', 'hospitals'),
(98274653, 'Are you passionate about teaching and making a positive impact on the lives of children?', 'interest', 'Bachelor of Elementary Education', 'positive impact on the');

-- --------------------------------------------------------

--
-- Table structure for table `question_stem_acad`
--

CREATE TABLE `question_stem_acad` (
  `id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `qtype` varchar(255) NOT NULL,
  `a` varchar(255) NOT NULL,
  `b` varchar(255) NOT NULL,
  `c` varchar(255) NOT NULL,
  `d` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `assigned_course` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_stem_acad`
--

INSERT INTO `question_stem_acad` (`id`, `question_text`, `qtype`, `a`, `b`, `c`, `d`, `correct_answer`, `assigned_course`, `keyword`) VALUES
(11381873, 'What is the term for a psychological disorder characterized by an extreme and irrational fear of a specific object or situation?', 'academic', 'Bipolar disorder', 'Antisocial personality disorder', 'Phobia', 'Attention-deficit/hyperactivity disorder (ADHD)', 'c', 'Bachelor of Science in Psychology', 'characterized'),
(11561166, ' An engine that also known as air-cooled engine is:', 'academic', 'internal combustion engine', 'external combustion engine', 'indirect cooling', 'direct cooling', 'a', 'Bachelor of Science in Industrial Technology major in Automotive Technology', ' An engine that also known as air-cooled engine is:'),
(11563466, 'The main memory of a computer.', 'academic', 'Primary Storage', 'ROM', 'RAM', 'Secondary Storage', 'c', 'Bachelor of Science in Computer Engineering', 'main memory'),
(11789554, 'Which part of the brain is primarily responsible for processing emotions and plays a key role in the fight-or-flight response? ', 'academic', 'Hippocampus', 'Frontal cortex', 'Amygdala', 'Cerebellum', 'c', 'Bachelor of Science in Psychology', 'key role'),
(12522041, 'What exactly does RAM stand for?', 'academic', 'Review Admittance Monitor	', 'Review Admittance Memory	', 'Random Access Memory', 'Random Access Monitor', 'c', 'Bachelor of Science in Information Technology', 'RAM stand'),
(13057491, 'What is the frequency? ', 'academic', 'The number of complete cycles from one direction to the other', 'The resistance of a circuit', 'The voltage of a circuit', 'The impedance of a circuit', 'a', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'frequency'),
(18211038, 'What is the term for the process of encoding, storing, and retrieving information in memory?', 'academic', 'Conditioning', 'Learning', 'Cognition', 'Memory', 'd', 'Bachelor of Science in Psychology', 'encoding'),
(18459974, 'A collection of instructions, data, or programs used to run computers and carry out certain activities.', 'academic', 'Hardware', 'Operating System', 'Software', 'Controllers', 'c', 'Bachelor of Science in Information Technology', 'carry out'),
(18825271, 'Component that attached to the end of one of the cables, so that it may be connected to the work.', 'academic', 'Electrode holder', 'Ground clamp', 'Welding mask', 'Flux-cored wire', 'a', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'cables'),
(18998183, 'The load of an electric circuit is:', 'academic', 'The length of the circuit', 'The amount of power consumed by a circuit', 'The impedance of a circuit', 'None of the above', 'b', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'The load of an electric circuit is:'),
(19770793, 'It is a metallurgy process that involves the use of heat to manipulate the shape, as well as other physical properties of metal.', 'academic', 'Stamping', 'Etching', 'Heat treatment', 'Core drilling', 'c', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'metallurgy'),
(20223090, 'It is the metal and plastic box that contains the main components of the computer, including the motherboard, central processing unit (CPU), and power supply.', 'academic', 'System Unit', 'CPU', 'Hard Case', 'Hardware', 'a', 'Bachelor of Science in Computer Engineering', 'CPU'),
(20299157, 'Compression Ignition Engine is an engine called for:', 'academic', 'Gasoline Engine ', 'Diesel engine ', 'Rotary engine ', 'LPG engine', 'b', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'compression ignition'),
(20705989, 'In probability theory, what is the term for the ratio of the number of successful outcomes to the total number of possible outcomes in an experiment?', 'academic', 'Mean', 'Median', 'Variance', 'Probability', 'd', 'Bachelor of Science in Applied Mathematics', 'probability'),
(21116179, 'Ohm’s law states', 'academic', 'The voltage across a resistor is not equal to the product of the resistance and the current flowing through it.', 'The voltage across a resistor is equal to the product of the resistance and the current flowing through it.', 'The voltage across a resistor is greater than the product of the resistance.', 'The voltage across a resistor is equal to the current flowing through it.', 'b', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'law'),
(21375919, 'What is a programming language?', 'academic', 'A programming language is a way to communicate with animals.', 'A programming language is a type of cooking technique.', 'A programming language is a formal language with a set of rules and syntax used to write computer programs.', 'A programming language is a type of weather pattern.', 'c', 'Bachelor of Science in Computer Science', 'language'),
(21868759, 'The electrode angle as seen from the end view.', 'academic', 'Travel angle', 'Work angle', 'Lead angle', 'Electrode angle', 'd', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'electrode angle as'),
(22406358, 'Flammable materials should be removed from the welding area or shielded from sparks and spatter to avoid?', 'academic', 'Electrical shock', 'Environmental pollution', 'Welding defects', 'Fire hazards', 'd', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'flammable'),
(22771757, 'It is a tool holder for a single-point cutting tool that sweeps the tool in a circle over the surface of a fixed work piece.', 'academic', 'End mill', 'Drill bit', 'Tool bit', 'Fly cutter ', 'd', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'tool holder'),
(24734183, 'Parts of automobile on which all the parts are attached.', 'academic', 'running gear ', 'power train ', 'body ', 'frame', 'd', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'parts of automobile'),
(25841235, 'What are the colors called that are made by mixing primary and secondary colors?', 'academic', 'Schematic colors ', 'Tertiary Colors ', 'Monochromatic colors ', 'Secondary colors', 'b', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'mixing'),
(27011637, 'In a series circuit, the total resistance is equal to:', 'academic', 'The sum of the individual resistances', 'The average of the individual resistances', 'The difference between the individual resistances', 'The product of the individual resistances', 'a', 'Bachelor of Science in Electrical Engineering', 'series circuit'),
(28914156, 'ASTM stands for?', 'academic', 'American Society for Testing and Materials', 'Advanced Standard Testing Methods', 'Association of Steel and Metalworkers', 'Automated System for Technical Measurements', 'a', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'ASTM'),
(29969903, 'What is the area of a triangle with base length 8 units and height 6 units?', 'academic', '24 square units', '14 square units', '48 square units', '28 square units', 'a', 'Bachelor of Science in Applied Mathematics', 'length'),
(30580498, 'It is any piece of computer hardware equipment which converts information into human-readable form', 'academic', 'Software', 'Hardware ', 'Input Device', 'Output Device', 'd', 'Bachelor of Science in Computer Engineering', 'readable'),
(30911755, 'Which branch of mathematics deals with the study of patterns, shapes, and properties of figures and spaces, such as geometry and trigonometry?', 'academic', 'Algebra', 'Calculus', 'Geometry', 'Statistics', 'c', 'Bachelor of Science in Applied Mathematics', 'trigonometry'),
(31563768, 'Easily transforms data into mathematical formulas and enables for easy data management.', 'academic', 'Microsoft Excel', 'Microsoft Vision', 'Microsoft Word', 'Microsoft PowerPoint', 'a', 'Bachelor of Science in Information Technology', 'enables for easy'),
(32385057, 'What is the solution to the equation 2x + 3 = 7?', 'academic', 'x = 5', 'x = 2', 'x = 3', 'x = 1', 'a', 'Bachelor of Science in Applied Mathematics', 'equation'),
(32534865, ' It is a special type of milling machine that machines gear rapidly and effectively.', 'academic', 'Vertical milling machine', 'Honing machine', 'Gear hobbing machine', 'Boring machine', 'c', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'milling'),
(35111306, 'Two wires run to a machine. One wire is 10mm thick, and the other is 5mm. If the two wires are carrying the same current, the larger wire:', 'academic', 'Requires less voltage', 'Requires more voltage', 'Requires the same voltage', 'It cannot be determined from the information given', 'a', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'wires run'),
(35739717, 'What is a compiler?', 'academic', 'A compiler is a type of musical instrument.', 'A compiler is a type of bird.', 'A compiler is a software program that translates source code written in a programming language into a lower-level language, such as machine code, that can be executed by a computer.', 'A compiler is a type of vehicle.', 'c', 'Bachelor of Science in Computer Science', 'compiler'),
(35978509, 'It makes wide lines depending on the width of the point. It is generally used in shading a penciled outline drawing.', 'academic', 'Chisel point ', 'Elliptical Point', 'Boarder Line', 'Dull point', 'a', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'penciled'),
(37477119, 'Which component allows current to flow in only one direction?', 'academic', 'Resistor', 'Capacitor', 'Diode', 'Inductor', 'c', 'Bachelor of Science in Electrical Engineering', 'current to flow'),
(38245743, 'What are the colors touching each other on the color wheel called?', 'academic', 'Complementary colors', 'Schematic colors ', 'Analogous colors ', 'Monochromatic color', 'c', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'touching'),
(38688078, 'Who is often considered the founder of modern psychology and is known for establishing the first psychology laboratory in 1879? ', 'academic', 'Sigmund Freud', 'B.F. Skinner', 'William James', 'Wilhelm Wundt', 'd', 'Bachelor of Science in Psychology', 'founder'),
(39381891, 'Which of the following is a valid representation of the irrational number √10 in decimal form? ', 'academic', '3.14', '1.732', '2.236', '2.718', 'c', 'Bachelor of Science in Applied Mathematics', 'irrational number'),
(41455664, 'Direct cooling engine is another term used as:', 'academic', 'air cooled engine ', 'water cooled engine', 'spray cooled engine ', 'coolant engine', 'b', 'Bachelor of Science in Industrial Technology major in Automotive Technology', ''),
(42366392, 'What is a firewall?', 'academic', 'A firewall is a network security device that monitors and controls incoming and outgoing network traffic based on predetermined security rules.', 'A firewall is a tool for fighting fires.', 'A firewall is a type of software for designing buildings.', 'A firewall is a type of musical instrument.', 'a', 'Bachelor of Science in Computer Science', 'firewall'),
(43391566, 'The grade of pencil that is used for line work is:', 'academic', '2H', '4H', '6B', 'HB', 'd', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'grade'),
(43537282, 'A type of engine where in the fuel is burned outside the engine.', 'academic', 'internal combustion ', 'external combustion ', 'indirect combustion ', 'direct', 'b', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'fuel is '),
(43641722, 'Which of the following is a prime number? ', 'academic', '1', '4', '7', '9', 'c', 'Bachelor of Science in Applied Mathematics', 'prime'),
(44527184, 'Are commonly referred to as software and it is also a set of instructions that the computer follows to perform a task.', 'academic', 'Program', 'Instructions', 'Software', 'Hardware', 'a', 'Bachelor of Science in Computer Engineering', 'task'),
(47435484, 'It is a form of energy resulting from the flow of electric charge.', 'academic', 'Electrical Energy', 'Potential Difference', 'Work', 'Power', 'a', 'Bachelor of Science in Electrical Engineering', 'charge'),
(48097652, 'What is the term for a polygon with six sides?', 'academic', 'Hexagon', 'Octagon', 'Pentagon', 'Decagon', 'a', 'Bachelor of Science in Applied Mathematics', 'polygon'),
(48472142, 'Which of the following is an example of an anxiety disorder? ', 'academic', 'Bipolar disorder', 'Schizophrenia', 'Obsessive-Compulsive Disorder (OCD)', 'Alzheimer\'s disease', 'c', 'Bachelor of Science in Psychology', 'anxiety disorder'),
(49062449, 'What is cybersecurity?', 'academic', 'Cybersecurity involves protecting computer systems, networks, and data from unauthorized access, theft, damage, or disruption. ', 'Cybersecurity is a branch of psychology that studies online behavior.', 'Cybersecurity is a form of virtual reality gaming.', 'Cybersecurity is a type of computer programming language.', 'a', 'Bachelor of Science in Computer Science', 'cyber'),
(49368957, 'The electrode angle from the vertical plane in the direction of welding.', 'academic', 'Travel angle', 'Work angle', 'Lead angle', 'Electrode angle', 'b', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'electrode angle from'),
(49673467, 'The liquid that circulates through the engine to prevent overheating is:', 'academic', 'Water ', 'Coolant', 'Antifreeze ', 'None of the above', 'b', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'overheating'),
(49680376, 'An electric circuit is:', 'academic', 'Conducting material from the load to the power source', 'Conducting material from the power source to the load', 'A loop of conducting material that goes from a power source to the load and back', 'None of the above', 'c', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'An electric circuit is:'),
(49803753, 'According to Article 4.211, what does it cover?', 'academic', 'Switches switching devices, and circuit breakers ', 'Receptacles, cord connectors, and attachment plugs', 'Fixure (luminaire) wires', 'Appliances', 'c', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'According to Article 4.211, what does it cover'),
(49814191, 'The five system required an engine to run are:', 'academic', 'Fuel tank, fuel pump, carburetor, ignition and starter', 'Battery, fuel pump, carburetor, oil and strainer', 'Oil, coolant, gasoline, air and starting', 'Fuel, ignition, lubrication, cooling and starting', 'd', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'five'),
(50444139, 'Which article covers transformers and transformer vaults?', 'academic', 'Article 4.10', 'Article 4.22', 'Article 4.24', 'Article 4.50', 'd', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'vaults'),
(50495891, 'What is the relationship between voltage, current, and resistance in a circuit?', 'academic', 'V = I/R', 'I = V/R', 'R = V/I', 'V = I + R', 'a', 'Bachelor of Science in Electrical Engineering', 'voltage'),
(51933399, 'In behaviorism, what is the process by which a behavior is strengthened through the presentation of a positive stimulus following that behavior? ', 'academic', 'Punishment', 'Extinction', 'Reinforcement', 'Modeling', 'c', 'Bachelor of Science in Psychology', 'stimulus'),
(52259333, 'During this stroke both the intake and exhaust valve are close for air-fuel compression.', 'academic', 'intake stroke ', 'compression stroke ', 'power stroke ', 'exhaust stroke', 'b', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'exhaust'),
(52762373, 'A machine that turn workpiece by rotating it against a fixed cutting tool.', 'academic', 'Drill press', 'Lathe machine', 'Milling machine', 'Press machine', 'b', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'fixed cutting'),
(54449846, 'What does the term stand for in AC circuits?', 'academic', 'Alternating Current', 'Alternating Capacitance', 'Amperes and Capacitors', 'Ampere Charge', 'a', 'Bachelor of Science in Electrical Engineering', 'AC circuits'),
(54475106, 'What is the SI unit of electrical current?', 'academic', 'Volt (V)', 'Ampere (A)', 'Ohm (Ω)', 'Watt (W)', 'b', 'Bachelor of Science in Electrical Engineering', 'SI unit'),
(55208834, 'What is a database?', 'academic', 'A database is a structured collection of data organized and stored in a way that allows for efficient retrieval, modification, and management of information. ', 'A database is a type of fashion accessory.', 'A database is a popular dance move.', 'A database is a type of fast food.', 'a', 'Bachelor of Science in Computer Science', 'database'),
(55716636, 'Which article covers luminaires (lighting fixtures), lamp holders, and lamps?', 'academic', 'Article 4.8 ', 'Article 4.10', 'Article 4.22', 'Article 4.24', 'b', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'luminaires'),
(55761413, 'The best pencil point for freehand drawing.', 'academic', 'Dull point', 'Conical point', 'Elliptical point', 'Chisel point', 'c', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'freehand'),
(56349797, 'It is the mixture of two or more metallic elements.', 'academic', 'Solution', 'Alloy', 'Amalgam', 'Metalloid', 'b', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'mixture of two'),
(57174996, 'any storage device beyond the primary storage that enables permanent data storage.', 'academic', 'Primary Storage', 'ROM', 'RAM', 'Secondary Storage ', 'd', 'Bachelor of Science in Computer Engineering', 'permanent'),
(57373410, 'It refers to metal’s susceptibility to breakage.', 'academic', 'Ductility', 'Brittleness', 'Malleability', 'Elasticity', 'b', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'susceptibility'),
(58828912, 'It is the main source of automobile power.', 'academic', 'generator', 'engine ', 'power train', 'all of the above', 'b', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'source'),
(59359253, 'This a tool uses to draw non-circular curves such as spirals and ellipses.', 'academic', 'French Curve ', 'Compass ', 'Templates ', 'Divider', 'a', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'non'),
(59921442, 'Microsoft software that generates a slide show containing significant data, charts, and graphics for a presentation.', 'academic', 'Microsoft Excel', 'Microsoft Vision', 'Microsoft Word', 'Microsoft PowerPoint', 'd', 'Bachelor of Science in Information Technology', 'microsoft'),
(60195331, 'The physical devices that a computer is made of:', 'academic', 'Input Devices', 'Hardware', 'Software', 'Computer', 'b', 'Bachelor of Science in Computer Engineering', 'devices'),
(60583973, 'According to Erik Erikson\'s theory of psychosocial development, what is the primary crisis that occurs during adolescence?', 'academic', 'Trust vs. Mistrust', 'Autonomy vs. Shame and Doubt', 'Identity vs. Role Confusion', 'Generativity vs. Stagnation', 'c', 'Bachelor of Science in Psychology', 'Erik'),
(60811273, 'These are letters which are written in slanted form.', 'academic', 'Single Stroke Gothic ', 'Script ', 'Old English', 'Italic Letter', 'd', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'slanted'),
(62130186, 'What is a resistive circuit?', 'academic', 'A circuit that contains a power source and resistors', 'Any electrical circuit', 'A circuit that contains any combination of capacitors and resistors.', 'None of the above', 'a', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'resistive'),
(62924914, 'What is object-oriented programming (OOP)?', 'academic', 'Object-oriented programming is a type of board game.', 'Object-oriented programming is a form of exercise.', 'Object-oriented programming is a programming paradigm that organizes data and behavior into objects, which are instances of classes.', 'D. Object-oriented programming is a type of art style.', 'c', 'Bachelor of Science in Computer Science', 'OOP'),
(63509571, 'Which of the following is an example of a transcendental number? ', 'academic', '√2', ' π (pi)', '3', '0', 'b', 'Bachelor of Science in Applied Mathematics', 'transcendental'),
(64152581, 'Is residential power AC or DC current?', 'academic', 'Residential power is AC', 'Residential power is DC', 'Residential power is neither', 'None of the above', 'a', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'DC'),
(64476567, 'It is a mechanical property commonly described as a material& amenability to', 'academic', 'Ductility', 'Malleability', 'Brittleness', 'Hardness', 'a', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'amenability'),
(65988716, 'What is HTML?', 'academic', 'HTML (Hypertext Markup Language) is the standard markup language used for creating web pages and applications on the World Wide Web.', 'HTML is a type of metal.', 'HTML is a form of government.', 'HTML is a breed of cat.', 'a', 'Bachelor of Science in Computer Science', 'HTML'),
(67096101, 'What is data mining?', 'academic', 'Data mining is the process of discovering patterns, trends, and insights from large datasets. Data mining is used in various fields, including business, healthcare, finance, and marketing.', 'Data mining is the process of discovering patterns, trends, and insights from small datasets.', 'Data mining is the process of encrypting data for secure storage.', 'Data mining is a method for extracting minerals from the earth.', 'a', 'Bachelor of Science in Computer Science', 'mining'),
(69730155, 'The series of events repeated in same regular order is called;', 'academic', 'stroke', 'cycle ', 'revolution ', 'Piston stroke', 'b', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'regular'),
(71300048, 'AWS stands for?', 'academic', 'American Welding Society', 'Advanced Welding Solutions', 'Automated Welding Systems', 'Arc Welding Standards', 'a', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'AWS'),
(71646982, 'What is the difference between alternating and direct current?', 'academic', 'Direct current reverses direction periodically and alternating current flows in one direction.', 'Alternating current reverses direction and direct current flows in one direction.', 'Both alternating and direct current periodically reverse direction.', 'Both alternating and direct current flow in one direction only', 'b', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'alternating'),
(72663701, 'Keys refer to all the letters and numbers on the keyboard, i.e. A-Z and 0-9. These keys are used for typing numbers, symbols, and letters.', 'academic', 'Special Keys	', 'Punctuation Keys	', 'Alphanumeric Keys', 'Standard Keys', 'c', 'Bachelor of Science in Information Technology', 'A-Z'),
(72869548, 'What is the derivative of the function f(x) = 2x^3 with respect to x? ', 'academic', '3x^2', '4x^2', '6x^2', '2x^4', 'a', 'Bachelor of Science in Applied Mathematics', 'respect'),
(73463820, 'Which component in a circuit stores electrical energy?', 'academic', 'Resistor', 'Capacitor', 'Diode', 'Inductor', 'b', 'Bachelor of Science in Electrical Engineering', 'stores electrical energy'),
(73610808, 'What is an example of an operating system?', 'academic', 'Microsoft Office		', 'Microsoft Word', 'Microsoft Licenses', 'Microsoft Windows', 'd', 'Bachelor of Science in Information Technology', 'operating'),
(74496300, 'Egyptians are known to their picture words. This picture is commonly known as:', 'academic', 'Pictographs', 'Cuneiform ', 'Hieroglyphics ', 'Alphabet', 'c', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'egyptians'),
(74616165, 'In a geometric progression, what is the common ratio if the first term is 5 and the second term is 10? ', 'academic', '2', '0.5', '5', '15', 'b', 'Bachelor of Science in Applied Mathematics', 'geometric'),
(74697552, 'Ferrous metals are those containing significant amount of what metallic ', 'academic', 'Aluminum', 'Copper', 'Silver', 'Iron', 'd', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'ferrous'),
(75382275, 'Keys refer to all the keys which have punctuation marks, like commas, periods, semicolons, brackets, parentheses, and so on.', 'academic', 'Special Keys	', 'Punctuation Keys	', 'Alphanumeric Keys', 'Standard Keys', 'b', 'Bachelor of Science in Information Technology', 'semi'),
(77206744, 'It is an electronic machine that accepts information (DATA) and process it according to specific instructions', 'academic', 'Machine', 'Computer', 'System', 'Microprocessor', 'b', 'Bachelor of Science in Computer Engineering', 'specific instructions'),
(77455537, 'Works with a video card, located inside the computer case, to display images and text on the screen	', 'academic', 'Monitor', 'Input Device', 'Output Device', 'Hardware', 'a', 'Bachelor of Science in Computer Engineering', 'video card'),
(77658825, 'Which divisions are included in Class I locations? ', 'academic', 'Divisions 1 and 2', 'Divisions 3 and 4', 'Divisions 5 and 6', 'Divisions 7 and 8', 'a', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'class'),
(78382877, 'What is a server?', 'academic', 'A server is a computer or system that provides resources, services, or data to other computers or clients on a network. ', 'A server is a type of restaurant.', 'A server is a type of satellite.', 'A server is a kind of tree.', 'a', 'Bachelor of Science in Computer Science', 'server'),
(78978964, 'According to the Individual Circuits section, what should be the rating of an individual branch', 'academic', 'Less than the marked rating of the appliance', 'Equal to the marked rating of the appliance', '125 percent of the marked rating for continuously loade', 'Determined in accordance with 2.10.2.4', 'c', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'section'),
(79444856, 'What does Article 4.24 cover?', 'academic', 'Appliances', 'Fixed electric space-heating equipment', 'Transformers and transformer vaults', 'Receptacles, cord connectors, and attachment plugs ', 'b', 'Bachelor of Science in Industrial Technology major in Electrical Technology', '4.24 cover'),
(79719257, 'Is a mechanical device on the end of the welding which clamps the welding rod or electrode.', 'academic', 'Electrode holder', 'Ground clamp', 'Welding torch', 'Wire feeder', 'a', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'rod or'),
(81723597, 'Which branch of psychology focuses on understanding and explaining individual differences in behavior and personality?', 'academic', 'Clinical psychology', 'Developmental psychology', 'Cognitive psychology', 'Personality psychology', 'd', 'Bachelor of Science in Psychology', 'personality'),
(82377320, 'Serves as the brain of the computer', 'academic', 'Hardware', 'Program', 'Software	', 'CPU', 'd', 'Bachelor of Science in Computer Engineering', 'serves'),
(82676839, 'The ethical guidelines that psychologists follow when conducting research with human participants are outlined in:', 'academic', 'The Declaration of Independence', 'The Bill of Rights', 'The APA Ethical Principles of Psychologists and Code of Conduct', 'The Geneva Convention', 'c', 'Bachelor of Science in Psychology', 'ethical'),
(83215131, 'It is a line which make an angle of 90 degrees with each other.', 'academic', 'Parallel Lines ', 'Perpendicular Lines ', 'Long Lines ', 'Curved Lines.', 'b', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'degrees'),
(84520694, 'What lines are generally drawn from left to right?', 'academic', 'Parallel line ', 'Inclined line ', 'Horizontal point', 'Perpendicular line', 'c', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'left'),
(85456100, 'According to Article 4.6 1.2, what is the minimum amperage rating for receptacles and cord connectors?', 'academic', '10 amps at 125 volts ', '15 amps at 125 volts ', '20 amps at 250 volts ', '25 amps at 250 volts ', 'b', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'amperage'),
(87483680, 'It is a toothed wheel that can be engaged in another toothed wheel in order to transmit energy that gives the change of speed and direction of motion.', 'academic', 'Tire', 'Pedal', 'Crank', 'Gear', 'd', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'toothed'),
(88736091, 'What is the total resistance of two 10-ohm resistors connected in parallel?', 'academic', '10 ohms', '20 ohms', '5 ohms', '40 ohms', 'c', 'Bachelor of Science in Electrical Engineering', 'parallel'),
(89803341, 'What are electrons? ', 'academic', 'Subatomic particles that carry a negative charge', 'Subatomic particles that carry a positive charge', 'Subatomic particles that carry both a negative and positive charge', 'None of the above', 'a', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'What are electrons'),
(90309597, 'A type of electrode that has a heavy coating on the outside of them.', 'academic', 'Tungsten electrode', 'Flux-cored electrode', 'Stick electrode', 'MIG electrode', 'c', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'coating'),
(91132839, 'Which article covers the requirements for electrical and electronic equipment and wiring in hazardous locations?', 'academic', 'Article 4.60 ', 'Article 5.0', 'Article 5.4', 'Article 5.0.1.1', 'b', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'hazardous'),
(92787231, 'Which article covers the rating, type, and installation of receptacles, cord connectors, and attachment plugs?', 'academic', 'Article 4.4 ', 'Article 4.6', 'Article 4.8', 'Article 4.10', 'b', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'covers the rating'),
(93372782, 'What device turns mechanical energy into electrical energy? ', 'academic', 'Resistor', 'Capacitor', 'Voltmeter', 'Alternator', 'd', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'mechanical energy'),
(93627120, 'It is a term used to describe the flow of electrons.', 'academic', 'Current', 'Voltage', 'Resistance', 'Power', 'a', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'flow of electrons'),
(93724366, 'What is the minimum size for fixture (luminaire) wires as stated in Article 4.2.1.67', 'academic', '15 AWG', '18 AWG', '20 AWG', '22 AWG', 'b', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'What is the minimum size for fixture (luminaire) wires as stated in Article 4.2.1.67'),
(95414551, 'Which component is used to control the flow (alter) of current in a circuit?', 'academic', 'Capacitor', 'Resistor', 'Transistor', 'Diode', 'c', 'Bachelor of Science in Electrical Engineering', 'control'),
(95533607, 'What is the brain of the computer referred to as?', 'academic', 'Hard Drive', 'Central Processing Unit   ', 'Database', 'System Software', 'b', 'Bachelor of Science in Information Technology', 'What is the \"brain\" of the computer referred to as'),
(96325152, 'It is a cutter designed for facing. The cutting edges of face mills are always located along its sides.', 'academic', 'End mill', 'Drill bit', 'Gear hob', 'Face mill', 'd', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'cutting edges'),
(96669593, 'The component that collects the data and sends it to the computer is called?', 'academic', 'Software', 'Hardware', 'Input Device', 'Output Device', 'c', 'Bachelor of Science in Computer Engineering', 'The component that collects the data and sends it to the computer is called'),
(98083178, 'The management and delivery of information using speech, data, and video employing hardware, software, services, and supporting infrastructure.', 'academic', 'Information Technology', 'Engineering', 'Computer Science', 'Business Management', 'a', 'Bachelor of Science in Information Technology', 'speech'),
(98485101, 'Who developed the hierarchy of needs, a theory that identifies basic human needs and suggests that they must be satisfied in a specific order? ', 'academic', 'Abraham Maslow', 'Carl Rogers', 'Ivan Pavlov', 'John Watson', 'a', 'Bachelor of Science in Psychology', 'hierarchy'),
(99324673, 'What is the purpose of a fuse in an electrical circuit?', 'academic', 'To regulate the voltage', 'To increase the current', 'To protect against excessive current', 'To store electrical energy', 'c', 'Bachelor of Science in Electrical Engineering', 'fuse'),
(99532830, 'The tangible components or delivery systems of a computer that store and execute the textual instructions delivered by software.', 'academic', 'Hardware', 'Operating System	', 'Software', 'Controllers', 'a', 'Bachelor of Science in Information Technology', 'textual'),
(99614043, 'Distance from the tip of the electrode to the base metal is measured for how many millimeters?', 'academic', '1 mm', '10 mm', '100 mm', '1000 mm', 'b', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'distance'),
(99775443, 'What is the Internet of Things (IoT)?', 'academic', 'The Internet of Things (IoT) is a delicious Italian dessert.', 'The Internet of Things (IoT) is a new type of bicycle.', 'The Internet of Things refers to the network of physical objects, devices, and sensors that are connected to the internet. ', 'The Internet of Things is a popular science fiction novel.', 'c', 'Bachelor of Science in Computer Science', 'IOT');

-- --------------------------------------------------------

--
-- Table structure for table `question_stem_int`
--

CREATE TABLE `question_stem_int` (
  `id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `qtype` varchar(255) NOT NULL,
  `assigned_course` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_stem_int`
--

INSERT INTO `question_stem_int` (`id`, `question_text`, `qtype`, `assigned_course`, `keyword`) VALUES
(10320476, 'Do you enjoy working in a team and collaborating with others to achieve a common goal?', 'interest', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'collaborating'),
(11587840, 'Do you have an interest in understanding electrical safety procedures and regulations?', 'interest', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'safety'),
(11899110, 'Are you interested in renewable energy sources?', 'interest', 'Bachelor of Science in Electrical Engineering', 'energy sources'),
(12015773, 'Are you interested in learning about computer programming languages?', 'interest', 'Bachelor of Science in Computer Science', 'Are you interested in learning about computer programming languages'),
(12078704, 'Do you enjoy learning how things work, such as engines, machines, and other mechanical devices?', 'interest', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'other mechanical'),
(12153441, 'Do you spend a lot of your free time online?', 'interest', 'Bachelor of Science in Information Technology', 'free'),
(12159978, 'Do you enjoy analyzing data and making predictions based on mathematical models?', 'interest', 'Bachelor of Science in Applied Mathematics', 'predictions'),
(13271914, 'Do you enjoy problem-solving and finding solutions to technical issues?', 'interest', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'technical issues'),
(13689083, 'Do you have a desire to study psychology as part of your education?', 'interest', 'Bachelor of Science in Psychology', 'Do you have a desire to study psychology as part of your education'),
(13796143, 'Are you interested in coding and programming languages?', 'interest', 'Bachelor of Science in Information Technology', 'coding'),
(13972594, 'Do you like staying up-to-date with the latest trends and innovations in automotive technology?', 'interest', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'innovations'),
(14436461, 'Are you interested in learning different welding techniques and processes?', 'interest', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'welding techniques'),
(15327954, 'Do you enjoy observing people and analyzing their behaviors?', 'interest', 'Bachelor of Science in Psychology', 'behaviors'),
(15360545, 'Are you interested in designing and building mechanical systems, from small devices to large industrial machinery?', 'interest', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'small'),
(15894022, 'Are you interested in learning how computer hardware and software work together?', 'interest', 'Bachelor of Science in Computer Engineering', 'together'),
(16323006, 'Do you enjoy working with circuits and testing equipment?', 'interest', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'testing equipment'),
(16938104, 'Do you have an interest in working with various materials?', 'interest', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'various'),
(17364380, 'Do you enjoy solving technical problems?', 'interest', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'Do you enjoy solving technical problems'),
(17392907, 'Are you interested in conducting research on computer systems and technologies?', 'interest', 'Bachelor of Science in Computer Science', 'conducting'),
(17873126, 'Are you interested in learning about the brain and its functions?', 'interest', 'Bachelor of Science in Psychology', 'brain'),
(18058849, 'Do you have an interest in understanding metallurgy and metal properties?', 'interest', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'metallurgy'),
(18848951, 'Do you have a desire to study electrical engineering as part of your education?', 'interest', 'Bachelor of Science in Electrical Engineering', 'Do you have a desire to study electrical engineering as part of your education'),
(18959202, 'Do you have a strong foundation in math and feel comfortable working with advanced concepts and equations? ', 'interest', 'Bachelor of Science in Applied Mathematics', 'foundation'),
(19497825, 'Do you enjoy researching and learning about new drafting technologies and advancements in the field?	', 'interest', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'Do you enjoy researching and learning about new drafting technologies and advancements in the field'),
(19825038, 'Are you interested in robotics and automation?', 'interest', 'Bachelor of Science in Computer Engineering', 'robotics'),
(20239045, 'Do you want to apply mathematical concepts to a range of fields, such as finance, medicine, and computer science? ', 'interest', 'Bachelor of Science in Applied Mathematics', 'medicine'),
(20343871, 'Would you enjoy a career in industries that rely on mechanical systems, such as manufacturing, aerospace, or automotive?', 'interest', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'rely'),
(20353504, 'Are you interested in using technology to make tasks more efficient or automated?', 'interest', 'Bachelor of Science in Information Technology', 'efficient'),
(22933211, 'Do you enjoy tinkering with machines and figuring out how to fix them?', 'interest', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'tinkering'),
(23688122, 'Do you enjoy creating and designing metal structures and products?', 'interest', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'Do you enjoy creating and designing metal structures and products'),
(24106983, 'Would you like to apply your drafting technology knowledge to create designs and plans for buildings, machines, and other products in the future?', 'interest', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'future'),
(24600187, 'Do you enjoy learning about the latest developments in technology?', 'interest', 'Bachelor of Science in Computer Engineering', 'Do you enjoy learning about the latest developments in technology'),
(24907254, 'Is the thought of fabricating and repairing metal components appealing to you?', 'interest', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'fabricating'),
(25389358, 'Are you interested in pursuing a career in the automotive industry?', 'interest', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'Are you interested in pursuing a career in the automotive industry'),
(25542769, 'Do you enjoy working with blueprints and other technical drawings?', 'interest', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'blueprints'),
(25824504, 'Are you interested in learning about network infrastructure and security?', 'interest', 'Bachelor of Science in Computer Engineering', 'infrastructure'),
(26053586, 'Do you want to learn how to diagnose and repair automotive mechanical problems?', 'interest', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'diagnose'),
(26343705, 'Do you like to design and develop computer systems?', 'interest', 'Bachelor of Science in Computer Engineering', 'Do you like to design and develop computer systems'),
(26760669, 'Do you enjoy learning about how cars and other vehicles work?', 'interest', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'vehicle'),
(27191545, 'Do you believe that drafting technology plays an important role in architecture, engineering, and other industries?	', 'interest', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'architecture'),
(28498929, 'Do you find it intriguing to understand why people think and feel the way they do?', 'interest', 'Bachelor of Science in Psychology', 'feel the way'),
(28809496, 'Are you open to gaining practical experience through internships or projects in the field of Electrical Engineering?', 'interest', 'Bachelor of Science in Electrical Engineering', 'internship'),
(29266083, 'Are you interested in learning about computer hardware and how it works?', 'interest', 'Bachelor of Science in Information Technology', 'how it works'),
(31229063, 'Are you willing to invest time in learning the technical skills required for drafting technology?', 'interest', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'technical skills'),
(31251174, 'Do you think that understanding psychology can help you improve your own life and relationships?', 'interest', 'Bachelor of Science in Psychology', 'own life'),
(31558549, 'Are you eager to gain hands-on experience working with electrical components and machinery?', 'interest', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'eager'),
(32520861, 'Do you enjoy working with computers and electronic devices?', 'interest', 'Bachelor of Science in Computer Engineering', 'Do you enjoy working with computers and electronic devices?'),
(32683262, 'Do you enjoy working with computer-aided design (CAD) software and other drafting tools?	', 'interest', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'CAD'),
(33612737, 'Do you like working with tools such as plasma cutters, grinders, and welders?', 'interest', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'plasma'),
(34341056, 'Would you like to work with a variety of professionals to solve complex problems? ', 'interest', 'Bachelor of Science in Applied Mathematics', 'variety'),
(34651163, 'Are you fascinated by the precision and detail required in drafting technology?	', 'interest', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'precision'),
(35791751, 'Are you interested in cybersecurity and how to protect yourself and others online?', 'interest', 'Bachelor of Science in Information Technology', 'protect'),
(36656455, 'Are you interested in staying updated on the latest trends in electronic technology?', 'interest', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'Are you interested in staying updated on the latest trends in electronic technology'),
(39136585, 'Do you keep up with new trends in technology?', 'interest', 'Bachelor of Science in Information Technology', 'Do you keep up with new trends in technology'),
(39679231, 'Are you interested in how electronic devices and computer systems interface with             industry?', 'interest', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'interface'),
(39896805, 'Would you like to work with high-tech equipment and machinery on a daily basis?', 'interest', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'high'),
(41003180, 'Are you interested in learning how to create 2D or 3D technical drawings?	', 'interest', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', '3d'),
(41015988, 'Do you want to gain practical skills related to automotive manufacturing and production?', 'interest', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'automotive manufacturing and production'),
(42424381, 'Are you intrigued by the advancements in automotive technology?', 'interest', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'advancements in automotive technology'),
(42889502, 'Are you fascinated by advancements in electronic technology?', 'interest', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'advancements in electronic technology'),
(43152249, 'Are you interested in electronics and how they work?', 'interest', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'Are you interested in electronics and how they work'),
(44819241, 'Are you curious about the impact of social influence on our thoughts and actions?', 'interest', 'Bachelor of Science in Psychology', 'actions'),
(45107246, 'Are you open to exploring different theories and perspectives on human behavior and mental processes?', 'interest', 'Bachelor of Science in Psychology', 'mental processes'),
(45837570, 'Are you interested in learning about electrical systems and components?', 'interest', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'Are you interested in learning about electrical systems and components'),
(46183832, 'Would you enjoy a career that allows for continuous learning and professional development in mechanical technology?', 'interest', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'continuous'),
(47268351, 'Do you enjoy exploring the complexities of human emotions and thoughts?', 'interest', 'Bachelor of Science in Psychology', 'complexities'),
(47600239, 'Are you interested in learning about manufacturing processes and how they are affected by drafting technology?', 'interest', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'affected'),
(48250626, 'Do you enjoy using logical thinking to solve complex problems?', 'interest', 'Bachelor of Science in Computer Engineering', 'logical'),
(51635929, 'Do you enjoy programming and creating software programs?', 'interest', 'Bachelor of Science in Computer Engineering', 'creating software'),
(52164206, 'Are you interested in pursuing a career in the tech industry?', 'interest', 'Bachelor of Science in Computer Science', 'tech industry'),
(52472903, 'Are you interested in designing and building electrical systems?', 'interest', 'Bachelor of Science in Electrical Engineering', 'Are you interested in designing and building electrical systems'),
(53319885, 'Would you like to contribute to the development of technical drawings that are essential to building and manufacturing processes?	', 'interest', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'contribute'),
(54143457, 'Are you interested in developing software applications and programs?', 'interest', 'Bachelor of Science in Computer Science', 'applications and programs'),
(55013360, 'Have you ever constructed an electronic device from the ground up?', 'interest', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'ground'),
(55027290, 'Do you have a desire to work with electrical systems and equipment?', 'interest', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'Do you have a desire to work with electrical systems and equipment'),
(55069355, 'Do you enjoy hands-on work with tools and machinery?', 'interest', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'hands-on work'),
(55519733, 'Are you interested in using technology to improve society and the economy?', 'interest', 'Bachelor of Science in Computer Science', 'improve society'),
(55676746, 'Are you interested in learning about automation and controls in industrial settings?', 'interest', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'controls'),
(55866176, 'Can you see yourself working in industries like software development, cybersecurity, or data science?', 'interest', 'Bachelor of Science in Computer Science', 'data science'),
(57153885, 'Do you have an interest in renewable energy and its application in industry?', 'interest', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'application in industry'),
(60335734, 'Do you enjoy working with your hands and constructing things?', 'interest', 'Bachelor of Science in Electrical Engineering', ''),
(61685965, 'Are you fascinated by the process of designing, prototyping, and testing mechanical systems?', 'interest', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'fascinated by the process'),
(62907305, 'Do you enjoy working in a team environment to accomplish goals?', 'interest', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'accomplish'),
(63827157, 'Are you interested in applying mathematical concepts to solve real-world problems?', 'interest', 'Bachelor of Science in Applied Mathematics', 'real-world problems'),
(64930693, 'Do you find enjoyment in working with digital media like graphics, video, or audio editing?', 'interest', 'Bachelor of Science in Information Technology', 'graphics'),
(65277949, 'Can you see yourself working in industries like construction, manufacturing, or shipbuilding?', 'interest', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'shipbuilding'),
(65616606, 'Do you enjoy troubleshooting technical problems?', 'interest', 'Bachelor of Science in Information Technology', 'troubleshooting'),
(68132750, 'Do you enjoy working on projects that involve technology and innovation?', 'interest', 'Bachelor of Science in Computer Engineering', 'technology and innovation'),
(70624274, 'Can you see yourself working in industries like finance, engineering, or data analysis?', 'interest', 'Bachelor of Science in Applied Mathematics', 'data analysis'),
(71437462, 'Are you interested in learning about the science of metal properties and their impact on welding?', 'interest', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'science of metal'),
(72658359, 'Are you interested in working collaboratively with architects, engineers, and other professionals to create technical drawings?	', 'interest', 'Bachelor of Science in Industrial Technology major in Drafting Technology ', 'architects'),
(73087837, 'Do you like solving problems related to mechanics, thermodynamics, and materials science?', 'interest', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', 'thermodynamics'),
(73923821, 'Would you like to explore applied math as part of your education or career?', 'interest', 'Bachelor of Science in Applied Mathematics', 'explore applied'),
(77448171, 'Would you enjoy working in a field where you can apply physics and mathematics principles to create practical solutions?', 'interest', 'Bachelor of Science in Industrial Technology major in Mechanical Technology', ''),
(77483303, 'Are you intrigued by the challenge of developing new mathematical models or improving existing ones? ', 'interest', 'Bachelor of Science in Applied Mathematics', 'improving existing'),
(78069756, 'Would you like to be a part of cutting-edge research projects that involve applying math to real-world situations? ', 'interest', 'Bachelor of Science in Applied Mathematics', 'situations'),
(78234172, 'Are you curious about how electronic devices work?', 'interest', 'Bachelor of Science in Electrical Engineering', 'Are you curious about how electronic devices work'),
(79389838, 'Are you interested in learning about different types of electronic devices?', 'interest', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'types'),
(79689851, 'Are you interested in programming languages like Java, Python, C++, and more?', 'interest', 'Bachelor of Science in Computer Science', 'c++'),
(80036306, 'Are you intrigued by programming or designing electronic systems?', 'interest', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'Are you intrigued by programming or designing electronic systems'),
(80648276, 'Can you see yourself working in industries like construction, manufacturing, or telecommunications?', 'interest', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'telecom'),
(83016487, 'Are you interested in designing and building automotive systems, such as engines, transmissions, and suspensions?', 'interest', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'suspensions'),
(83671788, 'Do you like the idea of improving and innovating existing technology?', 'interest', 'Bachelor of Science in Electrical Engineering', 'innovating'),
(83736503, 'Do you have an interest in automobiles and how they work?', 'interest', 'Bachelor of Science in Industrial Technology major in Automotive Technology', 'Do you have an interest in automobiles and how they work'),
(84316493, 'Do you have an enjoyment for video games or mobile apps?', 'interest', 'Bachelor of Science in Information Technology', 'mobile apps'),
(85208844, 'Are you interested in analyzing and solving complex computing problems?', 'interest', 'Bachelor of Science in Computer Science', 'computing'),
(85347094, 'Would you like to explore the possibilities of using psychology to improve relationships, communication, and mental health?', 'interest', 'Bachelor of Science in Psychology', 'improve relation'),
(85452009, 'Are you interested in learning about computer networking and security?', 'interest', 'Bachelor of Science in Computer Science', 'networking'),
(87483787, 'Do you enjoy disassembling items to understand how they function?', 'interest', 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'disass'),
(88326359, 'Do you have an interest in understanding how mathematics is used to make decisions and solve problems?', 'interest', 'Bachelor of Science in Applied Mathematics', 'mathematics is'),
(88826374, 'Can you see yourself working on cutting-edge technologies such as AI, blockchain, or virtual reality?', 'interest', 'Bachelor of Science in Computer Science', 'blockchain'),
(89727266, 'Are you fascinated by how electricity powers our world?', 'interest', 'Bachelor of Science in Electrical Engineering', 'powers'),
(90854662, 'Are you interested in using technology for collaboration with others?', 'interest', 'Bachelor of Science in Information Technology', 'Are you interested in using technology for collaboration with others'),
(92541062, 'Do you have an interest in math and physics?', 'interest', 'Bachelor of Science in Electrical Engineering', 'Do you have an interest in math and physics'),
(95042463, 'Would you like to learn more about mental illnesses and their potential causes?', 'interest', 'Bachelor of Science in Psychology', 'mental illnesses'),
(96433415, 'Are you interested in a career involving welding or fabrication technology?', 'interest', 'Bachelor of Science in Industrial Technology major in Welding and Fabrication Technology ', 'fabrication'),
(97699270, 'Do you enjoy working with technology?', 'interest', 'Bachelor of Science in Electrical Engineering', 'Do you enjoy working with technology'),
(98302191, 'Are you curious about how digital technology affects our daily lives?', 'interest', 'Bachelor of Science in Computer Engineering', 'daily lives'),
(98822245, 'Do you enjoy solving complex problems related to electrical systems?', 'interest', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'complex problems related to electrical systems'),
(99829256, 'Would you like to have a career in the manufacturing or production industry?', 'interest', 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'production industry');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `raw` int(11) NOT NULL,
  `equivalent` varchar(50) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `raw`, `equivalent`, `remarks`) VALUES
(1, 10, '100%', 'Outstanding'),
(2, 9, '90%', 'Excellent'),
(3, 8, '80%', 'Very Good'),
(4, 7, '70%', 'Good'),
(5, 6, '60%', 'Above Average'),
(6, 5, '50%', 'Average'),
(7, 4, '40%', 'Below Average'),
(8, 3, '30%', 'Weak'),
(9, 2, '20%', 'Very Weak'),
(10, 1, '10%', 'Low'),
(11, 0, '0%', 'Failed');

-- --------------------------------------------------------

--
-- Table structure for table `recommended_courses`
--

CREATE TABLE `recommended_courses` (
  `user_id` int(11) NOT NULL,
  `course1` varchar(255) NOT NULL,
  `count1` int(11) NOT NULL,
  `percent1` int(11) NOT NULL,
  `course2` varchar(255) NOT NULL,
  `count2` int(11) NOT NULL,
  `percent2` int(11) NOT NULL,
  `course3` varchar(255) NOT NULL,
  `count3` int(11) NOT NULL,
  `percent3` int(11) NOT NULL,
  `course4` varchar(255) NOT NULL,
  `count4` int(11) NOT NULL,
  `percent4` int(11) NOT NULL,
  `course5` varchar(255) NOT NULL,
  `count5` int(11) NOT NULL,
  `percent5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recommended_courses`
--

INSERT INTO `recommended_courses` (`user_id`, `course1`, `count1`, `percent1`, `course2`, `count2`, `percent2`, `course3`, `count3`, `percent3`, `course4`, `count4`, `percent4`, `course5`, `count5`, `percent5`) VALUES
(38081216, 'Bachelor Of Science in Social Work ', 6, 60, 'Bachelor of Arts in Political Science', 4, 40, 'Bachelor of Arts in Sociology', 3, 30, 'Bachelor of Science in Criminology', 2, 20, 'Bachelor of Arts in Psychology', 1, 10),
(49996857, 'BSBA major in Human Resource Development Management', 6, 60, 'Bachelor of Science in Business Administration major in Marketing Management', 6, 60, 'Bachelor of Science in Accounting Information System', 5, 50, 'Bachelor of Science in Hospitality Management ', 5, 50, 'Bachelor of Science in Accountancy', 1, 10),
(64459931, 'Bachelor of Science in Business Administration major in Marketing Management', 5, 50, 'Bachelor of Science in Hospitality Management ', 5, 50, 'BSBA major in Human Resource Development Management', 4, 40, 'Bachelor of Science in Culinary Management', 2, 20, 'Bachelor of Science in Business Administration major in Financial Management', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` bigint(8) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lrn` varchar(12) NOT NULL,
  `strand_track` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `refid` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `user_id`, `fname`, `lname`, `email`, `lrn`, `strand_track`, `date`, `refid`) VALUES
(29685866, 64459931, 'Merliah ', 'Summer', 'merliah@feapitsat.com', '467856468467', 'ABM', '2023-12-04', 67125721),
(44980983, 38081216, 'angelina', 'Jolie', 'angelina@feapitsat.com', '437586789679', 'HUMSS', '2023-12-05', 91529065),
(93775721, 49996857, 'Honey', 'Sevilla', 'honey@feapitsat.com', '108163060122', 'ABM', '2023-12-04', 93508755);

-- --------------------------------------------------------

--
-- Table structure for table `topcourse_interest`
--

CREATE TABLE `topcourse_interest` (
  `user_id` int(11) NOT NULL,
  `top1` varchar(255) NOT NULL,
  `yescount1` int(11) NOT NULL,
  `top2` varchar(255) NOT NULL,
  `yescount2` int(11) NOT NULL,
  `top3` varchar(255) NOT NULL,
  `yescount3` int(11) NOT NULL,
  `top4` varchar(255) NOT NULL,
  `yescount4` int(11) NOT NULL,
  `top5` varchar(255) NOT NULL,
  `yescount5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topcourse_interest`
--

INSERT INTO `topcourse_interest` (`user_id`, `top1`, `yescount1`, `top2`, `yescount2`, `top3`, `yescount3`, `top4`, `yescount4`, `top5`, `yescount5`) VALUES
(38081216, 'Bachelor of Arts in Sociology', 9, 'Bachelor of Arts in Psychology', 9, 'Bachelor Of Science in Social Work ', 7, 'Bachelor of Arts in Political Science', 6, 'Bachelor of Science in Criminology', 6),
(49996857, 'Bachelor of Science in Business Administration major in Marketing Management', 8, 'Bachelor of Science in Accounting Information System', 7, 'Bachelor of Science in Accountancy', 7, 'BSBA major in Human Resource Development Management', 7, 'Bachelor of Science in Hospitality Management ', 6),
(64459931, 'Bachelor of Science in Business Administration major in Financial Management', 8, 'Bachelor of Science in Hospitality Management ', 7, 'Bachelor of Science in Culinary Management', 6, 'BSBA major in Human Resource Development Management', 5, 'Bachelor of Science in Business Administration major in Marketing Management', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(10) NOT NULL,
  `fname` varchar(55) NOT NULL,
  `lname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `lrn` varchar(12) NOT NULL,
  `strand_track` varchar(30) NOT NULL,
  `user_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL,
  `refid` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `lrn`, `strand_track`, `user_time`, `status`, `refid`) VALUES
(38081216, 'angelina', 'Jolie', 'angelina@feapitsat.com', '437586789679', 'HUMSS', '2023-12-05 02:31:39', 'accepted', 91529065),
(49996857, 'Honey', 'Sevilla', 'honey@feapitsat.com', '108163060122', 'ABM', '2023-12-04 02:58:29', 'accepted', 93508755),
(64459931, 'Merliah ', 'Summer', 'merliah@feapitsat.com', '467856468467', 'ABM', '2023-12-03 23:49:36', 'accepted', 67125721),
(93633898, 'Kelly', 'Clarkson', 'kelly@feapitsat.com', '586547865873', '', '2023-12-04 01:42:00', 'rejected', 55476434);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `lrn`
--
ALTER TABLE `lrn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens_temp`
--
ALTER TABLE `password_reset_tokens_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_abm_acad`
--
ALTER TABLE `question_abm_acad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_abm_int`
--
ALTER TABLE `question_abm_int`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_humss_acad`
--
ALTER TABLE `question_humss_acad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_humss_int`
--
ALTER TABLE `question_humss_int`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_stem_acad`
--
ALTER TABLE `question_stem_acad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_stem_int`
--
ALTER TABLE `question_stem_int`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommended_courses`
--
ALTER TABLE `recommended_courses`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `fname` (`fname`),
  ADD KEY `lname` (`lname`),
  ADD KEY `strandname` (`strand_track`),
  ADD KEY `lrn` (`lrn`),
  ADD KEY `strand_track` (`strand_track`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `topcourse_interest`
--
ALTER TABLE `topcourse_interest`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96985869;

--
-- AUTO_INCREMENT for table `lrn`
--
ALTER TABLE `lrn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `password_reset_tokens_temp`
--
ALTER TABLE `password_reset_tokens_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question_abm_acad`
--
ALTER TABLE `question_abm_acad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99098481;

--
-- AUTO_INCREMENT for table `question_abm_int`
--
ALTER TABLE `question_abm_int`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99098481;

--
-- AUTO_INCREMENT for table `question_humss_acad`
--
ALTER TABLE `question_humss_acad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99609126;

--
-- AUTO_INCREMENT for table `question_humss_int`
--
ALTER TABLE `question_humss_int`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99609126;

--
-- AUTO_INCREMENT for table `question_stem_acad`
--
ALTER TABLE `question_stem_acad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99829257;

--
-- AUTO_INCREMENT for table `question_stem_int`
--
ALTER TABLE `question_stem_int`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99829257;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `recommended_courses`
--
ALTER TABLE `recommended_courses`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64459932;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93775722;

--
-- AUTO_INCREMENT for table `topcourse_interest`
--
ALTER TABLE `topcourse_interest`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64459932;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
