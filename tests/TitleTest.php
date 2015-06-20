<?php

use Radiula\Title\Models\Title;

class TitleTest extends PHPUnit_Framework_TestCase {

    protected $config;

    public function setUp()
    {
        $config = Mockery::mock('Illuminate\Config\Repository');

        $this->getMethod($config, 'layout', '%s | %s');
        $this->getMethod($config, 'segmentSeperator', ' | ');

        $this->config = $config;
    }

    protected function getMethod($config, $property, $return)
    {
        return $config->shouldReceive('get')
            ->with("title.{$property}")
            ->andReturn($return);
    }

    public function testCanSetSiteName()
    {
        $title = new Title($this->config);

        $title->siteName('FooBar Site');

        $this->assertSame($title->make(), 'FooBar Site');
    }

    public function testCanSetOneSegment()
    {
        $title = new Title($this->config);

        $title->segment('Foo');

        $this->assertSame($title->make(), 'Foo');
    }

    public function testCanSetMultipleSegment()
    {
        $title = new Title($this->config);

        $title->segment('Foo', 'Bar', 'Baz');

        $this->assertSame($title->make(), 'Foo | Bar | Baz');
    }

    public function testCanReturnLast()
    {
        $title = new Title($this->config);

        $title->segment('Foo', 'Bar', 'Baz');

        $this->assertSame($title->last(), 'Baz');
    }

    public function testCanSetFullTitle()
    {
        $title = new Title($this->config);

        $title->segment('Foo', 'Bar', 'Baz');
        $title->siteName('FooBar Site');

        $this->assertSame($title->make(), 'Foo | Bar | Baz | FooBar Site');
    }

    public function testCanSetFullTitleWithDifferentLayout()
    {
        $title = new Title($this->config);

        $title->segment('Foo');
        $title->siteName('FooBar Site');
        $title->layout('%s # %s');

        $this->assertSame($title->make(), 'Foo # FooBar Site');
    }
}
