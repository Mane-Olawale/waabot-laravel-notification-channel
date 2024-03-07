<?php

namespace ManeOlawale\Laravel\WaabotChannel\Messages;

class WhatsappMessage extends BaseMessage
{
    /**
     * Array of content lines.
     *
     * @var array
     */
    public $lines = [];

    /**
     * Add a line of text to the message content.
     *
     * @param  string  $text
     * @return $this
     */
    public function line(string $text = null): self
    {
        $this->lines[] = $text;
        return $this;
    }

    /**
     * Get the text content of the message
     *
     * @return string
     */
    public function getContent(): string
    {
        $lines = (($this->content) ? "\n" : "") . implode("\n", $this->lines);
        return trim($this->content . $lines);
    }
}
