<?php

namespace Nextras\Orm\Tests\Integrations;

use Mockery;
use Nextras\Orm\Tests\DatabaseTestCase;
use Nextras\Orm\Tests\TagFollower;
use Tester\Assert;
use Tester\Environment;

$dic = require_once __DIR__ . '/../../../bootstrap.php';
Environment::lock('integration', TEMP_DIR);


/**
 * @testCase
 */
class RelationshipCompositePkTest extends DatabaseTestCase
{

	public function testBasic()
	{
		/** @var TagFollower $tagFollower */
		$tagFollower = $this->orm->tagFollowers->getByTagAndAuthor(3, 1);

		Assert::same($tagFollower->tag->name, 'Tag 3');
		Assert::same($tagFollower->author->name, 'Writer 1');
	}

}


$test = new RelationshipCompositePkTest($dic);
$test->run();