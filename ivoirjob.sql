
--
-- database : `ivoirjob`
--


-- --------------------------------------------------------
--
-- upload data into table `etapes`
--

INSERT INTO `etapes` (`id_Etape`, `intitule_Etape`, `created_at`, `updated_at`) VALUES
(1, 'TRI_PROFIL', '2021-06-25 07:57:16', '2021-06-25 07:57:16'),
(2, 'QUIZ', '2021-06-25 07:58:03', '2021-06-25 07:58:03'),
(3, 'ENTRETIEN', '2021-06-25 07:58:03', '2021-06-25 07:58:03'),
(4, 'VALIDATION', '2021-06-25 07:58:43', '2021-06-25 07:58:43');


-- --------------------------------------------------------
--
-- upload data into table`langues`
--

INSERT INTO `langues` (`id_Langue`, `reference_Langue`, `created_at`, `updated_at`) VALUES
(1, 'ALLEMAND', NULL, NULL),
(2, 'ANGLAIS', NULL, NULL),
(3, 'ARABE', NULL, NULL),
(4, 'ARABE EGYPTIEN', NULL, NULL),
(5, 'BENGALI', NULL, NULL),
(6, 'CANTONAIS', NULL, NULL),
(7, 'CORÉEN', NULL, NULL),
(8, 'ESPAGNOL', NULL, NULL),
(9, 'FRANÇAIS', NULL, NULL),
(10, 'HAOUSSA', NULL, NULL),
(11, 'HINDI', NULL, NULL),
(12, 'INDONÉSIEN', NULL, NULL),
(13, 'ITALIEN', NULL, NULL),
(14, 'JAPONAIS', NULL, NULL),
(15, 'JAVANAIS', NULL, NULL),
(16, 'MANDARIN', NULL, NULL),
(17, 'PERSAN', NULL, NULL),
(18, 'PHILIPPIN', NULL, NULL),
(19, 'PORTUGAIS', NULL, NULL),
(20, 'RUSSE', NULL, NULL),
(21, 'TURC', NULL, NULL),
(22, 'VIETNAMIEN', NULL, NULL);

-- --------------------------------------------------------
--
-- upload data into table `groupes`
--

INSERT INTO `groupes` (`id_Groupe`, `libelle_Groupe`, `created_at`, `updated_at`) VALUES
(2, 'ADMINISTRATEUR', '2021-06-22 13:38:40', '2021-08-05 11:26:08'),
(3, 'RECRUTEUR', '2021-06-22 13:41:35', '2021-06-22 13:41:35'),
(8, 'VALIDATEUR', '2021-06-22 13:53:27', '2021-06-22 13:53:27'),
(11, 'CANDIDAT', '2021-08-03 10:49:00', '2021-08-03 10:49:00');


-- --------------------------------------------------------
--
-- upload data into table `administrateurs`
--

INSERT INTO `administrateurs` (`id_Administrateur`, `nom_Administrateur`, `prenoms_Administrateur`, `e_mail_Administrateur`, `service_Administrateur`, `password`, `statut_Administrateur`, `date_Verrouillage_Administrateur`, `date_Deverrouillage_Administrateur`, `groupe_id`, `created_at`, `updated_at`) VALUES
(16, 'fakeAdmin', NULL, 'fakeAdmin@gmail.com', '', '$2y$10$78o80nubnLrszkG1rhT3Lu1cbhglkzEse2QaBV8dvJG31cLZDIQmW', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, '2021-07-22 08:03:02', '2021-07-22 08:03:02');

-- --------------------------------------------------------
--
-- upload data into table `fonctionnalites`
--

INSERT INTO `fonctionnalites` (`id_Fonctionnalite`, `libelle_Fonctionnalite`, `created_at`, `updated_at`) VALUES
(1, 'Fiche de poste', '2021-06-25 10:55:35', '2021-06-25 10:55:35'),
(2, 'Profil', '2021-06-25 10:55:35', '2021-06-25 10:55:35'),
(3, 'Quiz', '2021-06-25 10:57:00', '2021-06-25 10:57:00'),
(4, 'Entretien', '2021-06-25 10:57:00', '2021-06-25 10:57:00'),
(5, 'Validation', '2021-06-25 10:57:00', '2021-06-25 10:57:00'),
(6, 'Sécurité', '2021-06-25 10:57:00', '2021-06-25 10:57:00'),
(7, 'Tableau de bord', '2021-06-25 10:57:00', '2021-06-25 10:57:00'),
(8, 'Offres d\'emploi', '2021-06-25 10:57:00', '2021-06-25 10:57:00'),
(9, 'Profil_Candidat', '2021-06-25 10:57:00', '2021-06-25 10:57:00'),
(10, 'Paramètres', '2021-06-25 10:57:00', '2021-06-25 10:57:00'),
(11, 'Logs', '2021-06-25 10:57:00', '2021-06-25 10:57:00');




-- --------------------------------------------------------
--
-- upload data into table `acces` 
--

INSERT INTO `acces` (`id_Acces`, `fonctionnalite_id`, `groupe_id`, `created_at`, `updated_at`) VALUES
(98, 1, 3, '2021-08-03 10:52:34', '2021-08-03 10:52:34'),
(99, 3, 3, '2021-08-03 10:52:34', '2021-08-03 10:52:34'),
(100, 4, 3, '2021-08-03 10:52:34', '2021-08-03 10:52:34'),
(101, 1, 8, '2021-08-03 10:52:48', '2021-08-03 10:52:48'),
(102, 3, 8, '2021-08-03 10:52:49', '2021-08-03 10:52:49'),
(103, 4, 8, '2021-08-03 10:52:49', '2021-08-03 10:52:49'),
(104, 5, 8, '2021-08-03 10:52:49', '2021-08-03 10:52:49'),
(105, 7, 11, '2021-08-03 10:55:12', '2021-08-03 10:55:12'),
(106, 8, 11, '2021-08-03 10:55:12', '2021-08-03 10:55:12'),
(107, 9, 11, '2021-08-03 10:55:13', '2021-08-03 10:55:13'),
(108, 10, 11, '2021-08-03 10:55:13', '2021-08-03 10:55:13'),
(109, 2, 2, '2021-08-03 10:55:28', '2021-08-03 10:55:28'),
(110, 6, 2, '2021-08-03 10:55:28', '2021-08-03 10:55:28'),
(118, 6, 3, '2022-04-15 20:52:16', '2022-04-15 20:52:16'),
(119, 11, 2, '2022-04-15 22:53:06', '2022-04-15 22:53:06');


