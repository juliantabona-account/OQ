CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `description`, `created_by`, `category_id`, `category_type`, `created_at`, `updated_at`) VALUES
(7, 'Machine', 'Mechanical devices or utilities', 1, 1, 'company', '2018-06-22 10:45:59', '2018-06-22 10:45:59'),
(9, 'Air-conditioning', 'All heating and cooling devices/utilities', 1, 1, 'company', '2018-06-23 10:03:09', '2018-06-23 10:03:09'),
(10, 'Walls', 'Any concrete/brick walls', 1, 1, 'company', '2018-06-24 01:53:17', '2018-06-24 01:53:17'),
(11, 'Glass', 'All kinds of glass material, e.g) Windows, vehicle windshields, e.t.c', 1, 1, 'company', '2018-07-01 06:19:04', '2018-07-01 06:19:04');

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_or_region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` int(10) UNSIGNED DEFAULT NULL,
  `type` int(10) UNSIGNED DEFAULT NULL,
  `website_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_doc_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_ext` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `companies` (`id`, `name`, `description`, `city`, `state_or_region`, `address`, `industry`, `type`, `website_link`, `profile_doc_url`, `logo_url`, `phone_ext`, `phone_num`, `email`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Optimum Q', 'Technology solutions driven company', 'Gaborone', 'South-East', 'Tlokweng Industrial', NULL, NULL, NULL, '', 'https://docs.google.com/uc?id=1hGJf6ClJOzyuVdno6cMa_PEg08-B8l39', NULL, NULL, '', 1, NULL, NULL),
(54, 'Autorepair 11', NULL, 'Gaborone 22', 'South East 33', 'Plot 3473, Finance Park 44', NULL, NULL, '555555555555555555555555        55555555555', NULL, 'http://oq-bucket.s3.amazonaws.com/company_logos/cl_15304815565b394b9463113.jpeg', '201', '30000001', 'info@autorepair.co.bw 66', 1, '2018-06-25 07:09:20', '2018-07-01 19:45:59'),
(55, 'Enflux Concepts', NULL, 'Gaborone', 'South East', 'Plot 5489, Commerce Park', NULL, NULL, NULL, NULL, 'http://oq-bucket.s3.amazonaws.com/company_logos/cl_15299179305b30b1ea64093.jpeg', '267', '76902130', 'enquiries@enfluxconcepts.co.bw', 1, '2018-06-25 07:12:13', '2018-06-25 07:12:13'),
(56, 'Antlanca Repairs', NULL, 'Gaborone', 'South East', 'Plot 3473, Finance Park', NULL, NULL, NULL, NULL, NULL, '267', '3993221', 'info@antlancarepairs.co.bw', 1, '2018-06-28 10:21:36', '2018-06-28 10:21:36'),
(57, 'Window Krafts', NULL, 'Gaborone', 'South East', 'Plot 3473, Finance Park', NULL, NULL, NULL, NULL, 'http://oq-bucket.s3.amazonaws.com/company_logos/cl_15304354075b38974f714ec.jpeg', '267', '3993221', 'enquiries@windowkrafts.co.bw', 1, '2018-07-01 06:56:50', '2018-07-01 06:56:50'),
(58, 'Adler Windows', NULL, 'Gaborone', 'South East', 'Plot 3473, Commerce Park', NULL, NULL, NULL, NULL, 'http://oq-bucket.s3.amazonaws.com/company_logos/cl_15304356525b389844f3b2f.png', '267', '39867280', 'info@adlerwindows.co.bw', 1, '2018-07-01 07:00:56', '2018-07-02 10:02:50'),
(59, 'Metal Depots', NULL, 'Gaborone', 'North East', 'Plot 3489, Blue Jacket Street', NULL, NULL, NULL, NULL, 'http://oq-bucket.s3.amazonaws.com/company_logos/cl_15304533845b38dd88995a8.png', '267', '3900321', 'enquiries@metaldeports.co.bw', 1, '2018-07-01 11:56:32', '2018-07-01 11:56:32'),
(61, 'Greenwood', NULL, 'Gaborone', 'South East', 'Plot 3473, Finance Park', NULL, NULL, NULL, NULL, 'http://oq-bucket.s3.amazonaws.com/company_logos/cl_15305439565b3a3f54405a7.jpeg', '267', '3933321', 'enquiries@greenwood.co.bw', 1, '2018-07-02 13:05:58', '2018-07-02 13:05:58'),
(62, 'Merchant Capital', NULL, 'Gaborone', 'South West', 'Plot 1753, Commerce Park', NULL, NULL, NULL, NULL, 'http://oq-bucket.s3.amazonaws.com/company_logos/cl_15305445895b3a41cd9e29f.png', '267', '3988721', 'info@merchantcapital.co.bw', 1, '2018-07-02 13:16:32', '2018-07-02 13:16:32'),
(63, 'Think Direct', NULL, 'Gaborone', 'North East', 'Plot 3221, Loapi House', NULL, NULL, 'www.thinkdirect.co.bw', NULL, 'http://oq-bucket.s3.amazonaws.com/company_logos/cl_15305447825b3a428e11260.jpeg', '267', '399221', 'info@thinkdirect.co.bw', 1, '2018-07-02 13:19:44', '2018-07-02 13:21:19'),
(64, 'Adler Windows', NULL, 'Gaborone', 'South East', 'Plot 3456, Finance Park', NULL, NULL, NULL, NULL, 'http://oq-bucket.s3.amazonaws.com/company_logos/cl_15306989795b3c9ce385653.png', '267', '39900231', 'info@adlerwindows.co.bw', 1, '2018-07-04 08:09:42', '2018-07-04 08:09:42');

CREATE TABLE `company_branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `destination` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `company_branches` (`id`, `destination`, `company_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Gaborone', 1, 1, '2018-06-12 08:00:57', '2018-06-12 08:00:57'),
(2, 'Maun', 1, 1, '2018-06-12 09:34:43', '2018-06-12 09:34:43');

CREATE TABLE `company_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `company_clients` (`id`, `company_id`, `client_id`, `created_by`, `created_at`, `updated_at`) VALUES
(13, 1, 54, 1, '2018-06-25 07:09:20', '2018-06-25 07:09:20'),
(14, 1, 56, 1, '2018-06-28 10:21:36', '2018-06-28 10:21:36'),
(15, 1, 57, 1, '2018-07-01 06:56:51', '2018-07-01 06:56:51'),
(16, 1, 61, 1, '2018-07-02 13:05:59', '2018-07-02 13:05:59'),
(17, 1, 64, 1, '2018-07-04 08:09:43', '2018-07-04 08:09:43');

CREATE TABLE `company_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `contact_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `company_contacts` (`id`, `company_id`, `contact_id`, `created_by`, `created_at`, `updated_at`) VALUES
(37, 54, 41, 1, '2018-06-25 07:10:14', '2018-06-25 07:10:14'),
(38, 54, 42, 1, '2018-06-28 09:13:37', '2018-06-28 09:13:37'),
(39, 56, 43, 1, '2018-06-28 14:16:41', '2018-06-28 14:16:41'),
(40, 57, 44, 1, '2018-07-01 07:10:34', '2018-07-01 07:10:34'),
(41, 57, 45, 1, '2018-07-01 07:16:34', '2018-07-01 07:16:34'),
(42, 57, 46, 1, '2018-07-01 07:17:22', '2018-07-01 07:17:22'),
(43, 54, 47, 1, '2018-07-01 19:51:31', '2018-07-01 19:51:31'),
(44, 61, 48, 1, '2018-07-02 13:24:40', '2018-07-02 13:24:40'),
(45, 61, 49, 1, '2018-07-02 13:25:59', '2018-07-02 13:25:59');

CREATE TABLE `company_contractors` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `contractor_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `company_contractors` (`id`, `company_id`, `contractor_id`, `created_by`, `created_at`, `updated_at`) VALUES
(21, 1, 55, 1, '2018-06-25 07:12:13', '2018-06-25 07:12:13'),
(22, 1, 58, 1, '2018-07-01 07:00:56', '2018-07-01 07:00:56'),
(23, 1, 62, 1, '2018-07-02 13:16:32', '2018-07-02 13:16:32'),
(24, 1, 63, 1, '2018-07-02 13:19:44', '2018-07-02 13:19:44');

CREATE TABLE `cost_centers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `costcenter_id` int(10) UNSIGNED NOT NULL,
  `costcenter_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cost_centers` (`id`, `name`, `description`, `created_by`, `costcenter_id`, `costcenter_type`, `created_at`, `updated_at`) VALUES
(1, 'Facility Maintenance', 'Maintenance & repair of facilities, utilities and devices', 1, 1, 'company', '2018-06-11 22:47:38', '2018-06-11 22:47:38'),
(9, 'Facility Replacement', 'Replacement of damaged goods/utilities', 1, 1, 'company', '2018-06-23 10:03:09', '2018-06-23 10:03:09');

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `documentable_id` int(10) UNSIGNED NOT NULL,
  `documentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `documents` (`id`, `url`, `name`, `description`, `created_by`, `documentable_id`, `documentable_type`, `created_at`, `updated_at`) VALUES
(1, 'http://oq-bucket.s3.amazonaws.com/profile_docs/SqIXCn8vkd23RHktS0ptzAEEeL6ZEotzhyPDh5VD.pdf', 'Omang', NULL, 41, 41, 'user', '2018-07-03 13:36:24', '2018-07-03 13:36:24');

CREATE TABLE `jobcards` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `step_id` int(11) NOT NULL,
  `priority_id` int(10) UNSIGNED NOT NULL,
  `cost_center_id` int(10) UNSIGNED DEFAULT NULL,
  `company_branch_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `select_contractor_id` int(10) UNSIGNED DEFAULT NULL,
  `img_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `jobcards` (`id`, `title`, `description`, `start_date`, `end_date`, `step_id`, `priority_id`, `cost_center_id`, `company_branch_id`, `category_id`, `client_id`, `select_contractor_id`, `img_url`, `created_by`, `created_at`, `updated_at`) VALUES
(41, 'Aircon Replacement', 'Aircon Replacement in 4 offices', '2018-06-26', '2018-06-29', 1, 1, 1, 1, 9, 54, 54, 'http://oq-bucket.s3.amazonaws.com/jobcards/jb_15299144895b30a4790d43f.jpeg', 1, '2018-06-25 06:15:00', '2018-06-25 07:09:20'),
(42, 'Vending Machine Repair', 'Repair of 3 on-campus vending machine. Two machines do not accept coins while the other accepts coins but does not eject the products selected.', '2018-06-29', '2018-07-04', 2, 7, 1, 1, 7, 54, 54, NULL, 1, '2018-06-28 10:16:53', '2018-06-28 10:21:36'),
(43, 'Broken Window Replacement', 'Replacement of 23 see-through classroom windows that are cracked and broken. This job requires that contractor replaces every window with a new one while also discarding of the old broken windows', '2018-07-02', '2018-07-13', 0, 8, 9, 1, 11, 57, 59, 'http://oq-bucket.s3.amazonaws.com/jobcards/jb_15304331115b388e578a643.jpeg', 1, '2018-07-01 06:19:04', '2018-07-02 12:46:09'),
(44, 'Sample 1', 'This is a sample job card with details describing work to be done by a particular contractor for a specific clientile', '2018-07-03', '2018-07-05', 0, 7, 9, 1, 9, NULL, NULL, 'http://oq-bucket.s3.amazonaws.com/jobcards/jb_15305430535b3a3bcdbf953.jpeg', 1, '2018-07-02 12:50:57', '2018-07-02 12:50:57'),
(45, 'Sample 1', 'This is a sample job card with details describing work to be done by a particular contractor for a specific clientile', '2018-07-03', '2018-07-05', 0, 7, 9, 1, 9, 61, 62, 'http://oq-bucket.s3.amazonaws.com/jobcards/jb_15305430895b3a3bf106b8f.jpeg', 1, '2018-07-02 12:51:32', '2018-07-02 13:22:49'),
(46, 'Broken Window Replacement', 'Replacement of broken window in commercial plot', '2018-07-05', '2018-07-06', 0, 9, 1, 1, 7, 64, NULL, 'http://oq-bucket.s3.amazonaws.com/jobcards/jb_15306988275b3c9c4b5b38e.jpeg', 1, '2018-07-04 08:07:18', '2018-07-04 08:09:43');

CREATE TABLE `jobcard_contractors` (
  `id` int(10) UNSIGNED NOT NULL,
  `jobcard_id` int(10) UNSIGNED NOT NULL,
  `contractor_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `quotation_doc_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `jobcard_contractors` (`id`, `jobcard_id`, `contractor_id`, `amount`, `quotation_doc_url`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 43, 58, '7500.00', 'http://oq-bucket.s3.amazonaws.com/jobcard_quotations/mqPdcjltzTU72IKA8S8G8IQ2s2GntBooePui6Thk.jpeg', 1, '2018-07-01 07:00:58', '2018-07-01 07:00:58'),
(2, 43, 59, '7800.00', 'http://oq-bucket.s3.amazonaws.com/jobcard_quotations/mqPdcjltzTU72IKA8S8G8IQ2s2GntBooePui6Thk.jpeg', 1, '2018-07-02 14:08:51', '2018-07-02 14:08:51'),
(3, 45, 62, '6700.00', 'http://oq-bucket.s3.amazonaws.com/jobcard_quotations/AOeU5MWi7JI0aCvqORJD6ohItyKHat5n4M0Nbeno.png', 1, '2018-07-02 13:16:34', '2018-07-02 13:16:34'),
(4, 45, 63, NULL, NULL, 1, '2018-07-02 13:19:45', '2018-07-02 13:19:45');

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_20_125353_entrust_setup_tables', 1),
(4, '2018_05_21_103120_create_companies_table', 1),
(5, '2018_06_11_210356_create_documents_table', 1),
(10, '2018_06_11_220119_create_categories_table', 2),
(11, '2018_06_11_220219_create_cost_centers_table', 2),
(12, '2018_06_06_100159_create_company_branches_table', 3),
(13, '2018_06_06_094432_create_jobcards_table', 4),
(15, '2018_06_12_105733_create_views_table', 5),
(18, '2018_06_11_220054_create_priorities_table', 7),
(32, '2018_06_17_062027_create_company_clients_table', 10),
(33, '2018_06_17_150005_create_company_contacts_table', 11),
(34, '2018_06_20_072421_create_company_contractors_table', 12),
(36, '2018_06_20_083638_create_jobcard_contractors_table', 13),
(37, '2018_06_24_020249_create_recent_activities_table', 14),
(42, '2018_06_25_112410_create_status_table', 15),
(49, '2018_06_28_185221_create_process_form_steps_table', 16),
(50, '2018_07_04_144425_create_process_form_fields_table', 16),
(51, '2018_07_04_144934_create_process_form_step_allocation_table', 16),
(52, '2018_07_04_144952_create_process_form_field_allocation_table', 16),
(53, '2018_07_04_145455_create_process_form_responses_table', 16),
(55, '2018_07_04_154053_create_process_form_table', 17),
(56, '2018_07_04_165302_create_process_form_allocation_table', 17);

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `priorities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `color_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `priority_id` int(10) UNSIGNED NOT NULL,
  `priority_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `priorities` (`id`, `name`, `description`, `color_code`, `created_by`, `priority_id`, `priority_type`, `created_at`, `updated_at`) VALUES
(1, 'Medium', 'This is required but not urgent', '#ffea00', 1, 1, 'company', '2018-06-12 14:36:24', '2018-06-12 14:36:24'),
(7, 'Low', 'Required but not urgent', '#0057ff', 1, 1, 'company', '2018-06-23 10:03:09', '2018-06-23 10:03:09'),
(8, 'High', 'This is important and should be completed as soon as possible', '#ff2900', 1, 1, 'company', '2018-07-01 06:19:04', '2018-07-01 06:19:04'),
(9, 'Urgent', 'This is very urgent and must be handled as soon as possible', '#ff0000', 1, 1, 'company', '2018-07-04 08:07:18', '2018-07-04 08:07:18');

CREATE TABLE `process_form` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selected` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `process_form` (`id`, `name`, `description`, `selected`, `type`, `company_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Process Form 1', 'This is the first process form', 1, 'jobcard', 1, 1, '2018-07-04 16:54:55', '2018-07-04 16:54:55');

CREATE TABLE `process_form_allocation` (
  `id` int(10) UNSIGNED NOT NULL,
  `process_form_id` int(10) UNSIGNED NOT NULL,
  `trackable_id` int(10) UNSIGNED NOT NULL,
  `trackable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_step` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `process_form_allocation` (`id`, `process_form_id`, `trackable_id`, `trackable_type`, `active_step`, `created_at`, `updated_at`) VALUES
(1, 1, 42, 'jobcard', 0, '2018-07-04 16:55:49', '2018-07-04 16:55:49');

CREATE TABLE `process_form_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fillable` tinyint(1) NOT NULL DEFAULT '1',
  `optional` tinyint(1) NOT NULL DEFAULT '0',
  `placeholder` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `process_form_fields` (`id`, `label`, `tag`, `type`, `fillable`, `optional`, `placeholder`, `options`, `width`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Alert', 'alert', 'info', 0, 0, 'Answer all questions', '', 'col-12', 1, '2018-07-04 15:53:24', '2018-07-04 15:53:24'),
(2, 'Deposit Paid', 'input', 'text', 1, 0, 'Please enter deposit amount paid', '', 'col-12', 1, '2018-07-04 15:55:00', '2018-07-04 15:55:00'),
(3, 'Select Payment Method', 'select', '', 1, 0, '', '[{\"id\":\"1\",\"label\":\"Satisfied\"},{\"id\":\"2\",\"label\":\"Unsatisfied\"},{\"id\":\"3\",\"label\":\"Excellent\"}]', 'col-12', 1, '2018-07-04 16:43:16', '2018-07-04 16:43:16'),
(4, 'Comments (Optional)', 'textarea', '', 1, 0, 'Additional comments', '', 'col-12', 1, '2018-07-04 16:44:54', '2018-07-04 16:44:54'),
(5, 'Deposit Date', 'input', 'date', 1, 0, 'Enter deposit date', '', 'col-12', 1, '2018-07-04 16:47:13', '2018-07-04 16:47:13'),
(6, 'Attach deposit slip', 'attach', '', 1, 0, '', '', 'col-12', 1, '2018-07-04 16:49:23', '2018-07-04 16:49:23');

CREATE TABLE `process_form_field_allocation` (
  `id` int(10) UNSIGNED NOT NULL,
  `step_id` int(10) UNSIGNED NOT NULL,
  `field_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `process_form_field_allocation` (`id`, `step_id`, `field_id`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 1, '2018-07-04 16:50:57', '2018-07-04 16:50:57'),
(3, 2, 3, 1, '2018-07-04 16:51:04', '2018-07-04 16:51:04'),
(4, 2, 4, 1, '2018-07-04 16:51:09', '2018-07-04 16:51:09'),
(5, 3, 5, 1, '2018-07-04 16:51:16', '2018-07-04 16:51:16'),
(6, 3, 6, 1, '2018-07-04 16:51:22', '2018-07-04 16:51:22');

CREATE TABLE `process_form_responses` (
  `id` int(10) UNSIGNED NOT NULL,
  `field_id` int(10) UNSIGNED NOT NULL,
  `step_id` int(10) UNSIGNED NOT NULL,
  `process_form_id` int(10) UNSIGNED NOT NULL,
  `trackable_id` int(10) UNSIGNED NOT NULL,
  `trackable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `process_form_responses` (`id`, `field_id`, `step_id`, `process_form_id`, `trackable_id`, `trackable_type`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 42, 'jobcard', 1, '2018-07-04 19:42:52', '2018-07-04 19:42:52');

CREATE TABLE `process_form_steps` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `process_form_steps` (`id`, `name`, `description`, `icon`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Step 1', 'This is the first step', 'icon-layers icons', 1, '2018-07-04 15:48:55', '2018-07-04 15:48:55'),
(2, 'Step 2', 'This is the second step', 'icon-wallet icons', 1, '2018-07-04 15:49:20', '2018-07-04 15:49:20'),
(3, 'Step 3', 'This is the third step', 'icon-rocket icons', 1, '2018-07-04 15:49:41', '2018-07-04 15:49:41');

CREATE TABLE `process_form_step_allocation` (
  `id` int(10) UNSIGNED NOT NULL,
  `process_form_id` int(10) UNSIGNED NOT NULL,
  `step_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `process_form_step_allocation` (`id`, `process_form_id`, `step_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2018-07-04 15:50:06', '2018-07-04 15:50:06'),
(2, 1, 2, 1, '2018-07-04 15:50:12', '2018-07-04 15:50:12'),
(3, 1, 3, 1, '2018-07-04 15:50:18', '2018-07-04 15:50:18');

CREATE TABLE `recent_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `activity` text COLLATE utf8mb4_unicode_ci,
  `trackable_id` int(10) UNSIGNED NOT NULL,
  `trackable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `company_branch_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `recent_activities` (`id`, `activity`, `trackable_id`, `trackable_type`, `created_by`, `company_branch_id`, `created_at`, `updated_at`) VALUES
(83, '{\"type\":\"contractor_selected\",\"jobcard\":{\"id\":43,\"title\":\"Broken Window Replacement\",\"description\":\"Replacement of 23 see-through classroom windows that are cracked and broken. This job requires that contractor replaces every window with a new one while also discarding of the old broken windows\",\"start_date\":\"2018-07-02\",\"end_date\":\"2018-07-13\",\"step_id\":0,\"priority_id\":8,\"cost_center_id\":9,\"company_branch_id\":1,\"category_id\":11,\"client_id\":57,\"select_contractor_id\":\"58\",\"img_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/jobcards\\/jb_15304331115b388e578a643.jpeg\",\"created_by\":1,\"created_at\":\"2018-07-01 08:19:04\",\"updated_at\":\"2018-07-02 14:30:34\"},\"company\":{\"id\":58,\"name\":\"Adler Windows\",\"description\":null,\"city\":\"Gaborone\",\"state_or_region\":\"South East\",\"address\":\"Plot 3473, Commerce Park\",\"industry\":null,\"type\":null,\"website_link\":null,\"profile_doc_url\":null,\"logo_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/company_logos\\/cl_15304356525b389844f3b2f.png\",\"phone_ext\":\"267\",\"phone_num\":\"39867280\",\"email\":\"info@adlerwindows.co.bw\",\"created_by\":1,\"created_at\":\"2018-07-01 09:00:56\",\"updated_at\":\"2018-07-02 12:02:50\"}}', 43, 'jobcard', 1, 1, '2018-07-02 12:30:34', '2018-07-02 12:30:34'),
(84, '{\"type\":\"contractor_selected\",\"jobcard\":{\"id\":43,\"title\":\"Broken Window Replacement\",\"description\":\"Replacement of 23 see-through classroom windows that are cracked and broken. This job requires that contractor replaces every window with a new one while also discarding of the old broken windows\",\"start_date\":\"2018-07-02\",\"end_date\":\"2018-07-13\",\"step_id\":0,\"priority_id\":8,\"cost_center_id\":9,\"company_branch_id\":1,\"category_id\":11,\"client_id\":57,\"select_contractor_id\":\"59\",\"img_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/jobcards\\/jb_15304331115b388e578a643.jpeg\",\"created_by\":1,\"created_at\":\"2018-07-01 08:19:04\",\"updated_at\":\"2018-07-02 14:46:09\"},\"company\":{\"id\":59,\"name\":\"Metal Depots\",\"description\":null,\"city\":\"Gaborone\",\"state_or_region\":\"North East\",\"address\":\"Plot 3489, Blue Jacket Street\",\"industry\":null,\"type\":null,\"website_link\":null,\"profile_doc_url\":null,\"logo_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/company_logos\\/cl_15304533845b38dd88995a8.png\",\"phone_ext\":\"267\",\"phone_num\":\"3900321\",\"email\":\"enquiries@metaldeports.co.bw\",\"created_by\":1,\"created_at\":\"2018-07-01 13:56:32\",\"updated_at\":\"2018-07-01 13:56:32\"}}', 43, 'jobcard', 1, 1, '2018-07-02 12:46:09', '2018-07-02 12:46:09'),
(85, '{\"type\":\"created\"}', 45, 'jobcard', 1, 1, '2018-07-02 12:51:32', '2018-07-02 12:51:32'),
(87, '{\"type\":\"created\",\"company\":{\"name\":\"Greenwood\",\"city\":\"Gaborone\",\"state_or_region\":\"South East\",\"address\":\"Plot 3473, Finance Park\",\"logo_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/company_logos\\/cl_15305439565b3a3f54405a7.jpeg\",\"phone_ext\":\"267\",\"phone_num\":\"3933321\",\"email\":\"enquiries@greenwood.co.bw\",\"created_by\":1,\"updated_at\":\"2018-07-02 15:05:58\",\"created_at\":\"2018-07-02 15:05:58\",\"id\":61}}', 1, 'company_branch', 1, 0, '2018-07-02 13:05:59', '2018-07-02 13:05:59'),
(88, '{\"type\":\"client_added\",\"company\":{\"name\":\"Greenwood\",\"city\":\"Gaborone\",\"state_or_region\":\"South East\",\"address\":\"Plot 3473, Finance Park\",\"logo_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/company_logos\\/cl_15305439565b3a3f54405a7.jpeg\",\"phone_ext\":\"267\",\"phone_num\":\"3933321\",\"email\":\"enquiries@greenwood.co.bw\",\"created_by\":1,\"updated_at\":\"2018-07-02 15:05:58\",\"created_at\":\"2018-07-02 15:05:58\",\"id\":61}}', 45, 'jobcard', 1, 0, '2018-07-02 13:05:59', '2018-07-02 13:05:59'),
(89, '{\"type\":\"client_removed\",\"company\":{\"id\":61,\"name\":\"Greenwood\",\"description\":null,\"city\":\"Gaborone\",\"state_or_region\":\"South East\",\"address\":\"Plot 3473, Finance Park\",\"industry\":null,\"type\":null,\"website_link\":null,\"profile_doc_url\":null,\"logo_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/company_logos\\/cl_15305439565b3a3f54405a7.jpeg\",\"phone_ext\":\"267\",\"phone_num\":\"3933321\",\"email\":\"enquiries@greenwood.co.bw\",\"created_by\":1,\"created_at\":\"2018-07-02 15:05:58\",\"updated_at\":\"2018-07-02 15:05:58\"}}', 45, 'jobcard', 1, 1, '2018-07-02 13:11:23', '2018-07-02 13:11:23'),
(90, '{\"type\":\"created\",\"company\":{\"name\":\"Merchant Capital\",\"city\":\"Gaborone\",\"state_or_region\":\"South West\",\"address\":\"Plot 1753, Commerce Park\",\"logo_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/company_logos\\/cl_15305445895b3a41cd9e29f.png\",\"phone_ext\":\"267\",\"phone_num\":\"3988721\",\"email\":\"info@merchantcapital.co.bw\",\"created_by\":1,\"updated_at\":\"2018-07-02 15:16:32\",\"created_at\":\"2018-07-02 15:16:32\",\"id\":62}}', 1, 'company_branch', 1, 0, '2018-07-02 13:16:32', '2018-07-02 13:16:32'),
(91, '{\"type\":\"contractor_added\",\"company\":{\"name\":\"Merchant Capital\",\"city\":\"Gaborone\",\"state_or_region\":\"South West\",\"address\":\"Plot 1753, Commerce Park\",\"logo_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/company_logos\\/cl_15305445895b3a41cd9e29f.png\",\"phone_ext\":\"267\",\"phone_num\":\"3988721\",\"email\":\"info@merchantcapital.co.bw\",\"created_by\":1,\"updated_at\":\"2018-07-02 15:16:32\",\"created_at\":\"2018-07-02 15:16:32\",\"id\":62}}', 45, 'jobcard', 1, 0, '2018-07-02 13:16:34', '2018-07-02 13:16:34'),
(92, '{\"type\":\"created\",\"company\":{\"name\":\"Think Direct\",\"city\":\"Gaborone\",\"state_or_region\":null,\"address\":null,\"logo_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/company_logos\\/cl_15305447825b3a428e11260.jpeg\",\"phone_ext\":null,\"phone_num\":null,\"email\":null,\"created_by\":1,\"updated_at\":\"2018-07-02 15:19:44\",\"created_at\":\"2018-07-02 15:19:44\",\"id\":63}}', 1, 'company_branch', 1, 0, '2018-07-02 13:19:44', '2018-07-02 13:19:44'),
(93, '{\"type\":\"contractor_added\",\"company\":{\"name\":\"Think Direct\",\"city\":\"Gaborone\",\"state_or_region\":null,\"address\":null,\"logo_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/company_logos\\/cl_15305447825b3a428e11260.jpeg\",\"phone_ext\":null,\"phone_num\":null,\"email\":null,\"created_by\":1,\"updated_at\":\"2018-07-02 15:19:44\",\"created_at\":\"2018-07-02 15:19:44\",\"id\":63}}', 45, 'jobcard', 1, 0, '2018-07-02 13:19:45', '2018-07-02 13:19:45'),
(94, '{\"type\":\"updated\",\"company\":{\"id\":63,\"name\":\"Think Direct\",\"description\":null,\"city\":\"Gaborone\",\"state_or_region\":\"North East\",\"address\":\"Plot 3221, Loapi House\",\"industry\":null,\"type\":null,\"website_link\":\"www.thinkdirect.co.bw\",\"profile_doc_url\":null,\"logo_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/company_logos\\/cl_15305447825b3a428e11260.jpeg\",\"phone_ext\":\"267\",\"phone_num\":\"399221\",\"email\":\"info@thinkdirect.co.bw\",\"created_by\":1,\"created_at\":\"2018-07-02 15:19:44\",\"updated_at\":\"2018-07-02 15:21:19\"}}', 1, 'company_branch', 1, 0, '2018-07-02 13:21:19', '2018-07-02 13:21:19'),
(95, '{\"type\":\"contractor_selected\",\"jobcard\":{\"id\":45,\"title\":\"Sample 1\",\"description\":\"This is a sample job card with details describing work to be done by a particular contractor for a specific clientile\",\"start_date\":\"2018-07-03\",\"end_date\":\"2018-07-05\",\"step_id\":null,\"priority_id\":7,\"cost_center_id\":9,\"company_branch_id\":1,\"category_id\":9,\"client_id\":61,\"select_contractor_id\":\"62\",\"img_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/jobcards\\/jb_15305430895b3a3bf106b8f.jpeg\",\"created_by\":1,\"created_at\":\"2018-07-02 14:51:32\",\"updated_at\":\"2018-07-02 15:22:49\"},\"company\":{\"id\":62,\"name\":\"Merchant Capital\",\"description\":null,\"city\":\"Gaborone\",\"state_or_region\":\"South West\",\"address\":\"Plot 1753, Commerce Park\",\"industry\":null,\"type\":null,\"website_link\":null,\"profile_doc_url\":null,\"logo_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/company_logos\\/cl_15305445895b3a41cd9e29f.png\",\"phone_ext\":\"267\",\"phone_num\":\"3988721\",\"email\":\"info@merchantcapital.co.bw\",\"created_by\":1,\"created_at\":\"2018-07-02 15:16:32\",\"updated_at\":\"2018-07-02 15:16:32\"}}', 45, 'jobcard', 1, 1, '2018-07-02 13:22:49', '2018-07-02 13:22:49'),
(96, '{\"type\":\"contact_added\",\"contact\":{\"first_name\":\"Boago\",\"last_name\":\"Letsholo\",\"position\":\"Manager\",\"phone_ext\":\"267\",\"phone_num\":\"3933322\",\"email\":\"boago@greenwood.co.bw\",\"created_by\":1,\"updated_at\":\"2018-07-02 15:25:59\",\"created_at\":\"2018-07-02 15:25:59\",\"id\":49}}', 0, '', 1, 0, '2018-07-02 13:25:59', '2018-07-02 13:25:59'),
(97, '{\"type\":\"contact_added\",\"contact\":{\"first_name\":\"Boago\",\"last_name\":\"Letsholo\",\"position\":\"Manager\",\"phone_ext\":\"267\",\"phone_num\":\"3933322\",\"email\":\"boago@greenwood.co.bw\",\"created_by\":1,\"updated_at\":\"2018-07-02 15:25:59\",\"created_at\":\"2018-07-02 15:25:59\",\"id\":49}}', 45, 'jobcard', 1, 0, '2018-07-02 13:25:59', '2018-07-02 13:25:59'),
(98, '{\"type\":\"created\"}', 46, 'jobcard', 1, 1, '2018-07-04 08:07:18', '2018-07-04 08:07:18'),
(99, '{\"type\":\"created\",\"company\":{\"name\":\"Adler Windows\",\"city\":\"Gaborone\",\"state_or_region\":\"South East\",\"address\":\"Plot 3456, Finance Park\",\"logo_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/company_logos\\/cl_15306989795b3c9ce385653.png\",\"phone_ext\":\"267\",\"phone_num\":\"39900231\",\"email\":\"info@adlerwindows.co.bw\",\"created_by\":1,\"updated_at\":\"2018-07-04 10:09:42\",\"created_at\":\"2018-07-04 10:09:42\",\"id\":64}}', 1, 'company_branch', 1, 0, '2018-07-04 08:09:42', '2018-07-04 08:09:42'),
(100, '{\"type\":\"client_added\",\"company\":{\"name\":\"Adler Windows\",\"city\":\"Gaborone\",\"state_or_region\":\"South East\",\"address\":\"Plot 3456, Finance Park\",\"logo_url\":\"http:\\/\\/oq-bucket.s3.amazonaws.com\\/company_logos\\/cl_15306989795b3c9ce385653.png\",\"phone_ext\":\"267\",\"phone_num\":\"39900231\",\"email\":\"info@adlerwindows.co.bw\",\"created_by\":1,\"updated_at\":\"2018-07-04 10:09:42\",\"created_at\":\"2018-07-04 10:09:42\",\"id\":64}}', 46, 'jobcard', 1, 0, '2018-07-04 08:09:43', '2018-07-04 08:09:43'),
(101, '{\"type\":\"status_changed\",\"old_status\":\"Open\",\"new_status\":\"Deposit Paid\"}', 46, 'jobcard', 1, 1, '2018-07-04 08:12:25', '2018-07-04 08:12:25');

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `process_form_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `bio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_ext` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `verifyToken` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `tutorial_status` text COLLATE utf8mb4_unicode_ci,
  `company_branch_id` int(10) UNSIGNED DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `gender`, `date_of_birth`, `bio`, `address`, `phone_ext`, `phone_num`, `avatar`, `status`, `verifyToken`, `settings`, `tutorial_status`, `company_branch_id`, `position`, `created_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Julian', 'Tabona', 'brandontabona@gmail.com', 'juliantabona', '$2y$10$RO2FpxWIdbaxvvUZRR1ViOxXgtZGbH66Q4xJM4VO2gJyjcutOZ0EK', 'Male', '1994-01-13', NULL, 'Plot 3473 Extension 12, Gaborone', '267', '75993221', 'http://oq-bucket.s3.amazonaws.com/profiles/pr_15306109625b3b451285a2b.jpeg', 0, NULL, NULL, NULL, 1, NULL, NULL, 'lYzu1POfYve9iG10Ez4mIyVH9bYMos7WhD2DkjJF8UORm6NNBcVjWhxnCFVV', '2018-06-11 19:15:52', '2018-07-03 07:42:43'),
(41, 'Kabelo', 'Mosimane', 'kabelo@autorepair.co.bw', NULL, NULL, 'Male', '2009-01-19', NULL, 'Plot 3473 Extension 12', '267', '75994500', 'http://oq-bucket.s3.amazonaws.com/profiles/pr_15305553035b3a6ba77c37a.jpeg', 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-06-25 07:10:14', '2018-07-02 16:15:04'),
(42, 'Katlo', 'Ditlhako', 'katlo@autorepair.co.bw', NULL, NULL, 'Male', NULL, NULL, NULL, '267', '3993221', 'http://oq-bucket.s3.amazonaws.com/profiles/pr_15305556225b3a6ce69fe6f.jpeg', 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-06-28 09:13:37', '2018-07-02 16:20:23'),
(43, 'kamogelo', 'Mooketsi', 'kamogelo@antlancarepairs.co.bw', NULL, NULL, NULL, NULL, NULL, NULL, '267', '3993221', NULL, 0, NULL, NULL, NULL, NULL, 'Manager', 1, NULL, '2018-06-28 14:16:40', '2018-06-28 14:16:40'),
(44, 'Mpho', 'Molao', 'mphomolao@windowkrafts.co.bw', NULL, NULL, NULL, NULL, NULL, NULL, '267', '3993554', NULL, 0, NULL, NULL, NULL, NULL, 'Secretary', 1, NULL, '2018-07-01 07:10:33', '2018-07-01 07:10:33'),
(45, 'Kago', 'Moloadi', 'kagomolaodi@windowkrafts.co.bw', NULL, NULL, NULL, NULL, NULL, NULL, '267', '3993555', NULL, 0, NULL, NULL, NULL, NULL, 'Operations', 1, NULL, '2018-07-01 07:16:33', '2018-07-01 07:16:33'),
(46, 'Refilwe', 'Dinko', 'refilwedinko@windowkrafts.co.bw', NULL, NULL, NULL, NULL, NULL, NULL, '267', '3993556', NULL, 0, NULL, NULL, NULL, NULL, 'Manager', 1, NULL, '2018-07-01 07:17:22', '2018-07-01 07:17:22'),
(47, 'Kemo', 'Mmoloki', 'kemommoloki@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '267', '399900', NULL, 0, NULL, NULL, NULL, NULL, 'Manager', 1, NULL, '2018-07-01 19:51:31', '2018-07-01 19:51:31'),
(49, 'Boago', 'Letsholo', 'boago@greenwood.co.bw', NULL, NULL, NULL, NULL, NULL, NULL, '267', '3933322', NULL, 0, NULL, NULL, NULL, NULL, 'Manager', 1, NULL, '2018-07-02 13:25:59', '2018-07-02 13:25:59');

CREATE TABLE `views` (
  `id` int(10) UNSIGNED NOT NULL,
  `viewed_by` int(10) UNSIGNED NOT NULL,
  `viewable_id` int(10) UNSIGNED NOT NULL,
  `viewable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `views` (`id`, `viewed_by`, `viewable_id`, `viewable_type`, `created_at`, `updated_at`) VALUES
(92, 1, 41, 'jobcard', '2018-06-25 06:15:00', '2018-06-25 06:15:00'),
(93, 1, 41, 'jobcard', '2018-06-25 07:22:30', '2018-06-25 07:22:30'),
(94, 1, 41, 'jobcard', '2018-06-25 10:28:58', '2018-06-25 10:28:58'),
(95, 1, 41, 'jobcard', '2018-06-25 12:06:34', '2018-06-25 12:06:34'),
(96, 1, 41, 'jobcard', '2018-06-27 22:02:26', '2018-06-27 22:02:26'),
(97, 1, 41, 'jobcard', '2018-06-27 23:05:23', '2018-06-27 23:05:23'),
(98, 1, 41, 'jobcard', '2018-06-28 04:39:44', '2018-06-28 04:39:44'),
(99, 1, 41, 'jobcard', '2018-06-28 09:12:59', '2018-06-28 09:12:59'),
(100, 1, 41, 'jobcard', '2018-06-28 10:13:22', '2018-06-28 10:13:22'),
(101, 1, 42, 'jobcard', '2018-06-28 10:16:53', '2018-06-28 10:16:53'),
(102, 1, 42, 'jobcard', '2018-06-28 14:02:00', '2018-06-28 14:02:00'),
(103, 1, 41, 'jobcard', '2018-06-28 14:39:50', '2018-06-28 14:39:50'),
(104, 1, 42, 'jobcard', '2018-06-28 15:05:57', '2018-06-28 15:05:57'),
(105, 1, 41, 'jobcard', '2018-06-28 17:40:49', '2018-06-28 17:40:49'),
(106, 1, 42, 'jobcard', '2018-06-28 18:20:18', '2018-06-28 18:20:18'),
(107, 1, 41, 'jobcard', '2018-06-28 18:53:57', '2018-06-28 18:53:57'),
(108, 1, 42, 'jobcard', '2018-06-28 19:21:35', '2018-06-28 19:21:35'),
(109, 1, 41, 'jobcard', '2018-06-28 21:00:25', '2018-06-28 21:00:25'),
(110, 1, 41, 'jobcard', '2018-06-29 14:23:27', '2018-06-29 14:23:27'),
(111, 1, 42, 'jobcard', '2018-06-29 14:27:04', '2018-06-29 14:27:04'),
(112, 1, 42, 'jobcard', '2018-06-29 16:07:39', '2018-06-29 16:07:39'),
(113, 1, 41, 'jobcard', '2018-06-30 06:50:42', '2018-06-30 06:50:42'),
(114, 1, 41, 'jobcard', '2018-06-30 09:48:37', '2018-06-30 09:48:37'),
(115, 1, 42, 'jobcard', '2018-06-30 10:06:30', '2018-06-30 10:06:30'),
(116, 1, 41, 'jobcard', '2018-06-30 10:53:32', '2018-06-30 10:53:32'),
(117, 1, 41, 'jobcard', '2018-06-30 11:56:05', '2018-06-30 11:56:05'),
(118, 1, 41, 'jobcard', '2018-06-30 16:25:53', '2018-06-30 16:25:53'),
(119, 1, 41, 'jobcard', '2018-06-30 17:37:49', '2018-06-30 17:37:49'),
(120, 1, 42, 'jobcard', '2018-06-30 17:39:02', '2018-06-30 17:39:02'),
(121, 1, 42, 'jobcard', '2018-06-30 18:43:44', '2018-06-30 18:43:44'),
(122, 1, 41, 'jobcard', '2018-06-30 18:47:51', '2018-06-30 18:47:51'),
(123, 1, 41, 'jobcard', '2018-07-01 05:57:39', '2018-07-01 05:57:39'),
(124, 1, 43, 'jobcard', '2018-07-01 06:19:05', '2018-07-01 06:19:05'),
(125, 1, 43, 'jobcard', '2018-07-01 09:36:05', '2018-07-01 09:36:05'),
(126, 1, 41, 'jobcard', '2018-07-01 10:51:55', '2018-07-01 10:51:55'),
(127, 1, 42, 'jobcard', '2018-07-01 18:34:11', '2018-07-01 18:34:11'),
(128, 1, 41, 'jobcard', '2018-07-01 18:56:01', '2018-07-01 18:56:01'),
(129, 1, 42, 'jobcard', '2018-07-01 19:51:32', '2018-07-01 19:51:32'),
(130, 1, 43, 'jobcard', '2018-07-02 09:41:43', '2018-07-02 09:41:43'),
(131, 1, 41, 'jobcard', '2018-07-02 10:10:13', '2018-07-02 10:10:13'),
(132, 1, 42, 'jobcard', '2018-07-02 10:10:46', '2018-07-02 10:10:46'),
(133, 1, 43, 'jobcard', '2018-07-02 11:03:37', '2018-07-02 11:03:37'),
(134, 1, 43, 'jobcard', '2018-07-02 12:04:33', '2018-07-02 12:04:33'),
(135, 1, 44, 'jobcard', '2018-07-02 12:50:57', '2018-07-02 12:50:57'),
(136, 1, 45, 'jobcard', '2018-07-02 12:51:32', '2018-07-02 12:51:32'),
(137, 1, 43, 'jobcard', '2018-07-02 14:59:58', '2018-07-02 14:59:58'),
(138, 1, 45, 'jobcard', '2018-07-02 15:06:55', '2018-07-02 15:06:55'),
(139, 1, 41, 'jobcard', '2018-07-02 15:26:39', '2018-07-02 15:26:39'),
(140, 1, 42, 'jobcard', '2018-07-02 15:26:50', '2018-07-02 15:26:50'),
(141, 1, 41, 'jobcard', '2018-07-04 08:02:59', '2018-07-04 08:02:59'),
(142, 1, 46, 'jobcard', '2018-07-04 08:07:18', '2018-07-04 08:07:18'),
(143, 1, 42, 'jobcard', '2018-07-04 16:31:08', '2018-07-04 16:31:08'),
(144, 1, 42, 'jobcard', '2018-07-04 17:33:59', '2018-07-04 17:33:59'),
(145, 1, 46, 'jobcard', '2018-07-05 00:40:38', '2018-07-05 00:40:38'),
(146, 1, 42, 'jobcard', '2018-07-05 00:41:08', '2018-07-05 00:41:08'),
(147, 1, 42, 'jobcard', '2018-07-05 01:43:32', '2018-07-05 01:43:32');

ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `company_branches`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `company_clients`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `company_contacts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `company_contractors`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cost_centers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `jobcards`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `jobcard_contractors`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `process_form`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `process_form_allocation`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `process_form_fields`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `process_form_field_allocation`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `process_form_responses`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `process_form_steps`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `process_form_step_allocation`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `recent_activities`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

ALTER TABLE `company_branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `company_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

ALTER TABLE `company_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

ALTER TABLE `company_contractors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

ALTER TABLE `cost_centers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `jobcards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

ALTER TABLE `jobcard_contractors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `priorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `process_form`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `process_form_allocation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `process_form_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `process_form_field_allocation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `process_form_responses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `process_form_steps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `process_form_step_allocation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `recent_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

ALTER TABLE `views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;