-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2023-02-10 14:12:15
-- 服务器版本： 10.1.38-MariaDB
-- PHP 版本： 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `test0`
--

-- --------------------------------------------------------

--
-- 表的结构 `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `adminuser`
--

INSERT INTO `adminuser` (`id`, `username`, `nickname`, `password`, `email`, `profile`, `auth_key`, `password_hash`, `password_reset_token`) VALUES
(1, 'admin', '默认管理员', '*', 'admin@admin.com', '这是一个默认管理员，密码123456', 'P4dGn3LrQI08utvsPQ270QCZ9pVrKswd', '$2y$13$KYBWDD1S/iVBHoJ6ZBJMge95gEuMARZLVMeXLxjNCnnN0qLUODCWG', '');

-- --------------------------------------------------------

--
-- 表的结构 `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1675930631),
('admin', '2', 1675768931),
('commentAuditor', '1', 1675930631),
('commentAuditor', '2', 1675768931),
('postAdmin', '1', 1675930630),
('postAdmin', '2', 1675768931),
('postOperator', '1', 1675930630),
('postOperator', '2', 1675768931);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, '系统管理员', NULL, NULL, 1465177361, 1465177361),
('approveComment', 2, '审核评论', NULL, NULL, 1465177361, 1465177361),
('commentAuditor', 1, '评论审核员', NULL, NULL, 1465177361, 1465177361),
('createPost', 2, '新增文章', NULL, NULL, 1465177361, 1465177361),
('deletePost', 2, '删除文章', NULL, NULL, 1465177361, 1465177361),
('postAdmin', 1, '文章管理员', NULL, NULL, 1465177361, 1465177361),
('postOperator', 1, '文章操作员', NULL, NULL, 1465177361, 1465177361),
('updatePost', 2, '修改文章', NULL, NULL, 1465177361, 1465177361),
('roleControl', 2, '管理权限', NULL, NULL, 1465177361, 1465177361);
-- --------------------------------------------------------

--
-- 表的结构 `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'commentAuditor'),
('admin', 'postAdmin'),
('commentAuditor', 'approveComment'),
('postAdmin', 'createPost'),
('postAdmin', 'deletePost'),
('postAdmin', 'updatePost'),
('admin', 'roleControl'),
('postOperator', 'deletePost');

-- --------------------------------------------------------

--
-- 表的结构 `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `content`, `status`, `create_time`, `userid`, `email`, `url`, `post_id`) VALUES
(4, '我只想说明一点，俄军战斗力堪称恐怖级别，与美军比较类似阿喀琉斯与赫克托尔，单打独斗连美国都没有必胜的把握，因为现代国际战争条例规定，不允许伤害双方交战区的平民，致使俄军打仗畏手畏脚，不得不陷入巷战，你说不吃亏才怪，如果跟希特勒闪电战那般，怕是十个乌克兰都轰平了。', 2, 1676034392, 1, 'a@admin.com', '', 3);

-- --------------------------------------------------------

--
-- 表的结构 `commentstatus`
--

