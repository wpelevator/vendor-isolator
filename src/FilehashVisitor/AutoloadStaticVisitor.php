<?php

namespace XWP\ComposerIsolator\FilehashVisitor;

use PhpParser\Node;

class AutoloadStaticVisitor extends AbstractVisitor
{
    private $entered = false;

    /**
     * {@inheritdoc}
     */
    public function enterNode(Node $node)
    {
        if ($node instanceof Node\Stmt\PropertyProperty and 'files' == $node->name) {
            $this->transformFilehashArray($node->default);
        }
    }

    /**
     * Did we perform a transformation
     *
     * @return bool
     */
    public function didTransform()
    {
        return $this->transformed;
    }
}
