<?php

namespace Hpr\Entity;

/**
 * Class Message
 *
 * @package Hpr\Entity
 */
class Message
{
    private string $contentType = 'text/html';
    private string $from = 'Practice House <info@hpractic.com>';
    private string $to;
    private string $subject;
    private string $body;

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     *
     * @return Message
     */
    public function setContentType(string $contentType): Message
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     *
     * @return Message
     */
    public function setTo(string $to): Message
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     *
     * @return Message
     */
    public function setFrom(string $from): Message
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     *
     * @return Message
     */
    public function setSubject(string $subject): Message
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     *
     * @return Message
     */
    public function setBody(string $body): Message
    {
        $this->body = $body;

        return $this;
    }
}