CREATE TABLE `commentstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `commentstatus`
--

INSERT INTO `commentstatus` (`id`, `name`, `position`) VALUES
(1, '待审核', 1),
(2, '已审核', 2);

-- --------------------------------------------------------

--
-- 表的结构 `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m140506_102106_rbac_init', 1675764467),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1675764467),
('m180523_151638_rbac_updates_indexes_without_prefix', 1675764467);

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `tags`, `status`, `create_time`, `update_time`, `author_id`) VALUES
(2, '俄乌冲突', '2022年2月15日，随着俄罗斯国防部高调宣布撤回部分部署在俄乌边境、此前正在参与大规模军事演习的陆上部队，从2021年10月起持续至2022年2月的乌克兰东部危机，似乎呈现出了缓慢降温的趋势。\r\n2022年2月17日，乌东部地区局势恶化，乌政府和当地民间武装相互指责对方在接触线地带发动挑衅性炮击 。2月18日，乌东部民间武装宣布，因存在乌克兰发起军事行动的危险，自即日起向俄罗斯大规模集中疏散当地居民。2月21日晚，俄罗斯总统普京签署命令，承认乌克兰东部的“顿涅茨克人民共和国”和“卢甘斯克人民共和国”。 \r\n2022年2月24日，乌克兰管理部门宣布关闭全国领空 ，乌克兰总统泽连斯基表示，乌克兰全境将进入战时状态  ，首都基辅地铁免费开放，地铁站将作为防空洞使用  ；俄军开始对乌军东部部队和其他地区的军事指挥中心、机场进行炮击 。乌克兰国民卫队司令部被摧毁。 2月24日，乌克兰宣布与俄罗斯断交  。2月24日，乌克兰边防部队称俄军突入基辅地区  。当地时间2月24日，乌克兰基辅市政府发出防空警报，通知所有人立即前往民防避难所避难。 当地时间26日，乌克兰基辅市市长宣布，该市地铁转为避难所，不再提供运输服务。 3月2日，乌克兰已经关闭其驻俄罗斯圣彼得堡的总领馆。13日清晨，俄军对利沃夫州亚沃洛夫斯基训练场的空袭共造成9人死亡，57人受伤。 5月3日，俄军摧毁一处美欧援乌军火库，内部存放导弹和无人机。', '俄乌冲突,北约东扩', 2, 1676034005, 1676034005, 1),
(3, '俄乌战争历史背景', '2014年初春的克里米亚危机。在一场短促的军事冲突之后，克里米亚半岛宣布并入俄罗斯，同时乌克兰东部的顿巴斯地区出现了两个由分离主义武装控制的独立政治实体“顿涅茨克人民共和国”（DNR）和“卢甘斯克人民共和国”（LNR），三者合计占据乌克兰7%的领土。由于整场危机已经在事实上发展成乌克兰和俄罗斯之间的局部战争，2014年9月5日，在德俄两国调停下，交战各方签署了实现临时停火、撤出外籍武装人员、承认分裂地区部分自治的《明斯克议定书》。\r\n2015年2月12日，新的《第二阶段明斯克议定书》又规定撤出部署在双方实控线15公里范围内的重型武器，并允许顿巴斯的两个分离地区举行独立的地方选举。然而从那时起至今，交战各方违反议定书要求的行为从未真正停止。联合国人权事务高级专员办公室2020年初公布的一份报告估计，从2014年4月到2020年2月，整个顿巴斯地区丧生的各类武装人员和平民总数超过1.3万人（其中约1/4为平民），将近200万人被迫逃离家园。\r\n2021年12月，俄外交部就与美国和其他西方国家开展安全保障对话发表声明，要求美国、北约就排除北约进一步东扩的可能提供法律保障。\r\n2022年1月10日至13日，俄分别与美国、北约就安全保障建议开展对话，但未取得实质性成果。 \r\n2022年2月21日，俄罗斯联邦安全会议成员就乌克兰东部顿巴斯地区局势举行会议。普京随后发表全国电视讲话，谈及俄乌两国关系、乌东部局势、俄安全保障等问题。随后，普京签署关于承认“顿涅茨克人民共和国”和关于承认“卢甘斯克人民共和国”的命令，以及俄罗斯分别与这两个“共和国”的友好合作互助条约 。2月22日，俄罗斯外交部宣布即日起俄罗斯与“顿涅茨克人民共和国”和“卢甘斯克人民共和国”建立大使级外交关系   。\r\n当地时间2022年2月22日，俄罗斯外长拉夫罗夫表示，俄罗斯会保障“顿涅茨克人民共和国”及“卢甘斯克人民共和国”的安全。 \r\n2022年2月22日，俄罗斯联邦委员会（议会上院）通过相关决议，准许俄罗斯总统在俄境外动用联邦武装力量。联邦委员会的决定自通过之日起开始生效。出动军队的数量、行动区域、任务和在俄罗斯境外停留的时间由俄罗斯总统决定。\r\n2022年2月23日，俄罗斯总统普京与土耳其总统埃尔多安通电话，讨论了乌克兰东部当前局势。普京表示，在乌克兰政府对顿巴斯“进行侵略”以及断然拒绝执行明斯克协议的情况之下，俄方作出承认乌东部民间武装控制的两个地区独立的这一决定具有客观必要性。普京还表示，对美国和北约关于安全保障议题的相关表态表示失望，他认为美国和北约的反应只是为了忽视俄罗斯的合法关切和要求。\r\n\r\n绿色表示俄罗斯周边的北约成员国。图中用红线圈出的国家为乌克兰和格鲁吉亚，这两个紧邻俄罗斯的国家尚未加入北约，但2008年北约布加勒斯特峰会做出了“邀请格鲁吉亚和乌克兰加入北约”的决定。', '俄乌冲突,历史背景', 2, 1676034606, 1676034606, 1);

