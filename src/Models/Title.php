<?php

namespace Radiula\Title\Models;

class Title
{
    protected $layout;
    protected $segmentSeperator;
    protected $siteName;
    protected $segments = [];

    public function __construct(\Illuminate\Config\Repository $config)
    {
        $this->layout = $config->get('title.layout');
        $this->segmentSeperator = $config->get('title.segmentSeperator');
    }

    /**
     * Set the site name.
     */
    public function siteName($name)
    {
        $this->siteName = $name;
    }

    /**
     * Set the segments for the page title.
     */
    public function segment()
    {
        $this->segments = array_merge(func_get_args(), $this->segments);
    }

    /**
     * Returns last added segment.
     *
     * @return string
     */
    public function last()
    {
        return end($this->segments);
    }

    /**
     * Override the layout.
     */
    public function layout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * Build the site title using the segments and title.
     *
     * @return string
     */
    public function make()
    {
        $segments = implode($this->segmentSeperator, $this->segments);

        return trim(sprintf($this->layout, $segments, $this->siteName), ' | ');
    }

    /**
     * Get the segments.
     *
     * @return array
     */
    public function segments()
    {
        return $this->segments;
    }

    /**
     * Set the segments
     *
     * @param $segments
     * @return $this
     */
    public function setSegments($segments)
    {
        $this->segments = $segments;

        return $this;
    }
}
