<?php

/*
 * This file is part of the CCDNForum ForumBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNForum\ForumBundle\Component\TwigExtension;

use CCDNForum\ForumBundle\Model\Model\BaseModelInterface;

/**
 *
 * @category CCDNForum
 * @package  ForumBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * @link     https://github.com/codeconsortium/CCDNForumForumBundle
 *
 */
class BoardListExtension extends \Twig_Extension
{
    /**
     *
     * @access protected
     * @var \CCDNForum\ForumBundle\Model\Model\BaseModelInterface $categoryModel
     */
    protected $categoryModel;

    /**
     *
     * @access public
     * @param \CCDNForum\ForumBundle\Manager\BaseManagerInterface $categoryManager
     */
    public function __construct(BaseModelInterface $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    /**
     *
     * @access public
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'board_list' => new \Twig_Function_Method($this, 'boardList'),
        );
    }

    /**
     * Gets all boards available with their categories.
     *
     * @access public
     * @return array
     */
    public function boardList($forumName)
    {
		if (!$forumName) {
			$forumName = 'default';
		}
		
        return $this->categoryModel->findAllCategoriesWithBoardsForForumByName($forumName);
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'boardList';
    }
}
