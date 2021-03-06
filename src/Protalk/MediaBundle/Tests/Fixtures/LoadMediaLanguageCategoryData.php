<?php

/**
 * ProTalk
 *
 * Copyright (c) 2012-2013, ProTalk
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Protalk\MediaBundle\Tests\Fixtures;

use Doctrine\ORM\EntityManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Protalk\MediaBundle\Entity\MediaLanguageCategory;
use Protalk\MediaBundle\Entity\LanguageCategory;
use Protalk\MediaBundle\Entity\Media;

class LoadMediaLanguageCategoryData extends AbstractFixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $phpbb4ToolsPhp = new MediaLanguageCategory();
        $phpbb4ToolsPhp->setLanguageCategory($this->getReference('toolsPhp'));
        $phpbb4ToolsPhp->setMedia($this->getReference('phpbb4'));

        $toolUpYourLampStackToolsJavascript = new MediaLanguageCategory();
        $toolUpYourLampStackToolsJavascript->setLanguageCategory($this->getReference('toolsJavascript'));
        $toolUpYourLampStackToolsJavascript->setMedia($this->getReference('toolUpYourLampStack'));


        $manager->persist($phpbb4ToolsPhp);
        $manager->persist($toolUpYourLampStackToolsJavascript);

        $manager->flush();
    }

    /**
     * Load this fixtures dependencies
     * @see https://github.com/doctrine/data-fixtures
     *
     * @return array
     */
    public function getDependencies()
    {
        return array(
            'Protalk\MediaBundle\Tests\Fixtures\LoadLanguageCategoryData',
            'Protalk\MediaBundle\Tests\Fixtures\LoadMediaData',
        );
    }
}
