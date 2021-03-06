<?php

namespace Paneon\VueToTwig\Tests;

class CommentNodeTest extends AbstractTestCase
{
    public function testCommentNode()
    {
        $component = '<template><div><!-- info comment --></div></template>';
        $expected = '<div class="{{class|default(\'\')}}"><!-- info comment --></div>';

        $compiler = $this->createCompiler($component);

        $actual = $compiler->convert();

        $this->assertEqualHtml($expected, $actual);
    }

    public function testCommentNodeEslintDisable()
    {
        $component = '<template><div><!-- eslint-disable-next-line vue/no-v-html --></div></template>';
        $expected = '<div class="{{class|default(\'\')}}"></div>';

        $compiler = $this->createCompiler($component);

        $actual = $compiler->convert();

        $this->assertEqualHtml($expected, $actual);
    }

    public function testCommentNodeTodo()
    {
        $component = '<template><div><!-- todo change something --></div></template>';
        $expected = '<div class="{{class|default(\'\')}}"></div>';

        $compiler = $this->createCompiler($component);

        $actual = $compiler->convert();

        $this->assertEqualHtml($expected, $actual);
    }
}
