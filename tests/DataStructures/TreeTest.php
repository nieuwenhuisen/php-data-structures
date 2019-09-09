<?php

namespace App\Tests\DataStructures;

use App\DataStructures\Tree\Tree;
use App\DataStructures\Tree\TreeNode;
use PHPUnit\Framework\TestCase;

class TreeTest extends TestCase
{
    public function testToString(): void
    {
        $ceo = new TreeNode('CEO');
        $tree = new Tree($ceo);
        $cto = new TreeNode('CTO');
        $cfo = new TreeNode('CFO');
        $cmo = new TreeNode('CMO');
        $coo = new TreeNode('COO');

        $ceo->addChildren($cto);
        $ceo->addChildren($cfo);
        $ceo->addChildren($cmo);
        $ceo->addChildren($coo);

        $seniorArchitect = new TreeNode('Senior Architect');
        $softwareEngineer = new TreeNode('Software Engineer');
        $userInterfaceDesigner = new TreeNode('User Interface Designer');
        $qualityAssuranceEngineer = new TreeNode('Quality Assurance Engineer');

        $cto->addChildren($seniorArchitect);
        $seniorArchitect->addChildren($softwareEngineer);
        $cto->addChildren($qualityAssuranceEngineer);
        $cto->addChildren($userInterfaceDesigner);

        $output = $tree->traverse($ceo);

        $this->assertEquals([
            'CEO',
            '- CTO',
            '-- Senior Architect',
            '--- Software Engineer',
            '-- Quality Assurance Engineer',
            '-- User Interface Designer',
            '- CFO',
            '- CMO',
            '- COO',
        ], $output);
    }
}
