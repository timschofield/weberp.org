<?php

require_once(__DIR__ . '/vendor/autoload.php');

class DocParser
{
	/** @var string */
	protected $docsDir;

	/**
	 * @param string $docsDir the directory where all files to render are located
	 */
	public function __construct(string $docsDir)
	{
		$this->docsDir = realpath($docsDir);
	}

	/**
	 * Scans a directory for all markdown files (.md)
	 * @return string[]
	 */
	public function scanDir()
	{
		return array_map(function($path) {return basename($path);}, glob($this->docsDir . "/*.md"));
	}

	/**
	 * Renders a markdown file, making sure it is within the allowed directory
	 * @param string $fileName
	 * @return string
	 * @throws Exception
	 */
	public function renderDoc($fileName)
	{
		$fullPath = $this->docsDir . '/' . $fileName;
		if (is_file($fullPath) && strpos(realpath($fullPath), $this->docsDir) === 0) {

			/// @todo possible optimization: add a caching layer, saving the rendered text on disk or in memory

			$parsedown = new Parsedown();
			$renderedText = $parsedown->text(file_get_contents($fullPath));
			return $renderedText;
		};

		throw new \Exception('File not found');
	}
}