-- --------------------------------------------------------

--
-- 表的结构 `newscomment`
--

CREATE TABLE `newscomment` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `newsstatus`
--

CREATE TABLE `newsstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `newsstatus`
--

INSERT INTO `newsstatus` (`id`, `name`, `position`) VALUES
(1, '草稿', 1),
(2, '已发布', 2),
(3, '已归档', 3);

-- --------------------------------------------------------

--
-- 表的结构 `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `tags`, `status`, `create_time`, `update_time`, `author_id`) VALUES
(2, '俄乌战争是正义之战吗？', '俄罗斯在乌克兰的所作所为，是如同美国入侵中东一般卑劣而无耻的行径。\r\n\r\n可能有人会说，俄罗斯出兵是为了保护乌克兰境内的俄罗斯族。倘若这也能成为侵略一个主权国家的理由，那么德国夺取苏台德，逼迫波兰割让但泽也是合理的了。可能又有人会说，俄国是为了阻止北约东扩，乌克兰是“自己作死”。然而，请想一想《巴黎非战公约》，请想一想联合国总部花园内那把打结的手枪。任何国家都有选择她自身未来道路的自由，没有国家有权利用战争推行其国家意志。无论从哪个角度看，俄国对乌克兰的战争都是赤裸裸的侵略，是至无耻至卑劣的勾当！\r\n\r\n然而现实并不是理想主义的。尽管欧洲和美国相继表示了谴责。但观诸历史，从慕尼黑会议到静坐战争；从苏联对德共的清洗到战后英国对哥萨克人的出卖，这样的戏码早已上演过许多次。乌克兰很可能又是一场小国的悲剧，一场重演过无数次的悲剧。\r\n\r\n但至少，我们不能将错误当作正确，将无耻当作气魄。我们无从左右世界，但我们还能左右自己的内心。\r\n', '俄乌冲突,正义之战', 2, 1676034177, 1676034177, 1),
(3, '论俄乌战争的本质。', '自2月23日起爆发的俄乌战争，迄今为止已经持续了近十个多月。如此长的时间让我们逐渐认清了这场战争的本质：一场以普京为代表的寡头集团统治的俄罗斯与泽连斯基为代表的美帝国主义资助的买办集团统治的乌克兰之间的帝国主义性质的非正义战争。 在2月23日当晚，在莫斯科红场便爆发了示威游行，人民反对战争，而俄罗斯统治阶级却为了在乌寡头的利益，坚持将战争进行下去。就在当晚，莫斯科、圣彼得堡、伏尔加格勒等俄罗斯的主要城市发布戒严令，禁止人民上街游行，在一周内，就有700多人因为违反戒严令被捕。为了美化战争，寡头们炮制“乌克兰是俄罗斯不可分割的一部分”，好像三十年前推翻社会主义，解体苏联不是他们积极推动的一样。目前在顿巴斯地区，顿涅茨克、卢甘斯克两个人民共和国的政权均被俄罗斯所扶植的傀儡所篡夺，受人民拥戴的红色指战员却被秘密清除，共产主义组织的活动也被禁止。俄罗斯为了战争的胜利，甚至不惜与恐怖分子——车臣武装合作，要知道，车臣分子的恐怖主义行径至少造成了上千俄罗斯人死亡，其中包括三百多名在校师生。俄罗斯的“特别军事行动”打着反法西斯的旗号，但实际上，在俄罗斯的占领下，乌克兰的反动的极端民族主义者正在成比例地上升。俄罗斯坐拥比乌克兰规模大的多、武器装备精良得多的军队，却久攻不下，除了美西方对乌克兰的经济、武器和情报援助外，更重要的是，在社会主义瓦解后，俄罗斯官僚垄断资本主义的发展模式本质上是在为官僚资产阶级谋取利益，难以维系生产力的发展，俄罗斯几乎要重新沦为“帝国主义最薄弱的一环”，只能空抱着苏联留下的几千枚核弹虚张声势了。 在乌克兰，泽连斯基政府在美国的帮助下，通过“广场革命”上台。泽连斯基投桃报李，实行日益亲美的政策，得到了国内亲美买办的大力支持。在外交上，乌克兰对美国卑躬屈膝，尽可能地满足美国的各种需求，为了完成美国北约东扩的目的，乌克兰甚至不惜以破坏东欧的和平为代价，嚷嚷着要加入北约；在内政方面，乌克兰实行“去共产主义化”，大肆拆毁列宁像个二战苏军英雄的雕像和纪念碑，禁止乌克兰共产党的活动，却放任纳粹分子对乌东俄罗斯民族和亲俄派的屠杀，严重压制了人民的政治自由和人身自由，引起了乌克兰人民的强烈不满。乌克兰买办政府存在的意义就是为外国谋利益，它的一切成果都与乌克兰人民无关，一旦战争爆发，乌克兰的寡头们纷纷出逃国外，但它所犯下的罪行却要由无辜的乌克兰人民承担。 泽连斯基对亚努科维奇的胜利本质上是亲美亲西方寡头对亲俄寡头的胜利，俄罗斯寡头不甘心于失败，不甘心于在乌克兰利益的丧失，在多种手段调控未果后，便悍然发动了侵略战争，这是俄乌战争爆发的根本原因。 实践证明，在这场战争中，无论是俄罗斯还是乌克兰，亦或是大力支持乌克兰的美国和欧洲国家，他们的人民都没有得到任何利益，获得利益的只是极少数的剥削者，这充分暴露了这场战争是一场剥削阶级裹挟人民的战争。马克思主义者要坚定地站在无产阶级的立场上，支持俄罗斯和乌克兰人民的反战斗争，并力图将这场人民对人民的战争转化为无产阶级阶级对官僚资产阶级和买办阶级的国内革命战争，建立起无产阶级专政的国家政权，从而彻底消灭帝国主义战争。 全世界无产者，联合起来！', '俄乌冲突,战争本质', 2, 1676034336, 1676034336, 1),
(4, '俄乌战争对我国有何利弊', '自北京冬奥会结束，2022年2月24日俄罗斯和乌克兰之间爆发了战争。这一新闻迅速成为了中国的热点话题。关于这场战争，中国人民欢呼雀跃者有之，悲痛怜悯者有之，幸灾乐祸者也有之。网络上、电视上对于这场战争的分析建议有很多，但是，少有真知灼见。俄乌战争的爆发有一个背景，太过久远和复杂的暂且不说。起因是乌克兰准备加入北约，然后俄罗斯认为自己的安全受到了威胁。故此，俄罗斯于2月24日入侵乌克兰。这样，战争爆发了。首先，对于乌克兰来说，作为一个独立的国家，有自主决定其外交政策的权利。所以，乌克兰加入北约是没有问题的。问题在于，一个国家的外交不但关系到自身的利益，也关系到邻国的利益。乌克兰加入北约，严重地影响了俄罗斯的安全。尤其是在俄罗斯比乌克兰强大很多的情况下，乌克兰加入北约的决定是存在问题的。这一点，可以参考1950年的朝鲜战争，为了保卫新中国的安全，毛泽东主席毅然派遣志愿军入朝，与美国为首的联合国军进行战斗。当时，中国国力弱小，百废待兴，就有勇气与世界上最强大的军队战斗，更不要说现在的俄罗斯了。 乌克兰本可以倚仗与俄罗斯的深厚的历史渊源和与美国为首的西方国家的日益加深的政治关系而采取中立的政策，左右逢源。遗憾的是他们的领导人并未这样做。如此，乌克兰的领导人犯了两大错误：一、天真。过于相信美国为首的西方国家对他们的安全保证。岂不知英国首相丘吉尔说过：“没有永远的敌人，也没有永远的朋友，只有永远的利益。”如果美国为了保护乌克兰而直接参战，当战争规模扩大，很可能诱发世界大战或核战争，这是美国所不能承受的。看不到这一点，足以证明乌克兰领导人的天真。二、愚蠢。俄乌双方实力对比，俄罗斯要明显强大于乌克兰。在俄罗斯明确地警告乌克兰之后，他们仍然坚持加入北约。这相当于一个孩子在挑逗一个成人。在成人不注意的时候，孩子也许可以平安无事。但当这个成人发怒之时，孩子肯定是要倒霉的。以乌克兰的实力，非要挑战俄罗斯的底线，这无疑证明了乌克兰领导人的愚蠢。战争发生后，大量的乌克兰人流离失所，成为难民。对此，我非常同情。但是，乌克兰的领导人是乌克兰人民自己选择的，他们需要为自己的选择负责。因此，每一个乌克兰人都不是无辜的。俗语说：“可怜之人必有可恨之处”，即是如此吧。其次，对于俄罗斯来说，乌克兰加入北约是对俄罗斯的国家安全的严重的威胁。二十世纪的冷战（1947年-1991年）是美苏对峙时期，作为苏联的主要继承者，俄罗斯与美国存在着天然的敌对关系。苏联解体后，俄罗斯曾四次要求加入北约，均被拒绝。这一事实表明，双方的关系并未彻底和解。因此，当乌克兰不顾他们的警告而执意加入北约时，为了维护其自身的安全，俄罗斯就有了发动战争的必要性。德国军事学家克劳塞维茨说：“战争是政治的延续”。为了维护自身的安全即是俄罗斯需要达到的政治目的。为了达成这一目的，他们可以选择两种军事战略。虽然他们并未明确公示其战略目的，但人们仍有理由去推定。一种是全面占领乌克兰，重新实现两国的统一。但这种战略不太符合目前的实际情况。或者说，只凭现在的俄罗斯的力量很难办到。具体原因后面再行论述。另一种则是采取有限的军事行动，推翻乌克兰现政府，建立亲俄的新政府；或者肢解乌克兰，在其东部地区建立新的亲俄国家。不论是哪一种战略，都需要俄罗斯快速地取得军事上的胜利。但是，在军事行动上，他们犯了严重的错误。要取得战争的胜利，需要遵行两个原则：以强凌弱、以众欺寡。乌克兰军队虽然因为各种政治的、经济的、科技的等方面的原因已经大大削弱，但俄罗斯的军队也不复苏联时的荣光。从车臣战争之后的历次战争中的俄罗斯军队的表现可以证明。这就是说：即便俄罗斯军队的战斗力比乌克兰的军队强大（不是比较军队规模），这种差距也是相当有限的。在乌克兰拥有25万左右军队的情况下，俄罗斯应当派遣50万以上的军队才能快速地取得战争的胜利。否则，战事将陷入相持阶段，这时，他们就将面临失败的风险。今天的战事发展也证明了俄罗斯的参与战争的军队规模确实是不够的。可以说，现在的俄罗斯已经被动了。对于俄罗斯来说，现在最好的解决办法是进行快速地政治谈判或者是在北约没有介入之前，增加兵力至50万以快速解决战斗，然后通过选举的方式，推翻亲美的政府而建立亲俄的政府。这样的话，俄罗斯一方面可以摆脱现在的被动局面，另一方面可以有效地遏制北约东扩的长期目标，从而为他们赢得一个较为长期的安全环境。从国际的视角来看，战争不但关乎参战的双方，还关乎双方的盟友。如果只单纯的比较俄乌双方的实力，俄罗斯是具备吞并乌克兰的实力的。但是，乌克兰的背后有北约的支持。这在事实上决定了俄罗斯不可能吞并乌克兰。所以，有限的军事行动成为了必然。例如，在阿富汗战争中，由于中、美等国的支持，苏联只能饮恨而返。同样的，朝鲜战争、越南战争，由于中、苏等国的支持，美国也只能铩羽而归。何况俄罗斯的实力已经远不如苏联时期，故此，俄罗斯的较为实际的战略目的只能是采取有限的军事行动，推翻乌克兰现政府，建立亲俄的新政府；或者肢解乌克兰，在其东部地区建立新的亲俄国家。实际上，俄罗斯真正的问题是其国内社会发展的问题。普京就任总统时承诺：“给我二十年，还你一个强大的俄罗斯。”现在时间已到，承诺却没有兑现。可以说，俄罗斯至今尚不清楚其国家的发展路线到底是什么？这一问题的解决不是普京一个人的事情，而是整个俄罗斯人民的事情。换句话说，俄罗斯的人民中并没有出现一个智者能够指明国家的前进道路。如果，俄罗斯真的有人能够指明这条道路，他们将重新变得伟大，凭借着与乌克兰的深厚的历史渊源，说不准苏联会以某种形式得以重建，而不会像现在这样落得兄弟反目的下场。对于中国来说，社会的发展离不开一个稳定的环境。在当今世界，美国成为世界霸主的情况下，作为制衡美国的两支重要力量：中国和俄罗斯，在没有重大矛盾的情况下，需要相互支持。这对我国的发展至关重要。如果俄罗斯落败，美国对中国的遏制政策无疑地将会加剧。因此，我国对俄罗斯的有限度的支持是必要的。但是，即便俄罗斯获胜，也会对其自身产生重大损失。所以，从长远来看，尽快促成俄乌停战是一个较好的选择。当然，这需要建立在俄罗斯得到其安全保证地基础上。同时，我国还可以为引进乌克兰的人才和技术（如果值得的话），以加强自身的实力。因为只有自身的强大方能应对当今的世界形势。', '俄乌冲突,中国', 2, 1676034513, 1676034513, 1);

