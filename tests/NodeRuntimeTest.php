<?php namespace Codesleeve\Executejs;

class NodeRuntimeTest extends TestCase
{ 
    public function setUp()
    {
        $this->runtime = new Runtimes\NodeRuntime;
        $this->source = file_get_contents(__DIR__ . '/files/source1.js');
        $this->handlebars_source = file_get_contents(__DIR__ . '/files/source2.js');
        $this->invalid_source = file_get_contents(__DIR__ . '/files/source3.js');
    }

    public function testCall()
    {

    }

    public function testCompile()
    {

    }

    public function testCompileFile()
    {

    }

    public function testEvaluate()
    {

    }

    public function testIsAvailable()
    {

    }

    public function testExecute()
    {
        $outcome = $this->runtime->execute($this->source);
        $this->assertEquals($outcome, 'hello world');
    }

    public function testExecuteInBackground()
    {
        $outcome = $this->runtime->executeInBackground($this->source);
        
        $this->assertExecutionFinishes($outcome[0]);
        $this->assertExecutionEquals($outcome[1], "hello world");
    }

    public function testHandlebars()
    {
        $outcome = $this->runtime->execute($this->handlebars_source);
        $this->assertContains("templates['test.jst.hbs']", $outcome);
    }

    /**
     * @expectedException Codesleeve\Executejs\Exceptions\ExternalRuntimeException
     */
    public function testInvalidSourceCode()
    {
        $outcome = $this->runtime->execute($this->invalid_source);
    }
}