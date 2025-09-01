<!DOCTYPE html>

<html lang="en">

	<head>
		<title>webERP - Development</title>

		<meta charset='utf-8'>
		<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta data-react-helmet="true" name="description" content="webERP is a practical web-based open-source ERP system"/>

		<link rel="canonical" href="https://weberp.org/Development.php" />
		<link href="favicon.ico" rel='shortcut icon' type='image/x-icon'>
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body id="home">
		<header>
			<a href="./index.html" class="ItemLink">
				<div id="logo">
					<div class="logo logo-left">web</div><div class="logo logo-right">ERP</div>
				</div>
			</a>
			<span id="tagline">
				<div class="nav-item">
					<a href="./index.html">
					<img class="icons" src="images/home.avif" />
					<span class="nav-caption">Home</span>
					</a>
				</div>
				<div class="nav-item">
					<a href="./Features.html">
					<img class="icons" src="images/features.avif" />
					<span class="nav-caption">Features</span>
					</a>
				</div>
				<div class="nav-item">
					<a href="https://github.com/timschofield/webERP/discussions" target="_blank">
					<img class="icons" src="images/discussions.avif" />
					<span class="nav-caption">Discussions</span>
					</a>
				</div>
				<div class="nav-item">
					<a href="./Development.php">
					<img class="icons" src="images/software.avif" />
					<span class="nav-caption">Development</span>
					</a>
				</div>
				<div class="nav-item">
					<a href="https://github.com/timschofield/webERP/releases/tag/v4.15.2" target="_blank">
					<img class="icons" src="images/downloads.avif" />
					<span class="nav-caption">Downloads</span>
					</a>
				</div>
				<div class="nav-item">
					<a href="https://weberp.org/demo" target="_blank">
					<img class="icons" src="images/demo.avif" />
					<span class="nav-caption">Demo</span>
					</a>
				</div>
				<div class="nav-item">
					<a href="./Documentation.html">
					<img class="icons" src="images/documentation.avif" />
					<span class="nav-caption">Documentation</span>
					</a>
				</div>
			</span>
		</header>
		<section>
			<?php
				require(__DIR__ . '/DocParser.php');

				use Symfony\Component\Dotenv\Dotenv;
				$dotenv = new Dotenv();
				// loads .env, .env.local
				$dotenv->loadEnv(__DIR__.'/.env');
				unset($dotenv);

				$docsDir = $_ENV['DEMO_DIR'] . '/doc/developers';
				$docParse = new DocParser($docsDir);

				$renderedText = null;
				if (isset($_GET['file']) ) {
					try {
						$renderedText = $docParse->renderDoc($_GET['file']);
					} catch (Exception $e) {
						// do nothing
					}
				}

				if ($renderedText !== null) {
					echo $renderedText;
				} else {
			?>
			<h1 class="main-title">General</h1>
			<ul>
                <li><p>Contributors retain copyright for their work. All contributions are presumed to be provided according to the terms of the GNU Public Licence v2 (GPL v2).</p></li>
            </ul>

			<h1 class="main-title">Developer's documentation</h1>
			<p>The developer-oriented documentation is now maintained within the application source code and can be viewed online, both on this site and <a href="https://github.com/timschofield/webERP/blob/master/doc/developers/">on GitHub</a>.</p>
			<p>It contains the following guides:</p>
			<ul>
			<?php
					foreach($docParse->scanDir() as $fileName) {
						echo '<li><a href="Development.php?file=' . htmlspecialchars($fileName) .'">' . htmlspecialchars(ucfirst(strtolower(str_replace('_', ' ', preg_replace('/\.md$/', '', $fileName))))) . "</a></li>\n";
					}
			?>
			</ul>
			<?php
				}
			?>
		</section>
		<footer>
		<div class="badges-container">
		<!-- Begin SF Tag -->
			<a href="https://sourceforge.net/projects/web-erp/?pk_campaign=badge&pk_source=vendor">
				<img src="images/oss-users-love-us-black.avif" class="badges" title="Sourceforge 'OSS users love us' award" alt="Sourceforge 'OSS users love us' award" />
			</a>
		<!-- End SF Tag -->
		<!-- Begin SF Tag -->
			<a href="https://sourceforge.net/projects/web-erp/?pk_campaign=badge&pk_source=vendor">
				<img src="images/oss-sf-favorite-black.avif" class="badges" title="Sourceforge 'OSS favourite' award" alt="Sourceforge 'OSS favourite' award" />
			</a>
		<!-- End SF Tag -->
		<!-- Begin SF Tag -->
			<a href="https://sourceforge.net/projects/web-erp/?pk_campaign=badge&pk_source=vendor">
				<img src="images/oss-community-choice-black.avif" class="badges" title="Sourceforge 'OSS community choice' award" alt="Sourceforge 'OSS community choice' award" />
			</a>
		<!-- End SF Tag -->
		<!-- Begin SF Tag -->
			<a href="https://sourceforge.net/projects/web-erp/?pk_campaign=badge&pk_source=vendor">
				<img src="images/oss-community-leader-black.avif" class="badges" title="Sourceforge 'OSS community leader' award" alt="Sourceforge 'OSS community leader' award" />
			</a>
		<!-- End SF Tag -->
		<!-- Begin SF Tag -->
			<a href="https://sourceforge.net/projects/web-erp/?pk_campaign=badge&pk_source=vendor">
				<img src="images/oss-open-source-excellence-black.avif" class="badges" title="Sourceforge 'Open source excellence' award" alt="Sourceforge 'Open source excellence' award" />
			</a>
		<!-- End SF Tag -->
		</div>
		<span id="copyright">&copy webERP community 2024, 2025.</span>
		</footer>
	</body>
</html>
