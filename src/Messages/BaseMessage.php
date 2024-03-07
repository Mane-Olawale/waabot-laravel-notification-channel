<?php

namespace ManeOlawale\Laravel\WaabotChannel\Messages;

abstract class BaseMessage
{
    /**
     * The message content.
     *
     * @var string
     */
    public $content;

    /**
     * Create a new message instance.
     *
     * @param  string  $content
     * @return void
     */
    public function __construct(string $content = '')
    {
        $this->content = $content;
    }

    /**
     * Set the message content.
     *
     * @param  string  $content
     * @return $this
     */
    public function content(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the text content of the message
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
