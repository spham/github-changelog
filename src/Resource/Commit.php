<?php

/*
 * Copyright (c) 2016 Andreas Möller <am@localheinz.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Localheinz\GitHub\ChangeLog\Resource;

use Assert\Assertion;

final class Commit implements CommitInterface
{
    /**
     * @var string
     */
    private $sha;

    /**
     * @var string
     */
    private $message;

    /**
     * @param string $sha
     * @param string $message
     */
    public function __construct($sha, $message)
    {
        Assertion::string($sha);
        Assertion::regex($sha, '/^[0-9a-f]{40}$/i');
        Assertion::string($message);

        $this->sha = $sha;
        $this->message = $message;
    }

    public function sha()
    {
        return $this->sha;
    }

    public function message()
    {
        return $this->message;
    }

    public function equals(CommitInterface $commit)
    {
        return $commit->sha() === $this->sha();
    }
}