-- --------------------------------------------------------

--
-- 表的结构 `poststatus`
--

CREATE TABLE `poststatus` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `poststatus`
--

INSERT INTO `poststatus` (`id`, `name`, `position`) VALUES
(1, '草稿', 1),
(2, '已发布', 2),
(3, '已归档', 3);

-- --------------------------------------------------------

--
-- 表的结构 `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `tag`
--

INSERT INTO `tag` (`id`, `name`, `frequency`) VALUES
(1, '俄乌冲突', 5),
(2, '北约东扩', 1),
(3, '正义之战', 1),
(4, '战争本质', 1),
(5, '中国', 1),
(6, '历史背景', 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'testUser', 'tk37gGOiBkn-EE7TnY4UGISB8b4j13GL', '$2y$13$dG6eI4pW1pinQXTa69JfT./.wWkHTS1kVzZPOBDSDKwy6qlfe2KHe', NULL, 'a@admin.com', 10, 1676033729, 1676033729);

--
-- 转储表的索引
--

--
-- 表的索引 `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- 表的索引 `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- 表的索引 `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- 表的索引 `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- 表的索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comment_post` (`post_id`),
  ADD KEY `FK_comment_user` (`userid`),
  ADD KEY `FK_comment_status` (`status`);

--
-- 表的索引 `commentstatus`
--
ALTER TABLE `commentstatus`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- 表的索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_post_author` (`author_id`),
  ADD KEY `FK_post_status` (`status`);

--
-- 表的索引 `newscomment`
--
ALTER TABLE `newscomment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comment_post` (`post_id`),
  ADD KEY `FK_comment_user` (`userid`),
  ADD KEY `FK_comment_status` (`status`);

--
-- 表的索引 `newsstatus`
--
ALTER TABLE `newsstatus`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_post_author` (`author_id`),
  ADD KEY `FK_post_status` (`status`);

--
-- 表的索引 `poststatus`
--
ALTER TABLE `poststatus`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `commentstatus`
--
ALTER TABLE `commentstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `newscomment`
--
ALTER TABLE `newscomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `newsstatus`
--
ALTER TABLE `newsstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `poststatus`
--
ALTER TABLE `poststatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 限制导出的表
--

--
-- 限制表 `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_comment_status` FOREIGN KEY (`status`) REFERENCES `commentstatus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_comment_user` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- 限制表 `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_news_author` FOREIGN KEY (`author_id`) REFERENCES `adminuser` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_news_status` FOREIGN KEY (`status`) REFERENCES `poststatus` (`id`) ON DELETE CASCADE;

--
-- 限制表 `newscomment`
--
ALTER TABLE `newscomment`
  ADD CONSTRAINT `FK_newscomment_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_newscomment_status` FOREIGN KEY (`status`) REFERENCES `commentstatus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_newscomment_user` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- 限制表 `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `adminuser` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_post_status` FOREIGN KEY (`status`) REFERENCES `poststatus` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
