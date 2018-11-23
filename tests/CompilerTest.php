<?php

namespace Macavity\VueToTwig\Tests;

use Macavity\VueToTwig\Compiler;

class CompilerTest extends AbstractTestCase
{
    /** @test */
    public function leavesMustacheVariablesIntact()
    {
        $html = '<template><div>{{ someVariable }}</div></template>';
        $expected = '<div>{{ someVariable }}</div>';
        $document = $this->createDocumentWithHtml($html);
        $compiler = new Compiler($document);

        $actual = $compiler->convert();

        $this->assertEqualHtml($expected, $actual);
    }
}
